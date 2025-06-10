<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
        public function uploadProfile(Request $request)
    {
        $request->validate([
            'upload_profile' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = Auth::user();

        // Hapus gambar lama jika ada
        if ($user->profile_image && Storage::exists('public/' . $user->profile_image)) {
            Storage::delete('public/' . $user->profile_image);
        }

        // Simpan gambar baru
        $path = $request->file('upload_profile')->store('profile_images', 'public');
        
        // Update path gambar di database
        $user->profile_image = $path;
        $user->save();

        return redirect()->back()->with('success', 'Profile image updated successfully!');
    }

}
