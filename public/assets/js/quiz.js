const startQuizBtn = document.querySelector(".startQuizBtn");
const quizStartWindow = document.querySelector(".quizStartWindow");
const quizTimerWindow = document.querySelector(".quizTimerWindow");
const progressBar = document.querySelector(".progress-bar")
const progressQuestion = document.querySelector(".progressQuestion")
const counter = document.querySelector(".counter");
const counterQuestion = document.querySelector(".counterQuestion")
const quizQuestion = document.querySelector(".quizQuestion");
const selectedResponse = document.querySelectorAll(".response")
const classBorder = ['border', 'border-4', 'border-success'];
let clickedResponse = [];
let result = [];

// Listener pour faire apparaitre la window timer au click
startQuizBtn.addEventListener('click', () => {
    quizStartWindow.classList.toggle('active')
    quizTimerWindow.classList.toggle('active')
})


// Permet d'ajouter une bordure rouge si l'element est cliqué et récuperer ce qui est contenu dans l'element
selectedResponse.forEach(response => {
    response.addEventListener("click", (event) => {
        clickedResponse.push(event.target.innerText);
        console.log(clickedResponse);
        for (let index = 0; index < classBorder.length; index++) {
            response.classList.toggle(classBorder[index])
        }
    })
})

// fonction progressbar avant de start
let progress = (totalTime) => {
        startQuizBtn.addEventListener('click', () => {
            progressBar.style.width = '100%'
            let count = totalTime
            let loop = setInterval(() => {
                count--
                counter.innerHTML = `${count}`
                progressBar.style.width = `${(count / totalTime) * 100}%`
            if (count === 0) {
                clearInterval(loop)
                quizTimerWindow.classList.toggle('active')
                quizQuestion.classList.toggle('active')
            }
        }, 1000);
    })
}

progress(10);

// fonction progressbar pour les questions
let progressQuestions = (totalTimeQuestion) => {
    let checkClass = setInterval(() => {
        if (quizQuestion.classList.contains("active")) {
            progressQuestion.style.width = '100%'
            let countQuestion = totalTimeQuestion
            let loop = setInterval(() => {
                countQuestion--
                counterQuestion.innerHTML = `${countQuestion}`
                progressQuestion.style.width = `${(countQuestion / totalTimeQuestion) * 100}%`
                if (countQuestion === 0 ) {
                    clearTimeout(loop)
                }
            }, 1000);
        }
        if (quizQuestion.classList.contains("active")) {
            clearInterval(checkClass)
        }
    }, 500);
}

progressQuestions(10)