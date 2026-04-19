<x-layouts.teacher.app>
    <x-slot name="title">Add Exercise</x-slot>
    <x-slot name="header">Add Exercise</x-slot>
    <x-slot name="subheader">Create a new question for {{ $lesson->title }}</x-slot>

    <div class="bg-white p-6 rounded shadow max-w-2xl">
        <a href="{{ route('teacher.courses.lessons.index', [$workspace, $course]) }}"
   class="inline-flex items-center bg-gray-200 text-gray-700 px-4 py-2 rounded-xl hover:bg-gray-300">
    ← Back to Lessons
</a>
        <form method="POST"
              action="{{ route('teacher.lessons.exercises.store', [$workspace, $course, $lesson]) }}">
            @csrf

            <div class="mb-4">
                <label class="block mb-2 font-medium text-gray-700">Question</label>
                <textarea name="question"
                          rows="6"
                          class="w-full border p-3 rounded">{{ old('question') }}</textarea>
                @error('question')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Save
            </button>
        </form>
    </div>
</x-layouts.teacher.app>
