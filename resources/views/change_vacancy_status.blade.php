<x-app-layout>
    @vite('resources/css/app.css')
    <div class="max-w-4xl mx-auto p-6 bg-gray-50">
        <!-- Header Section -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-800 text-center">Vacatures Beheren</h1>
        </div>

        <!-- Vacancies List -->
        <div class="space-y-6">
            @foreach($vacancies_admin as $vacancy)
                <div class="bg-white rounded-lg shadow-lg p-6 flex items-center gap-6 hover:shadow-xl transition-shadow duration-200">
                    <!-- Vacancy Image -->
                    <div class="w-24 h-24 overflow-hidden rounded-lg bg-gray-200">
                        <img src="{{ asset('/storage/' . $vacancy->imageUrl) }}" alt="{{ $vacancy->title }}" class="w-full h-full object-cover">
                    </div>

                    <!-- Vacancy Details -->
                    <div class="flex-1">
                        <h2 class="text-xl font-semibold text-gray-800 mb-2">{{ $vacancy->title }}</h2>
                        <p class="text-gray-600 mb-3">{{ $vacancy->description }}</p>
                        <p class="text-sm text-gray-500 flex items-center mb-2">
                            <span class="material-icons text-gray-400 mr-2">location_on</span>
                            {{ $vacancy->location }}
                        </p>
                        <p class="text-sm text-gray-500 flex items-center">
                            <span class="material-icons text-yellow-500 mr-2">star</span>
                            {{ $vacancy->rating }} ({{ $vacancy->reviews_count }} reviews)
                        </p>
                    </div>

                    <!-- Action Button -->
                    <div class="ml-6">
                        <a href="{{ route('status', $vacancy->id) }}" class="bg-pink-500 hover:bg-pink-600 text-white text-sm font-semibold px-6 py-3 rounded-lg shadow-md transition-all duration-300">
                            Accepteren
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
