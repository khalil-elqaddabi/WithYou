<x-app-layout>
    <div class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Welcome -->
            <div class="bg-white p-6 rounded-2xl shadow-sm mb-6">
                <h1 class="text-2xl font-bold text-gray-800">
                    Welcome, {{ auth()->user()->name }}
                </h1>
                <p class="text-gray-500 mt-2">
                    Manage your workspaces and continue your learning.
                </p>
            </div>

            <!-- Stats -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                <div class="bg-white p-5 rounded-2xl shadow-sm">
                    <h3 class="text-sm text-gray-500">Workspaces</h3>
                    <p class="text-3xl font-bold text-indigo-600 mt-2">
                        {{ isset($workspaces) ? $workspaces->count() : 0 }}
                    </p>
                </div>

                <div class="bg-white p-5 rounded-2xl shadow-sm">
                    <h3 class="text-sm text-gray-500">Lessons</h3>
                    <p class="text-3xl font-bold text-green-600 mt-2">
                        {{ isset($lessons) ? $lessons->count() : 0 }}
                    </p>
                </div>

                <div class="bg-white p-5 rounded-2xl shadow-sm">
                    <h3 class="text-sm text-gray-500">Exercises</h3>
                    <p class="text-3xl font-bold text-pink-600 mt-2">
                        {{ $exercisesCount ?? 0 }}
                    </p>
                </div>
            </div>

            <!-- Workspaces -->
            <div class="bg-white p-6 rounded-2xl shadow-sm mb-6">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-lg font-semibold text-gray-800">
                        My Workspaces
                    </h2>


                    <a href="#" class="text-sm bg-indigo-500 text-white px-3 py-1 rounded-lg hover:bg-indigo-600">
                        Join
                    </a>
                </div>

                @if (isset($workspaces) && $workspaces->count())
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        @foreach ($workspaces as $workspace)
                            <div class="border rounded-xl p-4 hover:shadow transition">
                                <h3 class="font-semibold text-gray-800">
                                    {{ $workspace->name }}
                                </h3>

                                <p class="text-sm text-gray-500 mt-1">
                                    {{ $workspace->subject ?? 'No subject' }}
                                </p>

                                <div class="mt-3 flex items-center gap-3">
                                    <a href="{{ route('student.workspaces.show', $workspace->id) }}"
                                        class="inline-block text-sm text-indigo-600 hover:underline">
                                        Open Workspace
                                    </a>
                                    <form action="{{ url('/student/workspaces/' . $workspace->id . '/leave') }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="text-sm text-red-600 hover:underline">
                                            Leave
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-gray-500 text-sm">
                        You are not enrolled in any workspace yet.
                    </p>
                @endif
            </div>

            <!-- Lessons -->
            <div class="bg-white p-6 rounded-2xl shadow-sm">
                <h2 class="text-lg font-semibold text-gray-800 mb-4">
                    Latest Lessons
                </h2>

                @if (isset($lessons) && $lessons->count())
                    <div class="space-y-4">
                        @foreach ($lessons as $lesson)
                            <div class="border rounded-xl p-4 hover:shadow transition">
                                <h3 class="font-semibold text-gray-800">
                                    {{ $lesson->title }}
                                </h3>

                                <p class="text-sm text-gray-500 mt-1">
                                    {{ \Illuminate\Support\Str::limit($lesson->content, 80) }}
                                </p>

                                <a href="#" class="inline-block mt-2 text-sm text-indigo-600 hover:underline">
                                    View Lesson
                                </a>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-gray-500 text-sm">
                        No lessons available yet.
                    </p>
                @endif
            </div>

        </div>
    </div>
</x-app-layout>
