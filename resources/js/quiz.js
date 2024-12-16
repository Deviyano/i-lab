// document.addEventListener("DOMContentLoaded", () => {
//     const opdrachtenLijst = document.getElementById("opdrachten-lijst");
//     const lessons = [
//         { title: "Les 1.1", content: "Inhoud van Les 1.1" },
//         { title: "Les 3.1", content: "Inhoud van Les 3.1" },
//         { title: "Les 4.2", content: "Inhoud van Les 4.2" }
//     ];

//     // Dynamisch opdrachten toevoegen
//     for (let i = 1; i <= 10; i++) {
//         const opdrachtLi = document.createElement("li");
//         const opdrachtLink = document.createElement("a");
//         opdrachtLink.href = "#";
//         opdrachtLink.textContent = `Opdracht ${i}`;
//         opdrachtLi.appendChild(opdrachtLink);

//         // Subtaken
//         const subtakenUl = document.createElement("ul");
//         subtakenUl.classList.add("subtaken");
//         subtakenUl.id = `subtaken-${i}`;
//         for (let j = 1; j <= 3; j++) {
//             const subtaakLi = document.createElement("li");
//             const subtaakLink = document.createElement("a");
//             subtaakLink.href = "#";
//             subtaakLink.textContent = `Opdracht ${i}${String.fromCharCode(64 + j)}`;
//             subtaakLi.appendChild(subtaakLink);
//             subtakenUl.appendChild(subtaakLi);
//         }
//         opdrachtLi.appendChild(subtakenUl);

//         opdrachtLi.addEventListener("click", (event) => {
//             if (event.target.tagName.toLowerCase() === "a") event.preventDefault();

//             // Sluit alle geopende subtaken
//             const alleSubtaken = document.querySelectorAll(".subtaken.show");
//             alleSubtaken.forEach(subtaak => {
//                 if (subtaak !== subtakenUl) {
//                     subtaak.classList.remove("show");
//                 }
//             });

//             // Toon/verberg de geklikte subtaak
//             subtakenUl.classList.toggle("show");
//         });

//         opdrachtenLijst.appendChild(opdrachtLi);
//     }

//     // Carousel functionaliteit (optioneel)
//     const carousel = document.getElementById("carousel");
//     if (carousel) {
//         lessons.forEach((lesson) => {
//             const slide = document.createElement("div");
//             slide.classList.add("slide");
//             slide.innerHTML = `<h3>${lesson.title}</h3><p>${lesson.content}</p>`;
//             carousel.appendChild(slide);
//         });

//         const slides = document.querySelectorAll(".slide");
//         let currentSlide = 0;

//         function updateCarousel() {
//             const offset = -currentSlide * 100;
//             slides.forEach(slide => {
//                 slide.style.transform = `translateX(${offset}%)`;
//             });
//         }

//         document.getElementById("prevBtn").addEventListener("click", () => {
//             currentSlide = (currentSlide - 1 + lessons.length) % lessons.length;
//             updateCarousel();
//         });

//         document.getElementById("nextBtn").addEventListener("click", () => {
//             currentSlide = (currentSlide + 1) % lessons.length;
//             updateCarousel();
//         });

//         updateCarousel(); // Initialiseer de carousel
//     }
// });