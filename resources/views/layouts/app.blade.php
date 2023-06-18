<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"  class="dark">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Bellic Boxing') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="icon" href="/images/favicon.png">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        @livewireStyles
    </head>
    <body class="font-sans text-gray-900 antialiased dark:bg-black">
        @guest
            <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
                <div>
                    <a href="/">
                        <x-application-logo class="w-40 h-30 fill-current text-gray-500" />
                    </a>
                </div>

                <div class="w-full sm:max-w-md mt-6 px-6 py-4 shadow-2xl sm:rounded-lg border-solid border border-gray-500">
                    {{ $slot }}
                    @livewireScripts
                </div>
            </div>
        @endguest

        @auth
            <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
                @include('layouts.navigation')

                <!-- Page Heading -->
                @if (isset($header))
                    <header class= "dark:bg-gray-800 shadow">
                        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                            {{ $header }}
                        </div>
                    </header>
                @endif

                <!-- Page Content -->
                <main>
                    {{ $slot }}
                    @livewireScripts
                </main>
            </div>
        @endauth
        <x-notification />
        {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script> --}}
       {{-- <script>
            toastr.options = {
                "closeButton": true,
                "progressBar": true,
            }

            window.addEventListener('alert',
                event => {
                    toastr[event.detail.type](event.detail.message, event.detail.title ?? '')
                });

        </script> --}}
        @stack('scripts')

    </body>
</html>
