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
                <input name="adres" id="adres" required placeholder="adres"/>
                <input name="stad" id="stad" required placeholder="stad"/>
                <input name="postcode" id="postcode" required placeholder="postcode"/>
                <input name="land" id="land" required placeholder="land"/>
            </div>
            <div>
                <label for="function">Functie</label>
                <input name="function" id="function" required placeholder="bv. Manager"/>
            </div>
        </div>

        <div class="rightInput">
            <div>
                <label for="work_hours">Werkuren</label>
                <input name="work_hours" id="work_hours" required placeholder="bv. 40 uur/week"/>
            </div>
            <div>
                <label for="salary">Salaris</label>
                <input name="salary" id="salary" required placeholder="bv. 30.000 per jaar"/>
            </div>
            <div>
                <label for="imageUrl">Image</label>
                <input name="imageUrl" id="imageUrl" type="file" required/>
            </div>
        </div>
        <x-primary-button type="submit">Create</x-primary-button>
    </form>
</x-layout>
