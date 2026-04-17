<x-guest-layout>
    <div class="flex items-center justify-center min-h-screen bg-gray-100">
        <div class="w-full max-w-md bg-white p-8 rounded-2xl shadow-md">

            <h2 class="text-2xl font-semibold text-center text-gray-800 mb-6">
                Create Account
            </h2>

            <form id="registerForm" action="{{ route('register') }}" method="POST" class="space-y-5">
                @csrf

                <!-- Name -->
                <div>
                    <label class="block text-sm text-gray-600 mb-1">Name</label>
                    <input type="text" id="name" name="name"
                        value="{{ old('name') }}"
                        class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-indigo-400 focus:outline-none">
                    <small class="error text-red-500 text-sm"></small>
                </div>

                <!-- Email -->
                <div>
                    <label class="block text-sm text-gray-600 mb-1">Email</label>
                    <input type="email" id="email" name="email"
                        value="{{ old('email') }}"
                        class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-indigo-400 focus:outline-none">
                    <small class="error text-red-500 text-sm"></small>
                </div>

                <!-- Password -->
                <div class="relative">
                    <label class="block text-sm text-gray-600 mb-1">Password</label>
                    <input type="password" id="password" name="password"
                        class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-indigo-400 focus:outline-none">

                    <button type="button" onclick="togglePassword('password')"
                        class="absolute right-3 top-9 text-gray-500 text-sm">
                        Show
                    </button>

                    <small class="error text-red-500 text-sm"></small>
                </div>

                <!-- Confirm Password -->
                <div class="relative">
                    <label class="block text-sm text-gray-600 mb-1">Confirm Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation"
                        class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-indigo-400 focus:outline-none">

                    <button type="button" onclick="togglePassword('password_confirmation')"
                        class="absolute right-3 top-9 text-gray-500 text-sm">
                        Show
                    </button>

                    <small class="error text-red-500 text-sm"></small>
                </div>

                <!-- Button -->
                <button type="submit"
                    class="w-full bg-indigo-500 text-white py-2 rounded-lg hover:bg-indigo-600 transition duration-200">
                    Register
                </button>

                <!-- Link -->
                <p class="text-sm text-center text-gray-600 mt-4">
                    Already have an account?
                    <a href="{{ route('login') }}" class="text-indigo-500 hover:underline">
                        Login
                    </a>
                </p>
            </form>

        </div>
    </div>
</x-guest-layout>
