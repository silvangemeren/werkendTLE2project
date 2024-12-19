<x-app-layout>
    @vite('resources/css/create-page.css')

    <div class="flex justify-center items-center min-h-screen bg-gray-100">
        <!-- Form Box -->
        <div class="max-w-4xl w-full bg-[#92AA83] p-8 rounded-lg shadow-md">
            <h1 class="text-3xl font-bold text-center text-[#2E342A] mb-8">Vacature Creëren</h1>

            <!-- Back to Vacatures Button -->
            @auth
                @if(auth()->user()->role === 'werknemer')
                    <!-- Link for employees (werknemer) -->
                    <a href="{{ route('vacancies.employee') }}" class="bg-[#AA0160] hover:bg-[#C21770] text-white font-bold px-4 py-2 rounded-lg shadow-md">
                        ← Terug naar Vacatures
                    </a>
                @elseif(auth()->user()->role === 'werkgever')
                    <!-- Link for employers (werkgever) -->
                    <a href="{{ route('vacancies.employer') }}" class="bg-[#AA0160] hover:bg-[#C21770] text-white font-bold px-4 py-2 rounded-lg shadow-md">
                        ← Terug naar Vacatures
                    </a>
                @endif
            @endauth



            <form action="{{ route('vacancy.store') }}" method="post" enctype="multipart/form-data" class="space-y-8">
                @csrf

                <!-- General Information -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <!-- Left Column -->
                    <div class="space-y-6">
                        <div>
                            <label for="title" class="block text-base font-bold text-[#2E342A]">Titel</label>
                            <input
                                type="text"
                                name="title"
                                id="title"
                                required
                                placeholder="Bijv. Albert Heijn"
                                class="mt-2 block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:ring-[#FAEC02] focus:border-[#FAEC02] bg-[#E2ECC8] text-[#2E342A]"
                            />
                        </div>
                        <div>
                            <label for="description" class="block text-base font-bold text-[#2E342A]">Omschrijving</label>
                            <textarea
                                name="description"
                                id="description"
                                placeholder="Omschrijf de vacature"
                                class="mt-2 block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:ring-[#FAEC02] focus:border-[#FAEC02] bg-[#E2ECC8] text-[#2E342A] h-24 resize-none"
                            ></textarea>
                            <p class="mt-2 text-sm font-bold text-[#2E342A]">
                                Klik <a href="#" id="more-info-link" class="text-blue-900 underline">hier</a> voor meer info.
                            </p>
                        </div>
                        <div>
                            <label for="adres" class="block text-base font-bold text-[#2E342A]">Locatie</label>
                            <div class="grid grid-cols-2 gap-4 mt-2">
                                <input
                                    type="text"
                                    name="adres"
                                    id="adres"
                                    required
                                    placeholder="Adres"
                                    class="block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:ring-[#FAEC02] focus:border-[#FAEC02] bg-[#E2ECC8] text-[#2E342A]"
                                />
                                <input
                                    type="text"
                                    name="stad"
                                    id="stad"
                                    required
                                    placeholder="Stad"
                                    class="block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:ring-[#FAEC02] focus:border-[#FAEC02] bg-[#E2ECC8] text-[#2E342A]"
                                />
                            </div>
                            <div class="grid grid-cols-2 gap-4 mt-4">
                                <input
                                    type="text"
                                    name="postcode"
                                    id="postcode"
                                    required
                                    placeholder="Postcode"
                                    class="block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:ring-[#FAEC02] focus:border-[#FAEC02] bg-[#E2ECC8] text-[#2E342A]"
                                />
                                <input
                                    type="text"
                                    name="land"
                                    id="land"
                                    required
                                    placeholder="Land"
                                    class="block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:ring-[#FAEC02] focus:border-[#FAEC02] bg-[#E2ECC8] text-[#2E342A]"
                                />
                            </div>
                        </div>
                        <!-- Modal for extra info -->
                        <div id="more-info-modal" class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center hidden">
                            <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-md sm:max-w-lg md:max-w-3xl">
                                <h3 class="text-xl font-semibold text-[#2E342A] mb-4">Meer Informatie over de Omschrijving</h3>
                                <p class="text-gray-600 mb-4">
                                    In de "Omschrijving" kunnen de volgende details opgenomen worden:
                                </p>

                                <p class="text-gray-600 mb-4">
                                    <strong>Handelingen:</strong> Specifieke taken of fysieke vereisten zoals:
                                <ul class="list-disc pl-5 mt-2">
                                    <li>Staan, zitten, of bewegen</li>
                                    <li>Handmatig werk</li>
                                </ul>
                                </p>
                                <br>
                                <p class="text-gray-600 mb-4">
                                    <strong>Vereisten:</strong> Benodigde certificaten of documenten:
                                <ul class="list-disc pl-5 mt-2">
                                    <li>Certificaten, rijbewijzen</li>
                                    <li>Specifieke opleiding</li>
                                </ul>
                                </p>
                                <br>
                                <p class="text-gray-600 mb-4">
                                    <strong>Rooster:</strong> Werkuren en flexibiliteit zoals:
                                <ul class="list-disc pl-5 mt-2">
                                    <li>Fulltime / Parttime</li>
                                    <li>Flexibele uren, ploegendiensten</li>
                                </ul>
                                </p>

                                <button id="close-modal" class="bg-[#AA0160] hover:bg-[#C21770] text-white px-6 py-2 rounded-md mt-4 block w-full sm:w-auto mx-auto sm:mx-0">
                                    Sluiten
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Right Column -->
                    <div class="space-y-6">
                        <div>
                            <label for="function" class="block text-base font-bold text-[#2E342A]">Functie</label>
                            <input
                                type="text"
                                name="function"
                                id="function"
                                required
                                placeholder="Bijv. Vakkenvuller"
                                class="mt-2 block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:ring-[#FAEC02] focus:border-[#FAEC02] bg-[#E2ECC8] text-[#2E342A]"
                            />
                        </div>
                        <div>
                            <label for="work_hours" class="block text-base font-bold text-[#2E342A]">Werkuren per week</label>
                            <input
                                type="text"
                                name="work_hours"
                                id="work_hours"
                                required
                                placeholder="Bijv. 24 uur/week"
                                class="mt-2 block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:ring-[#FAEC02] focus:border-[#FAEC02] bg-[#E2ECC8] text-[#2E342A]"
                            />
                        </div>
                        <div>
                            <label for="salary" class="block text-base font-bold text-[#2E342A]">Uurloon</label>
                            <input
                                type="text"
                                name="salary"
                                id="salary"
                                required
                                placeholder="Bijv. 15 euro/uur"
                                class="mt-2 block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:ring-[#FAEC02] focus:border-[#FAEC02] bg-[#E2ECC8] text-[#2E342A]"
                            />
                        </div>
                        <div>
                            <label for="imageUrl" class="block text-base font-bold text-[#2E342A]">Afbeelding</label>
                            <input
                                type="file"
                                name="imageUrl"
                                id="imageUrl"
                                required
                                class="mt-2 block w-full text-sm text-[#2E342A] file:mr-4 file:py-2 file:px-4 file:rounded-md file:bg-[#AA0160] file:text-white font-bold hover:file:bg-[#C21770]"
                            />
                        </div>
                    </div>
                </div>

                <!-- Submit Buttons -->
                <div class="flex justify-end items-center space-x-4">
                    <x-primary-button class="bg-[#AA0160] hover:bg-[#C21770] text-[#FAEC02] font-bold px-6 py-3 rounded-lg shadow-md">
                        Preview
                    </x-primary-button>
                    <x-primary-button class="bg-[#AA0160] hover:bg-[#C21770] text-[#FAEC02] font-bold px-6 py-3 rounded-lg shadow-md">
                        Creëren
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Show modal on "Klik hier voor meer" link click
        const moreInfoLink = document.getElementById('more-info-link');
        const modal = document.getElementById('more-info-modal');
        const closeModalButton = document.getElementById('close-modal');

        moreInfoLink.addEventListener('click', function (e) {
            e.preventDefault();
            modal.classList.remove('hidden');
        });

        closeModalButton.addEventListener('click', function () {
            modal.classList.add('hidden');
        });

        // Close the modal when clicking anywhere outside of the modal content
        modal.addEventListener('click', function (e) {
            // Close only if clicking on the backdrop (not the modal content)
            if (e.target === modal) {
                modal.classList.add('hidden');
            }
        });
    </script>
</x-app-layout>
