<main>
    <section class="articlesSection py-5">
        <div class="container">
            <section>
                <div class="row">
                    <div class="col-12 py-3 breadArticles">
                        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/controllers/home-ctrl.php">Accueil</a></li>
                                <li class="breadcrumb-item"><a href="/controllers/games-preview/games-ctrl.php">Preview Des Jeux</a></li>
                                <li class="breadcrumb-item"><a href="/controllers/articles-preview/articles-ctrl.php">Preview Des Articles</a></li>
                                <li class="breadcrumb-item"><a href="/controllers/articles-list/articles-ctrl.php?id_game=<?= $article->id_game ?>">Articles sur <?= $article->game_name ?></a></li>
                                <li class="breadcrumb-item active" aria-current="page">Article</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-md-8 col-12">
                        <!-- PRECEDENT SUIVANT -->
                        <div class="row">
                            <div class="col-12 justify-content-between d-flex">
                                <small><a href="/controllers/articles/article-ctrl.php?id=<?= $article->id_article + 1 ?>&id_game=<?= $article->id_game ?>" class="text-decoration-none fw-bold">Précédent</a></small>
                                <small><a href="/controllers/articles-list/articles-ctrl.php?id_game=<?= isset($article) ? $article->id_game : $article->id_console ?>" class="text-decoration-none text-capitalize fw-bold">Articles <?= $article->game_name ?></a></small>
                                <small><a href="/controllers/articles/article-ctrl.php?id=<?= $article->id_article - 1 ?>&id_game=<?= $article->id_game ?>" class="text-decoration-none fw-bold">Suivant</a></small>
                            </div>
                        </div>
                        <!-- TITLE -->
                        <div class="row mt-5">
                            <div class="col-12 d-flex text-center">
                                <h1 class="fw-bold text-break"><?= $article->article_title ?></h1>
                            </div>
                        </div>
                        <div class="row">
                            <!-- DATE ET AUTEUR -->
                            <div class="col-12 d-flex justify-content-center mt-2">
                                <small>
                                    Publié le <?= $article->formattedDate ?> à <?= $article->formattedHour ?> Par <span class="text-danger text-capitalize fw-bold">boris</span>
                                </small>
                            </div>
                        </div>
                        <div class="row">
                            <!-- DESCRIPTION -->
                            <div class="col-12 py-5">
                                <h3 class="fw-semibold text-break">
                                    <?= $article->article_description ?>
                                </h3>
                                <!-- IMG -->
                                <div class="ratio ratio-16x9 mt-5 shadow-lg rounded-4">
                                    <img class="rounded-4 object-fit-cover" src="/public/uploads/article/<?= $article->article_picture ?>" alt="<?= $article->article_picture ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 my-2">
                                <!-- SECOND TITLE -->
                                <h3 class="fw-bold text-break">
                                    <?= $article->secondtitle ?>
                                </h3>
                            </div>
                            <!-- PREMIERE SECTION -->
                            <div class="col-md-12 my-2 text-break">
                                <?= html_entity_decode($article->firstsection) ?>
                            </div>
                            <div class="col-md-12 my-2">
                                <!-- THIRD TITLE-->
                                <h3 class="fw-bold text-break">
                                    <?= $article->thirdtitle ?>
                                </h3>
                            </div>
                            <!-- DEUXIEME SECTION -->
                            <div class="col-md-12 my-2 text-break">
                                <?= html_entity_decode($article->secondsection) ?>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <hr>
                        </div>
                        <!-- ARTICLE SUIVANT -->
                        <div class="row">
                            <div class="col-md-12 my-2">
                                <h4 class="text-capitalize text-danger fw-bold">
                                    Article suivant
                                </h4>
                                <?php foreach ($articles as $article) {
                                    if ($id_article != $article->id_article && $id_game == $article->id_game) { ?>
                                        <div class="card mt-4 rounded-4 bg-transparent border-0 shadow-lg p-3">
                                            <div class="row g-0">
                                                <div class="col-md-2 d-flex">
                                                    <div class="ratio ratio-16x9">
                                                        <img src="/public/uploads/article/<?= $article->article_picture ?>" class="object-fit-cover img-fluid rounded-4" alt="<?= $article->article_picture ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-10">
                                                    <div class="card-body p-2 mx-2">
                                                        <a href="/controllers/articles/article-ctrl.php?id=<?= $article->id_article ?>&id_game=<?= $article->id_game ?>" class="card-text text-dark stetchedLinkArticleUnder stretched-link text-decoration-none aCardMin fw-bold">
                                                            <?= $article->article_title ?>
                                                        </a>
                                                        <p class="text-card aCard m-0 mt-2">
                                                            <?= $article->article_description ?>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                <?php }
                                } ?>
                            </div>
                        </div>
                        <!-- COMMENTAIRES -->
                        <section>
                            <div class="row">
                                <div class="col-12 mt-5 commentSection">
                                    <h4 class="text-capitalize text-danger fw-bold">
                                        commentaires
                                    </h4>
                                    <!-- AJOUTER UN COMMENTAIRE -->
                                    <div class="d-flex">
                                        <button type="button" class="btn btn-warning rounded-5 btnAddComment btn-sm p-2 fw-bold text-uppercase mt-2 letComment">
                                            Laisser un commentaire
                                        </button>
                                    </div>
                                    <!-- FORMULAIRE D'AJOUT D'UN COMMENTAIRE -->
                                    <?php if ($_SERVER['REQUEST_METHOD'] != 'POST' || !empty($error)) { ?>
                                        <form action="#commentForm" method="POST" id="commentForm">
                                            <div class="card mt-3 rounded-4 bg-transparent border-0 shadow-lg p-3">
                                                <div class="row g-0">
                                                    <div class="col-md-2 d-flex">
                                                        <img src="/public/assets/img/MWII-SEASON-01-ROADMAP-004.jpg" class="imgProfilComment rounded-circle object-fit-cover img-fluid" alt="call of duty">
                                                    </div>
                                                    <div class="col-md-10">
                                                        <div class="card-body p-0 ">
                                                            <p class="text-card aCard m-0 text-capitalize fw-bold mb-1">
                                                                Boris
                                                            </p>
                                                            <small class="form-text text-danger"><?= $error['textAreaComment'] ?? '' ?></small>
                                                            <textarea class="form-control" name="textAreaComment" id="textAreaComment" rows="5" maxlength="1500" required><?= $textAreaComment ?? '' ?></textarea>
                                                            <div class="float-end mt-3">
                                                                <button type="submit" class="btn btn-primary btn-sm fw-bold rounded-5 text-uppercase p-2 commentButton">Poster</button>
                                                                <button type="button" class="btn btn-outline-danger fw-bold btn-sm rounded-5 p-2 text-uppercase">Annuler</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    <?php } else { ?>
                                        <div class="card shadow-lg border-0 p-5 mt-4" id="commentForm">
                                            <div class="card-body d-flex align-items-center flex-column rounded-4">
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
                                                <h5 class="mb-2 py-3 text-uppercase fw-bold">Commentaire envoyé !</h5>
                                                <div class="alert alert-warning d-flex p-4 align-items-center" role="alert">
                                                    <div>
                                                        Votre commentaire va être traité par un administrateur avant d'être affiché
                                                    </div>
                                                </div>
                                                <div class="checkmark-container mt-5">
                                                    <div class="checkmark-background"></div>
                                                    <div class="checkmark-stem"></div>
                                                    <div class="checkmark-kick"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <meta http-equiv="refresh" content="7;url=/controllers/templates/article-ctrl.php">
                                    <?php } ?>
                                    <!-- FIN DU FORMULAIRE -->
                                    <div class="card mt-4 rounded-4 bg-transparent border-0 shadow-lg p-3 cardsComment">
                                        <div class="row g-0">
                                            <div class="col-md-2 d-flex">
                                                <img src="/public/assets/img/MWII-SEASON-01-ROADMAP-004.jpg" class="imgProfilComment rounded-circle object-fit-cover img-fluid" alt="call of duty">
                                            </div>
                                            <div class="col-md-10">
                                                <div class="card-title p-0 d-flex flex-wrap align-items-center">
                                                    <p class="text-card aCard m-0 text-capitalize fw-bold mb-1">
                                                        Boris
                                                    </p>
                                                    <small class="text-muted mb-1 mx-2">le 29 déc, à 13h09</small>
                                                </div>
                                                <div class="card-body p-0">
                                                    <p class="text-card">
                                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur recusandae eum nobis qui consequatur expedita voluptatem earum, voluptates neque repellat nulla suscipit incidunt officia rerum tempore rem, cum totam ab.
                                                    </p>
                                                    <div class="d-flex">
                                                        <button type="button" class="replyButton btn btn-outline-secondary btn-sm fw-bold rounded-5 text-uppercase p-2">Répondre</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card mt-4 rounded-4 bg-transparent border-0 shadow-lg p-3 cardsComment">
                                        <div class="row g-0">
                                            <div class="col-md-2 d-flex">
                                                <img src="/public/assets/img/MWII-SEASON-01-ROADMAP-004.jpg" class="imgProfilComment rounded-circle object-fit-cover img-fluid" alt="call of duty">
                                            </div>
                                            <div class="col-md-10">
                                                <div class="card-title p-0 d-flex flex-wrap align-items-center">
                                                    <p class="text-card aCard m-0 text-capitalize fw-bold mb-1">
                                                        Boris
                                                    </p>
                                                    <small class="text-muted mb-1 mx-2">le 29 déc, à 13h09</small>
                                                </div>
                                                <div class="card-body p-0">
                                                    <p class="text-card">
                                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur recusandae eum nobis qui consequatur expedita voluptatem earum, voluptates neque repellat nulla suscipit incidunt officia rerum tempore rem, cum totam ab.
                                                    </p>
                                                    <div class="d-flex">
                                                        <button type="button" class="replyButton btn btn-outline-secondary btn-sm fw-bold rounded-5 text-uppercase p-2">Répondre</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card mt-4 rounded-4 bg-transparent border-0 shadow-lg p-3 cardsComment commentNotShow d-none">
                                        <div class="row g-0">
                                            <div class="col-md-2 d-flex">
                                                <img src="/public/assets/img/MWII-SEASON-01-ROADMAP-004.jpg" class="imgProfilComment rounded-circle object-fit-cover img-fluid" alt="call of duty">
                                            </div>
                                            <div class="col-md-10">
                                                <div class="card-title p-0 d-flex flex-wrap align-items-center">
                                                    <p class="text-card aCard m-0 text-capitalize fw-bold mb-1">
                                                        Boris
                                                    </p>
                                                    <small class="text-muted mb-1 mx-2">le 29 déc, à 13h09</small>
                                                </div>
                                                <div class="card-body p-0">
                                                    <p class="text-card">
                                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur recusandae eum nobis qui consequatur expedita voluptatem earum, voluptates neque repellat nulla suscipit incidunt officia rerum tempore rem, cum totam ab.
                                                    </p>
                                                    <div class="d-flex">
                                                        <button type="button" class="replyButton btn btn-outline-secondary btn-sm fw-bold rounded-5 text-uppercase p-2">Répondre</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card mt-4 rounded-4 bg-transparent border-0 shadow-lg p-3 cardsComment commentNotShow d-none">
                                        <div class="row g-0">
                                            <div class="col-md-2 d-flex">
                                                <img src="/public/assets/img/MWII-SEASON-01-ROADMAP-004.jpg" class="imgProfilComment rounded-circle object-fit-cover img-fluid" alt="call of duty">
                                            </div>
                                            <div class="col-md-10">
                                                <div class="card-title p-0 d-flex flex-wrap align-items-center">
                                                    <p class="text-card aCard m-0 text-capitalize fw-bold mb-1">
                                                        Boris
                                                    </p>
                                                    <small class="text-muted mb-1 mx-2">le 29 déc, à 13h09</small>
                                                </div>
                                                <div class="card-body p-0">
                                                    <p class="text-card">
                                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur recusandae eum nobis qui consequatur expedita voluptatem earum, voluptates neque repellat nulla suscipit incidunt officia rerum tempore rem, cum totam ab.
                                                    </p>
                                                    <div class="d-flex">
                                                        <button type="button" class="replyButton btn btn-outline-secondary btn-sm fw-bold rounded-5 text-uppercase p-2">Répondre</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 d-flex justify-content-center mt-5">
                                    <button type="button" class="btn btn-danger w-50 fw-bold p-2 rounded-5 text-uppercase p-2 showMoreComments">plus de commentaires</button>
                                </div>
                            </div>
                        </section>
                    </div>
                    <!-- SIDEBAR -->
                    <div class="col-md-4 col-12">
                        <div class="row mx-4 rounded-4">
                            <div class="col-12 widthColRightActu shadow-lg rounded-4">
                                <div class="row">
                                    <div class="col-12 d-flex flex-row justify-content-center text-center p-3">
                                        <h5 class="text-uppercase fw-bold"><span class="text-danger">articles sur :</span> <?= $article->game_name ?></h5>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card mt-3 p-0 border-0 bg-transparent">
                                            <div class="card-img-top ratio ratio-16x9">
                                                <img src="/public/assets/img/toutes-infos-gta-vi.webp" class="object-fit-cover rounded-3" alt="Sunset Over the Sea">
                                            </div>
                                            <div class="card-body p-0 mt-1">
                                                <a href="" class="card-text stretchLinkHover aCard fw-bold text-decoration-none text-dark stretched-link">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Molestias enim perspiciatis non esse voluptates vero officia! Perferendis adipisci recusandae dignissimos quis est, autem voluptatum aliquid saepe. Quas quam tempora impedit.</a>
                                                <div class="card-text mb-3">
                                                    <small class="text-muted">
                                                        25 déc, 18:05
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                        <?php foreach ($articles as $article) { ?>
                                            <div class="card cardActuGuideRight bg-transparent border-0 overflow-hidden mt-2">
                                                <div class="row g-0 cardActuGuideRight">
                                                    <div class="col-auto">
                                                        <img src="/public/uploads/article/<?= $article->article_picture ?>" alt="<?= $article->game_name ?>" class="imgActuGuideRight object-fit-cover rounded-3">
                                                    </div>
                                                    <div class="col-md-6 p-0 ">
                                                        <div class="card-body w-100 cardActuGuideRight p-0 mx-2 d-flex flex-column">
                                                            <div class="">
                                                                <a href="#" class="card-text bodycardGuideRight stretchLinkHover fw-semibold text-decoration-none text-dark stretched-link aCardBig">
                                                                    <?= $article->article_description ?>
                                                                </a>
                                                            </div>
                                                            <p class="card-text">
                                                                <small class="text-muted">
                                                                    Le <?= $article->created_at ?>
                                                                </small>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
                                        <div class="d-flex justify-content-center mt-3 mb-4">
                                            <a href="/controllers/articles-list/articles-ctrl.php?id_game=<?= $article->id_game ?>" class="btn btn-danger w-50 rounded-4 p-1 fw-bold text-uppercase">
                                                les articles
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </section>
    <script src="/public/assets/js/comments.js"></script>