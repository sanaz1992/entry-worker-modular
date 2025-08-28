<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>@yield('title') </title>
    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{asset('assets/css/app.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/bundles/bootstrap-social/bootstrap-social.css')}}">
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/components.css')}}">
    <!-- Custom style CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">
    <link rel='shortcut icon' type='image/x-icon' href='{{asset('assets/img/favicon.ico')}}' />

    {{-- @vite(['Modules/Core/resources/assets/css/tailwind.css', 'resources/js/app.js']) --}}

    <!-- Styles -->
    @livewireStyles
</head>

<body>
<div class="loader"></div>
 <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    {{ $slot }}
                </div>
            </div>
        </section>
    </div>
   

 <script src="{{asset('assets/js/app.min.js')}}"></script>
    <!-- JS Libraies -->
    <!-- Page Specific JS File -->
    <!-- Template JS File -->
    <script src="{{asset('assets/js/scripts.js')}}"></script>
    <!-- Custom JS File -->
    <script src="{{asset('assets/js/custom.js')}}"></script>
    @livewireScripts

</body>

</html>