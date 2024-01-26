    <!-- Main -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-10 mx-auto mt-5">
                <div class="row">
                    <div class="col-12">
                        <h1 class="fw-bold text-uppercase">Ajouter un article</h1>
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
                                    <div><small class="form-text text-danger"><?= $error['title'] ?? '' ?></small></div>
                                    <label for="title" class="form-label">Titre de l'article <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="title" id="title" value="<?= $title ?? '' ?>" aria-describedby="title" placeholder="Call of Duty 2025, une suite de Black Ops 2 ?" minlength="10" maxlength="150" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <div><small class="form-text text-danger"><?= $error['image-article'] ?? '' ?></small></div>
                                    <label for="image-article" class="form-label">Ajouter une photo d'article <span class="text-danger">*</span></label>
                                    <input class="form-control" type="file" id="image-article" name="image-article" accept="image/png, image/jpeg, image/avif">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div><small class="form-text text-danger"><?= $error['description'] ?? '' ?></small></div>
                                    <label for="description" class="form-label">Description de l'article <span class="text-danger">*</span></label>
                                    <textarea class="form-control descriptionArea" name="description" id="description" placeholder="Créer une description d'article" aria-describedby="description" minlength="50" maxlength="500" required><?= $description ?? '' ?></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <div><small class="form-text text-danger"><?= $error['secondTitle'] ?? '' ?></small></div>
                                    <label for="secondTitle" class="form-label">Sous-Titre 1 de l'article <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="secondTitle" id="secondTitle" value="<?= $secondTitle ?? '' ?>" aria-describedby="secondTitle" placeholder="Les détails sur le prochain Black Ops confirment son intrigue" minlength="10" maxlength="150" required>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <div><small class="form-text text-danger"><?= $error['thirdTitle'] ?? '' ?></small></div>
                                    <label for="thirdTitle" class="form-label">Sous-Titre 2 de l'article <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="thirdTitle" id="thirdTitle" value="<?= $thirdTitle ?? '' ?>" aria-describedby="thirdTitle" placeholder="Le retour de certaines maps connues dans le prochain Black Ops ?" minlength="10" maxlength="150" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <div><small class="form-text text-danger"><?= $error['firstSection'] ?? '' ?></small></div>
                                    <label for="firstSection" class="form-label">Première section de l'article <span class="text-danger">*</span></label>
                                    <textarea class="form-control articleArea" name="firstSection" id="firstSection" placeholder="Première section d'article" aria-describedby="firstSection" minlength="250" maxlength="1500" required><?= $firstSection ?? '' ?></textarea>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div><small class="form-text text-danger"><?= $error['secondSection'] ?? '' ?></small></div>
                                    <label for="secondSection" class="form-label">Deuxième section de l'article <span class="text-danger">*</span></label>
                                    <textarea class="form-control articleArea" name="secondSection" id="secondSection" placeholder="Deuxième section d'article" aria-describedby="secondSection" minlength="250" maxlength="1500" required><?= $secondSection ?? '' ?></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <div><small class="form-text text-danger"><?= $error['id_game'] ?? '' ?></small></div>
                                    <label for="id_game" class="mb-2">Jeux de l'article <span class="text-danger">*</span></label>
                                    <select class="form-select" name="id_game">
                                        <option selected disabled></option>
                                        <?php foreach ($gamesArray as $game) { ?>
                                            <option value="<?= $game ?>" <?= (isset($games) && $games == $game) ? 'selected' : '' ?>><?= $game ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div><small class="form-text text-danger"><?= $error['id_console'] ?? '' ?></small></div>
                                    <label for="id_console" class="mb-2">Console de l'article <span class="text-danger">*</span></label>
                                    <select class="form-select" name="id_console">
                                        <option selected disabled></option>
                                        <?php foreach ($consolesArray as $console) { ?>
                                            <option value="<?= $console ?>" <?= (isset($consoles) && $consoles == $console) ? 'selected' : '' ?>><?= $console ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="mb-3 col-md-4">
                                    <div><small class="form-text text-danger"><?= $error['id_user'] ?? '' ?></small></div>
                                    <label for="id_user" class="form-label">Auteur <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="id_user" id="id_user" value="<?= $id_user ?? '' ?>" aria-describedby="id_user" placeholder="Votre pseudo" minlength="2" maxlength="100" pattern="<?= REGEX_NAME ?>" required>
                                </div>
                            </div>
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