<x-layouts.teacher.app>
    <x-slot name="title">My Workspaces</x-slot>
    <x-slot name="header">My Workspaces</x-slot>
    <x-slot name="subheader">Manage all your teaching spaces</x-slot>

    @if (session('success'))
        <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
            {{ session('success') }}
        </div>
    @endif

    <div class="mb-4">
        <a href="{{ route('teacher.workspaces.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded">
            Create Workspace
        </a>
    </div>

    <div class="bg-white shadow-sm rounded-lg p-6">
        @forelse($workspaces as $workspace)
            <div class="border-b py-4 flex items-center justify-between">
                <div>
                    <h3 class="text-lg font-semibold">{{ $workspace->name }}</h3>
                    <p class="text-gray-600">{{ $workspace->subject }}</p>
                </div>

                <div class="flex gap-2">
                    <a href="{{ route('teacher.workspaces.show', $workspace->id) }}"
                        class="bg-blue-500 text-white px-3 py-1 rounded-lg hover:bg-blue-600">
                        View
                    </a>
                    <a href="{{ route('teacher.workspaces.courses.index', $workspace) }}"
                        class="px-3 py-1 bg-indigo-600 text-white rounded">
                        Courses
                    </a>

                    <a href="{{ route('teacher.workspaces.edit', $workspace) }}"
                        class="px-3 py-1 bg-yellow-500 text-white rounded">
                        Edit
                    </a>

                    <form action="{{ route('teacher.workspaces.destroy', $workspace) }}" method="POST">
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
            <p>No workspaces found.</p>
        @endforelse
    </div>
</x-layouts.teacher.app>
