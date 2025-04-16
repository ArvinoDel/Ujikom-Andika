<div class="flex flex-col gap-8 max-w-md w-full mx-auto bg-white dark:bg-zinc-900 px-8 py-10 rounded-2xl shadow-xl border border-zinc-200 dark:border-zinc-800 transition-all">

    <x-auth-header
        :title="__('Create an account')"
        :description="__('Enter your details below to create your account')"
        class="text-center text-zinc-800 dark:text-zinc-100"
    />

    <!-- Session Status -->
    <x-auth-session-status
        class="text-center text-sm text-green-600 dark:text-green-400"
        :status="session('status')"
    />

    <form wire:submit="register" class="flex flex-col gap-6">

        <!-- Name -->
        <flux:input
            wire:model="name"
            :label="__('Name')"
            type="text"
            required
            autofocus
            autocomplete="name"
            placeholder="Full name"
            class="transition focus-within:ring-2 focus-within:ring-blue-500 dark:focus-within:ring-blue-400"
        />

        <!-- Email Address -->
        <flux:input
            wire:model="email"
            :label="__('Email address')"
            type="email"
            required
            autocomplete="email"
            placeholder="email@example.com"
            class="transition focus-within:ring-2 focus-within:ring-blue-500 dark:focus-within:ring-blue-400"
        />

        <!-- Password -->
        <flux:input
            wire:model="password"
            viewable
            :label="__('Password')"
            type="password"
            required
            autocomplete="new-password"
            placeholder="••••••••"
            class="transition focus-within:ring-2 focus-within:ring-blue-500 dark:focus-within:ring-blue-400"
        />

        <!-- Confirm Password -->
        <flux:input
            wire:model="password_confirmation"
            viewable
            :label="__('Confirm password')"
            type="password"
            required
            autocomplete="new-password"
            placeholder="••••••••"
            class="transition focus-within:ring-2 focus-within:ring-blue-500 dark:focus-within:ring-blue-400"
        />

        <div class="flex items-center justify-center">
            <flux:button
                type="submit"
                variant="primary"
                class="w-full py-3 text-base font-semibold tracking-wide shadow-md hover:shadow-lg hover:scale-[1.02] transition-all"
            >
                {{ __('Create account') }}
            </flux:button>
        </div>
    </form>

    <div class="mt-4 text-center text-sm text-zinc-600 dark:text-zinc-400">
        {{ __('Already have an account?') }}
        <flux:link
            :href="route('login')"
            wire:navigate
            class="text-blue-600 hover:underline dark:text-blue-400"
        >
            {{ __('Log in') }}
        </flux:link>
    </div>
</div>
