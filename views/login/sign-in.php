<section class="formSection d-flex justify-content-center">
    <div class="container-fluid">
        <?php if ($_SERVER['REQUEST_METHOD'] != 'POST' || !empty($error)) { ?>
            <form action="" method="POST">
                <div class="row">
                    <div class="col-12 col-md-6 imgLogIn">

                    </div>
                    <div class="col-12 col-md-6 colInputLogIn">
                        <p class="fw-semibold text-center">Vous n'avez pas de compte ?</p>
                        <h1 class="fw-bold text-center"><a href="/controllers/login-ctrl/sign-up-ctrl.php" class="text-decoration-none connectLink">S'inscrire</a></h1>
                        <div class="text-center">
                            <p class="fw-semibold">Ou</p>
                            <p class="fw-semibold">Se connecter avec :</p>
                            <a href="" class="text-light mx-1"><i class="bi bi-twitter-x fs-1"></i></a>
                            <a href="" class="text-light mx-1"><i class="bi bi-facebook fs-1"></i></a>
                            <a href="" class="text-light mx-1"><i class="bi bi-google fs-1"></i></a>
                        </div>
                        <div class="mb-5 mt-5 form-floating">
                            <input type="email" id="email" class="form-control rounded-0" placeholder="Email *">
                            <label for="email">Email *</label>
                        </div>
                        <div class="mb-5 form-floating">
                            <input type="password" id="password" class="form-control rounded-0" placeholder="Mot de passe *">
                            <label for="password">Mot de passe *</label>
                        </div>
                        <div class="justify-content-center d-flex">
                            <button type="submit" class="btn signInButton fw-semibold text-uppercase mt-3">connexion</button>
                        </div>
                    </div>
                </div>
            </form>
        <?php } else { ?>
            <div class="container validContainer h-100">
                <div class="row m-0 w-100 h-100">
                    <div class="col-md-12 justify-content-center d-flex align-items-center h-100">
                        <div class="card shadow border-0 p-5">
                            <div class="card-body d-flex align-items-center flex-column">
                                <h5 class="mb-2 py-5 text-uppercase fw-bold">Vous êtes bien connecté !</h5>
                                <p class="text-sm text-muted mb-6 p-5">
                                    Vous serez redirigé dans quelques secondes
                                </p>
                                <div class="checkmark-container">
                                    <div class="checkmark-background"></div>
                                    <div class="checkmark-stem"></div>
                                    <div class="checkmark-kick"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script src="/public/assets/js/redirect.js"></script>
        <?php } ?>
    </div>
</section>