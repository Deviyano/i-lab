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
                <h1>Log in</h1>
                <form id="QuizFormCode" method="POST" style="display: flex; flex-direction: column; align-items: center;">
                    <input type="text" id="username" name="username" placeholder="Voer uw gebruikersnaam in" class="textarea Margin" required>
                    <input type="password" id="password" name="password" placeholder="Voer uw wachtwoord in" class="textarea Margin" required>
                    <button type="submit" class="button">Log in</button>
                </form>
            </div>
        </div>
    </body>
</html>