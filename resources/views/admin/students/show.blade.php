<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="text-xl font-semibold">Student Details</h2>
            <a href="{{ route('admin.students.index') }}">← Back</a>
        </div>
    </x-slot>

    <div class="py-10 max-w-7xl mx-auto space-y-6">

        <div class="bg-white p-6 rounded-xl shadow border">
            <p><strong>Name:</strong> {{ $student->name }}</p>
            <p><strong>Email:</strong> {{ $student->email }}</p>
        </div>

        <div class="bg-white p-6 rounded-xl shadow border">
            <h3 class="font-semibold mb-4">Workspaces</h3>

            @forelse($student->workspaces as $workspace)
                <div class="border p-4 rounded-lg mb-3">
                    <p class="font-medium">{{ $workspace->name }}</p>
                    <p class="text-sm text-gray-500">
                        Teacher: {{ $workspace->teacher->name ?? 'N/A' }}
                    </p>
                </div>
            @empty
                <p class="text-gray-500">No workspaces</p>
            @endforelse

        </div>

    </div>
</x-app-layout>
