<x-app-layout>
    <div class="py-8">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="bg-white p-6 rounded-2xl shadow-sm mb-6">
                <h1 class="text-2xl font-bold text-gray-800">
                    {{ $workspace->name }}
                </h1>

                <p class="text-gray-500 mt-2">
                    Subject: {{ $workspace->subject ?? 'No subject' }}
                </p>

                <p class="text-gray-500 mt-1">
                    Teacher: {{ $workspace->teacher->name ?? 'Unknown' }}
                </p>
            </div>

            <div class="mb-4">
                <a href="{{ route('student.dashboard') }}" class="text-sm text-indigo-600 hover:underline">
                    ← Back to Dashboard
                </a>
            </div>

            <div class="bg-white p-6 rounded-2xl shadow-sm">

                <a href="{{ route('student.room', $workspace->id) }}"
                    class="inline-block bg-indigo-600 text-white px-4 py-2 rounded-xl hover:bg-indigo-700 mt-4">
                    Enter Room
                </a>
                <h2 class="text-lg font-semibold text-gray-800 mb-4">
                    Courses
                </h2>

                @if ($workspace->courses->count())
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        @foreach ($workspace->courses as $course)
                            <div class="border rounded-xl p-4 hover:shadow transition">
                                <h3 class="font-semibold text-gray-800">
                                    {{ $course->title }}
                                </h3>

                                <p class="text-sm text-gray-500 mt-2">
                                    Order: {{ $course->order_index }}
                                </p>

                                <a href="{{ route('student.courses.show', [$workspace->id, $course->id]) }}"
                                    class="inline-block mt-3 text-sm text-indigo-600 hover:underline">
                                    Open Course
                                </a>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-sm text-gray-500">
                        No courses available in this workspace yet.
                    </p>
                @endif
            </div>

        </div>
    </div>
</x-app-layout>
