<x-app-layout>
    <div class="py-12 px-8">
        <div class="dashboard grid grid-cols-2 justify-center items-center gap-4">
            {{-- WERKGEVER --}}
            @if(auth()->user()->role === 'werkgever')
                <!-- WERKGEVER content -->
                <a href="{{ route('vacancies.employer') }}" class="flex flex-col items-center justify-center gap-1"
                   style="background-color: #AA0160; color: white; padding: 16px; font-weight: bold; border-radius: 8px; box-shadow: 0 4px 1px #7C1A51;">
                    <div class="w-10 h-10">
                        <img src="{{ asset('images/Icons/Vacancy.svg') }}" alt="Vacatures Icon" class="w-full h-full">
                    </div>
                    <span class="text-sm">Vacatures</span>
                </a>
                <a href="{{ route('profile.edit') }}" class="flex flex-col items-center justify-center gap-1"
                   style="background-color: #AA0160; color: white; padding: 16px; font-weight: bold; border-radius: 8px; box-shadow: 0 4px 1px #7C1A51;">
                    <div class="w-10 h-10">
                        <img src="{{ asset('images/Icons/Profile.svg') }}" alt="Profiel Icon" class="w-full h-full">
                    </div>
                    <span class="text-sm">Profiel</span>
                </a>
                <a href="{{ route('dashboard') }}" class="flex flex-col items-center justify-center gap-1"
                   style="background-color: #AA0160; color: white; padding: 16px; font-weight: bold; border-radius: 8px; box-shadow: 0 4px 1px #7C1A51;">
                    <div class="w-10 h-10">
                        <img src="{{ asset('images/Icons/Home.svg') }}" alt="Home Icon" class="w-full h-full">
                    </div>
                    <span class="text-sm">Home</span>
                </a>
                <a href="{{ route('dashboard') }}" class="flex flex-col items-center justify-center gap-1"
                   style="background-color: #AA0160; color: white; padding: 16px; font-weight: bold; border-radius: 8px; box-shadow: 0 4px 1px #7C1A51;">
                    <div class="w-10 h-10">
                        <img src="{{ asset('images/Icons/Inbox.svg') }}" alt="Inbox Icon" class="w-full h-full">
                    </div>
                    <span class="text-sm">Inbox</span>
                </a>
                <a href="{{ route('dashboard') }}" class="flex flex-col items-center justify-center gap-1"
                   style="background-color: #AA0160; color: white; padding: 16px; font-weight: bold; border-radius: 8px; box-shadow: 0 4px 1px #7C1A51;">
                    <div class="w-10 h-10">
                        <img src="{{ asset('images/Icons/Collega.svg') }}" alt="Collega's Icon" class="w-full h-full">
                    </div>
                    <span class="text-sm">Collega's</span>
                </a>
                <a href="{{ route('dashboard') }}" class="flex flex-col items-center justify-center gap-1"
                   style="background-color: #AA0160; color: white; padding: 16px; font-weight: bold; border-radius: 8px; box-shadow: 0 4px 1px #7C1A51;">
                    <div class="w-10 h-10">
                        <img src="{{ asset('images/Icons/Settings.svg') }}" alt="Instellingen Icon" class="w-full h-full">
                    </div>
                    <span class="text-sm">Instellingen</span>
                </a>

                {{-- WERKNEMER --}}
            @elseif(auth()->user()->role === 'werknemer')
                <a href="{{ route('vacancies.employee') }}" class="flex flex-col items-center justify-center gap-1"
                   style="background-color: #AA0160; color: white; padding: 16px; font-weight: bold; border-radius: 8px; box-shadow: 0 4px 1px #7C1A51;">
                    <div class="w-10 h-10">
                        <img src="{{ asset('images/Icons/Vacancy.svg') }}" alt="Vacatures Icon" class="w-full h-full">
                    </div>
                    <span class="text-sm">Vacatures</span>
                </a>
                <a href="{{ route('inbox') }}" class="flex flex-col items-center justify-center gap-1"
                   style="background-color: #AA0160; color: white; padding: 16px; font-weight: bold; border-radius: 8px; box-shadow: 0 4px 1px #7C1A51;">
                    <div class="w-10 h-10">
                        <img src="{{ asset('images/Icons/Inbox.svg') }}" alt="Inbox Icon" class="w-full h-full">
                    </div>
                    <span class="text-sm">Inbox</span>
                </a>
                <a href="{{ route('profile.edit') }}" class="flex flex-col items-center justify-center gap-1"
                   style="background-color: #AA0160; color: white; padding: 16px; font-weight: bold; border-radius: 8px; box-shadow: 0 4px 1px #7C1A51;">
                    <div class="w-10 h-10">
                        <img src="{{ asset('images/Icons/Profile.svg') }}" alt="Profiel Icon" class="w-full h-full">
                    </div>
                    <span class="text-sm">Profiel</span>
                </a>
                <a href="{{ route('dashboard') }}" class="flex flex-col items-center justify-center gap-1"
                   style="background-color: #AA0160; color: white; padding: 16px; font-weight: bold; border-radius: 8px; box-shadow: 0 4px 1px #7C1A51;">
                    <div class="w-10 h-10">
                        <img src="{{ asset('images/Icons/Settings.svg') }}" alt="Instellingen Icon" class="w-full h-full">
                    </div>
                    <span class="text-sm">Instellingen</span>
                </a>

            @elseif(auth()->user()->role === 'admin')
                    <x-slot name="header">
                        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                            {{ __('Admin Dashboard') }}
                        </h2>
                    </x-slot>

                    <div class="py-12">
                        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-6">
                                <div class="p-6 text-gray-900 dark:text-gray-100">
                                    {{ __("Welcome to the Admin Dashboard!") }}
                                </div>
                            </div>

                            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 text-gray-900 dark:text-gray-100 space-y-4">
                                <h3 class="font-semibold text-lg">Manage Sections</h3>

                                <!-- users overview link -->
                                <a href="{{ route('admin.users.index') }}" class="block p-4 bg-yellow-500 text-white rounded-lg shadow hover:bg-yellow-600">
                                    Users
                                </a>

                                <!--  vacatures overview link -->
                                <a href="{{ route('admin.vacatures.index') }}" class="block p-4 bg-green-500 text-white rounded-lg shadow hover:bg-green-600">
                                    Vacancies
                                </a>
                            </div>
                        </div>
                    </div>
            @endif
        </div>
    </div>
</x-app-layout>
