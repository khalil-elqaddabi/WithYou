<x-layouts.teacher.app>
    <x-slot name="title">Create Workspace</x-slot>
    <x-slot name="header">Create Workspace</x-slot>
    <x-slot name="subheader">Add a new workspace for your students</x-slot>

    <div class="max-w-3xl">
        <div class="bg-white shadow-sm rounded-lg p-6">
            <form method="POST" action="{{ route('teacher.workspaces.store') }}">
                @csrf

                <div class="mb-4">
                    <label class="block mb-1">Name</label>
                    <input type="text" name="name" class="w-full border rounded p-2" value="{{ old('name') }}">
                    @error('name')
                        <p class="text-red-600 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block mb-1">Subject</label>
                    <textarea name="subject" class="w-full border rounded p-2">{{ old('subject') }}</textarea>
                    @error('subject')
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
