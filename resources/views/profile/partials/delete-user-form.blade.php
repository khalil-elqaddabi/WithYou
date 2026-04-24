<section class="space-y-6">
    <header>
        <div class="inline-flex items-center gap-2 rounded-full border px-4 py-2 text-xs font-semibold mb-4"
             style="background: rgba(239, 68, 68, 0.08); color: #ef4444; border-color: rgba(239, 68, 68, 0.2);">
            <span>●</span>
            DELETE ACCOUNT
        </div>

        <h2 class="text-2xl font-bold"
            style="font-family: 'Sora', sans-serif; color: var(--c-text);">
            {{ __('Delete Account') }}
        </h2>

        <p class="mt-2 text-sm leading-6"
           style="color: var(--c-text2);">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
        </p>
    </header>

    <button
        type="button"
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
        class="inline-flex items-center rounded-2xl px-5 py-3 text-sm font-bold text-white transition"
        style="background: #ef4444;">
        {{ __('Delete Account') }}
    </button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6 sm:p-8">
            @csrf
            @method('delete')

            <div class="inline-flex items-center gap-2 rounded-full border px-4 py-2 text-xs font-semibold mb-4"
                 style="background: rgba(239, 68, 68, 0.08); color: #ef4444; border-color: rgba(239, 68, 68, 0.2);">
                <span>●</span>
                CONFIRM DELETION
            </div>

            <h2 class="text-2xl font-bold"
                style="font-family: 'Sora', sans-serif; color: var(--c-text);">
                {{ __('Are you sure you want to delete your account?') }}
            </h2>

            <p class="mt-3 text-sm leading-6"
               style="color: var(--c-text2);">
                {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
            </p>

            <div class="mt-6">
                <label for="password" class="mb-2 block text-sm font-semibold"
                       style="color: var(--c-text);">
                    {{ __('Password') }}
                </label>

                <input
                    id="password"
                    name="password"
                    type="password"
                    placeholder="{{ __('Password') }}"
                    class="block w-full rounded-2xl border px-4 py-3 outline-none transition"
                    style="background: var(--c-bg); border-color: var(--c-border); color: var(--c-text);"
                >

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end gap-3">
                <button
                    type="button"
                    x-on:click="$dispatch('close')"
                    class="inline-flex items-center rounded-2xl px-5 py-3 text-sm font-bold transition border"
                    style="background: var(--c-surface); color: var(--c-text2); border-color: var(--c-border);">
                    {{ __('Cancel') }}
                </button>

                <button
                    type="submit"
                    class="inline-flex items-center rounded-2xl px-5 py-3 text-sm font-bold text-white transition"
                    style="background: #ef4444;">
                    {{ __('Delete Account') }}
                </button>
            </div>
        </form>
    </x-modal>
</section>
