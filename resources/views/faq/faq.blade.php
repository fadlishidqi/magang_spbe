<!-- resources/views/faq/faq.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Frequently Asked Questions</title>
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
            <a href="#" class="text-sm sm:text-xl hover:text-blue-500 duration-500 font-bold" onclick="filterFAQ('Layanan')">Layanan</a>
        </li>
        <li class="mx-4 my-6 md:my-0">
            <a href="#" class="text-sm sm:text-xl hover:text-blue-500 duration-500 font-bold" onclick="filterFAQ('Laporan')">Pelaporan</a>
        </li>
        <li class="mx-4 my-6 md:my-0">
            <a href="#" class="text-sm sm:text-xl hover:text-blue-500 duration-500 font-bold" onclick="filterFAQ('Tracking')">Tracking</a>
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

<!-- Responsif Button Navbar -->
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

<!-- FAQ SECTION -->
<section class="mx-20">
    <div class="max-w-4xl mx-auto py-10 flex flex-col md:flex-row justify-between space-y-8 md:space-y-0">
        <div class="heading md:w-1/3">
            <h1 class="text-4xl font-bold mb-8">Frequently asked questions</h1>
            <div class="space-y-6">
                <button class="flex items-center p-4 bg-white rounded-lg shadow" onclick="filterFAQ('Layanan')">
                    <div class="flex-shrink-0 mr-4">
                        <svg class="w-8 h-8 text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422A12.083 12.083 0 0118 12c0 4.418-3.582 8-8 8s-8-3.582-8-8c0-.379.034-.753.098-1.12L12 14z" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-lg font-medium">Layanan</h3>
                        <p class="text-gray-500"></p>
                    </div>
                </button>
                <button class="flex items-center p-4 bg-white rounded-lg shadow" onclick="filterFAQ('Laporan')">
                    <div class="flex-shrink-0 mr-4">
                        <svg class="w-8 h-8 text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16h6M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-lg font-medium">Laporan</h3>
                        <p class="text-gray-500"></p>
                    </div>
                </button>
                <button class="flex items-center p-4 bg-white rounded-lg shadow" onclick="filterFAQ('Tracking')">
                    <div class="flex-shrink-0 mr-4">
                        <svg class="w-8 h-8 text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5h12M9 3v2M12 7h3m0 0l3 3m-3-3l-3 3m-9 4h12m0 0l-3 3m3-3l3 3M3 19h12M9 17v2" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-lg font-medium">Tracking</h3>
                        <p class="text-gray-500"></p>
                    </div>
                </button>
            </div>
        </div>

        <div class="bg-white p-6 rounded-lg shadow md:w-2/3">
            <div class="space-y-4">
                <div class="faq-item" data-category="Layanan">
                    <h2 class="text-2xl font-bold mb-4">Layanan</h2>
                    @foreach ($faqs->where('kategori', 'Layanan') as $item)
                        <div>
                            <button
                                class="w-full flex justify-between items-center text-left text-xl font-semibold py-2"
                                onclick="toggleAnswer('{{ $item->id }}')">
                                <span>{{ $item->pertanyaan }}</span>
                                <i class="fas fa-chevron-down"></i>
                            </button>
                            <div id="{{ $item->id }}" class="hidden text-gray-600 max-w-fit">
                                <p>{{ $item->jawaban }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="faq-item" data-category="Laporan">
                    <h2 class="text-2xl font-bold mb-4">Laporan</h2>
                    @foreach ($faqs->where('kategori', 'Laporan') as $item)
                        <div>
                            <button
                                class="w-full flex justify-between items-center text-left text-xl font-semibold py-2"
                                onclick="toggleAnswer('{{ $item->id }}')">
                                <span>{{ $item->pertanyaan }}</span>
                                <i class="fas fa-chevron-down"></i>
                            </button>
                            <div id="{{ $item->id }}" class="hidden text-gray-600 max-w-fit">
                                <p>{{ $item->jawaban }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="faq-item" data-category="Tracking">
                    <h2 class="text-2xl font-bold mb-4">Tracking</h2>
                    @foreach ($faqs->where('kategori', 'Tracking') as $item)
                        <div>
                            <button
                                class="w-full flex justify-between items-center text-left text-xl font-semibold py-2"
                                onclick="toggleAnswer('{{ $item->id }}')">
                                <span>{{ $item->pertanyaan }}</span>
                                <i class="fas fa-chevron-down"></i>
                            </button>
                            <div id="{{ $item->id }}" class="hidden text-gray-600 max-w-fit">
                                <p>{{ $item->jawaban }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
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
                <img src="images/phone.png" alt="Phone Icon" class="icon" style="margin-right: 10px font-poppins"> (0285) 421243
            </p>

            <p class="contact-item" style="display: inline-flex; align-items:center">
                <img src="images/envelope.png" alt="Email Icon" class="icon" style="margin-right: 10px font-poppins;"> diskominfo@pekalongankota.go.id
            </p>
            
            <p class="contact-item" style="display: inline-flex; align-items:center">
                <img src="images/location.png" alt="Address Icon" class="icon" style="margin-right: 10px font-poppins;" > Jl. Majapahit No.5 Pekalongan
            </p>
        </div>
    </div>
        <div class="flex items-center justify-start mt-4 sm:ml-20">
            <img src="{{ asset('images/facebook.png') }}" alt="Small Logo 1" class="h-6 mr-4">
            <img src="{{ asset('images/x.png') }}" alt="Small Logo 2" class="h-6 mr-4">
            <img src="{{ asset('images/ig.png') }}" alt="Small Logo 3" class="h-6 mr-4">
            <img src="{{ asset('images/yutub.png') }}" alt="Small Logo 4" class="h-6 mr-4">
        </div>
        <div class="mt-8 text-gray-500 text-center font-poppins">
            <p>© 2024 Sistem Layanan SPBE, by Dinas komunikasi dan informatika Kota Pekalongan</p>
        </div>
</footer>
@vite('resources/js/app.js')

<script>
    function toggleAnswer(id) {
        var answer = document.getElementById(id);
        if (answer.classList.contains('hidden')) {
            answer.classList.remove('hidden');
        } else {
            answer.classList.add('hidden');
        }
    }

    function filterFAQ(category) {
        // Sembunyikan semua FAQ
        document.querySelectorAll('.faq-item').forEach(function (item) {
            item.style.display = 'none';
        });

        // Tampilkan FAQ yang sesuai dengan kategori
        document.querySelectorAll('.faq-item[data-category="' + category + '"]').forEach(function (item) {
            item.style.display = 'block';
        });
    }

    // Tampilkan semua FAQ secara default
    document.addEventListener('DOMContentLoaded', function() {
        filterFAQ('Layanan'); // Atau ganti dengan kategori yang diinginkan secara default
    });
</script>

</body>
</html>
