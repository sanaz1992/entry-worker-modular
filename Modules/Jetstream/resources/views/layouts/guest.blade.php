<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">

<head>
    <meta charset="UTF-8" />
    <title>ورود به سامانه</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @vite(['Modules/Core/resources/assets/css/tailwind.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
    <script src="{{ asset('assets/scripts/alpine.min.js') }}" defer></script>
</head>

<body
    class="max-w-[1536px] bg-gray-50 text-gray-800 flex flex-col md:flex-row items-center md:justify-center md:justify-self-center gap-12 min-h-screen">


    {{ $slot }}


    @livewireScripts

</body>

</html>