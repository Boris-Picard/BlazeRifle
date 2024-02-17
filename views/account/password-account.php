<main>
    <section class="profilSection py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card border-0">
                        <div class="card-body cardProfilBanner rounded-4 ">
                            <div class="card child-card border-0 rounded-4" style="background-image: url(/public/uploads/users/<?= !empty($user->user_picture) ? $user->user_picture : 'profilpicdefault.avif' ?>)">
                                <div class="card-body ">
                                    <p class="card-text profilName text-light w-100 fs-4 fw-bold bg-danger text-center py-3 text-uppercase rounded-5"><?= $user->pseudo ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h1 class="fw-bold text-uppercase py-3">Modifier mon mot de passe</h1>
                    <form action="#" method="post" class=" p-3 rounded-4 shadow-lg">
                        <div class="row w-100 mb-3">
                            <div class="col-md-12">
                                <div>
                                    <small class="form-text  text-danger"><?= $error['password'] ?? '' ?></small>
                                </div>
                                <label for="password" class="form-label">Ancien mot de passe <span class="text-danger">*</span></label>
                                <input type="password" name="password" id="password" value="<?= htmlentities($password ?? '') ?>" class="form-control passwordSignIn " placeholder="Mot de passe" pattern="<?= REGEX_PASSWORD ?>" required>
                            </div>
                        </div>
                        <div class="row w-100 mb-3">
                            <div class="col-md-6">
                                <div>
                                    <small class="form-text  text-danger"><?= $error['password'] ?? '' ?></small>
                                </div>
                                <label for="password" class="form-label">Nouveau mot de passe <span class="text-danger">*</span></label>
                                <input type="password" name="password" id="password" value="<?= htmlentities($password ?? '') ?>" class="form-control passwordSignIn " placeholder="Mot de passe" pattern="<?= REGEX_PASSWORD ?>" required>
                            </div>
                            <div class="col-md-6">
                                <div>
                                    <small class="form-text text-danger"><?= $error['confirmPassword'] ?? '' ?></small>
                                </div>
                                <label for="confirmPassword" class="form-label">Confimer le nouveau Mot de passe <span class="text-danger">*</span></label>
                                <input type="password" name="confirmPassword" id="confirmPassword" value="<?= htmlentities($confirmPassword ?? '') ?>" class="form-control passwordConfirmSignIn" placeholder="Confimer le Mot de passe" required>
                            </div>
                        </div>
                        <div class="mt-3 py-3">
                            <button type="submit" class="btn btn-danger rounded-5 p-3 text-uppercase fw-bold">
                                Modifier
                            </button>
                            <a href="/controllers/account/update-account-ctrl.php?id_user=<?= $user->id_user ?>" class="btn btn-outline-danger p-3 text-uppercase fw-bold rounded-5">
                                Annuler
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>