<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NotificationEmail;
use Illuminate\Support\Facades\Validator;

class NewsletterController extends Controller
{
    public function subscribe(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|max:255'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Please enter a valid email address.'
            ], 422);
        }

        $email = $request->email;

        // Check if email already exists
        $existingEmail = NotificationEmail::where('email', $email)->first();

        if ($existingEmail) {
            if ($existingEmail->is_active) {
                return response()->json([
                    'success' => false,
                    'message' => 'This email is already subscribed to our newsletter.'
                ], 409);
            } else {
                // Reactivate the subscription
                $existingEmail->update(['is_active' => true]);
                return response()->json([
                    'success' => true,
                    'message' => 'Welcome back! Your subscription has been reactivated.'
                ]);
            }
        }

        // Create new subscription
        try {
            NotificationEmail::create([
                'email' => $email,
                'is_active' => true
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Thank you for subscribing! You\'ll receive updates about new activities and exclusive offers.'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'An error occurred. Please try again later.'
            ], 500);
        }
    }

    public function unsubscribe(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Please enter a valid email address.'
            ], 422);
        }

        $email = NotificationEmail::where('email', $request->email)->first();

        if (!$email) {
            return response()->json([
                'success' => false,
                'message' => 'Email address not found in our subscription list.'
            ], 404);
        }

        $email->update(['is_active' => false]);

        return response()->json([
            'success' => true,
            'message' => 'You have been successfully unsubscribed from our newsletter.'
        ]);
    }
}
