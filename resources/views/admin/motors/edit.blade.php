<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Edit Motor</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto mt-10 p-5">
        <h1 class="text-2xl font-bold mb-5">Edit Data Motor</h1>

        <div class="bg-white p-8 rounded-lg shadow-md">
            <form action="{{ route('admin.motors.update', $motor) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="nama" class="block text-gray-700 font-bold mb-2">Nama Motor</label>
                    <input type="text" name="nama" id="nama" value="{{ $motor->nama }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" required>
                </div>
                <div class="mb-4">
                    <label for="jenis" class="block text-gray-700 font-bold mb-2">Jenis Motor</label>
                    <select name="jenis" id="jenis" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" required>
                        <option value="Sport" @if($motor->jenis == 'Sport') selected @endif>Sport</option>
                        <option value="Bebek" @if($motor->jenis == 'Bebek') selected @endif>Bebek</option>
                        <option value="Matic" @if($motor->jenis == 'Matic') selected @endif>Matic</option>
                    </select>
                </div>
                 <div class="mb-4">
                    <label for="harga" class="block text-gray-700 font-bold mb-2">Harga per Hari (Rp)</label>
                    <input type="number" name="harga" id="harga" value="{{ $motor->harga }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" required>
                </div>
                <div class="mb-4">
                    <label for="deskripsi" class="block text-gray-700 font-bold mb-2">Deskripsi</label>
                    <textarea name="deskripsi" id="deskripsi" rows="4" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700">{{ $motor->deskripsi }}</textarea>
                </div>
                 <div class="mb-4">
                    <label for="gambar" class="block text-gray-700 font-bold mb-2">Ganti Gambar (Opsional)</label>
                    <input type="file" name="gambar" id="gambar" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700">
                    <p class="text-sm text-gray-500 mt-2">Gambar saat ini: <img src="{{ asset('storage/' . $motor->gambar) }}" class="h-16 inline-block"></p>
                </div>
                <div class="flex items-center justify-between">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Perbarui Motor
                    </button>
                    <a href="{{ route('admin.motors.index') }}" class="text-gray-600">Batal</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>