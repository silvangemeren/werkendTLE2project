@include('layouts.navigation')
<x-layout>

    @vite('resources/css/app.css')

    <div class="max-w-4xl mx-auto p-4">
        <!-- Header Section -->
        <div class="flex items-center justify-between mb-4">
            <h1 class="text-2xl font-bold text-gray-800">Beschikbare Vacatures</h1>
        </div>

        <div class="flex items-center justify-between mb-4">
            <form action="{{ route('vacancy.search') }}" method="GET">
                <input type="text" name="vacancy" placeholder="Zoek">
                <x-primary-button type="submit">Zoeken</x-primary-button>
            </form>
        </div>

        <!-- Vacancies List -->
        <div class="space-y-4">
            @forelse( $searchedVacancies ?? $vacancies as $vacancy)
                <a href="{{ route('vacancy.show', $vacancy->id) }}" class="block">
                    <div class="bg-white rounded-lg shadow-md p-4 flex flex-col sm:flex-row items-center gap-4">
                        <div class="w-24 h-24 sm:w-32 sm:h-32 overflow-hidden rounded-lg">
                            <img src="{{ $vacancy->imageUrl ? asset('/storage/' . $vacancy->imageUrl) : 'https://via.placeholder.com/150' }}" alt="Vacature Afbeelding" class="object-cover w-full h-full">
                        </div>
                        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between space-y-4 sm:space-y-0 p-4 bg-white rounded-lg shadow-md">
                            <h2 class="text-lg font-bold text-gray-800 sm:flex-shrink-0 sm:mr-4">{{ $vacancy->title }}</h2>
                            <p class="text-gray-500 sm:flex-1 mt-2 sm:mt-0">{{ $vacancy->description }}</p>
                        </div>
                    </div>
                </a>
            @empty
                <p class="text-gray-500">Geen beschikbare vacatures om op te solliciteren.</p>
            @endforelse
        </div>
    </div>

</x-layout>
