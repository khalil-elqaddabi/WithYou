<x-layouts.teacher.app>
    <x-slot name="title">Teacher Dashboard</x-slot>
    <x-slot name="header">Teacher Dashboard</x-slot>
    <x-slot name="subheader">Welcome back, {{ auth()->user()->name }}</x-slot>

    <div class="space-y-8">

        <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-6">
            <div class="bg-white rounded-xl shadow p-6">
                <p class="text-sm text-gray-500">Total Workspaces</p>
                <h3 class="text-3xl font-bold text-gray-800 mt-2">{{ $totalWorkspaces }}</h3>
            </div>

            <div class="bg-white rounded-xl shadow p-6">
                <p class="text-sm text-gray-500">Total Courses</p>
                <h3 class="text-3xl font-bold text-gray-800 mt-2">{{ $totalCourses }}</h3>
            </div>

            <div class="bg-white rounded-xl shadow p-6">
                <p class="text-sm text-gray-500">Total Lessons</p>
                <h3 class="text-3xl font-bold text-gray-800 mt-2">{{ $totalLessons }}</h3>
            </div>

            <div class="bg-white rounded-xl shadow p-6">
                <p class="text-sm text-gray-500">Total Students</p>
                <h3 class="text-3xl font-bold text-gray-800 mt-2">{{ $totalStudents }}</h3>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow p-6">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Quick Actions</h3>

            <div class="flex flex-wrap gap-3">
                <a href="{{ route('teacher.workspaces.create') }}"
                   class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                    Create Workspace
                </a>

                <a href="{{ route('teacher.workspaces.index') }}"
                   class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700">
                    View Workspaces
                </a>
            </div>
        </div>

        <div class="grid grid-cols-1 xl:grid-cols-2 gap-8">
            <div class="bg-white rounded-xl shadow p-6">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-semibold text-gray-800">Recent Workspaces</h3>
                    <a href="{{ route('teacher.workspaces.index') }}"
                       class="text-blue-600 text-sm hover:underline">
                        View all
                    </a>
                </div>

                @forelse($recentWorkspaces as $workspace)
                    <div class="border-b py-4 last:border-b-0">
                        <h4 class="font-semibold text-gray-800">{{ $workspace->name }}</h4>
                        <p class="text-sm text-gray-500 mt-1">
                            {{ $workspace->subject ?: 'No subject' }}
                        </p>
                    </div>
                @empty
                    <p class="text-gray-500">No workspaces yet.</p>
                @endforelse
            </div>

            <div class="bg-white rounded-xl shadow p-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Recent Lessons</h3>

                @forelse($recentLessons as $lesson)
                    <div class="border-b py-4 last:border-b-0">
                        <h4 class="font-semibold text-gray-800">{{ $lesson->title }}</h4>
                        <p class="text-sm text-gray-500 mt-1">
                            {{ \Illuminate\Support\Str::limit($lesson->description, 60) }}
                        </p>
                    </div>
                @empty
                    <p class="text-gray-500">No lessons yet.</p>
                @endforelse
            </div>
        </div>

    </div>
</x-layouts.teacher.app>
