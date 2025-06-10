<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Motor;

class MotorController extends Controller
{
    // Menampilkan semua motor
    public function index()
    {
        $motors = Motor::all();
        return view('motors.index', compact('motors'));
    }

    // Menampilkan form tambah motor
    public function create()
    {
        return view('motors.create');
    }

    // Menyimpan data motor ke database
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'tipe' => 'required',
            'harga_sewa' => 'required|numeric',
            'status' => 'required'
        ]);

        Motor::create($request->all());
        return redirect()->route('motors.index')->with('success', 'Motor berhasil ditambahkan.');
    }

    // Menampilkan satu motor
    public function show(Motor $motor)
    {
        return view('motors.show', compact('motor'));
    }

    // Menampilkan form edit motor
    public function edit(Motor $motor)
    {
        return view('motors.edit', compact('motor'));
    }

    // Mengupdate data motor
    public function update(Request $request, Motor $motor)
    {
        $request->validate([
            'nama' => 'required',
            'tipe' => 'required',
            'harga_sewa' => 'required|numeric',
            'status' => 'required'
        ]);

        $motor->update($request->all());
        return redirect()->route('motors.index')->with('success', 'Motor berhasil diperbarui.');
    }

    // Menghapus motor dari database
    public function destroy(Motor $motor)
    {
        $motor->delete();
        return redirect()->route('motors.index')->with('success', 'Motor berhasil dihapus.');
    }
}
