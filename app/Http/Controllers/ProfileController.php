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
            'upload_profile' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:15',
        ]);

        $user = Auth::user();

        // Update nama dan nomor telepon
        $user->name = $request->name;
        $user->phone = $request->phone;

        // Jika ada gambar yang diupload, update profile_image
        if ($request->hasFile('upload_profile')) {
            // Hapus gambar lama jika ada
            if ($user->profile_image && Storage::exists('public/' . $user->profile_image)) {
                Storage::delete('public/' . $user->profile_image);
            }

            // Simpan gambar baru
            $path = $request->file('upload_profile')->store('profile_images', 'public');
            $user->profile_image = $path;
        }

        // Simpan perubahan ke database
        $user->save();

        return redirect()->back()->with('success', 'Profil berhasil diperbarui');
    }
}
