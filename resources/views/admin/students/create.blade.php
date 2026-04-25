<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div>
                <h2 class="text-xl font-semibold text-gray-800">Add Student</h2>
                <p class="text-sm text-gray-500">Create a new student account</p>
            </div>

            <a href="{{ route('admin.students.index') }}"
               class="text-sm text-gray-600 hover:text-gray-900 underline">
                ← Back
            </a>
        </div>
    </x-slot>

    <div class="py-10 max-w-3xl mx-auto sm:px-6 lg:px-8">

        <form method="POST"
              action="{{ route('admin.students.store') }}"
              class="bg-white p-8 rounded-2xl shadow-sm border space-y-6">
            @csrf

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Name</label>
                <input type="text"
                       name="name"
                       value="{{ old('name') }}"
                       placeholder="Student name"
                       class="w-full border-gray-300 rounded-xl px-4 py-2
       bg-white text-gray-900
       dark:bg-white dark:text-gray-900"

                @error('name')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                <input type="email"
                       name="email"
                       value="{{ old('email') }}"
                       placeholder="student@example.com"
                       class="w-full border-gray-300 rounded-xl px-4 py-2
       bg-white text-gray-900
       dark:bg-white dark:text-gray-900"

                @error('email')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                <input type="password"
                       name="password"
                       placeholder="Minimum 8 characters"
                       class="w-full border-gray-300 rounded-xl px-4 py-2
       bg-white text-gray-900
       dark:bg-white dark:text-gray-900"

                @error('password')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-between items-center pt-4">
                <a href="{{ route('admin.students.index') }}"
                   class="text-gray-500 hover:text-gray-700">
                    Cancel
                </a>

                <button class="bg-gradient-to-r from-indigo-600 to-blue-600
                               text-white px-6 py-2 rounded-xl
                               hover:scale-[1.03] transition shadow-md">
                    Create Student
                </button>
            </div>
        </form>

    </div>
</x-app-layout>
