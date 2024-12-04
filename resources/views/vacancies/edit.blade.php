<x-layout>
    <h1>Vacature Creeeren</h1>
    <form action="{{ route('vacancy.update', ['id' => $vacancy->id]) }}" method="post">
        @csrf
        @method('PUT')
        <div class="leftInput">
            <div>
                <label for="title">Naam</label>
                <input name="title" id="title" required value="{{ old('vacancy', $vacancy->title) }}"/>
            </div>
            <div>
                <label for="description">Omschrijving</label>
                <input name="description" id="description" required value="{{ old('vacancy', $vacancy->description) }}"/>
            </div>
            <div>
                <label for="location">Locatie</label>
                <input name="adres" id="adres" required value="{{ old('adres', $adres) }}"/>
                <input name="stad" id="stad" required value="{{ old('stad', $stad) }}"/>
                <input name="postcode" id="postcode" required value="{{ old('postcode', $postcode) }}"/>
                <input name="land" id="land" required value="{{ old('land', $land) }}"/>
            </div>
            <div>
                <label for="function">Functie</label>
                <input name="function" id="function" required value="{{ old('vacancy', $vacancy->function) }}"/>
            </div>
        </div>

        <div class="rightInput">
            <div>
                <label for="work_hours">Werkuren</label>
                <input name="work_hours" id="work_hours" required value="{{ old('vacancy', $vacancy->work_hours) }}"/>
            </div>
            <div>
                <label for="salary">Salaris</label>
                <input name="salary" id="salary" required value="{{ old('vacancy', $vacancy->salary) }}"/>
            </div>
        </div>
        <x-primary-button type="submit">Create</x-primary-button>
    </form>
</x-layout>
