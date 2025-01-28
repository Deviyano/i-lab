<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>I-lab</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['public/css/styles.css', 'resources/js/app.js'])
    @else
    @endif
</head>
<body>
<div class="center-container">
    <div class="inlog-container">
        <img src="{{ asset('images/i_lab.png') }}" alt="Logo Image" class="logo-img">
        <h1 class="title">Als wie wil je inloggen?</h1>
        <div class="inlog-button-container">
            <a href="{{ route('inlog.leerling.view') }}" class="button kid">Leerling</a>
            <a href="{{ route('inlog.leraar.view') }}" class="button teacher">Leraar</a>
            <a href="{{ route('inlog.ilab.view') }}" class="button admin">I-lab Medewerker</a>
        </div>
    </div>
</div>
</body>
</html>
