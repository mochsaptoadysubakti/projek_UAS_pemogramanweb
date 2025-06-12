<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Payment; // Pastikan Anda memiliki model Payment
use Illuminate\Http\Request;

class AdminPaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::where('status', 'pending')->get();
        return view('admin.verifikasi_pembayaran', compact('payments'));
    }

    // Method lain untuk memproses verifikasi pembayaran
    public function processVerification(Request $request)
    {
        // ... logika verifikasi pembayaran ...
    }
}