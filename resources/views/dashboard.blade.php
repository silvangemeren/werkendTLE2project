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

    <!-- Modal for Logout Confirmation -->
    <div id="logoutModal" class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50 z-50 hidden">
        <div class="bg-white p-6 rounded-lg shadow-lg w-96">
            <h3 class="text-xl font-semibold text-center mb-4">Weet u zeker dat u wilt uitloggen?</h3>
            <div class="flex justify-between">
                <button id="cancelButton" class="bg-gray-300 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-400">
                    Annuleer
                </button>
                <form method="POST" action="{{ route('logout') }}" id="logoutForm">
                    @csrf
                    <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700">
                        Log Uit
                    </button>
                </form>
            </div>
        </div>
    </div>

</x-app-layout>

<script>
    // Get the modal and buttons
    const logoutButton = document.getElementById('logoutButton');
    const logoutModal = document.getElementById('logoutModal');
    const cancelButton = document.getElementById('cancelButton');

    // Show the modal when the logout button is clicked
    logoutButton.addEventListener('click', function () {
        logoutModal.classList.remove('hidden');
    });

    // Hide the modal when the cancel button is clicked
    cancelButton.addEventListener('click', function () {
        logoutModal.classList.add('hidden');
    });
</script>
