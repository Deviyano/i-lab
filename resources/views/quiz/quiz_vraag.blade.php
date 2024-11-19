<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demo</title>
    <link rel="stylesheet" href="vraag_1.css">
    <script src="vraag_1.js" defer></script>
</head>
<body>

    <div class="logo-container">
        <div class="logo_img">
            <img src="images/i_lab.png" alt="I-lab logo error" style="width: 80px;">
        </div>
        
        <div class="link">
            <a href="C:\Users\Deviyano\Desktop\school spullen\Projecten\jaar 3\groepopdracht\demo\vraag2\vraag_2.html">Passieve tillift</a>
            <a href="https://i-lab.nl">Zorg tegnologie</a> 
            <a href="https://i-lab.nl">Drone tegnologie</a> 
        </div>
    </div>

    <div class="main-content">
        <div class="opdrachten">
            <ul>
                <li><a href="#">Opdracht 1</a></li>
                <li><a href="#">Opdracht 2</a></li>
                <li><a href="#">Opdracht 3</a></li>
                <li><a href="#">Opdracht 4</a></li>
                <li><a href="#">Opdracht 5</a></li>
                <li><a href="#">Opdracht 6</a></li>
                <li><a href="#">Opdracht 7</a></li>
                <li><a href="#">Opdracht 8</a></li>
                <li><a href="#">Opdracht 9</a></li>
                <li><a href="#">Opdracht 10</a></li>
            </ul>
        </div>

        <div class="container">
            <div class="content">
                <div class="explanation" id="explanation">
                    <h2 id="questionText">Dianne heeft wat gesurft op internet en kwam een filmpje tegen over 'technologie in de zorg'.</h2>
                </div>

                <div class="video">
                    <video width="320" height="240" controls>
                        <source src="videos/Compilatie_ Wat kan technologie betekenen in de zorg_.mp4" type="video/mp4">
                    </video>
                </div>
            </div>

            <div class="question">
                <h2 id="questionText">Geef aan welke hulpmiddelen geschikt zouden zijn voor mevrouw de Wit.</h2>
            </div>

            <div class="answer">
                <textarea id="fname" name="fname" placeholder="Typ hier uw antwoord..." rows="1"></textarea>
                <button id="submitBtn" onclick="submitAnswer()">Verzenden</button>
            </div>
        </div>
    </div>

</body>
</html>