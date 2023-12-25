<main>
    <section class="formSection d-flex justify-content-center">
        <div class="container-fluid">
            <?php if ($_SERVER['REQUEST_METHOD'] != 'POST' || !empty($error)) { ?>
                <form action="" method="POST" enctype="multipart/form-data" novalidate>
                    <div class="row bg-light justify-content-center align-items-center">
                        <div class="col-12 col-md-6 articlesBanner p-0">
                            <div class="col-12 opacityBanner d-flex align-items-center justify-content-center h-100">
                                <h1 class="text-center fw-bold text-light">AJOUTER UN ARTICLE</h1>
                            </div>
                        </div>
                        <div class="row w-50">
                            <!-- TITRE DE L ARTICLE -->
                            <div class="mb-4 col-md-12 col-12 mt-4">
                                <div><small class="form-text text-danger"><?= $error['title'] ?? '' ?></small></div>
                                <label for="title" class="form-label fw-semibold">Titre de l'article *</label>
                                <input type="text" class="form-control" id="title" placeholder="Titre" name="title" value="<?= htmlentities($title ?? '') ?>" minlength="10" maxlength="200" required>
                            </div>
                            <!-- SELECT DES CONSOLES -->
                            <div class="mb-4 col-md-6" col-12>
                                <div><small class="form-text text-danger"><?= $error['consoles'] ?? '' ?></small></div>
                                <label for="consoles" class="form-label fw-semibold">Séléctionnez une console *</label>
                                <select class="form-select" name="consoles" id="consoles" required>
                                    <option selected disabled>Votre console</option>
                                    <?php foreach ($consolesArray as $console) { ?>
                                        <option value="<?= $console ?>" <?= (isset($consoles) && $consoles == $console) ? 'selected' : '' ?>><?= $console ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <!-- SELECT DES JEUX -->
                            <div class="mb-4 col-md-6 col-12">
                                <div><small class="form-text text-danger"><?= $error['games'] ?? '' ?></small></div>
                                <label for="games" class="form-label fw-semibold">Séléctionnez un jeu *</span></label>
                                <select class="form-select" name="games" id="games" required>
                                    <option selected disabled>Les jeux</option>
                                    <?php foreach ($gamesArray as $game) { ?>
                                        <option value="<?= $game ?>" <?= (isset($games) && $games == $game) ? 'selected' : '' ?>><?= $game ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <!-- TEXTAREA -->
                            <div class="mb-4 col-md-12 col-12">
                                <div><small class="form-text text-danger"><?= $error['textArea'] ?? '' ?></small></div>
                                <label for="textArea" class="form-label fw-semibold">Contenu de l'article *</label>
                                <textarea class="form-control" placeholder="Contenu de l'article" id="textArea" maxlength="15000" name="textArea" style="height: 200px;" required><?= $textArea ?? '' ?></textarea>
                            </div>
                            <!-- RESUME -->
                            <div class="mb-4 col-md-12 col-12">
                                <div><small class="form-text text-danger"><?= $error['resume'] ?? '' ?></small></div>
                                <label for="resume" class="form-label fw-semibold">Résumé de l'article *</label>
                                <input type="text" class="form-control" id="resume" placeholder="Résumé de l'article" name="resume" minlength="10" maxlength="1000" value="<?= htmlentities($resume ?? '') ?>" required>
                            </div>
                            <!-- AUTEUR -->
                            <div class="mb-4 col-md-12 col-12">
                                <div><small class="form-text text-danger"><?= $error['author'] ?? '' ?></small></div>
                                <label for="author" class="form-label fw-semibold">Auteur *</label>
                                <input type="text" class="form-control" id="author" placeholder="Auteur" value="<?= htmlentities($author ?? '') ?>" name="author" required>
                            </div>
                            <!-- MEDIA -->
                            <div class="mb-4 col-md-12 col-12">
                                <div><small class="form-text text-danger"><?= $error['media'] ?? '' ?></small></div>
                                <label for="media" class="form-label fw-semibold">Media *</span></label>
                                <input type="file" name="media" value="media" class="form-control" id="media" accept=".jpg, .jpeg, .png">
                            </div>
                            <!-- DATE DE PUBLICATION -->
                            <p class="fw-semibold py-3">Votre article sera publié a la date du : <span class="fw-bold text-primary"><?= $todayDate ?></span></p>
                            <!-- ALERT -->
                            <div class="alert alert-warning d-flex align-items-center" role="alert">
                                <i class="bi bi-exclamation-triangle"></i>
                                <div class="mx-2">
                                    Votre article ne sera publié qu'après vérification de l'administrateur
                                </div>
                            </div>
                            <div class="py-5">
                                <button type="submit" class="btn btn-primary w-100 rounded-3 p-2">
                                    Envoyer
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            <?php } else { ?>
                <div class="container-fluid validContainer bg-light h-100">
                    <div class="row m-0 w-100 h-100">
                        <div class="col-md-12 justify-content-center d-flex align-items-center h-100">
                            <div class="card shadow border-0 p-5">
                                <div class="card-body d-flex align-items-center flex-column">
                                    <h5 class="mb-2 py-5 text-uppercase fw-bold">Article soumis !</h5>
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
                <?php header("Refresh:7;url=/controllers/home-ctrl.php") ?>
            <?php } ?>
        </div>
    </section>
</main>
</body>

</html>