<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Evaluaties</title>
    <link rel="stylesheet" href="{{ asset('css/Evaluations.css') }}">
    <img id='logo' src="i_lab.webp" alt="I-lab">
</head>
<body>
    <h1>Evaluaties</h1>

    {{-- Succesbericht --}}
    @if(session('success'))
        <p style="color: black;">{{ session('success') }}</p>
    @endif

    {{-- Formulier voor nieuwe evaluatie --}}
    <h2>Nieuwe Evaluatie</h2>
    @if($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form id="evaluationForm">
        @csrf

        <label for="vraag1">Wat vond je van deze opdrachten:</label><br>
        <textarea name="vraag1" id="vraag1"></textarea><br><br>

        <label for="vraag2">Wat kan er beter:</label><br>
        <textarea name="vraag2" id="vraag2"></textarea><br><br>

        <label for="vraag3">Wat vond je hiervan:</label><br>
        <textarea name="vraag3" id="vraag3"></textarea><br><br>

        <button type="button" id="submitBtn">Opslaan</button>
    </form>

    <h3>Jouw Ingevoerde Antwoorden:</h3>
    <div id="answers" style="display:none;">
        <p><strong>Wat vond je van deze opdrachten:</strong> <span id="answer1"></span></p>
        <p><strong>Wat kan er beter:</strong> <span id="answer2"></span></p>
        <p><strong>Wat vond je hiervan:</strong> <span id="answer3"></span></p>
    </div>

    <script>
        // Voeg een event listener toe voor de knop
        document.getElementById('submitBtn').addEventListener('click', function() {
            // Verkrijg de ingevulde waarden uit de tekstvelden
            const vraag1 = document.getElementById('vraag1').value;
            const vraag2 = document.getElementById('vraag2').value;
            const vraag3 = document.getElementById('vraag3').value;

            // Zet de antwoorden in de div
            document.getElementById('answer1').textContent = vraag1 ? vraag1 : 'Geen antwoord gegeven';
            document.getElementById('answer2').textContent = vraag2 ? vraag2 : 'Geen antwoord gegeven';
            document.getElementById('answer3').textContent = vraag3 ? vraag3 : 'Geen antwoord gegeven';

            // Toon de antwoorden
            document.getElementById('answers').style.display = 'block';
        });
    </script>

</body>
</html>
