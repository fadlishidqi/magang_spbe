<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Frequently Asked Questions') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if (session('success'))
                        <div class="bg-green-500 text-white p-4 rounded mb-4">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="flex justify-end mb-4">
                        <a href="{{ route('faqs.create') }}"
                            class="btn bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                            style="background-color: blue">Tambah FAQ</a>
                    </div>

                    <!-- Filter FAQ berdasarkan kategori -->
                    <form method="GET" action="{{ route('faqs.index') }}" class="mb-4">
                        <label for="kategori" class="block text-sm font-medium text-gray-700">Filter by Kategori</label>
                        <select name="kategori" id="kategori" class="mt-1 p-2 w-full border rounded">
                            <option value="">All</option>
                            <option value="Layanan">Layanan</option>
                            <option value="Laporan">Laporan</option>
                            <option value="Tracking">Tracking</option>
                        </select>
                        <button type="submit" class="btn bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-2">Filter</button>
                    </form>

                    <table class="divide-y divide-gray-200 text-center w-full">
    <thead class="bg-gray-50">
        <tr>
            <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                Pertanyaan
            </th>
            <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                Jawaban
            </th>
            <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                Kategori
            </th>
            <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                Aksi
            </th>
        </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
        @foreach ($faqs as $faq)
            <tr>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm font-medium text-gray-900">{{ $faq->pertanyaan }}</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-900">{{ $faq->jawaban }}</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-900">{{ $faq->kategori }}</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                    <a href="{{ route('faqs.edit', $faq->id) }}"
                        class="text-blue-600 hover:text-blue-800">Edit</a>
                    <form action="{{ route('faqs.destroy', $faq->id) }}" method="POST"
                        class="inline"
                        onsubmit="return confirm('Are you sure you want to delete this FAQ?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:text-red-800 ml-2">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
