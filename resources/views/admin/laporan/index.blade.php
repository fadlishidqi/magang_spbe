<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Laporan') }}
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

                    <table class="divide-y divide-gray-200 text-center w-full">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                                <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Judul</th>
                                <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal</th>
                                <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Isi</th>
                                <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Kategori</th>
                                <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($laporans as $laporan)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-center">{{ $laporan->id }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-center">{{ $laporan->judul }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-center">{{ $laporan->tanggal }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-center">{{ $laporan->isi }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-center">{{ $laporan->kategori }}</td>
                
                                    <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                        <a href="{{ route('laporan.show', $laporan->id) }}" class="text-blue-600 hover:text-blue-800">View</a>
                                        <form action="{{ route('laporan.destroy', $laporan->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-800 ml-2">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="mt-4">
                        {{ $laporans->links() }} <!-- Pagination links if you are paginating users -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
