<main>
    <section class="sectionContainer">
        <div class="container">
            <div class="row">
                <div class="col-12 breadArticles">
                    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/controllers/home-ctrl.php">Accueil</a></li>
                            <li class="breadcrumb-item"><a href="/controllers/games-preview/games-ctrl.php">Preview Des Jeux</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Preview Des Articles</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-12 py-5 articlesTitle">
                    <h1 class="text-uppercase fw-bold">Tous les articles par jeux</h1>
                </div>
            </div>
            <div class="row g-3 mt-3">
                <?php foreach ($games as $game) { ?>
                    <div class="col-md-4">
                        <h2 class="fw-bold text-uppercase py-2 aCardMin"><?= htmlspecialchars($game->game_name) ?></h2>
                        <div class="card rounded-4 border-0 shadow ">
                            <img src="/public/uploads/games/<?= $game->game_picture ?>" class="card-img object-fit-cover cardSelection w-100 rounded-4" alt="$game->game_name">
                            <div class="card-img-overlay cardSelection d-flex flex-column justify-content-end cardShadow">
                                <p class="p-0 m-0 z-3">
                                    <a href="/controllers/articles-list/articles-ctrl.php?id_game=<?= $game->id_game ?>" class="text-uppercase text-decoration-none fw-bold text-light z-3 stretched-link icon-link icon-link-hover">
                                        <?= htmlspecialchars($game->game_name) ?>
                                        <i class="bi bi-arrow-right fs-5 d-flex" aria-hidden="true">
                                        </i>
                                    </a>
                                </p>
                                <div class="card-text z-3">
                                    <small class="text-light">
                                        <!-- <?= $game->created_at ?> -->
                                        <span class="badge rounded-pill mx-1 border bg-transparent text-light fw-semibold "><i class="bi bi-chat-right-dots mx-1 align-middle"></i>5</span>
                                    </small>
                                </div>
                            </div>
                            <div class="card-body p-3">
                                <?php foreach ($allArticles as $articles) {
                                    foreach ($articles as $article) {
                                        // Vérifier si le nom du jeu actuel correspond au nom du jeu de l'article en cours
                                        if ($game->id_game == $article->id_game) { ?>
                                            <!-- ARTICLE -->
                                            <p class="card-text d-flex align-items-center my-0">
                                                <i class="bi bi-arrow-right fs-5 text-danger" aria-hidden="true"></i>
                                                <a href="/controllers/articles/article-ctrl.php?id_article=<?= $article->id_article ?>&id_game=<?= $game->id_game ?>" class="text-dark mx-2 text-decoration-none linkArticleSelectionGame fw-semibold icon-link icon-link-hover aCardMin">
                                                    <!-- Afficher le titre de l'article en utilisant htmlspecialchars pour éviter les problèmes de sécurité -->
                                                    <?= htmlspecialchars($article->article_title) ?>
                                                </a>
                                            </p>
                                <?php }
                                    }
                                } ?>
                                <a href="/controllers/articles-list/articles-ctrl.php?id_game=<?= $game->id_game ?>&id_category=<?= $article->id_category ?>" class="btn btn-danger text-light w-100 rounded-4 buttonArticleSelectionGame p-1 fw-bold text-uppercase aCardMin mt-3 mb-1">
                                    Tous les articles sur : <?= $game->game_name ?>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>
    <!-- FIN TOP JEUX SELECTION -->