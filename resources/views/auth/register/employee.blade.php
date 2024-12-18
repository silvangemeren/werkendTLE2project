<x-app-layout>
    <div class="min-h-screen bg-[#FBFCF6] flex flex-col items-center justify-center">
        <!-- Heading -->
        <h1 class="text-3xl font-extrabold text-[#2E342A] mb-6">
            {{ __('Werknemer Registratie') }}
        </h1>

        <form method="POST" action="{{ route('register.employee.submit') }}" class="w-full max-w-lg p-6 bg-[#92AA83] rounded-lg shadow-lg">
            @csrf

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('E-mail')" />
                <x-text-input id="email" class="block mt-1 w-full bg-[#E2ECC8]" type="email" name="email" :value="old('email')" required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Wachtwoord')" />
                <x-text-input id="password" class="block mt-1 w-full bg-[#E2ECC8]" type="password" name="password" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Bevestig Wachtwoord')" />
                <x-text-input id="password_confirmation" class="block mt-1 w-full bg-[#E2ECC8]" type="password" name="password_confirmation" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

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
