<!-- resources/views/home.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Layanan SPBE Kota Pekalongan</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap" rel="stylesheet">
    @vite('resources/css/app.css')
    <style>
        a {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>
<body class="font-sans antialiased">
    <!-- HEADER NAVBAR -->
    <header class="fixed top-0 left-0 right-0 z-10 flex justify-between items-center p-4 bg-white shadow">
        <div class="flex items-center space-x-3 ml-10 md:ml-4">
            <img src="{{ asset('images/logo_pemkot.png') }}" alt="Logo" class="h-12 md:h-16">
            <div class="font-bold font-poppins text-lg md:text-xl leading-none">
                <span class="block text-base md:text-xl">DISKOMINFO</span>
                <span class="block text-base md:text-xl leading-none">Kota Pekalongan</span>
            </div>
        </div>
        </div>
        <nav class="space-x-16 hidden lg:flex">
            <a href="#" class="text-gray-800 font-bold text-md">Beranda</a>
            <a href="#" class="text-gray-800 font-bold text-md">Layanan</a>
            <a href="#" class="text-gray-800 font-bold text-md">Pelaporan</a>
            <a href="#" class="text-gray-800 font-bold text-md">Tracking</a>
            <a href="#" class="text-gray-800 font-bold text-md">FAQ</a>
            <a href="#" class="bg-blue-500 hover:bg-blue-600 text-white px-10 py-3 rounded-3xl transition-colors duration-300 font-bold text-md shadow-2xl">Login</a>
        </nav>
        </div>
        <button class="lg:hidden text-gray-800" id="menu-btn">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
            </svg>
        </button>
    </header>
      

    <!-- CONTENT -->
    <section class="relative bg-cover bg-center text-white text-center">
    <img src="{{ asset('images/batik.png') }}" class="w-full h-screen object-cover">
    <div class="absolute inset-0 flex flex-col justify-center items-start text-white p-4 lg:p-20">
        <h1 class="text-3xl lg:text-6xl font-poppins">Manajemen Layanan</h1>
        <h1 class="text-3xl lg:text-6xl font-poppins">SPBE Kota Pekalongan</h1>
        <p class="mt-6 max-w-2xl text-base lg:text-xl font-normal text-left">Dinas Komunikasi dan Informatika Kota Pekalongan adalah Organisasi Perangkat Daerah yang dibentuk untuk menyelenggarakan urusan Pemerintahan bidang informasi dan komunikasi publik, bidang infrastruktur dan statistika, bidang aplikasi dan persandian.</p>
    </div>
</section>


    <!-- SEARCH BAR -->
    <section class="my-8 max-w-4xl mx-auto text-center">
        <div class="relative inline-block w-full sm:w-2/3 lg:w-2/3">
            <input type="text" placeholder="Cari Layanan..." class="w-full p-2 pl-4 pr-12 border rounded-full bg-gray-100 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                <img src="{{ asset('images/search.png') }}" alt="Search Icon" class="w-5 h-5 text-gray-400">
            </div>
        </div>
    </section>

    <!-- CARD BUTTON -->
    <section class="my-8 max-w-4xl mx-auto text-center">
        <div class="flex flex-col md:flex-row md:space-x-4 space-y-4 md:space-y-0 items-center">
            <div class="card bg-white p-8 rounded-xl shadow-lg max-w-md mx-auto hover:shadow-2xl transition-shadow duration-300">
                <img src="{{ asset('images/layanan.png') }}" alt="Layanan Icon" class="h-12 mb-4 ml-2 mx-auto">
                <div class="text-left sm:text-left">
                    <h2 class="text-2xl font-bold">Layanan</h2>
                    <p class="mt-2">Ajukan keluhan dan tinjau Prosedur Operasional Standar (SOP) untuk layanan yang tersedia.</p>
                </div>
            </div>
            <div class="card bg-white p-8 rounded-xl shadow-lg max-w-md mx-auto hover:shadow-2xl transition-shadow duration-300">
                <img src="{{ asset('images/pelaporan.png') }}" alt="Pelaporan Icon" class="h-12 mb-4 mx-auto">
                <div class="text-left sm:text-center">
                    <h2 class="text-2xl font-bold">Pelaporan</h2>
                    <p class="mt-2">Ajukan keluhan dan tinjau Prosedur Operasional Standar (SOP) untuk layanan yang tersedia.</p>
                </div>
            </div>
            <div class="card bg-white p-8 rounded-xl shadow-lg max-w-md mx-auto hover:shadow-2xl transition-shadow duration-300">
                <img src="{{ asset('images/tracking.png') }}" alt="Tracking Icon" class="h-12 mb-4 mx-auto">
                <div class="text-left sm:text-center">
                    <h2 class="text-2xl font-bold">Tracking</h2>
                    <p class="mt-2">Lacak aduan yang telah dilakukan menggunakan tiket unik yang telah diberikan.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <footer class="bg-gray-100 p-8 text-center sm:text-left">
        <div class="max-w-7xl mx-auto">
            <div class="flex flex-col sm:flex-row items-start justify-between">
                <div class="flex items-start mb-4 sm:mb-0">
                    <img src="{{ asset('images/logo_pemkot.png') }}" alt="Logo" class="h-16 mr-4">
                    <div>
                        <p class="font-bold text-xl">Dinas Komunikasi dan Informatika</p>
                        <p class="font-bold text-xl">Kota Pekalongan</p>
                    </div>
                </div>
                <div class="flex flex-col items-start sm:mt-0 sm:ml-4">
                    <p class="text-sm md:text-base mt-4 max-w-sm">Dinas Komunikasi dan Informatika Kota Pekalongan adalah Organisasi Perangkat Daerah yang dibentuk untuk menyelenggarakan urusan Pemerintahan bidang informasi dan komunikasi publik, bidang infrastruktur dan statistika, bidang aplikasi dan persandian.</p>
                </div>
            </div>
            <div class="flex flex-col items-start mt-4 sm:mt-8">
                <p class="font-semibold text-lg">Kontak Kami:</p>
                <p class="contact-item flex items-center"><img src="{{ asset('images/phone.png') }}" alt="Phone Icon" class="h-5 mr-2"> (0285) 421243</p>
                <p class="contact-item flex items-center"><img src="{{ asset('images/envelope.png') }}" alt="Email Icon" class="h-5 mr-2"> diskominfo@pekalongankota.go.id</p>
                <p class="contact-item flex items-center"><img src="{{ asset('images/location.png') }}" alt="Address Icon" class="h-5 mr-2"> Jl. Majapahit No.5 Pekalongan</p>
            </div>
            <div class="flex items-center justify-start mt-4 sm:ml-20">
                <img src="{{ asset('images/facebook.png') }}" alt="Facebook Icon" class="h-6 mr-4">
                <img src="{{ asset('images/x.png') }}" alt="X Icon" class="h-6 mr-4">
                <img src="{{ asset('images/ig.png') }}" alt="Instagram Icon" class="h-6 mr-4">
                <img src="{{ asset('images/yutub.png') }}" alt="YouTube Icon" class="h-6 mr-4">
            </div>
        </div>
        <div class="mt-8 text-gray-500 text-center">
            <p>© 2024 Sistem Layanan SPBE, by Dinas komunikasi dan informatika Kota Pekalongan</p>
        </div>
    </footer>

    @vite('resources/js/app.js')

</body>
</html>
