<x-app-layout>
    <h1 class="text-3xl font-bold text-center text-gray-800 mb-8">Vacature Bewerken</h1>

    <!-- Update Form -->
    <form action="{{ route('vacancy.update', ['id' => $vacancy->id]) }}" method="post" enctype="multipart/form-data" class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-md">
        @csrf
        @method('PUT')

        <!-- Left Column for General Info -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
            <!-- Vacancy Name -->
            <div>
                <label for="title" class="block text-sm font-medium text-gray-700">Naam</label>
                <input name="title" id="title" placeholder="bv. Albert Heijn" required value="{{ old('vacancy', $vacancy->title) }}" class="mt-1 p-3 border border-gray-300 rounded-md w-full focus:outline-none focus:ring-2 focus:ring-pink-500"/>
            </div>

            <!-- Vacancy Description -->
            <div>
                <label for="description" class="block text-sm font-medium text-gray-700">Omschrijving</label>
                <input name="description" id="description" placeholder="Omschrijving" required value="{{ old('vacancy', $vacancy->description) }}" class="mt-1 p-3 border border-gray-300 rounded-md w-full focus:outline-none focus:ring-2 focus:ring-pink-500"/>
            </div>
        </div>

        <!-- Location Fields -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
            <div>
                <label for="adres" class="block text-sm font-medium text-gray-700">Adres</label>
                <input name="adres" id="adres" placeholder="Adres" required value="{{ old('adres', $adres) }}" class="mt-1 p-3 border border-gray-300 rounded-md w-full focus:outline-none focus:ring-2 focus:ring-pink-500"/>
            </div>
            <div>
                <label for="stad" class="block text-sm font-medium text-gray-700">Stad</label>
                <input name="stad" id="stad" placeholder="Stad" required value="{{ old('stad', $stad) }}" class="mt-1 p-3 border border-gray-300 rounded-md w-full focus:outline-none focus:ring-2 focus:ring-pink-500"/>
            </div>
            <div>
                <label for="postcode" class="block text-sm font-medium text-gray-700">Postcode</label>
                <input name="postcode" id="postcode" placeholder="Postcode" required value="{{ old('postcode', $postcode) }}" class="mt-1 p-3 border border-gray-300 rounded-md w-full focus:outline-none focus:ring-2 focus:ring-pink-500"/>
            </div>
            <div>
                <label for="land" class="block text-sm font-medium text-gray-700">Land</label>
                <input name="land" id="land" placeholder="Land" required value="{{ old('land', $land) }}" class="mt-1 p-3 border border-gray-300 rounded-md w-full focus:outline-none focus:ring-2 focus:ring-pink-500"/>
            </div>
        </div>

        <!-- Function and Work Hours -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
            <div>
                <label for="function" class="block text-sm font-medium text-gray-700">Functie</label>
                <input name="function" id="function" placeholder="bv. Manager" required value="{{ old('vacancy', $vacancy->function) }}" class="mt-1 p-3 border border-gray-300 rounded-md w-full focus:outline-none focus:ring-2 focus:ring-pink-500"/>
            </div>

            <div>
                <label for="work_hours" class="block text-sm font-medium text-gray-700">Werkuren</label>
                <input name="work_hours" id="work_hours" placeholder="bv. 40 uur/week" required value="{{ old('vacancy', $vacancy->work_hours) }}" class="mt-1 p-3 border border-gray-300 rounded-md w-full focus:outline-none focus:ring-2 focus:ring-pink-500"/>
            </div>
        </div>

        <!-- Salary Field -->
        <div class="mb-6">
            <label for="salary" class="block text-sm font-medium text-gray-700">Salaris</label>
            <input name="salary" id="salary" placeholder="bv. €30.000 per jaar" required value="{{ old('vacancy', $vacancy->salary) }}" class="mt-1 p-3 border border-gray-300 rounded-md w-full focus:outline-none focus:ring-2 focus:ring-pink-500"/>
        </div>

        <!-- Image Upload -->
        <div class="mb-6">
            <label for="imageUrl" class="block text-sm font-medium text-gray-700">Afbeelding</label>
            <input type="file" name="imageUrl" id="imageUrl" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:border-pink-300 file:rounded-md file:bg-pink-100 file:text-white-700 hover:file:bg-green-200"/>
        </div>

        <!-- Save Button -->
        <div class="flex justify-between mt-8">
            <x-primary-button type="submit" class="w-full sm:w-auto bg-pink-500 hover:bg-pink-600 text-white px-6 py-3 rounded-md">
                Opslaan
            </x-primary-button>
        </div>
    </form>

    <!-- Delete Form -->
    <form action="{{ route('vacancy.destroy', ['id' => $vacancy->id]) }}" method="post" class="max-w-4xl mx-auto mt-4">
        @csrf
        @method('DELETE')
        <x-primary-button type="submit" class="w-full sm:w-auto bg-red-500 hover:bg-red-600 text-white px-6 py-3 rounded-md">
            Verwijderen
        </x-primary-button>
    </form>

    <!-- Back Button -->
    <div class="mt-6 text-center">
        <button onclick="history.back()" class="text-white bg-gray-600 hover:bg-gray-700 px-4 py-2 rounded-md">
            Terug
        </button>
    </div>
</x-app-layout>
