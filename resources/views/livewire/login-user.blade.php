{{-- <x-app-layout> --}}
    <!-- Session Status -->
    <x-auth-session-status class="mb-4 dark:bg-black" :status="session('status')" />

    <form class="w-full" method="POST" action="{{ route('login') }}">
        @csrf
        <div class="mt-4">
            <x-input-label class="text-2xl" for="phone" :value="__('Número de WhatsApp')" />
            <x-text-input type="number"  id="phone" min="0" max="99999999999" class="block mt-1 w-full dark:bg-gray-100" placeholder="xxxxxxxxxx"  name="phone" wire:model.lazy="phone" required autocomplete="phone" />
            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
        </div>
        <!-- Password -->
        <div class="mt-4">
            <x-input-label class="text-2xl" for="password" :value="__('contraseña')" />

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
                <span class="text-1xl ml-2 text-gray-600 dark:text-gray-100">{{ __('Recordar') }}</span>
            </label>
        </div>

        <div class="sm:flex items-center justify-end mt-4">
            @if (Route::has('forgot-password'))
                <a class="mb-5 w-full flex underline text-1xl text-gray-600 dark:text-gray-100 hover:text-black dark:hover:font-bold rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('forgot-password') }}">
                    {{ __('¿Olvidaste tu contraseña?') }}
                </a>
            @endif
            <x-primary-button class="mb-5 w-full justify-center flex ml-3 text-1xl">
                {{ __('Ingresar') }}
            </x-primary-button>
        </div>

        <div class="flex items-center justify-center mt-4">
            <a class="underline text-1xl text-gray-100 dark:text-gray-100 hover:text-gray-900 dark:hover:font-bold rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('register') }}">
                {{ __('¿No tienes una cuenta?') }}
            </a>
        </div>
    </form>
{{-- </x-app-layout> --}}
