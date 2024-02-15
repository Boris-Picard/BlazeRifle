<main>
    <section class="sectionContainer bg-light">
        <div class="container">
            <div class="row row g-3 mt-3">
                <div class="col-12">
                    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/controllers/home-ctrl.php">Accueil</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Preview Des Guides</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-12 cold-md-10">
                    <h1 class="text-dark text-uppercase fw-bold titleAllGuides">Tous les guides par jeux</h1>
                </div>
                <!-- CARD 1 -->
                <?php foreach ($allArticles as $gameId => $articles) { ?>
                    <div class="col-md-12 col-12 px-2">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-8">
                                        <h2 class="fw-bold text-uppercase pt-5 aCardMin"><span class="text-danger"><?= $articles[0]->game_name ?></span></h2>
                                    </div>
                                    <div class="col-md-4 d-flex align-items-center justify-content-end pt-5">
                                        <a href="/controllers/articles-list/articles-ctrl.php?id_game=<?= $articles[0]->id_game ?>&id_category=<?= $articles[0]->id_category ?>" class="btn btn-danger btn-sm text-light rounded-4 buttonArticleSelectionGame fw-bold text-uppercase">
                                            Les guides <?= $articles[0]->game_name ?>
                                            <i class="bi bi-arrow-right mx-2" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php foreach ($articles as $article) { ?>
                        <div class="col-md-3 px-2 mt-3">
                            <div class="card rounded-4 border-0 cardGuideMin shadow">
                                <img src="/public/uploads/article/<?= $article->article_picture ?>" loading="lazy" class="card-img-top rounded-4 h-50 object-fit-cover" alt="<?= $article->game_name ?>">
                                <div class="card-body py-1 d-flex flex-column justify-content-center ">
                                    <p class="p-0 m-0">
                                        <span class="badge rounded-pill text-bg-danger p-2 px-4 mb-2"><?= $article->label ?></span>
                                    </p>
                                    <a href="/controllers/articles/article-ctrl.php?id_article=<?= $article->id_article ?>&id_category=<?= $article->id_category ?>" class="card-text mt-1 fw-bold stretched-link  aCardBig text-wrap text-decoration-none text-dark">
                                        <?= $article->article_title ?>
                                    </a>
                                    <div class="mt-1">
                                        <small class="text-muted">
                                            a <?= $article->formattedHour ?>
                                            le <?= $article->formattedDate ?>
                                            <?php if (!empty($article->countComments)) { ?>
                                                <span class="badge rounded-pill mx-1 border bg-danger text-white fw-semibold"><i class="bi bi-chat-right-dots mx-1 align-middle"></i><?= $article->countComments ?></span>
                                            <?php } ?>
                                            <span class="badge rounded-pill border bg-transparent text-dark fw-semibold"><?= $article->game_name ?></span>
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                <?php } ?>
            </div>
        </div>
    </section>