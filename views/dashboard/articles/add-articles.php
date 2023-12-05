
        <main>
            <section class="addArticles">
                <div class="container-fluid">
                    <form action="" method="POST" novalidate>
                        <div class="row">
                            <div class="articlesBanner p-0">
                                <div class="col-12 opacityBanner d-flex align-items-center justify-content-center">
                                    <h1 class="text-center fw-bold text-light">AJOUTER UN ARTICLE</h1>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center justify-content-center">
                            <div class="col-12 col-md-8 articlesColBackground">
                                <div class="form-floating mb-4">
                                    <input 
                                    type="text" 
                                    class="form-control rounded-0" 
                                    id="title" 
                                    placeholder="Titre"
                                    name="title"
                                    required>
                                    <label for="title">Titre de l'article *</label>
                                </div>
                                <div class="form-floating mb-4">
                                    <small class="fw-bold text-danger"><?= $error['textArea'] ?? '' ?></small>
                                    <textarea class="form-control rounded-0" 
                                    placeholder="Contenu de l'article" 
                                    id="floatingTextarea" 
                                    name="textArea"
                                    style="height: 200px;"
                                    required><?= $textArea ?? '' ?></textarea>
                                    <label for="floatingTextarea">Contenu de l'article *</label>
                                </div>
                                <div class="form-floating mb-4">
                                    <input 
                                    type="text" 
                                    class="form-control rounded-0" 
                                    id="resume" 
                                    placeholder="Résumé de l'article"
                                    name="resume"
                                    required>
                                    <label for="resume">Résumé de l'article *</label>
                                </div>
                                <div class="form-floating mb-4">
                                    <input 
                                    type="text" 
                                    class="form-control rounded-0" 
                                    id="author" 
                                    placeholder="Auteur"
                                    name="author"
                                    required>
                                    <label for="author">Auteur *</label>
                                </div>
                                <div class="form-check mb-4">
                                    <input 
                                    class="form-check-input" 
                                    id="checkboxForm"
                                    name="checkboxForm" 
                                    type="checkbox"
                                    value="<?=$todayDate?>"
                                    <?= (isset($checkbox)) ? 'checked' : '' ?>
                                    required>
                                    <small id="checkbox" class="form-text text-danger fw-bold"><?= $error['checkboxForm'] ?? '' ?></small>
                                    <label class="form-check-label" for="checkboxForm">
                                    Publication de l'article le <?=$todayDate?> *
                                    </label>
                                    </div>
                                    <div class="mb-4">
                                        <label for="media" class="form-label">Media <span class="text-danger"><?=$error['media'] ?? ''?></span></label>
                                        <input type="file" 
                                        name="media" 
                                        value="media" 
                                        class="form-control rounded-0" 
                                        id="media" 
                                        accept=".jpg, .jpeg, .png">
                                    </div>
                                    <div class="justify-content-center d-flex">
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
