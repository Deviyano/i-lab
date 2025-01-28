<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Aanmaken</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
<div class="logo-container">
    <div class="logo_img">
        <img src="{{ asset('images/i_lab.png') }}" alt="I-lab logo" style="width: 80px;">
    </div>
    <div class="link">
        <a href="{{ route('dashboard') }}">Terug naar Dashboard</a>
        <a href="{{ route('quiz.index') }}">Bekijk Quiz</a>
    </div>
</div>

<div class="main-content">
    <div class="opdrachten" id="leftMenu">
        <h3>Vragenlijst</h3>
        <ul id="questionList"></ul>
    </div>

    <div class="container">
        <h2>Aanmaken van een nieuwe Quiz</h2>
        <form id="quizForm">
            <div class="content">
                <label for="questionType">Selecteer vraagtype:</label>
                <select id="questionType" name="questionType" required>
                    <option value="" disabled selected>Kies een vraagtype</option>
                    <option value="multipleChoice">Multiple Choice</option>
                    <option value="openVraag">Open Vraag</option>
                </select>
            </div>

            <div id="multipleChoiceSection" class="content" style="display: none;">
                <label for="question">Multiple Choice Vraag:</label>
                <textarea id="question" name="question" placeholder="Typ hier de vraag..."></textarea>
                <div class="content" id="multipleChoiceOptions">
                    <input type="text" name="options[]" placeholder="Optie 1">
                    <input type="text" name="options[]" placeholder="Optie 2">
                </div>
                <button type="button" id="addOption">Voeg meer opties toe</button>
            </div>

            <div id="openVraagSection" class="content" style="display: none;">
                <textarea id="openQuestion" name="openQuestion" placeholder="Typ hier de vraag..."></textarea>
                <textarea id="openAnswer" name="openAnswer" placeholder="Typ hier het correcte antwoord..."></textarea>
            </div>

            <button type="submit" class="content">Voeg Vraag Toe</button>
        </form>

        <button id="finishQuiz" class="content">Afronden en Opslaan</button>
    </div>
</div>

<script>
    const questionList = document.getElementById('questionList');
    const quizForm = document.getElementById('quizForm');
    const questionType = document.getElementById('questionType');
    const multipleChoiceSection = document.getElementById('multipleChoiceSection');
    const openVraagSection = document.getElementById('openVraagSection');
    const addOptionButton = document.getElementById('addOption');
    const multipleChoiceOptions = document.getElementById('multipleChoiceOptions');
    const finishQuiz = document.getElementById('finishQuiz');

    let quizData = {
        name: '',
        questions: []
    };
    let editingIndex = null;

    function renderQuestionList() {
        questionList.innerHTML = '';
        quizData.questions.forEach((question, index) => {
            const li = document.createElement('li');
            li.textContent = question.question;

            const editButton = document.createElement('button');
            editButton.textContent = 'Bewerk';
            editButton.addEventListener('click', () => editQuestion(index));

            const deleteButton = document.createElement('button');
            deleteButton.textContent = 'Verwijder';
            deleteButton.addEventListener('click', () => deleteQuestion(index));

            li.appendChild(editButton);
            li.appendChild(deleteButton);
            questionList.appendChild(li);
        });
    }

    quizForm.addEventListener('submit', function (event) {
        event.preventDefault();

        const type = questionType.value;
        const question = type === 'multipleChoice'
            ? document.getElementById('question').value.trim()
            : document.getElementById('openQuestion').value.trim();

        const options = type === 'multipleChoice'
            ? Array.from(document.getElementsByName('options[]'))
                .map(opt => opt.value.trim())
                .filter(opt => opt)
            : [document.getElementById('openAnswer').value.trim()];

        if (!question || (type === 'multipleChoice' && options.length < 2)) {
            alert('Vul alle verplichte velden in.');
            return;
        }

        const questionData = { type, question, options };

        if (editingIndex !== null) {
            quizData.questions[editingIndex] = questionData;
            editingIndex = null;
        } else {
            quizData.questions.push(questionData);
        }

        quizForm.reset();
        multipleChoiceSection.style.display = 'none';
        openVraagSection.style.display = 'none';

        renderQuestionList();
    });

    addOptionButton.addEventListener('click', function () {
        const input = document.createElement('input');
        input.type = 'text';
        input.name = 'options[]';
        input.placeholder = `Optie ${multipleChoiceOptions.children.length + 1}`;
        multipleChoiceOptions.appendChild(input);
    });

    questionType.addEventListener('change', function () {
        if (this.value === 'multipleChoice') {
            multipleChoiceSection.style.display = 'block';
            openVraagSection.style.display = 'none';
        } else if (this.value === 'openVraag') {
            openVraagSection.style.display = 'block';
            multipleChoiceSection.style.display = 'none';
        }
    });

    function editQuestion(index) {
        const question = quizData.questions[index];
        editingIndex = index;

        questionType.value = question.type;
        questionType.dispatchEvent(new Event('change'));

        if (question.type === 'multipleChoice') {
            document.getElementById('question').value = question.question;
            multipleChoiceOptions.innerHTML = '';

            question.options.forEach((opt, idx) => {
                const input = document.createElement('input');
                input.type = 'text';
                input.name = 'options[]';
                input.value = opt;
                input.placeholder = `Optie ${idx + 1}`;
                multipleChoiceOptions.appendChild(input);
            });
        } else if (question.type === 'openVraag') {
            document.getElementById('openQuestion').value = question.question;
            document.getElementById('openAnswer').value = question.options[0];
        }
    }

    function deleteQuestion(index) {
        if (confirm('Weet je zeker dat je deze vraag wilt verwijderen?')) {
            quizData.questions.splice(index, 1);
            renderQuestionList();
        }
    }

    finishQuiz.addEventListener('click', function () {
        const quizName = prompt('Voer de naam van de quiz in:');
        if (!quizName) {
            alert('De quiz heeft een naam nodig.');
            return;
        }

        quizData.name = quizName;
        const quizzes = JSON.parse(localStorage.getItem('quizzes')) || [];
        quizzes.push(quizData);
        localStorage.setItem('quizzes', JSON.stringify(quizzes));

        alert(`Quiz "${quizName}" is opgeslagen.`);
        questionList.innerHTML = '';
        quizData = { name: '', questions: [] };
    });
</script>
</body>
</html>
