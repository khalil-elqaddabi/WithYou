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
                        <p class="font-bold text-lg" style="font-family:Sora">WithYou</p>
                        <p class="text-sm" style="color: var(--c-text2)">Learn, grow, connect</p>
                    </div>
                </a>

                <span class="px-4 py-2 rounded-full text-xs font-semibold border inline-block mb-6"
                      style="background: var(--c-accent-bg); color: var(--c-accent); border-color:#fed7aa;">
                    ● GET STARTED
                </span>

                <h1 class="text-5xl font-bold leading-tight mb-5"
                    style="font-family:Sora">
                    Start your journey with
                    <span style="color: var(--c-accent)">WithYou</span>
                </h1>

                <p class="max-w-md leading-7 mb-10"
                   style="color: var(--c-text2)">
                    Create your account and unlock courses, exercises, workspaces, and live sessions.
                </p>

                {{-- SAME CARDS --}}
                <div class="grid gap-4 sm:grid-cols-3">

                    <div class="group rounded-2xl border p-4 shadow-sm transition cursor-pointer"
                         style="background: var(--c-surface); border-color: var(--c-border);">
                        <div class="mb-3 flex h-10 w-10 items-center justify-center rounded-xl"
                             style="background: var(--c-accent-bg); color: var(--c-accent);">
                            📚
                        </div>
                        <h3 class="text-sm font-semibold">Courses</h3>
                        <p class="text-xs" style="color: var(--c-text2)">Learn step by step</p>
                    </div>

                    <div class="group rounded-2xl border p-4 shadow-sm transition cursor-pointer"
                         style="background: var(--c-surface); border-color: var(--c-border);">
                        <div class="mb-3 flex h-10 w-10 items-center justify-center rounded-xl"
                             style="background: var(--c-purple-bg); color: var(--c-purple);">
                            💬
                        </div>
                        <h3 class="text-sm font-semibold">Workspaces</h3>
                        <p class="text-xs" style="color: var(--c-text2)">Collaborate</p>
                    </div>

                    <div class="group rounded-2xl border p-4 shadow-sm transition cursor-pointer"
                         style="background: var(--c-surface); border-color: var(--c-border);">
                        <div class="mb-3 flex h-10 w-10 items-center justify-center rounded-xl"
                             style="background: var(--c-green-bg); color: var(--c-green);">
                            🎥
                        </div>
                        <h3 class="text-sm font-semibold">Live</h3>
                        <p class="text-xs" style="color: var(--c-text2)">Join sessions</p>
                    </div>

                </div>
            </div>

            <div class="p-4 rounded-2xl border flex items-center gap-3"
                 style="background: var(--c-surface); border-color: var(--c-border);">
                <div class="w-10 h-10 flex items-center justify-center rounded-full text-white font-bold"
                     style="background: var(--c-accent);">
                    🚀
                </div>
                <div>
                    <p class="text-sm font-semibold">Ready to start?</p>
                    <p class="text-xs" style="color: var(--c-text2)">Create your account now</p>
                </div>
            </div>
        </div>

        {{-- RIGHT --}}
        <div class="flex items-center justify-center px-6 py-10">

            <div class="w-full max-w-md">

                <h2 class="text-3xl font-bold mb-2" style="font-family:Sora">
                    Create your account
                </h2>

                <p class="text-sm mb-6" style="color: var(--c-text2)">
                    Join WithYou and start learning today
                </p>

                <div class="p-7 rounded-3xl border shadow-sm"
                     style="background: var(--c-surface); border-color: var(--c-border);">

                    <form method="POST" action="{{ route('register') }}" class="space-y-5">
                        @csrf

                        {{-- NAME --}}
                        <div>
                            <label class="text-sm font-semibold block mb-2">Name</label>
                            <input type="text" name="name" value="{{ old('name') }}"
                                   class="w-full px-4 py-3 rounded-2xl border"
                                   style="background: var(--c-bg); border-color: var(--c-border)">
                        </div>

                        {{-- EMAIL --}}
                        <div>
                            <label class="text-sm font-semibold block mb-2">Email</label>
                            <input type="email" name="email" value="{{ old('email') }}"
                                   class="w-full px-4 py-3 rounded-2xl border"
                                   style="background: var(--c-bg); border-color: var(--c-border)">
                        </div>

                        {{-- PASSWORD --}}
                        <div class="relative">
                            <label class="text-sm font-semibold block mb-2">Password</label>
                            <input type="password" id="password" name="password"
                                   class="w-full px-4 py-3 rounded-2xl border pr-16"
                                   style="background: var(--c-bg); border-color: var(--c-border)">

                            <button type="button" onclick="togglePassword('password')"
                                    class="absolute right-4 top-[44px] text-sm">
                                Show
                            </button>
                        </div>

                        {{-- CONFIRM --}}
                        <div class="relative">
                            <label class="text-sm font-semibold block mb-2">Confirm Password</label>
                            <input type="password" id="password_confirmation" name="password_confirmation"
                                   class="w-full px-4 py-3 rounded-2xl border pr-16"
                                   style="background: var(--c-bg); border-color: var(--c-border)">

                            <button type="button" onclick="togglePassword('password_confirmation')"
                                    class="absolute right-4 top-[44px] text-sm">
                                Show
                            </button>
                        </div>

                        {{-- BTN --}}
                        <button type="submit"
                                class="w-full py-3 rounded-2xl font-bold text-white"
                                style="background: var(--c-accent)">
                            Register
                        </button>

                        {{-- LOGIN --}}
                        <p class="text-sm text-center" style="color: var(--c-text2)">
                            Already have an account?
                            <a href="{{ route('login') }}"
                               class="font-semibold"
                               style="color: var(--c-accent)">
                                Login
                            </a>
                        </p>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function togglePassword(id) {
            const input = document.getElementById(id);
            input.type = input.type === 'password' ? 'text' : 'password';
        }
    </script>
</x-guest-layout>
