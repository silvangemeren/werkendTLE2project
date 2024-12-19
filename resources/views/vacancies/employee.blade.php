<x-app-layout>
    @vite('resources/css/app.css')

    <div class="max-w-4xl mx-auto p-4">
        <!-- Header Section -->
        <div class="flex items-center justify-between mb-4">
            <h1 class="text-2xl font-bold text-gray-800">Beschikbare Vacatures</h1>
        </div>

        <!-- Search Form -->
        <div class="flex items-center justify-between mb-4">
            <form action="{{ route('vacancy.search') }}" method="GET">
                <input type="text" name="vacancy" placeholder="Zoek" class="p-2 border rounded">
                <x-primary-button type="submit">Zoeken</x-primary-button>
            </form>
        </div>

        <!-- Vacancies List -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            @forelse($searchedVacancies ?? $vacancies as $vacancy)
                <div class="relative block"> <!-- Added 'relative' for positioning the badge -->
                    <!-- Vacancy Card -->
                    <div class="bg-white rounded-lg shadow-md p-6 relative">
                        <!-- Total Applicants Badge -->
                        <div class="absolute top-2 right-2 bg-red-500 text-white text-xs font-bold rounded-full h-6 w-6 flex items-center justify-center shadow">
                            {{ $vacancy->total_applications }}
                        </div>



                        <!-- Vacancy Image -->
                        <div class="w-full h-64 bg-gray-200 mb-4">
                            <img src="{{ $vacancy->imageUrl ? asset('/storage/' . $vacancy->imageUrl) : 'https://via.placeholder.com/150' }}"
                                 alt="Vacature Afbeelding"
                                 class="object-cover w-full h-full rounded-lg">
                        </div>

                        <!-- Vacancy Details -->
                        <div>
                            <h2 class="text-xl font-semibold text-gray-800">{{ $vacancy->title }}</h2>
                            <p class="text-gray-500 mt-2">{{ $vacancy->description }}</p>
                            <p class="text-gray-500 mt-2">{{ $vacancy->function }}</p>
                            <p class="text-gray-500 mt-2">Salaris: €{{ number_format($vacancy->salary, 2) }}</p>
                            <p class="text-gray-500 mt-2"><strong>Status: {{ $vacancy->status }}</strong></p>
                        </div>

                        <!-- View Vacancy Button -->
                        <div class="mt-4">
                            <a href="{{ route('vacancy.show', $vacancy->id) }}"
                               class="block text-center bg-pink-500 hover:bg-pink-600 text-white text-sm px-4 py-2 rounded-lg shadow mb-4">
                                Bekijk Vacature
                            </a>
                        </div>

                        <!-- Apply Button -->
                        <div class="mt-4">
                            @if(in_array($vacancy->id, $appliedVacancyIds))
                                <a class="block text-center bg-gray-500 text-white text-sm px-4 py-2 rounded-lg shadow mb-4 cursor-not-allowed"
                                   aria-disabled="true">
                                    Al Gesolliciteerd
                                </a>
                            @else
                                <a href="{{ route('vacancy.apply', ['vacancy' => $vacancy->id]) }}"
                                   class="block text-center bg-black hover:bg-green-800 text-white text-sm px-4 py-2 rounded-lg shadow mb-4"
                                   onclick="event.preventDefault(); document.getElementById('apply-form-{{ $vacancy->id }}').submit();">
                                    Solliciteren
                                </a>
                                <form id="apply-form-{{ $vacancy->id }}"
                                      action="{{ route('vacancy.apply', ['vacancy' => $vacancy->id]) }}"
                                      method="POST"
                                      style="display: none;">
                                    @csrf
                                </form>
                            @endif
                        </div>

                    </div>
                </div>
            @empty
                <!-- No Vacancies Message -->
                <p class="text-gray-500">Geen beschikbare vacatures om op te solliciteren.</p>
            @endforelse
        </div>
    </div>
</x-app-layout>
