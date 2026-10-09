<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-gray-800 leading-tight">
            {{ __('Dashboard Peserta LMS BKPSDM') }}
        </h2>
    </x-slot>

    <div class="py-8 bg-slate-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            
            <!-- Banner Peserta -->
            <div class="bg-gradient-to-r from-emerald-600 to-teal-700 rounded-2xl shadow-lg p-6 text-white flex justify-between items-center">
                <div>
                    <h1 class="text-2xl font-extrabold mb-1">Selamat Datang di Portal Pembelajaran! 🎓</h1>
                    <p class="text-emerald-100 text-sm">Pilih dan ikuti pelatihan yang tersedia untuk meningkatkan kompetensi Anda.</p>
                </div>
            </div>

            <!-- Ringkasan Progres Peserta -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 flex items-center justify-between">
                    <div>
                        <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Pelatihan Diikuti</p>
                        <p class="text-3xl font-black text-gray-800 mt-1">0</p>
                    </div>
                    <div class="w-12 h-12 bg-emerald-50 text-emerald-600 rounded-xl flex items-center justify-center font-bold text-xl">
                        📖
                    </div>
                </div>

                <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 flex items-center justify-between">
                    <div>
                        <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Sertifikat Saya</p>
                        <p class="text-3xl font-black text-gray-800 mt-1">0</p>
                    </div>
                    <div class="w-12 h-12 bg-amber-50 text-amber-600 rounded-xl flex items-center justify-center font-bold text-xl">
                        🏆
                    </div>
                </div>
            </div>

            <!-- Katalog / Daftar Pelatihan -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                <h3 class="text-lg font-bold text-gray-800 mb-4">Pelatihan Saya</h3>
                <div class="p-8 text-center text-gray-500 bg-gray-50 rounded-xl border border-dashed border-gray-200">
                    <p class="font-medium">Belum ada pelatihan yang diikuti.</p>
                    <p class="text-xs mt-1 text-gray-400">Silakan hubungi Admin atau buka katalog untuk mendaftar pelatihan.</p>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>