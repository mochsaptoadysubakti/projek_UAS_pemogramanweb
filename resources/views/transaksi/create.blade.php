<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Sewa Motor - SpeedRent</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <style>
        input[type="date"]::-webkit-calendar-picker-indicator {
            cursor: pointer;
            filter: invert(1);
        }
    </style>
</head>
<body class="bg-gray-900 text-white flex items-center justify-center min-h-screen p-4 md:p-8">

    <div class="w-full max-w-6xl mx-auto">
        <div class="text-center mb-8">
            <a href="{{ route('sewa-motor') }}" class="text-blue-400 hover:text-blue-300">&larr; Kembali ke Pilihan Motor</a>
            <h1 class="text-4xl font-bold mt-2">Formulir Sewa</h1>
            <p class="text-gray-400">Selesaikan pesanan Anda dalam beberapa langkah mudah.</p>
        </div>

        <form id="form-sewa" action="{{ route('transaksi.store') }}" method="POST">
            @csrf
            <input type="hidden" name="motor_id" value="{{ $motor->id }}">
            <input type="hidden" name="total_harga" id="input_total_harga" value="0">
            
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                <div class="lg:col-span-2 bg-gray-800 p-8 rounded-xl shadow-lg">
                    <div class="flex flex-col sm:flex-row items-center border-b border-gray-700 pb-6 mb-6">
                        <img src="{{ asset('images/' . $motor->gambar) }}" alt="{{ $motor->nama }}" class="w-48 h-auto rounded-lg object-cover mb-4 sm:mb-0">
                        <div class="sm:ml-6 text-center sm:text-left">
                            <h2 class="text-2xl font-bold">{{ $motor->nama }}</h2>
                            
                            <p class="text-lg text-gray-300">Harga per hari: <span class="font-semibold text-blue-400">Rp {{ number_format($motor->harga, 0, ',', '.') }}</span></p>
                        
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="tanggal_mulai" class="block mb-2 font-medium">Tanggal Mulai Sewa</label>
                            <input type="date" id="tanggal_mulai" name="tanggal_mulai" class="w-full p-3 bg-gray-700 rounded-lg border border-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        </div>
                        <div>
                            <label for="tanggal_selesai" class="block mb-2 font-medium">Tanggal Selesai Sewa</label>
                            <input type="date" id="tanggal_selesai" name="tanggal_selesai" class="w-full p-3 bg-gray-700 rounded-lg border border-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        </div>
                        <div class="md:col-span-2">
                            <label for="nama_penyewa" class="block mb-2 font-medium">Nama Lengkap</label>
                            <input type="text" id="nama_penyewa" name="nama_penyewa" value="{{ Auth::user()->name ?? '' }}" class="w-full p-3 bg-gray-700 rounded-lg border border-gray-600" required>
                        </div>
                        <div class="md:col-span-2">
                            <label for="telepon_penyewa" class="block mb-2 font-medium">Nomor Telepon (WhatsApp)</label>
                            <input type="tel" id="telepon_penyewa" name="telepon_penyewa" value="{{ Auth::user()->telepon ?? '' }}" class="w-full p-3 bg-gray-700 rounded-lg border border-gray-600" required>
                        </div>
                         <div class="md:col-span-2">
                            <label for="alamat_antar" class="block mb-2 font-medium">Alamat Antar/Jemput (Opsional)</label>
                            <textarea id="alamat_antar" name="alamat_antar" rows="3" class="w-full p-3 bg-gray-700 rounded-lg border border-gray-600"></textarea>
                        </div>
                    </div>

                     <div class="mt-8">
                        <h3 class="text-xl font-semibold mb-4">Metode Pembayaran</h3>
                        <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
                            <label class="flex flex-col items-center p-4 bg-gray-700 rounded-lg cursor-pointer border-2 border-transparent has-[:checked]:border-blue-500 has-[:checked]:bg-gray-600">
                                <input type="radio" name="metode_pembayaran" value="BCA" class="sr-only" required>
                                <i class="ph-fill ph-bank text-4xl mb-2"></i>
                                <span class="text-sm font-semibold">BCA VA</span>
                            </label>
                             <label class="flex flex-col items-center p-4 bg-gray-700 rounded-lg cursor-pointer border-2 border-transparent has-[:checked]:border-blue-500 has-[:checked]:bg-gray-600">
                                <input type="radio" name="metode_pembayaran" value="GoPay" class="sr-only">
                                <i class="ph-fill ph-wallet text-4xl mb-2"></i>
                                <span class="text-sm font-semibold">GoPay</span>
                            </label>
                             <label class="flex flex-col items-center p-4 bg-gray-700 rounded-lg cursor-pointer border-2 border-transparent has-[:checked]:border-blue-500 has-[:checked]:bg-gray-600">
                                <input type="radio" name="metode_pembayaran" value="OVO" class="sr-only">
                                <i class="ph-fill ph-seal-check text-4xl mb-2"></i>
                                <span class="text-sm font-semibold">OVO</span>
                            </label>
                             <label class="flex flex-col items-center p-4 bg-gray-700 rounded-lg cursor-pointer border-2 border-transparent has-[:checked]:border-blue-500 has-[:checked]:bg-gray-600">
                                <input type="radio" name="metode_pembayaran" value="Tunai" class="sr-only">
                                <i class="ph-fill ph-money text-4xl mb-2"></i>
                                <span class="text-sm font-semibold">Bayar Tunai</span>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="bg-gray-800 p-8 rounded-xl shadow-lg h-fit lg:sticky top-8">
                    <h3 class="text-2xl font-bold border-b border-gray-700 pb-4 mb-4">Rincian Pesanan</h3>
                    <div class="space-y-3 text-gray-300">
                        <div class="flex justify-between">
                            <span>Lama Sewa</span>
                            <span id="lama_sewa" class="font-semibold text-white">- Hari</span>
                        </div>
                         <div class="flex justify-between">
                            <span>Biaya Sewa</span>
                            <span id="biaya_sewa" class="font-semibold text-white">Rp 0</span>
                        </div>
                        <div class="flex justify-between">
                            <span>Biaya Layanan & Pajak</span>
                            <span class="font-semibold text-white">Rp 15.000</span>
                        </div>
                    </div>
                    <div class="border-t border-gray-600 mt-4 pt-4">
                        <div class="flex justify-between text-xl font-bold">
                            <span>Total Pembayaran</span>
                            <span id="total_pembayaran">Rp 15.000</span>
                        </div>
                    </div>
                    <button type="submit" class="w-full bg-blue-600 hover:bg-blue-500 text-white font-bold py-4 rounded-lg mt-8 text-lg transition-all duration-300">
                        Konfirmasi & Bayar
                    </button>
                    <p id="error-message" class="text-red-400 text-center mt-4 hidden">Silakan pilih tanggal sewa yang valid.</p>
                </div>

            </div>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const tglMulai = document.getElementById('tanggal_mulai');
            const tglSelesai = document.getElementById('tanggal_selesai');
            
            // PERUBAHAN 2 DI SINI
            const hargaPerHari = {{ $motor->harga }};
            const biayaLayanan = 15000;

            const lamaSewaEl = document.getElementById('lama_sewa');
            const biayaSewaEl = document.getElementById('biaya_sewa');
            const totalPembayaranEl = document.getElementById('total_pembayaran');
            const inputTotalHarga = document.getElementById('input_total_harga');
            const errorMessage = document.getElementById('error-message');

            function hitungTotal() {
                const mulai = new Date(tglMulai.value);
                const selesai = new Date(tglSelesai.value);

                if (tglMulai.value && tglSelesai.value && selesai >= mulai) {
                    errorMessage.classList.add('hidden');
                    const diffTime = Math.abs(selesai - mulai);
                    let diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
                    
                    // Jika tanggal mulai dan selesai sama, hitung sebagai 1 hari
                    if (diffDays === 0) {
                        diffDays = 1;
                    }
                    
                    const totalBiayaSewa = diffDays * hargaPerHari;
                    const totalPembayaran = totalBiayaSewa + biayaLayanan;

                    lamaSewaEl.textContent = `${diffDays} Hari`;
                    biayaSewaEl.textContent = `Rp ${totalBiayaSewa.toLocaleString('id-ID')}`;
                    totalPembayaranEl.textContent = `Rp ${totalPembayaran.toLocaleString('id-ID')}`;
                    inputTotalHarga.value = totalPembayaran;

                } else {
                    // Reset jika tanggal tidak valid
                    lamaSewaEl.textContent = `- Hari`;
                    biayaSewaEl.textContent = `Rp 0`;
                    totalPembayaranEl.textContent = `Rp ${biayaLayanan.toLocaleString('id-ID')}`;
                    inputTotalHarga.value = 0;
                    if(tglMulai.value && tglSelesai.value && selesai < mulai){
                        errorMessage.classList.remove('hidden');
                    }
                }
            }
            
            tglMulai.addEventListener('change', hitungTotal);
            tglSelesai.addEventListener('change', hitungTotal);
        });
    </script>
</body>
</html>