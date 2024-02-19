<main>
    <section class="articlesSection py-5 bg-light">
        <div class="container">
            <section>
                <div class="row">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-12">
                                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="/controllers/home-ctrl.php">Accueil</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Preview Des jeux</li>
                                    </ol>
                                </nav>
                            </div>
                            <?php if (!empty($articles[0])) { ?>
                                <div class="col-md-8 col-12 py-3">
                                    <h2 class="h2 text-uppercase fw-bold">Toutes les news <span class="text-danger"><?= !empty($id_game) ? $articles[0]->game_name : '' ?></span></h2>
                                </div>
                                <div class="col-md-4 col-12 btnTitle d-flex align-items-center justify-content-end">
                                    <?php if (!empty($id_game)) { ?>
                                        <a href="/controllers/articles-list/articles-ctrl.php?id_game=<?= $articles[0]->id_game ?>&id_category=<?= $articles[0]->id_category ?>" class="btn btn-danger btn-sm text-light rounded-4 buttonArticleSelectionGame fw-bold text-uppercase">
                                            Toutes les news : <?= $articles[0]->game_name ?>
                                            <i class="bi bi-arrow-right mx-2" aria-hidden="true"></i>
                                        </a>
                                    <?php } else {  ?>
                                        <a href="/controllers/articles-list/articles-ctrl.php" class="btn btn-danger btn-sm text-light rounded-4 buttonArticleSelectionGame fw-bold text-uppercase">
                                            Toutes les news
                                            <i class="bi bi-arrow-right mx-2" aria-hidden="true"></i>
                                        </a>
                                    <?php } ?>
                                </div>
                        </div>
                        <!-- CARD ACTU -->
                        <div class="row">
                            <div class="col-12 d-flex flex-wrap justify-content-between colActus">
                                <?php foreach ($articles as $article) { ?>
                                    <div class="card bg-transparent rounded-4 shadow-lg text-white p-0 cardActu border-0 cardShadow" data-aos="fade-up" data-aos-duration="700">
                                        <img src="/public/uploads/article/<?= $article->article_picture ?>" loading="lazy" class="card-img object-fit-cover rounded-4 h-100 w-100" alt="<?= $article->game_name ?>">
                                        <div class="card-img-overlay ">
                                            <span class="badge rounded-pill text-uppercase text-bg-danger p-2"><?= htmlspecialchars($article->game_name) ?></span>
                                            <div class="card-body d-flex flex-column justify-content-end h-100 p-0">
                                                <a href="/controllers/articles/article-ctrl.php?id_article=<?= $article->id_article ?>&id_category=<?= $article->id_category ?>&id_game=<?= $article->id_game ?>" class="lh-1 card-text fw-bold stretched-link aCard text-wrap text-wrap text-decoration-none text-light mb-1">
                                                    <?= html_entity_decode($article->article_title) ?>
                                                </a>
                                                <div class="card-text mb-3">
                                                    <small>
                                                        a <?= $article->formattedHour ?>
                                                        le <?= $article->formattedDate ?>
                                                        <?php if (!empty($article->countComments)) { ?>
                                                            <span class="badge rounded-pill text-uppercase bg-danger text-white mb-1 mx-1 border fw-semibold"><i class="bi bi-chat-right-dots text-white mx-1 align-middle"></i><?= $article->countComments ?></span>
                                                        <?php  } ?>
                                                        <span class="badge rounded-pill text-uppercase mb-1 border fw-semibold"><?= htmlspecialchars($article->game_name) ?></span>
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php  } ?>
                            </div>
                            <!-- CARD UNDER ACTU -->
                            <div class="col-12 d-flex flex-wrap justify-content-between colActus">
                                <?php foreach ($articlesUnder as $article) { ?>
                                    <div class="card cardActUnder rounded-4 mt-3 p-0 border-0 bg-transparent" data-aos="fade-up" data-aos-duration="700">
                                        <div class="card-img-top ratio ratio-16x9">
                                            <img src="/public/uploads/article/<?= $article->article_picture ?>" loading="lazy" class="card-img object-fit-cover rounded-4" alt="<?= $article->game_name ?>">
                                            <div class="p-3">
                                                <span class="badge rounded-pill text-uppercase text-bg-danger p-2"><?= htmlspecialchars($article->game_name) ?></span>
                                            </div>
                                        </div>
                                        <div class="card-body p-0 mt-1">
                                            <a href="/controllers/articles/article-ctrl.php?id_article=<?= $article->id_article ?>&id_category=<?= $article->id_category ?>&id_game=<?= $article->id_game  ?>" class="card-text stretchLinkHover fw-bold text-decoration-none text-dark stretched-link aCard">
                                                <?= $article->article_title ?>
                                            </a>
                                            <div class="card-text mb-3">
                                                <small class="text-muted">
                                                    a <?= $article->formattedHour ?>
                                                    le <?= $article->formattedDate ?>
                                                    <?php if (!empty($article->countComments)) { ?>
                                                        <span class="badge rounded-pill text-uppercase bg-danger text-white mb-1 mx-1 border fw-semibold"><i class="bi bi-chat-right-dots text-white mx-1 align-middle"></i><?= $article->countComments ?></span>
                                                    <?php  } ?>
                                                    <span class="badge rounded-pill text-uppercase mb-1 border text-dark fw-semibold"><?= htmlspecialchars($article->game_name) ?></span>
                                                </small>
                                            </div>
                                        </div>
                                    </div>
                                <?php }
                            } else { ?>
                                <div class="sectionContainer">
                                    <div class="col-12 col-md-9">
                                        <h1 class="articleTitle text-uppercase fw-bold">Pas de news en cours</span></h1>
                                    </div>
                                </div>
                            <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- LES GUIDES -->
            <section>
                <?php if (!empty($firstGuide)) { ?>
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-md-8 col-12 py-3 mt-5">
                                    <h2 class="h2 text-uppercase fw-bold">Tous les guides <span class="text-danger"><?= !empty($id_game) ? $firstGuide->game_name : '' ?></span></h2>
                                </div>
                                <div class="col-md-4 col-12 d-flex btnTitle align-items-center justify-content-end mt-5">
                                    <?php if (!empty($id_game)) { ?>
                                        <a href="/controllers/articles-list/articles-ctrl.php?id_game=<?= $firstGuide->id_game ?>&id_category=<?= $firstGuide->id_category ?>" class="btn btn-danger btn-sm text-light rounded-4 buttonArticleSelectionGame fw-bold text-uppercase">
                                            Tous les guides : <?= $firstGuide->game_name ?>
                                            <i class="bi bi-arrow-right mx-2" aria-hidden="true"></i>
                                        </a>
                                    <?php } else { ?>
                                        <a href="/controllers/articles-list/articles-ctrl.php" class="btn btn-danger btn-sm text-light rounded-4 buttonArticleSelectionGame fw-bold text-uppercase">
                                            Tous les guides
                                            <i class="bi bi-arrow-right mx-2" aria-hidden="true"></i>
                                        </a>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="card bg-dark text-white p-0 cardGuideLeft border-0 rounded-4 cardShadow" data-aos="fade-up" data-aos-duration="700">
                                        <img src="/public/uploads/article/<?= $firstGuide->article_picture ?>" loading="lazy" class="card-img object-fit-cover rounded-4 w-100 h-100" alt="<?= $firstGuide->game_name ?>">
                                        <div class="card-img-overlay d-flex flex-column justify-content-end">
                                            <p class="p-0 m-0">
                                                <span class="badge rounded-pill text-uppercase text-bg-danger p-2 px-4 mb-2"><?= $firstGuide->label ?></span>
                                            </p>
                                            <div>
                                                <a href="/controllers/articles/article-ctrl.php?id_article=<?= $firstGuide->id_article ?>&id_category=<?= $firstGuide->id_category ?>&id_game=<?= $firstGuide->id_game  ?>" class="card-text fw-bold stretched-link w-75 aCard text-wrap text-decoration-none text-light">
                                                    <?= $firstGuide->article_title ?>
                                                </a>
                                            </div>
                                            <div class="card-text mt-2">
                                                <small>
                                                    le <?= $firstGuide->formattedDate ?>
                                                    a <?= $firstGuide->formattedHour ?>
                                                    <?php if (!empty($firstGuide->countComments)) { ?>
                                                        <span class="badge rounded-pill text-uppercase bg-danger text-white mb-1 mx-1 border fw-semibold"><i class="bi bi-chat-right-dots text-white mx-1 align-middle"></i><?= $firstGuide->countComments ?></span>
                                                    <?php  } ?>
                                                    <span class="badge rounded-pill text-uppercase mb-1 border bg-transparent text-light fw-semibold"><?= $firstGuide->game_name ?></span>
                                                </small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-12 justify-content-between colGuideActus d-flex flex-column">
                                    <?php foreach ($guides as $guide) { ?>
                                        <div class="card cardGuideRight  bg-transparent border-0 overflow-hidden" data-aos="fade-up" data-aos-duration="700">
                                            <div class="row g-0 cardGuideRight">
                                                <div class="col-auto">
                                                    <img src="/public/uploads/article/<?= $guide->article_picture ?>" loading="lazy" alt="<?= $guide->game_name ?>" class="imgGuideRight object-fit-cover rounded-4">
                                                </div>
                                                <div class="col-md-8 p-0 ">
                                                    <div class="card-body w-100 cardGuideRight p-0 mx-2 d-flex flex-column">
                                                        <small class="card-text text-danger titlecardGuideRight text-uppercase fw-semibold m-0 p-0">Guide <?= $guide->game_name ?></small>
                                                        <div class="mt-1">
                                                            <a href="/controllers/articles/article-ctrl.php?id_article=<?= $guide->id_article ?>&id_category=<?= $guide->id_category ?>&id_game=<?= $guide->id_game  ?>" class="card-text bodycardGuideRight stretchLinkHover fw-semibold text-decoration-none text-dark stretched-link aCard">
                                                                <?= $guide->article_title ?>
                                                            </a>
                                                        </div>
                                                        <p class="card-text">
                                                            <small class="text-muted">
                                                                le <?= $guide->formattedDate ?>
                                                                a
                                                                <?= $guide->formattedHour ?>
                                                                <?php if (!empty($guide->countComments)) { ?>
                                                                    <span class="badge rounded-pill text-uppercase bg-danger text-white mb-1 mx-1 border fw-semibold"><i class="bi bi-chat-right-dots text-white mx-1 align-middle"></i><?= $guide->countComments ?></span>
                                                                <?php  } ?>
                                                                <span class="badge rounded-pill text-uppercase border bg-dark text-light fw-semibold"></span>
                                                            </small>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                                <div class="col-md-3 col-12 justify-content-between colGuideActus d-flex flex-column">
                                    <?php
                                    foreach ($guidesSecondCol as $guide) { ?>
                                        <div class="card cardGuideRight  bg-transparent border-0 overflow-hidden" data-aos="fade-up" data-aos-duration="700">
                                            <div class="row g-0 cardGuideRight">
                                                <div class="col-auto">
                                                    <img src="/public/uploads/article/<?= $guide->article_picture ?>" loading="lazy" alt="<?= $guide->game_name ?>" class="imgGuideRight object-fit-cover rounded-4">
                                                </div>
                                                <div class="col-md-8 p-0 ">
                                                    <div class="card-body w-100 cardGuideRight p-0 mx-2 d-flex flex-column">
                                                        <small class="card-text text-danger titlecardGuideRight text-uppercase fw-semibold m-0 p-0">Guide <?= $guide->game_name ?></small>
                                                        <div class="mt-1">
                                                            <a href="/controllers/articles/article-ctrl.php?id_article=<?= $guide->id_article ?>&id_category=<?= $guide->id_category ?>&id_game=<?= $guide->id_game ?>" class="card-text bodycardGuideRight stretchLinkHover fw-semibold text-decoration-none text-dark stretched-link aCard">
                                                                <?= $guide->article_title ?>
                                                            </a>
                                                        </div>
                                                        <p class="card-text">
                                                            <small class="text-muted">
                                                                le <?= $guide->formattedDate ?>
                                                                a
                                                                <?= $guide->formattedHour ?>
                                                                <?php if (!empty($guide->countComments)) { ?>
                                                                    <span class="badge rounded-pill text-uppercase bg-danger text-white mb-1 mx-1 border fw-semibold"><i class="bi bi-chat-right-dots text-white mx-1 align-middle"></i><?= $guide->countComments ?></span>
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
                <?php } else { ?>
                    <div class="sectionContainer">
                        <div class="col-12 col-md-9">
                            <h1 class="articleTitle text-uppercase fw-bold">Pas de guides en cours</span></h1>
                        </div>
                    </div>
                <?php } ?>
            </section>
            <!-- LES DERNIERES VIDEOS -->
            <?php if (!empty($firstVideo)) { ?>
                <section>
                    <div class="row mt-4">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-md-8 col-12 py-3 mt-5">
                                    <h2 class="h2 text-uppercase fw-bold">Toutes les vidéos <span class="text-danger"><?= !empty($id_game) ? $firstVideo->game_name : '' ?></span></h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card bg-dark text-white p-0 cardVideoPlayer rounded-4 border-0" data-aos="fade-up" data-aos-duration="700">
                                        <div class="ratio ratio-16x9">
                                            <iframe class="cardVideoPlayer rounded-4" src="<?= $firstVideo->game_video ?>" title="<?= $firstVideo->game_name ?>" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                                        </div>
                                        <div class="card-img-overlay d-flex flex-column justify-content-end py-0 cardShadow video-card">
                                            <p class="m-0 p-0 z-1">
                                                <span class="badge rounded-pill text-uppercase text-bg-danger p-2 px-4 mb-2"><?= $firstVideo->game_name ?></span>
                                            </p>
                                            <div class="z-1 1h-1 mb-3">
                                                <span class="card-text fw-bold text-wrap aCard text-decoration-none text-light">
                                                    <?= $firstVideo->title_video ?>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 d-flex flex-wrap justify-content-between ">
                            <?php foreach ($videos as $video) { ?>
                                <div class="card cardActUnder mt-3 p-0 border-0 bg-transparent" data-aos="fade-up" data-aos-duration="700">
                                    <iframe class="rounded-4 opacity-75" src="<?= $video->game_video ?>" title="<?= $video->game_name ?>" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                                    <div class="p-3 card-img-overlay video-card">
                                        <span class="badge rounded-pill text-uppercase text-bg-danger p-2"><?= $video->game_name ?></span>
                                    </div>
                                    <div class="card-body p-0 mt-1 video-card">
                                        <span class="card-text fw-bold text-decoration-none text-dark stretched-link aCard">
                                            <?= $video->title_video ?>
                                        </span>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </section>
            <?php } else { ?>
                <div class="sectionContainer">
                    <div class="col-12 col-md-9">
                        <h1 class="articleTitle text-uppercase fw-bold">Pas de vidéos disponible</span></h1>
                    </div>
                </div>
            <?php } ?>
            <!-- GAMES DISCOVER -->
            <?php if (!empty($events[0])) { ?>
                <section class="sectionContainer">
                    <div class="container">
                        <div class="row g-3 mt-3">
                            <div class="col-12 col-md-9">
                                <h1 class="articleTitle text-uppercase fw-bold">les événements à venir <span class="text-danger"><?= !empty($id_game) ? 'sur ' . $events[0]->game_name : '' ?></span></h1>
                            </div>
                            <div class="col-md-3 d-flex align-items-center justify-content-end">
                                <?php if (!empty($id_game)) { ?>
                                    <a href="/controllers/calendar/calendar-ctrl.php?id_game=<?= $events[0]->id_game ?>" class="btn btn-danger btn-sm text-white rounded-4 buttonArticleSelectionGame fw-bold text-uppercase">
                                        les événements : <?= $events[0]->game_name ?>
                                        <i class="bi bi-arrow-right mx-2" aria-hidden="true"></i>
                                    </a>
                                <?php } else { ?>
                                    <a href="/controllers/calendar/calendar-ctrl.php" class="btn btn-danger btn-sm text-white rounded-4 buttonArticleSelectionGame fw-bold text-uppercase">
                                        les événements
                                        <i class="bi bi-arrow-right mx-2" aria-hidden="true"></i>
                                    </a>
                                <?php } ?>
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
                                                            <a href="<?= $event->event_link ?>" class="card-text fw-bold stretched-link  aCard text-wrap text-decoration-none text-light">
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
            <?php } else { ?>
                <div class="sectionContainer">
                    <div class="col-12 col-md-9">
                        <h1 class="articleTitle text-uppercase fw-bold">Pas d'événements en cours</span></h1>
                    </div>
                </div>
            <?php } ?>
        </div>
    </section>