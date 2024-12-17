<x-app-layout>
    <div class="py-12 px-8">
        <div class="dashboard grid grid-cols-2 justify-center items-center gap-4">
            {{-- WERKGEVER --}}
            @if(auth()->user()->role === 'werkgever')
                <!-- WERKGEVER content -->
                <a href="{{ route('vacancy.index') }}" class="flex flex-col items-center justify-center gap-1"
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
                <a href="{{ route('vacancy.index') }}" class="flex flex-col items-center justify-center gap-1"
                   style="background-color: #AA0160; color: white; padding: 16px; font-weight: bold; border-radius: 8px; box-shadow: 0 4px 1px #7C1A51;">
                    <div class="w-10 h-10">
                        <img src="{{ asset('images/Icons/Vacancy.svg') }}" alt="Vacatures Icon" class="w-full h-full">
                    </div>
                    <span class="text-sm">Vacatures</span>
                </a>
                <a href="{{ route('dashboard') }}" class="flex flex-col items-center justify-center gap-1"
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
            @endif
        </div>
    </div>
</x-app-layout>
