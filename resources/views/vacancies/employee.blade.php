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
                <div class="bg-white rounded-lg shadow-md p-4 flex flex-col sm:flex-row items-center gap-4">
                    <!-- Vacancy Image -->
                    <div class="w-24 h-24 sm:w-32 sm:h-32 overflow-hidden rounded-lg">
                        <img src="{{ $vacancy->imageUrl ? asset('/storage/' . $vacancy->imageUrl) : 'https://via.placeholder.com/150' }}" alt="Vacature Afbeelding" class="object-cover w-full h-full">
                    </div>

                    <!-- Vacancy Details -->
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between space-y-4 sm:space-y-0 p-4 bg-white rounded-lg shadow-md">
                        <!-- Title -->
                        <h2 class="text-lg font-bold text-gray-800 sm:flex-shrink-0 sm:mr-4">{{ $vacancy->title }}</h2>

                        <!-- Description -->
                        <p class="text-gray-500 sm:flex-1 mt-2 sm:mt-0">
                            {{ $vacancy->description }}
                        </p>

                        <!-- Details -->
                        <div class="mt-4 sm:mt-0 space-y-2">
                            <!-- Location -->
                            <p class="text-sm text-black-600 flex items-center">
                                <span class="font-bold text-gray-800">Location:</span>
                                <span class="ml-1 text-gray-600">{{ $vacancy->location }}</span>
                            </p>

                            <!-- Function -->
                            <p class="text-sm text-gray-600 flex items-center">
                                <span class="font-bold text-gray-800">Function:</span>
                                <span class="ml-1">{{ $vacancy->function }}</span>
                            </p>

                            <!-- Work Hours -->
                            <p class="text-sm text-gray-600 flex items-center">
                                <span class="font-bold text-gray-800">schedule:</span>
                                <span class="ml-1">{{ $vacancy->work_hours }} uren/week</span>
                            </p>

                            <!-- Salary -->
                            <p class="text-sm text-gray-600 flex items-center">
                                <span class="font-bold text-gray-800">Salary:</span>
                                <span class="ml-1">€{{ number_format($vacancy->salary, 2) }}</span>
                            </p>
                        </div>
                    </div>


                    <!-- Apply Button -->
                    <form action="{{ route('vacancy.apply', ['vacancy' => $vacancy->id]) }}" method="POST" class="inline-block">
                        @csrf
                        <button type="submit" class="bg-green-500 hover:bg-green-600 text-white text-sm px-4 py-2 mt-2 sm:mt-0 sm:ml-4 rounded-lg shadow">
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
