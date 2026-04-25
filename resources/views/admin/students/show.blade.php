<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div>
                <h2 class="text-xl font-semibold text-gray-800">Student Details</h2>
                <p class="text-sm text-gray-500">Student profile and joined workspaces</p>
            </div>

            <a href="{{ route('admin.students.index') }}"
               class="text-sm text-gray-600 hover:text-gray-900 underline">
                ← Back
            </a>
        </div>
    </x-slot>

    <div class="py-10 max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

        <div class="bg-white p-6 rounded-2xl shadow-sm border">
            <div class="flex items-center gap-4">
                <div class="w-14 h-14 rounded-2xl bg-gradient-to-r from-indigo-600 to-blue-600
                            text-white flex items-center justify-center font-bold text-lg">
                    {{ strtoupper(substr($student->name, 0, 2)) }}
                </div>

                <div>
                    <h3 class="text-lg font-semibold text-gray-900">{{ $student->name }}</h3>
                    <p class="text-sm text-gray-500">{{ $student->email }}</p>
                    <span class="inline-block mt-2 text-xs px-3 py-1 rounded-full bg-green-100 text-green-700">
                        Student
                    </span>
                </div>
            </div>
        </div>

        <div class="bg-white p-6 rounded-2xl shadow-sm border">
            <div class="flex justify-between items-center mb-5">
                <h3 class="font-semibold text-gray-900">Workspaces</h3>

                <span class="text-xs px-3 py-1 rounded-full bg-gray-100 text-gray-600">
                    {{ $student->workspaces->count() }} joined
                </span>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                @forelse($student->workspaces as $workspace)
                    <div class="border rounded-2xl p-5 hover:bg-gray-50 transition">
                        <h4 class="font-semibold text-gray-900">{{ $workspace->name }}</h4>

                        <p class="text-sm text-gray-500 mt-2">
                            Teacher: {{ $workspace->teacher->name ?? 'N/A' }}
                        </p>

                        <p class="text-xs text-gray-400 mt-2">
                            Joined:
                            {{ optional($workspace->pivot->joined_at)->format('d/m/Y H:i') ?? 'N/A' }}
                        </p>
                    </div>
                @empty
                    <div class="col-span-full text-center py-10 text-gray-500">
                        No workspaces found for this student.
                    </div>
                @endforelse
            </div>
        </div>

    </div>
</x-app-layout>
