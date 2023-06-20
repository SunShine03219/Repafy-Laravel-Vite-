<section class="w-full">
    {{-- <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form> --}}
    <div class="w-full flex flex-col md:flex-row">
        <div class="flex-none">
            @livewire('profile-avatar', ['id' => $user->id])
        </div>
        <div class="w-full">
            <form wire:submit.prevent="updateProfile">
                @csrf
                @method('patch')
                <div class="w-full flex flex-col gap-5 md:flex-row md:gap-10">
                     <!-- Division -->
                     <div class="w-full justify-center">
                        <x-input-label for="division" class="underline py-2" :value="__('Tipo de cuenta')" />
                        <span class="text-white text-center py-2">{{ $user->divisionDetail->name }}</span>
                    </div>
                    <!-- Name -->
                    <div class="w-full">
                        <x-input-label for="name" class="underline" :value="__('Nombre')" />
                        <x-text-input id="name" class="mt-1 w-full" type="text" name="name" wire:model.lazy="name" required autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>
                    <!-- Home Town -->
                    <div class="w-full">
                        <x-input-label for="zip" class="underline" :value="__('ZIP')" />
                        <x-text-input id="zip" class="mt-1 w-full" type="text" name="zip" wire:model.lazy="zip" required autocomplete="zip" />
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
