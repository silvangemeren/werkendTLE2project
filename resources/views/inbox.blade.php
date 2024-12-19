<x-app-layout>
    @if(auth()->user()->role === 'werknemer')
        <div class="max-w-7xl mx-auto p-4 sm:p-6">
            <!-- Success Message -->
            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Title -->
            <div class="p-4 sm:p-6 bg-[#92AA83] rounded-lg shadow-md mb-6">
                <h1 class="text-2xl sm:text-4xl font-extrabold text-center text-[#2E342A]">Mijn Sollicitaties</h1>
            </div>

            <!-- No Applications -->
            @if($appliedVacancies->isEmpty())
                <div class="bg-[#E2ECC8] p-4 sm:p-6 rounded-lg shadow-md">
                    <p class="text-md sm:text-lg font-bold text-[#2E342A]">Je hebt nog niet op een vacature gesolliciteerd.</p>
                </div>
            @else
                <div class="bg-[#E2ECC8] p-4 sm:p-6 rounded-lg shadow-md">
                    <div class="overflow-x-auto">
                        <table class="w-full border-collapse table-auto">
                            <thead>
                            <tr>
                                <th class="border border-gray-300 px-2 sm:px-6 py-3 text-sm sm:text-lg font-bold text-[#2E342A]">Titel</th>
                                <th class="border border-gray-300 px-2 sm:px-6 py-3 text-sm sm:text-lg font-bold text-[#2E342A]">Locatie</th>
                                <th class="border border-gray-300 px-2 sm:px-6 py-3 text-sm sm:text-lg font-bold text-[#2E342A]">Details</th>
                                <th class="border border-gray-300 px-2 sm:px-6 py-3 text-sm sm:text-lg font-bold text-[#2E342A]">Acties</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($appliedVacancies as $vacancy)
                                <tr class="hover:bg-gray-100 transition duration-200">
                                    <td class="border border-gray-300 px-2 sm:px-6 py-3 text-[#2E342A] text-sm sm:text-lg font-semibold">{{ $vacancy->title }}</td>
                                    <td class="border border-gray-300 px-2 sm:px-6 py-3">
                                        <div class="grid gap-2 text-[#2E342A] text-sm sm:text-lg font-semibold">
                                                <span>
                                                    @php
                                                        // Extract location parts from vacancy->location string
                                                        $locationParts = explode(',', $vacancy->location);

                                                        // Define individual components
                                                        $adres = trim($locationParts[0] ?? ''); // Adres
                                                        $stad = trim($locationParts[1] ?? '');  // Stad
                                                        $postcode = trim($locationParts[2] ?? ''); // Postcode
                                                        $land = trim($locationParts[3] ?? '');  // Land
                                                    @endphp

                                                    <div class="mt-2 space-y-1 text-[#2E342A] text-sm sm:text-lg font-semibold">
                                                        <div><strong>Adres:</strong> {{ $adres }}</div>
                                                        <div><strong>Stad:</strong> {{ $stad }}</div>
                                                        <div><strong>Postcode:</strong> {{ $postcode }}</div>
                                                        <div><strong>Land:</strong> {{ $land }}</div>
                                                    </div>
                                                </span>
                                        </div>
                                    </td>
                                    <td class="border border-gray-300 px-2 sm:px-6 py-3 text-center">
                                        <a href="{{ route('vacancy.show', $vacancy->id) }}"
                                           class="inline-block bg-[#AA0160] hover:bg-[#8C004E] text-white font-semibold text-xs sm:text-sm px-4 sm:px-6 py-2 sm:py-3 rounded-md shadow-md transition duration-300">
                                            Bekijk Details
                                        </a>
                                    </td>
                                    <td class="border border-gray-300 px-2 sm:px-6 py-3 text-center">
                                        <form method="POST"
                                              action="{{ route('application.unapply', ['id' => $vacancy->application_id]) }}">
                                            @csrf
                                            <button type="submit"
                                                    class="bg-red-500 hover:bg-red-600 text-white px-2 sm:px-4 py-1 sm:py-2 rounded font-semibold text-xs sm:text-sm">
                                                Afmelden
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
        </div>
    @else
        <!-- Unauthorized Access -->
        <div class="max-w-7xl mx-auto p-4 sm:p-6 text-red-600">
            <h1 class="text-lg sm:text-2xl font-bold">Je bent niet geautoriseerd om deze pagina te bekijken.</h1>
        </div>
    @endif
</x-app-layout>
