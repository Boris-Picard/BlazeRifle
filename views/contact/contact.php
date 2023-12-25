<section class="formSection contactContainer d-flex justify-content-center">
    <div class="container-fluid">
        <?php if ($_SERVER['REQUEST_METHOD'] != 'POST' || !empty($error)) { ?>
            <form action="" method="POST">
                <div class="row bg-light">
                    <div class="col-12 col-md-6 imgLogIn">
                    </div>
                    <div class="col-12 col-md-6 d-flex flex-column align-items-center justify-content-center">
                        <div class="row">
                            <div class="col-12">
                                <img src="../../public/assets/img/logo512.png" class="img-fluid logoForm" alt="logoBrand">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <a class="navbar-brand nameLogoForm" href="/../controllers/home-ctrl.php">blaze rifle</a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 py-4">
                                <h1 class="fw-bold h2 text-uppercase">
                                    S'inscrire
                                </h1>
                            </div>
                        </div>
                        <div class="row w-50">
                            <!-- FIRSTNAME -->
                            <div class="mb-4 col-md-6 col-12">
                                <div><small class="form-text text-danger"><?= $error['firstname'] ?? '' ?></small></div>
                                <label for="firstname" class="form-label fw-semibold">Prénom *</label>
                                <input type="text" id="firstname" class="form-control" placeholder="Votre prénom" name="firstname" autocomplete="given-name" value="<?= htmlentities($firstname ?? '') ?>" minlength="2" maxlength="70" pattern="<?= REGEX_FIRSTNAME ?>" required>
                            </div>
                            <!-- LASTNAME -->
                            <div class="mb-4 col-md-6 col-12">
                                <div><small id="lastnameHelp" class="form-text text-danger"><?= $error['lastname'] ?? '' ?></small></div>
                                <label for="lastname" class="form-label fw-semibold">Nom *</label>
                                <input type="text" id="lastname" class="form-control" placeholder="Votre nom" name="lastname" autocomplete="family-name" value="<?= htmlentities($lastname ?? '') ?>" minlength="2" maxlength="70" pattern="<?= REGEX_FIRSTNAME ?>" required>
                            </div>
                            <!-- EMAIL -->
                            <div class="mb-4 col-md-12 col-12">
                                <div><small id="emailError" class="form-text text-danger text-center"><?= $error['email'] ?? '' ?></small></div>
                                <label for="email" class="form-label fw-semibold">Email *</label>
                                <input type="email" id="email" class="form-control" autocomplete="email" name="email" value="<?= htmlentities($email ?? '') ?>" placeholder="Votre email" required>
                            </div>
                            <!-- TEXTAREA -->
                            <div class="mb-4 col-md-12 col-12">
                                <div><small class="text-danger"><?= $error['textArea'] ?? '' ?></small></div>
                                <label for="floatingTextarea" class="form-label fw-semibold">Votre Message *</label>
                                <textarea class="form-control" placeholder="Votre message..." id="floatingTextarea" name="textArea" maxlength="2000" style="height: 200px;" required><?= $textArea ?? '' ?></textarea>
                            </div>
                            <div class="mb-4">
                                <div class="form-check">
                                    <div><small id="checkbox" class="form-text text-danger"><?= $error['checkboxForm'] ?? '' ?></small></div>
                                    <input class="form-check-input" id="checkboxForm" name="checkboxForm" type="checkbox" value="checkbox" <?= (isset($checkbox)) ? 'checked' : '' ?> required>
                                    <label class="form-check-label" for="checkboxForm">
                                        J'accepte les <a href="#">conditions d'utilisation</a>
                                    </label>
                                </div>
                            </div>
                            <div>
                                <button type="submit" class="btn btn-primary w-100 rounded-3 p-2">
                                    Envoyer
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        <?php } else { ?>
            <div class="container-fluid bg-light validContainer h-100">
                <div class="row m-0 w-100 h-100">
                    <div class="col-md-12 justify-content-center d-flex align-items-center h-100">
                        <div class="card shadow border-0 p-5">
                            <div class="card-body d-flex align-items-center flex-column">
                                <h5 class="mb-2 py-5 text-uppercase fw-bold">Vous avez bien envoyé votre message !</h5>
                                <div>
                                    <a href="/controllers/home-ctrl.php" class="btn btn-primary w-100 rounded-3 p-2">
                                        Revenir a l'accueil
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</section>