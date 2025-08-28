<!DOCTYPE html>
<html dir="rtl" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>@lang('dashboard::attributes.admin_panel') :: {{ $title ?? '' }} </title>
    <!-- General CSS Files -->

    <link rel="stylesheet" href="{{asset('assets/css/app.min.css')}}">
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/components.css')}}">
    <!-- Custom style CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">
    {{-- @vite([
    'Modules/Dashboard/resources/assets/css/app.min.css',
    'Modules/Dashboard/resources/assets/css/style.css',
    'Modules/Dashboard/resources/assets/css/components.css',
    'Modules/Dashboard/resources/assets/css/custom.css',

    ]) --}}
    <link rel='shortcut icon' type='image/x-icon' href='{{asset('assets/img/favicon.ico')}}' />
    @livewireStyles
    @yield('stylesّ')
</head>

<body>
    <div class="loader"></div>


    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>

            <x-dashboard::admin.navbar />

            <x-dashboard::admin.sidebar />
            <!-- Main Content -->
            <div class="main-content">
                {{$slot}}

            </div>
            <x-dashboard::admin.footer />
        </div>
    </div>

    <!-- General JS Scripts -->
    <script src="{{asset('assets/js/app.min.js')}}"></script>
    <!-- JS Libraies -->
    <!-- Page Specific JS File -->
    <!-- Template JS File -->
    <script src="{{asset('assets/js/scripts.js')}}"></script>
    <!-- Custom JS File -->
    <script src="{{asset('assets/js/custom.js')}}"></script>
    {{-- @vite([
    'Modules/Dashboard/resources/assets/js/app.min.js',
    'Modules/Dashboard/resources/assets/js/scripts.js',
    'Modules/Dashboard/resources/assets/js/custom.js',
    ]) --}}
    @livewireScripts

    @yield('scripts')

</body>

</html>