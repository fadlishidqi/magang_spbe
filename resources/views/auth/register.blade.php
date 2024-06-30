<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        @if ($errors->any())
            {{ $errors->first() }}
        @endif

        <!-- Kategori -->
        <div class="mb-4">
            <label for="category" class="block text-sm font-medium text-gray-700">Kategori</label>
            <select id="category" name="category"
                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                required onchange="showFields(this.value)">
                <option value="masyarakat">Masyarakat</option>
                <option value="pegawai_dinas">Pegawai Dinas</option>
                <option value="pegawai_individu">Pegawai Individu</option>
            </select>
        </div>

        <!-- Nama (Masyarakat) -->
        <div class="mb-4" id="nama_field" style="display: none;">
            <label for="nama" class="block text-sm font-medium text-gray-700">Nama</label>
            <input type="text" id="nama" name="name"
                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
        </div>

        <div class="mb-4" style="display: block;">
            <label for="nama" class="block text-sm font-medium text-gray-700">Email</label>
            <input type="email" id="nama" name="email"
                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
        </div>

        <!-- NIP (Pegawai Dinas dan Pegawai Individu) -->
        <div class="mb-4" id="nip_field" style="display: none;">
            <label for="nip" class="block text-sm font-medium text-gray-700">NIP</label>
            <input type="text" id="nip" name="nip"
                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
        </div>

        <!-- NIK (Masyarakat) -->
        <div class="mb-4" id="nik_field" style="display: none;">
            <label for="nik" class="block text-sm font-medium text-gray-700">NIK</label>
            <input type="text" id="nik" name="nik"
                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
        </div>

        <!-- Nomor Telepon (Masyarakat) -->
        <div class="mb-4" id="no_telp_field" style="display: none;">
            <label for="no_telp" class="block text-sm font-medium text-gray-700">Nomor Telepon</label>
            <input type="text" id="no_telp" name="no_telp"
                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
        </div>

        <!-- Username -->
        <div class="mb-4">
            <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
            <input type="text" id="username" name="username"
                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                required>
        </div>

        <!-- Password -->
        <div class="mb-4">
            <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
            <input type="password" id="password" name="password"
                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                required>
        </div>

        <!-- Konfirmasi Password -->
        <div class="mb-4">
            <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Konfirmasi
                Password</label>
            <input type="password" id="password_confirmation" name="password_confirmation"
                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                required>
        </div>

        <!-- Tombol Register -->
        <div class="flex items-center justify-end mt-4">
            <button type="submit" style="background-color: blue"
                class="ml-4 inline-flex items-center px-4 py-2 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest bg-indigo-600 hover:bg-indigo-700 active:bg-indigo-800 focus:outline-none focus:border-indigo-700 focus:ring ring-indigo-300 disabled:opacity-25 transition ease-in-out duration-150">
                Register
            </button>
        </div>
    </form>

    <script>
        function showFields(category) {
            if (category === 'pegawai_dinas' || category === 'pegawai_individu') {
                document.getElementById('nama_field').style.display = 'none';
                document.getElementById('nip_field').style.display = 'block';
                document.getElementById('nik_field').style.display = 'none';
                document.getElementById('no_telp_field').style.display = 'none';
            } else if (category === 'masyarakat') {
                document.getElementById('nama_field').style.display = 'block';
                document.getElementById('nip_field').style.display = 'none';
                document.getElementById('nik_field').style.display = 'block';
                document.getElementById('no_telp_field').style.display = 'block';
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            var category = document.getElementById('category');
            showFields(category.value);

            category.addEventListener('change', function() {
                showFields(this.value);
            });
        });
    </script>
</x-guest-layout>
