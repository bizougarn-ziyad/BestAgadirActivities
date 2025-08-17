<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // This migration is not needed as the user_data table already has these columns
        // Schema::table('user_data', function (Blueprint $table) {
        //     $table->string('google_id')->nullable()->after('email');
        //     $table->string('avatar')->nullable()->after('google_id');
        //     $table->string('password')->nullable()->change();
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // This migration is not needed as the user_data table already has these columns
        // Schema::table('user_data', function (Blueprint $table) {
        //     $table->dropColumn(['google_id', 'avatar']);
        //     $table->string('password')->nullable(false)->change();
        // });
    }
};
