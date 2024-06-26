<!-- resources/views/home.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Layanan SPBE Kota Pekalongan</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap" rel="stylesheet">
    @vite('resources/css/app.css')
    <!-- ini muti -->
    <style>
        a {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>

<!-- HEADER NAVBAR -->
<body class="font-sans antialiased">
    <header class="flex justify-between items-center p-4 bg-white shadow">
        <div class="flex items-center space-x-3 ml-10"> <!-- ini muti -->
            <img src="{{ asset('images/logo_pemkot.png') }}" alt="Logo" class="h-16">
            <div class="font-bold font-poppins text-xl leading-none">
                <span>DISKOMINFO</span><br>
                <span class="text-md leading-tight">Kota Pekalongan</span>
            </div>
        </div>
        <!-- ini muti -->
        <nav class="space-x-16">
            <a href="#" class="text-gray-800 font-bold text-md">Beranda</a>
            <a href="#" class="text-gray-800 font-bold text-md">Layanan</a>
            <a href="#" class="text-gray-800 font-bold text-md">Tracking</a>
            <a href="#" class="text-gray-800 font-bold text-md">FAQ</a>
            <a href="#" class="bg-blue-500 hover:bg-blue-600 text-white px-10 py-3 rounded-3xl transition-colors duration-300 font-bold text-md shadow-2xl">Login</a>
        </nav>
    </header>

    <!-- CONTENT -->
    <section class="bg-cover bg-center text-white text-center p-20" style="background-image: url('/path/to/your/background/image.jpg');">
        <h1 class="text-4xl font-bold">Manajemen Layanan SPBE Kota Pekalongan</h1>
        <p class="mt-4 max-w-2xl mx-auto">Portal layanan yang bertujuan untuk meningkatkan efisiensi dan kualitas kinerja layanan. Dengan mengadopsi teknologi digital, sistem ini menyediakan solusi terpadu yang mempermudah akses dan meningkatkan transparansi layanan pemerintahan.</p>
    </section>

    <!-- SEARCH BAR -->
    <section class="my-8 max-w-4xl mx-auto text-center">
    <div class="relative inline-block w-2/3 sm:w-1/2 lg:w-2/3">
        <input type="text" placeholder="Cari Layanan..." class="w-full p-2 pl-4 pr-12 border rounded-full bg-gray-100 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
        <div class="absolute inset-y-0 right-0 flex items-center pr-3">
            <img src="{{ asset('images/search.png') }}" alt="Search Icon" class="w-5 h-5 text-gray-400">
        </div>
    </div>

    <!-- CARD BUTTON -->
    <div class="flex justify-between mt-4 space-x-4">
        <div class="bg-white p-8 rounded-xl shadow-lg flex-1">
            <img src="{{ asset('images/layanan.png') }}" alt="Layanan Icon" class="h-12 mb-4 ml-2">
            <div class="text-left ml-2">
                <h2 class="text-2xl font-bold">Layanan</h2>
                <p class="mt-2">Ajukan keluhan dan tinjau Prosedur Operasional Standar (SOP) untuk layanan yang tersedia.</p>
            </div>
        </div>
        <div class="bg-white p-8 rounded-xl shadow-lg flex-1">
            <img src="{{ asset('images/pelaporan.png') }}" alt="Pelaporan Icon" class="h-12 mb-4 ml-2">
            <div class="text-left ml-2">
                <h2 class="text-2xl font-bold">Pelaporan</h2>
                <p class="mt-2">Ajukan keluhan dan tinjau Prosedur Operasional Standar (SOP) untuk layanan yang tersedia.</p>
            </div>
        </div>
        <div class="bg-white p-8 rounded-xl shadow-lg flex-1">
            <img src="{{ asset('images/tracking.png') }}" alt="Tracking Icon" class="h-12 mb-4 ml-2">
            <div class="text-left ml-2">
                <h2 class="text-2xl font-bold">Tracking</h2>
                <p class="mt-2">Lacak aduan yang telah dilakukan menggunakan tiket unik yang telah diberikan.</p>
            </div>
        </div>
    </div>
</section>

    <!-- FOOTER -->
<footer class="bg-gray-100 p-8 text-center sm:text-left">
    <div class="flex flex-col sm:flex-row items-start sm:items-start justify-between max-w-7xl mx-auto">
        <div class="flex flex-col items-start mb-4 sm:mb-0">
            <div class="flex items-center">
                <img src="{{ asset('images/logo_pemkot.png') }}" alt="Logo" class="h-16 mr-4">
                <div>
                    <p class="font-bold text-xl">DISKOMINFO</p>
                    <p class="font-bold text-xl">Kota Pekalongan</p>
                </div>
            </div>
            <p class="text-sm md:text-base mt-4 max-w-sm">Dinas Komunikasi dan Informatika Kota Pekalongan adalah Organisasi Perangkat Daerah yang dibentuk untuk menyelenggarakan urusan Pemerintahan bidang informasi dan komunikasi publik, bidang infrastruktur dan statistika, bidang aplikasi dan persandian.</p>
        </div>
        <div class="flex flex-col items-start mt-4 sm:mt-20 sm:ml-4">
            <p class="font-semibold text-lg">Kontak Kami:</p>
            <p style="font-size: 18px;">📞 (0285) 421243</p>
            <p style="font-size: 18px;">✉️ diskominfo@pekalongankota.go.id</p>
            <p style="font-size: 18px;">🏠 Jl. Majapahit No.5 Pekalongan</p>
        </div>
    </div>
    <div class="flex items-center justify-start mt-4 sm:ml-20">
        <img src="{{ asset('images/facebook.png') }}" alt="Small Logo 1" class="h-6 mr-4">
        <img src="{{ asset('images/x.png') }}" alt="Small Logo 2" class="h-6 mr-4">
        <img src="{{ asset('images/ig.png') }}" alt="Small Logo 3" class="h-6 mr-4">
        <img src="{{ asset('images/yutub.png') }}" alt="Small Logo 4" class="h-6 mr-4">
    </div>

    <div class="mt-8 text-gray-500 text-center">
        <p>© 2024 Sistem Layanan SPBE, by Diskominfo Kota Pekalongan</p>
    </div>
</footer>
    @vite('resources/js/app.js')
</body>
</html>
