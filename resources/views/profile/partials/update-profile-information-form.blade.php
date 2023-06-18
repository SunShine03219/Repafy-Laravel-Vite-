<section>
    {{-- <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form> --}}
    <div class="flex">
        <div class="flex-none">
            @livewire('profile-avatar', ['id' => $user->id])
        </div>
        <div class="flex-1 ml-5">
            <form wire:submit.prevent="updateProfile">
                @csrf
                @method('patch')
                <div class="grid grid-cols-3 gap-4">
                     <!-- Division -->
                     <div class="mt-4">
                        <x-input-label for="division" class="underline pb-3" :value="__('Tipo de cuenta')" />
                        <span class="text-white">{{ $user->divisionDetail->name }}</span>
                    </div>
                    <!-- Name -->
                    <div class="mt-4">
                        <x-input-label for="name" class="underline" :value="__('Nombre')" />
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" wire:model.lazy="name" required autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>
                    <!-- Home Town -->
                    <div class="mt-4">
                        <x-input-label for="zip" class="underline" :value="__('ZIP')" />
                        <x-text-input id="zip" class="block mt-1 w-full" type="text" name="zip" wire:model.lazy="zip" required autocomplete="zip" />
                        <x-input-error :messages="$errors->get('zip')" class="mt-2" />
                    </div>
                    {{-- <!-- country -->
                    <div class="mt-4 pl-6">
                        <x-input-label for="country" class="underline pb-3" :value="__('País')" />
                        <span class="text-white">{{$country_name}}</span>
                    </div>
                    <!-- Division -->
                    <div class="mt-4">
                        <x-input-label for="WhatsApp" class="underline pb-3" :value="__('WhatsApp')" />
                        <span class="text-white">+{{$phonecode}} {{ $user->phone }}</span>
                    </div> --}}
                </div>

                <div class="flex float-right mt-4">
                    <x-primary-button>{{ __('Cambiar') }}</x-primary-button>
                </div>
            </form>
        </div>
    </div>
</section>
