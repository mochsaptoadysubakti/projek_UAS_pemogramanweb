<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Tambah Motor</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto mt-10 p-5">
        <h1 class="text-2xl font-bold mb-5">Tambah Motor Baru</h1>

        <div class="bg-white p-8 rounded-lg shadow-md">
            <form action="{{ route('admin.motors.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label for="nama" class="block text-gray-700 font-bold mb-2">Nama Motor</label>
                    <input type="text" name="nama" id="nama" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                </div>
                <div class="mb-4">
                    <label for="jenis" class="block text-gray-700 font-bold mb-2">Jenis Motor</label>
                    <select name="jenis" id="jenis" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" required>
                        <option value="Sport">Sport</option>
                        <option value="Bebek">Bebek</option>
                        <option value="Matic">Matic</option>
                    </select>
                </div>
                 <div class="mb-4">
                    <label for="harga" class="block text-gray-700 font-bold mb-2">Harga per Hari (Rp)</label>
                    <input type="number" name="harga" id="harga" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" required>
                </div>
                <div class="mb-4">
                    <label for="deskripsi" class="block text-gray-700 font-bold mb-2">Deskripsi</label>
                    <textarea name="deskripsi" id="deskripsi" rows="4" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700"></textarea>
                </div>
                 <div class="mb-4">
                    <label for="gambar" class="block text-gray-700 font-bold mb-2">Gambar Motor</label>
                    <input type="file" name="gambar" id="gambar" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" required>
                </div>
                <div class="flex items-center justify-between">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Simpan Motor
                    </button>
                    <a href="{{ route('admin.motors.index') }}" class="text-gray-600">Batal</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>