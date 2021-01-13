<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>
            {{ config('app.name', 'Laravel') }}
            @auth
                @if (count(auth()->user()->roles)>0)
                    {{__(auth()->user()->roles[0]->name)}}
                @endif
                
            @endauth
        </title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/main.css') }}">

        @livewireStyles

        <!-- Scripts -->
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.3/dist/alpine.js" defer></script>
        <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
    </head>
    <body class="font-sans overflow-hidden text-gray-500">
        <div class="h-screen bg-gray-100 ">
                @livewire('navigation-dropdown')
            <!-- Page Heading -->
            {{-- <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header> --}}

            <!-- Page Content -->
            <main id="content" class="bg-red-200 h-full flex ">
                {{ $slot }}
            </main>
            {{--  <div class="flex">
                @include('navigation.bar')
                <div id="content" class="w-full overflow-auto p-2">
                    {{ $slot }}
                </div>
            </div>  --}}
        </div>

        {{-- @stack('modals') --}}

        @livewireScripts
    </body>
</html>
