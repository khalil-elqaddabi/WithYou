<x-layouts.teacher.app>
    <x-slot name="title">Create Lesson</x-slot>
    <x-slot name="header">Create Lesson</x-slot>
    <x-slot name="subheader">Add a new lesson inside {{ $course->title }}</x-slot>

    <div class="max-w-4xl">
        <a href="{{ route('teacher.workspaces.courses.index', $workspace->id) }}"
   class="inline-flex items-center bg-gray-200 text-gray-700 px-4 py-2 rounded-xl hover:bg-gray-300">
    ← Back to Courses
</a>
        <div class="bg-white shadow-sm rounded-lg p-6">
            <form method="POST"
                  action="{{ route('teacher.courses.lessons.store', [$workspace, $course]) }}"
                  enctype="multipart/form-data">
                @csrf

                <div class="mb-4">
                    <label class="block mb-1">Title</label>
                    <input type="text" name="title" value="{{ old('title') }}" class="w-full border rounded p-2">
                    @error('title')
                        <p class="text-red-600 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block mb-1">Description</label>
                    <textarea name="description" rows="4" class="w-full border rounded p-2">{{ old('description') }}</textarea>
                    @error('description')
                        <p class="text-red-600 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block mb-1">Subject</label>
                    <textarea name="subject" rows="6" class="w-full border rounded p-2">{{ old('subject') }}</textarea>
                    @error('subject')
                        <p class="text-red-600 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block mb-1">Links</label>
                    <input type="text" name="links" value="{{ old('links') }}" class="w-full border rounded p-2">
                    @error('links')
                        <p class="text-red-600 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block mb-1">Upload File</label>
                    <input type="file" name="file" class="w-full border rounded p-2">
                    @error('file')
                        <p class="text-red-600 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block mb-1">Upload Image</label>
                    <input type="file" name="image" class="w-full border rounded p-2">
                    @error('image')
                        <p class="text-red-600 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <button class="px-4 py-2 bg-blue-600 text-white rounded">
                    Create Lesson
                </button>
            </form>
        </div>
    </div>
</x-layouts.teacher.app>
