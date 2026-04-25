<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="text-xl font-semibold">Students</h2>

            <a href="{{ route('admin.students.create') }}"
                class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700">
                + Add Student
            </a>
        </div>
    </x-slot>

    <div class="py-10 max-w-7xl mx-auto">
<a href="{{ route('admin.dashboard') }}"
   class="inline-flex items-center gap-2 bg-gray-100 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-200 transition">
    ← Back to Dashboard
</a>
        @if (session('success'))
            <div class="mb-4 p-3 bg-green-100 text-green-700 rounded">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white rounded-xl shadow border overflow-hidden">
            <form method="GET" action="{{ route('admin.students.index') }}" class="mb-4">
                <div class="flex gap-2">
                    <input type="text" name="search" value="{{ request('search') }}"
                        placeholder="Search by name or email..." class="w-full border rounded-lg px-4 py-2">

                    <button class="bg-gray-800 text-white px-4 py-2 rounded-lg">
                        Search
                    </button>
                </div>
            </form>
            @if(request('search'))
<a href="{{ route('admin.students.index') }}"
   class="bg-gray-200 text-gray-700 px-4 py-2 rounded-lg">
    Reset
</a>
@endif

            <table class="w-full text-left">
                <thead class="bg-gray-50 text-gray-500 text-sm">
                    <tr>
                        <th class="p-4">Name</th>
                        <th class="p-4">Email</th>
                        <th class="p-4">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($students as $student)
                        <tr class="border-t hover:bg-gray-50">
                            <td class="p-4 font-medium">{{ $student->name }}</td>
                            <td class="p-4 text-gray-600">{{ $student->email }}</td>

                            <td class="p-4 flex gap-3">
                                <a href="{{ route('admin.students.show', $student) }}" class="text-blue-600">View</a>
                                <a href="{{ route('admin.students.edit', $student) }}" class="text-yellow-600">Edit</a>

                                <form method="POST" action="{{ route('admin.students.destroy', $student) }}"
                                    onsubmit="return confirm('Delete this student?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="text-red-600">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="p-6 text-center text-gray-500">
                                No students found
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
</x-app-layout>
