<x-app-layout>
    @if(auth()->user()->role === 'werknemer')
    <div class="max-w-7xl mx-auto p-6">
        <!-- Succes Bericht -->
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
                {{ session('success') }}
            </div>
        @endif

        <!-- Titel -->
        <h1 class="text-3xl font-bold text-gray-800 mb-4">Mijn Sollicitaties</h1>

        <!-- Geen sollicitaties -->
        @if($appliedVacancies->isEmpty())
            <p class="text-gray-600">Je hebt nog niet op een vacature gesolliciteerd.</p>
        @else
            <table class="w-full border-collapse border border-gray-200">
                <thead>
                <tr>
                    <th class="border border-gray-300 px-4 py-2">Titel</th>
                    <th class="border border-gray-300 px-4 py-2">Locatie</th>
                    <th class="border border-gray-300 px-4 py-2">Status</th>
                    <th class="border border-gray-300 px-4 py-2">Acties</th>
                </tr>
                </thead>
                <tbody>
                @foreach($appliedVacancies as $vacancy)
                    <tr>
                        <td class="border border-gray-300 px-4 py-2">{{ $vacancy->title }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $vacancy->location }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $vacancy->status }}</td>
                        <td class="border border-gray-300 px-4 py-2">
                            <form method="POST" action="{{ route('application.unapply', ['id' => $vacancy->application_id]) }}">
                                @csrf
                                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded">
                                    Afmelden
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif
    </div>
    @else
        <!-- Ongeautoriseerde toegang -->
        <div class="max-w-7xl mx-auto p-6 text-red-600">
            <h1 class="text-2xl font-bold">Je bent niet geautoriseerd om deze pagina te bekijken.</h1>
        </div>
    @endif
</x-app-layout>
