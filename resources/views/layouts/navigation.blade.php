<nav x-data="{ open: false }" class="sticky top-0 z-50 border-b backdrop-blur"
    style="background: color-mix(in srgb, var(--c-bg) 88%, transparent); border-color: var(--c-border);">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-[72px]">

            {{-- LEFT --}}
            <div class="flex items-center gap-8">
                {{-- Logo --}}
                <div class="shrink-0 flex items-center">
                    <a href="{{ auth()->user()->role === 'teacher' ? route('teacher.dashboard') : route('student.dashboard') }}"
                        class="flex items-center gap-3 text-decoration-none">
                        <div class="w-10 h-10 rounded-xl flex items-center justify-center text-white font-extrabold shadow-sm"
                            style="background: var(--c-accent);">
                            Y
                        </div>
                        <div class="hidden sm:block">
                            <p class="font-bold text-base leading-none"
                                style="font-family: 'Sora', sans-serif; color: var(--c-text);">
                                WithYou
                            </p>
                            <p class="text-xs mt-1" style="color: var(--c-text2);">
                                {{ auth()->user()->role === 'teacher' ? 'Teacher space' : 'Student space' }}
                            </p>
                        </div>
                    </a>
                </div>

                {{-- Desktop links --}}
                <div class="hidden sm:flex items-center gap-3">
                    <a href="{{ auth()->user()->role === 'teacher' ? route('teacher.dashboard') : route('student.dashboard') }}"
                        class="inline-flex items-center px-4 py-2 rounded-xl text-sm font-semibold transition"
                        style="
                           background: {{ request()->routeIs(auth()->user()->role === 'teacher' ? 'teacher.dashboard' : 'student.dashboard') ? 'var(--c-accent-bg)' : 'transparent' }};
                           color: {{ request()->routeIs(auth()->user()->role === 'teacher' ? 'teacher.dashboard' : 'student.dashboard') ? 'var(--c-accent)' : 'var(--c-text2)' }};
                           border: 1px solid {{ request()->routeIs(auth()->user()->role === 'teacher' ? 'teacher.dashboard' : 'student.dashboard') ? '#fed7aa' : 'transparent' }};
                       ">
                        Dashboard
                    </a>
                </div>
            </div>

            {{-- RIGHT --}}
            <div class="hidden sm:flex items-center gap-3">
                <a href="{{ route('profile.edit') }}" class="px-4 py-2 rounded-xl text-sm font-medium transition border"
                    style="border-color: var(--c-border); color: var(--c-text2); background: var(--c-surface);">
                    Profile
                </a>


                <div class="flex items-center gap-3 px-3 py-2 rounded-xl border"
                    style="border-color: var(--c-border); background: var(--c-surface);">
                    <div class="w-9 h-9 rounded-full flex items-center justify-center text-white text-sm font-bold"
                        style="background: var(--c-accent);">
                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                    </div>

                    <div class="leading-tight">
                        <div class="text-sm font-semibold" style="color: var(--c-text);">
                            {{ Auth::user()->name }}
                        </div>
                        <div class="text-xs" style="color: var(--c-text2);">
                            {{ Auth::user()->email }}
                        </div>
                    </div>

                </div>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="px-4 py-2 rounded-xl text-sm font-semibold text-white transition"
                        style="background: var(--c-accent);">
                        Log out
                    </button>
                </form>
                <button onclick="toggleTheme()"
                    class="w-10 h-10 rounded-xl border flex items-center justify-center transition"
                    style="border-color: var(--c-border); background: var(--c-surface); color: var(--c-text2);">
                    🌙
                </button>
            </div>

            {{-- Hamburger --}}
            <div class="flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-xl border transition"
                    style="border-color: var(--c-border); background: var(--c-surface); color: var(--c-text2);">
                    <svg class="h-5 w-5" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    {{-- Mobile menu --}}
    <div x-show="open" x-transition class="sm:hidden border-t"
        style="border-color: var(--c-border); background: var(--c-bg);">

        <div class="px-4 pt-4 pb-3 space-y-2">
            <a href="{{ auth()->user()->role === 'teacher' ? route('teacher.dashboard') : route('student.dashboard') }}"
                class="block w-full px-4 py-3 rounded-xl text-sm font-semibold"
                style="
                   background: {{ request()->routeIs(auth()->user()->role === 'teacher' ? 'teacher.dashboard' : 'student.dashboard') ? 'var(--c-accent-bg)' : 'var(--c-surface)' }};
                   color: {{ request()->routeIs(auth()->user()->role === 'teacher' ? 'teacher.dashboard' : 'student.dashboard') ? 'var(--c-accent)' : 'var(--c-text)' }};
                   border: 1px solid var(--c-border);
               ">
                Dashboard
            </a>

            <a href="{{ route('profile.edit') }}" class="block w-full px-4 py-3 rounded-xl text-sm font-medium border"
                style="border-color: var(--c-border); background: var(--c-surface); color: var(--c-text);">
                Profile
            </a>
        </div>

        <div class="px-4 pb-4">
            <div class="rounded-2xl border p-4 mb-3"
                style="border-color: var(--c-border); background: var(--c-surface);">
                <div class="font-semibold text-sm" style="color: var(--c-text);">
                    {{ Auth::user()->name }}
                </div>
                <div class="text-xs mt-1 break-all" style="color: var(--c-text2);">
                    {{ Auth::user()->email }}
                </div>
            </div>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                    class="block w-full text-center px-4 py-3 rounded-xl text-sm font-semibold text-white"
                    style="background: var(--c-accent);">
                    Log out
                </button>
            </form>
        </div>
    </div>
</nav>
