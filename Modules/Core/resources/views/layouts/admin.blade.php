<!DOCTYPE html>
<html dir="rtl" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @vite(['Modules/Core/resources/assets/css/tailwind.css', 'resources/js/app.js'])
    @livewireStyles

    <script src="{{ asset('assets/scripts/alpine.min.js') }}" defer></script>

    <style>
        [x-cloak] {
            display: none !important;
        }

        .bg-darkGray {
            background-color: #374151;
        }
    </style>
</head>

<body class="!bg-[#F7F8F8] text-gray-800 font-sans overflow-x-hidden">

    <div class="flex flex-col gap-8 p-8 relative min-h-screen">
        <!-- نوار ناوبری -->
        {{-- <div x-init="fetch('/src/components/navbar.html').then(r=>r.text()).then(html=>$el.innerHTML=html)"></div>
        --}}
        <x-core::admin.navbar />

        <div class="flex gap-8">
            <!-- نوار کناری -->
            <x-core::admin.sidebar />


            <!-- محتوای اصلی -->
            <main class="flex-1 overflow-x-hidden max-w-full">
                {{-- <div x-html="content"></div> --}}
                {{ $slot }}
            </main>
        </div>
    </div>

    @stack('modals')

    @livewireScripts

    @yield('scripts')

</body>

</html>