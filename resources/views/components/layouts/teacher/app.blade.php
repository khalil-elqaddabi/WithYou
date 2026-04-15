<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Teacher Panel' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gray-100">
    <div class="min-h-screen flex">

        <!-- Sidebar -->
        <aside class="w-64 bg-white shadow-md hidden md:flex md:flex-col">
            <div class="p-6 border-b">
                <h2 class="text-xl font-bold text-gray-800">WhiteYou</h2>
                <p class="text-sm text-gray-500 mt-1">Teacher Panel</p>
            </div>

            <nav class="flex-1 p-4 space-y-2">
                <a href="{{ route('teacher.dashboard') }}"
                   class="block px-4 py-2 rounded-lg hover:bg-blue-50 hover:text-blue-600">
                    Dashboard
                </a>

                <a href="{{ route('teacher.workspaces.index') }}"
                   class="block px-4 py-2 rounded-lg hover:bg-blue-50 hover:text-blue-600">
                    Workspaces
                </a>

                <a href="{{ route('teacher.workspaces.create') }}"
                   class="block px-4 py-2 rounded-lg hover:bg-blue-50 hover:text-blue-600">
                    Create Workspace
                </a>
            </nav>

            <div class="p-4 border-t">
                <p class="text-sm text-gray-600 mb-3">{{ auth()->user()->name }}</p>

                <a href="{{ route('profile.edit') }}"
                   class="block text-sm text-gray-700 hover:text-blue-600 mb-2">
                    Profile
                </a>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="text-sm text-red-600 hover:underline">
                        Logout
                    </button>
                </form>
            </div>
        </aside>

        <!-- Main -->
        <div class="flex-1 flex flex-col">
            <header class="bg-white shadow-sm px-6 py-4 flex items-center justify-between">
                <div>
                    <h1 class="text-2xl font-bold text-gray-800">
                        {{ $header ?? 'Teacher Space' }}
                    </h1>
                    @isset($subheader)
                        <p class="text-sm text-gray-500 mt-1">{{ $subheader }}</p>
                    @endisset
                </div>
            </header>

            <main class="p-6">
                {{ $slot }}
            </main>
        </div>
    </div>
</body>
</html>
