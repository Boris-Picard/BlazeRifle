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
                    <h1 class="fw-bold text-uppercase py-3">Modifier mon profil</h1>
                    <div class="row">
                        <div class="col-12">
                            <?php if (isset($alert['error'])) { ?>
                                <div class="alert alert-danger">
                                    <?= $alert['error'] ?>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <?php if ($_SERVER['REQUEST_METHOD'] != 'POST' || !empty($error)) { ?>
                        <form action="#" method="post" enctype="multipart/form-data" class="p-3 rounded-4 shadow-lg">
                            <div class="row w-100 mb-3">
                                <div class="col-md-6">
                                    <div><small id="firstnameHelp" class="form-text text-danger"><?= $error['firstname'] ?? '' ?></small></div>
                                    <label for="firstname" class="form-label">Prénom <span class="text-danger">*</span></label>
                                    <input type="text" id="firstname" class="form-control" value="<?= htmlspecialchars($user->firstname) ?? '' ?>" placeholder="Votre prénom" name="firstname" autocomplete="given-name" minlength="2" maxlength="100" pattern="<?= REGEX_FIRSTNAME ?>" required>
                                </div>
                                <div class="col-md-6">
                                    <div><small id="lastnameHelp" class="form-text text-danger"><?= $error['lastname'] ?? '' ?></small></div>
                                    <label for="lastname" class="form-label">Nom <span class="text-danger">*</span></label>
                                    <input type="text" id="lastname" class="form-control" placeholder="Votre nom" name="lastname" autocomplete="family-name" value="<?= htmlspecialchars($user->lastname) ?? '' ?>" minlength="2" maxlength="100" pattern="<?= REGEX_FIRSTNAME ?>" required>
                                </div>
                            </div>
                            <div class="row w-100 mb-3">
                                <div class="col-md-6">
                                    <div><small id="pseudoHelp" class="form-text text-danger text-center"><?= $error['pseudo'] ?? '' ?></small></div>
                                    <label for="pseudo" class="form-label">Pseudo <span class="text-danger">*</span></label>
                                    <input type="text" id="pseudo" class="form-control" placeholder="Votre pseudo" name="pseudo" autocomplete="username" value="<?= htmlspecialchars($user->pseudo) ?? '' ?>" minlength="2" maxlength="50" pattern="<?= REGEX_PSEUDO ?>" required>
                                </div>
                                <div class="col-md-6">
                                    <div><small id="emailError" class="form-text text-danger text-center"><?= $error['email'] ?? '' ?></small></div>
                                    <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                                    <input type="email" id="email" class="form-control" autocomplete="email" name="email" value="<?= htmlspecialchars($user->email) ?? '' ?>" placeholder="Votre email" required>
                                </div>
                            </div>
                            <div class="row w-100">
                                <div class="col-md-12">
                                    <div><small class="form-text text-danger"><?= $error['picture'] ?? '' ?></small></div>
                                    <label for="picture" class="form-label">Changer ma photo de profil <span class="text-danger">*</span></label>
                                    <input class="form-control" type="file" id="picture" value="<?= $user->user_picture ?>" name="picture" accept="image/png, image/jpeg, image/avif">
                                </div>
                            </div>
                            <div class="mt-3 py-3 d-flex justify-content-between">
                                <div class="d-flex">
                                    <button type="submit" class="btn btn-danger rounded-5 p-3 text-uppercase fw-bold">
                                        Modifier
                                    </button>
                                    <a href="/controllers/account/account-ctrl.php?id_user=<?= $user->id_user ?>" class="btn btn-outline-danger mx-2 p-3 text-uppercase fw-bold rounded-5">
                                        Annuler
                                    </a>
                                </div>
                                <a href="/controllers/account/password-account-ctrl.php?id_user=<?= $user->id_user ?>" class="btn btn-danger p-3 text-uppercase fw-bold rounded-5">
                                    Modifier mon mot de passe
                                </a>
                            </div>
                        </form>
                    <?php } else { ?>
                        <div class="card shadow border-0 p-5">
                            <div class="card-body d-flex align-items-center flex-column">
                                <div class="dot-spinner">
                                    <div class="dot-spinner__dot"></div>
                                    <div class="dot-spinner__dot"></div>
                                    <div class="dot-spinner__dot"></div>
                                    <div class="dot-spinner__dot"></div>
                                    <div class="dot-spinner__dot"></div>
                                    <div class="dot-spinner__dot"></div>
                                    <div class="dot-spinner__dot"></div>
                                    <div class="dot-spinner__dot"></div>
                                </div>
                                <h5 class="mb-2 py-5 text-uppercase fw-bold">Profil mis à jour !</h5>
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
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>