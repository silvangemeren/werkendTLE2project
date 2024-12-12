<x-app-layout>
    <div class="max-w-7xl mx-auto bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg">
        <div class="hidden md:block overflow-x-auto"> <!-- Table view for larger screens -->
            <table
                class="min-w-full border border-gray-200 dark:border-gray-700 divide-y divide-gray-200 dark:divide-gray-700">
                <thead class="bg-gray-100 dark:bg-gray-700">
                <tr>
                    <th class="px-4 py-2 text-left font-semibold text-gray-600 dark:text-gray-300">ID</th>
                    <th class="px-4 py-2 text-left font-semibold text-gray-600 dark:text-gray-300">Company Name</th>
                    <th class="px-4 py-2 text-left font-semibold text-gray-600 dark:text-gray-300">Email</th>
                    <th class="px-4 py-2 text-left font-semibold text-gray-600 dark:text-gray-300">First Name</th>
                    <th class="px-4 py-2 text-left font-semibold text-gray-600 dark:text-gray-300">Last Name</th>
                    <th class="px-4 py-2 text-left font-semibold text-gray-600 dark:text-gray-300">Role</th>
                    <th class="px-4 py-2 text-left font-semibold text-gray-600 dark:text-gray-300">Actions</th>
                </tr>
                </thead>
                <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                @foreach ($users as $user)
                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-900 transition">
                        <td class="px-4 py-2 text-gray-700 dark:text-gray-300">{{ $user->id }}</td>
                        <td class="px-4 py-2 text-gray-700 dark:text-gray-300">{{ $user->name }}</td>
                        <td class="px-4 py-2 text-gray-700 dark:text-gray-300">{{ $user->email }}</td>
                        <td class="px-4 py-2 text-gray-700 dark:text-gray-300">{{ $user->first_name }}</td>
                        <td class="px-4 py-2 text-gray-700 dark:text-gray-300">{{ $user->last_name }}</td>
                        <td class="px-4 py-2 text-gray-700 dark:text-gray-300">{{ $user->role }}</td>
                        <td class="px-4 py-2 flex space-x-2">
                            <a href="{{ route('admin.users.edit', $user) }}" class="text-blue-600 hover:underline">Edit</a>

                            <form action="{{ route('admin.users.destroy', $user) }}" method="post" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline"
                                        onclick="return confirm('Are you sure you want to delete this user?');">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <!-- Card-based layout for smaller screens -->
        <div class="grid grid-cols-1 gap-4 md:hidden"> <!-- Hide on larger screens -->
            @foreach ($users as $user)
                <div class="p-4 border border-gray-200 dark:border-gray-700 rounded-lg shadow-md bg-white dark:bg-gray-800">
                    <p class="text-gray-700 dark:text-white"><strong>ID:</strong> {{ $user->id }}</p>
                    <p class="text-gray-700 dark:text-white"><strong>Company Name:</strong> {{ $user->name }}</p>
                    <p class="text-gray-700 dark:text-white"><strong>Email:</strong> {{ $user->email }}</p>
                    <p class="text-gray-700 dark:text-white"><strong>First Name:</strong> {{ $user->first_name }}</p>
                    <p class="text-gray-700 dark:text-white"><strong>Last Name:</strong> {{ $user->last_name }}</p>
                    <p class="text-gray-700 dark:text-white"><strong>Role:</strong> {{ $user->role }}</p>
                    <div class="mt-2 flex space-x-2">
                        <a href="{{ route('admin.users.edit', $user) }}" class="text-blue-600 dark:text-blue-400 hover:underline">Edit</a>

                        <form action="{{ route('admin.users.destroy', $user) }}" method="post" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 dark:text-red-400 hover:underline"
                                    onclick="return confirm('Are you sure you want to delete this user?');">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
