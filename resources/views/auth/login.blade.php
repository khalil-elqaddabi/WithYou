<x-guest-layout>
    <div class="grid min-h-screen lg:grid-cols-2">
        {{-- LEFT --}}
        <div class="hidden lg:flex flex-col justify-between p-12 border-r"
            style="background: var(--c-bg); border-color: var(--c-border);">

            <div>
                <a href="/" class="flex items-center gap-3 mb-16">
                    <div class="w-10 h-10 flex items-center justify-center rounded-xl text-white font-bold"
                        style="background: var(--c-accent);">
                        Y
                    </div>
                    <div>
                        <p class="font-bold text-lg" style="font-family: 'Sora', sans-serif;">WithYou</p>
                        <p class="text-sm" style="color: var(--c-text2);">Learn, grow, connect</p>
                    </div>
                </a>

                <span class="px-4 py-2 rounded-full text-xs font-semibold border inline-block mb-6"
                    style="background: var(--c-accent-bg); color: var(--c-accent); border-color: #fed7aa;">
                    ● WELCOME BACK
                </span>

                <h1 class="text-5xl font-bold leading-tight mb-5 max-w-xl"
                    style="font-family: 'Sora', sans-serif; color: var(--c-text);">
                    Continue your journey with
                    <span style="color: var(--c-accent);">WithYou</span>
                </h1>

                <p class="max-w-xl text-lg leading-8 mb-10" style="color: var(--c-text2);">
                    Access your courses, exercises, workspaces, and live sessions from one clean and focused space
                    designed for motivated learners.
                </p>

                <div class="grid gap-4 sm:grid-cols-3">

                    {{-- CARD 1 --}}
                    <div class="group rounded-2xl border p-4 shadow-sm transition duration-300 cursor-pointer"
                        style="background: var(--c-surface); border-color: var(--c-border);">

                        <div class="mb-3 flex h-10 w-10 items-center justify-center rounded-xl transition"
                            style="background: var(--c-accent-bg); color: var(--c-accent);">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.8"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 14l9-5-9-5-9 5 9 5" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 14l6.16-3.422A12.083 12.083 0 0112 20.055a12.083 12.083 0 01-6.16-9.477L12 14z" />
                            </svg>
                        </div>

                        <h3 class="text-sm font-semibold mb-1 transition" style="color: var(--c-text);">
                            Courses
                        </h3>

                        <p class="text-xs transition" style="color: var(--c-text2);">
                            Continue your lessons and stay on track.
                        </p>
                    </div>

                    {{-- CARD 2 --}}
                    <div class="group rounded-2xl border p-4 shadow-sm transition duration-300 cursor-pointer"
                        style="background: var(--c-surface); border-color: var(--c-border);">

                        <div class="mb-3 flex h-10 w-10 items-center justify-center rounded-xl"
                            style="background: var(--c-purple-bg); color: var(--c-purple);">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.8"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-4l-4 4v-4z" />
                            </svg>
                        </div>

                        <h3 class="text-sm font-semibold mb-1" style="color: var(--c-text);">
                            Workspaces
                        </h3>

                        <p class="text-xs" style="color: var(--c-text2);">
                            Collaborate with your team and mentors.
                        </p>
                    </div>

                    {{-- CARD 3 --}}
                    <div class="group rounded-2xl border p-4 shadow-sm transition duration-300 cursor-pointer"
                        style="background: var(--c-surface); border-color: var(--c-border);">

                        <div class="mb-3 flex h-10 w-10 items-center justify-center rounded-xl"
                            style="background: var(--c-green-bg); color: var(--c-green);">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.8"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14" />
                                <rect x="3" y="7" width="11" height="10" rx="2" />
                            </svg>
                        </div>

                        <h3 class="text-sm font-semibold mb-1" style="color: var(--c-text);">
                            Live rooms
                        </h3>

                        <p class="text-xs" style="color: var(--c-text2);">
                            Join calls and group sessions.
                        </p>
                    </div>

                </div>
            </div>

            <div class="p-4 rounded-2xl border flex items-center gap-3 mt-10"
                style="background: var(--c-surface); border-color: var(--c-border);">
                <div class="w-10 h-10 flex items-center justify-center rounded-full text-white font-bold"
                    style="background: var(--c-accent);">
                    KM
                </div>
                <div>
                    <p class="text-sm font-semibold" style="color: var(--c-text);">Ready to continue learning?</p>
                    <p class="text-xs" style="color: var(--c-text2);">Log in and get back to your dashboard.</p>
                </div>
            </div>
        </div>

        {{-- RIGHT --}}
        <div class="flex items-center justify-center px-6 py-10">
            <div class="w-full max-w-md">
                <div class="mb-8 lg:hidden">
                    <a href="/" class="flex items-center gap-3 mb-8">
                        <div class="w-10 h-10 flex items-center justify-center rounded-xl text-white font-bold"
                            style="background: var(--c-accent);">
                            Y
                        </div>
                        <div>
                            <p class="font-bold text-lg" style="font-family: 'Sora', sans-serif;">WithYou</p>
                            <p class="text-sm" style="color: var(--c-text2);">Learn, grow, connect</p>
                        </div>
                    </a>
                </div>

                <h2 class="text-3xl font-bold mb-2" style="font-family: 'Sora', sans-serif; color: var(--c-text);">
                    Sign in to your account
                </h2>

                <p class="text-sm mb-6" style="color: var(--c-text2);">
                    Enter your details to continue your progress.
                </p>

                <div class="p-7 rounded-3xl border shadow-sm"
                    style="background: var(--c-surface); border-color: var(--c-border); box-shadow: 0 20px 60px rgba(0,0,0,0.06);">

                    <x-auth-session-status class="mb-4" :status="session('status')" />

                    <form method="POST" action="{{ route('login') }}" class="space-y-5">
                        @csrf

                        {{-- EMAIL --}}
                        <div>
                            <label for="email" class="text-sm font-semibold block mb-2"
                                style="color: var(--c-text);">
                                Email
                            </label>
                            <input id="email" type="email" name="email" value="{{ old('email') }}" required
                                autofocus autocomplete="username" placeholder="you@example.com"
                                class="w-full px-4 py-3 rounded-2xl border outline-none"
                                style="background: var(--c-bg); border-color: var(--c-border); color: var(--c-text);">
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        {{-- PASSWORD --}}
                        <div class="relative">
                            <div class="flex items-center justify-between mb-2">
                                <label for="password" class="text-sm font-semibold block"
                                    style="color: var(--c-text);">
                                    Password
                                </label>

                                @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}" class="text-xs font-medium"
                                        style="color: var(--c-accent);">
                                        Forgot password?
                                    </a>
                                @endif
                            </div>

                            <input id="password" type="password" name="password" required
                                autocomplete="current-password" placeholder="••••••••"
                                class="w-full px-4 py-3 rounded-2xl border outline-none pr-16"
                                style="background: var(--c-bg); border-color: var(--c-border); color: var(--c-text);">

                            <button type="button" onclick="togglePassword()"
                                class="absolute right-4 top-[44px] text-sm font-medium"
                                style="color: var(--c-text2);">
                                Show
                            </button>

                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        {{-- REMEMBER --}}
                        <div class="flex items-center justify-between text-sm">
                            <label for="remember_me" class="flex items-center gap-2 cursor-pointer">
                                <input id="remember_me" type="checkbox" name="remember"
                                    class="rounded border-stone-300">
                                <span style="color: var(--c-text2);">Remember me</span>
                            </label>
                        </div>

                        {{-- BUTTON --}}
                        <button type="submit" class="w-full py-3 rounded-2xl font-bold text-white transition"
                            style="background: var(--c-accent);">
                            Log in
                        </button>

                        {{-- REGISTER --}}
                        <p class="text-sm text-center" style="color: var(--c-text2);">
                            Don’t have an account?
                            <a href="{{ route('register') }}" class="font-semibold" style="color: var(--c-accent);">
                                Register
                            </a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function togglePassword() {
            const input = document.getElementById('password');
            const button = event.currentTarget;

            if (input.type === 'password') {
                input.type = 'text';
                button.textContent = 'Hide';
            } else {
                input.type = 'password';
                button.textContent = 'Show';
            }
        }
    </script>
</x-guest-layout>
