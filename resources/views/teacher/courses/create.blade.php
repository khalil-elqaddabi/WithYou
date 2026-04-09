<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Create Course - {{ $workspace->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm rounded-lg p-6">
                <form method="POST" action="{{ route('teacher.workspaces.courses.store', $workspace) }}">
                    @csrf

                    <div class="mb-4">
                        <label class="block mb-1">Title</label>
                        <input type="text" name="title" value="{{ old('title') }}" class="w-full border rounded p-2">
                        @error('title')
                            <p class="text-red-600 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block mb-1">Order</label>
                        <input type="number" name="order_index" value="{{ old('order_index', 0) }}" class="w-full border rounded p-2">
                        @error('order_index')
                            <p class="text-red-600 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <button class="px-4 py-2 bg-blue-600 text-white rounded">
                        Save
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
