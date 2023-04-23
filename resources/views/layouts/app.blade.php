<!DOCTYPE html>
<html lang="pt-br">

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
    <script src="https://kit.fontawesome.com/33256b8ce2.js" crossorigin="anonymous"></script>
    <!-- Fontawesome Icons -->

    <!-- Leaflet -->
    <link href="https://cdn.jsdelivr.net/npm/leaflet@1.9.3/dist/leaflet.min.css" rel="stylesheet">
    <!-- Leaflet -->

    <!-- LIBS CDN - CSS -->


    @vite('resources/css/app.css')
    @yield('css')

    <title>App Coleta</title>
</head>

<body class="text-base">
    <header>
        @yield('header')
    </header>

    <main>
        @yield('content')
    </main>

    <!-- LIBS CDN - JS -->

    <!-- Leaflet -->
    <script src="https://cdn.jsdelivr.net/npm/leaflet@1.9.3/dist/leaflet.min.js"></script>
    <!-- Leaflet -->

    <!-- LIBS CDN - JS -->

    @yield('scripts')
</body>

</html>
