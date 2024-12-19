<x-app-layout>
    <div class="min-h-screen bg-[#FBFCF6] flex flex-col items-center justify-center">
        <!-- Heading -->
        <h1 class="text-3xl font-extrabold text-[#2E342A] mb-6">
            {{ __('Inloggen') }}
        </h1>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}" class="w-full max-w-lg p-6 bg-[#92AA83] rounded-lg shadow-lg">
            @csrf

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('E-mail')" />
                <x-text-input id="email" class="block mt-1 w-full bg-[#E2ECC8]" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Wachtwoord')" />
                <x-text-input id="password" class="block mt-1 w-full bg-[#E2ECC8]" type="password" name="password" required autocomplete="current-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded bg-[#E2ECC8] border-gray-300 text-[#92AA83] shadow-sm focus:ring-[#92AA83]" name="remember">
                    <span class="ms-2 text-sm text-gray-600">{{ __('Onthoud mij') }}</span>
                </label>
            </div>

            <!-- Actions -->
            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-[#2E342A] hover:text-gray-700 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#92AA83]" href="{{ route('password.request') }}">
                        {{ __('Wachtwoord vergeten?') }}
                    </a>
                @endif

                <x-primary-button class="ms-3">
                    {{ __('Inloggen') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-app-layout>
