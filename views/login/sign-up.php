<main>
    <section class="formSection d-flex justify-content-center">
        <div class="container-fluid">
            <?php if ($_SERVER['REQUEST_METHOD'] != 'POST' || !empty($error)) { ?>
                <form action="" method="POST">
                    <div class="row">
                        <div class="col-12 col-md-6 imgSignIn">
                        </div>
                        <div class="col-12 col-md-6 colInputSignIn">
                            <p class="fw-semibold text-center">Vous avez déja un compte ?</p>
                            <h1 class="fw-bold text-center"><a href="/controllers/login-ctrl/sign-in-ctrl.php" class="text-decoration-none connectLink">Se Connecter</a></h1>
                            <div class="text-center">
                                <p class="mt-3 fw-semibold">Ou</p>
                                <p class="fw-semibold">S'inscrire avec :</p>
                                <a href="" class="text-light mx-1"><i class="bi bi-twitter-x fs-1"></i></a>
                                <a href="" class="text-light mx-1"><i class="bi bi-facebook fs-1"></i></a>
                                <a href="" class="text-light mx-1"><i class="bi bi-google fs-1"></i></a>
                            </div>
                            <div class="row">
                                <!-- FIRSTNAME -->
                                <div class="mb-5 mt-3 col-md-6 form-floating">
                                    <input type="text" id="firstname" class="form-control rounded-0" placeholder="Prénom *" name="firstname" autocomplete="given-name" value="<?= htmlentities($firstname ?? '') ?>" minlength="2" maxlength="70" pattern="<?= REGEX_FIRSTNAME ?>" required>
                                    <small id="firstnameHelp" class="form-text text-danger fw-bold"><?= $error['firstname'] ?? '' ?></small>
                                    <label for="firstname">Prénom *</label>
                                </div>
                                <!-- LASTNAME -->
                                <div class="mb-5 mt-md-3 col-md-6 form-floating">
                                    <input type="text" id="lastname" class="form-control rounded-0" placeholder="Nom *" name="lastname" autocomplete="family-name" value="<?= htmlentities($lastname ?? '') ?>" minlength="2" maxlength="70" pattern="<?= REGEX_FIRSTNAME ?>" required>
                                    <small id="lastnameHelp" class="form-text text-danger fw-bold"><?= $error['lastname'] ?? '' ?></small>
                                    <label for="lastname">Nom *</label>
                                </div>
                                <!-- PSEUDO -->
                                <div class="mb-5 form-floating">
                                    <input type="text" id="pseudo" class="form-control rounded-0" placeholder="Pseudo *" name="pseudo" autocomplete="username" value="<?= htmlentities($pseudo ?? '') ?>" minlength="3" maxlength="20" pattern="<?= REGEX_PSEUDO ?>" required>
                                    <small id="pseudoHelp" class="form-text text-danger fw-bold text-center"><?= $error['pseudo'] ?? '' ?></small>
                                    <label for="pseudo">Pseudo *</label>
                                </div>
                                <!-- EMAIL -->
                                <div class="mb-5 form-floating">
                                    <input type="email" id="email" class="form-control rounded-0" autocomplete="email" name="email" value="<?= htmlentities($email ?? '') ?>" placeholder="Email *" required>
                                    <small id="emailError" class="form-text text-danger fw-bold"><?= $error['email'] ?? '' ?></small>
                                    <label for="email">Email *</label>
                                </div>
                                <!-- PASSWORD -->
                                <div class="mb-5 mt-3 col-md-6 form-floating">
                                    <input type="password" name="password" id="password" value="<?= htmlentities($password ?? '') ?>" class="form-control rounded-0 passwordSignIn" placeholder="Mot de passe *" pattern="<?= REGEX_PASSWORD ?>" required>
                                    <small class="fw-bold" id="passwordStrength"></small>
                                    <small class="fw-bold" id="passwordMin"></small>
                                    <small id="passwordHelp" class="form-text fw-bold text-danger"><?= $error['password'] ?? '' ?></small>
                                    <label for="password">Mot de passe *</label>
                                </div>
                                <!-- PASSWORD CONFIRM -->
                                <div class="mb-5 mt-3 col-md-6 form-floating">
                                    <input type="password" name="confirmPassword" id="confirmPassword" value="<?= htmlentities($confirmPassword ?? '') ?>" class="form-control rounded-0 passwordConfirmSignIn" placeholder="Confimer le Mot de passe *" required>
                                    <small id="passwordCheckHelp" class="form-text fw-bold text-danger"><?= $error['confirmPassword'] ?? '' ?></small>
                                    <small class="fw-bold text-center passMsgError text-danger"></small>
                                    <label for="confirmPassword">Confimer le Mot de passe *</label>
                                </div>
                                <div class="d-flex justify-content-start align-items-start">
                                    <!-- CHECKBOX -->
                                    <div class="form-check">
                                        <input class="form-check-input" id="checkboxForm" name="checkboxForm" type="checkbox" value="checkbox" <?= (isset($checkbox)) ? 'checked' : '' ?> required>
                                        <small id="checkbox" class="form-text text-danger fw-bold"><?= $error['checkboxForm'] ?? '' ?></small>
                                        <label class="form-check-label" for="checkboxForm">
                                            J'accepte que mes données soient utilisées conformément à la <a href="#">politique de confidentialité.</a>
                                        </label>
                                    </div>
                                </div>
                                <!-- BUTTON -->
                                <div class=" justify-content-center d-flex mt-3">
                                    <button type="submit" class="btn signInButton fw-semibold text-uppercase">S'inscrire</button>
                                </div>
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
                                    <h5 class="mb-2 py-5 text-uppercase fw-bold">Vous êtes bien enregistré !</h5>
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
        <script src="/public/assets/js/password.js"></script>
    </section>