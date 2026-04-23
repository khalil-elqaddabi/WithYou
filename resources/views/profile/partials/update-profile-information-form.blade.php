<section class="rounded-[24px] border p-6 sm:p-8"
         style="background: var(--c-surface); border-color: var(--c-border); box-shadow: 0 10px 30px rgba(0,0,0,0.04);">
    <header class="mb-6">
        <div class="inline-flex items-center gap-2 rounded-full border px-4 py-2 text-xs font-semibold mb-4"
             style="background: var(--c-accent-bg); color: var(--c-accent); border-color: #fed7aa;">
            <span>●</span>
            PROFILE INFORMATION
        </div>

        <h2 class="text-2xl font-bold"
            style="font-family: 'Sora', sans-serif; color: var(--c-text);">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-2 text-sm leading-6"
           style="color: var(--c-text2);">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="space-y-6">
        @csrf
        @method('patch')

        <div>
            <label for="name" class="mb-2 block text-sm font-semibold"
                   style="color: var(--c-text);">
                {{ __('Name') }}
            </label>

            <input
                id="name"
                name="name"
                type="text"
                value="{{ old('name', $user->name) }}"
                required
                autofocus
                autocomplete="name"
                class="block w-full rounded-2xl border px-4 py-3 outline-none transition"
                style="background: var(--c-bg); border-color: var(--c-border); color: var(--c-text);"
            />

            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <label for="email" class="mb-2 block text-sm font-semibold"
                   style="color: var(--c-text);">
                {{ __('Email') }}
            </label>

            <input
                id="email"
                name="email"
                type="email"
                value="{{ old('email', $user->email) }}"
                required
                autocomplete="username"
                class="block w-full rounded-2xl border px-4 py-3 outline-none transition"
                style="background: var(--c-bg); border-color: var(--c-border); color: var(--c-text);"
            />

            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div class="mt-4 rounded-2xl border p-4"
                     style="background: var(--c-bg); border-color: var(--c-border);">
                    <p class="text-sm leading-6" style="color: var(--c-text2);">
                        {{ __('Your email address is unverified.') }}

                        <button
                            form="send-verification"
                            class="ml-1 font-semibold underline"
                            style="color: var(--c-accent);">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-3 text-sm font-medium"
                           style="color: var(--c-green);">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <button type="submit"
                    class="inline-flex items-center rounded-2xl px-5 py-3 text-sm font-bold text-white transition"
                    style="background: var(--c-accent);">
                {{ __('Save') }}
            </button>

            @if (session('status') === 'profile-updated')
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
