<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\ContactMessage;

class ContactController extends Controller
{
    public function submit(Request $request)
    {
        // Check if user is authenticated
        if (!Auth::check()) {
            return redirect()->route('login')
                ->with('error', 'Please login to send us a message.')
                ->withInput();
        }

        $user = Auth::user();

        // Check daily message limit
        if (ContactMessage::hasReachedDailyLimit($user->id)) {
            return back()
                ->with('error', 'You have reached the daily limit of 3 messages. Please try again tomorrow.')
                ->withInput();
        }

        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:2000',
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            // Store the message in database
            ContactMessage::create([
                'user_id' => $user->id,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'phone' => $request->phone,
                'subject' => $request->subject,
                'message' => $request->message,
            ]);

            // Optional: Send email notification to admin
            /*
            Mail::send('emails.contact', $request->all(), function($message) use ($request) {
                $message->to('info@bestagadiractivities.com')
                        ->subject('New Contact Form Submission: ' . $request->subject)
                        ->from($request->email, $request->first_name . ' ' . $request->last_name);
            });
            */

            $successMessage = 'Thank you for your message! We will get back to you within 24 hours.';

            return back()->with('success', $successMessage);
            
        } catch (\Exception $e) {
            return back()->with('error', 'Sorry, there was an error sending your message. Please try again or contact us directly.');
        }
    }
}
