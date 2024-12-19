<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://example.com/radikal-font-url.css">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans">
        <div class="min-h-screen bg-[#FBFCF6]">
            @include('layouts.navigation')
            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        <footer class="bg-[#2E342A] text-[#FAEC02] py-8">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <!-- Footer Buttons Section -->
                <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-8">
                    <!-- Top 4 Sections (Yellow Text for headers) -->
                    <div class="flex flex-col items-center">
                        <h3 class="text-xl font-bold mb-4 text-[#FAEC02]">Voor werkzoekenden</h3>
                        <a href="#" class="text-white hover:text-gray-400 mb-2">Vind een baan</a>
                        <a href="#" class="text-white hover:text-gray-400">Veelgestelde vragen</a>
                    </div>

                    <div class="flex flex-col items-center">
                        <h3 class="text-xl font-bold mb-4 text-[#FAEC02]">Voor werkgevers</h3>
                        <a href="#" class="text-white hover:text-gray-400 mb-2">Spelregels</a>
                        <a href="#" class="text-white hover:text-gray-400">Veelgestelde vragen</a>
                    </div>

                    <div class="flex flex-col items-center">
                        <h3 class="text-xl font-bold mb-4 text-[#FAEC02]">Over Open Hiring</h3>
                        <a href="#" class="text-white hover:text-gray-400 mb-2">Ontstaan</a>
                        <a href="#" class="text-white hover:text-gray-400">Privacybeleid</a>
                    </div>

                    <div class="flex flex-col items-center">
                        <h3 class="text-xl font-bold mb-4 text-[#FAEC02]">Volg ons op</h3>
                        <a href="#" class="text-white hover:text-gray-400 mb-2">LinkedIn</a>
                        <a href="#" class="text-white hover:text-gray-400 mb-2">Instagram</a>
                        <a href="#" class="text-white hover:text-gray-400">Facebook</a>
                    </div>

                <!-- Footer Copyright Section -->
                <div class="mt-8 text-center text-sm text-white">
                    <p>&copy; {{ date('Y') }} Open Hiring. All Rights Reserved.</p>
                </div>
            </div>
        </footer>


    </body>
</html>
