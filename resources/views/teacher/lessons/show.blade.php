<x-layouts.teacher.app>
    <x-slot name="title">{{ $lesson->title }}</x-slot>
    <x-slot name="header">{{ $lesson->title }}</x-slot>
    <x-slot name="subheader">Lesson details</x-slot>

    <div class="max-w-5xl">
        <a href="{{ route('teacher.workspaces.courses.index', $workspace->id) }}"
   class="inline-flex items-center bg-gray-200 text-gray-700 px-4 py-2 rounded-xl hover:bg-gray-300">
    ← Back to Courses
</a>
        <div class="bg-white rounded-lg shadow p-6">

            @if($lesson->description)
                <p class="text-gray-600 mb-6">
                    {{ $lesson->description }}
                </p>
            @endif

            @if($lesson->image)
                <img src="{{ asset('storage/'.$lesson->image) }}"
                     class="w-full rounded mb-6">
            @endif

            @if($lesson->subject)
                <div class="mb-6">
                    <h3 class="text-lg font-semibold mb-2">Subject</h3>
                    <div class="text-gray-700 whitespace-pre-line">
                        {{ $lesson->subject }}
                    </div>
                </div>
            @endif

            @if($lesson->links)
                <div class="mb-6">
                    <h3 class="text-lg font-semibold mb-2">Link</h3>
                    <a href="{{ $lesson->links }}" target="_blank" class="text-blue-600 underline">
                        Open Link
                    </a>
                </div>
            @endif

            @if($lesson->file)
                <div class="mb-6">
                    <h3 class="text-lg font-semibold mb-2">Attached File</h3>
                    <a href="{{ asset('storage/'.$lesson->file) }}"
                       target="_blank"
                       class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">
                        Download File
                    </a>
                </div>
            @endif

            <div class="flex gap-3 mt-6">
                <a href="{{ route('teacher.courses.lessons.edit', [$workspace, $course, $lesson]) }}"
                   class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">
                    Edit
                </a>

                <a href="{{ route('teacher.courses.lessons.index', [$workspace, $course]) }}"
                   class="bg-gray-200 px-4 py-2 rounded hover:bg-gray-300">
                    Back
                </a>
            </div>
        </div>
    </div>
</x-layouts.teacher.app>
