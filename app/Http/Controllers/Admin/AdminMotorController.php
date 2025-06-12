<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Motor;
use App\Models\Payment; // <-- Tambahkan ini jika Anda belum punya model Payment
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminMotorController extends Controller
{
    /**
     * Menampilkan daftar semua motor.
     */
    public function index()
    {
        $motors = Motor::latest()->get();
        return view('admin.motors.index', compact('motors'));
    }

    /**
     * Menampilkan form untuk menambah motor baru.
     */
    public function create()
    {
        return view('admin.motors.create');
    }

    /**
     * Menyimpan motor baru ke database.
     */
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'jenis' => 'required|string',
            'harga' => 'required|integer',
            'deskripsi' => 'required|string',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Proses upload gambar
        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('public/motors');
            $validated['gambar'] = basename($path);
        }

        Motor::create($validated);

        return redirect()->route('admin.motors.index')->with('success', 'Motor berhasil ditambahkan!');
    }

    /**
     * Menampilkan form untuk mengedit motor.
     */
    public function edit(Motor $motor)
    {
        return view('admin.motors.edit', compact('motor'));
    }

    /**
     * Memperbarui data motor di database.
     */
    public function update(Request $request, Motor $motor)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'jenis' => 'required|string',
            'harga' => 'required|integer',
            'deskripsi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($motor->gambar) {
                Storage::delete('public/motors/' . $motor->gambar);
            }
            // Upload gambar baru
            $path = $request->file('gambar')->store('public/motors');
            $validated['gambar'] = basename($path);
        }

        $motor->update($validated);

        return redirect()->route('admin.motors.index')->with('success', 'Data motor berhasil diperbarui!');
    }

    /**
     * Menghapus motor dari database.
     */
    public function destroy(Motor $motor)
    {
        // Hapus gambar dari storage
        if ($motor->gambar) {
            Storage::delete('public/motors/' . $motor->gambar);
        }

        $motor->delete();
        return redirect()->route('admin.motors.index')->with('success', 'Motor berhasil dihapus!');
    }

    /**
     * Mengubah status ketersediaan motor.
     */
    public function updateStatus(Request $request, Motor $motor)
    {
        $request->validate(['status' => 'required|in:Tersedia,Disewa']);

        $motor->update(['status' => $request->status]);

        return redirect()->back()->with('success', 'Status motor berhasil diubah!');
    }

    /**
     * Menampilkan halaman verifikasi pembayaran.
     */
    public function showPaymentVerification()
    {
        $payments = Payment::where('status', 'pending')->get(); // Contoh: ambil pembayaran dengan status 'pending'
        return view('admin.verifikasi_pembayaran', compact('payments')); // Pastikan nama viewnya benar
    }

    /**
     * Memproses verifikasi pembayaran (approve/reject).
     */
    public function processPaymentVerification(Request $request)
    {
        $request->validate([
            'rental_id' => 'required|exists:rentals,id', // Pastikan rental_id ada di tabel rentals
            'status' => 'required|in:approved,rejected',
            'reason' => 'nullable|string|sometimes', // Alasan penolakan (opsional)
        ]);

        $payment = Payment::where('rental_id', $request->rental_id)->where('status', 'pending')->firstOrFail();

        $payment->update([
            'status' => $request->status,
            'notes' => $request->reason ?? null, // Simpan alasan jika ada
        ]);

        return redirect()->back()->with('success', 'Status pembayaran berhasil diperbarui!');
    }
}