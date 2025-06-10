<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Profil</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 min-h-screen flex items-center justify-center relative">

    <!-- Notifikasi Sukses dengan Animasi -->
    @if (session('success'))
        <div id="success-alert" class="absolute top-10 left-1/2 transform -translate-x-1/2 bg-green-600 text-white px-4 py-2 rounded-md shadow-md text-sm opacity-0 translate-y-[-10px] transition-all duration-500">
            {{ session('success') }}
        </div>
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                const alertBox = document.getElementById('success-alert');

                // Efek notifikasi muncul
                setTimeout(() => {
                    alertBox.classList.remove('opacity-0', '-translate-y-5');
                    alertBox.classList.add('opacity-100', 'translate-y-0');
                }, 100);

                // Hilangkan setelah 2 detik
                setTimeout(() => {
                    alertBox.classList.remove('opacity-100', 'translate-y-0');
                    alertBox.classList.add('opacity-0', '-translate-y-5');
                    setTimeout(() => alertBox.remove(), 500);
                }, 2000);
            });
        </script>
    @endif

    <!-- Container dengan animasi masuk -->
    <div id="profile-container" class="bg-gray-800 text-white rounded-xl shadow-lg p-6 w-full max-w-sm relative opacity-0 translate-x-10 transition-all duration-700 ease-in-out">
        <h2 class="text-center text-2xl font-semibold mb-6">Edit Profil</h2>

        <form action="{{ route('upload_profile') }}" method="POST" enctype="multipart/form-data" id="profileForm">
            @csrf
            <label for="profileUpload" class="cursor-pointer">
                <img id="profileImage"
                    src="{{ Auth::user()->profile_image ? asset('storage/' . Auth::user()->profile_image) : asset('default/profile.png') }}"
                    class="w-20 h-20 rounded-full mx-auto border-2 border-gray-300 object-cover">
                <input type="file" name="upload_profile" id="profileUpload" accept="image/*" class="hidden" onchange="document.getElementById('profileForm').submit();">
            </label>

            <div class="flex justify-center mb-6 relative">
                <label for="profile_photo" class="relative group cursor-pointer">
                    <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition duration-200">
                        <span class="text-sm bg-black bg-opacity-50 px-2 py-1 rounded">Ganti Foto</span>
                    </div>
                    <input type="file" name="profile_photo" id="profile_photo" accept="image/*" class="hidden" onchange="previewImage(event)">
                </label>
            </div>

            <!-- Input Fields dengan Efek Interaktif -->
            <div class="group">
                <label for="name" class="block text-sm font-medium mb-1">Nama</label>
                <input type="text" name="name" id="name" value="{{ $user->name }}"
                    class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500 transition-all duration-300 ease-in-out transform group-hover:scale-105 group-hover:-translate-y-1 focus:scale-105 focus:-translate-y-1">
            </div>

            <div class="group mt-4">
                <label for="phone" class="block text-sm font-medium mb-1">No Handphone</label>
                <input type="text" name="phone" id="phone" value="{{ $user->phone ?? '' }}"
                    class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500 transition-all duration-300 ease-in-out transform group-hover:scale-105 group-hover:-translate-y-1 focus:scale-105 focus:-translate-y-1">
            </div>

            <div class="group mt-4">
                <label for="email" class="block text-sm font-medium mb-1">Email</label>
                <input type="email" name="email" id="email" value="{{ $user->email }}" readonly
                    class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-md focus:outline-none cursor-not-allowed text-gray-400">
            </div>

            <div class="pt-4">
                <button type="submit"
                    class="w-full bg-purple-600 hover:bg-purple-700 text-white font-semibold py-2 rounded-md transition">
                    Simpan Perubahan
                </button>
            </div>
        </form>

        <!-- Tombol Kembali ke Homepage -->
        <div class="mt-4 text-center">
            <a href="{{ route('homepage') }}" class="text-gray-300 hover:text-white underline">
                Kembali ke Homepage
            </a>
        </div>
    </div>

    <script>
        function previewImage(event) {
            const reader = new FileReader();
            reader.onload = function () {
                document.getElementById('profileImage').src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        }

        // Efek animasi masuk container
        document.addEventListener("DOMContentLoaded", function () {
            setTimeout(() => {
                const profileContainer = document.getElementById('profile-container');
                profileContainer.classList.remove('opacity-0', 'translate-x-10');
                profileContainer.classList.add('opacity-100', 'translate-x-0');
            }, 200);
        });
    </script>

</body>
</html>
