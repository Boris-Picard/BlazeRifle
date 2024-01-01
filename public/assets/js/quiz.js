const startQuizBtn = document.querySelector(".startQuizBtn");
const quizStartWindow = document.querySelector(".quizStartWindow");
const quizTimerWindow = document.querySelector(".quizTimerWindow");
const progressBar = document.querySelector(".progress-bar")
const progressQuestion = document.querySelector(".progressQuestion")
const counter = document.querySelector(".counter");
const counterQuestion = document.querySelector(".counterQuestion")
const quizQuestion = document.querySelector(".quizQuestion");
const selectedResponse = document.querySelectorAll(".response")
const quizResult = document.querySelector(".quizResult")
const classBgAdd = ['bg-secondary', 'text-light'];
const classBgRemove = ['bg-white', 'text-dark'];
let clickedResponse = [];
let result = [];

// Listener pour faire apparaitre la window timer au click
startQuizBtn.addEventListener('click', () => {
    quizStartWindow.classList.toggle('active')
    quizTimerWindow.classList.toggle('active')
})


// Permet d'ajouter une bordure verte si l'element est cliqué et récuperer ce qui est contenu dans l'element
let selectresponse = (questions) => {
    selectedResponse.forEach(response => {
        let count = 0
        response.addEventListener("click", () => {
            for (let index = 0; index < classBgAdd.length; index++) {
                response.classList.toggle(classBgAdd[index]);
                response.classList.toggle(classBgRemove[index])
            }
            count++
            const isActive = response.classList.contains(classBgAdd[0]); 
            if (count%2 !== 0) {
                clickedResponse.push(response.innerText)
            } else {
                clickedResponse.pop(response.innerText)
            }
            selectedResponse.forEach(otherResponse => {
                if (otherResponse !== response) {
                    if (isActive) {
                        otherResponse.style.pointerEvents = "none";
                    } else {
                        otherResponse.style.pointerEvents = "auto";
                    }
                }
            });
        });
        return clickedResponse;
    });
}

selectresponse()


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
                    quizQuestion.classList.toggle("active")
                    quizResult.classList.toggle("active")
                }
            }, 1000);
        }
        if (quizQuestion.classList.contains("active")) {
            clearInterval(checkClass)
        }
    }, 500);
}

progressQuestions(10)

// Fonction résultat quiz
let showResult = () => {
    const scoreText = document.querySelector('.scoreText');
    scoreText.textContent = `Votre pourcentage de bonnes réponses est de ${userScore} sur ${questions.length}`
    
    const circularProgress = document.querySelector(".circularProgress")
    const progressValue = document.querySelector(".progressValue")
    let progressStartValue = -1
    let progressEndValue = (userScore / questions.length) * 100
    let speed = 20
    
    let progress = setInterval(() => {
        progressStartValue++

        progressValue.textContent = `${progressStartValue}%`
        circularProgress.style.background = `conic-gradient(#DC3545 ${progressStartValue * 3.6}deg, rgba(255,255,255,1) 0deg)`

        if (progressStartValue == progressEndValue) {
            clearInterval(progress)
        }
    }, speed);
}