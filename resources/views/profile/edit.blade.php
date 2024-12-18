<x-app-layout>
    <div class="py-12 bg-white"> <!-- Set the outer background to white -->
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <!-- Profile Information Section -->
            <div
                class="p-4 sm:p-8 bg-[#92AA83] dark:bg-[#92AA83] shadow sm:rounded-lg flex flex-col sm:flex-row justify-between gap-10 space-y-6 sm:space-y-0">
                <div class="max-w-xl flex-1">
                    @include('profile.partials.update-profile-information-form')
                </div>
                <div class="max-w-xl flex-1">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            @if(auth()->user()->role != 'admin')
                <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        @include('profile.partials.delete-user-form')
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
