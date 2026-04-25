<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div>
                <h2 class="text-xl font-semibold text-gray-800">Edit Teacher</h2>
                <p class="text-sm text-gray-500">Update teacher information</p>
            </div>

            <a href="{{ route('admin.teachers.index') }}"
               class="text-sm text-gray-600 hover:text-gray-900 underline">
                ← Back
            </a>
        </div>
    </x-slot>

    <div class="py-10 max-w-3xl mx-auto sm:px-6 lg:px-8">

        <form method="POST"
              action="{{ route('admin.teachers.update', $teacher) }}"
              class="bg-white p-8 rounded-2xl shadow-sm border space-y-6">
            @csrf
            @method('PUT')

            <!-- Name -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Name
                </label>
                <input type="text"
                       name="name"
                       value="{{ old('name', $teacher->name) }}"
                       class="w-full border-gray-300 rounded-xl px-4 py-2
       bg-white text-gray-900
       dark:bg-white dark:text-gray-900"

                @error('name')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Email -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Email
                </label>
                <input type="email"
                       name="email"
                       value="{{ old('email', $teacher->email) }}"
                       class="w-full border-gray-300 rounded-xl px-4 py-2
       bg-white text-gray-900
       dark:bg-white dark:text-gray-900"

                @error('email')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    New Password
                </label>
                <input type="password"
                       name="password"
                       placeholder="Leave empty if you don't want to change it"
                       class="w-full border-gray-300 rounded-xl px-4 py-2
       bg-white text-gray-900
       dark:bg-white dark:text-gray-900"

                @error('password')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Actions -->
            <div class="flex justify-between items-center pt-4">

                <a href="{{ route('admin.teachers.index') }}"
                   class="text-gray-500 hover:text-gray-700">
                    Cancel
                </a>

                <button class="bg-gradient-to-r from-yellow-500 to-orange-500
                               text-white px-6 py-2 rounded-xl
                               hover:scale-[1.03] transition shadow-md">
                    Update Teacher
                </button>

            </div>

        </form>

    </div>
</x-app-layout>
