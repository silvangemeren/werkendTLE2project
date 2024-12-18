<section>
    <header>
        <h2 class="text-lg font-extrabold text-[#2E342A]">
            {{ __('Profielinformatie') }}
        </h2>

        <p class="mt-1 text-sm text-[#2E342A]">
            {{ __("Werk de profielinformatie en het e-mailadres van je account bij.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6 bg-[#E2ECC8] p-6 rounded-lg shadow-lg">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" :value="__('Volledige naam')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('E-mail')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />
        </div>

        <div>
            <x-input-label for="first_name" :value="__('Voornaam')" />
            <x-text-input id="first_name" name="first_name" type="text" class="mt-1 block w-full" :value="old('first_name', $user->first_name)" required autofocus autocomplete="first_name" />
            <x-input-error class="mt-2" :messages="$errors->get('first_name')" />
        </div>

        <div>
            <x-input-label for="last_name" :value="__('Achternaam')" />
            <x-text-input id="last_name" name="last_name" type="text" class="mt-1 block w-full" :value="old('last_name', $user->last_name)" required autofocus autocomplete="last_name" />
            <x-input-error class="mt-2" :messages="$errors->get('last_name')" />
        </div>

        <div>
            <x-input-label for="b_date" :value="__('Geboortedatum')" />
            <x-text-input
                id="b_date"
                name="b_date"
                type="date"
                class="mt-1 block w-full"
                :value="old('b_date', $user->b_date ? $user->b_date->format('Y-m-d') : null)"
                required
                autofocus
                autocomplete="b_date"
            />
            <x-input-error class="mt-2" :messages="$errors->get('b_date')" />
        </div>

        <div>
            <x-input-label for="city" :value="__('Stad')" />
            <x-text-input id="city" name="city" type="text" class="mt-1 block w-full" :value="old('city', $user->city)" required autofocus autocomplete="city" />
            <x-input-error class="mt-2" :messages="$errors->get('city')" />
        </div>

        @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
            <div>
                <p class="text-sm mt-2 text-[#2E342A]">
                    {{ __('Je e-mailadres is niet geverifieerd.') }}

                    <button form="send-verification" class="underline text-sm text-[#2E342A] hover:text-gray-900">
                        {{ __('Klik hier om de verificatie-e-mail opnieuw te sturen.') }}
                    </button>
                </p>

                @if (session('status') === 'verification-link-sent')
                    <p class="mt-2 font-medium text-sm text-green-600">
                        {{ __('Er is een nieuwe verificatielink naar je e-mailadres gestuurd.') }}
                    </p>
                @endif
            </div>
        @endif

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Opslaan') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-[#AA0160]"
                >{{ __('Opgeslagen.') }}</p>
            @endif
        </div>
    </form>
</section>
