<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Teachers
            </h2>

            <a href="{{ route('admin.teachers.create') }}"
               class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700">
                + Add Teacher
            </a>
        </div>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if(session('success'))
                <div class="mb-4 p-3 bg-green-100 text-green-700 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white shadow-sm rounded-xl overflow-hidden">

                <table class="w-full text-left">
                    <thead class="bg-gray-50 text-gray-500 text-sm">
                        <tr>
                            <th class="p-4">Name</th>
                            <th class="p-4">Email</th>
                            <th class="p-4">Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($teachers as $teacher)
                            <tr class="border-t hover:bg-gray-50">

                                <td class="p-4 font-medium text-gray-900">
                                    {{ $teacher->name }}
                                </td>

                                <td class="p-4 text-gray-600">
                                    {{ $teacher->email }}
                                </td>

                                <td class="p-4 flex gap-2">

                                    <a href="{{ route('admin.teachers.show', $teacher) }}"
                                       class="text-blue-600 hover:underline text-sm">
                                        View
                                    </a>

                                    <a href="{{ route('admin.teachers.edit', $teacher) }}"
                                       class="text-yellow-600 hover:underline text-sm">
                                        Edit
                                    </a>

                                    <form action="{{ route('admin.teachers.destroy', $teacher) }}"
                                          method="POST"
                                          onsubmit="return confirm('Are you sure?')">
                                        @csrf
                                        @method('DELETE')

                                        <button class="text-red-600 hover:underline text-sm">
                                            Delete
                                        </button>
                                    </form>

                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="p-6 text-center text-gray-500">
                                    No teachers found.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

            </div>

        </div>
    </div>
</x-app-layout>
