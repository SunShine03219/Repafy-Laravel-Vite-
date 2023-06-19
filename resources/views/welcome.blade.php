<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Repafy') }}</title>
        <meta name="description" content="Repafy - Pide y envía paquetes a tu ubicación(Repafy is a platform for easy and convenient order and delivery of packages to your desired location.)">
        <link rel="canonical" href="https://www.repafy.com/">
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link rel="icon" href="/images/favicon.png">
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

    </head>
    <body class="dark:bg-black">
        <!-- <div class="relative min-h-screen selection:bg-red-500 selection:text-blac bg-no-repeat dark:bg-black"> -->
            <!-- <header class="max-w-10xl mx-auto px-4 sm:px-6 lg:px-8"> -->
            <header>
                <nav class="mx-auto flex max-w-7xl items-center justify-between p-6 lg:px-4" aria-label="Global">
                <div class="flex lg:flex-1">
                    <a href="#">
                        <img src="/images/logo.png" class="sm:h-10 lg:h-20" />
                    </a>
                </div>
                    <!-- <div class="pt-14 pr-20 lg:pr-20 sm:pr-0 h-16 text-right">
                        @auth
                            <a href="{{ url('/dashboard') }}" class="font-semibold inline-flex items-center px-3 text-3xl sm:text-2xl pb-1   dark:text-gray-100 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="bg-blue-500 font-semibold inline-flex items-center px-3 text-3xl sm:text-2xl pb-1 text-white focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out rounded-md">Entrar a mi cuenta</a>
                            <span class="pr-4"></span>
                            <a href="{{ route('register') }}" class="bg-red-500 font-semibold inline-flex items-center px-3 text-3xl sm:text-2xl pb-1 text-white focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out rounded-md">registrarse</a>
                        @endauth
                        <hr class="relative pt-20 top-10">
                    </div> -->
                    <div class="flex items-center">
                        @auth
                            <a href="{{ url('/dashboard') }}" class="font-semibold inline-flex items-center px-3 text-3xl sm:text-2xl pb-1   dark:text-gray-100 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out">Panel</a>
                        @else
                            <a href="{{ route('login') }}" class="bg-blue-500 font-semibold inline-flex items-center px-3 text-3xl sm:text-2xl pb-1 text-white focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out rounded-md">Entrar a mi cuenta</a>
                            <span class="pr-4"></span>
                            <a href="{{ route('register') }}" class="bg-red-500 font-semibold inline-flex items-center px-3 text-3xl sm:text-2xl pb-1 text-white focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out rounded-md">registrarse</a>
                        @endauth
                        <hr class="relative pt-20 top-10">
                    </div>
                </nav>
                <hr class="dark:bg-white w-auto m-10">
            </header>
            <div class="columns-2 p-20">
                <div class="w-full border-r border-solid border-white">
                    <img src="/images/homepage.png" class="rounded-2xl h-[30rem] w-[45em]"  />
                </div>
                <div class="w-full">
                    <p class="m-10 leading-10 pt-10 text-justify text-white text-3xl">
                        Repafy es una plataforma para ordenar y entregar paquetes de manera fácil y conveniente a la ubicación deseada.
                    </p>
                    <p class="m-10 leading-10 text-justify text-white text-3xl">
                        Ordene y envíe paquetes a la ubicación deseada con solo unos pocos clics.
                    </p>
                    <p class="m-10 leading-10 text-justify text-white text-3xl">
                        Experimente los servicios de entrega de última milla sin complicaciones con Repafy.</p>
                </div>
            </div>
            <hr class="dark:bg-white w-auto m-10">
            <footer class="flex justify-center text-1xl dark:text-black text-gray-300 mx-auto">
                <a href="#" class="text-blue-300">Cómo funciona &nbsp; |</a>
                <a href="#" class="text-blue-300"> &nbsp; Términos  &nbsp;|</a>
                <a href="#" class="text-blue-300">&nbsp; Privacidad &nbsp;</a>
                <span class="px-6 text-white">derechos de autor(c) 2023. Repafy.com </span>
            </footer>
    </body>
</html>
