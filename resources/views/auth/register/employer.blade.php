<x-app-layout>
    <div class="min-h-screen bg-[#FBFCF6] flex flex-col items-center justify-center">
        <!-- Heading -->
        <h1 class="text-3xl font-extrabold text-[#2E342A] mb-6">
            {{ __('Werkgever Registratie') }}
        </h1>

        <form method="POST" action="{{ route('register.employer.submit') }}" class="w-full max-w-lg p-6 bg-[#92AA83] rounded-lg shadow-lg">
            @csrf

            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Naam')" />
                <x-text-input id="name" class="block mt-1 w-full bg-[#E2ECC8]" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- First Name -->
            <div>
                <x-input-label for="first_name" :value="__('Voornaam')" />
                <x-text-input id="first_name" class="block mt-1 w-full bg-[#E2ECC8]" type="text" name="first_name" value="{{ old('first_name') }}" required />
            </div>

            <!-- Last Name -->
            <div>
                <x-input-label for="last_name" :value="__('Achternaam')" />
                <x-text-input id="last_name" class="block mt-1 w-full bg-[#E2ECC8]" type="text" name="last_name" value="{{ old('last_name') }}" required />
            </div>

            <!-- Birthdate -->
            <div>
                <x-input-label for="b_date" :value="__('Geboortedatum')" />
                <x-text-input id="b_date" class="block mt-1 w-full bg-[#E2ECC8]" type="date" name="b_date" value="{{ old('b_date') }}" required />
            </div>

            <!-- Email -->
            <div>
                @error('email')
                <p class="text-red-500">{{ $message }}</p>
                @enderror
                <x-input-label for="email" :value="__('E-mail')" />
                <x-text-input id="email" class="block mt-1 w-full bg-[#E2ECC8]" type="email" name="email" :value="old('email')" required autocomplete="email" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div>
                <x-input-label for="password" :value="__('Wachtwoord')" />
                <x-text-input id="password" class="block mt-1 w-full bg-[#E2ECC8]" type="password" name="password" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div>
                <x-input-label for="password_confirmation" :value="__('Bevestig Wachtwoord')" />
                <x-text-input id="password_confirmation" class="block mt-1 w-full bg-[#E2ECC8]" type="password" name="password_confirmation" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <!-- City -->
            <div>
                <x-input-label for="city" :value="__('Stad')" />
                <x-text-input id="city" class="block mt-1 w-full bg-[#E2ECC8]" type="text" name="city" value="{{ old('city') }}" required />
            </div>

{{--            <!-- Company -->--}}
{{--            <div>--}}
{{--                <x-input-label for="company_id" :value="__('Bedrijf')" />--}}
{{--                <x-text-input id="company_id" class="block mt-1 w-full bg-[#E2ECC8]" type="text" name="company_id" value="{{ old('company_id') }}" />--}}
{{--            </div>--}}

            <!-- Actions -->
            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#92AA83]" href="{{ route('login') }}">
                    {{ __('Al geregistreerd?') }}
                </a>

                <x-primary-button class="ms-4">
                    {{ __('Registreer') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-app-layout>
