<div>
    <form wire:submit.prevent="passwordreset">
        @csrf
        {{-- <div class="mt-4">
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
        </div> --}}
        <div class="mt-4">
            <x-input-label for="phone" :value="__('Número de WhatsApp')" />
            <x-text-input type="number"  id="phone" min="1" max="99999999999" class="block mt-1 w-full dark:bg-gray-100" placeholder="xxxxxxxxxx"  name="phone" wire:model.lazy="phone" required autocomplete="phone" />
            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
        </div>
        <div class="flex items-center justify-end mt-4">
            <x-danger-button>
                {{ __('enviar contraseña por whatsapp') }}
            </x-danger-button>
        </div>
    </form>
</div>
