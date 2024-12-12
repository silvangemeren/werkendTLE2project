@include('layouts.navigation')

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("Welcome to the Admin Dashboard!") }}
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 text-gray-900 dark:text-gray-100 space-y-4">
                <h3 class="font-semibold text-lg">Manage Sections</h3>

                <!-- users overview link -->
                <a href="{{ route('admin.users.index') }}" class="block p-4 bg-yellow-500 text-white rounded-lg shadow hover:bg-yellow-600">
                    Users
                </a>

                <!--  vacatures overview link -->
                <a href="{{ route('admin.vacatures.index') }}" class="block p-4 bg-green-500 text-white rounded-lg shadow hover:bg-green-600">
                    Vacancies
                </a>

                {{--                <!--  post overview link -->--}}
                {{--                <a href="{{ route('admin.animals.index') }}" class="block p-4 bg-purple-500 text-white rounded-lg shadow hover:bg-purple-600">--}}
                {{--                    Posts--}}
                {{--                </a>--}}
            </div>
        </div>
    </div>
</x-app-layout>
