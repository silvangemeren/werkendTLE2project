<div>
    <div>
        @foreach($vacancies as $vacancy)
            <div class="relative vacancy-item mb-4 p-4 border rounded-lg bg-white shadow">

                <!-- Vacancy Details -->
                <h3 class="text-lg font-semibold">{{ $vacancy->title }}</h3>
                <p class="text-sm text-gray-600">{{ $vacancy->description }}</p>

                <!-- Conditional Buttons -->
                @if(in_array($vacancy->id, $appliedVacancyIds ?? []))
                    <button class="bg-gray-500 text-white text-sm px-4 py-2 rounded-lg shadow cursor-not-allowed" disabled>
                        Al Gesolliciteerd
                    </button>
                @else
                    <form action="{{ route('vacancy.apply', ['vacancy' => $vacancy->id]) }}" method="POST" class="mt-2">
                        @csrf
                        <button type="submit" class="bg-green-500 hover:bg-green-600 text-white text-sm px-4 py-2 rounded-lg shadow">
                            Solliciteren
                        </button>
                    </form>
                @endif
            </div>
        @endforeach
    </div>

</div>
