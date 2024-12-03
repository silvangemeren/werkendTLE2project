<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Vacature Creeeren</h1>
    <form>

        <div class="leftInput">
    <div>
        <label for="function">Functie</label>
        <input name="function" id="function" required placeholder="bv. Manager"/>
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
        </div>

    </form>
</body>
</html>
