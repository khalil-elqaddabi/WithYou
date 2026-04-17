<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Workspace Details
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm rounded-lg p-6">
                <h3 class="text-2xl font-bold mb-4">{{ $workspace->name }}</h3>

                <p class="mb-4">
                    <strong>Subject:</strong> {{ $workspace->subject ?: 'No subject' }}
                </p>

                <a href="{{ route('teacher.workspaces.index') }}" class="rounded bg-gray-700 px-4 py-2 text-white">
                    Back
                </a>
            </div>

            <a href="{{ route('teacher.room', $workspace->id) }}"
                class="inline-block bg-green-600 text-white px-4 py-2 rounded-xl hover:bg-green-700 mt-4">
                Enter Room
            </a>
        </div>
    </div>

    <div class="bg-white p-6 rounded-2xl shadow-sm mb-6">
        <h2 class="text-lg font-semibold text-gray-800 mb-4">Add Student by Email</h2>

        @if (session('success'))
            <div class="mb-3 p-3 rounded-lg bg-green-100 text-green-700">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="mb-3 p-3 rounded-lg bg-red-100 text-red-700">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ url('/teacher/workspaces/' . $workspace->id . '/students') }}" method="POST">
            @csrf

            <input type="email" name="email" placeholder="Enter student email" required>

            <button type="submit">Add</button>
        </form>
    </div>

    <div class="bg-white p-6 rounded-2xl shadow-sm mt-6">
        <h2 class="text-lg font-semibold text-gray-800 mb-4">Students</h2>

        @if ($workspace->students->count())
            <div class="space-y-3">
                @foreach ($workspace->students as $student)
                    <div class="flex items-center justify-between border rounded-xl p-4">
                        <div>
                            <p class="font-medium text-gray-800">{{ $student->name }}</p>
                            <p class="text-sm text-gray-500">{{ $student->email }}</p>
                        </div>

                        <form action="{{ url('/teacher/workspaces/' . $workspace->id . '/students/' . $student->id) }}"
                            method="POST">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600">
                                Remove
                            </button>
                        </form>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-sm text-gray-500">No students in this workspace yet.</p>
        @endif
    </div>
</x-app-layout>
