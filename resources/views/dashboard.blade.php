<x-app-layout>
    <div class="py-12">
        <div class="dashboard flex flex-wrap justify-center items-center gap-4">
            {{-- WERKGEVER --}}
            @if(auth()->user()->role === 'werkgever')
                <!-- WERKGEVER content -->
                <div class="flex flex-wrap justify-center gap-4">
                    <a href="{{ route('vacancies.employer') }}" class="w-full sm:w-48 lg:w-48" style="background-color: #AA0160; color: white; text-align: center; padding: 16px; font-size: 16px; font-weight: bold; border-radius: 8px; box-shadow: 0 4px 1px #7C1A51;">
                        Vacatures
                    </a>
                    <a href="{{ route('profile.edit') }}" class="w-full sm:w-48 lg:w-48" style="background-color: #AA0160; color: white; text-align: center; padding: 16px; font-size: 16px; font-weight: bold; border-radius: 8px; box-shadow: 0 4px 1px #7C1A51;">
                        Profiel
                    </a>
                    <a href="{{ route('dashboard') }}" class="w-full sm:w-48 lg:w-48" style="background-color: #AA0160; color: white; text-align: center; padding: 16px; font-size: 16px; font-weight: bold; border-radius: 8px; box-shadow: 0 4px 1px #7C1A51;">
                        Home
                    </a>
                    <a href="{{ route('dashboard') }}" class="w-full sm:w-48 lg:w-48" style="background-color: #AA0160; color: white; text-align: center; padding: 16px; font-size: 16px; font-weight: bold; border-radius: 8px; box-shadow: 0 4px 1px #7C1A51;">
                        Inbox
                    </a>
                    <a href="{{ route('dashboard') }}" class="w-full sm:w-48 lg:w-48" style="background-color: #AA0160; color: white; text-align: center; padding: 16px; font-size: 16px; font-weight: bold; border-radius: 8px; box-shadow: 0 4px 1px #7C1A51;">
                        Collega's
                    </a>
                    <a href="{{ route('dashboard') }}" class="w-full sm:w-48 lg:w-48" style="background-color: #AA0160; color: white; text-align: center; padding: 16px; font-size: 16px; font-weight: bold; border-radius: 8px; box-shadow: 0 4px 1px #7C1A51;">
                        Instellingen
                    </a>

                </div>

                {{-- WERKNEMER --}}
            @elseif(auth()->user()->role === 'werknemer')
                <div class="flex flex-wrap justify-center gap-4">
                    <a href="{{ route('vacancies.employee') }}" class="w-full sm:w-48 lg:w-48" style="background-color: #AA0160; color: white; text-align: center; padding: 16px; font-size: 16px; font-weight: bold; border-radius: 8px; box-shadow: 0 4px 1px #7C1A51;">
                        Vacatures
                    </a>
                    <a href="{{ route('dashboard') }}" class="w-full sm:w-48 lg:w-48" style="background-color: #AA0160; color: white; text-align: center; padding: 16px; font-size: 16px; font-weight: bold; border-radius: 8px; box-shadow: 0 4px 1px #7C1A51;">
                        Inbox
                    </a>
                    <a href="{{ route('profile.edit') }}" class="w-full sm:w-48 lg:w-48" style="background-color: #AA0160; color: white; text-align: center; padding: 16px; font-size: 16px; font-weight: bold; border-radius: 8px; box-shadow: 0 4px 1px #7C1A51;">
                        Profiel
                    </a>
                    <a href="{{ route('dashboard') }}" class="w-full sm:w-48 lg:w-48" style="background-color: #AA0160; color: white; text-align: center; padding: 16px; font-size: 16px; font-weight: bold; border-radius: 8px; box-shadow: 0 4px 1px #7C1A51;">
                        Instellingen
                    </a>

                </div>
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
