    <!-- Main -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-10 mx-auto mt-5">
                <div class="row">
                    <div class="col-12">
                        <h1 class="fw-bold text-uppercase">Ajouter une console</h1>
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
                                    <label for="name" class="form-label">Nom de la console <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="name" id="name" value="<?= $name ?? '' ?>" aria-describedby="name" placeholder="Xbox" pattern="<?= REGEX_CONSOLE ?>" minlength="2" maxlength="20" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <div><small class="form-text text-danger"><?= $error['picture'] ?? '' ?></small></div>
                                    <label for="picture" class="form-label">Ajouter une photo d'article <span class="text-danger">*</span></label>
                                    <input class="form-control" type="file" id="picture" name="picture" accept="image/png, image/jpeg, image/avif">
                                </div>
                            </div>
                            <div class="py-3">
                                <button type="submit" class="btn btn-danger rounded-4 fw-bold text-uppercase">Ajouter une console</button>
                                <a href="/controllers/dashboard/consoles/list-consoles-ctrl.php" class="btn btn-outline-danger rounded-4 fw-bold text-uppercase">Voir les consoles</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>