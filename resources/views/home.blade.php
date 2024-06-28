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
                <div class="flex items-center justify-between px-4 md:px-8">
                <div class="flex items-center space-x-3 ml-10 md:ml-4">
                    <img src="{{ asset('images/logo_pemkot.png') }}" alt="Logo" class="h-12 md:h-16">
                    <div class="text-container flex flex-col justify-center text-left font-bold font-poppins leading-tight">
                        <span class="text-xs sm:text-sm md:text-lg lg:text-xl whitespace-nowrap">DINAS KOMINFO</span>
                        <span class="text-xs sm:text-sm md:text-lg lg:text-xl whitespace-nowrap">Kota Pekalongan</span>
                    </div>
                </div>
            </div>
            <nav class="ml-80 flex-1 justify-start items-center space-x-8 md:space-x-6 lg:space-x-8 xl:space-x-16 hidden md:flex transition-all duration-500">
            <a href="/" class="text-gray-800 font-bold text-md lg:text-lg md:text-sm transition-all duration-500">Beranda</a>
            <a href="#" class="text-gray-800 font-bold text-md lg:text-lg md:text-sm transition-all duration-500">Layanan</a>
            <a href="#" class="text-gray-800 font-bold text-md lg:text-lg md:text-sm transition-all duration-500">Pelaporan</a>
            <a href="#" class="text-gray-800 font-bold text-md lg:text-lg md:text-sm transition-all duration-500">Tracking</a>
            <a href="/faq" class="text-gray-800 font-bold text-md lg:text-lg md:text-sm transition-all duration-500">FAQ</a>
            @auth
                <div class="relative">
                    <button class="text-gray-800 font-bold text-md lg:text-lg md:text-sm transition-all duration-500" id="user-menu-button">
                        {{ Auth::user()->name }}
                    </button>
                    <div id="user-menu" class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 hidden">
                        <a href="{{ route('logout') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </div>
            @else
                <a href="/login" class="bg-blue-500 hover:bg-blue-600 text-white md:px-5 md:py-2 lg:px-10 lg:py-3 rounded-3xl transition-all duration-300 font-bold text-md shadow-2xl">Login</a>
            @endauth
        </nav>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const userMenuButton = document.getElementById('user-menu-button');
                const userMenu = document.getElementById('user-menu');

                userMenuButton.addEventListener('click', function() {
                    userMenu.classList.toggle('hidden');
                });

                // Optional: Close dropdown when clicking outside
                document.addEventListener('click', function(event) {
                    if (!userMenuButton.contains(event.target) && !userMenu.contains(event.target)) {
                        userMenu.classList.add('hidden');
                    }
                });
            });
        </script>

        <button class="md:hidden text-gray-800" id="menu-btn">
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
                <img src="{{ asset('images/pelaporan.png') }}" alt="Pelaporan Icon" class="h-12 mb-4 ml-2 mx-auto">
                <div class="text-left sm:text-left">
                    <h2 class="text-2xl font-bold">Pelaporan</h2>
                    <p class="mt-2">Ajukan keluhan dan tinjau Prosedur Operasional Standar (SOP) untuk layanan yang tersedia.</p>
                </div>
            </div>
            <div class="card bg-white p-8 rounded-xl shadow-lg max-w-md mx-auto hover:shadow-2xl transition-shadow duration-300">
                <img src="{{ asset('images/tracking.png') }}" alt="Tracking Icon" class="h-12 mb-4 ml-2 mx-auto">
                <div class="text-left sm:text-left">
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
                    <img src="{{ asset('images/logo_pemkot.png') }}" alt="Logo" class="h-16 mr-2">
                    <div>
                        <p class="font-bold text-xl">Dinas Komunikasi dan informatika</p>
                        <p class="font-bold text-xl">Kota Pekalongan</p>
                    </div>
                </div>
                <p class="text-sm md:text-base mt-4 max-w-sm">Dinas Komunikasi dan Informatika Kota Pekalongan adalah Organisasi Perangkat Daerah yang dibentuk untuk menyelenggarakan urusan Pemerintahan bidang informasi dan komunikasi publik, bidang infrastruktur dan statistika, bidang aplikasi dan persandian.</p>
            </div>

            <div class="flex flex-col items-start mt-4 sm:mt-20 sm:ml-4">
                <p class="font-semibold text-lg">Kontak Kami:</p>
            
                <p class="contact-item" style="display: inline-flex; align-items: center;">
                    <img src="images/phone.png" alt="Phone Icon" class="icon" style="margin-right: 10px;"> (0285) 421243
                </p>

                <p class="contact-item" style="display: inline-flex; align-items:center">
                    <img src="images/envelope.png" alt="Email Icon" class="icon" style="margin-right: 10px;"> diskominfo@pekalongankota.go.id
                </p>
                
                <p class="contact-item" style="display: inline-flex; align-items:center">
                    <img src="images/location.png" alt="Address Icon" class="icon" style="margin-right: 10px;" > Jl. Majapahit No.5 Pekalongan
                </p>
            </div>
        </div>
            <div class="flex items-center justify-start mt-4 sm:ml-20">
                <img src="{{ asset('images/facebook.png') }}" alt="Small Logo 1" class="h-6 mr-4">
                <img src="{{ asset('images/x.png') }}" alt="Small Logo 2" class="h-6 mr-4">
                <img src="{{ asset('images/ig.png') }}" alt="Small Logo 3" class="h-6 mr-4">
                <img src="{{ asset('images/yutub.png') }}" alt="Small Logo 4" class="h-6 mr-4">
            </div>
            <div class="mt-8 text-gray-500 text-center">
                <p>© 2024 Sistem Layanan SPBE, by Dinas komunikasi dan informatika Kota Pekalongan</p>
            </div>
    </footer>
    @vite('resources/js/app.js')

</body>
</html>
