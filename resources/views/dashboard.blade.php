<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="dashboard flex flex-wrap justify-center items-center gap-4">
            <a href="{{ route('vacancy.index') }}"
               class="w-full sm:w-48 inline-block px-6 py-3 text-white font-semibold text-center rounded-lg"
               style="background-color: #AA0160; transition: background-color 0.3s;"
               onmouseover="this.style.backgroundColor='#AA0160'"
               onmouseout="this.style.backgroundColor='#AA0160'">
                Vacatures
            </a>
            <a href="{{ route('profile.edit') }}"
               class="w-full sm:w-48 inline-block px-6 py-3 text-white font-semibold text-center rounded-lg"
               style="background-color: #AA0160; transition: background-color 0.3s;"
               onmouseover="this.style.backgroundColor='#AA0160'"
               onmouseout="this.style.backgroundColor='#AA0160'">
                Profiel
            </a>
            <a href="{{ route('dashboard') }}"
               class="w-full sm:w-48 inline-block px-6 py-3 text-white font-semibold text-center rounded-lg"
               style="background-color: #AA0160; transition: background-color 0.3s;"
               onmouseover="this.style.backgroundColor='#AA0160'"
               onmouseout="this.style.backgroundColor='#AA0160'">
                Home
            </a>
            <a href="{{ route('dashboard') }}"
               class="w-full sm:w-48 inline-block px-6 py-3 text-white font-semibold text-center rounded-lg"
               style="background-color: #AA0160; transition: background-color 0.3s;"
               onmouseover="this.style.backgroundColor='#AA0160'"
               onmouseout="this.style.backgroundColor='#AA0160'">
                Inbox
            </a>
            <a href="{{ route('dashboard') }}"
               class="w-full sm:w-48 inline-block px-6 py-3 text-white font-semibold text-center rounded-lg"
               style="background-color: #AA0160; transition: background-color 0.3s;"
               onmouseover="this.style.backgroundColor='#AA0160'"
               onmouseout="this.style.backgroundColor='#AA0160'">
                Collega's
            </a>
            <a href="{{ route('dashboard') }}"
               class="w-full sm:w-48 inline-block px-6 py-3 text-white font-semibold text-center rounded-lg"
               style="background-color: #AA0160; transition: background-color 0.3s;"
               onmouseover="this.style.backgroundColor='#AA0160'"
               onmouseout="this.style.backgroundColor='#AA0160'">
                Instellingen
            </a>
        </div>
    </div>
</x-app-layout>
