<main>
    <section class="profilSection py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card border-0">
                        <div class="card-body cardProfilBanner rounded-4 ">
                            <div class="card child-card border-0 rounded-4">
                                <div class="card-body ">
                                    <p class="card-text profilName text-light w-100 fs-4 fw-bold bg-danger text-center py-2 rounded-4">Boris</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h1 class="fw-bold text-uppercase py-3">Modifier mon profil</h1>
                    <form action="#" method="post" class=" p-3 rounded-4 shadow-lg">
                        <div class="row w-100 mb-3">
                            <div class="col-md-6">
                                <div><small id="firstnameHelp" class="form-text text-danger"><?= $error['firstname'] ?? '' ?></small></div>
                                <label for="firstname" class="form-label fw-semibold">Prénom <span class="text-danger">*</span></label>
                                <input type="text" id="firstname" class="form-control" placeholder="Votre prénom" name="firstname" autocomplete="given-name" value="<?= htmlentities($firstname ?? '') ?>" minlength="2" maxlength="70" pattern="<?= REGEX_FIRSTNAME ?>" required>
                            </div>
                            <div class="col-md-6">
                                <div><small id="lastnameHelp" class="form-text text-danger"><?= $error['lastname'] ?? '' ?></small></div>
                                <label for="lastname" class="form-label fw-semibold">Nom <span class="text-danger">*</span></label>
                                <input type="text" id="lastname" class="form-control" placeholder="Votre nom" name="lastname" autocomplete="family-name" value="<?= htmlentities($lastname ?? '') ?>" minlength="2" maxlength="70" pattern="<?= REGEX_FIRSTNAME ?>" required>
                            </div>
                        </div>
                        <div class="row w-100 mb-3">
                            <div class="col-md-6">
                                <div><small id="pseudoHelp" class="form-text text-danger text-center"><?= $error['pseudo'] ?? '' ?></small></div>
                                <label for="pseudo" class="form-label fw-semibold">Pseudo <span class="text-danger">*</span></label>
                                <input type="text" id="pseudo" class="form-control" placeholder="Votre pseudo" name="pseudo" autocomplete="username" value="<?= htmlentities($pseudo ?? '') ?>" minlength="3" maxlength="20" pattern="<?= REGEX_PSEUDO ?>" required>
                            </div>
                            <div class="col-md-6">
                                <div><small id="emailError" class="form-text text-danger text-center"><?= $error['email'] ?? '' ?></small></div>
                                <label for="email" class="form-label fw-semibold">Email <span class="text-danger">*</span></label>
                                <input type="email" id="email" class="form-control" autocomplete="email" name="email" value="<?= htmlentities($email ?? '') ?>" placeholder="Votre email" required>
                            </div>
                        </div>
                        <div class="row w-100 mb-3">
                            <div class="col-md-6">
                                <div>
                                    <small class="form-text  text-danger"><?= $error['password'] ?? '' ?></small>
                                </div>
                                <label for="password" class="form-label fw-semibold">Mot de passe <span class="text-danger">*</span></label>
                                <input type="password" name="password" id="password" value="<?= htmlentities($password ?? '') ?>" class="form-control passwordSignIn " placeholder="Mot de passe" pattern="<?= REGEX_PASSWORD ?>" required>
                            </div>
                            <div class="col-md-6">
                                <div>
                                    <small class="form-text text-danger"><?= $error['confirmPassword'] ?? '' ?></small>
                                </div>
                                <label for="confirmPassword" class="form-label fw-semibold">Confimer le Mot de passe <span class="text-danger">*</span></label>
                                <input type="password" name="confirmPassword" id="confirmPassword" value="<?= htmlentities($confirmPassword ?? '') ?>" class="form-control passwordConfirmSignIn" placeholder="Confimer le Mot de passe" required>
                            </div>
                        </div>
                        <div class="row w-100">
                            <div class="col-md-12">
                                <div><small class="form-text text-danger"><?= $error['picture'] ?? '' ?></small></div>
                                <label for="picture" class="form-label fw-semibold">Changer ma photo de profil <span class="text-danger">*</span></label>
                                <input class="form-control" type="file" id="picture" name="picture" accept="image/png, image/jpeg, image/avif">
                            </div>
                        </div>
                        <div class="mt-3 py-3">
                            <button type="submit" class="btn btn-danger rounded-5 p-3 text-uppercase fw-bold">
                                Modifier
                            </button>
                            <a href="/controllers/account/account-ctrl.php" class="btn btn-outline-danger p-3 text-uppercase fw-bold rounded-5">
                                Annuler
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>