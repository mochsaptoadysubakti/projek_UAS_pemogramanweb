<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sewa Motor - SpeedRent</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/all.min.js"></script>
    <style>
        html {
            scroll-behavior: smooth;
        }
        /* Tambahkan style untuk motor yang tidak tersedia */
        .motor-disewa {
            position: relative;
            opacity: 0.6; /* Membuat kartu tampak redup */
        }
        .motor-disewa::after {
            content: 'DISEWA';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) rotate(-15deg);
            background-color: rgba(239, 68, 68, 0.8); /* Merah dengan transparansi */
            color: white;
            font-weight: bold;
            font-size: 1.5rem;
            padding: 0.5rem 2rem;
            border: 2px solid white;
            border-radius: 0.5rem;
            pointer-events: none; /* Agar tidak mengganggu klik */
            z-index: 10;
        }
    </style>
</head>
<body class="bg-gray-900 text-white">

    <nav class="bg-gray-800 p-4 flex justify-center items-center relative h-16">
        <div id="container" class="relative w-full flex justify-center items-center">
            <h1 id="title" class="text-2xl font-bold transition-opacity duration-300 absolute">SpeedRent</h1>
            <div id="menu" class="hidden absolute flex flex-col md:flex-row space-y-2 md:space-y-0 md:space-x-6 bg-gray-800 p-4 rounded-lg shadow-lg w-full justify-center top-16 md:top-auto">
                <a href="{{ route('homepage') }}" class="flex items-center text-blue-400 hover:text-white">
                    <i class="fas fa-home mr-2"></i> Homepage
                </a>
                <a href="{{ route('userprofile') }}" class="flex items-center text-blue-400 hover:text-white">
                    <i class="fas fa-user mr-2"></i> Akun Pengguna
                </a>
                <a href="#" class="flex items-center text-blue-400 hover:text-white">
                    <i class="fas fa-question-circle mr-2"></i> Bantuan
                </a>
                <a href="#" class="flex items-center text-blue-400 hover:text-white">
                    <i class="fas fa-tools mr-2"></i> Layanan
                </a>
                <a href="#sport" onclick="scrollToSection('sport')" class="flex items-center text-blue-400 hover:text-white">
                    <i class="fas fa-motorcycle mr-2"></i> Motor Sport
                </a>
                <a href="#bebek" onclick="scrollToSection('bebek')" class="flex items-center text-blue-400 hover:text-white">
                    <i class="fas fa-motorcycle mr-2"></i> Motor Bebek
                </a>
                <a href="#matic" onclick="scrollToSection('matic')" class="flex items-center text-blue-400 hover:text-white">
                    <i class="fas fa-motorcycle mr-2"></i> Motor Matic
                </a>
            </div>
        </div>
        <button onclick="toggleMenu()" class="text-white bg-gray-700 px-4 py-2 rounded absolute right-4">
            ☰
        </button>
    </nav>

    <section id="sport" class="container mx-auto mt-16 p-6 bg-gray-800 rounded-lg">
        <h3 class="text-2xl font-semibold text-center">Motor Sport</h3>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6">
            @foreach($motors->where('jenis', 'Sport') as $motor)
                <div class="bg-gray-700 p-4 rounded-lg text-center flex flex-col justify-between @if($motor->status != 'Tersedia') motor-disewa @endif">
                    <div>
                        <img src="{{ asset('images/' . $motor->gambar) }}" alt="{{ $motor->nama }}" class="mx-auto h-48 object-cover mb-4 rounded">
                        <h4 class="text-xl mt-2 font-semibold">{{ $motor->nama }}</h4>
                        <p class="text-gray-300">Rp {{ number_format($motor->harga, 0, ',', '.') }}/hari</p>
                    </div>
                    @if($motor->status == 'Tersedia')
                        <a href="{{ route('transaksi.create', ['motor' => $motor->id]) }}" class="bg-blue-500 hover:bg-blue-600 px-4 py-2 rounded mt-4 inline-block text-white font-semibold transition-colors">Sewa</a>
                    @else
                        <button class="bg-gray-500 px-4 py-2 rounded mt-4 inline-block text-white font-semibold cursor-not-allowed" disabled>Disewa</button>
                    @endif
                </div>
            @endforeach
        </div>
    </section>

    <section id="bebek" class="container mx-auto mt-16 p-6 bg-gray-800 rounded-lg">
        <h3 class="text-2xl font-semibold text-center">Motor Bebek</h3>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6">
            @foreach($motors->where('jenis', 'Bebek') as $motor)
                 <div class="bg-gray-700 p-4 rounded-lg text-center flex flex-col justify-between @if($motor->status != 'Tersedia') motor-disewa @endif">
                    <div>
                        <img src="{{ asset('images/' . $motor->gambar) }}" alt="{{ $motor->nama }}" class="mx-auto h-48 object-cover mb-4 rounded">
                        <h4 class="text-xl mt-2 font-semibold">{{ $motor->nama }}</h4>
                        <p class="text-gray-300">Rp {{ number_format($motor->harga, 0, ',', '.') }}/hari</p>
                    </div>
                     @if($motor->status == 'Tersedia')
                        <a href="{{ route('transaksi.create', ['motor' => $motor->id]) }}" class="bg-blue-500 hover:bg-blue-600 px-4 py-2 rounded mt-4 inline-block text-white font-semibold transition-colors">Sewa</a>
                    @else
                        <button class="bg-gray-500 px-4 py-2 rounded mt-4 inline-block text-white font-semibold cursor-not-allowed" disabled>Disewa</button>
                    @endif
                </div>
            @endforeach
        </div>
    </section>

    <section id="matic" class="container mx-auto mt-16 p-6 bg-gray-800 rounded-lg">
        <h3 class="text-2xl font-semibold text-center">Motor Matic</h3>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6">
            @foreach($motors->where('jenis', 'Matic') as $motor)
                 <div class="bg-gray-700 p-4 rounded-lg text-center flex flex-col justify-between @if($motor->status != 'Tersedia') motor-disewa @endif">
                    <div>
                        <img src="{{ asset('images/' . $motor->gambar) }}" alt="{{ $motor->nama }}" class="mx-auto h-48 object-cover mb-4 rounded">
                        <h4 class="text-xl mt-2 font-semibold">{{ $motor->nama }}</h4>
                        <p class="text-gray-300">Rp {{ number_format($motor->harga, 0, ',', '.') }}/hari</p>
                    </div>
                     @if($motor->status == 'Tersedia')
                        <a href="{{ route('transaksi.create', ['motor' => $motor->id]) }}" class="bg-blue-500 hover:bg-blue-600 px-4 py-2 rounded mt-4 inline-block text-white font-semibold transition-colors">Sewa</a>
                    @else
                        <button class="bg-gray-500 px-4 py-2 rounded mt-4 inline-block text-white font-semibold cursor-not-allowed" disabled>Disewa</button>
                    @endif
                </div>
            @endforeach
        </div>
    </section>

    <script>
        function scrollToSection(id) {
            const section = document.getElementById(id);
            if (section) {
                section.scrollIntoView({ behavior: 'smooth' });
            }
        }

        function toggleMenu() {
            const menu = document.getElementById('menu');
            const title = document.getElementById('title');
            if (menu.classList.contains('hidden')) {
                menu.classList.remove('hidden');
                title.classList.add('hidden');
            } else {
                menu.classList.add('hidden');
                title.classList.remove('hidden');
            }
        }
    </script>

</body>
</html>