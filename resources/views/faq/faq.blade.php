<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQ - Dinas Kominfo Kota Pekalongan</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
        .faq-category.hidden {
            display: none;
        }
    </style>
</head>
<body class="bg-gray-50 font-sans antialiased">

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
            <a href="#" class="text-gray-800 font-bold text-md lg:text-lg md:text-sm transition-all duration-500">Beranda</a>
            <a href="#" class="text-gray-800 font-bold text-md lg:text-lg md:text-sm transition-all duration-500">Layanan</a>
            <a href="#" class="text-gray-800 font-bold text-md lg:text-lg md:text-sm transition-all duration-500">Pelaporan</a>
            <a href="#" class="text-gray-800 font-bold text-md lg:text-lg md:text-sm transition-all duration-500">Tracking</a>
            <a href="#" class="text-gray-800 font-bold text-md lg:text-lg md:text-sm transition-all duration-500">FAQ</a>
            <a href="/login" class="bg-blue-500 hover:bg-blue-600 text-white md:px-5 md:py-2 lg:px-10 lg:py-3 rounded-3xl transition-all duration-300 font-bold text-md shadow-2xl">Login</a>
        </nav>
        <button class="md:hidden text-gray-800" id="menu-btn">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
            </svg>
        </button>
    </header>

    <!-- MAIN CONTENT -->
    <main class="pt-24 max-w-7xl mx-auto p-6">
        <h1 class="text-3xl font-bold mb-4">Frequently Asked Questions</h1>
        <p class="mb-8">Layanan SPBE Pemerintah Kota Pekalongan</p>
        <div class="flex">
            <div class="w-1/4 bg-gray-100 p-4 rounded-lg">
                <ul id="categories">
                    <li class="mb-2">
                        <button onclick="showFAQ('kategoriA')" class="w-full text-left font-semibold text-lg">Kategori A</button>
                    </li>
                    <li class="mb-2">
                        <button onclick="showFAQ('kategoriB')" class="w-full text-left font-semibold text-lg">Kategori B</button>
                    </li>
                    <li class="mb-2">
                        <button onclick="showFAQ('kategoriC')" class="w-full text-left font-semibold text-lg">Kategori C</button>
                    </li>
                    <li class="mb-2">
                        <button onclick="showFAQ('kategoriD')" class="w-full text-left font-semibold text-lg">Kategori D</button>
                    </li>
                    <li class="mb-2">
                        <button onclick="showFAQ('kategoriE')" class="w-full text-left font-semibold text-lg">Kategori E</button>
                    </li>
                    <li class="mb-2">
                        <button onclick="showFAQ('kategoriF')" class="w-full text-left font-semibold text-lg">Kategori F</button>
                    </li>
                    <li class="mb-2">
                        <button onclick="showFAQ('kategoriG')" class="w-full text-left font-semibold text-lg">Kategori G</button>
                    </li>
                </ul>
            </div>
            <div class="w-3/4 bg-white p-4 rounded-lg ml-4" id="faq-content">
                @foreach($faqs as $faq)
                    <div class="faq-category" id="kategori{{ $faq->id }}">
                        <h2 class="text-2xl font-bold mb-4">{{ $faq->pertanyaan }}</h2>
                        <div class="mb-4">
                            <button class="w-full text-left font-semibold text-lg">{{ $faq->pertanyaan }}</button>
                            <div class="mt-2 text-gray-700">
                                <p>{{ $faq->jawaban }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </main>

    <!-- FOOTER -->
    <footer class="bg-gray-100 p-8 text-center sm:text-left">
        <div class="flex flex-col sm:flex-row items-start sm:items-start justify-between max-w-7xl mx-auto">
            <div class="flex flex-col items-start mb-4 sm:mb-0">
                <div class="flex items-center">
                    <img src="{{ asset('images/logo_pemkot.png') }}" alt="Logo" class="h-16 mr-2">
                    <div>
                        <p class="font-bold text-xl">Dinas Komunikasi dan Informatika</p>
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
                    <img src="images/location.png" alt="Address Icon" class="icon" style="margin-right: 10px;"> Jl. Majapahit No.5 Pekalongan
                </p>
            </div>
        </div>
        <div class="flex items-center justify-start mt-4 sm:ml-20">
            <img src="{{ asset('images/facebook.png') }}" alt="Small Logo 1" class="h-6 mr-4">
            <img src="{{ asset('images/x.png') }}" alt="Small Logo 2" class="h-6 mr-4">
            <img src="{{ asset('images/instagram.png') }}" alt="Small Logo 3" class="h-6 mr-4">
            <img src="{{ asset('images/youtube.png') }}" alt="Small Logo 4" class="h-6 mr-4">
        </div>
    </footer>

    <!-- JAVASCRIPT -->
    <script>
        function showFAQ(categoryId) {
            var categories = document.querySelectorAll('.faq-category');
            categories.forEach(function(category) {
                category.classList.add('hidden');
            });

            var selectedCategory = document.getElementById(categoryId);
            if (selectedCategory) {
                selectedCategory.classList.remove('hidden');
            }
        }
    </script>
</body>
</html>
