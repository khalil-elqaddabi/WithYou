<x-guest-layout>
    <div class="flex items-center justify-center min-h-screen bg-gray-100">
        <div class="w-full max-w-md bg-white p-8 rounded-2xl shadow-md">

            <h2 class="text-2xl font-semibold text-center text-gray-800 mb-6">
                Welcome Back
            </h2>

            <form id="loginForm" action="{{ route('login') }}" method="POST" class="space-y-5">
                @csrf

                <div>
                    <label class="block text-sm text-gray-600 mb-1" for="email">Email</label>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        value="{{ old('email') }}"
                        class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-indigo-400 focus:outline-none"
                    >
                    <small class="error text-red-500 text-sm"></small>
                </div>

                <div class="relative">
                    <label class="block text-sm text-gray-600 mb-1" for="password">Password</label>
                    <input
                        type="password"
                        id="password"
                        name="password"
                        class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-indigo-400 focus:outline-none"
                    >

                    <button
                        type="button"
                        onclick="togglePassword('password')"
                        class="absolute right-3 top-9 text-gray-500 text-sm"
                    >
                        Show
                    </button>

                    <small class="error text-red-500 text-sm"></small>
                </div>

                <div class="flex items-center justify-between text-sm">
                    <label class="flex items-center gap-2 text-gray-600">
                        <input type="checkbox" name="remember" class="rounded border-gray-300">
                        <span>Remember me</span>
                    </label>

                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-indigo-500 hover:underline">
                            Forgot password?
                        </a>
                    @endif
                </div>

                <button
                    type="submit"
                    class="w-full bg-indigo-500 text-white py-2 rounded-lg hover:bg-indigo-600 transition duration-200"
                >
                    Login
                </button>

                <p class="text-sm text-center text-gray-600 mt-4">
                    Don’t have an account?
                    <a href="{{ route('register') }}" class="text-indigo-500 hover:underline">
                        Register
                    </a>
                </p>
            </form>

        </div>
    </div>
</x-guest-layout>
