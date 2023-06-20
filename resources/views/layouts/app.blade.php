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

        <link rel="stylesheet" href="/css/custom.css">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        @livewireStyles
    </head>
    <body class="font-sans text-gray-900 antialiased dark:bg-black">
        @guest
            <div class="min-h-screen flex justify-center items-center">

                <div class="px-10 h-full flex flex-col justify-center w-[100%] sm:w-[90%] md:w-[70%]">
                    <div class="w-full flex justify-center items-center pb-10">
                        <a href="/">
                            <x-application-logo class="w-40 h-30 fill-current text-gray-500" />
                        </a>
                    </div>

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
