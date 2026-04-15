<x-layouts.teacher.app>
    <x-slot name="title">Edit Lesson</x-slot>
    <x-slot name="header">Edit Lesson</x-slot>
    <x-slot name="subheader">Update lesson information</x-slot>

    <div class="max-w-4xl">
        <div class="bg-white shadow-sm rounded-lg p-6">
            <form method="POST"
                  action="{{ route('teacher.courses.lessons.update', [$workspace, $course, $lesson]) }}"
                  enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label class="block mb-1">Title</label>
                    <input type="text" name="title" value="{{ old('title', $lesson->title) }}" class="w-full border rounded p-2">
                    @error('title')
                        <p class="text-red-600 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block mb-1">Description</label>
                    <textarea name="description" rows="4" class="w-full border rounded p-2">{{ old('description', $lesson->description) }}</textarea>
                    @error('description')
                        <p class="text-red-600 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block mb-1">Subject</label>
                    <textarea name="subject" rows="6" class="w-full border rounded p-2">{{ old('subject', $lesson->subject) }}</textarea>
                    @error('subject')
                        <p class="text-red-600 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block mb-1">Links</label>
                    <input type="text" name="links" value="{{ old('links', $lesson->links) }}" class="w-full border rounded p-2">
                    @error('links')
                        <p class="text-red-600 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block mb-1">Replace File</label>
                    <input type="file" name="file" class="w-full border rounded p-2">
                    @if($lesson->file)
                        <p class="text-sm text-gray-500 mt-2">
                            Current file:
                            <a href="{{ asset('storage/'.$lesson->file) }}" target="_blank" class="text-blue-600 underline">
                                Open current file
                            </a>
                        </p>
                    @endif
                    @error('file')
                        <p class="text-red-600 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label class="block mb-1">Replace Image</label>
                    <input type="file" name="image" class="w-full border rounded p-2">
                    @if($lesson->image)
                        <img src="{{ asset('storage/'.$lesson->image) }}" class="w-40 rounded mt-3 border">
                    @endif
                    @error('image')
                        <p class="text-red-600 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <button class="px-4 py-2 bg-blue-600 text-white rounded">
                    Update Lesson
                </button>
            </form>
        </div>
    </div>
</x-layouts.teacher.app>
