<!DOCTYPE html>
<html lang="pt-br" class="{{ getTheme() == 'dark' ? 'dark' : 'light' }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- PWA -->
    <meta name="theme-color" content="#6777ef" />
    <link rel="apple-touch-icon" href="{{ asset('icon-512x512.png') }}">
    <link rel="manifest" href="{{ asset('/manifest.json') }}">
    <!-- PWA -->

    <!-- LIBS CDN - CSS -->

    <!-- Fontawesome Icons -->
    <script src="https://kit.fontawesome.com/0a0b340480.js" crossorigin="anonymous"></script>
    <!-- Fontawesome Icons -->

    <!-- Leaflet -->
    <link href="https://cdn.jsdelivr.net/npm/leaflet@1.9.3/dist/leaflet.min.css" rel="stylesheet">
    <!-- Leaflet -->

    <!-- LIBS CDN - CSS -->


    @yield('css')
    @vite('resources/css/app.css')

    @if (View::hasSection('title'))
        <title>App Coleta - @yield('title')</title>
    @else
        <title>App Coleta</title>
    @endif

    {{-- Messagens de error --}}
    @if (isset($errors) && $errors->any())
        <meta name="error-messages" content="{{ json_encode($errors->all()) }}">
    @endif

    {{-- Messagens de sucesso --}}
    @if (session('success'))
        <meta name="success-messages" content="{{ json_encode(session()->pull('success')) }}">
    @endif

    <style>
        .menu-open {
            display: none;
        }
        @media (max-width: 768px) {
            .menu-closed {
                display: none;
            }
            .menu-open {
                display: block;
            }
        }
    </style>

</head>

<body class="bg-gray-200 dark:bg-gray-900 overflow-hidden">
    {{-- <header>
        @yield('header')
    </header>

    <main>
        @yield('content')
    </main> --}}

    <div class="flex flex-col min-h-screen">
        @include('components.template.header')

        <div class="flex flex-grow">
            <div class="flex-none w-1/4 md:w-1/6 menu-closed" id="sidebar">
                @include('components.template.sidebar')
            </div>
            <div class="flex-grow">
                @php
                    $breadcrumbs = [
                        ['url' => '/home', 'title' => 'Home'],
                        ['url' => '/produtos', 'title' => 'Produtos'],
                        ['url' => '/produtos/categoria', 'title' => 'Categoria'],
                        ['url' => '#', 'title' => 'Produto']
                    ];
                @endphp

                <div class="border border-gray-50">
                    @include('components.template.breadcrumb', ['breadcrumbs' => $breadcrumbs])
                </div>

                <div class="flex flex-col justify-between max-h-screen overflow-auto">
                    @yield('content')

                    @include('components.template.footer')
                </div>
            </div>
        </div>
    </div>

    <!-- LIBS CDN - JS -->

    <!-- Leaflet -->
    <script src="https://cdn.jsdelivr.net/npm/leaflet@1.9.3/dist/leaflet.min.js"></script>
    <!-- Leaflet -->

    <!-- LIBS CDN - JS -->

    @vite('resources/js/utils/messages/loadMessages.js')

    @yield('script')
    @stack('scripts')
    <script>
        document.getElementById('menu-toggle').addEventListener('click', function() {
            var sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('menu-closed');
            sidebar.classList.toggle('menu-open');
        });
    </script>
</body>

</html>
