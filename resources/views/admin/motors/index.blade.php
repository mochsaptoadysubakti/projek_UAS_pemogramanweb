<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Manajemen Motor</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto mt-10 p-5">
        <h1 class="text-2xl font-bold mb-5">Manajemen Motor</h1>

        @if (session('success'))
            <div class="bg-green-200 text-green-800 p-4 rounded mb-5">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('admin.motors.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-5 inline-block">
            + Tambah Motor Baru
        </a>

        <div class="bg-white shadow-md rounded-lg overflow-x-auto">
            <table class="min-w-full bg-white">
                <thead class="bg-gray-800 text-white">
                    <tr>
                        <th class="w-1/6 py-3 px-4 uppercase font-semibold text-sm text-left">Gambar</th>
                        <th class="w-1/6 py-3 px-4 uppercase font-semibold text-sm text-left">Nama</th>
                        <th class="w-1/6 py-3 px-4 uppercase font-semibold text-sm text-left">Jenis</th>
                        <th class="w-1/6 py-3 px-4 uppercase font-semibold text-sm text-left">Harga/hari</th>
                        <th class="w-1/6 py-3 px-4 uppercase font-semibold text-sm text-left">Status</th>
                        <th class="w-1/6 py-3 px-4 uppercase font-semibold text-sm text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    @forelse($motors as $motor)
                    <tr class="border-b">
                        <td class="py-3 px-4"><img src="{{ asset('storage/motors/' . $motor->gambar) }}" alt="{{ $motor->nama }}" class="h-16 w-24 object-cover rounded"></td>
                        <td class="py-3 px-4 font-semibold">{{ $motor->nama }}</td>
                        <td class="py-3 px-4">{{ $motor->jenis }}</td>
                        <td class="py-3 px-4">Rp {{ number_format($motor->harga, 0, ',', '.') }}</td>
                        <td class="py-3 px-4">
                            <form action="{{ route('admin.motors.updateStatus', $motor) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <select name="status" onchange="this.form.submit()" class="{{ $motor->status == 'Tersedia' ? 'bg-green-200 text-green-800' : 'bg-red-200 text-red-800' }} rounded px-2 py-1">
                                    <option value="Tersedia" @if($motor->status == 'Tersedia') selected @endif>Tersedia</option>
                                    <option value="Disewa" @if($motor->status == 'Disewa') selected @endif>Disewa</option>
                                </select>
                            </form>
                        </td>
                        <td class="py-3 px-4 text-center">
                            <a href="{{ route('admin.motors.edit', $motor) }}" class="text-blue-500 hover:text-blue-700 mr-2">Edit</a>
                            <form action="{{ route('admin.motors.destroy', $motor) }}" method="POST" class="inline-block" onsubmit="return confirm('Apakah Anda yakin ingin menghapus motor ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center py-4">Belum ada data motor.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>