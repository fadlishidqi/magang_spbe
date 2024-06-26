<!-- resources/views/home.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Layanan SPBE Kota Pekalongan</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap" rel="stylesheet">
    @vite('resources/css/app.css')
</head>

<body class="font-sans antialiased">
    <header class="flex justify-between items-center p-4 bg-white shadow">
        <div class="flex items-center space-x-4">
            <img src="{{ asset('images/logo_pemkot.png') }}" alt="Logo" class="h-16">
            <div class="font-bold font-poppins text-2xl leading-none">
                <span>DISKOMINFO</span><br>
                <span class="text-lg leading-tight">Kota Pekalongan</span>
            </div>
        </div>

        <nav class="space-x-4">
            <a href="#" class="text-gray-800"></a>
            <a href="#" class="text-gray-800">Layanan</a>
            <a href="#" class="text-gray-800">Tracking</a>
            <a href="#" class="text-gray-800">FAQ</a>
            <a href="#" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded transition-colors duration-300">Login</a>
        </nav>
    </header>
    <section class="bg-cover bg-center text-white text-center p-20" style="background-image: url('/path/to/your/background/image.jpg');">
        <h1 class="text-4xl font-bold">Manajemen Layanan SPBE Kota Pekalongan</h1>
        <p class="mt-4 max-w-2xl mx-auto">Portal layanan yang bertujuan untuk meningkatkan efisiensi dan kualitas kinerja layanan. Dengan mengadopsi teknologi digital, sistem ini menyediakan solusi terpadu yang mempermudah akses dan meningkatkan transparansi layanan pemerintahan.</p>
    </section>
    <section class="my-8 max-w-4xl mx-auto text-center">
    <div class="relative inline-block">
        <input type="text" placeholder="Cari Layanan..." class="w-56 sm:w-64 p-3 pl-10 pr-10 border rounded-full bg-gray-100 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
        <div class="absolute inset-y-0 left-0 flex items-center pl-3">
            <img src="{{ asset('path/to/magnifier-icon.png') }}" alt="Search Icon" class="w-5 h-5 text-gray-400">
        </div>
        <img src="{{ asset('path/to/search-background.jpg') }}" alt="Background Image" class="absolute inset-0 w-full h-full object-cover rounded-full">
    </div>
    <div class="flex justify-between mt-4 space-x-4">
        <div class="bg-white p-8 rounded-xl shadow-lg flex-1">
            <img src="{{ asset('images/layanan.png') }}" alt="Layanan Icon" class="h-12 mb-4 ml-2">
            <div class="text-left ml-2">
                <h2 class="text-2xl font-semibold">Layanan</h2>
                <p class="mt-2">Ajukan keluhan dan tinjau Prosedur Operasional Standar (SOP) untuk layanan yang tersedia.</p>
            </div>
        </div>
        <div class="bg-white p-8 rounded-xl shadow-lg flex-1">
            <img src="{{ asset('images/pelaporan.png') }}" alt="Pelaporan Icon" class="h-12 mb-4 ml-2">
            <div class="text-left ml-2">
                <h2 class="text-2xl font-semibold">Pelaporan</h2>
                <p class="mt-2">Ajukan keluhan dan tinjau Prosedur Operasional Standar (SOP) untuk layanan yang tersedia.</p>
            </div>
        </div>
        <div class="bg-white p-8 rounded-xl shadow-lg flex-1">
            <img src="{{ asset('images/tracking.png') }}" alt="Tracking Icon" class="h-12 mb-4 ml-2">
            <div class="text-left ml-2">
                <h2 class="text-2xl font-semibold">Tracking</h2>
                <p class="mt-2">Lacak aduan yang telah dilakukan menggunakan tiket unik yang telah diberikan.</p>
            </div>
        </div>
    </div>
</section>

    <footer class="bg-gray-100 p-8 text-center">
        <p>DISKOMINFO Kota Pekalongan</p>
        <p>Dinas Komunikasi dan Informatika Kota Pekalongan adalah Organisasi Perangkat Daerah yang dibentuk untuk menyelenggarakan urusan Pemerintahan bidang informasi dan komunikasi publik, bidang infrastruktur dan statistika, bidang aplikasi dan persandian.</p>
        <div class="mt-4">
            <p>Kontak Kami:</p>
            <p>📞 (0285) 421243</p>
            <p>✉️ diskominfo@pekalongankota.go.id</p>
            <p>🏠 Jl. Majapahit No.5 Pekalongan</p>
        </div>
    </footer>
    @vite('resources/js/app.js')
</body>
</html>
