<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Password;
use App\Models\UserData;

class TestPasswordReset extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:password-reset {email}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test password reset functionality';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $email = $this->argument('email');
        
        // Check if user exists
        $user = UserData::where('email', $email)->first();
        if (!$user) {
            $this->error("User with email {$email} not found.");
            return;
        }
        
        $this->info("Found user: {$user->name} (ID: {$user->id})");
        
        // Check password reset token table
        $this->info('Checking password_reset_tokens table...');
        $tokenCount = \DB::table('password_reset_tokens')->count();
        $this->info("Current tokens in table: {$tokenCount}");
        
        // Check password broker configuration
        $this->info('Password broker config:');
        $config = config('auth.passwords.users');
        $this->info("Provider: {$config['provider']}");
        $this->info("Table: {$config['table']}");
        $this->info("Expire: {$config['expire']} minutes");
        
        // Try to send reset link
        $this->info('Attempting to send password reset link...');
        $status = Password::sendResetLink(['email' => $email]);
        
        $this->info("Password reset status: {$status}");
        
        // Check if token was created
        $newTokenCount = \DB::table('password_reset_tokens')->count();
        $this->info("Tokens in table after attempt: {$newTokenCount}");
        
        if ($status === Password::RESET_LINK_SENT) {
            $this->info('✅ Password reset link sent successfully!');
            $this->info('Since MAIL_MAILER is set to "log", check storage/logs/laravel.log for the email content.');
        } else {
            $this->error("❌ Failed to send password reset link: " . __($status));
            $this->info('Available status constants:');
            $this->info('RESET_LINK_SENT: ' . Password::RESET_LINK_SENT);
            $this->info('INVALID_USER: ' . Password::INVALID_USER);
            $this->info('INVALID_TOKEN: ' . Password::INVALID_TOKEN);
            $this->info('RESET_THROTTLED: ' . Password::RESET_THROTTLED);
        }
    }
}
