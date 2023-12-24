// Jawaban Pertanyaan 1 JS
// Toggle class active for jawaban
const jawaban = document.querySelector(".jawaban");

// ketika tombol di klik
document.querySelector("#jawab").onclick = () => {
    jawaban.classList.toggle("active-jawab");
};

// Klik diluar elemen
const jawab = document.querySelector("#jawab");

document.addEventListener("click", function (e) {
    if (!jawab.contains(e.target) && !jawaban.contains(e.target)) {
        jawaban.classList.remove("active-jawab");
    }
});

// Jawaban Pertanyaan 2 JS
// Toggle class active for jawaban
const jawaban2 = document.querySelector(".jawaban2");

// ketika tombol di klik
document.querySelector("#jawab2").onclick = () => {
    jawaban2.classList.toggle("active-jawab");
};

// Klik diluar elemen
const jawab2 = document.querySelector("#jawab2");

document.addEventListener("click", function (e) {
    if (!jawab2.contains(e.target) && !jawaban2.contains(e.target)) {
        jawaban2.classList.remove("active-jawab");
    }
});

// Jawaban Pertanyaan 3 JS
// Toggle class active for jawaban
const jawaban3 = document.querySelector(".jawaban3");

// ketika tombol di klik
document.querySelector("#jawab3").onclick = () => {
    jawaban3.classList.toggle("active-jawab");
};

// Klik diluar elemen
const jawab3 = document.querySelector("#jawab3");

document.addEventListener("click", function (e) {
    if (!jawab3.contains(e.target) && !jawaban3.contains(e.target)) {
        jawaban3.classList.remove("active-jawab");
    }
});

// Jawaban Pertanyaan 4 JS
// Toggle class active for jawaban
const jawaban4 = document.querySelector(".jawaban4");

// ketika tombol di klik
document.querySelector("#jawab4").onclick = () => {
    jawaban4.classList.toggle("active-jawab");
};

// Klik diluar elemen
const jawab4 = document.querySelector("#jawab4");

document.addEventListener("click", function (e) {
    if (!jawab4.contains(e.target) && !jawaban4.contains(e.target)) {
        jawaban4.classList.remove("active-jawab");
    }
});

// Jawaban Pertanyaan 5 JS
// Toggle class active for jawaban
const jawaban5 = document.querySelector(".jawaban5");

// ketika tombol di klik
document.querySelector("#jawab5").onclick = () => {
    jawaban5.classList.toggle("active-jawab");
};

// Klik diluar elemen
const jawab5 = document.querySelector("#jawab5");

document.addEventListener("click", function (e) {
    if (!jawab5.contains(e.target) && !jawaban5.contains(e.target)) {
        jawaban5.classList.remove("active-jawab");
    }
});