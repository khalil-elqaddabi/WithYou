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
                    ● RESET PASSWORD
                </span>

                <h1 class="text-5xl font-bold leading-tight mb-5 max-w-xl"
                    style="font-family: 'Sora', sans-serif; color: var(--c-text);">
                    Create a new password for
                    <span style="color: var(--c-accent);">your account</span>
                </h1>

                <p class="max-w-xl text-lg leading-8 mb-10"
                   style="color: var(--c-text2);">
                    Choose a strong new password to secure your account and continue your learning journey with confidence.
                </p>

                <div class="grid gap-4 sm:grid-cols-3">
                    <div class="group rounded-2xl border p-4 shadow-sm transition duration-300 cursor-pointer"
                         style="background: var(--c-surface); border-color: var(--c-border);">
                        <div class="mb-3 flex h-10 w-10 items-center justify-center rounded-xl"
                             style="background: var(--c-accent-bg); color: var(--c-accent);">
                            🔒
                        </div>
                        <h3 class="text-sm font-semibold mb-1" style="color: var(--c-text);">
                            Secure
                        </h3>
                        <p class="text-xs" style="color: var(--c-text2);">
                            Protect your account with a stronger password.
                        </p>
                    </div>

                    <div class="group rounded-2xl border p-4 shadow-sm transition duration-300 cursor-pointer"
                         style="background: var(--c-surface); border-color: var(--c-border);">
                        <div class="mb-3 flex h-10 w-10 items-center justify-center rounded-xl"
                             style="background: var(--c-purple-bg); color: var(--c-purple);">
                            ⚡
                        </div>
                        <h3 class="text-sm font-semibold mb-1" style="color: var(--c-text);">
                            Fast
                        </h3>
                        <p class="text-xs" style="color: var(--c-text2);">
                            Reset your password in just a few seconds.
                        </p>
                    </div>

                    <div class="group rounded-2xl border p-4 shadow-sm transition duration-300 cursor-pointer"
                         style="background: var(--c-surface); border-color: var(--c-border);">
                        <div class="mb-3 flex h-10 w-10 items-center justify-center rounded-xl"
                             style="background: var(--c-green-bg); color: var(--c-green);">
                            ✅
                        </div>
                        <h3 class="text-sm font-semibold mb-1" style="color: var(--c-text);">
                            Continue
                        </h3>
                        <p class="text-xs" style="color: var(--c-text2);">
                            Get back to your courses and workspace.
                        </p>
                    </div>
                </div>
            </div>

            <div class="p-4 rounded-2xl border flex items-center gap-3 mt-10"
                 style="background: var(--c-surface); border-color: var(--c-border);">
                <div class="w-10 h-10 flex items-center justify-center rounded-full text-white font-bold"
                     style="background: var(--c-accent);">
                    Y
                </div>
                <div>
                    <p class="text-sm font-semibold" style="color: var(--c-text);">Almost done</p>
                    <p class="text-xs" style="color: var(--c-text2);">Set your new password and log back in.</p>
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

                <h2 class="text-3xl font-bold mb-2"
                    style="font-family: 'Sora', sans-serif; color: var(--c-text);">
                    Reset your password
                </h2>

                <p class="text-sm mb-6" style="color: var(--c-text2);">
                    Enter your email and choose a new password.
                </p>

                <div class="p-7 rounded-3xl border shadow-sm"
                     style="background: var(--c-surface); border-color: var(--c-border); box-shadow: 0 20px 60px rgba(0,0,0,0.06);">

                    <form method="POST" action="{{ route('password.store') }}" class="space-y-5">
                        @csrf

                        <input type="hidden" name="token" value="{{ $request->route('token') }}">

                        {{-- EMAIL --}}
                        <div>
                            <label for="email" class="text-sm font-semibold block mb-2" style="color: var(--c-text);">
                                Email
                            </label>
                            <input
                                id="email"
                                type="email"
                                name="email"
                                value="{{ old('email', $request->email) }}"
                                required
                                autofocus
                                autocomplete="username"
                                placeholder="you@example.com"
                                class="w-full px-4 py-3 rounded-2xl border outline-none"
                                style="background: var(--c-bg); border-color: var(--c-border); color: var(--c-text);"
                            >
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        {{-- PASSWORD --}}
                        <div class="relative">
                            <label for="password" class="text-sm font-semibold block mb-2" style="color: var(--c-text);">
                                New password
                            </label>
                            <input
                                id="password"
                                type="password"
                                name="password"
                                required
                                autocomplete="new-password"
                                placeholder="••••••••"
                                class="w-full px-4 py-3 rounded-2xl border outline-none pr-16"
                                style="background: var(--c-bg); border-color: var(--c-border); color: var(--c-text);"
                            >

                            <button
                                type="button"
                                onclick="togglePassword('password', this)"
                                class="absolute right-4 top-[44px] text-sm font-medium"
                                style="color: var(--c-text2);">
                                Show
                            </button>

                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        {{-- CONFIRM PASSWORD --}}
                        <div class="relative">
                            <label for="password_confirmation" class="text-sm font-semibold block mb-2" style="color: var(--c-text);">
                                Confirm password
                            </label>
                            <input
                                id="password_confirmation"
                                type="password"
                                name="password_confirmation"
                                required
                                autocomplete="new-password"
                                placeholder="••••••••"
                                class="w-full px-4 py-3 rounded-2xl border outline-none pr-16"
                                style="background: var(--c-bg); border-color: var(--c-border); color: var(--c-text);"
                            >

                            <button
                                type="button"
                                onclick="togglePassword('password_confirmation', this)"
                                class="absolute right-4 top-[44px] text-sm font-medium"
                                style="color: var(--c-text2);">
                                Show
                            </button>

                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                        </div>

                        {{-- BUTTON --}}
                        <button
                            type="submit"
                            class="w-full py-3 rounded-2xl font-bold text-white transition"
                            style="background: var(--c-accent);">
                            Reset password
                        </button>

                        <p class="text-sm text-center" style="color: var(--c-text2);">
                            Remembered your password?
                            <a href="{{ route('login') }}" class="font-semibold" style="color: var(--c-accent);">
                                Back to login
                            </a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function togglePassword(id, button) {
            const input = document.getElementById(id);

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
