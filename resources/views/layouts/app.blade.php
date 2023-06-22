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

</head>

<body class="bg-gray-200 dark:bg-gray-900 overflow-hidden">
    <div class="flex flex-col min-h-screen">
        <header>
            @yield('header')
        </header>

        <main>
            @yield('content')
        </main>
    </div>

    <!-- LIBS CDN - JS -->

    <!-- Leaflet -->
    <script src="https://cdn.jsdelivr.net/npm/leaflet@1.9.3/dist/leaflet.min.js"></script>
    <!-- Leaflet -->

    <!-- LIBS CDN - JS -->

    @vite('resources/js/utils/messages/loadMessages.js')

    @yield('script')
    @stack('scripts')
</body>

</html>
