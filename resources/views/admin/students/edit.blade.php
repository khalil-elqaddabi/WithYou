<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold">Edit Student</h2>
    </x-slot>

    <div class="py-10 max-w-3xl mx-auto">

        <form method="POST" action="{{ route('admin.students.update', $student) }}" class="bg-white p-6 rounded-xl shadow border space-y-4">
            @csrf
            @method('PUT')

            <input type="text" name="name" value="{{ $student->name }}"
                   class="w-full border rounded-lg p-2">

            <input type="email" name="email" value="{{ $student->email }}"
                   class="w-full border rounded-lg p-2">

            <input type="password" name="password" placeholder="New password (optional)"
                   class="w-full border rounded-lg p-2">

            <div class="flex justify-between">
                <a href="{{ route('admin.students.index') }}">← Back</a>

                <button class="bg-yellow-500 text-white px-5 py-2 rounded-lg">
                    Update
                </button>
            </div>
        </form>

    </div>
</x-app-layout>
