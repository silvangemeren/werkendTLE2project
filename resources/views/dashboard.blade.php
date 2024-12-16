<x-app-layout>
    <div class="py-12">
        <div class="dashboard flex flex-wrap justify-center items-center gap-4">
            {{-- WERKGEVER --}}
            @if(auth()->user()->role === 'werkgever')
                <!-- WERKGEVER content -->
                <div class="flex flex-wrap justify-center gap-4">
                    <a href="{{ route('vacancy.index') }}" class="w-full sm:w-48 lg:w-48" style="background-color: #AA0160; color: white; text-align: center; padding: 16px; font-size: 16px; font-weight: bold; border-radius: 8px; box-shadow: 0 4px 1px #7C1A51;">
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

                    <!-- Logout button inside a flex container -->
                    <div class="w-full sm:w-48 lg:w-48 flex justify-center">
                        <button type="button" id="logoutButton" class="w-full sm:w-auto px-4 py-2 bg-red-600 text-white font-semibold rounded-lg shadow-md hover:bg-red-700 focus:outline-none">
                            Logout
                        </button>
                    </div>
                </div>

                {{-- WERKNEMER --}}
            @elseif(auth()->user()->role === 'werknemer')
                <div class="flex flex-wrap justify-center gap-4">
                    <a href="{{ route('vacancy.index') }}" class="w-full sm:w-48 lg:w-48" style="background-color: #AA0160; color: white; text-align: center; padding: 16px; font-size: 16px; font-weight: bold; border-radius: 8px; box-shadow: 0 4px 1px #7C1A51;">
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

                    <!-- Logout button inside a flex container -->
                    <div class="w-full sm:w-48 lg:w-48 flex justify-center">
                        <button type="button" id="logoutButton" class="w-full sm:w-auto px-4 py-2 bg-red-600 text-white font-semibold rounded-lg shadow-md hover:bg-red-700 focus:outline-none">
                            Log uit
                        </button>
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
