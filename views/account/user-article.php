    <main>
        <section class="profilSection py-5 bg-light">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="card border-0">
                            <div class="card-body cardProfilBanner rounded-4 ">
                                <div class="card child-card border-0 rounded-4" style="background-image: url(/public/uploads/users/<?= !empty($_SESSION['user']->user_picture) ? $_SESSION['user']->user_picture : 'profilpicdefault.avif' ?>)">
                                    <div class="card-body ">
                                        <p class="card-text profilName text-light w-100 fs-4 fw-bold bg-danger text-center py-3 text-uppercase rounded-5"><?= $_SESSION['user']->pseudo ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mx-auto">
                        <div class="row">
                            <h1 class="fw-bold text-uppercase py-3">Ajouter un article</h1>
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
                                <?php if ($_SERVER['REQUEST_METHOD'] != 'POST' || !empty($error)) { ?>
                                    <form action="#" method="POST" class="shadow-lg p-5 rounded-4" novalidate enctype="multipart/form-data">
                                        <div class="d-flex justify-content-center">
                                            <p>Auteur : <span class="fw-bold text-uppercase text-danger"><?= $_SESSION['user']->pseudo ?></span></p>
                                        </div>
                                        <div class="row">
                                            <div class="mb-3 col-md-12">
                                                <div><small class="form-text text-danger"><?= $error['title'] ?? '' ?></small></div>
                                                <label for="title" class="form-label">Titre de l'article <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="title" id="title" value="<?= $title ?? '' ?>" pattern="<?= REGEX_TITLE ?>" aria-describedby="title" placeholder="Call of Duty 2025, une suite de Black Ops 2 ?" minlength="10" maxlength="150" required>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <div><small class="form-text text-danger"><?= $error['picture'] ?? '' ?></small></div>
                                                <label for="picture" class="form-label">Ajouter une photo d'article <span class="text-danger">*</span></label>
                                                <input class="form-control" type="file" id="picture" name="picture" accept="image/png, image/jpeg, image/avif">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <div><small class="form-text text-danger"><?= $error['description'] ?? '' ?></small></div>
                                                <label for="description" class="form-label">Description de l'article <span class="text-danger">*</span></label>
                                                <textarea class="form-control descriptionArea" name="description" id="description" placeholder="Créer une description d'article" aria-describedby="description" minlength="150" maxlength="500" required><?= $description ?? '' ?></textarea>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="mb-3 col-md-6">
                                                <div><small class="form-text text-danger"><?= $error['secondTitle'] ?? '' ?></small></div>
                                                <label for="secondTitle" class="form-label">Sous-Titre 1 de l'article <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="secondTitle" id="secondTitle" value="<?= $secondTitle ?? '' ?>" pattern="<?= REGEX_TITLE ?>" aria-describedby="secondTitle" placeholder="Les détails sur le prochain Black Ops confirment son intrigue" minlength="10" maxlength="150" required>
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <div><small class="form-text text-danger"><?= $error['thirdTitle'] ?? '' ?></small></div>
                                                <label for="thirdTitle" class="form-label">Sous-Titre 2 de l'article <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="thirdTitle" id="thirdTitle" value="<?= $thirdTitle ?? '' ?>" pattern="<?= REGEX_TITLE ?>" aria-describedby="thirdTitle" placeholder="Le retour de certaines maps connues dans le prochain Black Ops ?" minlength="10" maxlength="150" required>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <div><small class="form-text text-danger"><?= $error['firstSection'] ?? '' ?></small></div>
                                                <label for="firstSection" class="form-label">Première section de l'article <span class="text-danger">*</span></label>
                                                <textarea class="form-control articleArea" name="firstSection" id="firstSection" placeholder="Première section d'article" aria-describedby="firstSection" minlength="250" maxlength="5000" required><?= $firstSection ?? '' ?></textarea>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <div><small class="form-text text-danger"><?= $error['secondSection'] ?? '' ?></small></div>
                                                <label for="secondSection" class="form-label">Deuxième section de l'article <span class="text-danger">*</span></label>
                                                <textarea class="form-control articleArea" name="secondSection" id="secondSection" placeholder="Deuxième section d'article" aria-describedby="secondSection" minlength="250" maxlength="5000" required><?= $secondSection ?? '' ?></textarea>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 mb-3" id="id_game">
                                                <div><small class="form-text text-danger"><?= $error['id_game'] ?? '' ?></small></div>
                                                <label for="id_game" class="mb-2">Jeux de l'article <span class="text-danger">*</span></label>
                                                <select class="form-select" name="id_game">
                                                    <option selected disabled></option>
                                                    <?php foreach ($gamesArticle as $game) { ?>
                                                        <option value="<?= $game->id_game ?>" <?= (isset($id_game) && $id_game == $game->id_game) ? 'selected' : '' ?>><?= htmlspecialchars($game->game_name) ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <div><small class="form-text text-danger"><?= $error['id_category'] ?? '' ?></small></div>
                                                <label for="id_category" class="mb-2">Categorie de l'article <span class="text-danger">*</span></label>
                                                <select class="form-select" name="id_category" id="id_category">
                                                    <option selected disabled></option>
                                                    <?php foreach ($categories as $category) { ?>
                                                        <option value="<?= $category->id_category ?>" <?= (isset($id_category) && $id_category == $category->id_category) ? 'selected' : '' ?>><?= htmlspecialchars($category->label) ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="py-3">
                                            <button type="submit" class="btn btn-danger rounded-5 p-3 fw-bold text-uppercase">Créer un Article</button>
                                            <a href="/controllers/account/account-ctrl.php" class="btn btn-outline-danger rounded-5 p-3 fw-bold text-uppercase">Annuler</a>
                                        </div>
                                    </form>
                                <?php } else { ?>
                                    <div class="container-fluid bg-light validContainer h-100">
                                        <div class="row m-0 w-100 h-100">
                                            <div class="col-md-12 justify-content-center d-flex align-items-center h-100">
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
                                                        <h5 class="mb-2 py-5 text-uppercase fw-bold">Votre article est bien envoyé !</h5>
                                                        <div class="alert alert-warning d-flex p-4 align-items-center" role="alert">
                                                            <div>
                                                                Votre article va être traité par un administrateur avant d'être affiché
                                                            </div>
                                                        </div>
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
                                <?php 
                                } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>