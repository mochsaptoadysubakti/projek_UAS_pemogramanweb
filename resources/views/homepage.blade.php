<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SpeedRent - Tentang Kami</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <style>
        body {
            /* Pastikan path ini benar di proyek Laravel Anda */
            background: url("{{ asset('images/backround.png') }}") no-repeat center center fixed;
            background-size: cover;
            scroll-behavior: smooth;
            background-color: #111827; /* Warna fallback jika gambar tidak termuat */
        }

        .bg-overlay {
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(3px);
            z-index: -1;
        }

        /* --- STYLING SIDEBAR --- */
        .sidebar {
            width: 16rem; /* 256px */
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #1f2937;
            transition: transform 0.3s ease-in-out;
            z-index: 50;
            overflow-y: auto;
        }

        .hidden-sidebar {
            transform: translateX(-100%);
        }

        #toggleSidebar {
            position: fixed;
            top: 1rem;
            left: 1rem;
            background-color: #111827;
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 0.5rem;
            z-index: 100;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        #toggleSidebar:hover {
            background-color: #374151;
            transform: scale(1.1);
        }

        /* --- STYLING LINK NAVIGASI --- */
        .nav-link {
            position: relative;
            display: flex;
            align-items: center;
            padding: 0.75rem 1rem;
            border-radius: 0.5rem;
            transition: all 0.3s ease;
            color: #9ca3af; /* Warna abu-abu untuk link tidak aktif */
            font-weight: 500;
        }
        
        .nav-link:hover {
             background-color: rgba(255, 255, 255, 0.1);
             color: white;
        }

        .nav-link.active {
            background-color: #3b82f6; /* Warna biru untuk link aktif */
            color: white;
            transform: translateX(10px);
            box-shadow: 0 4px 14px 0 rgba(59, 130, 246, 0.3);
        }

        .nav-link.active::before {
            content: '';
            position: absolute;
            left: -8px;
            width: 4px;
            height: 70%;
            background-color: white;
            border-radius: 4px;
        }

        /* --- ANIMASI KONTEN --- */
        .fade-in {
            opacity: 0;
            animation: fadeIn 1.5s ease-in-out forwards;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .floating-text {
            animation: floatText 3s ease-in-out infinite;
        }

        @keyframes floatText {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }

        .hidden-section {
            opacity: 0;
            transform: translateY(30px);
            transition: opacity 1s ease-out, transform 1s ease-out;
            will-change: opacity, transform;
        }

        .show-section {
            opacity: 1;
            transform: translateY(0);
        }
        
        /* CSS Tambahan untuk Accordion FAQ */
        .faq-answer {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.5s ease-in-out;
        }
    </style>
</head>

<body class="text-white relative">
    <div class="bg-overlay"></div>

    <button id="toggleSidebar">☰</button>

    <div class="flex">
        <aside id="sidebar" class="sidebar p-6 flex flex-col justify-between hidden-sidebar">
            <div>
                <div class="text-center mb-8">
                    <form action="{{ route('upload_profile') }}" method="POST" enctype="multipart/form-data" id="profileForm">
                        @csrf
                        <label for="profileUpload" class="cursor-pointer">
                            <img id="profileImage" src="{{ Auth::user()->profile_image ? asset('storage/' . Auth::user()->profile_image) : asset('default/profile.png') }}" class="w-20 h-20 rounded-full mx-auto border-4 border-gray-600 object-cover">
                            <input type="file" name="upload_profile" id="profileUpload" accept="image/*" class="hidden">
                        </label>
                    </form>
                    <h2 class="mt-4 font-semibold text-lg">Selamat Datang</h2>
                    <p class="text-gray-400 text-sm">{{ Auth::user()->name ?? 'Guest' }}</p>
                </div>

                <nav>
                    <ul class="space-y-3">
                        <li><a href="#hero" class="nav-link scroll-link"><i class="ph ph-house mr-3"></i><span>Beranda</span></a></li>
                        <li><a href="#tentang-kami" class="nav-link scroll-link"><i class="ph ph-info mr-3"></i><span>Tentang</span></a></li>
                        <li><a href="#benefits" class="nav-link scroll-link"><i class="ph ph-star mr-3"></i><span>Keunggulan</span></a></li>
                        <li><a href="#reviews" class="nav-link scroll-link"><i class="ph ph-chats mr-3"></i><span>Ulasan</span></a></li>
                        <li><a href="#gallery" class="nav-link scroll-link"><i class="ph ph-images mr-3"></i><span>Galeri</span></a></li>
                        <li><a href="#faq" class="nav-link scroll-link"><i class="ph ph-question mr-3"></i><span>FAQ</span></a></li>
                        <hr class="border-gray-700 my-4">
                        <li><a href="{{ route('sewa-motor') }}" class="nav-link"><i class="ph ph-motorcycle mr-3"></i><span>Sewa Motor</span></a></li>
                        <li><a href="{{ route('userprofile') }}" class="nav-link"><i class="ph ph-user mr-3"></i><span>Akun Pengguna</span></a></li>
                    </ul>
                </nav>

            </div>

            <div class="mt-auto">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="w-full flex items-center space-x-3 text-red-500 hover:text-red-400 transition-colors duration-300 p-3 rounded-lg hover:bg-red-500/10">
                        <i class="ph ph-sign-out text-xl"></i><span class="font-medium">Logout</span>
                    </button>
                </form>
            </div>
        </aside>

        <div class="flex-1 transition-all duration-300" id="content-wrapper">
            <main id="hero" class="h-screen flex flex-col items-center justify-center text-center p-4 fade-in">
                <h1 class="text-6xl font-bold">SpeedRent</h1>
                <p class="text-2xl mt-4 floating-text">Layanan terbaik untuk kebutuhan rental motor Anda</p>
            </main>

            <section id="tentang-kami" class="min-h-screen flex flex-col items-center justify-center text-center px-8 hidden-section">
                <h2 class="text-4xl font-bold">Tentang SpeedRent</h2>
                <p class="text-lg max-w-3xl mt-4">
                    SpeedRent adalah platform berbasis web yang dirancang untuk mempermudah proses penyewaan motor secara online.
                    Kami menghubungkan pemilik rental motor dengan pelanggan yang membutuhkan kendaraan dengan cara yang lebih cepat, aman, dan efisien.
                </p>
                <h3 class="text-3xl font-semibold mt-6">Visi</h3>
                <p class="text-lg max-w-3xl mt-2">
                    Menjadi platform rental motor terpercaya dan inovatif yang memberikan kemudahan, keamanan, dan kenyamanan bagi pelanggan.
                </p>
                <h3 class="text-3xl font-semibold mt-6">Misi</h3>
                <ul class="text-lg max-w-3xl mt-2 list-disc list-inside text-left">
                    <li>Menyediakan layanan rental motor yang mudah diakses melalui website.</li>
                    <li>Mengoptimalkan manajemen rental dengan fitur admin lengkap.</li>
                    <li>Menghadirkan pengalaman pengguna yang optimal dengan UI yang user-friendly.</li>
                </ul>
            </section>
            
            <section id="ajakan-sewa" class="relative bg-black hidden-section">
                <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('{{ asset('images/cta-background.jpg') }}');"></div>
                <div class="absolute inset-0 bg-black opacity-60"></div>
                <div class="relative container mx-auto px-6 py-24 text-center text-white">
                    <h2 class="text-4xl md:text-5xl font-bold mb-4" style="text-shadow: 2px 2px 4px rgba(0,0,0,0.7);">
                        Siap Memulai Petualangan Anda?
                    </h2>
                    <p class="text-lg md:text-xl mb-8" style="text-shadow: 1px 1px 2px rgba(0,0,0,0.7);">
                        Pilih dari beragam motor terbaik kami dengan harga terjangkau.
                    </p>
                    <a href="{{ route('sewa-motor') }}" class="bg-blue-600 text-white font-bold py-3 px-8 rounded-lg text-lg hover:bg-blue-500 transition-all transform hover:scale-105 duration-300 shadow-lg">
                        Lihat Pilihan Motor
                    </a>
                </div>
            </section>
            
            <section id="benefits" class="py-20 bg-gray-900 text-white hidden-section">
                <div class="container mx-auto px-6">
                    <h2 class="text-4xl font-bold text-center mb-12">Keunggulan Kami</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 text-center">
                        <div class="flex flex-col items-center p-4">
                            <i class="ph-fill ph-shield-check text-6xl mb-4 text-blue-500"></i>
                            <h3 class="text-xl font-semibold">Aman & Terpercaya</h3>
                        </div>
                        <div class="flex flex-col items-center p-4">
                            <i class="ph-fill ph-package text-6xl mb-4 text-blue-500"></i>
                            <h3 class="text-xl font-semibold">Antar-Jemput Gratis</h3>
                        </div>
                        <div class="flex flex-col items-center p-4">
                            <i class="ph-fill ph-headset text-6xl mb-4 text-blue-500"></i>
                            <h3 class="text-xl font-semibold">Dukungan 24/7</h3>
                        </div>
                        <div class="flex flex-col items-center p-4">
                            <i class="ph-fill ph-tag text-6xl mb-4 text-blue-500"></i>
                            <h3 class="text-xl font-semibold">Harga Terbaik</h3>
                        </div>
                    </div>
                </div>
            </section>

            <section id="reviews" class="py-20 bg-gray-800 hidden-section">
                <div class="container mx-auto px-6">
                    <h2 class="text-4xl font-bold text-center mb-16 text-white">Ulasan dari Klien Kami</h2>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                        <div class="bg-gray-700 p-8 rounded-xl shadow-lg transform hover:-translate-y-2 transition-transform duration-300">
                            <p class="text-gray-300 mb-6">"Pelayanannya cepat dan motornya dalam kondisi prima. Sangat memuaskan! Proses sewa dari awal sampai akhir sangat mudah."</p>
                            <div class="flex items-center">
                                <img src="https://i.pravatar.cc/150?u=olivia" class="w-12 h-12 rounded-full mr-4 object-cover border-2 border-blue-500">
                                <div>
                                    <p class="font-bold text-white">Olivia J.</p>
                                    <p class="text-sm text-gray-400">Turis Domestik</p>
                                </div>
                            </div>
                        </div>
                        <div class="bg-gray-700 p-8 rounded-xl shadow-lg transform hover:-translate-y-2 transition-transform duration-300">
                            <p class="text-gray-300 mb-6">"Stafnya sangat ramah dan informatif. Semua pertanyaan saya dijawab dengan baik. Motor yang saya dapatkan juga irit."</p>
                            <div class="flex items-center">
                                <img src="https://i.pravatar.cc/150?u=william" class="w-12 h-12 rounded-full mr-4 object-cover border-2 border-blue-500">
                                <div>
                                    <p class="font-bold text-white">William S.</p>
                                    <p class="text-sm text-gray-400">Mahasiswa</p>
                                </div>
                            </div>
                        </div>
                        <div class="bg-gray-700 p-8 rounded-xl shadow-lg transform hover:-translate-y-2 transition-transform duration-300">
                            <p class="text-gray-300 mb-6">"Pilihan motornya banyak dan harganya sangat bersaing. Proses booking online sangat praktis. Pengalaman terbaik."</p>
                            <div class="flex items-center">
                                <img src="https://i.pravatar.cc/150?u=michael" class="w-12 h-12 rounded-full mr-4 object-cover border-2 border-blue-500">
                                <div>
                                    <p class="font-bold text-white">Michael B.</p>
                                    <p class="text-sm text-gray-400">Pekerja Lepas</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section id="gallery" class="py-20 bg-black hidden-section">
                <div class="container mx-auto px-6">
                    <h2 class="text-4xl font-bold text-center mb-12 text-white">Momen Klien Kami</h2>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                        <div class="overflow-hidden rounded-lg">
                           <img src="images/foto1.jpg" alt="foto1.jpg" class="h-full w-full object-cover transform hover:scale-110 transition-transform duration-500 cursor-pointer">
                        </div>
                        <div class="overflow-hidden rounded-lg">
                            <img src="images/foto2.jpg" alt="foto2.jpg" class="h-full w-full object-cover transform hover:scale-110 transition-transform duration-500 cursor-pointer">
                        </div>
                        <div class="overflow-hidden rounded-lg">
                             <img src="images/foto3.jpg" alt="foto3.jpg" class="h-full w-full object-cover transform hover:scale-110 transition-transform duration-500 cursor-pointer">
                        </div>
                        <div class="overflow-hidden rounded-lg">
                             <img src="images/foto4.jpg" alt="foto4.jpg" class="h-full w-full object-cover transform hover:scale-110 transition-transform duration-500 cursor-pointer">
                        </div>
                        <div class="overflow-hidden rounded-lg">
                            <img src="images/foto5.jpeg" alt="foto5.jpg" class="h-full w-full object-cover transform hover:scale-110 transition-transform duration-500 cursor-pointer">
                        </div>
                        <div class="overflow-hidden rounded-lg">
                            <img src="images/foto6.jpg" alt="foto6.jpg" class="h-full w-full object-cover transform hover:scale-110 transition-transform duration-500 cursor-pointer">
                        </div>
                        <div class="overflow-hidden rounded-lg">
                            <img src="images/foto7.jpg" alt="foto7.jpg" class="h-full w-full object-cover transform hover:scale-110 transition-transform duration-500 cursor-pointer">
                        </div>
                        <div class="overflow-hidden rounded-lg">
                             <img src="images/foto8.jpeg" alt="foto8.jpg" class="h-full w-full object-cover transform hover:scale-110 transition-transform duration-500 cursor-pointer">
                        </div>
                    </div>
                </div>
            </section>

            <section id="faq" class="py-20 bg-gray-900 hidden-section">
                <div class="container mx-auto px-6 max-w-4xl">
                    <h2 class="text-4xl font-bold text-center mb-12 text-white">Pertanyaan Umum (FAQ)</h2>
                    <div class="space-y-4">
                        <div class="bg-gray-800 rounded-lg">
                            <button class="w-full flex justify-between items-center text-left p-6 faq-question">
                                <span class="text-lg font-medium text-white">Apa saja syarat untuk menyewa motor?</span>
                                <i class="ph ph-plus text-2xl text-white transition-transform duration-300"></i>
                            </button>
                            <div class="faq-answer">
                                <p class="px-6 pb-6 text-gray-300">Anda memerlukan KTP/Paspor yang valid, SIM C yang masih berlaku, dan bersedia untuk kami foto sebagai dokumentasi.</p>
                            </div>
                        </div>
                        <div class="bg-gray-800 rounded-lg">
                            <button class="w-full flex justify-between items-center text-left p-6 faq-question">
                                <span class="text-lg font-medium text-white">Bagaimana jika motor mengalami kerusakan?</span>
                                <i class="ph ph-plus text-2xl text-white transition-transform duration-300"></i>
                            </button>
                            <div class="faq-answer">
                                <p class="px-6 pb-6 text-gray-300">Segera hubungi tim dukungan kami yang tersedia 24/7. Kami akan memberikan panduan dan bantuan secepatnya.</p>
                            </div>
                        </div>
                        <div class="bg-gray-800 rounded-lg">
                            <button class="w-full flex justify-between items-center text-left p-6 faq-question">
                                <span class="text-lg font-medium text-white">Apakah saya bisa memperpanjang masa sewa?</span>
                                <i class="ph ph-plus text-2xl text-white transition-transform duration-300"></i>
                            </button>
                            <div class="faq-answer">
                                <p class="px-6 pb-6 text-gray-300">Tentu saja. Anda bisa memperpanjang masa sewa dengan menghubungi kami setidaknya 1 hari sebelum masa sewa berakhir.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            
            <footer class="bg-black text-white pt-16 pb-8">
                <div class="container mx-auto px-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10">
                        <div class="mb-8 md:mb-0">
                            <h3 class="text-2xl font-bold mb-2">SpeedRent</h3>
                            <p class="text-gray-400 mb-4">Solusi rental motor cepat, aman, dan terpercaya untuk petualangan Anda.</p>
                            <div class="flex space-x-4">
                                <a href="#" class="text-gray-400 hover:text-blue-500 transition-colors"><i class="ph-fill ph-facebook-logo text-2xl"></i></a>
                                <a href="#" class="text-gray-400 hover:text-blue-500 transition-colors"><i class="ph-fill ph-instagram-logo text-2xl"></i></a>
                                <a href="#" class="text-gray-400 hover:text-blue-500 transition-colors"><i class="ph-fill ph-twitter-logo text-2xl"></i></a>
                                <a href="#" class="text-gray-400 hover:text-blue-500 transition-colors"><i class="ph-fill ph-tiktok-logo text-2xl"></i></a>
                            </div>
                        </div>
            
                        <div>
                            <h4 class="font-bold text-lg mb-4">Tautan Cepat</h4>
                            <ul class="space-y-2">
                                <li><a href="#tentang-kami" class="text-gray-400 hover:text-white transition-colors scroll-link">Tentang Kami</a></li>
                                <li><a href="#benefits" class="text-gray-400 hover:text-white transition-colors scroll-link">Keunggulan</a></li>
                                <li><a href="#reviews" class="text-gray-400 hover:text-white transition-colors scroll-link">Ulasan</a></li>
                                <li><a href="#faq" class="text-gray-400 hover:text-white transition-colors scroll-link">FAQ</a></li>
                            </ul>
                        </div>
            
                        <div>
                            <h4 class="font-bold text-lg mb-4">Layanan</h4>
                            <ul class="space-y-2">
                                <li><a href="{{ route('sewa-motor') }}" class="text-gray-400 hover:text-white transition-colors">Sewa Motor</a></li>
                                <li><a href="{{ route('userprofile') }}" class="text-gray-400 hover:text-white transition-colors">Profil Akun</a></li>
                                <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Syarat & Ketentuan</a></li>
                            </ul>
                        </div>
            
                        <div>
                            <h4 class="font-bold text-lg mb-4">Hubungi Kami</h4>
                            <ul class="space-y-3 text-gray-400">
                                <li class="flex items-start">
                                    <i class="ph ph-map-pin-line mr-3 mt-1"></i>
                                    <span>Jl. Raya Teknik Kimia, Surabaya, Jawa Timur, Indonesia</span>
                                </li>
                                <li class="flex items-center">
                                    <i class="ph ph-phone-call mr-3"></i>
                                    <span>+62 812 3456 7890</span>
                                </li>
                                <li class="flex items-center">
                                    <i class="ph ph-envelope-simple mr-3"></i>
                                    <span>kontak@speedrent.com</span>
                                </li>
                            </ul>
                        </div>
                    </div>
            
                    <div class="border-t border-gray-800 mt-12 pt-8 text-center">
                        <p class="text-gray-500 text-sm">
                            &copy; <span id="copyright-year"></span> SpeedRent. All Rights Reserved.
                        </p>
                    </div>
                </div>
            </footer>

        </div>
    </div>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sidebar = document.getElementById("sidebar");
            const toggleButton = document.getElementById("toggleSidebar");
            const contentWrapper = document.getElementById("content-wrapper");

            // 1. Logika untuk Toggle Sidebar
            toggleButton.addEventListener("click", () => {
                sidebar.classList.toggle("hidden-sidebar");
                if (!sidebar.classList.contains("hidden-sidebar") && window.innerWidth > 768) {
                    contentWrapper.style.marginLeft = "16rem";
                } else {
                    contentWrapper.style.marginLeft = "0";
                }
            });

            // 2. Logika untuk Animasi Section saat di-scroll
            const sections = document.querySelectorAll('.hidden-section');
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('show-section');
                        observer.unobserve(entry.target);
                    }
                });
            }, {
                threshold: 0.1
            });
            sections.forEach(section => {
                observer.observe(section);
            });

            // 3. Logika untuk Smooth Scroll dan Navigasi Aktif
            const navLinks = document.querySelectorAll(".scroll-link");
            navLinks.forEach(link => {
                link.addEventListener("click", function(e) {
                    e.preventDefault();
                    const targetId = this.getAttribute("href");
                    const targetElement = document.querySelector(targetId);
                    
                    if (targetElement) {
                        targetElement.scrollIntoView({ behavior: "smooth" });
                        if (window.innerWidth < 768) {
                            sidebar.classList.add("hidden-sidebar");
                        }
                    }
                });
            });

            const allLinks = document.querySelectorAll('.nav-link');
            allLinks.forEach(link => {
                link.addEventListener('click', function() {
                    allLinks.forEach(nav => nav.classList.remove('active'));
                    this.classList.add('active');
                });
            });


            // 4. Logika untuk Preview + Auto Submit Gambar Profil
            const profileUpload = document.getElementById('profileUpload');
            if (profileUpload) {
                profileUpload.addEventListener('change', function(event) {
                    const file = event.target.files[0];
                    if (file) {
                        const reader = new FileReader();
                        reader.onload = e => {
                            document.getElementById('profileImage').src = e.target.result;
                        };
                        reader.readAsDataURL(file);
                        document.getElementById('profileForm').submit();
                    }
                });
            }
            
            // 5. Logika untuk Accordion FAQ
            const faqQuestions = document.querySelectorAll('.faq-question');
            faqQuestions.forEach(button => {
                button.addEventListener('click', () => {
                    const answer = button.nextElementSibling;
                    const icon = button.querySelector('i');

                    if (answer.style.maxHeight) {
                        answer.style.maxHeight = null;
                        icon.style.transform = 'rotate(0deg)';
                    } else {
                        answer.style.maxHeight = answer.scrollHeight + "px";
                        icon.style.transform = 'rotate(45deg)';
                    }
                });
            });
            
            // 6. Logika untuk Copyright Year Dinamis
            const yearSpan = document.getElementById('copyright-year');
            if(yearSpan) {
                yearSpan.textContent = new Date().getFullYear();
            }

        });
    </script>
</body>
</html>