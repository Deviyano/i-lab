<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz</title>
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/quiz.css', 'resources/js/quiz.js'])
    @else
    @endif

</head>
<body>

    <div class="logo-container">
        <div class="logo_img">
            <img src="/images/i_lab.png" style="width: 80px;">
        </div>
        
        <div class="link">
            <a href="https://i-lab.nl">Passieve tillift</a>
            <a href="https://i-lab.nl">Zorg technologie</a> 
            <a href="https://i-lab.nl">Drone technologie</a> 
        </div>
    </div>

    <div class="main-content">
        <div class="opdrachten">
        <ul id="opdrachten-lijst">
            @foreach ($opdrachten as $opdracht)
                <li>
                    <a href="{{$opdracht->quiz_id}}" style="display: block; text-decoration: none;">
                        <div>
                            Opdracht {{$opdracht->quiz_id}}
                        </div>
                    </a>
                </li>
            @endforeach
        </ul>

        </div>

        <div class="container">
            <div class="content">
                <div class="explanation" id="explanation">
                    @if ($vraag)
                        <h2 id="questionText">{{ $vraag->Uitleg }}</h2>
                    @else
                        <p>Geen vraag gevonden voor deze quiz.</p>
                    @endif

                </div>

                <div class="video">
                    <video width="320" height="240" controls>
                        <source src="videos/Compilatie_ Wat kan technologie betekenen in de zorg_.mp4" type="video/mp4">
                    </video>
                </div>
            </div>

            <div class="question">
            @if ($vraag)
                        <h2 id="questionText">{{ $vraag->Vraag }}</h2>
                    @else
                        <p>Geen vraag gevonden voor deze quiz.</p>
                    @endif
            </div>

            <div class="answer">
                <textarea id="fname" name="fname" placeholder="Typ hier uw antwoord..." rows="1"></textarea>
                <button id="submitBtn" onclick="submitAnswer()">Verzenden</button>
            </div>
        </div>
    </div>

</body>
</html>