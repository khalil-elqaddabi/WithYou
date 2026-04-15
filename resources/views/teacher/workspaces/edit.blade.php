<x-layouts.teacher.app>
    <x-slot name="title">Edit Workspace</x-slot>
    <x-slot name="header">Edit Workspace</x-slot>
    <x-slot name="subheader">Update workspace information</x-slot>

    <div class="max-w-3xl">
        <div class="bg-white shadow-sm rounded-lg p-6">
            <form method="POST" action="{{ route('teacher.workspaces.update', $workspace) }}">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label class="block mb-1">Name</label>
                    <input type="text" name="name" class="w-full border rounded p-2"
                           value="{{ old('name', $workspace->name) }}">
                    @error('name')
                        <p class="text-red-600 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block mb-1">Subject</label>
                    <textarea name="subject" class="w-full border rounded p-2">{{ old('subject', $workspace->subject) }}</textarea>
                    @error('subject')
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
