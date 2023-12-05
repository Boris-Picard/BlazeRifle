
        <main>
            <section>
                <div class="container-fluid">
                    <form action="" method="POST" enctype="multipart/form-data" novalidate>
                        <div class="row">
                            <div class="articlesBanner p-0">
                                <div class="col-12 opacityBanner d-flex align-items-center justify-content-center">
                                    <h1 class="text-center fw-bold text-light">AJOUTER UN ARTICLE</h1>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center justify-content-center">
                            <div class="col-12 col-md-8 articlesColBackground">
                                <!-- TITRE DE L ARTICLE -->
                                <div class="form-floating mb-4">
                                    <input 
                                    type="text" 
                                    class="form-control rounded-0" 
                                    id="title" 
                                    placeholder="Titre"
                                    name="title"
                                    value="<?= htmlentities($title ?? '') ?>"
                                    minlength="10" 
                                    maxlength="200"
                                    required>
                                    <small class="fw-bold text-danger"><?= $error['title'] ?? '' ?></small>
                                    <label for="title">Titre de l'article *</label>
                                </div>
                                    <!-- SELECT DES CONSOLES -->
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label for="consoles" class="form-label">Séléctionnez une console *</label>
                                        <select class="form-select" 
                                        name="consoles" 
                                        id="consoles"
                                        required>
                                            <option selected disabled>Votre console</option>
                                            <?php foreach ($consolesArray as $console) {?>
                                                <option value="<?=$console?>"<?=(isset($consoles) && $consoles==$console) ? 'selected' : ''?>><?=$console?></option>
                                            <?php } ?>
                                        </select>
                                        <small class="fw-bold text-danger"><?= $error['consoles'] ?? '' ?></small>
                                    </div>
                                    <!-- SELECT DES JEUX -->
                                    <div class="mb-3 col-md-6">
                                        <label for="games" class="form-label">Séléctionnez un jeu *</span></label>
                                        <select class="form-select" 
                                        name="games" 
                                        id="games"
                                        required>
                                            <option selected disabled>Les jeux</option>
                                            <?php foreach ($gamesArray as $game) {?>
                                                <option value="<?=$game?>"<?=(isset($games) && $games==$game) ? 'selected' : ''?>><?=$game?></option>
                                            <?php } ?>
                                        </select>
                                        <small class="fw-bold text-danger"><?= $error['games'] ?? '' ?></small>
                                    </div>
                                </div>
                                <!-- TEXTAREA -->
                                <div class="form-floating mb-4">
                                    <textarea class="form-control rounded-0" 
                                    placeholder="Contenu de l'article" 
                                    id="floatingTextarea" 
                                    maxlength="15000"
                                    name="textArea"
                                    style="height: 200px;"
                                    required><?= $textArea ?? '' ?></textarea>
                                    <label for="floatingTextarea">Contenu de l'article *</label>
                                    <small class="fw-bold text-danger"><?= $error['textArea'] ?? '' ?></small>
                                </div>
                                <!-- RESUME -->
                                <div class="form-floating mb-4">
                                    <input 
                                    type="text" 
                                    class="form-control rounded-0" 
                                    id="resume" 
                                    placeholder="Résumé de l'article"
                                    name="resume"
                                    minlength="10"
                                    maxlength="1000"
                                    value="<?= htmlentities($resume ?? '') ?>"
                                    required>
                                    <small class="fw-bold text-danger"><?= $error['resume'] ?? '' ?></small>
                                    <label for="resume">Résumé de l'article *</label>
                                </div>
                                <!-- AUTEUR -->
                                <div class="form-floating mb-4">
                                    <input 
                                    type="text" 
                                    class="form-control rounded-0" 
                                    id="author" 
                                    placeholder="Auteur"
                                    value="<?= htmlentities($author ?? '') ?>"
                                    name="author"
                                    required>
                                    <small class="fw-bold text-danger"><?= $error['author'] ?? '' ?></small>
                                    <label for="author">Auteur *</label>
                                </div>
                                <!-- MEDIA -->
                                <div class="mb-4">
                                    <label for="media" class="form-label mx-3">Media (non obligatoire)</span></label>
                                    <input type="file" 
                                    name="media" 
                                    value="media" 
                                    class="form-control rounded-0" 
                                    id="media" 
                                    accept=".jpg, .jpeg, .png">
                                    <small class="fw-bold text-danger"><?= $error['media'] ?? '' ?></small>
                                </div>
                                <!-- DATE DE PUBLICATION -->
                                    <p>Votre article sera publié a la date du : <span class="fw-bold"><?=$todayDate?></span></p>
                                    <!-- ALERT -->
                                    <div class="alert alert-warning d-flex align-items-center" role="alert">
                                        <i class="bi bi-exclamation-triangle"></i>
                                        <div class="mx-2">
                                            Votre article ne sera publié qu'après vérification de l'administrateur
                                        </div>
                                    </div>
                                    <div class="justify-content-center d-flex mb-5">
                                        <button type="submit" class="btn signInButton fw-semibold text-uppercase mt-3">Publier</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </section>
        </main>
    </body>
</html>
