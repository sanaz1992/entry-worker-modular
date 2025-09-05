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
    <style>
        .modal {
            z-index: 2000;
        }

        .modal-backdrop {
            z-index: 1999;
        }

        .swal-toast {
            z-index: 999999 !important;
        }

        .modal-body {
            max-height: 70vh;
            overflow-y: auto;
        }
    </style>
    @stack('styles')
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <script>

        Livewire.on('notify', (data) => {
            Swal.fire({
                toast: true,
                position: 'bottom-start',
                icon: data.type,
                title: data.message,
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                customClass: {
                    popup: 'swal-toast'
                }
            });
        });

    </script>

    @stack('scripts')

</body>

</html>