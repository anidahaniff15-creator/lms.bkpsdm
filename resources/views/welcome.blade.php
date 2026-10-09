<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>LMS BKPSDM Kabupaten Klaten</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Tailwind CSS (via Vite) -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased bg-gray-100 min-h-screen flex flex-col justify-between">
        
        <!-- Header Navigasi -->
        <header class="w-full max-w-7xl mx-auto p-6 flex justify-between items-center">
            <div class="flex items-center space-x-3">
                <span class="text-xl font-bold text-gray-800 tracking-wide">LMS BKPSDM KLATEN</span>
            </div>

            @if (Route::has('login'))
                <nav class="flex items-center space-x-4">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-700 hover:text-blue-600 transition">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="font-semibold text-gray-700 hover:text-blue-600 transition">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-4 py-2 rounded-lg shadow transition">Register</a>
                        @endif
                    @endauth
                </nav>
            @endif
        </header>

        <!-- Main Hero Section -->
        <main class="flex-grow flex items-center justify-center text-center px-4">
            <div class="max-w-2xl">
                <h1 class="text-4xl font-extrabold text-gray-900 sm:text-5xl">
                    Sistem Manajemen Pembelajaran
                </h1>
                <p class="mt-4 text-lg text-gray-600">
                    BKPSDM Kabupaten Klaten - Tingkatkan kompetensi dan kapasitas ASN melalui pelatihan mandiri dan terstruktur.
                </p>
                <div class="mt-8 flex justify-center space-x-4">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-lg shadow-lg transition">
                            Buka Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-lg shadow-lg transition">
                            Masuk Ke Akun
                        </a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="bg-white hover:bg-gray-50 text-gray-800 font-bold py-3 px-6 rounded-lg border border-gray-300 shadow-sm transition">
                                Daftar Peserta
                            </a>
                        @endif
                    @endauth
                </div>
            </div>
        </main>

        <!-- Footer -->
        <footer class="text-center py-6 text-sm text-gray-500">
            &copy; {{ date('Y') }} BKPSDM Kabupaten Klaten. All rights reserved.
        </footer>

    </body>
</html>