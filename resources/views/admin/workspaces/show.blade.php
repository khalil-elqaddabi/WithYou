<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div>
                <h2 class="text-xl font-semibold text-gray-800">Workspace Details</h2>
                <p class="text-sm text-gray-500">Workspace information and joined students</p>
            </div>

            <a href="{{ route('admin.workspaces.index') }}"
               class="text-sm text-gray-600 hover:text-gray-900 underline">
                ← Back
            </a>
        </div>
    </x-slot>

    <div class="py-10 max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

        <div class="bg-white dark:bg-white p-6 rounded-2xl shadow-sm border border-gray-200">
            <div class="flex items-center gap-4">
                <div class="w-14 h-14 rounded-2xl bg-gradient-to-r from-amber-500 to-orange-500
                            text-white flex items-center justify-center font-bold text-lg">
                    {{ strtoupper(substr($workspace->name, 0, 2)) }}
                </div>

                <div>
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-900">
                        {{ $workspace->name }}
                    </h3>

                    <p class="text-sm text-gray-500 dark:text-gray-600">
                        Teacher: {{ $workspace->teacher->name ?? 'N/A' }}
                    </p>

                    <p class="text-sm text-gray-500 dark:text-gray-600">
                        Email: {{ $workspace->teacher->email ?? 'N/A' }}
                    </p>

                    <p class="text-xs text-gray-400 dark:text-gray-500 mt-2">
                        Created: {{ $workspace->created_at->format('d/m/Y H:i') }}
                    </p>
                </div>
            </div>
        </div>

        <div class="bg-white dark:bg-white p-6 rounded-2xl shadow-sm border border-gray-200">
            <div class="flex justify-between items-center mb-5">
                <h3 class="font-semibold text-gray-900 dark:text-gray-900">Students</h3>

                <span class="text-xs px-3 py-1 rounded-full bg-gray-100 text-gray-600">
                    {{ $workspace->students->count() }} joined
                </span>
            </div>

            @if($workspace->students->count())
                <div class="overflow-hidden rounded-2xl border border-gray-200">
                    <table class="w-full text-left">
                        <thead class="bg-gray-50 text-gray-500 text-sm">
                            <tr>
                                <th class="p-4">Name</th>
                                <th class="p-4">Email</th>
                                <th class="p-4">Joined At</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($workspace->students as $student)
                                <tr class="border-t hover:bg-gray-50 transition">
                                    <td class="p-4 font-medium text-gray-900 dark:text-gray-900">
                                        {{ $student->name }}
                                    </td>
                                    <td class="p-4 text-gray-600 dark:text-gray-600">
                                        {{ $student->email }}
                                    </td>
                                    <td class="p-4 text-gray-600 dark:text-gray-600">
                                        {{ optional($student->pivot->joined_at)->format('d/m/Y H:i') ?? 'N/A' }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="text-center py-10 text-gray-500 dark:text-gray-600">
                    No students in this workspace.
                </div>
            @endif
        </div>

    </div>
</x-app-layout>
