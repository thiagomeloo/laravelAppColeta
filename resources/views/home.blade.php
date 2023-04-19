<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- PWA -->
    <meta name="theme-color" content="#6777ef" />
    <link rel="apple-touch-icon" href="{{ asset('icon-512x512.png') }}">
    <link rel="manifest" href="{{ asset('/manifest.json') }}">
    <!-- PWA -->

    <title>App Coleta</title>
</head>

<body>
    <h1>Olá seja bem vindo ao app coleta</h1>

    <script src="{{ asset('/sw.js') }}"></script>
</body>

</html>