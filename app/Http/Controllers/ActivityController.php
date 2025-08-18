<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activity;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ActivityController extends Controller
{
    public function index()
    {
        // Check admin authentication
        if (!Auth::guard('admin')->check() && !session('is_admin')) {
            return redirect('/')->withErrors(['error' => 'Access denied.']);
        }
        
        $activities = Activity::orderBy('created_at', 'desc')->paginate(9);
        $totalActivities = Activity::count();
        return view('admin.activities.index', compact('activities', 'totalActivities'));
    }

    public function create()
    {
        // Check admin authentication
        if (!Auth::guard('admin')->check() && !session('is_admin')) {
            return redirect('/')->withErrors(['error' => 'Access denied.']);
        }
        
        return view('admin.add-activities');
    }

    public function store(Request $request)
    {
        // Check admin authentication
        if (!Auth::guard('admin')->check() && !session('is_admin')) {
            return redirect('/')->withErrors(['error' => 'Access denied.']);
        }
        
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'bio' => 'required|string|max:2000',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'price' => 'required|numeric|min:0',
        ], [
            'name.required' => 'Activity name is required.',
            'name.max' => 'Activity name cannot exceed 255 characters.',
            'bio.required' => 'Activity description is required.',
            'bio.max' => 'Activity description cannot exceed 2000 characters.',
            'image.required' => 'Activity image is required.',
            'image.image' => 'Please upload a valid image file.',
            'image.mimes' => 'Image must be in JPEG, PNG, JPG, or GIF format.',
            'image.max' => 'Image size cannot exceed 2MB.',
            'price.required' => 'Activity price is required.',
            'price.numeric' => 'Price must be a valid number.',
            'price.min' => 'Price cannot be negative.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            // Handle file upload and convert to base64
            $imageData = null;
            $imageMimeType = null;
            $imageOriginalName = null;
            
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                
                // Get image information
                $imageMimeType = $image->getMimeType();
                $imageOriginalName = $image->getClientOriginalName();
                
                // Convert image to base64
                $imageData = base64_encode(file_get_contents($image->getPathname()));
            }

            // Create activity
            Activity::create([
                'name' => $request->name,
                'bio' => $request->bio,
                'image_data' => $imageData,
                'image_mime_type' => $imageMimeType,
                'image_original_name' => $imageOriginalName,
                'price' => $request->price,
                'is_active' => true
            ]);

            return redirect()->route('admin.activities.index')
                ->with('success', 'Activity added successfully!');

        } catch (\Exception $e) {
            Log::error('Failed to create activity: ' . $e->getMessage());
            
            return redirect()->back()
                ->withErrors(['error' => 'Failed to create activity. Please try again.'])
                ->withInput();
        }
    }

    public function edit(Activity $activity)
    {
        // Check admin authentication
        if (!Auth::guard('admin')->check() && !session('is_admin')) {
            return redirect('/')->withErrors(['error' => 'Access denied.']);
        }
        
        return view('admin.activities.edit', compact('activity'));
    }

    public function update(Request $request, Activity $activity)
    {
        // Check admin authentication
        if (!Auth::guard('admin')->check() && !session('is_admin')) {
            return redirect('/')->withErrors(['error' => 'Access denied.']);
        }
        
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'bio' => 'required|string|max:2000',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'price' => 'required|numeric|min:0',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            $data = [
                'name' => $request->name,
                'bio' => $request->bio,
                'price' => $request->price,
            ];

            // Handle file upload if new image is provided
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                
                // Get image information
                $data['image_mime_type'] = $image->getMimeType();
                $data['image_original_name'] = $image->getClientOriginalName();
                
                // Convert image to base64
                $data['image_data'] = base64_encode(file_get_contents($image->getPathname()));
            }

            $activity->update($data);

            return redirect()->route('admin.activities.index')
                ->with('success', 'Activity updated successfully!');

        } catch (\Exception $e) {
            return redirect()->back()
                ->withErrors(['error' => 'Failed to update activity. Please try again.'])
                ->withInput();
        }
    }

    public function destroy(Activity $activity)
    {
        // Check admin authentication
        if (!Auth::guard('admin')->check() && !session('is_admin')) {
            return redirect('/')->withErrors(['error' => 'Access denied.']);
        }
        
        try {
            // No need to delete files since we're storing in database
            $activity->delete();

            return redirect()->route('admin.activities.index')
                ->with('success', 'Activity deleted successfully!');

        } catch (\Exception $e) {
            return redirect()->back()
                ->withErrors(['error' => 'Failed to delete activity. Please try again.']);
        }
    }
}
