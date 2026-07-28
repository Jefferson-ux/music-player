<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music: @yield('title')</title>
    <!-- Inclusión de CSS y JS mediante Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="main">
    @include('layout._partials.navbar')
    @yield('content')
</body>

</html>
