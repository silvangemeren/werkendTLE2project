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
                <div class="bg-white rounded-lg shadow-md p-4 flex items-center gap-4">
                    <!-- Vacancy Image -->
                    <div class="w-24 h-24 overflow-hidden rounded-lg">
                        <img src="{{ asset('/storage/' . $vacancy->imageUrl) }}" alt="Vacature Afbeelding" class="object-cover w-full h-full">
                    </div>

                    <!-- Vacancy Details -->
                    <div class="flex-1">
                        <h2 class="text-lg font-semibold text-gray-800">{{ $vacancy->title }}</h2>
                        <p class="text-gray-500">{{ $vacancy->description }}</p>
                        <div class="mt-2 space-y-1">
                            <p class="text-sm text-gray-600 flex items-center">
                                <span class="material-icons text-gray-500 mr-1">location_on</span> {{ $vacancy->location }}
                            </p>
                            <p class="text-sm text-gray-600 flex items-center">
                                <span class="material-icons text-yellow-500 mr-1">work</span> {{ $vacancy->function }}
                            </p>
                            <p class="text-sm text-gray-600 flex items-center">
                                <span class="material-icons text-gray-500 mr-1">schedule</span> {{ $vacancy->work_hours }} uren/week
                            </p>
                            <p class="text-sm text-gray-600 flex items-center">
                                <span class="material-icons text-gray-500 mr-1">euro</span> €{{ ($vacancy->salary) }}
                            </p>
                        </div>
                    </div>

                    <!-- Apply Button -->
                    <form action="{{ route('vacancy.apply', ['vacancy' => $vacancy->id]) }}" method="POST" class="inline-block">
                        @csrf
                        <button type="submit" class="bg-green-500 hover:bg-green-600 text-white text-sm px-4 py-2 rounded-lg shadow">
                            Solliciteren
                        </button>
                    </form>
                </div>
            @empty
                <p class="text-gray-500">Geen beschikbare vacatures om op te solliciteren.</p>
            @endforelse
        </div>
    </div>
</x-layout>
