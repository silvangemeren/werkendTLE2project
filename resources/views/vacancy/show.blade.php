<x-app-layout>

    <div class="max-w-4xl mx-auto p-4">
        <!-- Back Button -->
        @auth
            @if(auth()->user()->role === 'werknemer')
                <a href="{{ route('vacancies.employee') }}" class="inline-block bg-gray-200 hover:bg-gray-300 text-gray-800 text-sm px-4 py-2 rounded-lg shadow mb-4">
                    ← Terug naar Vacatures
                </a>
            @endif
        @endauth

        @guest
            <a href="{{ route('vacancies.guest') }}" class="inline-block bg-gray-200 hover:bg-gray-300 text-gray-800 text-sm px-4 py-2 rounded-lg shadow mb-4">
                ← Terug naar Vacatures
            </a>
        @endguest

        <!-- Vacancy Details Section -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <!-- Image -->
            <div class="w-full h-64 overflow-hidden rounded-lg mb-4">
                <img src="{{ $vacancy->imageUrl ? asset('/storage/' . $vacancy->imageUrl) : 'https://via.placeholder.com/150' }}" alt="Vacature Afbeelding" class="object-cover w-full h-full">
            </div>

            <!-- Vacancy Title -->
            <h1 class="text-3xl font-semibold text-gray-800 mb-4">{{ $vacancy->title }}</h1>

            <!-- Vacancy Description -->
            <p class="text-gray-600 mb-4 break-words">{!! nl2br(e($vacancy->description)) !!}</p>

            <!-- Vacancy Details -->
            <div class="space-y-3 text-gray-700">
                <p><strong>Location:</strong> {{ $vacancy->location }}</p>
                <p><strong>Function:</strong> {{ $vacancy->function }}</p>
                <p><strong>Schedule:</strong> {{ $vacancy->work_hours }}</p>
                <p><strong>Salary:</strong> €{{ number_format((float)$vacancy->salary, 2, ',', '.') }}</p>
                <p><strong>Status:</strong> {{ $vacancy->status }}</p>
            </div>

            <!-- Apply Button -->
            <form action="{{ route('vacancy.apply', ['vacancy' => $vacancy->id]) }}" method="POST" class="mt-6">
                @csrf
                <button type="submit" class="bg-green-500 hover:bg-green-600 text-white text-sm px-6 py-3 rounded-lg shadow-md">
                    Solliciteren
                </button>
            </form>
            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
                    <strong>Succes:</strong> {{ session('success') }}
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
