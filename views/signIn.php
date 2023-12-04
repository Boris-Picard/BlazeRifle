</header>
    <main>
        <section class="formSection d-flex align-items-center justify-content-center signInPage">
            <div class="container">
                <div class="row formRow">
                    <div class="col-12 formFirstCol">
                        <form action="">
                            <div class="row">
                                <div class="col-12 col-md-6 imgForm">
                                </div>
                                <div class="col-12 col-md-6 text-center formSignIn p-5">
                                    <p class="fw-semibold">Vous avez déja un compte ?</p>
                                    <h1 class="fw-bold"><a href="logIn-ctrl.php" class="text-decoration-none connectLink">Se Connecter</a></h1>
                                    <div>
                                        <p class="mt-3 fw-semibold">Ou</p>
                                        <p class="fw-semibold">S'inscrire avec :</p>
                                        <a href="" class="text-light mx-1"><i class="bi bi-twitter-x fs-1"></i></a>
                                        <a href="" class="text-light mx-1"><i class="bi bi-facebook fs-1"></i></a>
                                        <a href="" class="text-light mx-1"><i class="bi bi-google fs-1"></i></a>
                                    </div>
                                    <div class="row">
                                        <div class="mb-5 mt-5 col-md-6 form-floating">
                                            <input type="text" id="firstname" class="form-control rounded-0" placeholder="Prénom *">
                                            <label for="firstname">Prénom *</label>
                                        </div>
                                        <div class="mb-5 mt-md-5 col-md-6 form-floating">
                                            <input type="text" id="lastname" class="form-control rounded-0" placeholder="Nom *">
                                            <label for="lastname">Nom *</label>
                                        </div>
                                    </div>
                                    <div class="mb-5 form-floating">
                                        <input type="text" id="pseudo" class="form-control rounded-0" placeholder="Pseudo *">
                                        <label for="pseudo">Pseudo *</label>
                                    </div>
                                    <div class="mb-5 form-floating">
                                        <input type="email" id="email" class="form-control rounded-0" placeholder="Email *">
                                        <label for="email">Email *</label>
                                    </div>
                                    <div class="mb-5 form-floating">
                                        <input type="password" id="password" class="form-control rounded-0" placeholder="Mot de passe *">
                                        <label for="password">Mot de passe *</label>
                                    </div>
                                    <div class="mb-5 form-floating">
                                        <input type="password" id="confirmPassword" class="form-control rounded-0" placeholder="Confimer le Mot de passe *">
                                        <label for="confirmPassword">Confimer le Mot de passe *</label>
                                    </div>
                                    <div class="d-flex justify-content-center align-items-center">
                                        <div class="form-check">
                                            <input class="form-check-input" id="checkboxForm" type="checkbox">
                                            <label class="form-check-label" for="checkboxForm">
                                                Check me out
                                            </label>
                                        </div>
                                    </div>
                                    <div class=" justify-content-center d-flex">
                                        <button type="submit" class="btn signInButton fw-semibold text-uppercase">Sign in</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- DEBUT BANDEAU DES RESEAUX SOCIAUX -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 text-center blockBottomFollow border-bottom border-2">
                    <span class="followUs mx-3">suivez-nous :</span>
                    <a class="link-body-emphasis" href="#"><i class="bi text-light bi-twitter-x mx-3 fs-4"></i></a></li>
                    <a class="link-body-emphasis" href="#"><i class="bi text-light bi-instagram mx-3 fs-4"></i></a></li>
                    <a class="link-body-emphasis" href="#"><i class="bi text-light bi-facebook mx-3 fs-4"></i></a></li>
                </div>
            </div>
        </div>
        <!-- FIN BANDEAU DES RESEAUX SOCIAUX -->
    </main>