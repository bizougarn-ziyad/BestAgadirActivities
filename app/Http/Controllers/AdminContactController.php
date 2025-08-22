<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactMessage;
use Illuminate\Support\Facades\Auth;

class AdminContactController extends Controller
{
    public function index()
    {
        // Check admin authentication
        if (!Auth::guard('admin')->check() && !session('is_admin')) {
            return redirect('/')->withErrors(['error' => 'Access denied.']);
        }

        $messages = ContactMessage::with('user')
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        $totalMessages = ContactMessage::count();
        $newMessages = ContactMessage::where('status', 'new')->count();
        $readMessages = ContactMessage::where('status', 'read')->count();
        $repliedMessages = ContactMessage::where('status', 'replied')->count();

        return view('admin.contact-messages.index', compact(
            'messages', 
            'totalMessages', 
            'newMessages', 
            'readMessages', 
            'repliedMessages'
        ));
    }

    public function show(ContactMessage $contactMessage)
    {
        // Check admin authentication
        if (!Auth::guard('admin')->check() && !session('is_admin')) {
            return redirect('/')->withErrors(['error' => 'Access denied.']);
        }

        // Mark as read if it's new
        if ($contactMessage->status === 'new') {
            $contactMessage->update(['status' => 'read']);
        }

        return view('admin.contact-messages.show', compact('contactMessage'));
    }

    public function updateStatus(Request $request, ContactMessage $contactMessage)
    {
        // Check admin authentication
        if (!Auth::guard('admin')->check() && !session('is_admin')) {
            return redirect('/')->withErrors(['error' => 'Access denied.']);
        }

        $request->validate([
            'status' => 'required|in:new,read,replied'
        ]);

        $contactMessage->update([
            'status' => $request->status
        ]);

        return back()->with('success', 'Message status updated successfully!');
    }

    public function destroy(ContactMessage $contactMessage)
    {
        // Check admin authentication
        if (!Auth::guard('admin')->check() && !session('is_admin')) {
            return redirect('/')->withErrors(['error' => 'Access denied.']);
        }

        $contactMessage->delete();

        return redirect()->route('admin.contact-messages.index')
            ->with('success', 'Message deleted successfully!');
    }
}
