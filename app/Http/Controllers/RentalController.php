<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Motor;

class RentalController extends Controller
{
    public function index()
    {
        $motors = Motor::all();
        return view('sewa-motor', compact('motors'));
    }

    public function rent(Request $request, $id)
    {
        $motor = Motor::findOrFail($id);
        // Logika pemesanan (misalnya menyimpan ke database)
        return redirect()->route('sewa-motor')->with('success', 'Motor berhasil disewa!');
    }
}