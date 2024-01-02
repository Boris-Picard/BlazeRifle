<section>
    <div class="container">
        <div class="row">
            <div class="col-12 d-flex align-items-center">
                <div class="d-flex align-items-center w-100 flex-wrap justify-content-center ">
                    <img src="../../public/assets/img/redlogo.png" class="img-fluid logoQuiz" alt="logoBrand">
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
<section class="bg-light quizSection d-flex align-items-center ">
    <div class="container">
        <div class="row">
            <!-- QUIZ START -->
            <div class="col-md-8 shadow-lg rounded-4 quizStartWindow active position-absolute">
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
            <div class="col-md-8 shadow-lg rounded-4 quizTimerWindow position-relative">
                <div class="row justify-content-center p-4 rounded-4">
                    <div class="col-md-12 justify-content-center d-flex flex-column align-items-center text-center">
                        <h1 class="text-danger fw-bold display-4">Préparez-vous le quiz va démarrer dans :</h1>
                    </div>
                    <div class="col-md-12 text-center mt-5">
                        <h5 class="fw-semibold text-dark">
                            <span class="counter text-danger mx-2">10</span>secondes
                        </h5>
                        <div class="progress mb-4" role="progressbar" aria-label="progress" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                            <div class="progress-bar progress-bar-striped progress-bar-animated w-0 bg-danger"></div>
                        </div>
                    </div>
                    <div class="col-md-12 d-flex flex-column justify-content-center text-center">
                        <hr class="hr border-3 text-danger mt-5">
                        <h5 class="fw-bold display-5 mt-3">Thème de la semaine : </h5>
                        <span class="text-danger fw-bold text-capitalize mt-5 display-5 ">Call of duty</span>
                    </div>
                    <div class="col-md-12 mt-5">
                        <hr class="hr border-3 text-danger mt-5">
                    </div>
                </div>
            </div>
            <!-- QUIZ QUESTIONS -->
            <div class="col-md-8 shadow-lg rounded-4 quizBg position-absolute quizQuestion">
                <div class="row justify-content-center opacityBannerQuiz p-4 rounded-4">
                    <div class="col-md-12 justify-content-center d-flex flex-column align-items-center">
                        <h1 class="text-danger display-3 fw-bold">1/15</h1>
                    </div>
                    <div class="col-md-12 text-center">
                        <h5 class="fw-semibold pt-2 text-light">
                            <span class="counterQuestion text-light mx-2">10</span>secondes
                        </h5>
                        <div class="progress" role="progressbar" aria-label="progress" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                            <div class="progress-bar progress-bar-striped progressQuestion progress-bar-animated bg-danger"></div>
                        </div>
                    </div>
                    <div class="col-md-12 shadow-lg p-5 rounded-4 bg-white mt-4">
                        <h5 class="fw-semibold fs-4  text-center text-dark">
                            Dans quel jeu Call of Duty la carte multijoueur "Nuketown" a-t-elle été introduite pour la première fois ?
                        </h5>
                    </div>
                    <div class="col-md-12 bg-white shadow-lg rounded-4 response p-4 w-75 mt-4 fw-bold fs-5 text-center m-0 text-dark">
                        Call of Duty: World at War
                    </div>
                    <div class="col-md-12 bg-white shadow-lg rounded-4 response p-4 w-75 mt-4 fw-bold fs-5 text-center m-0 text-dark">
                        Call of Duty: 2
                    </div>
                    <div class="col-md-12 bg-white shadow-lg rounded-4 response p-4 w-75 mt-4 fw-bold fs-5 text-center m-0 text-dark">
                        Call of Duty: 3
                    </div>
                    <div class="col-md-12 bg-white shadow-lg rounded-4 response p-4 w-75 mt-4 fw-bold fs-5 text-center m-0 text-dark">
                        Call of Duty: 4
                    </div>
                    <div class="py-5 col-md-12 w-75">
                        <button type="submit" class="btn btn-danger w-100 rounded-5 p-3 text-uppercase fw-bold">
                            Valider
                        </button>
                    </div>
                </div>
            </div>
            <!-- QUIZ RESULT -->
            <div class="col-md-8 shadow-lg rounded-4 quizResult position-absolute">
                <div class="row justify-content-center p-4 rounded-4">
                    <div class="col-md-12 justify-content-center d-flex flex-column align-items-center text-center">
                        <h1 class="text-danger fw-bold display-4">Quiz terminé</h1>
                        <div class="percentageContainer">
                            <div class="circularProgress">
                                <span class="progressValue">

                                </span>
                            </div>
                        </div>
                        <div class="scoreText">

                        </div>
                    </div>
                    <div class="py-5 col-md-12 w-75">
                    </div>
                    <a href='' class="btn btn-danger w-100 rounded-5 p-3 text-uppercase fw-bold">
                        Revenir a l'accueil
                    </a>
                </div>
            </div>
            <!-- SIDEBAR -->
            <div class="col-md-4 col-12 ">
                <div class="row mx-4 rounded-4">
                    <div class="col-12 widthColClassement shadow-lg rounded-4">
                        <div class="row">
                            <div class="col-12 d-flex flex-row text-center justify-content-center p-3">
                                <h5 class="text-uppercase fs-3 fw-bold text-danger">Classement Hebdo</h5>
                            </div>
                            <!-- PREMIER -->
                            <div class="col-md-2 ">
                                <i class="bi bi-trophy-fill text-warning fs-1"></i>
                            </div>
                            <div class="col-md-10 w-75 justify-content-center align-items-center d-flex text-center">
                                <p class="fw-bold fs-3 m-0">Boris</p>
                            </div>
                            <!-- DEUXIEME -->
                            <div class="col-md-2 ">
                                <i class="bi bi-trophy-fill text-secondary fs-1"></i>
                            </div>
                            <div class="col-md-10 w-75 justify-content-center align-items-center d-flex text-center">
                                <p class="fw-bold fs-3 m-0">Boris</p>
                            </div>
                            <!-- TROISIEME -->
                            <div class="col-md-2 ">
                                <i class="bi bi-trophy-fill bronzeTrophy fs-1"></i>
                            </div>
                            <div class="col-md-10 w-75 justify-content-center align-items-center d-flex text-center">
                                <p class="fw-bold fs-3 m-0">Boris</p>
                            </div>
                            <!-- QUATRIEME -->
                            <div class="col-md-2 ">
                                <i class="bi bi-trophy-fill fs-1"></i>
                            </div>
                            <div class="col-md-10 w-75 justify-content-center align-items-center d-flex text-center">
                                <p class="fw-bold fs-3 m-0">Boris</p>
                            </div>
                            <!-- CINQUIEME -->
                            <div class="col-md-2 ">
                                <i class="bi bi-trophy-fill fs-1"></i>
                            </div>
                            <div class="col-md-10 w-75 justify-content-center align-items-center d-flex text-center">
                                <p class="fw-bold fs-3 m-0">Boris</p>
                            </div>
                            <!-- SIXIEME -->
                            <div class="col-md-2 ">
                                <i class="bi bi-trophy-fill fs-1"></i>
                            </div>
                            <div class="col-md-10 w-75 justify-content-center align-items-center d-flex text-center">
                                <p class="fw-bold fs-3 m-0">Boris</p>
                            </div>
                            <!-- SEPTIEME -->
                            <div class="col-md-2 ">
                                <i class="bi bi-trophy-fill fs-1"></i>
                            </div>
                            <div class="col-md-10 w-75 justify-content-center align-items-center d-flex text-center">
                                <p class="fw-bold fs-3 m-0">Boris</p>
                            </div>
                            <!-- HUITIEME -->
                            <div class="col-md-2 ">
                                <i class="bi bi-trophy-fill fs-1"></i>
                            </div>
                            <div class="col-md-10 w-75 justify-content-center align-items-center d-flex text-center">
                                <p class="fw-bold fs-3 m-0">Boris</p>
                            </div>
                            <!-- NEUVIEME -->
                            <div class="col-md-2 ">
                                <i class="bi bi-trophy-fill fs-1"></i>
                            </div>
                            <div class="col-md-10 w-75 justify-content-center align-items-center d-flex text-center">
                                <p class="fw-bold fs-3 m-0">Boris</p>
                            </div>
                            <!-- DIXIEME -->
                            <div class="col-md-2 ">
                                <i class="bi bi-trophy-fill fs-1"></i>
                            </div>
                            <div class="col-md-10 w-75 justify-content-center align-items-center d-flex text-center">
                                <p class="fw-bold fs-3 m-0">Boris</p>
                            </div>
                            <div class="col-12 d-flex justify-content-center mt-3">
                                <a href="#" class="btn btn-outline-secondary  rounded-5 p-2 fw-bold text-uppercase">
                                    Reste du classement
                                </a>
                            </div>
                            <div class="col-12 d-flex justify-content-center mt-5 flex-column ">
                                <h5 class="fw-bold fs-5 text-center">Temps restant avant le prochain quiz :</h5>
                                <small class="text-center fw-bold mt-3">12 heures 18 minutes 56 secondes</small>
                            </div>
                        </div>
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