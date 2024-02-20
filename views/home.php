<main>
    <!-- début hero page  -->
    <section class="heroPage bg-white">
        <div class="h-100 d-flex align-items-center text-light">
            <div class="container-fluid p-0">
                <div class="row m-0 py-5">
                    <div class="col-12">
                        <div class="row align-items-center">
                            <div class="col-12 col-md-6 p-5">
                                <h1 class="text-center text-dark fw-bold lh-base">
                                    Plongez au cœur de l'action avec les dernières actualités FPS!
                                </h1>
                                <h1 class="text-center text-dark fw-bold lh-base">
                                    Découvrez, jouez, et dominez dans l'univers des jeux de tir.
                                </h1>
                                <h1 class="text-center text-dark fw-bold lh-base">
                                    Votre aventure commence ici !
                                </h1>
                                <?php if (empty($_SESSION['user'])) { ?>
                                    <div class="justify-content-center d-flex py-5">
                                        <a href="/controllers/login/sign-up-ctrl.php" class="btn btn-danger rounded-5 fw-bold text-uppercase p-3">Rejoignez-nous !</a>
                                    </div>
                                <?php  } ?>
                            </div>
                            <div class="col-12 col-md-6 p-0 bgHero">
                                <img src="/public/assets/img/infinite2_copie.webp" loading="lazy" class="h-100 object-fit-cover img-fluid" alt="Call of duty hero page">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- fin hero page  -->
    <!-- DEBUT DES DERNIERS ARTICLES  -->
    <?php if (isset($firstArticle)) { ?>
        <section class="sectionContainer bg-light">
            <div class="container">
                <div class="row g-3 mt-3">
                    <div class="col-md-10">
                        <h1 class="text-dark text-uppercase articleTitle fw-bold">Les dernières news</h1>
                    </div>
                    <div class="col-md-2 d-flex  align-items-center justify-content-end">
                        <a href="/controllers/articles-list/articles-ctrl.php?id_category=<?= $firstArticle->id_category ?>" class="btn btn-danger btn-sm text-white rounded-4 buttonArticleSelectionGame fw-bold text-uppercase">
                            Toutes les news
                            <i class="bi bi-arrow-right mx-2" aria-hidden="true"></i>
                        </a>
                    </div>
                    <!-- MAIN CARD ARTICLE -->
                    <div class="col-md-6">
                        <div class="card bg-transparent text-bg-dark border-0 rounded-4 cardArticleHome" data-aos="fade-up" data-aos-duration="700">
                            <div class="ratio ratio-16x9 ">
                                <img src="/public/uploads/article/<?= $firstArticle->article_picture ?>" loading="lazy" class="card-img object-fit-cover rounded-4 cardArticleHome" alt="<?= $firstArticle->game_name ?>">
                            </div>
                            <div class="cardShadow">
                                <div class="card-img-overlay d-flex flex-column justify-content-end">
                                    <p class="p-0 m-0">
                                        <span class="badge rounded-pill text-bg-danger p-2 px-4 text-uppercase mb-2 text-uppercase"><?= $firstArticle->label ?></span>
                                    </p>
                                    <div class="w-100">
                                        <a href="/controllers/articles/article-ctrl.php?id_article=<?= $firstArticle->id_article ?>&id_category=<?= $firstArticle->id_category ?>&id_game=<?= $firstArticle->id_game ?>" class="card-text fw-bold stretched-link  aCard text-wrap text-decoration-none text-light">
                                            <?= $firstArticle->article_title ?>
                                        </a>
                                    </div>
                                    <div class="card-text mt-2">
                                        <small>
                                            A <?= $firstArticle->formattedHour ?>
                                            le <?= $firstArticle->formattedDate ?>
                                            <?php if (!empty($firstArticle->countComments)) { ?>
                                                <span class="badge rounded-pill text-uppercase bg-danger text-white mb-1 mx-1 border fw-semibold"><i class="bi bi-chat-right-dots text-white mx-1 align-middle"></i><?= $firstArticle->countComments ?></span>
                                            <?php  } ?>
                                            <span class="badge rounded-pill mb-1 border bg-transparent text-light text-uppercase fw-semibold"><?= $firstArticle->game_name ?></span>
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- UNDERCARD 1 -->
                        <?php foreach ($articles as $article) { ?>
                            <div class="card mb-3 shadow border-0 cardArticleHomeMin rounded-4 mt-3" data-aos="fade-up" data-aos-duration="700">
                                <div class="row g-0">
                                    <div class="col-md-4">
                                        <img src="/public/uploads/article/<?= $article->article_picture ?>" loading="lazy" class="img-fluid rounded-4 object-fit-cover cardArticleHomeMin" alt="<?= $article->game_name ?>">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body py-1">
                                            <p class="p-0 m-0">
                                                <span class="badge rounded-pill text-bg-danger p-2 mt-1 px-4 mb-2 text-uppercase"><?= $article->label ?></span>
                                            </p>
                                            <a href="/controllers/articles/article-ctrl.php?id_article=<?= $article->id_article ?>&id_category=<?= $article->id_category ?>&id_game=<?= $article->id_game ?>" class="card-text mt-1 fw-bold stretched-link aCard text-wrap text-decoration-none text-dark">
                                                <?= $article->article_title ?>
                                            </a>
                                            <div class="mt-1">
                                                <small class="text-muted">
                                                    A <?= $article->formattedHour ?>
                                                    le <?= $article->formattedDate ?>
                                                    <?php if (!empty($article->countComments)) { ?>
                                                        <span class="badge rounded-pill text-uppercase bg-danger text-white mb-1 mx-1 border fw-semibold"><i class="bi bi-chat-right-dots text-white mx-1 align-middle"></i><?= $article->countComments ?></span>
                                                    <?php  } ?>
                                                    <span class="badge rounded-pill border bg-transparent text-dark text-uppercase fw-semibold"><?= $article->game_name ?></span>
                                                </small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <!-- SIDECARD 1 -->
                    <div class="col-md-6">
                        <?php foreach ($sideArticles as $sideArticle) { ?>
                            <div class="card mb-3 shadow border-0 cardArticleHomeMin rounded-4" data-aos="fade-up" data-aos-duration="700">
                                <div class="row g-0">
                                    <div class="col-md-4">
                                        <img src="/public/uploads/article/<?= $sideArticle->article_picture ?>" loading="lazy" class="img-fluid rounded-4 object-fit-cover cardArticleHomeMin" alt="<?= $sideArticle->game_name ?>">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body py-1">
                                            <p class="p-0 m-0">
                                                <span class="badge rounded-pill text-bg-danger p-2 mt-1 px-4 mb-2 text-uppercase"><?= $sideArticle->label ?></span>
                                            </p>
                                            <a href="/controllers/articles/article-ctrl.php?id_article=<?= $sideArticle->id_article ?>&id_category=<?= $sideArticle->id_category ?>&id_game=<?= $sideArticle->id_game ?>" class="card-text mt-1 fw-bold stretched-link aCard text-wrap text-decoration-none text-dark">
                                                <?= html_entity_decode($sideArticle->article_title) ?>
                                            </a>
                                            <div class="mt-1">
                                                <small class="text-muted">
                                                    A <?= $sideArticle->formattedHour ?>
                                                    le <?= $sideArticle->formattedDate ?>
                                                    <?php if (!empty($sideArticle->countComments)) { ?>
                                                        <span class="badge rounded-pill text-uppercase bg-danger text-white mb-1 mx-1 border fw-semibold"><i class="bi bi-chat-right-dots text-white mx-1 align-middle"></i><?= $sideArticle->countComments ?></span>
                                                    <?php  } ?>
                                                    <span class="badge rounded-pill border bg-transparent text-dark text-uppercase fw-semibold"><?= $sideArticle->game_name ?></span>
                                                </small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </section>
    <?php } ?>
    <!-- FIN DES ARTICLES -->
    <!-- LES DERNIERS GUIDES  -->
    <?php if (isset($firstGuide)) { ?>
        <section class="sectionContainer bg-light">
            <div class="container">
                <div class="row g-3 mt-3">
                    <div class="col-10">
                        <h1 class="text-dark text-uppercase fw-bold">Les derniers guides</h1>
                    </div>
                    <div class="col-md-2 d-flex align-items-center justify-content-end">
                        <a href="/controllers/articles-list/articles-ctrl.php?id_category=<?= $firstGuide->id_category ?>" class="btn btn-danger btn-sm text-white rounded-4 buttonArticleSelectionGame fw-bold text-uppercase">
                            Tous les guides
                            <i class="bi bi-arrow-right mx-2" aria-hidden="true"></i>
                        </a>
                    </div>
                    <div class="col-12">
                        <div class="row g-3">
                            <!-- MAIN CARD GUIDE -->
                            <div class="col-md-6 col-12 px-2">
                                <div class="card text-bg-dark border-0 rounded-4 bg-white cardGuideBig" data-aos="fade-up" data-aos-duration="700">
                                    <div class="ratio ratio-16x9 ">
                                        <img src="/public/uploads/article/<?= $firstGuide->article_picture ?>" loading="lazy" class="card-img object-fit-cover cardGuideBig rounded-4 " alt="<?= $firstGuide->game_name ?>">
                                    </div>
                                    <div class="cardShadow">
                                        <div class="card-img-overlay d-flex flex-column justify-content-end">
                                            <p class="p-0 m-0">
                                                <span class="badge rounded-pill text-bg-danger p-2 px-4 mb-2 text-uppercase"><?= $firstGuide->label ?></span>
                                            </p>
                                            <div class="w-75">
                                                <a href="/controllers/articles/article-ctrl.php?id_article=<?= $firstGuide->id_article ?>&id_category=<?= $firstGuide->id_category ?>&id_game=<?= $firstGuide->id_game ?>" class="card-text fw-bold stretched-link  aCard text-wrap text-decoration-none text-light">
                                                    <?= $firstGuide->article_title ?>
                                                </a>
                                            </div>
                                            <div class="card-text mt-2">
                                                <small>
                                                    A <?= $firstGuide->formattedHour ?>
                                                    le <?= $firstGuide->formattedDate ?>
                                                    <?php if (!empty($firstGuide->countComments)) { ?>
                                                        <span class="badge rounded-pill text-uppercase bg-danger text-white mb-1 mx-1 border fw-semibold"><i class="bi bi-chat-right-dots text-white mx-1 align-middle"></i><?= $firstGuide->countComments ?></span>
                                                    <?php  } ?>
                                                    <span class="badge rounded-pill mb-1 border bg-transparent text-light fw-semibold text-uppercase"><?= $firstGuide->game_name ?></span>
                                                </small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- SIDECARD 1 -->
                            <?php foreach ($sideGuides as $sideGuide) { ?>
                                <div class="col-md-3 px-2">
                                    <div class="card rounded-4 border-0 cardGuideMin shadow" data-aos="fade-up" data-aos-duration="700">
                                        <img src="/public/uploads/article/<?= $sideGuide->article_picture ?>" loading="lazy" class="card-img-top rounded-4 h-50 object-fit-cover" alt="<?= $sideGuide->game_name ?>">
                                        <div class="card-body py-1 d-flex flex-column justify-content-center ">
                                            <p class="p-0 m-0">
                                                <span class="badge rounded-pill text-bg-danger p-2 px-4 mb-2 text-uppercase"><?= $sideGuide->label ?></span>
                                            </p>
                                            <a href="/controllers/articles/article-ctrl.php?id_article=<?= $sideGuide->id_article ?>&id_category=<?= $sideGuide->id_category ?>&id_game=<?= $sideGuide->id_game ?>" class="card-text mt-1 fw-bold stretched-link  aCardBig text-wrap text-decoration-none text-dark">
                                                <?= $sideGuide->article_title ?>
                                            </a>
                                            <div class="mt-1">
                                                <small class="text-muted">
                                                    A <?= $sideGuide->formattedHour ?>
                                                    le <?= $sideGuide->formattedDate ?>
                                                    <?php if (!empty($sideGuide->countComments)) { ?>
                                                        <span class="badge rounded-pill text-uppercase bg-danger text-white mb-1 mx-1 border fw-semibold"><i class="bi bi-chat-right-dots text-white mx-1 align-middle"></i><?= $sideGuide->countComments ?></span>
                                                    <?php  } ?>
                                                    <span class="badge rounded-pill border bg-transparent text-dark fw-semibold text-uppercase "><?= $sideGuide->game_name ?></span>
                                                </small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php } ?>
    <!-- FIN DES GUIDES  -->
    <!-- DEBUT DES JEUX DU MOMENT -->
    <section class="sectionContainer">
        <div class="container">
            <div class="row g-3 mt-3">
                <div class="col-10">
                    <h1 class="articleTitle text-uppercase fw-bold">Les jeux du moment</h1>
                </div>
                <div class="col-md-2 d-flex align-items-center justify-content-end">
                    <a href="/controllers/games-preview/games-ctrl.php" class="btn btn-danger btn-sm text-white rounded-4 buttonArticleSelectionGame fw-bold text-uppercase">
                        Tous les jeux
                        <i class="bi bi-arrow-right mx-2" aria-hidden="true"></i>
                    </a>
                </div>
                <div class="col-12">
                    <div class="row g-3">
                        <!-- CARD -->
                        <?php $counter = 1;
                        foreach ($firstThreeGames as $game) {
                            if ($game->id_game !== REGEX_GAME_TIPS) { ?>
                                <div class="col-md-4 col-12">
                                    <div class="card p-0 border-0 bg-transparent rounded-4" data-aos="fade-up" data-aos-duration="700">
                                        <div class="ratio ratio-1x1 ">
                                            <img src="/public/uploads/games/<?= $game->game_picture ?>" loading="lazy" class="object-fit-cover rounded-4" alt="<?= $game->game_name ?>">
                                        </div>
                                        <div class="card-img-overlay ">
                                            <span class="badge pillsGamesDiscover text-bg-dark bg-dark px-0"><?= $counter ?></span>
                                            <div class="card-body d-flex flex-column justify-content-end h-100 px-0 cardShadow">
                                                <a href="/controllers/games-preview/games-ctrl.php?id_game=<?= $game->id_game ?>" class="card-text stretchLinkHover fw-bold text-decoration-none text-light text-capitalize z-3 mb-3 stretched-link aCardMin"><?= $game->game_name ?></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        <?php $counter++;
                            }
                        } ?>
                    </div>
                    <div class="row">
                        <!-- CARD UNDER -->
                        <div class="col-12 flex-wrap d-flex justify-content-between">
                            <?php $counter = 4;
                            foreach ($gamesUnder as $game) { ?>
                                <div class="card cardGameDiscoverUnder mt-3 p-0 border-0 bg-transparent" data-aos="fade-up" data-aos-duration="700">
                                    <div class="card-img-top ratio ratio-1x1 cardGameDiscoverUnder">
                                        <img src="/public/uploads/games/<?= $game->game_picture ?>" loading="lazy" class="object-fit-cover rounded-4" alt="<?= $game->game_name ?>">
                                        <div class="p-3">
                                            <span class="badge pillsGamesDiscover text-bg-dark bg-dark px-0"><?= $counter ?></span>
                                        </div>
                                    </div>
                                    <div class="card-text p-0 mt-1">
                                        <a href="/controllers/games-preview/games-ctrl.php?id_game=<?= $game->id_game ?>" class="card-text stretchLinkHover fw-bold text-decoration-none text-dark text-capitalize stretched-link aCardMin"><?= $game->game_name ?></a>
                                    </div>
                                </div>
                            <?php $counter++;
                            } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- FIN DES JEUX DU MOMENT  -->
    <!-- DEBUT LES BONS PLANS -->
    <?php if (isset($firstTips)) { ?>
        <section class="sectionContainer">
            <div class="container">
                <div class="row g-3 mt-3">
                    <div class="col-md-10 col-12">
                        <h1 class="articleTitle text-uppercase fw-bold">Les bons plans</h1>
                    </div>
                    <div class="col-md-2 d-flex align-items-center justify-content-end">
                        <a href="/controllers/tips-list/tips-ctrl.php" class="btn btn-danger btn-sm text-white rounded-4 buttonArticleSelectionGame fw-bold text-uppercase">
                            les bons plans
                            <i class="bi bi-arrow-right mx-2" aria-hidden="true"></i>
                        </a>
                    </div>
                    <div class="col-12">
                        <div class="row g-3">
                            <!-- MAIN CARD LEFT -->
                            <div class="col-12 col-md-6">
                                <div class="card bg-dark text-white p-0 cardGuideLeft border-0 rounded-4 cardShadow" data-aos="fade-up" data-aos-duration="700">
                                    <img src="/public/uploads/article/<?= $firstTips->article_picture ?>" loading="lazy" class="card-img object-fit-cover rounded-4 w-100 h-100" alt="<?= $firstTips->label ?>">
                                    <div class="card-img-overlay d-flex flex-column justify-content-end">
                                        <p class="p-0 m-0">
                                            <span class="badge rounded-pill text-bg-primary p-2 px-4 mb-2 text-uppercase"><?= $firstTips->label ?></span>
                                        </p>
                                        <div class="w-100">
                                            <a href="/controllers/articles/article-ctrl.php?id_article=<?= $firstTips->id_article ?>&id_category=<?= $firstTips->id_category ?>&id_game=<?= $firstTips->id_game ?>" class="card-text fw-bold stretched-link aCard text-wrap text-decoration-none text-light">
                                                <?= $firstTips->article_title ?>
                                            </a>
                                        </div>
                                        <div class="card-text mt-2">
                                            <small>
                                                A <?= $firstTips->formattedHour ?>
                                                le <?= $firstTips->formattedDate ?>
                                                <?php if (!empty($firstTips->countComments)) { ?>
                                                    <span class="badge rounded-pill text-uppercase bg-primary text-white mb-1 mx-1 border fw-semibold"><i class="bi bi-chat-right-dots text-white mx-1 align-middle"></i><?= $firstTips->countComments ?></span>
                                                <?php  } ?>
                                            </small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-3 justify-content-between d-flex flex-column">
                                <!-- CARD PREMIERE COL -->
                                <?php foreach ($tips as $tip) { ?>
                                    <div class="card cardGuideRight bg-transparent border-0 overflow-hidden" data-aos="fade-up" data-aos-duration="700">
                                        <div class="row g-0 cardGuideRight">
                                            <div class="col-auto">
                                                <img src="/public/uploads/article/<?= $tip->article_picture ?>" loading="lazy" alt="<?= $tip->label ?>" class="imgGuideRight object-fit-cover rounded-4">
                                            </div>
                                            <div class="col-md-8 p-0 ">
                                                <div class="card-body w-100 cardGuideRight p-0 mx-2 d-flex flex-column">
                                                    <small class="card-text text-primary titlecardGuideRight fw-semibold m-0 p-0 text-uppercase"><?= $tip->label ?></small>
                                                    <div class="mt-1">
                                                        <a href="/controllers/articles/article-ctrl.php?id_article=<?= $tip->id_article ?>&id_category=<?= $tip->id_category ?>&id_game=<?= $tip->id_game ?>" class="card-text bodycardGuideRight stretchLinkHoverHome fw-semibold text-decoration-none text-dark stretched-link aCard">
                                                            <?= $tip->article_title ?>
                                                        </a>
                                                    </div>
                                                    <p class="card-text">
                                                        <small class="text-muted">
                                                            A <?= $tip->formattedHour ?>
                                                            le <?= $tip->formattedDate ?>
                                                            <?php if (!empty($tip->countComments)) { ?>
                                                                <span class="badge rounded-pill text-uppercase bg-primary text-white mb-1 mx-1 border fw-semibold"><i class="bi bi-chat-right-dots text-white mx-1 align-middle"></i><?= $tip->countComments ?></span>
                                                            <?php  } ?>
                                                        </small>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                            <!-- CARD DEUXIEME COL -->
                            <div class="col-3 d-flex justify-content-between flex-column">
                                <?php foreach ($tipsSecondCol as $tip) { ?>
                                    <div class="card cardGuideRight bg-transparent border-0 overflow-hidden" data-aos="fade-up" data-aos-duration="700">
                                        <div class="row g-0 cardGuideRight">
                                            <div class="col-auto">
                                                <img src="/public/uploads/article/<?= $tip->article_picture ?>" loading="lazy" alt="<?= $tip->label ?>" class="imgGuideRight object-fit-cover rounded-4">
                                            </div>
                                            <div class="col-md-8 col-12 p-0 ">
                                                <div class="card-body w-100 cardGuideRight p-0 mx-2 d-flex flex-column">
                                                    <small class="card-text text-primary titlecardGuideRight fw-semibold m-0 p-0 text-uppercase"><?= $tip->label ?></small>
                                                    <div class="mt-1">
                                                        <a href="/controllers/articles/article-ctrl.php?id_article=<?= $tip->id_article ?>&id_category=<?= $tip->id_category ?>&id_game=<?= $tip->id_game ?>" class="card-text bodycardGuideRight stretchLinkHoverHome fw-semibold text-decoration-none text-dark stretched-link aCard">
                                                            <?= $tip->article_title ?>
                                                        </a>
                                                    </div>
                                                    <p class="card-text">
                                                        <small class="text-muted">
                                                            A <?= $tip->formattedHour ?>
                                                            le <?= $tip->formattedDate ?>
                                                            <?php if (!empty($tip->countComments)) { ?>
                                                                <span class="badge rounded-pill text-uppercase bg-primary text-white mb-1 mx-1 border fw-semibold"><i class="bi bi-chat-right-dots text-white mx-1 align-middle"></i><?= $tip->countComments ?></span>
                                                            <?php  } ?>
                                                        </small>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php } ?>
    <!-- FIN LES BONS PLANS -->
    <!-- DEBUT TOP JEUX SELECTION -->
    <section class="sectionContainer">
        <div class="container">
            <div class="row g-3 mt-3">
                <?php foreach ($games as $game) { ?>
                    <div class="col-md-4">
                        <h2 class="fw-bold text-uppercase py-2 aCardMin text-danger"><?= $game->game_name ?></h2>
                        <div class="card rounded-4 border-0 shadow-lg" data-aos="fade-up" data-aos-duration="700">
                            <img src="/public/uploads/games/<?= $game->game_picture ?>" loading="lazy" class="card-img object-fit-cover cardSelection w-100 rounded-4" alt="<?= $game->game_name ?>">
                            <div class="card-img-overlay cardSelection d-flex flex-column justify-content-end cardShadow">
                                <p class="p-0 m-0 z-3">
                                    <a href="/controllers/articles-list/articles-ctrl.php?id_game=<?= $game->id_game ?>&id_category=<?= $game->id_category ?>" class="text-uppercase text-decoration-none fw-bold text-light z-3 stretched-link icon-link icon-link-hover">
                                        <?= $game->game_name ?>
                                        <i class="bi bi-arrow-right fs-5 d-flex" aria-hidden="true"></i>
                                    </a>
                                </p>
                            </div>
                            <div class="card-body p-3">
                                <!-- ARTICLE -->
                                <?php foreach ($allArticles as $key => $articles) {
                                    foreach ($articles as $article) {
                                        if ($game->id_game == $article->id_game) { ?>
                                            <p class="card-text d-flex align-items-center my-0">
                                                <i class="bi bi-arrow-right fs-5 text-danger" aria-hidden="true"></i>
                                                <a href="/controllers/articles/article-ctrl.php?id_article=<?= $article->id_article ?>&id_category=<?= $article->id_category ?>&id_game=<?= $article->id_game ?>" class="text-dark mx-2 text-decoration-none linkArticleSelectionGame fw-semibold icon-link icon-link-hover aCardMin">
                                                    <?= $article->article_title ?>
                                                </a>
                                            </p>
                                <?php }
                                    }
                                } ?>
                                <a href="/controllers/articles-list/articles-ctrl.php?id_game=<?= $game->id_game ?>&id_category=<?= $article->id_category ?>" class="btn btn-danger text-light w-100 rounded-4 buttonArticleSelectionGame p-1 fw-bold text-uppercase aCardMin mt-3 mb-1">
                                    Toutes les news sur : <?= $game->game_name ?>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php
                } ?>
            </div>
        </div>
    </section>
    <!-- FIN TOP JEUX SELECTION -->
    <!-- DEBUT SECTION EVENTS -->
    <?php if (!empty($events)) { ?>
        <section class="sectionContainer">
            <div class="container">
                <div class="row g-3 mt-3">
                    <div class="col-12 col-md-10">
                        <h1 class="articleTitle text-uppercase fw-bold">les événements à venir</h1>
                    </div>
                    <div class="col-md-2 d-flex align-items-center justify-content-end">
                        <a href="/controllers/calendar/calendar-ctrl.php" class="btn btn-danger btn-sm text-white rounded-4 buttonArticleSelectionGame fw-bold text-uppercase">
                            les événements
                            <i class="bi bi-arrow-right mx-2" aria-hidden="true"></i>
                        </a>
                    </div>
                    <!-- CARD EVENT 1 -->
                    <div class="col-12">
                        <div class="row g-3">
                            <?php foreach ($events as $event) { ?>
                                <div class="col-md-6">
                                    <div class="card text-bg-dark bg-transparent border-0 rounded-4 mb-3" data-aos="fade-up" data-aos-duration="700">
                                        <div class="ratio ratio-16x9 ">
                                            <img src="/public/uploads/events/<?= $event->event_picture ?>" loading="lazy" class="card-img object-fit-cover rounded-4 " alt="<?= $event->game_name ?>">
                                        </div>
                                        <div class="cardShadow">
                                            <div class="card-img-overlay d-flex flex-column justify-content-end">
                                                <p class="p-0 m-0">
                                                    <span class="badge rounded-pill pillsEvents text-bg-primary p-2 px-4 mb-2 text-uppercase">les événements</span>
                                                    <span class="badge rounded-pill text-bg-danger p-2 px-4 mb-2 text-uppercase"><?= $event->game_name ?></span>
                                                </p>
                                                <div class="w-75">
                                                    <a href="<?= $event->event_link ?>" target="_blank" class="card-text fw-bold stretched-link aCard text-wrap text-decoration-none text-light">
                                                        <?= $event->event_title ?>
                                                    </a>
                                                </div>
                                                <div class="card-text d-flex justify-content-between mt-2">
                                                    <small>
                                                        le <?= $event->formattedDate ?>
                                                    </small>
                                                    <small class="text-uppercase">
                                                        A <?= $event->place ?>
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php } ?>
    <!-- FIN SECTION EVENTS -->