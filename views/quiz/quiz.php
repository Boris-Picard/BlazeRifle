<section>
    <div class="container">
        <div class="row">
            <div class="col-12 d-flex align-items-center">
                <div class="d-flex align-items-center w-100 flex-column">
                    <img src="../../public/assets/img/logo512.png" class="img-fluid logoQuiz" alt="logoBrand">
                    <a class="navbar-brand nameLogoQuiz" href="#">blaze rifle</a>
                </div>
                <a href="#" class="d-block link-body-emphasis text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle">
                </a>
                <ul class="dropdown-menu dropdown-menu-end shadow dropdownAccount">
                    <li><a class="dropdown-item d-flex" href="/controllers/login-ctrl/sign-up-ctrl.php">Mon compte</a></li>
                    <li><a class="dropdown-item" href="/controllers/account/my-account-ctrl.php">Settings</a></li>
                    <li><a class="dropdown-item" href="#">Profile</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="#">Sign out</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- QUIZ -->
<section class="bg-light">
    <div class="container">
        <div class="row">
            <!-- QUIZ START -->
            <div class="col-md-8 shadow-lg rounded-4 quizStartWindow mt-4 active position-absolute">
                <div class="row justify-content-center p-4 rounded-4">
                    <div class="col-md-12 justify-content-center d-flex flex-column align-items-center">
                        <h1 class="text-danger fw-bold display-4">Règle du quiz</h1>
                        <hr class="hr text-danger w-100 border-3">
                        <p class="text-dark fw-semibold fs-5 mt-3">
                            1. Le participant doit appuyer sur le bouton « Start » pour lancer le quiz. Une fois le bouton pressé, le premier questionnaire apparaîtra immédiatement.
                        </p>
                        <p class="text-dark fw-semibold fs-5">
                            2. Les questions doivent être répondues séquentiellement. Les participants ne peuvent pas revenir à une question précédente ou sauter des questions.
                        </p>
                        <p class="text-dark fw-semibold fs-5">
                            3. Le score total sera affiché à la fin du quiz. Le score est basé sur le nombre de réponses correctes. Les réponses incorrectes ou non données n'entraînent pas de pénalité de points.
                        </p>
                        <p class="text-dark fw-semibold fs-5">
                            4. Chaque question doit être répondue dans un temps spécifique. Si le temps s'écoule avant qu'une réponse ne soit donnée, la question est comptée comme incorrecte.
                        </p>
                        <p class="text-dark fw-semibold fs-5">
                            5. Pour chaque question, le participant doit choisir une seule réponse parmi les options proposées. Les réponses multiples pour une même question ne sont pas autorisées.
                        </p>
                        <hr class="hr text-danger w-100 border-3">
                    </div>
                    <div class="col-md-12 justify-content-between d-flex">
                        <a href="/controllers/home-ctrl.php" class="btn btn-outline-danger rounded-5 p-3 text-uppercase fw-bold">
                            Accueil
                        </a>
                        <button type="button" class="btn btn-danger startQuizBtn rounded-5 p-3 text-uppercase fw-bold">
                            Commencer
                        </button>
                    </div>
                </div>
            </div>
            <!-- QUIZ TIMER -->
            <div class="col-md-8 shadow-lg rounded-4 quizTimerWindow mt-4 position-relative">
                <div class="row justify-content-center p-4 rounded-4">
                    <div class="col-md-12 justify-content-center d-flex flex-column align-items-center text-center">
                        <h1 class="text-danger fw-bold display-4">Préparez-vous le quiz va démarrer dans :</h1>
                    </div>
                    <div class="col-md-12 text-center mt-5">
                        <h5 class="fw-semibold text-dark counter py-4">
                            10 secondes
                        </h5>
                        <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                            <div class="progress-bar progress-bar-striped progress-bar-animated w-0 bg-danger"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- QUIZ QUESTIONS -->
            <div class="col-md-8 shadow-lg rounded-4 quizBg mt-4 position-absolute quizQuestion">
                <div class="row justify-content-center opacityBanner p-4 rounded-4">
                    <div class="col-md-12 justify-content-center d-flex flex-column align-items-center">
                        <h1 class="text-danger display-3 fw-bold">1/15</h1>
                    </div>
                    <div class="col-md-12 text-center">
                        <h5 class="fw-semibold text-light py-4">
                            15 secondes
                        </h5>
                        <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                            <div class="progress-bar w-75 bg-danger"></div>
                        </div>
                    </div>
                    <div class="col-md-12 shadow-lg p-5 rounded-4 bg-white mt-4">
                        <h5 class="fw-semibold fs-4  text-center text-dark">
                            Dans quel jeu Call of Duty la carte multijoueur "Nuketown" a-t-elle été introduite pour la première fois ?
                        </h5>
                    </div>
                    <div class="col-md-12 bg-white shadow-lg rounded-4 response p-4 w-75 mt-4">
                        <p class="fw-bold fs-5 text-center m-0 text-dark">
                            Call of Duty: World at War
                        </p>
                    </div>
                    <div class="col-md-12 bg-white shadow-lg rounded-4 response p-4 w-75 mt-4">
                        <p class="fw-bold fs-5 text-center m-0 text-dark">
                            Call of Duty: 2
                        </p>
                    </div>
                    <div class="col-md-12 bg-white shadow-lg rounded-4 response p-4 w-75 mt-4">
                        <p class="fw-bold fs-5 text-center m-0 text-dark">
                            Call of Duty: 3
                        </p>
                    </div>
                    <div class="col-md-12 bg-white shadow-lg rounded-4 response p-4 w-75 mt-4">
                        <p class="fw-bold fs-5 text-center m-0 text-dark">
                            Call of Duty: 4
                        </p>
                    </div>
                    <div class="py-5 col-md-12 w-75">
                        <button type="submit" class="btn btn-danger w-100 rounded-5 p-3 text-uppercase fw-bold">
                            Valider
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="/public/assets/js/quiz.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>