<main>
    <section class="articlesSection py-5 bg-light">
        <div class="container">
            <section>
                <div class="row">
                    <div class="col-md-8 col-12">
                        <div class="row">
                            <div class="col-12 breadArticles">
                                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="/controllers/home-ctrl.php">Accueil</a></li>
                                        <li class="breadcrumb-item"><a href="/controllers/articles-preview/articles-ctrl.php">Preview Des Articles</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Les Articles</li>
                                    </ol>
                                </nav>
                            </div>
                            <div class="col-12 mt-3 justify-content-center d-flex flex-column align-items-center">
                                <?php if (!empty($articles)) { ?>
                                    <h2 class="h2 text-uppercase fw-bold text-center"><?= $id_category === REGEX_GUIDES ? 'LES GUIDES : ' : 'LES ARTICLES : ' ?><span class="text-danger"><?= $articles[0]->game_name ?></span></h2>
                                    <p class="text-center text-break mt-2">
                                        <?= htmlspecialchars(html_entity_decode($articles[0]->game_description)) ?>
                                    </p>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="col-12">
                            <hr class="hr">
                        </div>
                        <div class="col-12 p-0 py-3">
                            <?php foreach ($articles as $article) { ?>
                                <div class="card mb-4 border-0 bg-transparent cardsActus shadow-lg rounded-4" data-aos="fade-up" data-aos-duration="700">
                                    <div class="row g-0">
                                        <div class="col-md-4">
                                            <div class="ratio ratio-16x9">
                                                <img src="/public/uploads/article/<?= $article->article_picture ?>" loading="lazy" class="img-fluid object-fit-cover card-img-top imgActus shadow-lg rounded-start rounded-3" alt="<?= $article->article_picture ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body px-3 d-flex flex-column justify-content-end">
                                                <div>
                                                    <span class="badge rounded-pill text-bg-danger p-2 mb-2 text-uppercase"><?= $article->label ?></span>
                                                </div>
                                                <a href="/controllers/articles/article-ctrl.php?id_article=<?= $article->id_article ?>&id_category=<?= $article->id_category ?>&id_game=<?= $article->id_game  ?>" class="stretched-link mt-2 h5 aCard text-decoration-none card-title fw-bold stretchLinkHover">
                                                    <?= html_entity_decode($article->article_title) ?>
                                                </a>
                                                <p class="aCard mt-2">
                                                    <?= html_entity_decode($article->article_description) ?>
                                                </p>
                                                <div>
                                                    <hr class="hr">
                                                </div>
                                                <small>
                                                    A <?= $article->formattedHour ?> le <?= $article->formattedDate ?>
                                                    <?php if (!empty($article->countComments)) { ?>
                                                        <span class="badge rounded-pill text-uppercase mb-1 bg-danger mx-1 border text-white fw-semibold"><i class="bi bi-chat-right-dots mx-1 text-white align-middle"></i><?= $article->countComments ?></span>
                                                    <?php  } ?>
                                                    <span class="badge rounded-pill text-uppercase mb-1 border fw-semibold text-dark"><?= $article->game_name ?></span>
                                                </small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <nav aria-label="pagination">
                                <ul class="pagination justify-content-center mt-5">
                                    <li class="page-item">
                                        <a class="page-link text-dark" href="?page=<?= $currentPage - 1 ?>&id_game=<?= $id_game ?>&id_category=<?= $id_category ?>" aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                        </a>
                                    </li>
                                    <?php
                                    for ($page = 1; $page <= $nbPages; $page++) {
                                        $isActive = ($currentPage == $page) ? 'activePagination' : '';
                                    ?>
                                        <li class="page-item"><a class="page-link text-dark <?= $isActive ?>" href="?page=<?= $page ?>&id_game=<?= $id_game ?>&id_category=<?= $id_category ?>"><?= $page ?></a></li>
                                    <?php  } ?>
                                    <li class="page-item">
                                        <a class="page-link text-dark" href="?page=<?= $currentPage + 1 ?>&id_game=<?= $id_game ?>&id_category=<?= $id_category ?>" aria-label="Next">
                                            <span aria-hidden="true">&raquo;</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <!-- LES GUIDES -->
                    <?php if (isset($firstArticleSidebar)) { ?>
                        <div class="col-md-4 col-12 colGuideRight mt-3" data-aos="fade-up" data-aos-duration="700">
                            <div class="row mx-4 rounded-4">
                                <div class="col-12 widthColRightActu shadow-lg rounded-4">
                                    <div class="row">
                                        <div class="col-12 d-flex flex-row text-center align-items-center p-3">
                                            <i class="bi bi-book fs-1 px-2"></i>
                                            <h1 class="text-uppercase fw-bold fs-5"><?= $id_category == REGEX_ARTICLES_GAMES ? "<span class='text-danger'> Les guides :  </span>" . $firstArticleSidebar->game_name  : "<span class='text-danger'> Les articles : </span>" . $firstArticleSidebar->game_name ?></h1>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card mt-3 p-0 border-0 bg-transparent">
                                                <div class="card-img-top ratio ratio-16x9">
                                                    <img src="/public/uploads/article/<?= $firstArticleSidebar->article_picture ?>" class="object-fit-cover rounded-3" alt="<?= $firstArticleSidebar->game_name ?>">
                                                </div>
                                                <div class="card-body p-0 mt-1">
                                                    <a href="/controllers/articles/article-ctrl.php?id_article=<?= $firstArticleSidebar->id_article ?>&id_category=<?= $firstArticleSidebar->id_category ?>&id_game=<?= $firstArticleSidebar->id_game  ?>" class="card-text stretchLinkHover aCard fw-bold text-decoration-none text-dark stretched-link">
                                                        <?= html_entity_decode($firstArticleSidebar->article_title) ?>
                                                    </a>
                                                    <div class="card-text mb-3">
                                                        <small class="text-muted">
                                                            a <?= $firstArticleSidebar->formattedHour ?>
                                                            le <?= $firstArticleSidebar->formattedDate ?>
                                                        </small>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php foreach ($articlesSidebar as $article) { ?>
                                                <div class="card cardActuGuideRight bg-transparent border-0 overflow-hidden mt-2">
                                                    <div class="row g-0 cardActuGuideRight">
                                                        <div class="col-auto">
                                                            <img src="/public/uploads/article/<?= $article->article_picture ?>" alt="<?= $article->game_name ?>" class="imgActuGuideRight object-fit-cover rounded-3">
                                                        </div>
                                                        <div class="col-md-6 p-0 ">
                                                            <div class="card-body w-100 cardActuGuideRight p-0 mx-2 d-flex flex-column">
                                                                <div class="">
                                                                    <a href="/controllers/articles/article-ctrl.php?id_article=<?= $article->id_article ?>&id_category=<?= $article->id_category ?>&id_game=<?= $article->id_game  ?>" class="card-text bodycardGuideRight stretchLinkHover fw-semibold text-decoration-none text-dark stretched-link aCardBig">
                                                                        <?= $article->article_title ?>
                                                                    </a>
                                                                </div>
                                                                <p class="card-text">
                                                                    <small class="text-muted">
                                                                        a <?= $article->formattedHour ?>
                                                                        le <?= $article->formattedDate ?>
                                                                    </small>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                            <div class="d-flex justify-content-center mt-3 mb-4">
                                                <a href="?id_game=<?= $firstArticleSidebar->id_game . '&id_category=' . $firstArticleSidebar->id_category ?>" class="btn btn-danger w-100 rounded-4 p-1 fw-bold text-uppercase">
                                                    <?= $id_category == REGEX_ARTICLES_GAMES ? 'Les guides : ' . $firstArticleSidebar->game_name  : 'Les articles : ' . $firstArticleSidebar->game_name ?>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <!-- LES VIDEOS -->
                            <?php if (!empty($videos)) { ?>
                                <div class="mt-4"></div>
                                <div class="col-12 widthColRightVideo shadow-lg rounded-4" data-aos="fade-up" data-aos-duration="700">
                                    <div class="row">
                                        <div class="col-12 d-flex flex-row text-center align-items-center p-3">
                                            <i class="bi bi-play-circle fs-1 px-2"></i>
                                            <h1 class="text-uppercase fw-bold fs-5"><span class="text-warning">les vidéos : </span> <?= $videos[0]->game_name ?></h1>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <?php foreach ($videos as $video) { ?>
                                                <div class="card mt-3 p-0 border-0 bg-transparent">
                                                    <div class="card-img-top ratio ratio-16x9">
                                                        <iframe class="object-fit-cover rounded-3" src="<?= $video->game_video ?>" title="<?= $video->game_name ?>" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                                                    </div>
                                                    <div class="card-body p-0 mt-1 video-card">
                                                        <span class="card-text stretchLinkHover aCard fw-bold text-decoration-none text-dark stretched-link">
                                                            <?= $video->title_video ?>
                                                        </span>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            </div>
                        </div>
                </div>
            </section>
        </div>
    </section>