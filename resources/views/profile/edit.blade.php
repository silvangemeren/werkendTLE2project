<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <!-- Main Wrapper -->
    <div class="py-12 bg-[#FBFCF6]">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <!-- Update Profile Information -->
            <div class="p-6 bg-white shadow-lg rounded-lg">
                <div class="max-w-xl text-black">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <!-- Update Password -->
            <div class="p-6 bg-white shadow-lg rounded-lg">
                <div class="max-w-xl text-black">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <!-- Delete User -->
            <div class="p-6 bg-white shadow-lg rounded-lg">
                <div class="max-w-xl text-black">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
