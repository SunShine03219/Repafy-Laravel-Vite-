<div>
    <x-slot name="header">
        <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Perfil') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto px-6 lg:px-8 space-y-6">
            <div class="bg-white dark:bg-gray-800 w-full shadow p-4 sm:p-8 sm:rounded-lg">
                @include('profile.partials.update-profile-information-form')
                {{-- @livewire('review-lists') --}}
            </div>
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                @include('profile.partials.update-whatsapp-form')
            </div>
        </div>
    </div>
</div>
