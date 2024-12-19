<nav x-data="{ open: false }"
     class="bg-[#2E342A] border-b border-gray-100 dark:border-gray-700 sm:relative sm:top-0 sm:h-20">
    <!-- Desktop Navigation -->
    <div class="hidden sm:flex max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 justify-between items-center h-20">
        <!-- Left: Logo -->
        <div class="flex items-center">
            <a href="{{ route('dashboard') }}">
                <x-application-logo class="block h-12 w-auto fill-current text-[#FAEC02]"/>
            </a>
        </div>

        <!-- Navigation Links -->
        <div class="flex space-x-8 items-center justify-center flex-grow">
            @auth
                @if(auth()->user()->role === 'werkgever' || 'werknemer')
                    <x-nav-link :href="route('home')" :active="request()->routeIs('home')"
                                class="text-[#FAEC02] text-lg font-extrabold">
                        {{ __('Home') }}
                    </x-nav-link>
                @endif

                @if(auth()->user()->role === 'werkgever')
                    <x-nav-link :href="route('vacancies.employer')" :active="request()->routeIs('vacancies.employer')"
                                class="text-[#FAEC02] text-lg font-extrabold">
                        {{ __('Vacatures') }}
                    </x-nav-link>
                @elseif(auth()->user()->role === 'werknemer')
                    <x-nav-link :href="route('vacancies.employee')" :active="request()->routeIs('vacancies.employee')"
                                class="text-[#FAEC02] text-lg font-extrabold">
                        {{ __('Vacatures') }}
                    </x-nav-link>
                @elseif(auth()->user()->role === 'admin')
                    <x-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')"
                                class="text-[#FAEC02] text-lg font-extrabold">
                        {{ __('Admin Dashboard') }}
                    </x-nav-link>
                @endif
            @else
                <x-nav-link :href="route('home')" :active="request()->routeIs('home')"
                            class="text-[#FAEC02] text-lg font-extrabold">
                    {{ __('Home') }}
                </x-nav-link>
                <x-nav-link :href="route('vacancies.guest')" :active="request()->routeIs('vacancies.guest')"
                            class="text-[#FAEC02] text-lg font-extrabold">
                    {{ __('Vacatures') }}
                </x-nav-link>
            @endauth

            <!-- Add Logo Between Vacatures and Inbox -->
            <div class="flex items-center">
                <img src="{{ asset('images/logo-oh.png') }}" alt="Open Hiring Logo" class="max-h-16 h-auto">
            </div>

            <x-nav-link :href="route('inbox')" :active="request()->routeIs('inbox')"
                        class="text-[#FAEC02] text-lg font-extrabold">
                {{ __('Inbox') }}
            </x-nav-link>
            <x-nav-link :href="route('profile.edit')" :active="request()->routeIs('profile.edit')"
                        class="text-[#FAEC02] text-lg font-extrabold">
                {{ __('Profiel') }}
            </x-nav-link>
        </div>

        <!-- Right: Authentication Button -->
        @auth
            <!-- Logout Button for authenticated users -->
            <div class="ml-4">
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="button" id="logoutButton"
                            class="text-[#FAEC02] text-lg font-extrabold hover:text-red-600">
                        {{ __('Log uit') }}
                    </button>
                </form>
            </div>
        @else
            <!-- Login Button for guests -->
            <div class="ml-4">
                <a href="{{ route('login') }}"
                   class="text-[#FAEC02] text-lg font-extrabold hover:text-green-600">
                    {{ __('Log in') }}
                </a>
            </div>
        @endauth
    </div>

    <!-- Mobile Navigation -->
    <div
        class="fixed bottom-0 inset-x-0 bg-[#2E342A] shadow-lg border-t border-gray-100 dark:border-gray-700 sm:hidden">
        <div class="flex justify-around items-center h-16">
            <!-- Home Button -->
            <a href="{{ route('dashboard') }}" class="flex flex-col items-center text-[#FAEC02] text-xl font-extrabold">
                <img src="{{ asset('images/Icons/Dashboard_nav.svg') }}" alt="Dashboard Icon" class="h-6 w-6">
                <span class="text-xs">{{ __('Dashboard') }}</span>
            </a>

            <!-- Vacatures Button -->
            @auth
                @if(auth()->user()->role === 'werkgever')
                    <a href="{{ route('vacancies.employer') }}"
                       class="flex flex-col items-center text-[#FAEC02] text-xl font-extrabold">
                        <img src="{{ asset('images/Icons/Vacancy_nav.svg') }}" alt="Vacancies Icon" class="h-6 w-6">
                        <span class="text-xs">{{ __('Vacatures') }}</span>
                    </a>
                @elseif(auth()->user()->role === 'werknemer')
                    <a href="{{ route('vacancies.employee') }}"
                       class="flex flex-col items-center text-[#FAEC02] text-xl font-extrabold">
                        <img src="{{ asset('images/Icons/Vacancy_nav.svg') }}" alt="Vacancies Icon" class="h-6 w-6">
                        <span class="text-xs">{{ __('Vacatures') }}</span>
                    </a>
                @elseif(auth()->user()->role === 'admin')
                    <a href="{{ route('vacancies.employer') }}"
                       class="flex flex-col items-center text-[#FAEC02] text-xl font-extrabold">
                        <img src="{{ asset('images/Icons/Vacancy_nav.svg') }}" alt="Vacancies Icon" class="h-6 w-6">
                        <span class="text-xs">{{ __('Vacatures') }}</span>
                    </a>
                @else
                    <a href="{{ route('vacancies.guest') }}"
                       class="flex flex-col items-center text-[#FAEC02] text-xl font-extrabold">
                        <img src="{{ asset('images/Icons/Vacancy_nav.svg') }}" alt="Vacancies Icon" class="h-6 w-6">
                        <span class="text-xs">{{ __('Vacatures') }}</span>
                    </a>
                @endif
            @else
                <a href="{{ route('vacancies.guest') }}"
                   class="flex flex-col items-center text-[#FAEC02] text-xl font-extrabold">
                    <img src="{{ asset('images/Icons/Vacancy_nav.svg') }}" alt="Vacancies Icon" class="h-6 w-6">
                    <span class="text-xs">{{ __('Vacatures') }}</span>
                </a>
            @endauth

            <!-- Logout Button -->
            @auth
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit" id="logoutButton"
                            class="flex flex-col items-center text-[#FAEC02] text-xl font-extrabold">
                        <img src="{{ asset('images/Icons/Logout_nav.svg') }}" alt="Logout Icon" class="h-6 w-6">
                        <span class="text-xs">{{ __('Log uit') }}</span>
                    </button>
                </form>
            @endauth

            @guest
                <a href="{{ route('login') }}" class="flex flex-col items-center text-[#FAEC02] text-xl font-extrabold">
                    <img src="{{ asset('images/Icons/Login_nav.svg') }}" alt="Login Icon" class="h-6 w-6">
                    <span class="text-xs">{{ __('Log In') }}</span>
                </a>
            @endguest
        </div>
    </div>
</nav>

<!-- Modal for Logout Confirmation -->
<div id="logoutModal" class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50 z-50 hidden">
    <div class="bg-white p-8 rounded-lg shadow-lg w-96 max-w-lg">
        <h3 class="text-2xl font-semibold text-center text-[#2E342A] mb-6">Weet u zeker dat u wilt uitloggen?</h3>
        <div class="flex justify-center space-x-4">
            <!-- Cancel Button -->
            <button id="cancelButton" class="bg-gray-300 text-gray-700 px-6 py-2 rounded-lg text-lg font-medium hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-[#FAEC02] focus:ring-opacity-50">
                Annuleer
            </button>

            <!-- Logout Form -->
            <form method="POST" action="{{ route('logout') }}" id="logoutForm">
                @csrf
                <button type="submit" class="bg-red-600 text-white px-6 py-2 rounded-lg text-lg font-medium hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-opacity-50">
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
    logoutButton?.addEventListener('click', function () {
        logoutModal.classList.remove('hidden');
    });

    // Hide the modal when the cancel button is clicked
    cancelButton?.addEventListener('click', function () {
        logoutModal.classList.add('hidden');
    });
</script>
