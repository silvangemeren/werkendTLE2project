<x-app-layout>
    <div class="max-w-7xl mx-auto bg-[#E2ECC8] p-6 rounded-lg shadow-lg">
        <div class="hidden md:block overflow-x-auto"> <!-- Table view for larger screens -->
            <table class="min-w-full border border-gray-300 dark:border-gray-700 divide-y divide-gray-300 dark:divide-gray-700">
                <thead class="bg-[#E2ECC8]">
                <tr>
                    <th class="px-6 py-3 text-left font-extrabold text-[#2E342A] text-lg">ID</th>
                    <th class="px-6 py-3 text-left font-extrabold text-[#2E342A] text-lg">Company Name</th>
                    <th class="px-6 py-3 text-left font-extrabold text-[#2E342A] text-lg">Email</th>
                    <th class="px-6 py-3 text-left font-extrabold text-[#2E342A] text-lg">First Name</th>
                    <th class="px-6 py-3 text-left font-extrabold text-[#2E342A] text-lg">Last Name</th>
                    <th class="px-6 py-3 text-left font-extrabold text-[#2E342A] text-lg">Role</th>
                    <th class="px-6 py-3 text-left font-extrabold text-[#2E342A] text-lg">Actions</th>
                </tr>
                </thead>
                <tbody class="bg-[#E2ECC8]">
                @foreach ($users as $user)
                    <tr class="text-[#2E342A] text-lg">
                        <td class="px-6 py-3">{{ $user->id }}</td>
                        <td class="px-6 py-3">{{ $user->name }}</td>
                        <td class="px-6 py-3">{{ $user->email }}</td>
                        <td class="px-6 py-3">{{ $user->first_name }}</td>
                        <td class="px-6 py-3">{{ $user->last_name }}</td>
                        <td class="px-6 py-3">{{ $user->role }}</td>
                        <td class="px-6 py-3 flex space-x-2">
                            <a href="{{ route('admin.users.edit', $user) }}"
                               class="px-4 py-2 bg-[#AA0160] text-white rounded-md hover:bg-[#90004E] transition duration-300">
                                Edit
                            </a>

                            <form action="{{ route('admin.users.destroy', $user) }}" method="post" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="px-4 py-2 bg-[#7C1A51] text-white rounded-md hover:bg-[#601140] transition duration-300"
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
                <div class="p-4 border border-[#E2ECC8] rounded-lg shadow-md bg-[#E2ECC8]">
                    <p class="text-[#2E342A] font-extrabold text-lg"><strong>ID:</strong> {{ $user->id }}</p>
                    <p class="text-[#2E342A] font-extrabold text-lg"><strong>Company Name:</strong> {{ $user->name }}</p>
                    <p class="text-[#2E342A] font-extrabold text-lg"><strong>Email:</strong> {{ $user->email }}</p>
                    <p class="text-[#2E342A] font-extrabold text-lg"><strong>First Name:</strong> {{ $user->first_name }}</p>
                    <p class="text-[#2E342A] font-extrabold text-lg"><strong>Last Name:</strong> {{ $user->last_name }}</p>
                    <p class="text-[#2E342A] font-extrabold text-lg"><strong>Role:</strong> {{ $user->role }}</p>
                    <div class="mt-2 flex space-x-2">
                        <a href="{{ route('admin.users.edit', $user) }}"
                           class="px-4 py-2 bg-[#AA0160] text-white rounded-md hover:bg-[#90004E] transition duration-300">
                            Edit
                        </a>

                        <form action="{{ route('admin.users.destroy', $user) }}" method="post" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="px-4 py-2 bg-[#7C1A51] text-white rounded-md hover:bg-[#601140] transition duration-300"
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
