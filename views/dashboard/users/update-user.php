    <!-- Main -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-10 mx-auto mt-5">
                <div class="row">
                    <div class="col-12">
                        <h1 class="fw-bold text-uppercase">Modifier l'utilisateur <span class="text-danger"><?= $user->pseudo ?></span></h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <?= $msg ?>
                        <?php if (isset($alert['success'])) { ?>
                            <div class="alert alert-success">
                                <?= $alert['success'] ?>
                            </div>
                        <?php } elseif (isset($alert['error'])) { ?>
                            <div class="alert alert-danger alert-dismissible fade show">
                                <?= $alert['error'] ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <form action="#" method="POST" class="shadow-lg p-5 rounded-4" novalidate enctype="multipart/form-data">
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <div><small class="form-text text-danger"><?= $error['firstname'] ?? '' ?></small></div>
                                    <label for="firstname" class="form-label">Prénom <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="firstname" id="firstname" value="<?= $user->firstname ?? '' ?>" aria-describedby="firstname" pattern="<?= REGEX_CONSOLE ?>" minlength="2" maxlength="20" required>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <div><small class="form-text text-danger"><?= $error['lastname'] ?? '' ?></small></div>
                                    <label for="lastname" class="form-label">Nom <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="lastname" id="lastname" value="<?= $user->lastname ?? '' ?>" aria-describedby="lastname" placeholder="Xbox" pattern="<?= REGEX_CONSOLE ?>" minlength="2" maxlength="20" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <div><small class="form-text text-danger"><?= $error['pseudo'] ?? '' ?></small></div>
                                    <label for="pseudo" class="form-label">Pseudo <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="pseudo" id="pseudo" value="<?= $user->pseudo ?? '' ?>" aria-describedby="pseudo" placeholder="Xbox" pattern="<?= REGEX_CONSOLE ?>" minlength="2" maxlength="20" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <?php if (isset($user->user_picture)) { ?>
                                        <div class="pt-3 d-flex justify-content-center">
                                            <div class="ratio ratio-21x9">
                                                <img src="/public/uploads/users/<?= $user->user_picture ?>" alt="<?= $user->user_picture ?>" class="object-fit-cover rounded-4">
                                            </div>
                                            <div class="mx-2 d-flex align-items-center">
                                                <a href="/controllers/dashboard/users/update-img-ctrl.php?id_user=<?= $user->id_user ?>" class="btn btn-danger fw-bold text-uppercase">
                                                    Supprimer
                                                </a>
                                            </div>
                                        </div>
                                    <?php } else { ?>
                                        <div><small class="form-text text-danger"><?= $error['picture'] ?? '' ?></small></div>
                                        <label for="picture" class="form-label">Ajouter une photo de profil</label>
                                        <input class="form-control" type="file" id="picture" name="picture" accept="image/png, image/jpeg, image/avif">
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-3 col-md-4">
                                    <div><small class="form-text text-danger"><?= $error['role'] ?? '' ?></small></div>
                                    <label for="role" class="mb-2">Role de l'utilisateur <span class="text-danger">*</span></label>
                                    <select class="form-select" name="role">
                                        <option selected disabled></option>
                                        <option value="1" <?= $user->role == 1 ? 'selected' : '' ?>>1 (Admin)</option>
                                        <option value="2" <?= $user->role == 2 ? 'selected' : '' ?>>2 (Membre)</option>
                                        <option value="3" <?= $user->role == 3 ? 'selected' : '' ?>>3 (Membre Redacteur)</option>
                                    </select>
                                </div>
                            </div>
                            <div class="py-3">
                                <button type="submit" class="btn btn-danger rounded-4 fw-bold text-uppercase">Modifier</button>
                                <?php if (!empty($user->user_picture)) { ?>
                                    <a href="/controllers/dashboard/users/users-list-ctrl.php" class="btn btn-outline-danger rounded-4 fw-bold text-uppercase">Annuler</a>
                                <?php  } ?>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>