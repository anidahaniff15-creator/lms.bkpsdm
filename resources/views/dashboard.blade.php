<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ auth()->user()->role === 'admin' ? __('Dashboard Admin') : __('Dashboard Peserta') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            
            @if(auth()->user()->role === 'admin')
                <!-- TAMPILAN KHUSUS ADMIN -->
                <div class="bg-gradient-to-r from-blue-600 to-indigo-700 overflow-hidden shadow-sm sm:rounded-lg text-white p-6">
                    <h3 class="text-2xl font-bold">Selamat Datang, Admin BKPSDM! 👋</h3>
                    <p class="mt-2 text-blue-100">Kelola program pelatihan dan data peserta LMS Kabupaten Klaten di sini.</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 border-l-4 border-blue-500">
                        <div class="text-gray-500 text-sm font-medium">Total Pelatihan</div>
                        <div class="text-3xl font-extrabold text-gray-800 mt-2">1</div>
                        <a href="{{ route('pelatihan.index') }}" class="inline-block mt-4 text-sm text-blue-600 hover:underline font-semibold">
                            Lihat Pelatihan &rarr;
                        </a>
                    </div>

                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 border-l-4 border-green-500">
                        <div class="text-gray-500 text-sm font-medium">Pelatihan Aktif</div>
                        <div class="text-3xl font-extrabold text-gray-800 mt-2">1</div>
                        <span class="inline-block mt-4 text-xs text-green-600 bg-green-100 px-2 py-1 rounded font-semibold">Status Buka</span>
                    </div>

                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 border-l-4 border-purple-500">
                        <div class="text-gray-500 text-sm font-medium">Aksi Cepat</div>
                        <div class="mt-3">
                            <a href="{{ route('pelatihan.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-md text-xs font-semibold hover:bg-blue-700">
                                + Buat Pelatihan Baru
                            </a>
                        </div>
                    </div>
                </div>

            @else
                <!-- TAMPILAN KHUSUS PESERTA (AHN) -->
                <div class="bg-gradient-to-r from-emerald-600 to-teal-700 overflow-hidden shadow-sm sm:rounded-lg text-white p-6">
                    <h3 class="text-2xl font-bold">Selamat Datang, {{ auth()->user()->name }}! 👋</h3>
                    <p class="mt-2 text-emerald-100">Selamat datang di LMS BKPSDM Kabupaten Klaten. Siap untuk belajar hal baru hari ini?</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 border-l-4 border-emerald-500">
                        <div class="text-gray-500 text-sm font-medium">Pelatihan Saya</div>
                        <div class="text-3xl font-extrabold text-gray-800 mt-2">0</div>
                        <p class="text-xs text-gray-500 mt-2">Kamu belum mendaftar di pelatihan mana pun.</p>
                    </div>

                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 border-l-4 border-teal-500">
                        <div class="text-gray-500 text-sm font-medium">Cari Pelatihan Baru</div>
                        <p class="text-sm text-gray-600 mt-2">Jelajahi program pelatihan yang sedang dibuka oleh BKPSDM.</p>
                        <a href="{{ route('pelatihan.index') }}" class="inline-block mt-4 px-4 py-2 bg-emerald-600 text-white text-xs font-semibold rounded hover:bg-emerald-700">
                            Lihat Katalog Pelatihan
                        </a>
                    </div>
                </div>
            @endif

        </div>
    </div>
</x-app-layout>