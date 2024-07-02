<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail Laporan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-medium text-gray-900">Detail Laporan</h3>

                    <div class="mt-4">
                        <label class="block font-medium text-sm text-gray-700">ID Laporan:</label>
                        <div class="mt-1 text-sm text-gray-900">{{ $laporan->id }}</div>
                    </div>

                    <div class="mt-4">
                        <label class="block font-medium text-sm text-gray-700">Judul:</label>
                        <div class="mt-1 text-sm text-gray-900">{{ $laporan->judul }}</div>
                    </div>

                    <div class="mt-4">
                        <label class="block font-medium text-sm text-gray-700">Tanggal:</label>
                        <div class="mt-1 text-sm text-gray-900">{{ $laporan->tanggal }}</div>
                    </div>

                    <div class="mt-4">
                        <label class="block font-medium text-sm text-gray-700">Isi:</label>
                        <div class="mt-1 text-sm text-gray-900">{{ $laporan->isi }}</div>
                    </div>

                    <div class="mt-4">
                        <label class="block font-medium text-sm text-gray-700">Kategori:</label>
                        <div class="mt-1 text-sm text-gray-900">{{ $laporan->kategori }}</div>
                    </div>

                    <div class="mt-4">
                        <label class="block font-medium text-sm text-gray-700">File Pendukung:</label>
                        <div class="mt-1 text-sm text-gray-900">
                            @if ($laporan->file_pendukung)
                                @php
                                    $fileExtension = pathinfo(Storage::url($laporan->file_pendukung), PATHINFO_EXTENSION);
                                @endphp

                                @if (in_array($fileExtension, ['jpg', 'jpeg', 'png', 'gif']))
                                    <img src="{{ Storage::url($laporan->file_pendukung) }}" alt="File Pendukung" class="mt-2 max-w-xs">
                                @elseif ($fileExtension == 'pdf')
                                    <a href="{{ Storage::url($laporan->file_pendukung) }}" target="_blank">Lihat PDF</a>
                                @elseif (in_array($fileExtension, ['doc', 'docx', 'xls', 'xlsx', 'ppt', 'pptx']))
                                    <a href="{{ Storage::url($laporan->file_pendukung) }}" target="_blank">Lihat Dokumen</a>
                                @else
                                    <a href="{{ Storage::url($laporan->file_pendukung) }}" target="_blank">Download</a>
                                @endif
                            @else
                                Tidak ada file pendukung
                            @endif
                        </div>
                    </div>

                    <div class="mt-4">
                        <a href="{{ route('laporan.index') }}" class="btn btn-primary">Kembali ke Daftar Laporan</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
