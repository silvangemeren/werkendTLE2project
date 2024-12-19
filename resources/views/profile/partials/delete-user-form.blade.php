<section class="space-y-6 bg-[#92AA83] p-6 rounded-md shadow-md">
    <header>
        <h2 class="text-lg font-extrabold text-[#2E342A]">
            {{ __('Verwijder Account') }}
        </h2>

        <p class="mt-1 text-sm text-[#2E342A]">
            {{ __('Zodra je account is verwijderd, worden alle gegevens en bronnen permanent verwijderd. Voordat je je account verwijdert, zorg ervoor dat je alle gegevens of informatie die je wilt behouden hebt gedownload.') }}
        </p>
    </header>

    <x-danger-button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
    >{{ __('Verwijder Account') }}</x-danger-button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-extrabold text-[#2E342A]">
                {{ __('Weet je zeker dat je je account wilt verwijderen?') }}
            </h2>

            <p class="mt-1 text-sm text-[#2E342A]">
                {{ __('Zodra je account is verwijderd, worden alle gegevens en bronnen permanent verwijderd. Voer je wachtwoord in om te bevestigen dat je je account permanent wilt verwijderen.') }}
            </p>

            <div class="mt-6">
                <x-input-label for="password" value="{{ __('Wachtwoord') }}" class="sr-only" />

                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="mt-1 block w-3/4"
                    placeholder="{{ __('Wachtwoord') }}"
                />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Annuleren') }}
                </x-secondary-button>

                <x-danger-button class="ms-3">
                    {{ __('Verwijder Account') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>
