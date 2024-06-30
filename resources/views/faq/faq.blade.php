<!-- resources/views/faq/faq.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Frequently Asked Questions</title>
    @vite('resources/css/app.css')
</head>
<body>
   <!-- FAQ SECTION -->
   <section class="mx-20">
        <div class="max-w-4xl mx-auto py-10 flex flex-col md:flex-row justify-between space-y-8 md:space-y-0">
            <div class="heading md:w-1/3">
                <h1 class="text-4xl font-bold mb-8">Frequently asked questions</h1>
                <div class="space-y-6">
                    <div class="flex items-center p-4 bg-white rounded-lg shadow">
                        <div class="flex-shrink-0 mr-4">
                            <svg class="w-8 h-8 text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 14l9-5-9-5-9 5 9 5z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 14l6.16-3.422A12.083 12.083 0 0118 12c0 4.418-3.582 8-8 8s-8-3.582-8-8c0-.379.034-.753.098-1.12L12 14z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-medium">Contact live chat support</h3>
                            <p class="text-gray-500">24/7 available. No chatbots.</p>
                        </div>
                    </div>
                    <div class="flex items-center p-4 bg-white rounded-lg shadow">
                        <div class="flex-shrink-0 mr-4">
                            <svg class="w-8 h-8 text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 10h.01M12 10h.01M16 10h.01M9 16h6M4 6h16M4 12h16M4 18h16" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-medium">Visit help center</h3>
                            <p class="text-gray-500">Check out tutorials.</p>
                        </div>
                    </div>
                    <div class="flex items-center p-4 bg-white rounded-lg shadow">
                        <div class="flex-shrink-0 mr-4">
                            <svg class="w-8 h-8 text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 5h12M9 3v2M12 7h3m0 0l3 3m-3-3l-3 3m-9 4h12m0 0l-3 3m3-3l3 3M3 19h12M9 17v2" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-medium">Book a demo</h3>
                            <p class="text-gray-500">1:1 talk with a tax specialist.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white p-6 rounded-lg shadow md:w-2/3">
                <div class="space-y-4">
                    @foreach ($faqs as $item)
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
    </section>
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
    </script>
    
</body>
</html>
