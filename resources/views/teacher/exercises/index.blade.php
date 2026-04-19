<x-layouts.teacher.app>
    <x-slot name="title">Exercises</x-slot>
    <x-slot name="header">Exercises - {{ $lesson->title }}</x-slot>
    <x-slot name="subheader">Manage questions for this lesson</x-slot>

    @if(session('success'))
        <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
            {{ session('success') }}
        </div>
    @endif
    <a href="{{ route('teacher.courses.lessons.index', [$workspace, $course]) }}"
   class="inline-flex items-center bg-gray-200 text-gray-700 px-4 py-2 rounded-xl hover:bg-gray-300">
    ← Back to Lessons
</a>

    <div class="mb-4">
        <a href="{{ route('teacher.lessons.exercises.create', [$workspace, $course, $lesson]) }}"
           class="bg-blue-600 text-white px-4 py-2 rounded">
            Add Question
        </a>
    </div>

    <div class="bg-white rounded shadow p-6">
        @forelse($exercises as $exercise)
            <div class="border-b py-4 flex items-start justify-between gap-4">
                <div>
                    <p class="text-gray-800 whitespace-pre-line">{{ $exercise->question }}</p>
                </div>

                <form method="POST"
                      action="{{ route('teacher.lessons.exercises.destroy', [$workspace, $course, $lesson, $exercise]) }}">
                    @csrf
                    @method('DELETE')
                    <button class="text-red-600 hover:underline"
                            onclick="return confirm('Are you sure?')">
                        Delete
                    </button>
                </form>
            </div>
        @empty
            <p class="text-gray-500">No exercises yet.</p>
        @endforelse
    </div>
</x-layouts.teacher.app>
