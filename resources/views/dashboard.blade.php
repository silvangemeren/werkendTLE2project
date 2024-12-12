@include('layouts.navigation')

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="dashboard flex flex-wrap justify-center items-center gap-4">


    </div>
    <div class="py-12">
        <div class="dashboard flex flex-wrap justify-center items-center gap-4">

            {{-- WERKGEVER --}}
            @if(auth()->user()->role === 'werkgever')
                <a href="{{ route('vacancy.index') }}"
                   class="w-full sm:w-48"
                   style="
                       background-color: #AA0160;
                       color: white;
                       text-align: center;
                       padding: 16px;
                       font-size: 16px;
                       font-weight: bold;
                       border-radius: 8px;
                       box-shadow: 0 4px 1px #7C1A51;
                       display: block;
                   ">
                    Vacatures
                </a>
                <a href="{{ route('profile.edit') }}"
                   class="w-full sm:w-48"
                   style="
                       background-color: #AA0160;
                       color: white;
                       text-align: center;
                       padding: 16px;
                       font-size: 16px;
                       font-weight: bold;
                       border-radius: 8px;
                       box-shadow: 0 4px 1px #7C1A51;
                       display: block;
                   ">
                    Profiel
                </a>
                <a href="{{ route('dashboard') }}"
                   class="w-full sm:w-48"
                   style="
                       background-color: #AA0160;
                       color: white;
                       text-align: center;
                       padding: 16px;
                       font-size: 16px;
                       font-weight: bold;
                       border-radius: 8px;
                       box-shadow: 0 4px 1px #7C1A51;
                       display: block;
                   ">
                    Home
                </a>
                <a href="{{ route('dashboard') }}"
                   class="w-full sm:w-48"
                   style="
                       background-color: #AA0160;
                       color: white;
                       text-align: center;
                       padding: 16px;
                       font-size: 16px;
                       font-weight: bold;
                       border-radius: 8px;
                       box-shadow: 0 4px 1px #7C1A51;
                       display: block;
                   ">
                    Inbox
                </a>
                <a href="{{ route('dashboard') }}"
                   class="w-full sm:w-48"
                   style="
                       background-color: #AA0160;
                       color: white;
                       text-align: center;
                       padding: 16px;
                       font-size: 16px;
                       font-weight: bold;
                       border-radius: 8px;
                       box-shadow: 0 4px 1px #7C1A51;
                       display: block;
                   ">
                    Collega's
                </a>
                <a href="{{ route('dashboard') }}"
                   class="w-full sm:w-48"
                   style="
                       background-color: #AA0160;
                       color: white;
                       text-align: center;
                       padding: 16px;
                       font-size: 16px;
                       font-weight: bold;
                       border-radius: 8px;
                       box-shadow: 0 4px 1px #7C1A51;
                       display: block;
                   ">
                    Instellingen
                </a>

                {{-- WERKNEMER --}}
            @elseif(auth()->user()->role === 'werknemer')
                <a href="{{ route('dashboard') }}"
                   class="w-full sm:w-48"
                   style="
                       background-color: #AA0160;
                       color: white;
                       text-align: center;
                       padding: 16px;
                       font-size: 16px;
                       font-weight: bold;
                       border-radius: 8px;
                       box-shadow: 0 4px 1px #7C1A51;
                       display: block;
                   ">
                    Inbox
                </a>
                <a href="{{ route('dashboard') }}"
                   class="w-full sm:w-48"
                   style="
                       background-color: #AA0160;
                       color: white;
                       text-align: center;
                       padding: 16px;
                       font-size: 16px;
                       font-weight: bold;
                       border-radius: 8px;
                       box-shadow: 0 4px 1px #7C1A51;
                       display: block;
                   ">
                    Collega's
                </a>
                <a href="{{ route('profile.edit') }}"
                   class="w-full sm:w-48"
                   style="
                       background-color: #AA0160;
                       color: white;
                       text-align: center;
                       padding: 16px;
                       font-size: 16px;
                       font-weight: bold;
                       border-radius: 8px;
                       box-shadow: 0 4px 1px #7C1A51;
                       display: block;
                   ">
                    Profiel

                    <a href="{{ route('vacancy.index') }}"
                       class="w-full sm:w-48"
                       style="
                       background-color: #AA0160;
                       color: white;
                       text-align: center;
                       padding: 16px;
                       font-size: 16px;
                       font-weight: bold;
                       border-radius: 8px;
                       box-shadow: 0 4px 1px #7C1A51;
                       display: block;
                   ">
                        Vacatures
                    </a>

            @endif

        </div>
    </div>
</x-app-layout>
