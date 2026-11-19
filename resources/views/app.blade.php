<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">

    @viteReactRefresh
    @vite([
        'resources/css/app.css',
        'resources/js/app.jsx'
    ])

    <x-inertia::head />
</head>
<body>
    <x-inertia::app />
</body>
</html>