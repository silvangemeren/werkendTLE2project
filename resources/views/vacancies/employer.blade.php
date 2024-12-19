<x-app-layout>
    @vite('resources/css/app.css')

    <div class="max-w-screen-2xl mx-auto p-4">
        <!-- Header Section -->
        <div class="flex items-center justify-between mb-4">
            <h1 class="text-2xl font-bold text-gray-800">Vacatures Beheren</h1>
            <form action="{{ route('vacancy.create') }}" method="GET">
                <x-primary-button class="bg-pink-500 hover:bg-pink-600 text-white px-4 py-2 rounded-lg">
                    Nieuwe Vacature
                </x-primary-button>
            </form>
        </div>

        <!-- Vacancies List -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-6">
            @foreach($employer_vacancies as $vacancy)
                <div class="block relative"> <!-- Added 'relative' for badge positioning -->
                    <!-- Vacancy Card -->
                    <div class="bg-white rounded-lg shadow-md p-6">

                        <!-- Applications Count Badge -->
                        <div class="absolute top-2 right-2 bg-red-500 text-white text-xs font-bold rounded-full h-6 w-6 flex items-center justify-center shadow">
                            {{ $vacancy->applications_count ?? 0 }}
                        </div>

                        <!-- Vacancy Image -->
                        <div class="w-full h-64 bg-gray-200 mb-4">
                            <img src="{{ asset('/storage/' . $vacancy->imageUrl) }}" alt="Vacature Afbeelding" class="object-cover w-full h-full rounded-lg">
                <div class="bg-white rounded-lg shadow-lg p-6">
                    <!-- Vacancy Image -->
                    <div class="w-full h-48 bg-gray-200 mb-4 rounded-md">
                        <img src="{{ asset('/storage/' . $vacancy->imageUrl) }}" alt="Vacature Afbeelding" class="object-cover w-full h-full rounded-md">
                    </div>

                    <!-- Vacancy Title and Info -->
                    <h2 class="text-2xl font-bold text-[#2E342A] mb-2">{{ $vacancy->title }}</h2>
                    <p class="text-sm text-gray-600 mb-4">{{ $vacancy->function }}</p>

                    <!-- Vacancy Description, Salary, and Location -->
                    <div class="mb-6">
                        <p class="text-sm text-gray-700 mb-2 truncate">{{ Str::limit($vacancy->description, 150) }}</p>
                        <div class="flex justify-between text-sm text-gray-600 mb-4">
                            <span><strong>Salaris:</strong> {{ $vacancy->salary }}</span>
                            <span><strong>Locatie:</strong>
                                @php
                                    // Extract city from location string
                                    $locationParts = explode(',', $vacancy->location);
                                    $city = trim($locationParts[1] ?? ''); // Default to empty if no city
                                @endphp
                                {{ $city }}
                            </span>
                        </div>
                    </div>

                    <!-- Vacancy Info and Manage Buttons -->
                    <div class="flex justify-between flex-col">
                        <a href="{{ route('vacancy.show', $vacancy->id) }}" class="text-center bg-[#AA0160] hover:bg-[#8C004E] text-white text-sm px-6 py-3 rounded-md shadow-md mb-4">
                            Bekijk Vacature
                        </a>

                        <a href="{{ route('vacancy.edit', $vacancy->id) }}" class="text-center bg-[#AA0160] hover:bg-[#8C004E] text-white text-sm px-6 py-3 rounded-md shadow-md">
                            Beheer
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

</x-app-layout>
