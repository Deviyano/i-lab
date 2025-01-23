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
        @endif
    </head>
    <body>
        <div class="center-container">
            <div class="inlog-container">
                <img src="{{ asset('images/logo.png') }}" alt="Logo Image" class="logo-img">
                <form id="QuizFormCode" method="POST" action="{{ route('quiz.startQuiz') }}">
                    @csrf
                    @if ($errors->has('quizId'))
                        <div class="error">{{ $errors->first('quizId') }}</div>
                    @endif
                    <h1>Voer een team naam in</h1>
                    <input class="textarea" type="text" id="quizId" name="quizId" placeholder="Voer de team naam hier in" required>    
                    <button class="button" type="submit">Doe mee</button>
                </form>
            </div>
        </div>
    </body>
</html>