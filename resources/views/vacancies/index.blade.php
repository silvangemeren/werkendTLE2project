<link rel="stylesheet" href="{{ asset('css/vacature.css') }}">
<x-layout>

    <form action="{{ route('vacancy.create') }}" method="GET">
        <x-primary-button>Create</x-primary-button>
    </form>

    <div>
        @foreach($vacancies as $vacancy)
            <div>
                <x-vacancy-item :vacancy="$vacancy"></x-vacancy-item>
                <a href="{{ route('vacancy.edit', $vacancy->id) }}">Bewerk</a>
            </div>
        @endforeach
    </div>
</x-layout>
