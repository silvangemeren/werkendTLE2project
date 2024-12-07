<x-edit-page-layout>
    <h1>Vacature Creeeren</h1>
    <form action="{{ route('vacancy.update', ['id' => $vacancy->id]) }}" method="post">
        @csrf
        @method('PUT')
        <div class="leftInput">
            <div>
                <label for="title">Naam</label>
                <input name="title" id="title" placeholder="bv. Albert Heijn" required value="{{ old('vacancy', $vacancy->title) }}"/>
            </div>
            <div>
                <label for="description">Omschrijving</label>
                <input name="description" id="description" placeholder="Omschrijving" required value="{{ old('vacancy', $vacancy->description) }}"/>
            </div>
            <div>
                <label for="location" class="flex">Locatie</label>
                <input name="adres" id="adres" placeholder="Adres" required value="{{ old('adres', $adres) }}"/>
                <input name="stad" id="stad" placeholder="Stad" required value="{{ old('stad', $stad) }}"/>
                <input name="postcode" id="postcode" placeholder="Postcode" required value="{{ old('postcode', $postcode) }}"/>
                <input name="land" id="land" placeholder="Land" required value="{{ old('land', $land) }}"/>
            </div>
            <div>
                <label for="function">Functie</label>
                <input name="function" id="function" placeholder="bv. Manager" required value="{{ old('vacancy', $vacancy->function) }}"/>
            </div>
        </div>

        <div class="rightInput">
            <div>
                <label for="work_hours">Werkuren</label>
                <input name="work_hours" id="work_hours" placeholder="bv. 40 uur/week" required value="{{ old('vacancy', $vacancy->work_hours) }}"/>
            </div>
            <div>
                <label for="salary">Salaris</label>
                <input name="salary" id="salary" placeholder="bv. €30.000 per jaar" required value="{{ old('vacancy', $vacancy->salary) }}"/>
            </div>
        </div>
        <x-primary-button type="submit">Opslaan</x-primary-button>
    </form>
</x-edit-page-layout>
