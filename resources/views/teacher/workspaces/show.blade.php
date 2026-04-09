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

                <a href="{{ route('teacher.workspaces.index') }}"
                   class="rounded bg-gray-700 px-4 py-2 text-white">
                    Back
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
