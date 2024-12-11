
<div>
    @foreach($vacancies as $vacancy)
        <div class="vacancy-item mb-4 p-4 border rounded-lg">
            <h3 class="text-lg font-semibold">{{ $vacancy->title }}</h3>
            <p class="text-sm text-gray-600">{{ $vacancy->description }}</p>

            <!-- Conditional Button Rendering Based on User's Role -->
            @if(Auth::user()->role === 'werkgever') {{-- Check for employer role --}}
            <!-- Beheer (Edit) Button -->
            <a href="{{ route('vacancy.edit', ['vacancy' => $vacancy->id]) }}" class="bg-pink-500 hover:bg-pink-600 text-white text-sm px-4 py-2 rounded-lg shadow">
                Beheer
            </a>
            @elseif(Auth::user()->role === 'werknemer') {{-- Check for employee role --}}
            <!-- Apply Button -->
            <form action="{{ route('vacancy.apply', ['vacancy' => $vacancy->id]) }}" method="POST" class="inline-block">
                @csrf
                <button type="submit" class="bg-green-500 hover:bg-green-600 text-white text-sm px-4 py-2 rounded-lg shadow">
                    Solliciteren
                </button>
            </form>
            @endif
        </div>
    @endforeach
</div>
