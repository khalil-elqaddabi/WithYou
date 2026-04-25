<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div>
                <h2 class="text-xl font-semibold text-gray-800">Teacher Details</h2>
                <p class="text-sm text-gray-500">Teacher profile and managed workspaces</p>
            </div>

            <a href="{{ route('admin.teachers.index') }}"
               class="text-sm text-gray-600 hover:text-gray-900 underline">
                ← Back
            </a>
        </div>
    </x-slot>

    <div class="py-10 max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

        {{-- Teacher Info --}}
        <div class="bg-white p-6 rounded-2xl shadow-sm border">
            <div class="flex items-center gap-4">

                <div class="w-14 h-14 rounded-2xl bg-gradient-to-r from-purple-600 to-indigo-600
                            text-white flex items-center justify-center font-bold text-lg">
                    {{ strtoupper(substr($teacher->name, 0, 2)) }}
                </div>

                <div>
                    <h3 class="text-lg font-semibold text-gray-900">{{ $teacher->name }}</h3>
                    <p class="text-sm text-gray-500">{{ $teacher->email }}</p>

                    <span class="inline-block mt-2 text-xs px-3 py-1 rounded-full bg-purple-100 text-purple-700">
                        Teacher
                    </span>

                    <p class="text-xs text-gray-400 mt-2">
                        Created: {{ $teacher->created_at->format('d/m/Y H:i') }}
                    </p>
                </div>

            </div>
        </div>

        {{-- Workspaces --}}
        <div class="bg-white p-6 rounded-2xl shadow-sm border">

            <div class="flex justify-between items-center mb-5">
                <h3 class="font-semibold text-gray-900">Workspaces</h3>

                <span class="text-xs px-3 py-1 rounded-full bg-gray-100 text-gray-600">
                    {{ $teacher->ownedWorkspaces->count() }} total
                </span>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                @forelse($teacher->ownedWorkspaces as $workspace)
                    <div class="border rounded-2xl p-5 hover:bg-gray-50 transition">

                        <div class="flex justify-between items-center">
                            <h4 class="font-semibold text-gray-900">
                                {{ $workspace->name }}
                            </h4>

                            <span class="text-xs px-2 py-1 rounded-full bg-blue-100 text-blue-600">
                                {{ $workspace->students->count() }} students
                            </span>
                        </div>

                        @if($workspace->students->count())
                            <div class="mt-4 overflow-hidden rounded-xl border">

                                <table class="w-full text-left text-sm">
                                    <thead class="bg-gray-50 text-gray-500">
                                        <tr>
                                            <th class="p-3">Student</th>
                                            <th class="p-3">Email</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach($workspace->students as $student)
                                            <tr class="border-t hover:bg-gray-50">
                                                <td class="p-3 font-medium text-gray-900">
                                                    {{ $student->name }}
                                                </td>
                                                <td class="p-3 text-gray-600">
                                                    {{ $student->email }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>
                        @else
                            <p class="text-gray-400 text-sm mt-3">
                                No students yet.
                            </p>
                        @endif

                    </div>
                @empty
                    <div class="col-span-full text-center py-10 text-gray-500">
                        This teacher has no workspaces.
                    </div>
                @endforelse

            </div>
        </div>

    </div>
</x-app-layout>
