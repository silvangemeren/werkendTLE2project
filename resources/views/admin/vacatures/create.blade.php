<x-layout>
    <x-slot:heading>
        Add Vacancy
    </x-slot:heading>

    <form action="{{ route('admin.vacatures.store') }}" method="post" class="space-y-6 p-6 bg-white dark:bg-gray-800 rounded-lg shadow-lg max-w-lg mx-auto">
        @csrf

        <!-- title -->
        <div>
            <x-input-label for="title">✨ Title</x-input-label>
            <x-text-input name="title" id="title" placeholder="Enter the title" value="{{ old('title') }}"/>
            @error('title') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <!-- description -->
        <div>
            <x-input-label for="description">🔄 Description</x-input-label>
            <textarea name="description" id="description" placeholder="Enter the description"
                      class="border p-2 w-full">{{ old('description') }}</textarea>
            @error('description') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <!-- location -->
        <div>
            <x-input-label for="location">🏠 Location</x-input-label>
            <x-text-input name="location" id="location" placeholder="Enter the location" value="{{ old('location') }}"/>
            @error('location') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <!-- function -->
        <div>
            <x-input-label for="function">🔧 Function</x-input-label>
            <x-text-input name="function" id="function" placeholder="Enter the function" value="{{ old('function') }}"/>
            @error('function') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <!-- work_hours -->
        <div>
            <x-input-label for="work_hours">🕤 Work Hours</x-input-label>
            <x-text-input type="number" name="work_hours" id="work_hours" value="{{ old('work_hours') }}" min="0" max="168"/>
            @error('work_hours') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <!-- salary -->
        <div>
            <x-input-label for="salary">💸 Salary</x-input-label>
            <x-text-input type="number" name="salary" id="salary" value="{{ old('salary') }}" min="0"/>
            @error('salary') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <!-- status -->
        <div>
            <x-input-label>Status</x-input-label>
            <div class="flex gap-3">
                <x-text-input type="radio" name="status" id="active" value="Active" :checked="old('status') === 'Active'"/>
                <x-input-label for="active">Active</x-input-label>
                <x-text-input type="radio" name="status" id="inactive" value="Inactive" :checked="old('status') === 'Inactive'"/>
                <x-input-label for="inactive">Inactive</x-input-label>
            </div>
            @error('status') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <!-- image_url -->
        <div>
            <x-input-label for="image_url">📷 Image URL</x-input-label>
            <x-text-input name="image_url" id="image_url" placeholder="Enter the image address" value="{{ old('image_url') }}"/>
            @error('image_url') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <!-- submit button -->
        <x-primary-button type="submit">Add Vacancy</x-primary-button>
    </form>
</x-layout>
