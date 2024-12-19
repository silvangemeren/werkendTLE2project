<x-app-layout>

    <div class="max-w-4xl mx-auto p-4">
        <!-- Terug Knop -->
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

        <!-- Vacature Details Sectie -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <!-- Afbeelding -->
            <div class="w-full h-64 overflow-hidden rounded-lg mb-4">
                <img src="{{ $vacancy->imageUrl ? asset('/storage/' . $vacancy->imageUrl) : 'https://via.placeholder.com/150' }}" alt="Vacature Afbeelding" class="object-cover w-full h-full">
            </div>

            <!-- Vacature Titel -->
            <h1 class="text-3xl font-semibold text-gray-800 mb-4">{{ $vacancy->title }}</h1>

            @if(isset($queuePosition))
                <div class="mt-4 text-sm text-gray-700">
                    Je hebt {{ $queuePosition }} sollicitanten voor je in de wachtrij.
                </div>
            @else
                <div class="mt-4 text-sm text-gray-500">
                    Je hebt nog niet gesolliciteerd voor deze vacature.
                </div>
            @endif

            <!-- Description -->
            <p class="text-gray-600 mb-4">{{ $vacancy->description }}</p>
            <!-- Vacature Omschrijving -->
            <p class="text-gray-600 mb-4 break-words">{!! nl2br(e($vacancy->description)) !!}</p>

            <!-- Vacature Gegevens -->
            <div class="space-y-3 text-gray-700">
                <p><strong>Locatie:</strong> {{ $vacancy->location }}</p>
                <p><strong>Functie:</strong> {{ $vacancy->function }}</p>
                <p><strong>Werkuren:</strong> {{ $vacancy->work_hours }}</p>
                <p><strong>Salaris:</strong> {{ $vacancy->salary }}</p>
                <p><strong>Status:</strong> {{ $vacancy->status }}</p>
            </div>

            <!-- Apply Button -->
            <div class="mt-6">
                @if($has_applied)
                    <!-- Greyed-Out Button -->
                    <button class="bg-gray-500 text-white text-sm px-4 py-2 rounded-lg shadow cursor-not-allowed" disabled>
                        Je hebt al gesolliciteerd
                    </button>
                @else
                    <!-- Active Button -->
                    <form action="{{ route('vacancy.apply', ['vacancy' => $vacancy->id]) }}" method="POST">
                        @csrf
                        <button type="submit" class="bg-green-500 hover:bg-green-600 text-white text-sm px-4 py-2 rounded-lg shadow">
                            Solliciteren
                        </button>
                    </form>
                @endif
            </div>
            <!-- Solliciteren Knop -->
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
