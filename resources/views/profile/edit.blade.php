<x-app-layout>
    <x-slot name="header">
        Profile
    </x-slot>

    <div class="py-10">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">

            <div class="rounded-[28px] border p-4 sm:p-6"
                 style="background: color-mix(in srgb, var(--c-surface) 92%, transparent); border-color: var(--c-border);">
                @include('profile.partials.update-profile-information-form')
            </div>

            <div class="rounded-[28px] border p-4 sm:p-6"
                 style="background: color-mix(in srgb, var(--c-surface) 92%, transparent); border-color: var(--c-border);">
                @include('profile.partials.update-password-form')
            </div>

            <div class="rounded-[28px] border p-4 sm:p-6"
                 style="background: color-mix(in srgb, var(--c-surface) 92%, transparent); border-color: var(--c-border);">
                @include('profile.partials.delete-user-form')
            </div>

        </div>
    </div>
</x-app-layout>
