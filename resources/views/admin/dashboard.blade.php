<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard Admin BKPSDM Klaten') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Card Selamat Datang -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-bold mb-2">Selamat Datang, Admin BKPSDM! 👋</h3>
                    <p class="text-gray-600">Sistem Learning Management System (LMS) BKPSDM Klaten siap digunakan untuk mengelola data pelatihan, pendaftaran peserta, dan sertifikat.</p>
                </div>
            </div>

            <!-- Ringkasan Fitur / Menu Cepat -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-100">
                    <div class="text-indigo-600 font-bold text-lg mb-2">📚 Kelola Pelatihan</div>
                    <p class="text-sm text-gray-600 mb-4">Tambah, edit, atau atur link Pre-test, Post-test, dan Evaluasi pelatihan.</p>
                    <a href="{{ route('admin.pelatihan.index') }}" class="inline-block bg-indigo-600 text-white text-sm px-4 py-2 rounded hover:bg-indigo-700 transition">
                        Buka Kelola Pelatihan
                    </a>
                </div>

                <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-100">
                    <div class="text-green-600 font-bold text-lg mb-2">👥 Pendaftaran Peserta</div>
                    <p class="text-sm text-gray-600 mb-4">Verifikasi pendaftaran peserta (ACC / Ditolak) dan pantau status peserta.</p>
                    <a href="{{ route('admin.pendaftaran.index') }}" class="inline-block bg-green-600 text-white text-sm px-4 py-2 rounded hover:bg-green-700 transition">
                        Lihat Pendaftar
                    </a>
                </div>

                <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-100">
                    <div class="text-amber-600 font-bold text-lg mb-2">🎓 Sertifikat</div>
                    <p class="text-sm text-gray-600 mb-4">Unggah file sertifikat PDF untuk peserta yang sudah menyelesaikan pelatihan.</p>
                    <a href="{{ route('admin.pendaftaran.index') }}" class="inline-block bg-amber-600 text-white text-sm px-4 py-2 rounded hover:bg-amber-700 transition">
                        Kelola Sertifikat
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>