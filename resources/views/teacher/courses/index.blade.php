<x-layouts.teacher.app>
    <x-slot name="title">Courses</x-slot>
    <x-slot name="header">Courses - {{ $workspace->name }}</x-slot>
    <x-slot name="subheader">Manage courses inside this workspace</x-slot>

    @if(session('success'))
        <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
            {{ session('success') }}
        </div>
    @endif
        <a href="{{ route('teacher.workspaces.index', $workspace->id) }}"
   class="inline-flex items-center bg-gray-200 text-gray-700 px-4 py-2 rounded-xl hover:bg-gray-300">
    ← Back to Workspace
</a>
    <div class="mb-4">
        <a href="{{ route('teacher.workspaces.courses.create', $workspace) }}"
           class="px-4 py-2 bg-blue-600 text-white rounded">
            Create Course
        </a>
    </div>

    <div class="bg-white shadow-sm rounded-lg p-6">
        @forelse($courses as $course)
            <div class="border-b py-4 flex items-center justify-between">
                <div>
                    <h3 class="text-lg font-semibold">{{ $course->title }}</h3>
                    <p class="text-gray-600">Order: {{ $course->order_index }}</p>
                </div>

                <div class="flex gap-2">
                    <a href="{{ route('teacher.courses.lessons.index', [$workspace, $course]) }}"
                       class="px-3 py-1 bg-indigo-600 text-white rounded">
                        Lessons
                    </a>

                    <a href="{{ route('teacher.workspaces.courses.edit', [$workspace, $course]) }}"
                       class="px-3 py-1 bg-yellow-500 text-white rounded">
                        Edit
                    </a>

                    <form action="{{ route('teacher.workspaces.courses.destroy', [$workspace, $course]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="px-3 py-1 bg-red-600 text-white rounded"
                                onclick="return confirm('Are you sure?')">
                            Delete
                        </button>
                    </form>
                </div>
            </div>
        @empty
            <p>No courses found.</p>
        @endforelse
    </div>
</x-layouts.teacher.app>
