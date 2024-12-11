<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Vacatures') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="mb-6 text-2xl font-semibold">Vacatures List</h3>

                    <div class="mb-6">
                        <a href="{{ route('admin.vacatures.create') }}"
                           class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                            + Add New Vacature
                        </a>
                    </div>

                    <!-- Table view for larger screens -->
                    <div class="hidden md:block">
                        <table class="w-full border-collapse">
                            <thead>
                            <tr class="text-left border-b border-gray-300">
                                <th class="px-4 py-2 text-sm font-medium">ID</th>
                                <th class="px-4 py-2 text-sm font-medium">Vacature Name</th>
                                <th class="px-4 py-2 text-sm font-medium">Description</th>
                                <th class="px-4 py-2 text-sm font-medium">Location</th>
                                <th class="px-4 py-2 text-sm font-medium">Function</th>
                                <th class="px-4 py-2 text-sm font-medium">Work Hours</th>
                                <th class="px-4 py-2 text-sm font-medium">Salary</th>
                                <th class="px-4 py-2 text-sm font-medium">Status</th>
                                <th class="px-4 py-2 text-sm font-medium">Image</th>
                                <th class="px-4 py-2 text-sm font-medium">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($vacatures as $vacature)
                                <tr class="border-b border-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700">
                                    <td class="px-4 py-3 text-sm">{{ $vacature->id }}</td>
                                    <td class="px-4 py-3 text-sm">{{ $vacature->title }}</td>
                                    <td class="px-4 py-3 text-sm">{{ $vacature->description }}</td>
                                    <td class="px-4 py-3 text-sm">{{ $vacature->location }}</td>
                                    <td class="px-4 py-3 text-sm">{{ $vacature->function }}</td>
                                    <td class="px-4 py-3 text-sm">{{ $vacature->work_hours }}</td>
                                    <td class="px-4 py-3 text-sm">{{ $vacature->salary }}</td>
                                    <td class="px-4 py-3 text-sm">{{ $vacature->status }}</td>
                                    <td class="px-4 py-3 text-sm">
                                        <img src="{{ $vacature->imageUrl }}" alt="Vacature Image" class="h-16 w-16 object-cover rounded">
                                    </td>
                                    <td class="px-4 py-3 text-sm space-x-2">
                                        <a href="{{ route('admin.vacatures.edit', $vacature) }}"
                                           class="text-blue-500 hover:text-blue-600">Edit</a>
                                        <form action="{{ route('admin.vacatures.destroy', $vacature) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <x-primary-button type="submit" class="bg-red-500 hover:bg-red-600 text-white">
                                                Delete
                                            </x-primary-button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Card view for smaller screens -->
                    <div class="block md:hidden space-y-6">
                        @foreach ($vacatures as $vacature)
                            <div class="bg-white dark:bg-gray-700 rounded shadow p-4">
                                <h4 class="text-lg font-semibold mb-2">{{ $vacature->title }}</h4>
                                <p class="text-sm mb-1"><strong>Description:</strong> {{ $vacature->description }}</p>
                                <p class="text-sm mb-1"><strong>Location:</strong> {{ $vacature->location }}</p>
                                <p class="text-sm mb-1"><strong>Function:</strong> {{ $vacature->function }}</p>
                                <p class="text-sm mb-1"><strong>Work Hours:</strong> {{ $vacature->work_hours }}</p>
                                <p class="text-sm mb-1"><strong>Salary:</strong> {{ $vacature->salary }}</p>
                                <p class="text-sm mb-1"><strong>Status:</strong> {{ $vacature->status }}</p>
                                <div class="mb-2">
                                    <strong>Image:</strong>
                                    <img src="{{ Storage::url($vacature->image_path) }}" alt="Vacature Image" class="h-16 w-16 object-cover rounded">
                                </div>
                                <div class="mt-4 space-x-2">
                                    <a href="{{ route('admin.vacatures.edit', $vacature) }}"
                                       class="text-blue-500 hover:text-blue-600">Edit</a>
                                    <form action="{{ route('admin.vacatures.destroy', $vacature) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <x-primary-button type="submit" class="bg-red-500 hover:bg-red-600 text-white">
                                            Delete
                                        </x-primary-button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
