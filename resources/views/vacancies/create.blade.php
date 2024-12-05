<x-layout>
    @vite('resources/css/app.css')

    <div class="max-w-4xl mx-auto bg-green-50 p-6 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Vacature Beheren</h1>

        <form action="{{ route('vacancy.store') }}" method="post" enctype="multipart/form-data" class="space-y-6">
            @csrf
            <!-- Form Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Left Column -->
                <div class="space-y-4">
                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700">Naam</label>
                        <input
                            type="text"
                            name="title"
                            id="title"
                            required
                            placeholder="bv. Albert Heijn"
                            class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-pink-500 focus:border-pink-500 sm:text-sm"
                        />
                    </div>
                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700">Omschrijving</label>
                        <input
                            type="text"
                            name="description"
                            id="description"
                            placeholder="Omschrijving"
                            class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-pink-500 focus:border-pink-500 sm:text-sm"
                        />
                    </div>
                    <div>
                        <label for="adres" class="block text-sm font-medium text-gray-700">Locatie</label>
                        <div class="space-y-2">
                            <input
                                type="text"
                                name="adres"
                                id="adres"
                                required
                                class="block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-pink-500 focus:border-pink-500 sm:text-sm"
                            />
                            <input
                                type="text"
                                name="stad"
                                id="stad"
                                required
                                placeholder="Stad"
                                class="block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-pink-500 focus:border-pink-500 sm:text-sm"
                            />
                            <input
                                type="text"
                                name="postcode"
                                id="postcode"
                                required
                                placeholder="Postcode"
                                class="block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-pink-500 focus:border-pink-500 sm:text-sm"
                            />
                            <input
                                type="text"
                                name="land"
                                id="land"
                                required
                                placeholder="Land"
                                class="block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-pink-500 focus:border-pink-500 sm:text-sm"
                            />
                        </div>
                    </div>
                    <div>
                        <label for="function" class="block text-sm font-medium text-gray-700">Functie</label>
                        <input
                            type="text"
                            name="function"
                            id="function"
                            required
                            placeholder="bv. Manager"
                            class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-pink-500 focus:border-pink-500 sm:text-sm"
                        />
                    </div>
                </div>

                <!-- Right Column -->
                <div class="space-y-4">
                    <div>
                        <label for="work_hours" class="block text-sm font-medium text-gray-700">Werkuren</label>
                        <input
                            type="text"
                            name="work_hours"
                            id="work_hours"
                            required
                            placeholder="bv. 40 uur/week"
                            class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-pink-500 focus:border-pink-500 sm:text-sm"
                        />
                    </div>
                    <div>
                        <label for="salary" class="block text-sm font-medium text-gray-700">Salaris</label>
                        <input
                            type="text"
                            name="salary"
                            id="salary"
                            required
                            placeholder="bv. €30.000 per jaar"
                            class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-pink-500 focus:border-pink-500 sm:text-sm"
                        />
                    </div>
                    <div>
                        <label for="imageUrl" class="block text-sm font-medium text-gray-700">Afbeelding</label>
                        <input
                            type="file"
                            name="imageUrl"
                            id="imageUrl"
                            required
                            class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:border-pink-300 file:rounded-md file:bg-pink-100 file:text-white-700 hover:file:bg-green-200"
                        />
                    </div>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="text-right">
                <x-primary-button class="bg-pink-500 hover:bg-pink-600 text-white px-6 py-2 rounded-lg shadow">
                    Preview
                </x-primary-button>
                <x-primary-button class="bg-pink-500 hover:bg-green-600 text-white px-6 py-2 rounded-lg shadow ml-4">
                    Creeëren
                </x-primary-button>
            </div>
        </form>
    </div>
</x-layout>
