<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Repafy') }}</title>
    <meta name="description"
        content="Repafy - Pide y envía paquetes a tu ubicación(Repafy is a platform for easy and convenient order and delivery of packages to your desired location.)">
    <link rel="canonical" href="https://www.repafy.com/">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link rel="icon" href="/images/favicon.png">

    <link rel="stylesheet" href="/css/custom.css">
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="dark:bg-black">
    <!-- <div class="relative min-h-screen selection:bg-red-500 selection:text-blac bg-no-repeat dark:bg-black"> -->
    <!-- <header class="max-w-10xl mx-auto px-4 sm:px-6 lg:px-8"> -->
    <header>
        <nav x-data="{ open: false }" class="w-full border-b border-gray-100 dark:border-gray-700">
            <!-- Primary Navigation Menu -->
            <div class="w-full px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-20">
                    <div class="flex">
                        <!-- Logo -->
                        <div class="shrink-0 flex items-center">
                            <a href="/">
                                <x-application-logo class="block h-[3rem] w-auto fill-current" />
                            </a>
                        </div>
                    </div>
                    <div class="md:flex md:items-center">
                        <a href="{{ route('delete') }}"
                        class="bg-black cursor-default	 mr-2 font-semibold inline-flex items-center p-3 text-sm sm:text-2xl focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out rounded-md">
                        Delete</a>
                    </div>
                    <div class="hidden md:flex md:items-center">
                        <a href="{{ route('login') }}"
                        class="bg-indigo-600 mr-2 font-semibold inline-flex items-center p-3 text-3xl sm:text-2xl text-white focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out rounded-md">
                        Ingresar</a>
                        <a href="{{ route('register') }}" class="bg-red-500 font-semibold inline-flex items-center p-3 text-3xl sm:text-2xl text-white focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out rounded-md">registrarse</a>
                    </div>
                    <!-- Hamburger -->
                    <div class="flex items-center md:hidden">
                        <button @click="open = ! open" class="inline-flex items-center justify-end rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Responsive Navigation Menu -->
            <div :class="{'block': open, 'hidden': ! open}" class="hidden md:hidden">
                <!-- Responsive Settings Options -->
                <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
                    <div class="mt-3 space-y-1 text-white">
                        <x-responsive-nav-link class="bg-indigo-600 dark:text-white" :href="route('login')">
                            {{ __('Ingresar') }}
                        </x-responsive-nav-link>
                        <x-responsive-nav-link class="bg-red-500 dark:text-white" :href="route('register')">
                            {{ __('registrarse') }}
                        </x-responsive-nav-link>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <div class="lg:flex lg:flex-row md:flex md:flex-col border-b border-gray-100 dark:border-gray-700">
        <div class="w-full py-3 md:p-20">
            <img src="/images/homepage.png"/>
        </div>
        <div class="w-full text-white p-10 lg:mt-20 lg:leading-10">
            <p class="text-justify lg:mt-5 lg:leading-10 sm:text-1rem lg:text-3xl md:text-2xl">
                Repafy es una plataforma para ordenar y entregar paquetes de manera fácil y conveniente
                a la ubicación deseada.
            </p>
            <p class="text-justify lg:mt-5 lg:leading-10 sm:text-1rem lg:text-3xl md:text-2xl">
                Ordene y envíe paquetes a la ubicación deseada con solo unos pocos clics.
            </p>
            <p class="text-justify lg:mt-5 lg:leading-10 sm:text-1rem lg:text-3xl md:text-2xl">
                Experimente los servicios de entrega de última milla sin complicaciones con Repafy.</p>
        </div>
    </div>
    <footer class="text-1xl text-center text-white lg:text-2xl">
        <!--Copyright section-->
        <div class=" p-4 text-center bg:text-white">
            <a href="#" class="text-blue-300">Cómo funciona &nbsp; |</a>
            <a href="#" class="text-blue-300"> &nbsp; Términos &nbsp;|</a>
            <a href="#" class="text-blue-300">&nbsp; Privacidad &nbsp;</a>
            <span class="text-white">derechos de autor(c) 2023. Repafy.com </span>
        </div>
      </footer>
</body>

</html>
