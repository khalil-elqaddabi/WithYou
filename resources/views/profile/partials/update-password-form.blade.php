<section class="space-y-6">
    <header>
        <div class="inline-flex items-center gap-2 rounded-full border px-4 py-2 text-xs font-semibold mb-4"
             style="background: var(--c-accent-bg); color: var(--c-accent); border-color: #fed7aa;">
            <span>●</span>
            UPDATE PASSWORD
        </div>

        <h2 class="text-2xl font-bold"
            style="font-family: 'Sora', sans-serif; color: var(--c-text);">
            {{ __('Update Password') }}
        </h2>

        <p class="mt-2 text-sm leading-6"
           style="color: var(--c-text2);">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="space-y-6">
        @csrf
        @method('put')

        {{-- CURRENT PASSWORD --}}
        <div>
            <label for="update_password_current_password"
                   class="mb-2 block text-sm font-semibold"
                   style="color: var(--c-text);">
                {{ __('Current Password') }}
            </label>

            <input
                id="update_password_current_password"
                name="current_password"
                type="password"
                autocomplete="current-password"
                class="block w-full rounded-2xl border px-4 py-3 outline-none transition"
                style="background: var(--c-bg); border-color: var(--c-border); color: var(--c-text);"
            />

            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>

        {{-- NEW PASSWORD --}}
        <div>
            <label for="update_password_password"
                   class="mb-2 block text-sm font-semibold"
                   style="color: var(--c-text);">
                {{ __('New Password') }}
            </label>

            <input
                id="update_password_password"
                name="password"
                type="password"
                autocomplete="new-password"
                class="block w-full rounded-2xl border px-4 py-3 outline-none transition"
                style="background: var(--c-bg); border-color: var(--c-border); color: var(--c-text);"
            />

            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>

        {{-- CONFIRM PASSWORD --}}
        <div>
            <label for="update_password_password_confirmation"
                   class="mb-2 block text-sm font-semibold"
                   style="color: var(--c-text);">
                {{ __('Confirm Password') }}
            </label>

            <input
                id="update_password_password_confirmation"
                name="password_confirmation"
                type="password"
                autocomplete="new-password"
                class="block w-full rounded-2xl border px-4 py-3 outline-none transition"
                style="background: var(--c-bg); border-color: var(--c-border); color: var(--c-text);"
            />

            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>

        {{-- BUTTON --}}
        <div class="flex items-center gap-4">
            <button
                type="submit"
                class="inline-flex items-center rounded-2xl px-5 py-3 text-sm font-bold text-white transition"
                style="background: var(--c-accent);">
                {{ __('Save') }}
            </button>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm font-medium"
                    style="color: var(--c-text2);"
                >
                    {{ __('Saved.') }}
                </p>
            @endif
        </div>
    </form>
</section>
