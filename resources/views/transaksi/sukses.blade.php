<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaksi Berhasil - SpeedRent</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
</head>
<body class="bg-gray-900 text-white flex items-center justify-center min-h-screen p-6">

    <div class="bg-gray-800 p-8 md:p-12 rounded-2xl shadow-2xl max-w-2xl w-full text-center">
        <div class="w-24 h-24 bg-green-500/20 rounded-full mx-auto flex items-center justify-center mb-6">
            <i class="ph-fill ph-check-circle text-6xl text-green-400"></i>
        </div>

        <h1 class="text-3xl md:text-4xl font-bold mb-3">Transaksi Berhasil!</h1>
        <p class="text-gray-400 mb-6">Pesanan Anda telah kami terima dan sedang diproses.</p>

        <div class="bg-gray-700 rounded-lg p-6 text-left space-y-4 mb-8 border border-gray-600">
            <h2 class="text-xl font-semibold border-b border-gray-600 pb-3 mb-4">Detail Pesanan</h2>
            <div class="flex justify-between">
                <span class="text-gray-400">ID Transaksi:</span>
                <span class="font-mono font-semibold">INV/{{ $transaksi->created_at->format('Ymd') }}/{{ $transaksi->id }}</span>
            </div>
            <div class="flex justify-between">
                <span class="text-gray-400">Motor:</span>
                <span class="font-semibold">{{ $transaksi->motor->nama }}</span>
            </div>
            <div class="flex justify-between">
                <span class="text-gray-400">Tanggal Sewa:</span>
                <span class="font-semibold">{{ \Carbon\Carbon::parse($transaksi->start_date)->format('d M Y') }} - {{ \Carbon\Carbon::parse($transaksi->start_date)->addDays($transaksi->duration)->format('d M Y') }}</span>
            </div>
            <div class="flex justify-between">
                <span class="text-gray-400">Metode Pembayaran:</span>
                <span class="font-semibold">{{ $transaksi->payment_method }}</span>
            </div>
             <div class="border-t border-gray-600 pt-4 mt-4 flex justify-between text-lg">
                <span class="text-gray-300 font-bold">Total Pembayaran:</span>
                <span class="font-bold text-blue-400">Rp {{ number_format($transaksi->total_biaya, 0, ',', '.') }}</span>
            </div>
        </div>

        <p class="text-gray-400 text-sm mb-6">
            Tim kami akan segera menghubungi Anda melalui nomor telepon yang terdaftar untuk konfirmasi lebih lanjut. Silakan lakukan pembayaran jika Anda memilih metode transfer.
        </p>

        <a href="{{ route('homepage') }}" class="bg-blue-600 hover:bg-blue-500 text-white font-bold py-3 px-8 rounded-lg transition-all duration-300">
            Kembali ke Beranda
        </a>
    </div>

</body>
</html>