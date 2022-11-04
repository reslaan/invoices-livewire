<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ isset($title) ? config('app.name') . '|' . $title : config('app.name') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    {{-- <link rel="stylesheet" type="text/css" href="{{ app()->getLocale() == 'en' ? @vite(['resources/css/app.css', 'resources/js/app.js']) :  asset('build/assets/css/app-ar.css') }}"> --}}

    <!-- Scripts -->

    <link rel="stylesheet" type="text/css" href="build/assets/css/app-ar.css">
    {{-- <link rel="stylesheet" type="text/css" href=" {{ app()->getLocale() == 'en' ? asset('public/build/assets/css/app-ar.css') : asset('build/assets/css/app-ar.css')}}" --}}
         {{-- {{ app()->getLocale() == 'en' ?  @vite(  [  'resources/css/app.css', 'resources/js/app.js']) : @vite(  [  'resources/css/app.css', 'resources/js/app.js']);}} --}}

         @vite(  [  'resources/css/app.css', 'resources/js/app.js'])

    @livewireStyles
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen  bg-gray-100 ">
        <div class="flex relative">

            <div class="fixed">
                @include('layouts.sidebar')

            </div>
            <div class="w-full ml-64 content transition-all duration-500">
                @include('layouts.navigation')

                <!-- Page Heading -->
                @if (isset($header))
                    <header class="bg-white shadow">
                        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                            {{ $header }}
                        </div>
                    </header>
                @endif

                <!-- Page Content -->
                <main class="">
                    {{ $slot }}
                </main>
            </div>

        </div>
    </div>

    @livewireScripts
    @stack('script')
</body>

</html>
