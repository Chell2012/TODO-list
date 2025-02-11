<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Мое приложение' }}</title>
    <!-- Подключение стилей -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
<header>
    <!-- Навигация -->
    @include('partials.navigation')
</header>
<main>
    {{ $slot }}
</main>
<footer>
    <!-- Футер -->
    @include('partials.footer')
</footer>
<!-- Подключение скриптов -->
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
