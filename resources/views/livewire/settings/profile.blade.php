<section class="w-full">
    @include('partials.settings-heading')

    <x-settings.layout :heading="__('Profile')" :subheading="__('Update your name and email address')">
        <form wire:submit="updateProfileInformation" class="my-6 w-full space-y-6">
            <flux:input wire:model="name" :label="__('Name')" type="text" required autofocus autocomplete="name" />

            <div>
                <flux:input wire:model="email" :label="__('Email')" type="email" required autocomplete="email" />
                <div class="mb-4">
                    <label for="role" class="block text-sm font-medium text-gray-700">{{ __('Role') }}</label>
                    <select wire:model="role" id="role"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                        @if ($user->role === 'siswa') disabled @endif
                        >
                        <option value="">{{ __('-- Pilih Role --') }}</option>
                        <option value="admin" @if ($user->role === 'admin') selected @endif>{{ __('Admin') }}</option>
                        <option value="siswa" @if ($user->role === 'siswa') selected @endif>{{ __('Siswa') }}</option>
                    </select>
                    @error('role') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>



                @if (auth()->user() instanceof \Illuminate\Contracts\Auth\MustVerifyEmail &&
                !auth()->user()->hasVerifiedEmail())
                <div>
                    <flux:text class="mt-4">
                        {{ __('Your email address is unverified.') }}

                        <flux:link class="text-sm cursor-pointer" wire:click.prevent="resendVerificationNotification">
                            {{ __('Click here to re-send the verification email.') }}
                        </flux:link>
                    </flux:text>

                    @if (session('status') === 'verification-link-sent')
                    <flux:text class="mt-2 font-medium !dark:text-green-400 !text-green-600">
                        {{ __('A new verification link has been sent to your email address.') }}
                    </flux:text>
                    @endif
                </div>
                @endif
            </div>

            <div class="flex items-center gap-4">
                <div class="flex items-center justify-end">
                    <flux:button variant="primary" type="submit" class="w-full">{{ __('Save') }}</flux:button>
                </div>

                <x-action-message class="me-3" on="profile-updated">
                    {{ __('Saved.') }}
                </x-action-message>
            </div>
        </form>

        @if ($user->role === "siswa")
        @livewire('edit_siswa')
        @endif

        <livewire:settings.delete-user-form />
    </x-settings.layout>
</section>