<x-app-layout>
    <x-slot name="slot">

        <div class="w-full flex justify-center sm:hidden pt-5">
            <img src="{{ asset('images/logo-oh.png') }}" alt="Mobile Logo" class="h-24">
        </div>

        <div class="flex flex-col lg:flex-row lg:space-x-8 justify-center items-stretch w-full flex-1 space-y-8 lg:space-y-0 p-5">
            <!-- Employee Box -->
            <div class="w-full max-w-md bg-[#E4ECCC] rounded-lg shadow-lg p-6 flex flex-col justify-between h-[450px]">
                <h2 class="text-[#AA0160] font-bold">Werknemer</h2>
                <img src="images/Business-Strength-2310-001.jpg" alt="Employee" class="w-full h-36 object-cover rounded">
                <p class="text-lg text-black font-bold">
                    “Zonder sollicitatiegespek is het makkelijker om aan het werk te gaan. Het is leuk, iedereen is aardig. Ik heb het hier naar mijn zin.”
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
                       border-radius: 25px;
                       box-shadow: 0 4px 1px #7C1A51;
                       display: block;
                   ">
                    Vind de baan voor jou
                </a>
            </div>

            <!-- Employer Box -->
            <div class="w-full max-w-md bg-[#E4ECCC] rounded-lg shadow-lg p-6 flex flex-col justify-between h-[450px]">
                <h2 class="text-[#AA0160] font-bold">Werkgever</h2>
                <img src="images/Professional-Yellow-Careers-1.webp" alt="Employer" class="w-full h-36 object-cover rounded">
                <p class="text-lg text-black font-bold">
                    “Je moet je vooroordelen en aannames kunnen loslaten, maar dan zul je vaak verrast worden door de kwaliteit en de persoon zelf.”
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
                       border-radius: 25px;
                       box-shadow: 0 4px 1px #7C1A51;
                       display: block;
                   ">
                    Plaats jouw vacature
                </a>
            </div>
        </div>

        <!-- Principles Section -->
        <div class="w-full bg-gray-100 py-12">
            <h1 class="text-center text-3xl font-bold mb-10">
                Waar gelooft Open Hiring in?
            </h1>

            <div class="flex flex-col md:flex-row justify-center items-stretch md:space-x-8 space-y-6 md:space-y-0 px-5">
                <!-- First Principle -->
                <div class="flex flex-col items-center space-y-4 p-6 w-full max-w-sm h-[350px]">
                    <div class="text-[#92AA83] text-9xl font-extrabold">1</div>
                    <h2 class="text-center font-bold text-100">Het werkt beter zonder (voor)oordelen</h2>
                    <p class="text-center text-lg text-black font-medium">
                        Met Open Hiring krijgen (voor)oordelen geen kans. En mensen die vaak (onbewust) worden uitgesloten juist wel. Dat maakt de arbeidsmarkt eerlijker en mooier.
                    </p>
                </div>

                <!-- Second Principle -->
                <div class="flex flex-col items-center space-y-4 p-6 w-full max-w-sm h-[350px]">
                    <div class="text-[#92AA83] text-9xl font-extrabold">2</div>
                    <h2 class="text-center font-bold text-100">We vertrouwen elkaar</h2>
                    <p class="text-center text-lg text-black font-medium">
                        Transparantie in het werkproces. Geen barrières voor werk, zoals diploma’s of gesprekken.
                    </p>
                </div>

                <!-- Third Principle -->
                <div class="flex flex-col items-center space-y-4 p-6 w-full max-w-sm h-[350px]">
                    <div class="text-[#92AA83] text-9xl font-extrabold">3</div>
                    <h2 class="text-center font-bold text-100">Groeien doe je samen</h2>
                    <p class="text-center text-lg text-black font-medium">
                        Vertrouwen in mensen. Het potentieel van motivatie en verantwoordelijkheidsgevoel staat centraal.
                    </p>
                </div>
            </div>
        </div>

    </x-slot>
</x-app-layout>
