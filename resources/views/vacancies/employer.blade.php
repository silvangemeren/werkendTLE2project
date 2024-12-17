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
            @foreach($vacancies as $vacancy)
                <div class="block">
                    <!-- Vacancy Card -->
                    <div class="bg-white rounded-lg shadow-md p-6">
                        <!-- Vacancy Image -->

                        <div class="w-full h-64 bg-gray-200 mb-4">
                            <img src="{{ asset('/storage/' . $vacancy->imageUrl) }}" alt="Vacature Afbeelding" class="object-cover w-full h-full rounded-lg">
                        </div>

                        <!-- Vacancy Details -->
                        <div>
                            <h2 class="text-xl font-semibold text-gray-800">{{ $vacancy->title }}</h2>
                            <p class="text-gray-500 mt-2">{{ $vacancy->description }}</p>
                            <p class="text-gray-500 mt-2">{{ $vacancy->function }}</p>
                            <p class="text-gray-500 mt-2">{{ $vacancy->salary }}</p>
                        </div>

                        <!-- Manage Button -->
                        <div class="mt-4">
                            <a href="{{ route('vacancy.show', $vacancy->id) }}" class="block text-center bg-pink-500 hover:bg-pink-600 text-white text-sm px-4 py-2 rounded-lg shadow mb-4">
                                Bekijk Vacature
                            </a>
                            <a href="{{ route('vacancy.edit', $vacancy->id) }}" class="block text-center bg-pink-500 hover:bg-pink-600 text-white text-sm px-4 py-2 rounded-lg shadow">
                                Beheer
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

</x-app-layout>
