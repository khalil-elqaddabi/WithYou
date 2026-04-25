<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div>
                <h2 class="text-xl font-semibold text-gray-800">Students</h2>
                <p class="text-sm text-gray-500">Manage all students accounts</p>
            </div>

            <a href="{{ route('admin.students.create') }}"
                class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 transition">
                + Add Student
            </a>
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

        <div class="bg-white rounded-2xl shadow-sm border overflow-hidden">

            <div class="p-5 border-b bg-gray-50">
                <form method="GET" action="{{ route('admin.students.index') }}">
                    <div class="flex flex-col sm:flex-row gap-3">
                        <input type="text" name="search" value="{{ request('search') }}"
                            placeholder="Search by name or email..."
                            class="w-full border border-gray-300 rounded-xl px-4 py-2
              bg-white text-gray-900
              placeholder-gray-400
              focus:ring-2 focus:ring-indigo-500
              dark:bg-white dark:text-gray-900 dark:placeholder-gray-400">

                        <button class="bg-gray-900 text-white px-5 py-2 rounded-xl hover:bg-gray-800 transition">
                            Search
                        </button>

                        @if (request('search'))
                            <a href="{{ route('admin.students.index') }}"
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
                        <th class="p-4">Name</th>
                        <th class="p-4">Email</th>
                        <th class="p-4">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($students as $student)
                        <tr class="border-t hover:bg-gray-50 transition">
                            <td class="p-4 font-medium text-gray-900">{{ $student->name }}</td>
                            <td class="p-4 text-gray-600">{{ $student->email }}</td>

                            <td class="p-4">
                                <div class="flex gap-3 items-center">
                                    <a href="{{ route('admin.students.show', $student) }}"
                                        class="text-blue-600 hover:underline">View</a>
                                    <a href="{{ route('admin.students.edit', $student) }}"
                                        class="text-yellow-600 hover:underline">Edit</a>

                                    <form method="POST" action="{{ route('admin.students.destroy', $student) }}"
                                        onsubmit="return confirm('Delete this student?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="text-red-600 hover:underline">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="p-8 text-center text-gray-500">
                                No students found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

        </div>
    </div>
</x-app-layout>
