<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Layanan SPBE Kota Pekalongan</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
        integrity="sha512-PoQgnD+vMxwXQf2nx5nQZQ3Hg1K6qT+ly6wTFBo1hApKsyw4iP29XSq0O0jZt4QKlVDkB7w64+GuA0jQ/o8cZA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    @vite('resources/css/app.css')
    <style>
        a {
            font-family: 'Poppins', sans-serif;
        }

        ul#navList {
            top: -400px;
            transition: top 0.s ease, opacity 0.5s ease;
        }
        ul#navList.show {
            opacity: 10;
        }

        .text-wrapper {
            display: inline-block;
            vertical-align: middle;
            text-align: left;
            font-size: 1rem; 
        }

        .text-wrapper span {
            display: block;
            line-height: 1.2; 
        }

        @media (max-width: 768px) {
            .text-wrapper {
                font-size: 0.8rem; 
                text-align: center; 
            }

            .text-wrapper span {
                line-height: 1.5; 
            }
        }

        @media (min-width: 769px) {
            .text-wrapper {
                font-size: 1.2rem; 
            }

            .text-wrapper span {
                line-height: 1.3; 
            }
        } 

        .font-poppins.font-normal {
        font-weight: 400 !important;
        }
    </style>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</head>
<body class="font-sans antialiased">

    <!-- HEADER NAVBAR -->
    <nav class="p-5 bg-white shadow md:flex md:items-start md:justify-between relative">
        <div class="flex justify-between items-center w-full md:w-auto">
            <span class="text-2xl font-[Poppins] cursor-pointer flex items-center">
                <img class="h-14 inline" src="{{ asset('images/logo_pemkot.png') }}">
                <div class="text-wrapper ml-2 font-bold text-left flex flex-col items-start">
                    <span>DINAS KOMINFO</span>
                    <span>Kota Pekalongan</span>
                </div>
            </span>
            <span class="text-3xl cursor-pointer mx-2 md:hidden block">
                <ion-icon name="menu" onclick="Menu(this)"></ion-icon>
            </span>
        </div>
        <ul id="navList" class="md:flex md:items-center absolute md:static bg-white w-full left-0 md:w-auto md:py-0 py-4 md:pl-0 pl-7 top-[-400px] transition-all ease-in duration-500 opacity-0 md:opacity-100 z-10">
            <li class="mx-4 my-6 md:my-0">
                <a href="#" class="text-sm sm:text-xl hover:text-blue-500 duration-500 font-bold">Beranda</a>
            </li>
            <li class="mx-4 my-6 md:my-0">
                <a href="#" class="text-sm sm:text-xl hover:text-blue-500 duration-500 font-bold">Layanan</a>
            </li>
            <li class="mx-4 my-6 md:my-0">
                <a href="{{ route('laporan.create') }}" class="text-sm sm:text-xl hover:text-blue-500 duration-500 font-bold">Pelaporan</a>
            </li>
            <li class="mx-4 my-6 md:my-0">
                <a href="#" class="text-sm sm:text-xl hover:text-blue-500 duration-500 font-bold">Tracking</a>
            </li>
            <li class="mx-4 my-6 md:my-0">
                <a href="/faq" class="text-sm sm:text-xl hover:text-blue-500 duration-500 font-bold">FAQ</a>
            </li>
            <div class="flex items-center">
                @auth
                    <div class="relative">
                        <button class="text-gray-800 font-bold text-md lg:text-lg md:text-sm transition-all duration-500 " id="user-menu-button">
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
                    <button class="md:hidden text-gray-800" id="menu-btn">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                        </svg>
                    </button>
                @else
                    <a href="/login" class="bg-blue-500 text-white font-[Poppins] text-base sm:text-lg md:text-lg lg:text-xl duration-500 px-10 py-3 mx-4 hover:bg-blue-800 rounded-3xl transition-all font-bold">Login</a>
                    <button class="hidden" id="menu-btn">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                        </svg>
                    </button>
                @endauth
            </div>

            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const userMenuButton = document.getElementById('user-menu-button');
                    const userMenu = document.getElementById('user-menu');

                    if (userMenuButton) {
                        userMenuButton.addEventListener('click', function() {
                            userMenu.classList.toggle('hidden');
                        });

                        // Optional: Close dropdown when clicking outside
                        document.addEventListener('click', function(event) {
                            if (!userMenuButton.contains(event.target) && !userMenu.contains(event.target)) {
                                userMenu.classList.add('hidden');
                            }
                        });
                    }
                });
            </script>
        </ul>
    </nav>
    <script>
        function Menu(e) {
            let list = document.getElementById('navList');
            let nav = document.querySelector('nav');

            if (e.name === 'menu') {
                e.name = "close";
                list.style.top = nav.offsetHeight + 'px'; // Set top to navbar height
                list.classList.add('opacity-100');
            } else {
                e.name = "menu";
                list.style.top = '100px'; // Reset top to hide
                list.classList.remove('opacity-100');
            }
        }
    </script>

    <!-- CONTENT -->
    <section class="relative bg-cover bg-center text-white text-center">
        <img src="{{ asset('images/batik.png') }}" class="w-full h-full object-cover">
        <div class="absolute inset-0 flex flex-col justify-center items-start text-white p-4 lg:p-20">
            <h1 class="py-1 text-xl sm:text-xl md:text-2xl lg:text-6xl font-poppins font-bold">Manajemen Layanan</h1>
            <h1 class="text-xl sm:text-xl md:text-2xl lg:text-6xl font-poppins font-bold">SPBE Kota Pekalongan</h1>
            <p class="mt-2 sm:mt-2 md:mt-4 max-w-full text-xs xs:text-sm md:text-base lg:text-xl font-poppins font-normal text-left">Dinas Komunikasi dan Informatika Kota Pekalongan adalah Organisasi Perangkat Daerah yang dibentuk untuk menyelenggarakan urusan Pemerintahan bidang informasi dan komunikasi publik, bidang infrastruktur dan statistika, bidang aplikasi dan persandian.</p>
        </div>
    </section>

    <!-- GREETING -->
    <section class="my-6 max-w-9xl mx-auto text-center px-4 sm:px-6 lg:px-8">
        <div class="relative inline-block w-full max-w-xs sm:max-w-none sm:w-2/3 lg:w-2/3">
            <h1 class="py-1 sm:py-6 md:py-8 lg:py-10 text-xl sm:text-lg md:text-xl lg:text-4xl font-poppins font-bold">Selamat Datang</h1>
            <p class="py-2 sm:py-1 md:py-2 lg:py-2 max-w-full text-xs xs:text-sm md:text-base lg:text-xl font-poppins font-normal">Portal resmi Manajemen Layanan SPBE Kota Pekalongan dirancang untuk memberikan kemudahan akses informasi dan layanan terkait administrasi pemerintahan dan layanan publik di Kota Pekalongan.</p>
        </div>
    </section>

    <!-- SEARCH BAR -->
    <section class="max-w-2xl mx-auto text-center justify-center px-4 py-2">
        <form action="" class="w-full max-w-4xl px-10">
            <div class="relative flex items-center text-gray-400 focus-within:text-gray-400">
                <ion-icon class="w-5 h-5 absolute ml-3 pointer-events-none" name="search-outline"></ion-icon>
                <input type="text" name="search" placeholder="Cari Layanan..." autocomplete="off" aria-label="Cari Layanan..." class="w-full max-w-full md:max-w-lg lg:max-w-xl xl:max-w-2xl pr-3 pl-10 py-2 font-regular font-poppins placeholder-gray-500 text-black rounded-full border-none ring-1 ring-gray-300 focus:ring-blue-600 focus:ring-2 hover:ring-blue-600 hover:ring-2">
            </div>
        </form>
    </section>

    <!-- CARD BUTTON -->
    <section class="my-16 max-w-6xl mx-auto text-center">
        <div class="flex flex-col md:flex-row md:space-x-16 space-y-4 md:space-y-0 items-center">
            <a href="URL_Layanan" class="card bg-white h-[300px] w-full md:w-[350px] lg:w-[400px] xl:w-[500px] p-8 rounded-xl shadow-lg mx-auto hover:shadow-2xl transition-shadow duration-300">
                <img src="{{ asset('images/layanan.png') }}" alt="Layanan Icon" class="h-12 mb-10 mx-auto ml-2">
                <div class="text-left sm:text-left">
                    <h2 class="text-2xl font-bold font-poppins">Layanan</h2>
                    <p class="mt-2 font-poppins">Ajukan keluhan dan tinjau Prosedur Operasional Standar (SOP) untuk layanan yang tersedia.</p>
                </div>
            </a>
            <a href="URL_Pelaporan" class="card bg-white h-[300px] w-full md:w-[350px] lg:w-[400px] xl:w-[500px] p-8 rounded-xl shadow-lg mx-auto hover:shadow-2xl transition-shadow duration-300">
                <img src="{{ asset('images/pelaporan.png') }}" alt="Pelaporan Icon" class="h-12 mb-10 mx-auto ml-2">
                <div class="text-left sm:text-left">
                    <h2 class="text-2xl font-bold font-poppins">Pelaporan</h2>
                    <p class="mt-2 font-poppins">Ajukan keluhan dan tinjau Prosedur Operasional Standar (SOP) untuk layanan yang tersedia.</p>
                </div>
            </a>
            <a href="URL_Tracking" class="card bg-white h-[300px] w-full md:w-[350px] lg:w-[400px] xl:w-[500px] p-8 rounded-xl shadow-lg mx-auto hover:shadow-2xl transition-shadow duration-300">
                <img src="{{ asset('images/tracking.png') }}" alt="Tracking Icon" class="h-12 mb-10 mx-auto ml-2">
                <div class="text-left sm:text-left">
                    <h2 class="text-2xl font-bold font-poppins">Tracking</h2>
                    <p class="mt-2 font-poppins">Lacak aduan yang telah dilakukan menggunakan tiket unik yang telah diberikan.</p>
                </div>
            </a>
        </div>
    </section>

    <!-- FOOTER -->
    <footer class="bg-gray-100 p-8 text-left">
        <div class="flex flex-col sm:flex-row items-start justify-between max-w-7xl mx-auto">
            <div class="flex flex-col items-start mb-4 sm:mb-0">
                <div class="flex items-center">
                    <img src="{{ asset('images/logo_pemkot.png') }}" alt="Logo" class="h-16 mr-2">
                    <div>
                        <p class="font-bold text-md md:text-xl font-poppins">Dinas Komunikasi dan informatika</p>
                        <p class="font-bold text-md md:text-xl font-poppins">Kota Pekalongan</p>
                    </div>
                </div>
                <p class="text-sm md:text-base mt-4 max-w-sm font-poppins">Dinas Komunikasi dan Informatika Kota Pekalongan adalah Organisasi Perangkat Daerah yang dibentuk untuk menyelenggarakan urusan Pemerintahan bidang informasi dan komunikasi publik, bidang infrastruktur dan statistika, bidang aplikasi dan persandian.</p>
            </div>

            <div class="flex flex-col items-start mt-4 sm:mt-20 sm:ml-4">
                <p class="font-semibold text-lg font-poppins">Kontak Kami:</p>
            
                <p class="contact-item" style="display: inline-flex; align-items: center;">
                    <img src="images/phone.png" alt="Phone Icon" class="icon mr-4" style="margin-right: 10px font-poppins"> (0285) 421243
                </p>

                <p class="contact-item" style="display: inline-flex; align-items:center">
                    <img src="images/envelope.png" alt="Email Icon" class="icon mr-4" style="margin-right: 10px font-poppins;"> diskominfo@pekalongankota.go.id
                </p>
                
                <p class="contact-item" style="display: inline-flex; align-items:center">
                    <img src="images/location.png" alt="Address Icon" class="icon mr-4" style="margin-right: 10px font-poppins;" > Jl. Majapahit No.5 Pekalongan
                </p>
            </div>
        </div>
            <div class="mt-4">
                <ul class="flex items-start space-x-4 ml-0 sm:ml-20">
                    <li>
                        <a href="#" class="text-2xl">
                            <ion-icon name="logo-facebook"></ion-icon>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="text-2xl">
                            <ion-icon name="logo-youtube"></ion-icon>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="text-2xl">
                            <ion-icon name="logo-instagram"></ion-icon>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="text-2xl">
                            <ion-icon name="logo-twitter"></ion-icon>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="mt-8 text-gray-500 text-center font-poppins">
                <p>© 2024 Sistem Layanan SPBE, by Dinas komunikasi dan informatika Kota Pekalongan</p>
            </div>
    </footer>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    @vite('resources/js/app.js')
</body>
</html>
