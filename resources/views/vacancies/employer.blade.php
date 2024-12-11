<x-layout>
    @vite('resources/css/app.css')
    <div class="max-w-4xl mx-auto p-4">
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
        <div class="space-y-4">
            @foreach($vacancies as $vacancy)
                <div class="bg-white rounded-lg shadow-md p-4 flex items-center gap-4">
                    <!-- Vacancy Image -->
                    <div class="w-24 h-24 overflow-hidden rounded-lg">
                        <img src="{{ asset('/storage/' . $vacancy->imageUrl) }}" alt="Vacature Afbeelding">
                    </div>

                    <!-- Vacancy Details -->
                    <div class="flex-1">
                        <h2 class="text-lg font-semibold text-gray-800">{{ $vacancy->title }}</h2>
                        <p class="text-gray-500">{{ $vacancy->description }}</p>
                        <p class="text-sm text-gray-600 mt-1 flex items-center">
                            <span class="material-icons text-gray-500 mr-1">location_on</span> {{ $vacancy->location }}
                        </p>
                        <p class="text-sm text-gray-600 flex items-center">
                            <span class="material-icons text-yellow-500 mr-1">star</span> {{ $vacancy->rating ?? 'No Ratings Yet' }} ({{ $vacancy->reviews_count ?? 0 }} reviews)
                        </p>
                    </div>

                    <!-- Action Button -->
                    <div>
                        <a href="{{ route('vacancy.edit', $vacancy->id) }}" class="bg-pink-500 hover:bg-pink-600 text-white text-sm px-4 py-2 rounded-lg shadow">
                            Beheer
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-layout>
