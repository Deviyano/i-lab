<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bekijk Quiz</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
<div class="logo-container">
    <div class="logo_img">
        <img src="{{ asset('images/i_lab.png') }}" alt="I-lab logo" style="width: 80px;">
    </div>
    <div class="link">
        <a href="{{ route('dashboard') }}">Terug naar Dashboard</a>
        <a href="{{ route('quiz.create') }}">Quiz Aanmaken</a>
    </div>
</div>

<h2 style="text-align: center; margin-top: 20px;">Beschikbare Quizzen</h2>

<div class="main-content" style="margin-top: 20px;">
    <div id="quizButtonsContainer" style="text-align: center;"></div>
    <p id="quizCode" style="margin-top: 20px; font-weight: bold; text-align: center;"></p>
</div>

<script>
    function loadQuizzes() {
        const quizzes = JSON.parse(localStorage.getItem('quizzes')) || [];
        const container = document.getElementById('quizButtonsContainer');
        container.innerHTML = '';

        quizzes.forEach((quiz, index) => {
            const quizDiv = document.createElement('div');
            quizDiv.style.display = 'flex';
            quizDiv.style.justifyContent = 'center';
            quizDiv.style.alignItems = 'center';
            quizDiv.style.marginBottom = '10px';

            const button = document.createElement('button');
            button.textContent = quiz.name;
            button.style.marginRight = '10px';
            button.addEventListener('click', () => showQuizCode());

            const deleteButton = document.createElement('button');
            deleteButton.textContent = 'Verwijderen';
            deleteButton.style.color = 'white';
            deleteButton.style.backgroundColor = 'red';
            deleteButton.style.border = 'none';
            deleteButton.style.padding = '5px 10px';
            deleteButton.style.cursor = 'pointer';
            deleteButton.addEventListener('click', () => deleteQuiz(index));

            quizDiv.appendChild(button);
            quizDiv.appendChild(deleteButton);
            container.appendChild(quizDiv);
        });
    }

    function showQuizCode() {
        const randomCode = Math.floor(10000 + Math.random() * 90000); // Genereert een random 5-cijferige code
        const codeDisplay = document.getElementById('quizCode');
        codeDisplay.textContent = `De gegenereerde code voor deze quiz is: ${randomCode}`;
    }

    function deleteQuiz(index) {
        const quizzes = JSON.parse(localStorage.getItem('quizzes')) || [];
        quizzes.splice(index, 1); // Verwijder de quiz op de aangegeven index
        localStorage.setItem('quizzes', JSON.stringify(quizzes));
        loadQuizzes(); // Herlaad de lijst
    }

    window.onload = loadQuizzes;
</script>
</body>
</html>
