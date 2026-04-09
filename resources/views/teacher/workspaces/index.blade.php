<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            My Workspaces
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if (session('success'))
                <div class="mb-4 rounded bg-green-100 p-4 text-green-700">
                    {{ session('success') }}
                </div>
            @endif

            <div class="mb-4">
                <a href="{{ route('teacher.workspaces.create') }}"
                   class="rounded bg-blue-600 px-4 py-2 text-white">
                    Create Workspace
                </a>
            </div>

            <div class="bg-white shadow-sm rounded-lg p-6">
                @forelse ($workspaces as $workspace)
                    <div class="border-b py-4 flex items-center justify-between">
                        <div>
                            <h3 class="text-lg font-semibold">{{ $workspace->name }}</h3>
                            <p class="text-gray-600">{{ $workspace->subject }}</p>
                        </div>

                        <div class="flex gap-2">
                            <a href="{{ route('teacher.workspaces.show', $workspace) }}"
                               class="rounded bg-green-600 px-3 py-1 text-white">
                                View
                            </a>

                            <a href="{{ route('teacher.workspaces.edit', $workspace) }}"
                               class="rounded bg-yellow-500 px-3 py-1 text-white">
                                Edit
                            </a>

                            <form action="{{ route('teacher.workspaces.destroy', $workspace) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="rounded bg-red-600 px-3 py-1 text-white"
                                        onclick="return confirm('Are you sure?')">
                                    Delete
                                </button>
                            </form>

                            <a href="{{ route('teacher.workspaces.courses.index', $workspace) }}" class="px-3 py-1 bg-indigo-600 text-white rounded">
    Courses
</a>
                        </div>
                    </div>
                @empty
                    <p>No workspaces found.</p>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>
