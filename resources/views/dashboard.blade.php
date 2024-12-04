<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<html>
</head>
<body>
<div class="dashboard">
{{--    @if(Auth::user()->isRole('admin'))--}}
{{--        <a href="{{ route('admin.manage.users') }}" class="button">Manage Users</a>--}}
{{--        <a href="{{ route('admin.reports') }}" class="button">View Reports</a>--}}
{{--    @elseif(Auth::user()->isRole('werkgever'))--}}
        <a href="{{ route('vacature') }}" class="button">Manage Jobs</a>
{{--    @elseif(Auth::user()->isRole('werknemer'))--}}
{{--        <a href="{{ route('employee.view.jobs') }}" class="button">View Jobs</a>--}}
{{--        <a href="{{ route('employee.profile') }}" class="button">My Profile</a>--}}
{{--    @else--}}
{{--        <p>You do not have a valid role.</p>--}}
{{--    @endif--}}
</div>
</body>
</html>
