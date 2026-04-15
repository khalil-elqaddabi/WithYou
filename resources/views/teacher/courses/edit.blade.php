<x-layouts.teacher.app>
    <x-slot name="title">Edit Course</x-slot>
    <x-slot name="header">Edit Course</x-slot>
    <x-slot name="subheader">Update course information</x-slot>

    <div class="max-w-3xl">
        <div class="bg-white shadow-sm rounded-lg p-6">
            <form method="POST" action="{{ route('teacher.workspaces.courses.update', [$workspace, $course]) }}">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label class="block mb-1">Title</label>
                    <input type="text" name="title" value="{{ old('title', $course->title) }}" class="w-full border rounded p-2">
                    @error('title')
                        <p class="text-red-600 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block mb-1">Order</label>
                    <input type="number" name="order_index" value="{{ old('order_index', $course->order_index) }}" class="w-full border rounded p-2">
                    @error('order_index')
                        <p class="text-red-600 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <button class="px-4 py-2 bg-blue-600 text-white rounded">
                    Update
                </button>
            </form>
        </div>
    </div>
</x-layouts.teacher.app>
