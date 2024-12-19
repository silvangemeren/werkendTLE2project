<x-app-layout>
    <div class="max-w-4xl mx-auto p-4">
        <!-- Back Button -->
        <a href="{{ route('vacancy.index') }}" class="inline-block bg-gray-200 hover:bg-gray-300 text-gray-800 text-sm px-4 py-2 rounded-lg shadow mb-4">
            ← Terug naar Vacatures
        </a>

        <div class="bg-white rounded-lg shadow-md p-4">
            <!-- Image -->
            <div class="w-full h-64 overflow-hidden rounded-lg mb-4">
                <img src="{{ $vacancy->imageUrl ? asset('/storage/' . $vacancy->imageUrl) : 'https://via.placeholder.com/150' }}" alt="Vacature Afbeelding" class="object-cover w-full h-full">
            </div>

            <!-- Title -->
            <h1 class="text-2xl font-bold text-gray-800 mb-2">{{ $vacancy->title }}</h1>

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

            <!-- Details -->
            <div class="space-y-2">
                <p><strong>Location:</strong> {{ $vacancy->location }}</p>
                <p><strong>Function:</strong> {{ $vacancy->function }}</p>
                <p><strong>Schedule:</strong> {{ $vacancy->work_hours }} uren/week</p>
                <p><strong>Salary:</strong> €{{ ($vacancy->salary), 2 }}</p>
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
        </div>
    </div>
</x-app-layout>
