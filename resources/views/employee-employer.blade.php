<x-app-layout-2>
    <x-slot name="slot">
        <!-- Flexbox container for centering -->
        <div class="flex flex-col justify-center items-center w-full flex-1 space-y-8">
            <!-- Employee Button with Blue color and larger size -->
            <a href="{{ route('employee-page') }}"
               class="w-full max-w-md bg-pink-700 text-white text-center py-16 text-2xl font-bold rounded-lg shadow-lg">
                Werknemer
            </a>

            <!-- Employer Button with Green color and larger size -->
            <a href="{{ route('employer-page') }}"
               class="w-full max-w-md bg-pink-700 text-white text-center py-16 text-2xl font-bold rounded-lg shadow-lg">
                Werkgever
            </a>
        </div>
    </x-slot>
</x-app-layout-2>
