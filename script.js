// Selecteer de elementen
const questionList = document.getElementById('questionList');
const addQuestionForm = document.getElementById('addQuestionForm');
const questionInput = document.getElementById('questionInput');

// Tel hoeveel vragen er zijn toegevoegd
let questionCount = 0;

// Functie om een nieuwe vraag toe te voegen aan het menu
function addQuestionToMenu(questionText) {
    questionCount++; // Verhoog het vraagnummer

    // Maak een nieuwe lijst-item voor de vraag
    const li = document.createElement('li');
    li.textContent = `Vraag ${questionCount}: ${questionText}`;
    questionList.appendChild(li);
}

// Event listener voor het formulier
addQuestionForm.addEventListener('submit', function (event) {
    event.preventDefault(); // Voorkom herladen van de pagina

    // Haal de tekst van de ingevoerde vraag op
    const questionText = questionInput.value;

    if (questionText.trim() !== '') {
        // Voeg de vraag toe aan het menu
        addQuestionToMenu(questionText);

        // Maak het tekstveld leeg na toevoegen
        questionInput.value = '';
    }
});
