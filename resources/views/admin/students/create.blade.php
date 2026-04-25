<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold">Add Student</h2>
    </x-slot>

    <div class="py-10 max-w-3xl mx-auto">

        <form method="POST" action="{{ route('admin.students.store') }}" class="bg-white p-6 rounded-xl shadow border space-y-4">
            @csrf

            <input type="text" name="name" placeholder="Name" value="{{ old('name') }}"
                   class="w-full border rounded-lg p-2">
            @error('name') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror

            <input type="email" name="email" placeholder="Email" value="{{ old('email') }}"
                   class="w-full border rounded-lg p-2">
            @error('email') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror

            <input type="password" name="password" placeholder="Password"
                   class="w-full border rounded-lg p-2">
            @error('password') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror

            <div class="flex justify-between">
                <a href="{{ route('admin.students.index') }}">← Back</a>

                <button class="bg-indigo-600 text-white px-5 py-2 rounded-lg">
                    Create
                </button>
            </div>
        </form>

    </div>
</x-app-layout>
