<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Teacher Details
            </h2>

            <a href="{{ route('admin.teachers.index') }}"
               class="text-gray-600 hover:underline">
                ← Back
            </a>
        </div>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <div class="bg-white p-6 shadow-sm rounded-xl border">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">
                    Teacher Information
                </h3>

                <p><strong>Name:</strong> {{ $teacher->name }}</p>
                <p><strong>Email:</strong> {{ $teacher->email }}</p>
                <p><strong>Created at:</strong> {{ $teacher->created_at->format('d/m/Y H:i') }}</p>
            </div>

            <div class="bg-white p-6 shadow-sm rounded-xl border">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">
                    Workspaces
                </h3>

                @forelse($teacher->ownedWorkspaces as $workspace)
                    <div class="border rounded-lg p-4 mb-4">
                        <h4 class="font-semibold text-gray-900">
                            {{ $workspace->name }}
                        </h4>

                        <p class="text-sm text-gray-500 mb-3">
                            Students: {{ $workspace->students->count() }}
                        </p>

                        @if($workspace->students->count())
                            <div class="overflow-hidden rounded-lg border">
                                <table class="w-full text-left">
                                    <thead class="bg-gray-50 text-gray-500 text-sm">
                                        <tr>
                                            <th class="p-3">Student Name</th>
                                            <th class="p-3">Email</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach($workspace->students as $student)
                                            <tr class="border-t">
                                                <td class="p-3">{{ $student->name }}</td>
                                                <td class="p-3 text-gray-600">{{ $student->email }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <p class="text-gray-500 text-sm">No students in this workspace.</p>
                        @endif
                    </div>
                @empty
                    <p class="text-gray-500">This teacher has no workspaces.</p>
                @endforelse
            </div>

        </div>
    </div>
</x-app-layout>
