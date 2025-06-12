<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Motor;
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
}