<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800">
            Workspaces
        </h2>
    </x-slot>

    <div class="py-10 max-w-7xl mx-auto sm:px-6 lg:px-8">

        @if(session('success'))
            <div class="mb-4 p-3 bg-green-100 text-green-700 rounded">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white rounded-xl shadow border overflow-hidden">
            <table class="w-full text-left">
                <thead class="bg-gray-50 text-gray-500 text-sm">
                    <tr>
                        <th class="p-4">Workspace</th>
                        <th class="p-4">Teacher</th>
                        <th class="p-4">Students</th>
                        <th class="p-4">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($workspaces as $workspace)
                        <tr class="border-t hover:bg-gray-50">
                            <td class="p-4 font-medium text-gray-900">
                                {{ $workspace->name }}
                            </td>

                            <td class="p-4 text-gray-600">
                                {{ $workspace->teacher->name ?? 'N/A' }}
                            </td>

                            <td class="p-4 text-gray-600">
                                {{ $workspace->students_count ?? $workspace->students()->count() }}
                            </td>

                            <td class="p-4 flex gap-3">
                                <a href="{{ route('admin.workspaces.show', $workspace) }}"
                                   class="text-blue-600 hover:underline">
                                    View
                                </a>

                                <form method="POST"
                                      action="{{ route('admin.workspaces.destroy', $workspace) }}"
                                      onsubmit="return confirm('Delete this workspace permanently?')">
                                    @csrf
                                    @method('DELETE')

                                    <button class="text-red-600 hover:underline">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="p-6 text-center text-gray-500">
                                No workspaces found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
</x-app-layout>
