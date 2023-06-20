<section>
    <header class="mb-5">
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('cambiar el número de whatsapp') }}
        </h2>
    </header>

    <div class="flex flex-row">
        <form wire:submit.prevent="updateWhatsapp" class="w-full">
            <div class="w-full flex gap-10 max-sm:flex-col">
                <div class="w-full">
                    <x-input-label for="country" :value="__('País')" />
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
                <div class="w-full">
                    <x-input-label for="phone" :value="__('Número de WhatsApp')" />
                    <x-text-input type="number"  id="phone" min="1" max="9999999999" class="block mt-1 w-full dark:bg-gray-100" placeholder="xxxxxxxxxx"  name="phone" wire:model.lazy="phone" required autocomplete="phone" />
                    <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                </div>
            </div>
            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="ml-4">
                    {{ __('Cambiar') }}
                </x-primary-button>
            </div>
        </form>

    </div>

</section>
