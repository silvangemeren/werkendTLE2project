<x-app-layout>
    <x-slot name="slot">
        <div class="flex flex-col justify-center items-center w-full flex-1 space-y-8">
            <div>
                <h1 class="text-4xl text-gray-700 text-center font-bold">
                    Welkom bij Open Hiring, waar kansen centraal staan.
                </h1>
                <p class="text-lg text-gray-700 text-center font-medium">
                    Open Hiring is een unieke en eerlijke manier van werven. Bij ons draait het niet om CV’s, interviews of achtergrondchecks, maar om jouw wil en vermogen om te werken. Of je nu een werkgever bent die diversiteit en eenvoud in het wervingsproces zoekt, of een werkzoekende die op zoek is naar een echte kans, Open Hiring brengt mensen en bedrijven samen zonder barrières.
                </p>
            </div>

            <!-- Employee Box -->
            <div class="w-full max-w-md bg-white rounded-lg shadow-lg p-6 space-y-4">
                <img src="images/Business-Strength-2310-001.jpg" alt="Employee">
                <p class="text-lg text-gray-700 text-center font-medium">
                    "Ben je op zoek naar werk, maar loop je tegen obstakels aan zoals diploma’s of sollicitatiegesprekken? Open Hiring geeft iedereen een eerlijke kans om direct aan de slag te gaan. Meld je aan en laat je talent spreken!"
                </p>
                <a href="{{ route('register.employee') }}"
                   class="w-full max-w-md"
                   style="
                       background-color: #AA0160;
                       color: white;
                       text-align: center;
                       padding: 16px;
                       font-size: 16px;
                       font-weight: bold;
                       border-radius: 8px;
                       box-shadow: 0 4px 1px #7C1A51;
                       display: block;
                   ">
                    Werknemer
                </a>
            </div>

            <!-- Employer Box -->
            <div class="w-full max-w-md bg-white rounded-lg shadow-lg p-6 space-y-4">
                <img src="images/Professional-Yellow-Careers-1.webp" alt="Employee">
                <p class="text-lg text-gray-700 text-center font-medium">
                    "Vind en ontwikkel gemotiveerd talent zonder sollicitatieprocedures of vooroordelen. Open Hiring biedt een eenvoudige en eerlijke manier om vacatures te vervullen en diversiteit op de werkvloer te vergroten.
                    Geef mensen een kans gebaseerd op wat ze kunnen bijdragen, niet op hun verleden."
                </p>
                <a href="{{ route('register.employer') }}"
                   class="w-full max-w-md"
                   style="
                       background-color: #AA0160;
                       color: white;
                       text-align: center;
                       padding: 16px;
                       font-size: 2xl;
                       font-weight: bold;
                       border-radius: 8px;
                       box-shadow: 0 4px 1px #7C1A51;
                       display: block;
                   ">
                    Werkgever
                </a>
            </div>
        </div>
    </x-slot>
</x-app-layout>
