<x-layout>
    <x-slot:heading>
        Edit User - {{ $user->name }}
    </x-slot:heading>

    <form action="{{ route('admin.users.update', $user) }}" method="POST" class="max-w-lg mx-auto p-6 bg-white rounded-lg shadow">
        @csrf
        @method('PATCH')

        <!-- Company Name -->
        <div class="mb-4">
            <x-input-label for="name" :value="__('Company Name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <!-- Email -->
        <div class="mb-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />
        </div>

        <!-- First Name -->
        <div class="mb-4">
            <x-input-label for="first_name" :value="__('First Name')" />
            <x-text-input id="first_name" name="first_name" type="text" class="mt-1 block w-full" :value="old('first_name', $user->first_name)" required autofocus autocomplete="first_name" />
            <x-input-error class="mt-2" :messages="$errors->get('first_name')" />
        </div>

        <!-- Last Name -->
        <div class="mb-4">
            <x-input-label for="last_name" :value="__('Last Name')" />
            <x-text-input id="last_name" name="last_name" type="text" class="mt-1 block w-full" :value="old('last_name', $user->last_name)" required autofocus autocomplete="last_name" />
            <x-input-error class="mt-2" :messages="$errors->get('last_name')" />
        </div>

        <!-- Birthdate -->
        <div class="mb-4">
            <x-input-label for="b_date" :value="__('Birthdate')" />
            <x-text-input id="b_date" name="b_date" type="date" class="mt-1 block w-full" :value="old('b_date', $user->b_date ? $user->b_date->format('Y-m-d') : null)" required autofocus autocomplete="b_date" />
            <x-input-error class="mt-2" :messages="$errors->get('b_date')" />
        </div>

        <!-- City -->
        <div class="mb-4">
            <x-input-label for="city" :value="__('City')" />
            <x-text-input id="city" name="city" type="text" class="mt-1 block w-full" :value="old('city', $user->city)" required autofocus autocomplete="city" />
            <x-input-error class="mt-2" :messages="$errors->get('city')" />
        </div>

        <!-- Action Buttons -->
        <div class="flex items-center justify-between mt-6">
            <a href="{{ route('admin.users.index') }}" class="text-sm text-gray-600 underline hover:text-gray-900">Cancel</a>
            <x-primary-button type="submit">Save Changes</x-primary-button>
        </div>
    </form>
</x-layout>
