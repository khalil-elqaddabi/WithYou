<x-layouts.teacher.app>
    <x-slot name="title">Create Course</x-slot>
    <x-slot name="header">Create Course</x-slot>
    <x-slot name="subheader">Add a new course inside {{ $workspace->name }}</x-slot>

    <div class="max-w-3xl">
        <div class="bg-white shadow-sm rounded-lg p-6">
            <a href="{{ route('teacher.workspaces.index', $workspace->id) }}"
   class="inline-flex items-center bg-gray-200 text-gray-700 px-4 py-2 rounded-xl hover:bg-gray-300">
    ← Back to Workspace
</a>
            <form method="POST" action="{{ route('teacher.workspaces.courses.store', $workspace) }}">
                @csrf

                <div class="mb-4">
                    <label class="block mb-1">Title</label>
                    <input type="text" name="title" value="{{ old('title') }}" class="w-full border rounded p-2">
                    @error('title')
                        <p class="text-red-600 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block mb-1">Order</label>
                    <input type="number" name="order_index" value="{{ old('order_index', 0) }}" class="w-full border rounded p-2">
                    @error('order_index')
                        <p class="text-red-600 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <button class="px-4 py-2 bg-blue-600 text-white rounded">
                    Save
                </button>
            </form>
        </div>
    </div>
</x-layouts.teacher.app>
