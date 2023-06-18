<div>
    <form wire:submit.prevent="register">
        <!-- Account Type -->
        <div class="mt-4">
            <x-input-label for="division" :value="__('Tipo de cuenta')" />
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
            <x-input-label for="name" :value="__('Nombre')" />
            <x-text-input id="name" class="block mt-1 w-full dark:bg-gray-100" type="text" name="name" wire:model.lazy="name" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>
        <div class="mt-4">
            <x-input-label for="country" :value="__('país')" />
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
            <x-input-label for="phone" :value="__('Número de WhatsApp')" />
            <x-text-input type="number"  id="phone" min="1" max="9999999999" class="block mt-1 w-full dark:bg-gray-100" placeholder="xxxxxxxxxx"  name="phone" wire:model.lazy="phone" required autocomplete="phone" />
            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
        </div>
        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Ya registrado?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('registrarse') }}
            </x-primary-button>
            &nbsp;
            <a color="orange" class="button text-white dark:bg-red-600 rounded p-1.5" href="/">
                {{ __('Cancelar') }}
            </a>
        </div>
    </form>

</div>
