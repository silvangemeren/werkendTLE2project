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
            <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="text-[#FAEC02] text-lg font-extrabold">
                {{ __('Home') }}
            </x-nav-link>
            @auth
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
                    <button type="submit" class="text-[#FAEC02] text-lg font-extrabold hover:text-red-600">
                        {{ __('Logout') }}
                    </button>
                </form>
            @else
                <x-nav-link :href="route('vacancy.index')" :active="request()->routeIs('vacancy.index')" class="text-[#FAEC02] text-lg font-extrabold">
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
            <a href="{{ route('dashboard') }}" class="flex flex-col items-center text-[#FAEC02] text-xl font-extrabold">
                <img src="{{ asset('images/Icons/Dashboard_nav.svg') }}" alt="Logout Icon" class="h-6 w-6">
                <span class="text-xs">{{ __('Dashboard') }}</span>
            </a>

            <!-- Vacatures Button -->
            @auth
                @if(auth()->user()->role === 'werkgever')
                    <a href="{{ route('vacancies.employer') }}" class="flex flex-col items-center text-[#FAEC02] text-xl font-extrabold">
                        <img src="{{ asset('images/Icons/Vacancy_nav.svg') }}" alt="Logout Icon" class="h-6 w-6">
                        <span class="text-xs">{{ __('Vacatures') }}</span>
                    </a>

                @elseif(auth()->user()->role === 'werknemer')
                    <a href="{{ route('vacancies.employee') }}" class="flex flex-col items-center text-[#FAEC02] text-xl font-extrabold">
                        <img src="{{ asset('images/Icons/Vacancy_nav.svg') }}" alt="Logout Icon" class="h-6 w-6">
                        <span class="text-xs">{{ __('Vacatures') }}</span>
                    </a>
                @endif

                <!-- Logout Button -->
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="flex flex-col items-center text-[#FAEC02] text-xl font-extrabold">
                        <img src="{{ asset('images/Icons/Logout_nav.svg') }}" alt="Logout Icon" class="h-6 w-6">
                        <span class="text-xs">{{ __('Logout') }}</span>
                    </button>
                </form>
            @else
                <a href="{{ route('vacancy.index') }}" class="flex flex-col items-center text-[#FAEC02] text-xl font-extrabold">
                    <img src="{{ asset('images/Icons/Vacancy_nav.svg') }}" alt="Logout Icon" class="h-6 w-6">
                    <span class="text-xs">{{ __('Vacatures') }}</span>
                </a>

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

