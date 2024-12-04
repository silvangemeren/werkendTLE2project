<x-layout>
    @vite('resources/css/app.css')
    <div class="max-w-4xl mx-auto bg-gray-50 p-8 rounded-lg shadow-md">
        <h1 class="text-3xl font-bold text-gray-800 mb-6 text-center">Vacature Creëren</h1>
        <form action="{{ route('vacancy.store') }}" method="post" enctype="multipart/form-data" class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @csrf
            <!-- Left Column -->
            <div class="space-y-4">
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700">Naam</label>
                    <input
                        name="title"
                        id="title"
                        type="text"
                        required
                        placeholder="bv. Albert Heijn"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    />
                </div>
                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700">Omschrijving</label>
                    <input
                        name="description"
                        id="description"
                        type="text"
                        required
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    />
                </div>
                <div>
                    <label for="location" class="block text-sm font-medium text-gray-700">Locatie</label>
                    <div class="space-y-2">
                        <input
                            name="adress"
                            id="location"
                            required
                            placeholder="Adres"
                            class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                        />
                        <input
                            name="city"
                            id="location"
                            required
                            placeholder="Stad"
                            class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                        />
                        <input
                            name="zipcode"
                            id="location"
                            required
                            placeholder="Postcode"
                            class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                        />
                        <input
                            name="country"
                            id="location"
                            required
                            placeholder="Land"
                            class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                        />
                    </div>
                </div>
                <div>
                    <label for="function" class="block text-sm font-medium text-gray-700">Functie</label>
                    <input
                        name="function"
                        id="function"
                        required
                        placeholder="bv. Manager"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    />
                </div>
            </div>

            <!-- Right Column -->
            <div class="space-y-4">
                <div>
                    <label for="hours" class="block text-sm font-medium text-gray-700">Werkuren</label>
                    <input
                        name="hours"
                        id="hours"
                        required
                        placeholder="bv. 40 uur/week"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    />
                </div>
                <div>
                    <label for="salary" class="block text-sm font-medium text-gray-700">Salaris</label>
                    <input
                        name="salary"
                        id="salary"
                        required
                        placeholder="bv. 30.000 per jaar"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    />
                </div>
                <div>
                    <label for="image" class="block text-sm font-medium text-gray-700">Afbeelding</label>
                    <input
                        name="image"
                        id="image"
                        type="file"
                        required
                        class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded file:border file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-600 hover:file:bg-indigo-100"
                    />
                </div>
            </div>

            <!-- Submit Button -->
            <div class="col-span-1 md:col-span-2 text-center">
                <x-primary-button type="submit" class="bg-indigo-600 text-white px-6 py-2 rounded-lg shadow hover:bg-indigo-700">
                    Creëren
                </x-primary-button>
            </div>
        </form>
    </div>
</x-layout>
