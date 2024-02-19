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
                    <h1 class="fw-bold text-uppercase text-danger py-3">Supprimer mon compte</h1>
                    <?php if ($_SERVER['REQUEST_METHOD'] != 'POST' || !empty($error)) { ?>
                        <form action="#" method="post" class=" p-3 rounded-4 shadow-lg">
                            <div class="row w-100 mb-3">
                                <div class="col-md-12">
                                    <div>
                                        <small class="form-text  text-danger"><?= $error['password'] ?? '' ?></small>
                                    </div>
                                    <label for="password" class="form-label">Êtes vous sur de vouloir supprimer votre compte ? <span class="text-danger">*</span></label>
                                    <input type="password" name="password" id="password" value="<?= htmlentities($password ?? '') ?>" class="form-control passwordSignIn " placeholder="Mot de passe" pattern="<?= REGEX_PASSWORD ?>" required>
                                </div>
                            </div>
                            <p>Veuillez noter que la suppression de votre compte sur notre site web entraînera la suppression permanente de toutes vos données associées.</p>
                            <div class="mt-3 pb-3">
                                <button type="submit" class="btn btn-danger rounded-5 p-3 text-uppercase fw-bold">
                                    Supprimer définitivement
                                </button>
                                <a href="/controllers/account/account-ctrl.php?id_user=<?= $user->id_user ?>" class="btn btn-outline-danger p-3 text-uppercase fw-bold rounded-5">
                                    Annuler
                                </a>
                            </div>
                        </form>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>