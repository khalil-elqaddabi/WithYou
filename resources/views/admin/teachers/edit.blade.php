<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Teacher
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow-sm rounded-xl border">

                <form method="POST" action="{{ route('admin.teachers.update', $teacher) }}" class="space-y-5">
                    @csrf
                    @method('PUT')

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Name</label>
                        <input type="text" name="name" value="{{ old('name', $teacher->name) }}"
                               class="w-full rounded-lg border-gray-300">
                        @error('name')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                        <input type="email" name="email" value="{{ old('email', $teacher->email) }}"
                               class="w-full rounded-lg border-gray-300">
                        @error('email')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            New Password
                        </label>
                        <input type="password" name="password"
                               class="w-full rounded-lg border-gray-300">
                        
                        @error('password')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex items-center justify-between">
                        <a href="{{ route('admin.teachers.index') }}"
                           class="text-gray-600 hover:underline">
                            ← Back
                        </a>

                        <button class="bg-yellow-500 text-white px-5 py-2 rounded-lg hover:bg-yellow-600">
                            Update Teacher
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
