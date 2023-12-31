const startQuizBtn = document.querySelector(".startQuizBtn");
const quizStartWindow = document.querySelector(".quizStartWindow");
const quizTimerWindow = document.querySelector(".quizTimerWindow");
const progressBar = document.querySelector(".progress-bar")
const counter = document.querySelector(".counter");
const quizQuestion = document.querySelector(".quizQuestion");
const selectedResponse = document.querySelectorAll(".response")
const classBorder = ['border', 'border-4', 'border-danger'];
let clickedResponse = [];

// Listener pour faire apparaitre la window timer au click
startQuizBtn.addEventListener('click', () => {
    quizStartWindow.classList.toggle('active')
    quizTimerWindow.classList.toggle('active')
})


// Permet d'ajouter une bordure rouge si l'element est cliqué et récuperer ce qui est contenu dans l'element
selectedResponse.forEach(response => {
    response.addEventListener("click", () => {
        clickedResponse.push(response.innerText);
        console.log(clickedResponse);
        for (let index = 0; index < classBorder.length; index++) {
            response.classList.toggle(classBorder[index])
        }
    })
})

// fonction progressbar
const progress = (totalTime) => {
        startQuizBtn.addEventListener('click', () => {
            progressBar.style.width = '100%'
            let count = totalTime
            let loop = setInterval(() => {
                count--
                counter.innerHTML = `${count} secondes`
                progressBar.style.width = `${(count / totalTime) * 100}%`
            if (count === 0) {
                clearInterval(loop);
                // quizTimerWindow.classList.toggle('active')
                // quizQuestion.classList.toggle('active')
            }
        }, 1000);
    })
}

progress(10);