<x-app-layout>
    <div class="py-8">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="bg-white p-6 rounded-2xl shadow-sm mb-6">
                <h1 class="text-2xl font-bold text-gray-800">
                    {{ $lesson->title }}
                </h1>

                <p class="text-gray-500 mt-2">
                    Workspace: {{ $workspace->name }}
                </p>

                <p class="text-gray-500 mt-1">
                    Course: {{ $course->title }}
                </p>
            </div>

            <div class="bg-white p-6 rounded-2xl shadow-sm space-y-6">

                <div>
                    <h2 class="text-lg font-semibold text-gray-800 mb-2">Description</h2>
                    <p class="text-gray-600">
                        {{ $lesson->description ?? 'No description available.' }}
                    </p>
                </div>


                <div>
                    <h2 class="text-lg font-semibold text-gray-800 mb-2">Subject</h2>
                    <p class="text-gray-600">
                        {{ $lesson->subject ?? 'No subject available.' }}
                    </p>
                </div>

                <div>
                    <h2 class="text-lg font-semibold text-gray-800 mb-2">Links</h2>
                    <p class="text-gray-600">
                        {{ $lesson->links ?? 'No links available.' }}
                    </p>
                </div>

                <div class="mb-4">
                    <a href="{{ route('student.courses.show', [$workspace->id, $course->id]) }}"
                        class="text-sm text-indigo-600 hover:underline">
                        ← Back to Course
                    </a>
                </div>

                @if ($lesson->file)
                    <div>
                        <h2 class="text-lg font-semibold text-gray-800 mb-2">File</h2>
                        <a href="{{ asset('storage/' . $lesson->file) }}" target="_blank"
                            class="text-indigo-600 hover:underline">
                            Open File
                        </a>
                    </div>
                @endif

                @if ($lesson->image)
                    <div>
                        <h2 class="text-lg font-semibold text-gray-800 mb-2">Image</h2>
                        <img src="{{ asset('storage/' . $lesson->image) }}" alt="{{ $lesson->title }}"
                            class="rounded-xl max-w-full h-auto border">
                    </div>
                @endif
                <div class="mt-6">
                    <a href="{{ route('student.exercises.index', [$workspace->id, $course->id, $lesson->id]) }}"
                        class="inline-block bg-indigo-500 text-white px-4 py-2 rounded-lg hover:bg-indigo-600">
                        View Exercises
                    </a>
                </div>
            </div>


        </div>
    </div>


</x-app-layout>
