let ingevoerd_antwoord = ""; 

document.getElementById('fname').addEventListener('input', function() {
    ingevoerd_antwoord = this.value;
    autoGrow(this); 
});

function autoGrow(element) {
    element.style.height = "5px"; 
    element.style.height = (element.scrollHeight) + "px";
}

function submitAnswer() {
    if (ingevoerd_antwoord.trim() === "") {
        return alert("U heeft geen antwoord ingevuld. Probeer het opnieuw.");
    } else {
        alert("Ingevoerd antwoord: " + ingevoerd_antwoord);
    }
}