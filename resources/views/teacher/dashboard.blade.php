<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Teacher Dashboard
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow-sm sm:rounded-lg">
                <p class="mb-4">Welcome Teacher</p>

                <a href="{{ route('teacher.workspaces.index') }}" class="px-4 py-2 bg-blue-600 text-white rounded">
                    Manage Workspaces
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
