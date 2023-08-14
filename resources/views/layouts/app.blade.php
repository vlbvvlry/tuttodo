<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">

            {{-- <header class="p-6 nborder">
                <div class="container flex justify-between items-center p-6 nborder"> --}}
                    {{-- Need to move h1 in the center of display. As can you see with border enable,
                         block "a" interferes with block "h1" and "h1" is shifted to the left. --}}
                    {{-- Need to add __() --}}
                    {{-- <h1 class="z-0 w-full text-xl text-center flex-grow nborder">TUT-TODO</h1>
                    <a href="">Logout-></a>
                </div>
            </header> --}}

        <!-- Page Content -->
        <main>
            <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
                <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                    {{ $slot }}
                </div>
                <form action="{{ route('logout') }}" method="post" class="mt-6">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </main>
    </div>
</body>

</html>
