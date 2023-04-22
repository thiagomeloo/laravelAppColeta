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

    @vite('resources/css/app.css')

    @yield('css')

    <title>App Coleta</title>
</head>

<body>
    @yield('header')

    @yield('content')

    {{-- <script src="{{ asset('/sw.js') }}"></script>
    <script>
        // Initialize the service worker
                if ('serviceWorker' in navigator) {
                navigator.serviceWorker.register('/sw.js', {
                scope: '.'
                }).then(function (registration) {
                // Registration was successful
                console.log('Laravel PWA: ServiceWorker registration successful with scope: ', registration.scope);
                }, function (err) {
                // registration failed :(
                console.log('Laravel PWA: ServiceWorker registration failed: ', err);
                });
                }
    </script> --}}
    @yield('scripts')
</body>

</html>
