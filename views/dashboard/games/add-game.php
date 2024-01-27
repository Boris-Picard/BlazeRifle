    <!-- Main -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-10 mx-auto mt-5">
                <div class="row">
                    <div class="col-12">
                        <h1 class="fw-bold text-uppercase">Ajouter un Jeu</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
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
                                <div class="mb-3 col-md-12">
                                    <div><small class="form-text text-danger"><?= $error['name'] ?? '' ?></small></div>
                                    <label for="name" class="form-label">Nom du jeu <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="name" id="name" value="<?= $name ?? '' ?>" aria-describedby="name" placeholder="" minlength="2" maxlength="150" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-3 col-md-12">
                                    <div><small class="form-text text-danger"><?= $error['description'] ?? '' ?></small></div>
                                    <label for="description" class="form-label">Description du jeu <span class="text-danger">*</span></label>
                                    <textarea class="form-control" name="description" id="description" aria-describedby="description" placeholder="" minlength="150" maxlength="500" required><?= $description ?? '' ?></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-3 col-md-12">
                                    <div><small class="form-text text-danger"><?= $error['picture'] ?? '' ?></small></div>
                                    <label for="picture" class="form-label">Photo du jeu <span class="text-danger">*</span></label>
                                    <input type="file" class="form-control" name="picture" id="picture" value="<?= $picture ?? '' ?>" aria-describedby="picture" placeholder="" accept="image/png, image/jpeg, image/avif" required>
                                </div>
                            </div>
                            <!-- <div class="row">
                                <div class="mb-3 col-md-12">
                                    <div><small class="form-text text-danger"><?= $error['user'] ?? '' ?></small></div>
                                    <label for="user" class="form-label">Utilisateur <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="user" id="user" value="<?= $user ?? '' ?>" aria-describedby="user" placeholder="" minlength="10" maxlength="150" required>
                                </div>
                            </div> -->
                            <div class="py-3">
                                <button type="submit" class="btn btn-danger rounded-4 fw-bold text-uppercase">Ajouter un Article</button>
                                <a href="/controllers/dashboard/articles/list-articles-ctrl.php" class="btn btn-outline-danger rounded-4 fw-bold text-uppercase">Voir les articles</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>