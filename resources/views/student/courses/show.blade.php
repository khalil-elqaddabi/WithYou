<x-app-layout>
    <div class="py-8">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="bg-white p-6 rounded-2xl shadow-sm mb-6">
                <h1 class="text-2xl font-bold text-gray-800">
                    {{ $course->title }}
                </h1>

                <p class="text-gray-500 mt-2">
                    Workspace: {{ $workspace->name }}
                </p>
            </div>

            <div class="mb-4">
                <a href="{{ route('student.workspaces.show', $workspace->id) }}"
                    class="text-sm text-indigo-600 hover:underline">
                    ← Back to Workspace
                </a>
            </div>

            <div class="bg-white p-6 rounded-2xl shadow-sm">
                <h2 class="text-lg font-semibold text-gray-800 mb-4">
                    Lessons
                </h2>

                @if ($course->lessons->count())
                    <div class="space-y-4">
                        @foreach ($course->lessons as $lesson)
                            <div class="border rounded-xl p-4 hover:shadow transition">
                                <h3 class="font-semibold text-gray-800">
                                    {{ $lesson->title }}
                                </h3>

                                <p class="text-sm text-gray-500 mt-2">
                                    {{ $lesson->description ?? 'No description' }}
                                </p>

                                <a href="{{ route('student.lessons.show', [$workspace->id, $course->id, $lesson->id]) }}"
                                    class="inline-block mt-3 text-sm text-indigo-600 hover:underline">
                                    Open Lesson
                                </a>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-sm text-gray-500">
                        No lessons available in this course yet.
                    </p>
                @endif
            </div>

        </div>
    </div>
</x-app-layout>
