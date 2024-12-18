@include('layouts.navigation')

<x-app-layout>
    <div class="py-12"> <!-- Page background is white -->
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Welcome Box -->
            <div class="bg-[#92AA83] text-[#2E342A] overflow-hidden shadow-lg sm:rounded-lg mb-6">
                <div class="p-6 text-center">
                    <h3 class="text-3xl font-extrabold">Welkom bij het Admin Dashboard! </h3>
                    <p class="mt-4 text-lg font-extrabold">Hier kun je gebruikers en vacatures beheren.</p>
                </div>
            </div>

            <!-- Manage Sections -->
            <div class="bg-[#92AA83] p-6 rounded-lg text-[#2E342A] shadow-lg">
                <h3 class="font-extrabold text-xl mb-4 flex justify-center">Beheer Secties</h3>

                <!-- Buttons in a row -->
                <div class="flex flex-wrap gap-4">
                    <!-- Users Overview Link -->
                    <a href="{{ route('admin.users.index') }}"
                       class="flex-1 p-6 bg-[#AA0160] text-white rounded-lg shadow-lg hover:bg-[#90004E] transition duration-300 font-extrabold text-center focus:ring-[#AA0160] focus:border-[#FAEC02]">
                        Gebruikers Overzicht
                    </a>

                    <!-- Vacancies Overview Link -->
                    <a href="{{ route('admin.vacatures.index') }}"
                       class="flex-1 p-6 bg-[#AA0160] text-white rounded-lg shadow-lg hover:bg-[#90004E] transition duration-300 font-extrabold text-center focus:ring-[#AA0160] focus:border-[#FAEC02]">
                        Vacatures Overzicht
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
