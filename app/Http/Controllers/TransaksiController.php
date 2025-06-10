<?php

namespace App\Http\Controllers;

use App\Models\Motor;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon; // Penting untuk perhitungan tanggal

class TransaksiController extends Controller
{
    /**
     * Menampilkan halaman form transaksi.
     */
    public function create(Motor $motor)
    {
        return view('transaksi.create', compact('motor'));
    }

    /**
     * Memproses dan menyimpan data transaksi baru.
     */
    public function store(Request $request)
    {
        // Langkah 1: Validasi data dari formulir
        $request->validate([
            'motor_id' => 'required|exists:motors,id',
            'tanggal_mulai' => 'required|date|after_or_equal:today',
            'tanggal_selesai' => 'required|date|after:tanggal_mulai',
            'nama_penyewa' => 'required|string|max:255',
            'telepon_penyewa' => 'required|string|max:15',
            'metode_pembayaran' => 'required|string',
        ]);
        
        // Langkah 2: Ambil data motor dan hitung durasi & total biaya
        $motor = Motor::find($request->motor_id);
        $tanggalMulai = Carbon::parse($request->tanggal_mulai);
        $tanggalSelesai = Carbon::parse($request->tanggal_selesai);
        $durasiSewa = $tanggalSelesai->diffInDays($tanggalMulai);
        
        // Pastikan durasi minimal 1 hari
        if ($durasiSewa == 0) {
            $durasiSewa = 1;
        }

        $biayaSewa = $durasiSewa * $motor->harga;
        $biayaLayanan = 15000; // Biaya layanan tetap
        $totalHarga = $biayaSewa + $biayaLayanan;

        // Langkah 3: Simpan data ke database dengan nama kolom yang sudah benar
        $transaksi = Transaksi::create([
            'user_id' => auth()->id(),
            'motor_id' => $request->motor_id,
            'start_date' => $request->tanggal_mulai,      // Menyimpan ke kolom 'start_date'
            'duration' => $durasiSewa,                    // Menyimpan ke kolom 'duration'
            'payment_method' => $request->metode_pembayaran,  // Menyimpan ke kolom 'payment_method'
            'total_biaya' => $totalHarga,                 // Menyimpan ke kolom 'total_biaya'
            'status' => 'pending',                        // Menyimpan ke kolom 'status' dengan nilai default 'pending'
        ]);

        // Langkah 4: Arahkan ke halaman sukses
        return redirect()->route('transaksi.sukses', ['transaksi' => $transaksi->id]);
    }

    /**
     * Menampilkan halaman konfirmasi transaksi sukses.
     */
    public function sukses(Transaksi $transaksi)
    {
        return view('transaksi.sukses', compact('transaksi'));
    }
}