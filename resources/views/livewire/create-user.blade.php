<div>
    <form wire:submit.prevent="register">
        <!-- Account Type -->
        <div class="mt-4">
            <x-input-label class="text-2xl" for="division" :value="__('Tipo de cuenta')" />
            <x-simple-select
                wire:model.lazy="division"
                name="division"
                id="division"
                :options="$divisions"
                value-field='id'
                text-field='name'
                placeholder="Tipo de cuenta"
                :searchable="false"
                class="py-1 block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-700 dark:text-gray-100 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
            />
            <x-input-error :messages="$errors->get('division')" class="mt-2" />
        </div>
        <div class="mt-4">
            <x-input-label class="text-2xl" for="name" :value="__('Nombre')" />
            <x-text-input id="name"  pattern="[A-Za-z]{4}" class="block mt-1 w-full dark:bg-gray-100" type="text" name="name" wire:model.lazy="name" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>
        <div class="mt-4">
            <x-input-label class="text-2xl" for="country" :value="__('País')" />
            <x-simple-select
                wire:model.lazy="country"
                name="country"
                id="country"
                :options="$countries"
                value-field='id'
                text-field='name'
                placeholder="seleccionar país"
                search-input-placeholder="seleccionar país"
                :searchable="true"
                class="py-1 block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-700 dark:text-gray-700 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
            />
            <x-input-error :messages="$errors->get('country')" class="mt-2" />
        </div>
        <div class="mt-4">
            <x-input-label class="text-2xl" for="phone" :value="__('Número de WhatsApp')" />
            <x-text-input type="number"  id="phone" min="1" max="99999999999" class="block mt-1 w-full dark:bg-gray-100" placeholder="xxxxxxxxxx"  name="phone" wire:model.lazy="phone" required autocomplete="phone" />
            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
        </div>
        <div id="register" class="lg:flex items-center justify-end mt-4">
            <a class="w-full underline text-1xl text-gray-600 dark:text-white hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('¡Ya tengo cuenta!') }}
            </a>
            <x-primary-button class="mt-3 w-full justify-end text-center rounded p-1.5 text-1xl">
                {{ __('registrarse') }}
            </x-primary-button>
            &nbsp;
            <a class="mt-3 w-50 flex justify-center text-center button text-1xl text-white dark:bg-red-600 rounded p-1.5" href="/">
                {{ __('Cancelar') }}
            </a>
        </div>
    </form>

</div>
