<main>
    <!-- début hero page  -->
    <section class="heroPage bg-light">
        <div class="h-100 d-flex align-items-center text-light">
            <div class="container-fluid p-0">
                <div class="row m-0 py-5">
                    <div class="col-12">
                        <div class="row align-items-center">
                            <div class="col-12 col-md-6 p-5">
                                <h1 class="text-center text-dark fw-bold lh-base">
                                    Plongez au cœur de l'action avec les dernières actualités FPS!
                                    Découvrez, jouez, et dominez dans l'univers des jeux de tir. Votre aventure commence ici !
                                </h1>
                                <?php if (empty($_SESSION['user'])) { ?>
                                    <div class="justify-content-center d-flex py-5">
                                        <a href="/controllers/login/sign-up-ctrl.php" class="btn btn-danger rounded-5 fw-bold text-uppercase p-3">Rejoignez-nous !</a>
                                    </div>
                                <?php  } ?>
                            </div>
                            <div class="col-12 col-md-6 p-0 bgHero">
                                <img src="/public/assets/img/infinitebg.jpg" loading="lazy" class="h-100 object-fit-cover img-fluid opacity-50" alt="GTA 6 Hero page">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- fin hero page  -->
    <!-- DEBUT DES DERNIERS ARTICLES  -->
    <section class="sectionContainer bg-light">
        <div class="container">
            <div class="row g-3 mt-3">
                <div class="col-md-10">
                    <h1 class="text-dark text-uppercase articleTitle fw-bold">Les derniers articles</h1>
                </div>
                <div class="col-md-2 d-flex  align-items-center justify-content-end">
                    <a href="/controllers/articles-preview/articles-ctrl.php" class="btn btn-danger btn-sm text-light rounded-4 buttonArticleSelectionGame fw-bold text-uppercase">
                        Tous les articles
                        <i class="bi bi-arrow-right mx-2" aria-hidden="true"></i>
                    </a>
                </div>
                <!-- MAIN CARD ARTICLE -->
                <div class="col-md-6">
                    <div class="card text-bg-dark border-0 rounded-4 cardArticleHome">
                        <div class="ratio ratio-16x9 ">
                            <img src="/public/uploads/article/<?= $articles[0]->article_picture ?>" loading="lazy" class="card-img object-fit-cover rounded-4 cardArticleHome" alt="<?= $articles[0]->game_name ?>">
                        </div>
                        <div class="cardShadow">
                            <div class="card-img-overlay d-flex flex-column justify-content-end">
                                <p class="p-0 m-0">
                                    <span class="badge rounded-pill text-bg-danger p-2 px-4 text-uppercase mb-2"><?= $articles[0]->game_name ?></span>
                                </p>
                                <div class="w-100">
                                    <a href="/controllers/articles/article-ctrl.php?id_article=<?= $articles[0]->id_article ?>&id_category=<?= $articles[0]->id_category ?>" class="card-text fw-bold stretched-link  aCard text-wrap text-decoration-none text-light">
                                        <?= $articles[0]->article_title ?>
                                    </a>
                                </div>
                                <div class="card-text mt-2">
                                    <small>il y a 47 minutes
                                        <span class="badge rounded-pill mb-1 mx-1 border bg-transparent text-light fw-semibold"><i class="bi bi-chat-right-dots mx-1 align-middle"></i>5</span>
                                        <span class="badge rounded-pill mb-1 border bg-transparent text-light fw-semibold">GTA 6</span>
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- UNDERCARD 1 -->
                    <?php array_shift($articles);
                    foreach ($articles as $article) { ?>
                        <div class="card mb-3 shadow border-0 cardArticleHomeMin rounded-4 mt-3">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="/public/assets/img/MWIII-REVEAL-FULL-TOUT.jpg" class="img-fluid rounded-4 object-fit-cover cardArticleHomeMin" alt="CALL OF DUTY MODERN WARFARE 3">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body py-1">
                                        <p class="p-0 m-0">
                                            <span class="badge rounded-pill text-bg-danger p-2 mt-1 px-4 mb-2"><?= $article->game_name ?></span>
                                        </p>
                                        <a href="#" class="card-text mt-1 fw-bold stretched-link aCard text-wrap text-decoration-none text-dark">
                                            <?= $article->article_title ?>
                                        </a>
                                        <div class="mt-1">
                                            <small class="text-muted">il y a 47 minutes
                                                <span class="badge rounded-pill mx-1 border bg-transparent text-dark fw-semibold"><i class="bi bi-chat-right-dots mx-1 align-middle"></i>5</span>
                                                <span class="badge rounded-pill border bg-transparent text-dark fw-semibold"><?= $article->game_name ?></span>
                                            </small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php  } ?>

                </div>
                <!-- SIDECARD 1 -->
                <div class="col-md-6">
                    <div class="card mb-3 shadow border-0 cardArticleHomeMin rounded-4">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="/public/assets/img/MWIII-REVEAL-FULL-TOUT.jpg" class="img-fluid rounded-4 object-fit-cover cardArticleHomeMin" alt="CALL OF DUTY MODERN WARFARE 3">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body py-1">
                                    <p class="p-0 m-0">
                                        <span class="badge rounded-pill text-bg-danger p-2 mt-1 px-4 mb-2">GTA 6</span>
                                    </p>
                                    <a href="#" class="card-text mt-1 fw-bold stretched-link  aCard text-wrap text-decoration-none text-dark">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, iure. Quidem ex repellendus fuga aliquid sapiente facere velit repudiandae, molestiae laboriosam nihil pariatur hic nam iusto id fugiat fugit a.
                                    </a>
                                    <div class="mt-1">
                                        <small class="text-muted">il y a 47 minutes
                                            <span class="badge rounded-pill mx-1 border bg-transparent text-dark fw-semibold"><i class="bi bi-chat-right-dots mx-1 align-middle"></i>5</span>
                                            <span class="badge rounded-pill border bg-transparent text-dark fw-semibold">GTA 6</span>
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- FIN DES ARTICLES -->
    <!-- LES DERNIERS GUIDES  -->
    <section class="sectionContainer bg-light">
        <div class="container">
            <div class="row g-3 mt-3">
                <div class="col-10">
                    <h1 class="text-dark text-uppercase fw-bold">Les derniers guides</h1>
                </div>
                <div class="col-md-2 d-flex align-items-center justify-content-end">
                    <a href="/controllers/guides-preview/guides-ctrl.php" class="btn btn-danger btn-sm text-light rounded-4 buttonArticleSelectionGame fw-bold text-uppercase">
                        Tous les guides
                        <i class="bi bi-arrow-right mx-2" aria-hidden="true"></i>
                    </a>
                </div>
                <div class="col-12">
                    <div class="row g-3">
                        <!-- MAIN CARD GUIDE -->
                        <div class="col-md-6 col-12 px-2">
                            <div class="card text-bg-dark border-0 rounded-4 bg-white cardGuideBig">
                                <div class="ratio ratio-16x9 ">
                                    <img src="/public/assets/img/gta-6-news-visu.jpg" class="card-img object-fit-cover cardGuideBig rounded-4 " alt="GTA 6">
                                </div>
                                <div class="cardShadow">
                                    <div class="card-img-overlay d-flex flex-column justify-content-end">
                                        <p class="p-0 m-0">
                                            <span class="badge rounded-pill text-bg-danger p-2 px-4 mb-2">GTA 6</span>
                                        </p>
                                        <div class="w-75">
                                            <a href="#" class="card-text fw-bold stretched-link  aCard text-wrap text-decoration-none text-light">
                                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, iure. Quidem ex repellendus fuga aliquid sapiente facere velit repudiandae, molestiae laboriosam nihil pariatur hic nam iusto id fugiat fugit a.
                                            </a>
                                        </div>
                                        <div class="card-text mt-2">
                                            <small>il y a 47 minutes
                                                <span class="badge rounded-pill mb-1 mx-1 border bg-transparent text-light fw-semibold"><i class="bi bi-chat-right-dots mx-1 align-middle"></i>5</span>
                                                <span class="badge rounded-pill mb-1 border bg-transparent text-light fw-semibold">GTA 6</span>
                                            </small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- SIDECARD 1 -->
                        <div class="col-md-3 px-2">
                            <div class="card rounded-4 border-0 cardGuideMin shadow">
                                <img src="/public/assets/img/MWII-S06-ANNOUNCEMENT-TOUT.jpg" class="card-img-top rounded-4 h-50 object-fit-cover" alt="CALL OF DUTY SAISON 6">
                                <div class="card-body py-1 d-flex flex-column justify-content-center ">
                                    <p class="p-0 m-0">
                                        <span class="badge rounded-pill text-bg-danger p-2 px-4 mb-2">COD MW 3</span>
                                    </p>
                                    <a href="#" class="card-text mt-1 fw-bold stretched-link  aCardBig text-wrap text-decoration-none text-dark">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, iure. Quidem ex repellendus fuga aliquid sapiente facere velit repudiandae, molestiae laboriosam nihil pariatur hic nam iusto id fugiat fugit a.
                                    </a>
                                    <div class="mt-1">
                                        <small class="text-muted">il y a 47 minutes
                                            <span class="badge rounded-pill mx-1 border bg-transparent text-dark fw-semibold"><i class="bi bi-chat-right-dots mx-1 align-middle"></i>5</span>
                                            <span class="badge rounded-pill border bg-transparent text-dark fw-semibold">GTA 6</span>
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- SIDECARD 2 -->
                        <div class="col-md-3 px-2">
                            <div class="card rounded-4 border-0 cardGuideMin shadow">
                                <img src="/public/assets/img/MWII-S06-ANNOUNCEMENT-TOUT.jpg" class="card-img-top rounded-4 h-50 object-fit-cover" alt="CALL OF DUTY SAISON 6">
                                <div class="card-body py-1 d-flex flex-column justify-content-center ">
                                    <p class="p-0 m-0">
                                        <span class="badge rounded-pill text-bg-danger p-2 px-4 mb-2">COD MW 3</span>
                                    </p>
                                    <a href="#" class="card-text mt-1 fw-bold stretched-link  aCardBig text-wrap text-decoration-none text-dark">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, iure. Quidem ex repellendus fuga aliquid sapiente facere velit repudiandae, molestiae laboriosam nihil pariatur hic nam iusto id fugiat fugit a.
                                    </a>
                                    <div class="mt-1">
                                        <small class="text-muted">il y a 47 minutes
                                            <span class="badge rounded-pill mx-1 border bg-transparent text-dark fw-semibold"><i class="bi bi-chat-right-dots mx-1 align-middle"></i>5</span>
                                            <span class="badge rounded-pill border bg-transparent text-dark fw-semibold">GTA 6</span>
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- UNDECARD 1 -->
                        <div class="col-md-3 px-2 mt-3">
                            <div class="card rounded-4 border-0 cardGuideMin shadow">
                                <img src="/public/assets/img/MWII-S06-ANNOUNCEMENT-TOUT.jpg" class="card-img-top rounded-4 h-50 object-fit-cover" alt="CALL OF DUTY SAISON 6">
                                <div class="card-body py-1 d-flex flex-column justify-content-center ">
                                    <p class="p-0 m-0">
                                        <span class="badge rounded-pill text-bg-danger p-2 px-4 mb-2">COD MW 3</span>
                                    </p>
                                    <a href="#" class="card-text mt-1 fw-bold stretched-link  aCardBig text-wrap text-decoration-none text-dark">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, iure. Quidem ex repellendus fuga aliquid sapiente facere velit repudiandae, molestiae laboriosam nihil pariatur hic nam iusto id fugiat fugit a.
                                    </a>
                                    <div class="mt-1">
                                        <small class="text-muted">il y a 47 minutes
                                            <span class="badge rounded-pill mx-1 border bg-transparent text-dark fw-semibold"><i class="bi bi-chat-right-dots mx-1 align-middle"></i>5</span>
                                            <span class="badge rounded-pill border bg-transparent text-dark fw-semibold">GTA 6</span>
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- UNDECARD 2 -->
                        <div class="col-md-3 px-2 mt-3">
                            <div class="card rounded-4 border-0 cardGuideMin shadow">
                                <img src="/public/assets/img/MWII-S06-ANNOUNCEMENT-TOUT.jpg" class="card-img-top rounded-4 h-50 object-fit-cover" alt="CALL OF DUTY SAISON 6">
                                <div class="card-body py-1 d-flex flex-column justify-content-center ">
                                    <p class="p-0 m-0">
                                        <span class="badge rounded-pill text-bg-danger p-2 px-4 mb-2">COD MW 3</span>
                                    </p>
                                    <a href="#" class="card-text mt-1 fw-bold stretched-link  aCardBig text-wrap text-decoration-none text-dark">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, iure. Quidem ex repellendus fuga aliquid sapiente facere velit repudiandae, molestiae laboriosam nihil pariatur hic nam iusto id fugiat fugit a.
                                    </a>
                                    <div class="mt-1">
                                        <small class="text-muted">il y a 47 minutes
                                            <span class="badge rounded-pill mx-1 border bg-transparent text-dark fw-semibold"><i class="bi bi-chat-right-dots mx-1 align-middle"></i>5</span>
                                            <span class="badge rounded-pill border bg-transparent text-dark fw-semibold">GTA 6</span>
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- UNDECARD 3 -->
                        <div class="col-md-3 px-2 mt-3">
                            <div class="card rounded-4 border-0 cardGuideMin shadow">
                                <img src="/public/assets/img/MWII-S06-ANNOUNCEMENT-TOUT.jpg" class="card-img-top rounded-4 h-50 object-fit-cover" alt="CALL OF DUTY SAISON 6">
                                <div class="card-body py-1 d-flex flex-column justify-content-center ">
                                    <p class="p-0 m-0">
                                        <span class="badge rounded-pill text-bg-danger p-2 px-4 mb-2">COD MW 3</span>
                                    </p>
                                    <a href="#" class="card-text mt-1 fw-bold stretched-link  aCardBig text-wrap text-decoration-none text-dark">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, iure. Quidem ex repellendus fuga aliquid sapiente facere velit repudiandae, molestiae laboriosam nihil pariatur hic nam iusto id fugiat fugit a.
                                    </a>
                                    <div class="mt-1">
                                        <small class="text-muted">il y a 47 minutes
                                            <span class="badge rounded-pill mx-1 border bg-transparent text-dark fw-semibold"><i class="bi bi-chat-right-dots mx-1 align-middle"></i>5</span>
                                            <span class="badge rounded-pill border bg-transparent text-dark fw-semibold">GTA 6</span>
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- UNDECARD 3-->
                        <div class="col-md-3 px-2 mt-3">
                            <div class="card rounded-4 border-0 cardGuideMin shadow">
                                <img src="/public/assets/img/MWII-S06-ANNOUNCEMENT-TOUT.jpg" class="card-img-top rounded-4 h-50 object-fit-cover" alt="CALL OF DUTY SAISON 6">
                                <div class="card-body py-1 d-flex flex-column justify-content-center ">
                                    <p class="p-0 m-0">
                                        <span class="badge rounded-pill text-bg-danger p-2 px-4 mb-2">COD MW 3</span>
                                    </p>
                                    <a href="#" class="card-text mt-1 fw-bold stretched-link  aCardBig text-wrap text-decoration-none text-dark">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, iure. Quidem ex repellendus fuga aliquid sapiente facere velit repudiandae, molestiae laboriosam nihil pariatur hic nam iusto id fugiat fugit a.
                                    </a>
                                    <div class="mt-1">
                                        <small class="text-muted">il y a 47 minutes
                                            <span class="badge rounded-pill mx-1 border bg-transparent text-dark fw-semibold"><i class="bi bi-chat-right-dots mx-1 align-middle"></i>5</span>
                                            <span class="badge rounded-pill border bg-transparent text-dark fw-semibold">GTA 6</span>
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- FIN DES GUIDES  -->
    <!-- DEBUT DES JEUX DU MOMENT -->
    <section class="sectionContainer">
        <div class="container">
            <div class="row g-3 mt-3">
                <div class="col-10">
                    <h1 class="articleTitle text-uppercase fw-bold">Les jeux du moment</h1>
                </div>
                <div class="col-md-2 d-flex align-items-center justify-content-end">
                    <a href="/controllers/games-preview/games-ctrl.php" class="btn btn-danger btn-sm text-light rounded-4 buttonArticleSelectionGame fw-bold text-uppercase">
                        Tous les jeux
                        <i class="bi bi-arrow-right mx-2" aria-hidden="true"></i>
                    </a>
                </div>
                <div class="col-12">
                    <div class="row g-3">
                        <!-- CARD N1 -->
                        <div class="col-md-4 col-12">
                            <div class="card p-0 border-0 bg-transparent rounded-4">
                                <div class="ratio ratio-1x1 ">
                                    <img src="/public/assets/img/toutes-infos-gta-vi.webp" class="object-fit-cover rounded-4" alt="Grand Theft Auto VI">
                                </div>
                                <div class="card-img-overlay ">
                                    <span class="badge pillsGamesDiscover text-bg-dark bg-dark px-0">1</span>
                                    <div class="card-body d-flex flex-column justify-content-end h-100 px-0 cardShadow">
                                        <a href="" class="card-text stretchLinkHover fw-bold text-decoration-none text-light text-capitalize z-3 mb-3 stretched-link aCardMin">Grand Theft Auto VI</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- CARD N2 -->
                        <div class="col-md-4 col-12">
                            <div class="card p-0 border-0 bg-transparent rounded-4">
                                <div class="ratio ratio-1x1">
                                    <img src="/public/assets/img/MWIII-REVEAL-FULL-TOUT.jpg" class="object-fit-cover rounded-4" alt="Call of Duty : MW 3">
                                </div>
                                <div class="card-img-overlay">
                                    <span class="badge pillsGamesDiscover text-bg-dark bg-dark px-0">2</span>
                                    <div class="card-body d-flex flex-column justify-content-end h-100 px-0 cardShadow">
                                        <a href="" class="card-text stretchLinkHover fw-bold text-decoration-none text-light text-capitalize z-3 mb-3 stretched-link aCardMin">Call of Duty : MW 3</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- CARD N3 -->
                        <div class="col-md-4 col-12">
                            <div class="card p-0 border-0 bg-transparent rounded-4">
                                <div class="ratio ratio-1x1">
                                    <img src="/public/assets/img/1329760.jpeg" class="object-fit-cover rounded-4" alt="Counter Strike 2">
                                </div>
                                <div class="card-img-overlay">
                                    <span class="badge pillsGamesDiscover text-bg-dark bg-dark px-0">3</span>
                                    <div class="card-body d-flex flex-column justify-content-end h-100 px-0 cardShadow">
                                        <a href="" class="card-text stretchLinkHover fw-bold text-decoration-none text-light text-capitalize z-3 mb-3 stretched-link aCardMin">Counter Strike 2</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- CARD UNDER N4 -->
                        <div class="col-12 flex-wrap d-flex justify-content-between">
                            <div class="card cardGameDiscoverUnder mt-3 p-0 border-0 bg-transparent">
                                <div class="card-img-top ratio ratio-1x1 cardGameDiscoverUnder">
                                    <img src="/public/assets/img/apex.jpg" class="object-fit-cover rounded-4" alt="Apex Legends">
                                    <div class="p-3">
                                        <span class="badge pillsGamesDiscover text-bg-dark bg-dark px-0">4</span>
                                    </div>
                                </div>
                                <div class="card-text p-0 mt-1">
                                    <a href="" class="card-text stretchLinkHover fw-bold text-decoration-none text-dark text-capitalize stretched-link aCardMin">Apex Legends</a>
                                </div>
                            </div>
                            <!-- CARD UNDER N5 -->
                            <div class="card cardGameDiscoverUnder mt-3 p-0 border-0 bg-transparent overflow-hidden">
                                <div class="card-img-top ratio ratio-1x1 cardGameDiscoverUnder">
                                    <img src="/public/assets/img/MWII-SEASON-01-ROADMAP-004.jpg" class="object-fit-cover rounded-4" alt="Call of duty : Warzone 2.0">
                                    <div class="p-3">
                                        <span class="badge pillsGamesDiscover text-bg-dark bg-dark px-0">5</span>
                                    </div>
                                </div>
                                <div class="card-text p-0 mt-1">
                                    <a href="" class="card-text stretchLinkHover fw-bold text-decoration-none text-dark stretched-link aCardMin text-capitalize">Call of duty : Warzone 2.0</a>
                                </div>
                            </div>
                            <!-- CARD UNDER N6 -->
                            <div class="card cardGameDiscoverUnder mt-3 p-0 border-0 bg-transparent">
                                <div class="card-img-top ratio ratio-1x1 cardGameDiscoverUnder">
                                    <img src="/public/assets/img/valorant.jpg" class="object-fit-cover rounded-4" alt="Valorant">
                                    <div class="p-3">
                                        <span class="badge pillsGamesDiscover text-bg-dark bg-dark px-0">6</span>
                                    </div>
                                </div>
                                <div class="card-text p-0 mt-1">
                                    <a href="" class="card-text stretchLinkHover fw-bold text-decoration-none text-dark text-capitalize stretched-link aCardMin">Valorant</a>
                                </div>
                            </div>
                            <!-- CARD UNDER N7 -->
                            <div class="card cardGameDiscoverUnder mt-3 p-0 border-0 bg-transparent">
                                <div class="card-img-top ratio ratio-1x1 cardGameDiscoverUnder">
                                    <img src="/public/assets/img/infinitebg.jpg" class="object-fit-cover rounded-4" alt="Halo Infinite">
                                    <div class="p-3">
                                        <span class="badge pillsGamesDiscover text-bg-dark bg-dark px-0">7</span>
                                    </div>
                                </div>
                                <div class="card-text p-0 mt-1">
                                    <a href="" class="card-text stretchLinkHover fw-bold text-decoration-none text-dark text-capitalize stretched-link aCardMin">Halo Infinite</a>
                                </div>
                            </div>
                            <!-- CARD UNDER N8 -->
                            <div class="card cardGameDiscoverUnder mt-3 p-0 border-0 bg-transparent">
                                <div class="card-img-top ratio ratio-1x1 cardGameDiscoverUnder">
                                    <img src="/public/assets/img/overwatch2.jpg" class="object-fit-cover rounded-4" alt="Overwatch 2">
                                    <div class="p-3">
                                        <span class="badge pillsGamesDiscover text-bg-dark bg-dark px-0">8</span>
                                    </div>
                                </div>
                                <div class="card-text p-0 mt-1">
                                    <a href="" class="card-text stretchLinkHover fw-bold text-decoration-none text-dark text-capitalize stretched-link aCardMin">Overwatch 2</a>
                                </div>
                            </div>
                            <!-- CARD UNDER N9 -->
                            <div class="card cardGameDiscoverUnder mt-3 p-0 border-0 bg-transparent">
                                <div class="card-img-top ratio ratio-1x1 cardGameDiscoverUnder">
                                    <img src="/public/assets/img/battlefield2042.jpg" class="object-fit-cover rounded-4" alt="Battlefield 2042">
                                    <div class="p-3">
                                        <span class="badge pillsGamesDiscover text-bg-dark bg-dark px-0">9</span>
                                    </div>
                                </div>
                                <div class="card-text p-0 mt-1">
                                    <a href="" class="card-text stretchLinkHover fw-bold text-decoration-none text-dark text-capitalize stretched-link aCardMin">Battlefield 2042</a>
                                </div>
                            </div>
                            <!-- CARD UNDER N10 -->
                            <div class="card cardGameDiscoverUnder mt-3 p-0 border-0 bg-transparent">
                                <div class="card-img-top ratio ratio-1x1 cardGameDiscoverUnder">
                                    <img src="/public/assets/img/borderlands3.jpg" class="object-fit-cover rounded-4" alt="Borderlands 3">
                                    <div class="p-3">
                                        <span class="badge pillsGamesDiscover text-bg-dark bg-dark px-0">10</span>
                                    </div>
                                </div>
                                <div class="card-text p-0 mt-1">
                                    <a href="" class="card-text stretchLinkHover fw-bold text-decoration-none text-dark text-capitalize stretched-link aCardMin">Borderlands 3</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- FIN DES JEUX DU MOMENT  -->
    <!-- DEBUT LES BONS PLANS -->
    <section class="sectionContainer">
        <div class="container">
            <div class="row g-3 mt-3">
                <div class="col-md-10 col-12">
                    <h1 class="articleTitle text-uppercase fw-bold">Les bons plans</h1>
                </div>
                <div class="col-md-2 d-flex align-items-center justify-content-end">
                    <a href="/controllers/tips-list/tips-ctrl.php" class="btn btn-danger btn-sm text-light rounded-4 buttonArticleSelectionGame fw-bold text-uppercase">
                        les bons plans
                        <i class="bi bi-arrow-right mx-2" aria-hidden="true"></i>
                    </a>
                </div>
                <div class="col-12">
                    <div class="row g-3">
                        <!-- MAIN CARD LEFT -->
                        <div class="col-12 col-md-6">
                            <div class="card bg-dark text-white p-0 cardGuideLeft border-0 rounded-4 cardShadow">
                                <img src="/public/assets/img/steelseries-rival-3-e1637581769996-891x500.jpg" class="card-img object-fit-cover rounded-4 w-100 h-100" alt="Stony Beach">
                                <div class="card-img-overlay d-flex flex-column justify-content-end">
                                    <p class="p-0 m-0">
                                        <span class="badge rounded-pill text-bg-primary p-2 px-4 mb-2 text-uppercase">bon plan</span>
                                    </p>
                                    <div class="w-75">
                                        <a href="#" class="card-text fw-bold stretched-link aCard text-wrap text-decoration-none text-light">
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, iure. Quidem ex repellendus fuga aliquid sapiente facere velit repudiandae, molestiae laboriosam nihil pariatur hic nam iusto id fugiat fugit a.
                                        </a>
                                    </div>
                                    <div class="card-text mt-2">
                                        <small>il y a 47 minutes
                                            <span class="badge rounded-pill border bg-dark text-light fw-semibold mx-1">PC</span>
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-3 justify-content-between d-flex flex-column">
                            <!-- CARD 1 PREMIERE COL -->
                            <div class="card cardGuideRight bg-transparent border-0 overflow-hidden">
                                <div class="row g-0 cardGuideRight">
                                    <div class="col-auto">
                                        <img src="/public/assets/img/gta-6-news-visu.jpg" alt="Trendy Pants and Shoes" class="imgGuideRight object-fit-cover rounded-4">
                                    </div>
                                    <div class="col-md-8 p-0 ">
                                        <div class="card-body w-100 cardGuideRight p-0 mx-2 d-flex flex-column">
                                            <small class="card-text text-primary titlecardGuideRight fw-semibold m-0 p-0 text-uppercase">bon plan</small>
                                            <div class="mt-1">
                                                <a href="#" class="card-text bodycardGuideRight stretchLinkHoverHome fw-semibold text-decoration-none text-dark stretched-link aCard">
                                                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Alias magnam hic molestias, consequuntur provident necessitatibus culpa laudantium asperiores, nemo similique quas saepe repudiandae voluptatem, perspiciatis earum animi. Obcaecati, voluptates itaque.
                                                </a>
                                            </div>
                                            <p class="card-text">
                                                <small class="text-muted">Il y a 5 heures
                                                    <span class="badge rounded-pill border bg-dark text-light fw-semibold">PC</span>
                                                </small>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- CARD 2 -->
                            <div class="card cardGuideRight bg-transparent border-0 overflow-hidden">
                                <div class="row g-0 cardGuideRight">
                                    <div class="col-auto">
                                        <img src="/public/assets/img/gta-6-news-visu.jpg" alt="Trendy Pants and Shoes" class="imgGuideRight object-fit-cover rounded-4">
                                    </div>
                                    <div class="col-md-8 col-12 p-0 ">
                                        <div class="card-body w-100 cardGuideRight p-0 mx-2 d-flex flex-column">
                                            <small class="card-text text-primary titlecardGuideRight fw-semibold m-0 p-0 text-uppercase">bon plan</small>
                                            <div class="mt-1">
                                                <a href="#" class="card-text bodycardGuideRight stretchLinkHoverHome fw-semibold text-decoration-none text-dark stretched-link aCard">
                                                    Les leaks de GTA 5 révèlent pas mal de choses...
                                                </a>
                                            </div>
                                            <p class="card-text">
                                                <small class="text-muted">Il y a 5 heures
                                                    <span class="badge rounded-pill border bg-dark text-light fw-semibold">PC</span>
                                                </small>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- CARD 3 -->
                            <div class="card cardGuideRight bg-transparent border-0 overflow-hidden">
                                <div class="row g-0 cardGuideRight">
                                    <div class="col-auto">
                                        <img src="/public/assets/img/gta-6-news-visu.jpg" alt="Trendy Pants and Shoes" class="imgGuideRight object-fit-cover rounded-4">
                                    </div>
                                    <div class="col-md-8 col-12 p-0 ">
                                        <div class="card-body w-100 cardGuideRight p-0 mx-2 d-flex flex-column">
                                            <small class="card-text text-primary titlecardGuideRight fw-semibold m-0 p-0 text-uppercase">bon plan</small>
                                            <div class="mt-1">
                                                <a href="#" class="card-text bodycardGuideRight stretchLinkHoverHome fw-semibold text-decoration-none text-dark stretched-link aCard">
                                                    Les leaks de GTA 5 révèlent pas mal de choses...
                                                </a>
                                            </div>
                                            <p class="card-text">
                                                <small class="text-muted">Il y a 5 heures
                                                    <span class="badge rounded-pill border bg-dark text-light fw-semibold">PC</span>
                                                </small>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- CARD 4 -->
                            <div class="card cardGuideRight bg-transparent border-0 overflow-hidden">
                                <div class="row g-0 cardGuideRight">
                                    <div class="col-auto">
                                        <img src="/public/assets/img/gta-6-news-visu.jpg" alt="Trendy Pants and Shoes" class="imgGuideRight object-fit-cover rounded-4">
                                    </div>
                                    <div class="col-md-8 col-12 p-0 ">
                                        <div class="card-body w-100 cardGuideRight p-0 mx-2 d-flex flex-column">
                                            <small class="card-text text-primary titlecardGuideRight fw-semibold m-0 p-0 text-uppercase">bon plan</small>
                                            <div class="mt-1">
                                                <a href="#" class="card-text bodycardGuideRight stretchLinkHoverHome fw-semibold text-decoration-none text-dark stretched-link aCard">
                                                    Les leaks de GTA 5 révèlent pas mal de choses...
                                                </a>
                                            </div>
                                            <p class="card-text">
                                                <small class="text-muted">Il y a 5 heures
                                                    <span class="badge rounded-pill border bg-dark text-light fw-semibold">PC</span>
                                                </small>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- CARD 5 DEUXIEME COL -->
                        <div class="col-3 d-flex justify-content-between flex-column">
                            <div class="card cardGuideRight bg-transparent border-0 overflow-hidden">
                                <div class="row g-0 cardGuideRight">
                                    <div class="col-auto">
                                        <img src="/public/assets/img/gta-6-news-visu.jpg" alt="Trendy Pants and Shoes" class="imgGuideRight object-fit-cover rounded-4">
                                    </div>
                                    <div class="col-md-8 col-12 p-0 ">
                                        <div class="card-body w-100 cardGuideRight p-0 mx-2 d-flex flex-column">
                                            <small class="card-text text-primary titlecardGuideRight fw-semibold m-0 p-0 text-uppercase">bon plan</small>
                                            <div class="mt-1">
                                                <a href="#" class="card-text bodycardGuideRight stretchLinkHoverHome fw-semibold text-decoration-none text-dark stretched-link aCard">
                                                    Les leaks de GTA 5 révèlent pas mal de choses...
                                                </a>
                                            </div>
                                            <p class="card-text">
                                                <small class="text-muted">Il y a 5 heures
                                                    <span class="badge rounded-pill border bg-dark text-light fw-semibold">PC</span>
                                                </small>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- CARD 6 -->
                            <div class="card cardGuideRight bg-transparent border-0 overflow-hidden">
                                <div class="row g-0 cardGuideRight">
                                    <div class="col-auto">
                                        <img src="/public/assets/img/gta-6-news-visu.jpg" alt="Trendy Pants and Shoes" class="imgGuideRight object-fit-cover rounded-4">
                                    </div>
                                    <div class="col-md-8 col-12 p-0 ">
                                        <div class="card-body w-100 cardGuideRight p-0 mx-2 d-flex flex-column">
                                            <small class="card-text text-primary titlecardGuideRight fw-semibold m-0 p-0 text-uppercase">bon plan</small>
                                            <div class="mt-1">
                                                <a href="#" class="card-text bodycardGuideRight stretchLinkHoverHome fw-semibold text-decoration-none text-dark stretched-link aCard">
                                                    Les leaks de GTA 5 révèlent pas mal de choses...
                                                </a>
                                            </div>
                                            <p class="card-text">
                                                <small class="text-muted">Il y a 5 heures
                                                    <span class="badge rounded-pill border bg-dark text-light fw-semibold">PC</span>
                                                </small>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- CARD 7 -->
                            <div class="card cardGuideRight bg-transparent border-0 overflow-hidden">
                                <div class="row g-0 cardGuideRight">
                                    <div class="col-auto">
                                        <img src="/public/assets/img/gta-6-news-visu.jpg" alt="Trendy Pants and Shoes" class="imgGuideRight object-fit-cover rounded-4">
                                    </div>
                                    <div class="col-md-8 col-12 p-0 ">
                                        <div class="card-body w-100 cardGuideRight p-0 mx-2 d-flex flex-column">
                                            <small class="card-text text-primary titlecardGuideRight fw-semibold m-0 p-0 text-uppercase">bon plan</small>
                                            <div class="mt-1">
                                                <a href="#" class="card-text bodycardGuideRight stretchLinkHoverHome fw-semibold text-decoration-none text-dark stretched-link aCard">
                                                    Les leaks de GTA 5 révèlent pas mal de choses...
                                                </a>
                                            </div>
                                            <p class="card-text">
                                                <small class="text-muted">Il y a 5 heures
                                                    <span class="badge rounded-pill border bg-dark text-light fw-semibold">PC</span>
                                                </small>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- CARD 8 -->
                            <div class="card cardGuideRight bg-transparent border-0 overflow-hidden">
                                <div class="row g-0 cardGuideRight">
                                    <div class="col-auto">
                                        <img src="/public/assets/img/gta-6-news-visu.jpg" alt="Trendy Pants and Shoes" class="imgGuideRight object-fit-cover rounded-4">
                                    </div>
                                    <div class="col-md-8 col-12 p-0 ">
                                        <div class="card-body w-100 cardGuideRight p-0 mx-2 d-flex flex-column">
                                            <small class="card-text text-primary titlecardGuideRight fw-semibold m-0 p-0 text-uppercase">bon plan</small>
                                            <div class="mt-1">
                                                <a href="#" class="card-text bodycardGuideRight stretchLinkHoverHome fw-semibold text-decoration-none text-dark stretched-link aCard">
                                                    Les leaks de GTA 5 révèlent pas mal de choses...
                                                </a>
                                            </div>
                                            <p class="card-text">
                                                <small class="text-muted">Il y a 5 heures
                                                    <span class="badge rounded-pill border bg-dark text-light fw-semibold">PC</span>
                                                </small>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- FIN LES BONS PLANS -->
    <!-- DEBUT TOP JEUX SELECTION -->
    <section class="sectionContainer">
        <div class="container">
            <div class="row g-3 mt-3">
                <div class="col-md-4">
                    <h2 class="fw-bold text-uppercase py-2 aCardMin">grand theft auto vi</h2>
                    <div class="card rounded-4 border-0 shadow ">
                        <img src="/public/assets/img/gta6.avif" class="card-img object-fit-cover cardSelection w-100 rounded-4" alt="CALL OF DUTY SAISON 6">
                        <div class="card-img-overlay cardSelection d-flex flex-column justify-content-end cardShadow">
                            <p class="p-0 m-0 z-3">
                                <a href="" class="text-uppercase text-decoration-none fw-bold text-light z-3 stretched-link icon-link icon-link-hover">
                                    Grand Theft auto vi
                                    <i class="bi bi-arrow-right fs-5 d-flex" aria-hidden="true"></i>
                                </a>
                            </p>
                            <div class="card-text z-3">
                                <small class="text-light">il y a 47 minutes
                                    <span class="badge rounded-pill mx-1 border bg-transparent text-light fw-semibold "><i class="bi bi-chat-right-dots mx-1 align-middle"></i>5</span>
                                </small>
                            </div>
                        </div>
                        <div class="card-body p-3">
                            <!-- ARTICLE 1 -->
                            <p class="card-text d-flex align-items-center my-0">
                                <i class="bi bi-arrow-right fs-5 text-danger" aria-hidden="true"></i>
                                <a href="" class="text-dark mx-2 text-decoration-none linkArticleSelectionGame fw-semibold icon-link icon-link-hover aCardMin">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi eveniet, quam deserunt corrupti id consequuntur iste provident nemo nulla dolor minus, quaerat laborum? Nisi error distinctio iste quam cum odio!i
                                </a>
                            </p>
                            <!-- ARTICLE 2 -->
                            <p class="card-text d-flex align-items-center my-0">
                                <i class="bi bi-arrow-right fs-5 text-danger" aria-hidden="true"></i>
                                <a href="" class="text-dark mx-2 text-decoration-none linkArticleSelectionGame fw-semibold icon-link icon-link-hover aCardMin">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi eveniet, quam deserunt corrupti id consequuntur iste provident nemo nulla dolor minus, quaerat laborum? Nisi error distinctio iste quam cum odio!i
                                </a>
                            </p>
                            <!-- ARTICLE 3 -->
                            <p class="card-text d-flex align-items-center my-0">
                                <i class="bi bi-arrow-right fs-5 text-danger" aria-hidden="true"></i>
                                <a href="" class="text-dark mx-2 text-decoration-none linkArticleSelectionGame fw-semibold icon-link icon-link-hover aCardMin">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi eveniet, quam deserunt corrupti id consequuntur iste provident nemo nulla dolor minus, quaerat laborum? Nisi error distinctio iste quam cum odio!i
                                </a>
                            </p>
                            <!-- ARTICLE 4 -->
                            <p class="card-text d-flex align-items-center my-0">
                                <i class="bi bi-arrow-right fs-5 text-danger" aria-hidden="true"></i>
                                <a href="" class="text-dark mx-2 text-decoration-none linkArticleSelectionGame fw-semibold icon-link icon-link-hover aCardMin">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi eveniet, quam deserunt corrupti id consequuntur iste provident nemo nulla dolor minus, quaerat laborum? Nisi error distinctio iste quam cum odio!i
                                </a>
                            </p>
                            <!-- ARTICLE 5 -->
                            <p class="card-text d-flex align-items-center my-0">
                                <i class="bi bi-arrow-right fs-5 text-danger" aria-hidden="true"></i>
                                <a href="" class="text-dark mx-2 text-decoration-none linkArticleSelectionGame fw-semibold icon-link icon-link-hover aCardMin">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi eveniet, quam deserunt corrupti id consequuntur iste provident nemo nulla dolor minus, quaerat laborum? Nisi error distinctio iste quam cum odio!i
                                </a>
                            </p>
                            <!-- ARTICLE 6 -->
                            <p class="card-text d-flex align-items-center my-0">
                                <i class="bi bi-arrow-right fs-5 text-danger" aria-hidden="true"></i>
                                <a href="" class="text-dark mx-2 text-decoration-none linkArticleSelectionGame fw-semibold icon-link icon-link-hover aCardMin">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi eveniet, quam deserunt corrupti id consequuntur iste provident nemo nulla dolor minus, quaerat laborum? Nisi error distinctio iste quam cum odio!i
                                </a>
                            </p>
                            <!-- ARTICLE 7 -->
                            <p class="card-text d-flex align-items-center my-0">
                                <i class="bi bi-arrow-right fs-5 text-danger" aria-hidden="true"></i>
                                <a href="" class="text-dark mx-2 text-decoration-none linkArticleSelectionGame fw-semibold icon-link icon-link-hover aCardMin">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi eveniet, quam deserunt corrupti id consequuntur iste provident nemo nulla dolor minus, quaerat laborum? Nisi error distinctio iste quam cum odio!i
                                </a>
                            </p>
                            <!-- ARTICLE 8 -->
                            <p class="card-text d-flex align-items-center my-0">
                                <i class="bi bi-arrow-right fs-5 text-danger" aria-hidden="true"></i>
                                <a href="" class="text-dark mx-2 text-decoration-none linkArticleSelectionGame fw-semibold icon-link icon-link-hover aCardMin">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi eveniet, quam deserunt corrupti id consequuntur iste provident nemo nulla dolor minus, quaerat laborum? Nisi error distinctio iste quam cum odio!i
                                </a>
                            </p>
                            <!-- ARTICLE 9 -->
                            <p class="card-text d-flex align-items-center my-0">
                                <i class="bi bi-arrow-right fs-5 text-danger" aria-hidden="true"></i>
                                <a href="" class="text-dark mx-2 text-decoration-none linkArticleSelectionGame fw-semibold icon-link icon-link-hover aCardMin">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi eveniet, quam deserunt corrupti id consequuntur iste provident nemo nulla dolor minus, quaerat laborum? Nisi error distinctio iste quam cum odio!i
                                </a>
                            </p>
                            <!-- ARTICLE 10 -->
                            <p class="card-text d-flex align-items-center my-0">
                                <i class="bi bi-arrow-right fs-5 text-danger" aria-hidden="true"></i>
                                <a href="" class="text-dark mx-2 text-decoration-none linkArticleSelectionGame fw-semibold icon-link icon-link-hover aCardMin">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi eveniet, quam deserunt corrupti id consequuntur iste provident nemo nulla dolor minus, quaerat laborum? Nisi error distinctio iste quam cum odio!i
                                </a>
                            </p>
                            <!-- BUTTON ARTICLE -->
                            <a href="#" class="btn btn-danger text-light w-100 rounded-4 buttonArticleSelectionGame p-1 fw-bold text-uppercase aCardMin mt-3 mb-1">
                                Tous les articles sur : Grand Theft Auto VI
                            </a>
                        </div>
                    </div>
                </div>
                <!-- DEUXIEME COL ARTICLE -->
                <div class="col-md-4 ">
                    <h2 class="fw-bold text-uppercase py-2 aCardMin">Call of duty : mw 3</h2>
                    <div class="card rounded-4 border-0 shadow ">
                        <img src="/public/assets/img/MWIII-REVEAL-FULL-TOUT.jpg" class="card-img object-fit-cover cardSelection w-100 rounded-4" alt="CALL OF DUTY SAISON 6">
                        <div class="card-img-overlay cardSelection d-flex flex-column justify-content-end cardShadow">
                            <p class="p-0 m-0 z-3">
                                <a href="" class="text-uppercase text-decoration-none fw-bold stretched-link text-light z-3 icon-link icon-link-hover">
                                    call of duty : modern warfare 3
                                    <i class="bi bi-arrow-right fs-5 d-flex" aria-hidden="true"></i>
                                </a>
                            </p>
                            <div class="card-text z-3">
                                <small class="text-light">il y a 47 minutes
                                    <span class="badge rounded-pill mx-1 border bg-transparent text-light fw-semibold "><i class="bi bi-chat-right-dots mx-1 align-middle"></i>5</span>
                                </small>
                            </div>
                        </div>
                        <div class="card-body p-3">
                            <!-- ARTICLE 1 -->
                            <p class="card-text d-flex align-items-center my-0">
                                <i class="bi bi-arrow-right fs-5 text-danger" aria-hidden="true"></i>
                                <a href="" class="text-dark mx-2 text-decoration-none linkArticleSelectionGame fw-semibold icon-link icon-link-hover aCardMin">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi eveniet, quam deserunt corrupti id consequuntur iste provident nemo nulla dolor minus, quaerat laborum? Nisi error distinctio iste quam cum odio!i
                                </a>
                            </p>
                            <!-- ARTICLE 2 -->
                            <p class="card-text d-flex align-items-center my-0">
                                <i class="bi bi-arrow-right fs-5 text-danger" aria-hidden="true"></i>
                                <a href="" class="text-dark mx-2 text-decoration-none linkArticleSelectionGame fw-semibold icon-link icon-link-hover aCardMin">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi eveniet, quam deserunt corrupti id consequuntur iste provident nemo nulla dolor minus, quaerat laborum? Nisi error distinctio iste quam cum odio!i
                                </a>
                            </p>
                            <!-- ARTICLE 3 -->
                            <p class="card-text d-flex align-items-center my-0">
                                <i class="bi bi-arrow-right fs-5 text-danger" aria-hidden="true"></i>
                                <a href="" class="text-dark mx-2 text-decoration-none linkArticleSelectionGame fw-semibold icon-link icon-link-hover aCardMin">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi eveniet, quam deserunt corrupti id consequuntur iste provident nemo nulla dolor minus, quaerat laborum? Nisi error distinctio iste quam cum odio!i
                                </a>
                            </p>
                            <!-- ARTICLE 4 -->
                            <p class="card-text d-flex align-items-center my-0">
                                <i class="bi bi-arrow-right fs-5 text-danger" aria-hidden="true"></i>
                                <a href="" class="text-dark mx-2 text-decoration-none linkArticleSelectionGame fw-semibold icon-link icon-link-hover aCardMin">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi eveniet, quam deserunt corrupti id consequuntur iste provident nemo nulla dolor minus, quaerat laborum? Nisi error distinctio iste quam cum odio!i
                                </a>
                            </p>
                            <!-- ARTICLE 5 -->
                            <p class="card-text d-flex align-items-center my-0">
                                <i class="bi bi-arrow-right fs-5 text-danger" aria-hidden="true"></i>
                                <a href="" class="text-dark mx-2 text-decoration-none linkArticleSelectionGame fw-semibold icon-link icon-link-hover aCardMin">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi eveniet, quam deserunt corrupti id consequuntur iste provident nemo nulla dolor minus, quaerat laborum? Nisi error distinctio iste quam cum odio!i
                                </a>
                            </p>
                            <!-- ARTICLE 6 -->
                            <p class="card-text d-flex align-items-center my-0">
                                <i class="bi bi-arrow-right fs-5 text-danger" aria-hidden="true"></i>
                                <a href="" class="text-dark mx-2 text-decoration-none linkArticleSelectionGame fw-semibold icon-link icon-link-hover aCardMin">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi eveniet, quam deserunt corrupti id consequuntur iste provident nemo nulla dolor minus, quaerat laborum? Nisi error distinctio iste quam cum odio!i
                                </a>
                            </p>
                            <!-- ARTICLE 7 -->
                            <p class="card-text d-flex align-items-center my-0">
                                <i class="bi bi-arrow-right fs-5 text-danger" aria-hidden="true"></i>
                                <a href="" class="text-dark mx-2 text-decoration-none linkArticleSelectionGame fw-semibold icon-link icon-link-hover aCardMin">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi eveniet, quam deserunt corrupti id consequuntur iste provident nemo nulla dolor minus, quaerat laborum? Nisi error distinctio iste quam cum odio!i
                                </a>
                            </p>
                            <!-- ARTICLE 8 -->
                            <p class="card-text d-flex align-items-center my-0">
                                <i class="bi bi-arrow-right fs-5 text-danger" aria-hidden="true"></i>
                                <a href="" class="text-dark mx-2 text-decoration-none linkArticleSelectionGame fw-semibold icon-link icon-link-hover aCardMin">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi eveniet, quam deserunt corrupti id consequuntur iste provident nemo nulla dolor minus, quaerat laborum? Nisi error distinctio iste quam cum odio!i
                                </a>
                            </p>
                            <!-- ARTICLE 9 -->
                            <p class="card-text d-flex align-items-center my-0">
                                <i class="bi bi-arrow-right fs-5 text-danger" aria-hidden="true"></i>
                                <a href="" class="text-dark mx-2 text-decoration-none linkArticleSelectionGame fw-semibold icon-link icon-link-hover aCardMin">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi eveniet, quam deserunt corrupti id consequuntur iste provident nemo nulla dolor minus, quaerat laborum? Nisi error distinctio iste quam cum odio!i
                                </a>
                            </p>
                            <!-- ARTICLE 10 -->
                            <p class="card-text d-flex align-items-center my-0">
                                <i class="bi bi-arrow-right fs-5 text-danger" aria-hidden="true"></i>
                                <a href="" class="text-dark mx-2 text-decoration-none linkArticleSelectionGame fw-semibold icon-link icon-link-hover aCardMin">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi eveniet, quam deserunt corrupti id consequuntur iste provident nemo nulla dolor minus, quaerat laborum? Nisi error distinctio iste quam cum odio!i
                                </a>
                            </p>
                            <!-- BUTTON ARTICLE -->
                            <a href="#" class="btn btn-danger text-light w-100 aCardMin rounded-4 buttonArticleSelectionGame p-1 fw-bold text-uppercase mt-3 mb-1">
                                Tous les articles sur : call of duty : modern warfare 3
                            </a>
                        </div>
                    </div>
                </div>
                <!-- TROISIEME COL ARTICLE -->
                <div class="col-md-4">
                    <h2 class="fw-bold text-uppercase py-2 aCardMin">Counter strike 2</h2>
                    <div class="card rounded-4 border-0 shadow ">
                        <img src="/public/assets/img/1329760.jpeg" class="card-img object-fit-cover cardSelection w-100 rounded-4" alt="CALL OF DUTY SAISON 6">
                        <div class="card-img-overlay cardSelection d-flex flex-column justify-content-end cardShadow">
                            <p class="p-0 m-0 z-3">
                                <a href="" class="text-uppercase text-decoration-none fw-bold stretched-link text-light z-3 icon-link icon-link-hover">
                                    Counter strike 2
                                    <i class="bi bi-arrow-right fs-5 d-flex" aria-hidden="true"></i>
                                </a>
                            </p>
                            <div class="card-text z-3">
                                <small class="text-light">il y a 47 minutes
                                    <span class="badge rounded-pill mx-1 border bg-transparent text-light fw-semibold "><i class="bi bi-chat-right-dots mx-1 align-middle"></i>5</span>
                                </small>
                            </div>
                        </div>
                        <div class="card-body p-3">
                            <!-- ARTICLE 1 -->
                            <p class="card-text d-flex align-items-center my-0">
                                <i class="bi bi-arrow-right fs-5 text-danger" aria-hidden="true"></i>
                                <a href="" class="text-dark mx-2 text-decoration-none linkArticleSelectionGame fw-semibold icon-link icon-link-hover aCardMin">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi eveniet, quam deserunt corrupti id consequuntur iste provident nemo nulla dolor minus, quaerat laborum? Nisi error distinctio iste quam cum odio!i
                                </a>
                            </p>
                            <!-- ARTICLE 2 -->
                            <p class="card-text d-flex align-items-center my-0">
                                <i class="bi bi-arrow-right fs-5 text-danger" aria-hidden="true"></i>
                                <a href="" class="text-dark mx-2 text-decoration-none linkArticleSelectionGame fw-semibold icon-link icon-link-hover aCardMin">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi eveniet, quam deserunt corrupti id consequuntur iste provident nemo nulla dolor minus, quaerat laborum? Nisi error distinctio iste quam cum odio!i
                                </a>
                            </p>
                            <!-- ARTICLE 3 -->
                            <p class="card-text d-flex align-items-center my-0">
                                <i class="bi bi-arrow-right fs-5 text-danger" aria-hidden="true"></i>
                                <a href="" class="text-dark mx-2 text-decoration-none linkArticleSelectionGame fw-semibold icon-link icon-link-hover aCardMin">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi eveniet, quam deserunt corrupti id consequuntur iste provident nemo nulla dolor minus, quaerat laborum? Nisi error distinctio iste quam cum odio!i
                                </a>
                            </p>
                            <!-- ARTICLE 4 -->
                            <p class="card-text d-flex align-items-center my-0">
                                <i class="bi bi-arrow-right fs-5 text-danger" aria-hidden="true"></i>
                                <a href="" class="text-dark mx-2 text-decoration-none linkArticleSelectionGame fw-semibold icon-link icon-link-hover aCardMin">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi eveniet, quam deserunt corrupti id consequuntur iste provident nemo nulla dolor minus, quaerat laborum? Nisi error distinctio iste quam cum odio!i
                                </a>
                            </p>
                            <!-- ARTICLE 5 -->
                            <p class="card-text d-flex align-items-center my-0">
                                <i class="bi bi-arrow-right fs-5 text-danger" aria-hidden="true"></i>
                                <a href="" class="text-dark mx-2 text-decoration-none linkArticleSelectionGame fw-semibold icon-link icon-link-hover aCardMin">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi eveniet, quam deserunt corrupti id consequuntur iste provident nemo nulla dolor minus, quaerat laborum? Nisi error distinctio iste quam cum odio!i
                                </a>
                            </p>
                            <!-- ARTICLE 6 -->
                            <p class="card-text d-flex align-items-center my-0">
                                <i class="bi bi-arrow-right fs-5 text-danger" aria-hidden="true"></i>
                                <a href="" class="text-dark mx-2 text-decoration-none linkArticleSelectionGame fw-semibold icon-link icon-link-hover aCardMin">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi eveniet, quam deserunt corrupti id consequuntur iste provident nemo nulla dolor minus, quaerat laborum? Nisi error distinctio iste quam cum odio!i
                                </a>
                            </p>
                            <!-- ARTICLE 7 -->
                            <p class="card-text d-flex align-items-center my-0">
                                <i class="bi bi-arrow-right fs-5 text-danger" aria-hidden="true"></i>
                                <a href="" class="text-dark mx-2 text-decoration-none linkArticleSelectionGame fw-semibold icon-link icon-link-hover aCardMin">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi eveniet, quam deserunt corrupti id consequuntur iste provident nemo nulla dolor minus, quaerat laborum? Nisi error distinctio iste quam cum odio!i
                                </a>
                            </p>
                            <!-- ARTICLE 8 -->
                            <p class="card-text d-flex align-items-center my-0">
                                <i class="bi bi-arrow-right fs-5 text-danger" aria-hidden="true"></i>
                                <a href="" class="text-dark mx-2 text-decoration-none linkArticleSelectionGame fw-semibold icon-link icon-link-hover aCardMin">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi eveniet, quam deserunt corrupti id consequuntur iste provident nemo nulla dolor minus, quaerat laborum? Nisi error distinctio iste quam cum odio!i
                                </a>
                            </p>
                            <!-- ARTICLE 9 -->
                            <p class="card-text d-flex align-items-center my-0">
                                <i class="bi bi-arrow-right fs-5 text-danger" aria-hidden="true"></i>
                                <a href="" class="text-dark mx-2 text-decoration-none linkArticleSelectionGame fw-semibold icon-link icon-link-hover aCardMin">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi eveniet, quam deserunt corrupti id consequuntur iste provident nemo nulla dolor minus, quaerat laborum? Nisi error distinctio iste quam cum odio!i
                                </a>
                            </p>
                            <!-- ARTICLE 10 -->
                            <p class="card-text d-flex align-items-center my-0">
                                <i class="bi bi-arrow-right fs-5 text-danger" aria-hidden="true"></i>
                                <a href="" class="text-dark mx-2 text-decoration-none linkArticleSelectionGame fw-semibold icon-link icon-link-hover aCardMin">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi eveniet, quam deserunt corrupti id consequuntur iste provident nemo nulla dolor minus, quaerat laborum? Nisi error distinctio iste quam cum odio!i
                                </a>
                            </p>
                            <!-- BUTTON ARTICLE -->
                            <a href="#" class="btn btn-danger text-light w-100 rounded-4 buttonArticleSelectionGame p-1 fw-bold text-uppercase mt-3 mb-1">
                                Tous les articles sur : counter strike 2
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- FIN TOP JEUX SELECTION -->
    <!-- DEBUT SECTION EVENTS -->
    <section class="sectionContainer">
        <div class="container">
            <div class="row g-3 mt-3">
                <div class="col-12 col-md-10">
                    <h1 class="articleTitle text-uppercase fw-bold">les événements à venir</h1>
                </div>
                <div class="col-md-2 d-flex align-items-center justify-content-end">
                    <a href="/controllers/calendar/calendar-ctrl.php" class="btn btn-danger btn-sm text-light rounded-4 buttonArticleSelectionGame fw-bold text-uppercase">
                        les événements
                        <i class="bi bi-arrow-right mx-2" aria-hidden="true"></i>
                    </a>
                </div>
                <!-- CARD EVENT 1 -->
                <div class="col-12">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="card text-bg-dark border-0 rounded-4">
                                <div class="ratio ratio-16x9 ">
                                    <img src="/public/assets/img/gta-6-news-visu.jpg" class="card-img object-fit-cover rounded-4 " alt="GTA 6">
                                </div>
                                <div class="cardShadow">
                                    <div class="card-img-overlay d-flex flex-column justify-content-end">
                                        <p class="p-0 m-0">
                                            <span class="badge rounded-pill pillsEvents text-bg-primary p-2 px-4 mb-2 text-uppercase">les événements</span>
                                            <span class="badge rounded-pill text-bg-danger p-2 px-4 mb-2 text-uppercase">GTA 6</span>
                                        </p>
                                        <div class="w-75">
                                            <a href="#" class="card-text fw-bold stretched-link  aCard text-wrap text-decoration-none text-light">
                                                La date de sortie du jeu est prévue pour le 4 avril 2025. Une date plausible, dans la mesure où Rockstar Games vient de confirmer qu'il faudrait attendre 2025 pour mettre la main sur GTA 6...
                                            </a>
                                        </div>
                                        <div class="card-text">
                                            <small>
                                                04-04-2025
                                            </small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- CARD EVENT 2 -->
                        <div class="col-md-6">
                            <div class="card text-bg-dark border-0 rounded-4">
                                <div class="ratio ratio-16x9 ">
                                    <img src="/public/assets/img/MWII-S06-ANNOUNCEMENT-TOUT.jpg" class="card-img object-fit-cover rounded-4 " alt="CALL OF DUTY">
                                </div>
                                <div class="cardShadow">
                                    <div class="card-img-overlay d-flex flex-column justify-content-end">
                                        <p class="p-0 m-0">
                                            <span class="badge rounded-pill pillsEvents text-bg-primary p-2 px-4 mb-2 text-uppercase">les événements</span>
                                            <span class="badge rounded-pill text-bg-danger p-2 px-4 mb-2 text-uppercase">cod</span>
                                        </p>
                                        <div class="w-75">
                                            <a href="#" class="card-text fw-bold stretched-link aCard text-wrap text-decoration-none text-light">
                                                Notes de correctif de la saison 6 de Call Of Duty : Modern Warfare II et de Warzone
                                            </a>
                                        </div>
                                        <div class="card-text">
                                            <small>
                                                27-09-2023
                                            </small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- CARD EVENT 3 -->
                        <div class="col-md-6">
                            <div class="card text-bg-dark border-0 rounded-4">
                                <div class="ratio ratio-16x9 ">
                                    <img src="/public/assets/img/valorant.jpg" class="card-img object-fit-cover rounded-4" alt="VALORANT">
                                </div>
                                <div class="cardShadow">
                                    <div class="card-img-overlay d-flex flex-column justify-content-end">
                                        <p class="p-0 m-0">
                                            <span class="badge rounded-pill pillsEvents text-bg-primary p-2 px-4 mb-2 text-uppercase">les événements</span>
                                            <span class="badge rounded-pill text-bg-warning p-2 px-4 mb-2 text-uppercase">valorant</span>
                                        </p>
                                        <div class="w-75">
                                            <a href="#" class="card-text fw-bold stretched-link aCard text-wrap text-decoration-none text-light">
                                                Valorant : Le prochain VCT Masters 2024 aura lieu à Shangaï !
                                            </a>
                                        </div>
                                        <div class="card-text">
                                            <small>
                                                2024
                                            </small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- CARD EVENT 4 -->
                        <div class="col-md-6 pb-4">
                            <div class="card text-bg-dark border-0 rounded-4">
                                <div class="ratio ratio-16x9 ">
                                    <img src="/public/assets/img/maugaow2.jpeg" class="card-img object-fit-cover rounded-4" alt="MAUGA OVERWATCH 2">
                                </div>
                                <div class="cardShadow">
                                    <div class="card-img-overlay d-flex flex-column justify-content-end">
                                        <p class="p-0 m-0">
                                            <span class="badge rounded-pill pillsEvents text-bg-primary p-2 px-4 mb-2 text-uppercase">les événements</span>
                                            <span class="badge rounded-pill text-bg-info p-2 px-4 mb-2 text-uppercase">overwatch 2</span>
                                        </p>
                                        <div class="w-75">
                                            <a href="#" class="card-text fw-bold stretched-link aCard text-wrap text-decoration-none text-light">
                                                Overwatch 2 : le Héros Mauga présenté en détails, déjà du teasing pour 2024 !
                                            </a>
                                        </div>
                                        <div class="card-text">
                                            <small>
                                                2024
                                            </small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- FIN SECTION EVENTS -->