<x-layouts.teacher.app>
    <x-slot name="title">Lessons</x-slot>
    <x-slot name="header">Lessons - {{ $course->title }}</x-slot>
    <x-slot name="subheader">Manage lessons inside this course</x-slot>

    @if(session('success'))
        <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
            {{ session('success') }}
        </div>
    @endif
        <a href="{{ route('teacher.workspaces.courses.index', $workspace->id) }}"
   class="inline-flex items-center bg-gray-200 text-gray-700 px-4 py-2 rounded-xl hover:bg-gray-300">
    ← Back to Courses
</a>
    <div class="mb-4">
        <a href="{{ route('teacher.courses.lessons.create', [$workspace, $course]) }}"
           class="px-4 py-2 bg-blue-600 text-white rounded">
            Add Lesson
        </a>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        @forelse($lessons as $lesson)
            <div class="bg-white shadow-sm rounded-lg p-6">
                <h3 class="text-xl font-bold text-gray-800 mb-2">
                    {{ $lesson->title }}
                </h3>

                @if($lesson->description)
                    <p class="text-gray-600 mb-3">
                        {{ \Illuminate\Support\Str::limit($lesson->description, 120) }}
                    </p>
                @endif

                @if($lesson->image)
                    <img src="{{ asset('storage/'.$lesson->image) }}"
                         class="w-full h-40 object-cover rounded mb-4">
                @endif

                <div class="flex flex-wrap gap-2">
                    <a href="{{ route('teacher.courses.lessons.show', [$workspace, $course, $lesson]) }}"
                       class="px-3 py-1 bg-indigo-600 text-white rounded">
                        View
                    </a>

                    <a href="{{ route('teacher.courses.lessons.edit', [$workspace, $course, $lesson]) }}"
                       class="px-3 py-1 bg-yellow-500 text-white rounded">
                        Edit
                    </a>

                    <form method="POST"
                          action="{{ route('teacher.courses.lessons.destroy', [$workspace, $course, $lesson]) }}">
                        @csrf
                        @method('DELETE')
                        <button class="px-3 py-1 bg-red-600 text-white rounded"
                                onclick="return confirm('Are you sure?')">
                            Delete
                        </button>
                    </form>

                    <a href="{{ route('teacher.lessons.exercises.index', [$workspace, $course, $lesson]) }}"
   class="px-3 py-1 bg-purple-600 text-white rounded hover:bg-purple-700">
    Exercises
</a>
                </div>
            </div>
        @empty
            <div class="bg-white shadow-sm rounded-lg p-6">
                <p class="text-gray-500">No lessons found.</p>
            </div>
        @endforelse
    </div>
</x-layouts.teacher.app>
