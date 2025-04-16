<div class="flex flex-col gap-8 max-w-md w-full mx-auto bg-white dark:bg-zinc-900 px-8 py-10 rounded-2xl shadow-xl border border-zinc-200 dark:border-zinc-800 transition-all">

    <x-auth-header
        :title="__('Log in to your account')"
        :description="__('Enter your email and password below to log in')"
        class="text-center text-zinc-800 dark:text-zinc-100"
    />

    <!-- Session Status -->
    <x-auth-session-status
        class="text-center text-sm text-green-600 dark:text-green-400"
        :status="session('status')"
    />

    <form wire:submit="login" class="flex flex-col gap-6">

        <!-- Email Address -->
        <flux:input
            wire:model="email"
            :label="__('Email address')"
            type="email"
            required
            autofocus
            autocomplete="email"
            placeholder="email@example.com"
            class="transition focus-within:ring-2 focus-within:ring-blue-500 dark:focus-within:ring-blue-400"
        />

        <!-- Password -->
        <div class="relative">
            <flux:input
                wire:model="password"
                viewable
                :label="__('Password')"
                type="password"
                required
                autocomplete="current-password"
                placeholder="••••••••"
                class="transition focus-within:ring-2 focus-within:ring-blue-500 dark:focus-within:ring-blue-400"
            />

            @if (Route::has('password.request'))
                <flux:link
                    class="absolute end-0 top-0 text-sm text-blue-600 hover:underline dark:text-blue-400"
                    :href="route('password.request')"
                    wire:navigate
                >
                    {{ __('Forgot your password?') }}
                </flux:link>
            @endif
        </div>

        <!-- Remember Me -->
        <flux:checkbox
            wire:model="remember"
            :label="__('Remember me')"
            class="text-sm text-zinc-700 dark:text-zinc-300"
        />

        <!-- Submit -->
        <div class="flex items-center justify-center">
            <flux:button
                variant="primary"
                type="submit"
                class="w-full py-3 text-base font-semibold tracking-wide shadow-md hover:shadow-lg hover:scale-[1.02] transition-all"
            >
                {{ __('Log in') }}
            </flux:button>
        </div>
    </form>

    @if (Route::has('register'))
        <div class="mt-4 text-center text-sm text-zinc-600 dark:text-zinc-400">
            {{ __("Don't have an account?") }}
            <flux:link
                :href="route('register')"
                wire:navigate
                class="text-blue-600 hover:underline dark:text-blue-400"
            >
                {{ __('Sign up') }}
            </flux:link>
        </div>
    @endif
</div>
