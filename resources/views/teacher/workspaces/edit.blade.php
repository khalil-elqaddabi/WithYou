<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Workspace
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm rounded-lg p-6">
                <form method="POST" action="{{ route('teacher.workspaces.update', $workspace) }}">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="block mb-1">Name</label>
                        <input type="text" name="name" value="{{ old('name', $workspace->name) }}" class="w-full border rounded p-2">
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

                    <button class="rounded bg-blue-600 px-4 py-2 text-white">
                        Update
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
