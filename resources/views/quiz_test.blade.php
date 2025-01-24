<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>I-lab</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @else
        @endif
    </head>
    <body>
        <div class="center-container">
            <div class="inlog-container">
                <img src="{{ asset('images/logo.png') }}" alt="Logo Image" class="logo-img">
                <h1>Welkom bij de quiz!</h1>
                <p>Quiz ID: {{ $quizId }}</p>
                <p>Team Naam: {{ $TeamName }}</p>
            </div>
        </div>
    </body>
</html>