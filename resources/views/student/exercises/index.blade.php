<x-app-layout>
    <div class="py-8">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="bg-white p-6 rounded-2xl shadow-sm mb-6">
                <h1 class="text-2xl font-bold text-gray-800">
                    Exercises
                </h1>

                <p class="text-gray-500 mt-2">
                    Workspace: {{ $workspace->name }}
                </p>

                <p class="text-gray-500 mt-1">
                    Course: {{ $course->title }}
                </p>

                <p class="text-gray-500 mt-1">
                    Lesson: {{ $lesson->title }}
                </p>
            </div>
            <div class="mb-4">
                <a href="{{ route('student.lessons.show', [$workspace->id, $course->id, $lesson->id]) }}"
                    class="text-sm text-indigo-600 hover:underline">
                    ← Back to Lesson
                </a>
            </div>

            <div class="bg-white p-6 rounded-2xl shadow-sm">
                <h2 class="text-lg font-semibold text-gray-800 mb-4">
                    Exercise List
                </h2>

                @if ($lesson->exercises->count())
                    <div class="space-y-4">
                        @foreach ($lesson->exercises as $exercise)
                            <div class="border rounded-xl p-4 hover:shadow transition">
                                <h3 class="font-medium text-gray-800">
                                    Question {{ $loop->iteration }}
                                </h3>

                                <p class="text-sm text-gray-600 mt-2">
                                    {{ $exercise->question }}
                                </p>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-sm text-gray-500">
                        No exercises available for this lesson yet.
                    </p>
                @endif
            </div>

        </div>
    </div>
</x-app-layout>
