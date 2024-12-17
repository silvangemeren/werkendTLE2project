<nav x-data="{ open: false }" class="bg-[#2E342A] border-b border-gray-100 dark:border-gray-700 sm:relative sm:top-0 sm:h-20">
    <!-- Desktop Navigation -->
    <div class="hidden sm:flex max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 justify-center items-center h-20">
        <!-- Logo -->
        <div class="flex items-center mr-8">
            <a href="{{ route('dashboard') }}">
                <x-application-logo class="block h-12 w-auto fill-current text-[#FAEC02]" />
            </a>
        </div>

        <!-- Navigation Links -->
        <div class="flex space-x-8 items-center justify-center">
            @auth
                @if(auth()->user()->role === 'werkgever' || 'werknemer')
            <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="text-[#FAEC02] text-lg font-extrabold">
                {{ __('Home') }}
            </x-nav-link>
                @endif
                @if(auth()->user()->role === 'werkgever')
                    <x-nav-link :href="route('vacancies.employer')" :active="request()->routeIs('vacancies.employer')" class="text-[#FAEC02] text-lg font-extrabold">
                        {{ __('Vacatures') }}
                    </x-nav-link>
                @elseif(auth()->user()->role === 'werknemer')
                    <x-nav-link :href="route('vacancies.employee')" :active="request()->routeIs('vacancies.employee')" class="text-[#FAEC02] text-lg font-extrabold">
                        {{ __('Vacatures') }}
                    </x-nav-link>
                @endif

                <!-- Logout Button -->
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="button" id="logoutButton" class="text-[#FAEC02] text-lg font-extrabold hover:text-red-600">
                        {{ __('Logout') }}
                    </button>
                </form>
            @else
                <x-nav-link :href="route('home')" :active="request()->routeIs('home')" class="text-[#FAEC02] text-lg font-extrabold">
                    {{ __('Home') }}
                </x-nav-link>
                <x-nav-link :href="route('vacancies.guest')" :active="request()->routeIs('vacancies.guest')" class="text-[#FAEC02] text-lg font-extrabold">
                    {{ __('Vacatures') }}
                </x-nav-link>
            @endauth

            <!-- Add Logo Between Vacatures and Inbox -->
            <div class="flex items-center">
                <img src="{{ asset('images/logo-oh.png') }}" alt="Open Hiring Logo" class="max-h-16 h-auto">
            </div>

            <x-nav-link :href="route('home')" :active="request()->routeIs('home')" class="text-[#FAEC02] text-lg font-extrabold">
                {{ __('Inbox') }}
            </x-nav-link>
            <x-nav-link :href="route('profile.edit')" :active="request()->routeIs('profile.edit')" class="text-[#FAEC02] text-lg font-extrabold">
                {{ __('Profile') }}
            </x-nav-link>
        </div>
    </div>

    <!-- Mobile Navigation -->
    <div class="fixed bottom-0 inset-x-0 bg-[#2E342A] shadow-lg border-t border-gray-100 dark:border-gray-700 sm:hidden">
        <div class="flex justify-around items-center h-16">
            <!-- Home Button -->
            <a href="{{ route('home') }}" class="flex flex-col items-center text-[#FAEC02] text-xl font-extrabold">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10l7-7m0 0l7 7M7 10v10h10V10M4 21h16" />
                </svg>
                <span class="text-xs">{{ __('Home') }}</span>
            </a>

            <!-- Vacatures Button -->
            @auth
                @if(auth()->user()->role === 'werkgever')
                    <a href="{{ route('vacancies.employer') }}" class="flex flex-col items-center text-[#FAEC02] text-xl font-extrabold">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M5 6h14M5 18h14" />
                        </svg>
                        <span class="text-xs">{{ __('Vacatures') }}</span>
                    </a>
                @elseif(auth()->user()->role === 'werknemer')
                    <a href="{{ route('vacancies.employee') }}" class="flex flex-col items-center text-[#FAEC02] text-xl font-extrabold">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M5 6h14M5 18h14" />
                        </svg>
                        <span class="text-xs">{{ __('Vacatures') }}</span>
                    </a>
                @endif

                <!-- Logout Button -->
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="button" id="logoutButton" class="flex flex-col items-center text-[#FAEC02] text-xl font-extrabold">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H3" />
                        </svg>
                        <span class="text-xs">{{ __('Logout') }}</span>
                    </button>
                </form>
            @else
                <a href="{{ route('vacancy.index') }}" class="flex flex-col items-center text-[#FAEC02] text-xl font-extrabold">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M5 6h14M5 18h14" />
                    </svg>
                    <span class="text-xs">{{ __('Vacatures') }}</span>
                </a>
            @endauth
        </div>
    </div>
</nav>

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


