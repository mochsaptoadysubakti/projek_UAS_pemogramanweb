<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user(); // Ambil data user yang login
        return view('userprofile', compact('user')); // Kirim ke view
    }
}
