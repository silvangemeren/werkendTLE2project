<x-app-layout>
    @vite('resources/css/app.css')

    <div class="max-w-7xl mx-auto p-6">
        <!-- Header Section -->
        <div class="mb-6">
            <h1 class="text-3xl font-semibold text-[#2E342A]">Beschikbare Vacatures</h1>
        </div>

        <div class="flex items-center justify-between mb-4">
            <form action="{{ route('vacancy.search') }}" method="GET">
                <input type="text" name="vacancy" placeholder="Zoek" class="p-2 border rounded">
                <x-primary-button type="submit">Zoeken</x-primary-button>
            </form>
        </div>

        <!-- Vacancies List -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            @forelse($searchedVacancies ?? $vacancies as $vacancy)
                <div class="block">
                    <!-- Vacancy Card -->
                    <div class="bg-white rounded-lg shadow-md p-6 relative">
                        <!-- Total Applicants Badge -->
                        <div class="absolute top-2 right-2 bg-red-500 text-white text-xs font-bold rounded-full h-6 w-6 flex items-center justify-center shadow">
                            {{ $vacancy->total_applications }}
                        </div>



                        <!-- Vacancy Image -->
                        <div class="w-full h-64 bg-gray-200 mb-4">
                            <img src="{{ $vacancy->imageUrl ? asset('/storage/' . $vacancy->imageUrl) : 'https://via.placeholder.com/150' }}" alt="Vacature Afbeelding" class="object-cover w-full h-full rounded-lg">
                        </div>

                    <!-- Vacancy Title and Info -->
                    <h2 class="text-2xl font-bold text-[#2E342A] mb-2 break-words">{{ $vacancy->title }}</h2>
                    <p class="text-sm text-gray-600 mb-4 break-words">{{ $vacancy->function }}</p>

                    <!-- Vacancy Description, Salary, and Location -->
                    <div class="mb-6">
                        <p class="text-sm text-gray-700 mb-2 break-words">{{ Str::limit($vacancy->description, 150) }}</p>
                        <div class="flex justify-between text-sm text-gray-600 mb-4">
                            <span><strong>Salaris:</strong> {{ $vacancy->salary }} per uur</span>
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

                    <!-- Vacancy Info and Apply Button -->
                    <div class="flex justify-between flex-col">
                        <a href="{{ route('vacancy.show', $vacancy->id) }}" class="text-center bg-[#AA0160] hover:bg-[#8C004E] text-white text-sm px-4 py-2 rounded-md shadow-md mb-4">
                            Meer Info
                        </a>

                        @if(in_array($vacancy->id, $appliedVacancyIds))
                            <a class="block text-center bg-gray-500 text-white text-sm px-6 py-3 rounded-md cursor-not-allowed opacity-60">
                                Al Gesolliciteerd
                            </a>
                        @else
                            <a href="{{ route('vacancy.apply', ['vacancy' => $vacancy->id]) }} "
                               class="block text-center bg-[#AA0160] hover:bg-[#8C004E] text-white text-sm px-6 py-3 rounded-md transition duration-300">
                                Solliciteren
                            </a>
                        @endif
                    </div>
                </div>
            @empty
                <p class="text-[#2E342A]">Geen beschikbare vacatures om op te solliciteren.</p>
            @endforelse
        </div>
    </div>
</x-app-layout>
