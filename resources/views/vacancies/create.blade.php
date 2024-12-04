<x-layout>
    <h1>Vacature Creeeren</h1>
    <form action="{{ route('vacancy.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="leftInput">
            <div>
                <label for="title">Naam</label>
                <input name="title" id="title" required placeholder="bv. Albert Heijn"/>
            </div>
            <div>
                <label for="description">Omschrijving</label>
                <input name="description" id="description" required/>
            </div>
            <div>
                <label for="location">Locatie</label>
                <input name="adress" id="location" required placeholder="adres"/>
                <input name="city" id="location" required placeholder="stad"/>
                <input name="zipcode" id="location" required placeholder="postcode"/>
                <input name="country" id="location" required placeholder="land"/>
            </div>
            <div>
                <label for="function">Functie</label>
                <input name="function" id="function" required placeholder="bv. Manager"/>
            </div>
        </div>

        <div class="rightInput">
            <div>
                <label for="hours">Werkuren</label>
                <input name="hours" id="hours" required placeholder="bv. 40 uur/week"/>
            </div>
            <div>
                <label for="salary">Salaris</label>
                <input name="salary" id="salary" required placeholder="bv. 30.000 per jaar"/>
            </div>
            <div>
                <label for="image">Image</label>
                <input name="image" id="image" type="file" required/>
            </div>
        </div>
        <x-primary-button type="submit">Create</x-primary-button>
    </form>
</x-layout>
