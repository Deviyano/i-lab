<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Docent Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>

<div class="logo-container">
    <div class="logo_img">
        <img src="{{ asset('images/i_lab.png') }}" alt="I-lab logo" style="width: 80px;">
    </div>

    <div class="link">
        <a href="{{ route('quiz.create') }}">Quiz Aanmaken</a>
        <a href="{{ route('quiz.index') }}">Quiz Bekijken en starten</a>
    </div>
</div>

<div class="main-content">
    <h2>Welkom I-Lab Medewerker of Docent!</h2>
    <hr>
    <p>Gebruik het menu om een nieuwe quiz aan te maken, of bekijk de bestaande quizzen.</p>
</div>

</body>
</html>
