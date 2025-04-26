<?php

namespace App\Http\Controllers;

use App\Models\EditProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EditProfileController extends Controller
{
    /**
     * Display the edit profile form.
     *
     * @return \Illuminate\View\View
     */
    public function edit()
    {
        // Retrieve the logged-in user's profile
        $profile = EditProfile::where('user_id', Auth::id())->first();

        return view('profile.edit', compact('profile'));
    }

    /**
     * Update the profile.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        // Validate the request
        $request->validate([
            'bio' => 'nullable|string|max:500',
            'profile_picture' => 'nullable|image|max:2048', // 2MB max size
        ]);

        // Retrieve or create the profile for the logged-in user
        $profile = EditProfile::firstOrCreate(
            ['user_id' => Auth::id()],
            ['bio' => '', 'profile_picture' => null]
        );

        // Handle profile picture upload if provided
        if ($request->hasFile('profile_picture')) {
            $path = $request->file('profile_picture')->store('profile_pictures', 'public');
            $profile->profile_picture = $path;
        }

        // Update bio
        $profile->bio = $request->input('bio', $profile->bio);

        // Save the updated profile
        $profile->save();

        return redirect()->back()->with('success', 'Profile updated successfully.');
    }
}
