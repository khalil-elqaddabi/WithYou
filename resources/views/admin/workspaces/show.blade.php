<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="text-xl font-semibold text-gray-800">
                Workspace Details
            </h2>

            <a href="{{ route('admin.workspaces.index') }}"
               class="text-gray-600 hover:underline">
                ← Back
            </a>
        </div>
    </x-slot>

    <div class="py-10 max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

        <div class="bg-white p-6 rounded-xl shadow border">
            <h3 class="text-lg font-semibold mb-4">
                Workspace Information
            </h3>

            <p><strong>Name:</strong> {{ $workspace->name }}</p>
            <p><strong>Teacher:</strong> {{ $workspace->teacher->name ?? 'N/A' }}</p>
            <p><strong>Teacher Email:</strong> {{ $workspace->teacher->email ?? 'N/A' }}</p>
            <p><strong>Created at:</strong> {{ $workspace->created_at->format('d/m/Y H:i') }}</p>
        </div>

        <div class="bg-white p-6 rounded-xl shadow border">
            <h3 class="text-lg font-semibold mb-4">
                Students
            </h3>

            @if($workspace->students->count())
                <div class="overflow-hidden rounded-lg border">
                    <table class="w-full text-left">
                        <thead class="bg-gray-50 text-gray-500 text-sm">
                            <tr>
                                <th class="p-3">Name</th>
                                <th class="p-3">Email</th>
                                <th class="p-3">Joined At</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($workspace->students as $student)
                                <tr class="border-t">
                                    <td class="p-3 font-medium">{{ $student->name }}</td>
                                    <td class="p-3 text-gray-600">{{ $student->email }}</td>
                                    <td class="p-3 text-gray-600">
                                        {{ optional($student->pivot->joined_at)->format('d/m/Y H:i') ?? 'N/A' }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <p class="text-gray-500">
                    No students in this workspace.
                </p>
            @endif
        </div>

    </div>
</x-app-layout>
