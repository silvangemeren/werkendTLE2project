<x-app-layout>
    <div class="min-h-screen bg-[#FBFCF6] flex flex-col items-center justify-center">
        <!-- Heading -->
        <h1 class="text-3xl font-extrabold text-[#2E342A] mb-6">
            {{ __('Wachtwoord vergeten?') }}
        </h1>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('password.email') }}" class="w-full max-w-lg p-6 bg-[#92AA83] rounded-lg shadow-lg">
            @csrf

            <!-- Email Address -->
            <div>
                <!-- Styled paragraph -->
                <p class="text-[#2E342A] text-lg mb-4">
                    Geen probleem. Geef ons je e-mailadres en we sturen je een link waarmee je een nieuw wachtwoord kunt kiezen.
                </p>
                <x-input-label for="email" :value="__('E-mail')" />
                <x-text-input id="email" class="block mt-1 w-full bg-[#E2ECC8]" type="email" name="email" :value="old('email')" required autofocus />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="ms-3">
                    {{ __('Stuur wachtwoord reset link') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-app-layout>
