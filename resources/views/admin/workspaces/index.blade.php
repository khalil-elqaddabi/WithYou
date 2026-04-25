<x-app-layout>
    <x-slot name="header">
        <div>
            <h2 class="text-xl font-semibold text-gray-800">Workspaces</h2>
            <p class="text-sm text-gray-500">View and manage all platform workspaces</p>
        </div>
    </x-slot>

    <div class="py-10 max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-5">

        <a href="{{ route('admin.dashboard') }}"
           class="inline-flex items-center gap-2 px-4 py-2 rounded-xl
                  bg-gradient-to-r from-blue-600 to-violet-600
                  text-white font-semibold text-sm shadow-md
                  hover:shadow-lg hover:scale-[1.02] transition">
            ← Back to Dashboard
        </a>

        @if (session('success'))
            <div class="p-4 bg-green-100 text-green-700 rounded-xl border border-green-200">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white dark:bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">

            <div class="p-5 border-b border-gray-200 bg-gray-50">
                <form method="GET" action="{{ route('admin.workspaces.index') }}">
                    <div class="flex flex-col sm:flex-row gap-3">
                        <input type="text"
                               name="search"
                               value="{{ request('search') }}"
                               placeholder="Search by workspace, teacher, student or email..."
                               class="w-full border border-gray-300 rounded-xl px-4 py-2
                                      bg-white text-gray-900 placeholder-gray-400
                                      dark:bg-white dark:text-gray-900 dark:placeholder-gray-400">

                        <button class="bg-gray-900 text-white px-5 py-2 rounded-xl hover:bg-gray-800 transition">
                            Search
                        </button>

                        @if (request('search'))
                            <a href="{{ route('admin.workspaces.index') }}"
                               class="bg-gray-200 text-gray-700 px-5 py-2 rounded-xl hover:bg-gray-300 transition text-center">
                                Reset
                            </a>
                        @endif
                    </div>
                </form>
            </div>

            <table class="w-full text-left">
                <thead class="bg-white text-gray-500 text-sm">
                    <tr>
                        <th class="p-4">Workspace</th>
                        <th class="p-4">Teacher</th>
                        <th class="p-4">Students</th>
                        <th class="p-4">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($workspaces as $workspace)
                        <tr class="border-t hover:bg-gray-50 transition">
                            <td class="p-4 font-medium text-gray-900">
                                {{ $workspace->name }}
                            </td>

                            <td class="p-4 text-gray-600">
                                {{ $workspace->teacher->name ?? 'N/A' }}
                            </td>

                            <td class="p-4 text-gray-600">
                                {{ $workspace->students_count ?? $workspace->students()->count() }}
                            </td>

                            <td class="p-4">
                                <div class="flex gap-3 items-center">
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
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="p-8 text-center text-gray-500">
                                No workspaces found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
</x-app-layout>
