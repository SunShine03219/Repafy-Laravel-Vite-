<x-app-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4 dark:bg-black" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <!-- Email Address -->
        <div class="text-red">
            <x-input-label class="dark:text-gray-500" for="email" :value="__('Email')" />
            <input id="email" class="block mt-1 w-full rounded-md dark:bg-gray-700 text-white" type="email" name="email" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>
        <div class="mt-4">
            <x-input-label for="country" :value="__('país')" />
            <x-simple-select
                wire:model.lazy="country"
                name="country"
                id="country"
                value-field='id'
                text-field='name'
                placeholder="seleccionar país"
                search-input-placeholder="Search Country"
                :searchable="true"
                class="py-1 block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-700 dark:text-gray-700 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
            />
            <x-input-error :messages="$errors->get('country')" class="mt-2" />
        </div>
        <div class="mt-4">
            <x-input-label for="phone" :value="__('Número de WhatsApp')" />
            <x-text-input id="phone" class="block mt-1 w-full dark:bg-gray-100" type="number" placeholder="xxx-xxx-xxxx"  name="phone" wire:model.lazy="phone" required autocomplete="phone" />
            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label class="dark:text-gray-500" for="password" :value="__('contraseña')" />

            <input id="password" class="block mt-1 w-full rounded-md dark:bg-gray-700 text-white"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4 ">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 dark:border-gray-100 dark:bg-gray-200 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                <span class="ml-2 text-sm text-gray-600 dark:text-gray-100">{{ __('Acuérdate de mí') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 dark:text-gray-100 hover:text-black dark:hover:font-bold rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                    {{ __('¿Olvidaste tu contraseña?') }}
                </a>
            @endif

            <x-primary-button class="ml-3">
                {{ __('Entrar a mi cuenta') }}
            </x-primary-button>
        </div>

        <div class="flex items-center justify-center mt-4">
            <a class="underline text-sm text-gray-100 dark:text-gray-100 hover:text-gray-900 dark:hover:font-bold rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('register') }}">
                {{ __('¿No tienes una cuenta?') }}
            </a>
        </div>
    </form>
</x-app-layout>
