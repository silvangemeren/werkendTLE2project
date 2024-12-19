<x-app-layout>
    @vite('resources/css/app.css')

    <div class="max-w-7xl mx-auto p-6">
        <!-- Header Section -->
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-3xl font-semibold text-[#2E342A]">Vacatures Beheren</h1>
            <form action="{{ route('vacancy.create') }}" method="GET">
                <x-primary-button class="bg-[#AA0160] hover:bg-[#8C004E] text-white px-6 py-3 rounded-md shadow-md">
                    Nieuwe Vacature
                </x-primary-button>
            </form>
        </div>

        <!-- Vacancies List -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
            @foreach($employer_vacancies as $vacancy)
                <div class="relative bg-white rounded-lg shadow-lg p-6"> <!-- Added 'relative' for counter positioning -->
                    <!-- Counter for Applications -->
                    <div class="absolute top-2 right-2 bg-red-500 text-white text-xs font-bold rounded-full h-8 w-8 flex items-center justify-center shadow">
                        {{ $vacancy->applications_count ?? 0 }}
                    </div>

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
