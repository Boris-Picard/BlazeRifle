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
                <div class="col-md-12 col-12 px-2">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-8">
                                    <h2 class="fw-bold text-uppercase pt-5 aCardMin">grand theft auto vi</h2>
                                </div>
                                <div class="col-md-4 d-flex align-items-center justify-content-end pt-5">
                                    <a href="/controllers/guides-list//guides-ctrl.php" class="btn btn-danger btn-sm text-light rounded-4 buttonArticleSelectionGame fw-bold text-uppercase">
                                        Les guides GTA 6
                                        <i class="bi bi-arrow-right mx-2" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <?php foreach ($articles as $article) { ?>
                            <div class="col-md-3 px-2 mt-3">
                                <div class="card rounded-4 border-0 cardGuideMin shadow">
                                    <img src="/public/uploads/article/<?= $article->article_picture ?>" class="card-img-top rounded-4 h-50 object-fit-cover" alt="<?= $article->game_name ?>">
                                    <div class="card-body py-1 d-flex flex-column justify-content-center ">
                                        <p class="p-0 m-0">
                                            <span class="badge rounded-pill text-bg-danger p-2 px-4 mb-2"><?= $article->label ?></span>
                                        </p>
                                        <a href="/controllers/guides-list//guides-ctrl.php" class="card-text mt-1 fw-bold stretched-link  aCardBig text-wrap text-decoration-none text-dark">
                                            <?= $article->article_title ?>
                                        </a>
                                        <div class="mt-1">
                                            <small class="text-muted">
                                                le <?= $article->formattedDate ?>
                                                a <?= $article->formattedHour ?>
                                                <?php if (!empty($article->countComments = $countComments)) { ?>
                                                    <span class="badge rounded-pill mx-1 border bg-transparent text-dark fw-semibold"><i class="bi bi-chat-right-dots mx-1 align-middle"></i>5</span>
                                                <?php } ?>
                                                <span class="badge rounded-pill border bg-transparent text-dark fw-semibold"><?= $article->game_name ?></span>
                                            </small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="row">
                        <!-- CALL OF DUTY MW 3 -->
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-8">
                                    <h2 class="fw-bold text-uppercase pt-5 aCardMin">Call of Duty : MW 3</h2>
                                </div>
                                <div class="col-md-4 d-flex align-items-center justify-content-end pt-5">
                                    <a href="/controllers/guides-list//guides-ctrl.php" class="btn btn-danger btn-sm text-light rounded-4 buttonArticleSelectionGame fw-bold text-uppercase">
                                        Les guides Call Of Duty : MW 3
                                        <i class="bi bi-arrow-right mx-2" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 px-2 mt-3">
                            <div class="card rounded-4 border-0 cardGuideMin shadow">
                                <img src="/public/assets/img/MWIII-REVEAL-FULL-TOUT.jpg" class="card-img-top rounded-4 h-50 object-fit-cover" alt="Call of Duty : MW 3">
                                <div class="card-body py-1 d-flex flex-column justify-content-center ">
                                    <p class="p-0 m-0">
                                        <span class="badge rounded-pill text-bg-danger p-2 px-4 mb-2">GTA 6</span>
                                    </p>
                                    <a href="/controllers/guides-list//guides-ctrl.php" class="card-text mt-1 fw-bold stretched-link  aCardBig text-wrap text-decoration-none text-dark">
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
                        <div class="col-md-3 px-2 mt-3">
                            <div class="card rounded-4 border-0 cardGuideMin shadow">
                                <img src="/public/assets/img/MWIII-REVEAL-FULL-TOUT.jpg" class="card-img-top rounded-4 h-50 object-fit-cover" alt="Call of Duty : MW 3">
                                <div class="card-body py-1 d-flex flex-column justify-content-center ">
                                    <p class="p-0 m-0">
                                        <span class="badge rounded-pill text-bg-danger p-2 px-4 mb-2">Call of Duty : MW 3</span>
                                    </p>
                                    <a href="/controllers/guides-list//guides-ctrl.php" class="card-text mt-1 fw-bold stretched-link  aCardBig text-wrap text-decoration-none text-dark">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, iure. Quidem ex repellendus fuga aliquid sapiente facere velit repudiandae, molestiae laboriosam nihil pariatur hic nam iusto id fugiat fugit a.
                                    </a>
                                    <div class="mt-1">
                                        <small class="text-muted">il y a 47 minutes
                                            <span class="badge rounded-pill mx-1 border bg-transparent text-dark fw-semibold"><i class="bi bi-chat-right-dots mx-1 align-middle"></i>5</span>
                                            <span class="badge rounded-pill border bg-transparent text-dark fw-semibold">Call of Duty : MW 3</span>
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 px-2 mt-3">
                            <div class="card rounded-4 border-0 cardGuideMin shadow">
                                <img src="/public/assets/img/MWIII-REVEAL-FULL-TOUT.jpg" class="card-img-top rounded-4 h-50 object-fit-cover" alt="Call of Duty : MW 3">
                                <div class="card-body py-1 d-flex flex-column justify-content-center ">
                                    <p class="p-0 m-0">
                                        <span class="badge rounded-pill text-bg-danger p-2 px-4 mb-2">Call of Duty : MW 3</span>
                                    </p>
                                    <a href="/controllers/guides-list//guides-ctrl.php" class="card-text mt-1 fw-bold stretched-link  aCardBig text-wrap text-decoration-none text-dark">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, iure. Quidem ex repellendus fuga aliquid sapiente facere velit repudiandae, molestiae laboriosam nihil pariatur hic nam iusto id fugiat fugit a.
                                    </a>
                                    <div class="mt-1">
                                        <small class="text-muted">il y a 47 minutes
                                            <span class="badge rounded-pill mx-1 border bg-transparent text-dark fw-semibold"><i class="bi bi-chat-right-dots mx-1 align-middle"></i>5</span>
                                            <span class="badge rounded-pill border bg-transparent text-dark fw-semibold">Call of Duty : MW 3</span>
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 px-2 mt-3">
                            <div class="card rounded-4 border-0 cardGuideMin shadow">
                                <img src="/public/assets/img/MWIII-REVEAL-FULL-TOUT.jpg" class="card-img-top rounded-4 h-50 object-fit-cover" alt="Call of Duty : MW 3">
                                <div class="card-body py-1 d-flex flex-column justify-content-center ">
                                    <p class="p-0 m-0">
                                        <span class="badge rounded-pill text-bg-danger p-2 px-4 mb-2">Call of Duty : MW 3</span>
                                    </p>
                                    <a href="/controllers/guides-list//guides-ctrl.php" class="card-text mt-1 fw-bold stretched-link  aCardBig text-wrap text-decoration-none text-dark">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, iure. Quidem ex repellendus fuga aliquid sapiente facere velit repudiandae, molestiae laboriosam nihil pariatur hic nam iusto id fugiat fugit a.
                                    </a>
                                    <div class="mt-1">
                                        <small class="text-muted">il y a 47 minutes
                                            <span class="badge rounded-pill mx-1 border bg-transparent text-dark fw-semibold"><i class="bi bi-chat-right-dots mx-1 align-middle"></i>5</span>
                                            <span class="badge rounded-pill border bg-transparent text-dark fw-semibold">Call of Duty : MW 3</span>
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- COUNTER STRIKE 2 -->
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-8">
                                    <h2 class="fw-bold text-uppercase pt-5 aCardMin">Counter Strike 2</h2>
                                </div>
                                <div class="col-md-4 d-flex align-items-center justify-content-end pt-5">
                                    <a href="/controllers/guides-list//guides-ctrl.php" class="btn btn-danger btn-sm text-light rounded-4 buttonArticleSelectionGame fw-bold text-uppercase">
                                        Les guides Counter Strike 2
                                        <i class="bi bi-arrow-right mx-2" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 px-2 mt-3">
                            <div class="card rounded-4 border-0 cardGuideMin shadow">
                                <img src="/public/assets/img/1329760.jpeg" class="card-img-top rounded-4 h-50 object-fit-cover" alt="Counter Strike 2">
                                <div class="card-body py-1 d-flex flex-column justify-content-center ">
                                    <p class="p-0 m-0">
                                        <span class="badge rounded-pill text-bg-danger p-2 px-4 mb-2">Counter Strike 2</span>
                                    </p>
                                    <a href="/controllers/guides-list//guides-ctrl.php" class="card-text mt-1 fw-bold stretched-link  aCardBig text-wrap text-decoration-none text-dark">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, iure. Quidem ex repellendus fuga aliquid sapiente facere velit repudiandae, molestiae laboriosam nihil pariatur hic nam iusto id fugiat fugit a.
                                    </a>
                                    <div class="mt-1">
                                        <small class="text-muted">il y a 47 minutes
                                            <span class="badge rounded-pill mx-1 border bg-transparent text-dark fw-semibold"><i class="bi bi-chat-right-dots mx-1 align-middle"></i>5</span>
                                            <span class="badge rounded-pill border bg-transparent text-dark fw-semibold">Counter Strike 2</span>
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 px-2 mt-3">
                            <div class="card rounded-4 border-0 cardGuideMin shadow">
                                <img src="/public/assets/img/1329760.jpeg" class="card-img-top rounded-4 h-50 object-fit-cover" alt="Counter Strike 2">
                                <div class="card-body py-1 d-flex flex-column justify-content-center ">
                                    <p class="p-0 m-0">
                                        <span class="badge rounded-pill text-bg-danger p-2 px-4 mb-2">Counter Strike 2</span>
                                    </p>
                                    <a href="/controllers/guides-list//guides-ctrl.php" class="card-text mt-1 fw-bold stretched-link  aCardBig text-wrap text-decoration-none text-dark">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, iure. Quidem ex repellendus fuga aliquid sapiente facere velit repudiandae, molestiae laboriosam nihil pariatur hic nam iusto id fugiat fugit a.
                                    </a>
                                    <div class="mt-1">
                                        <small class="text-muted">il y a 47 minutes
                                            <span class="badge rounded-pill mx-1 border bg-transparent text-dark fw-semibold"><i class="bi bi-chat-right-dots mx-1 align-middle"></i>5</span>
                                            <span class="badge rounded-pill border bg-transparent text-dark fw-semibold">Counter Strike 2</span>
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 px-2 mt-3">
                            <div class="card rounded-4 border-0 cardGuideMin shadow">
                                <img src="/public/assets/img/1329760.jpeg" class="card-img-top rounded-4 h-50 object-fit-cover" alt="Counter Strike 2">
                                <div class="card-body py-1 d-flex flex-column justify-content-center ">
                                    <p class="p-0 m-0">
                                        <span class="badge rounded-pill text-bg-danger p-2 px-4 mb-2">Counter Strike 2</span>
                                    </p>
                                    <a href="/controllers/guides-list//guides-ctrl.php" class="card-text mt-1 fw-bold stretched-link  aCardBig text-wrap text-decoration-none text-dark">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, iure. Quidem ex repellendus fuga aliquid sapiente facere velit repudiandae, molestiae laboriosam nihil pariatur hic nam iusto id fugiat fugit a.
                                    </a>
                                    <div class="mt-1">
                                        <small class="text-muted">il y a 47 minutes
                                            <span class="badge rounded-pill mx-1 border bg-transparent text-dark fw-semibold"><i class="bi bi-chat-right-dots mx-1 align-middle"></i>5</span>
                                            <span class="badge rounded-pill border bg-transparent text-dark fw-semibold">Counter Strike 2</span>
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 px-2 mt-3">
                            <div class="card rounded-4 border-0 cardGuideMin shadow">
                                <img src="/public/assets/img/1329760.jpeg" class="card-img-top rounded-4 h-50 object-fit-cover" alt="Counter Strike 2">
                                <div class="card-body py-1 d-flex flex-column justify-content-center ">
                                    <p class="p-0 m-0">
                                        <span class="badge rounded-pill text-bg-danger p-2 px-4 mb-2">Counter Strike 2</span>
                                    </p>
                                    <a href="/controllers/guides-list//guides-ctrl.php" class="card-text mt-1 fw-bold stretched-link  aCardBig text-wrap text-decoration-none text-dark">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, iure. Quidem ex repellendus fuga aliquid sapiente facere velit repudiandae, molestiae laboriosam nihil pariatur hic nam iusto id fugiat fugit a.
                                    </a>
                                    <div class="mt-1">
                                        <small class="text-muted">il y a 47 minutes
                                            <span class="badge rounded-pill mx-1 border bg-transparent text-dark fw-semibold"><i class="bi bi-chat-right-dots mx-1 align-middle"></i>5</span>
                                            <span class="badge rounded-pill border bg-transparent text-dark fw-semibold">Counter Strike 2</span>
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- APEX LEGENDS -->
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-8">
                                    <h2 class="fw-bold text-uppercase pt-5 aCardMin">Apex Legends</h2>
                                </div>
                                <div class="col-md-4 d-flex align-items-center justify-content-end pt-5">
                                    <a href="/controllers/guides-list//guides-ctrl.php" class="btn btn-danger btn-sm text-light rounded-4 buttonArticleSelectionGame fw-bold text-uppercase">
                                        Les guides Apex Legends
                                        <i class="bi bi-arrow-right mx-2" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 px-2 mt-3">
                            <div class="card rounded-4 border-0 cardGuideMin shadow">
                                <img src="/public/assets/img/apex.jpg" class="card-img-top rounded-4 h-50 object-fit-cover" alt="Apex Legends">
                                <div class="card-body py-1 d-flex flex-column justify-content-center ">
                                    <p class="p-0 m-0">
                                        <span class="badge rounded-pill text-bg-danger p-2 px-4 mb-2">Apex Legends</span>
                                    </p>
                                    <a href="/controllers/guides-list//guides-ctrl.php" class="card-text mt-1 fw-bold stretched-link  aCardBig text-wrap text-decoration-none text-dark">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, iure. Quidem ex repellendus fuga aliquid sapiente facere velit repudiandae, molestiae laboriosam nihil pariatur hic nam iusto id fugiat fugit a.
                                    </a>
                                    <div class="mt-1">
                                        <small class="text-muted">il y a 47 minutes
                                            <span class="badge rounded-pill mx-1 border bg-transparent text-dark fw-semibold"><i class="bi bi-chat-right-dots mx-1 align-middle"></i>5</span>
                                            <span class="badge rounded-pill border bg-transparent text-dark fw-semibold">Apex Legends</span>
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 px-2 mt-3">
                            <div class="card rounded-4 border-0 cardGuideMin shadow">
                                <img src="/public/assets/img/apex.jpg" class="card-img-top rounded-4 h-50 object-fit-cover" alt="Apex Legends">
                                <div class="card-body py-1 d-flex flex-column justify-content-center ">
                                    <p class="p-0 m-0">
                                        <span class="badge rounded-pill text-bg-danger p-2 px-4 mb-2">Apex Legends</span>
                                    </p>
                                    <a href="/controllers/guides-list//guides-ctrl.php" class="card-text mt-1 fw-bold stretched-link  aCardBig text-wrap text-decoration-none text-dark">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, iure. Quidem ex repellendus fuga aliquid sapiente facere velit repudiandae, molestiae laboriosam nihil pariatur hic nam iusto id fugiat fugit a.
                                    </a>
                                    <div class="mt-1">
                                        <small class="text-muted">il y a 47 minutes
                                            <span class="badge rounded-pill mx-1 border bg-transparent text-dark fw-semibold"><i class="bi bi-chat-right-dots mx-1 align-middle"></i>5</span>
                                            <span class="badge rounded-pill border bg-transparent text-dark fw-semibold">Apex Legends</span>
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 px-2 mt-3">
                            <div class="card rounded-4 border-0 cardGuideMin shadow">
                                <img src="/public/assets/img/apex.jpg" class="card-img-top rounded-4 h-50 object-fit-cover" alt="Apex Legends">
                                <div class="card-body py-1 d-flex flex-column justify-content-center ">
                                    <p class="p-0 m-0">
                                        <span class="badge rounded-pill text-bg-danger p-2 px-4 mb-2">Apex Legends</span>
                                    </p>
                                    <a href="/controllers/guides-list//guides-ctrl.php" class="card-text mt-1 fw-bold stretched-link  aCardBig text-wrap text-decoration-none text-dark">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, iure. Quidem ex repellendus fuga aliquid sapiente facere velit repudiandae, molestiae laboriosam nihil pariatur hic nam iusto id fugiat fugit a.
                                    </a>
                                    <div class="mt-1">
                                        <small class="text-muted">il y a 47 minutes
                                            <span class="badge rounded-pill mx-1 border bg-transparent text-dark fw-semibold"><i class="bi bi-chat-right-dots mx-1 align-middle"></i>5</span>
                                            <span class="badge rounded-pill border bg-transparent text-dark fw-semibold">Apex Legends</span>
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 px-2 mt-3">
                            <div class="card rounded-4 border-0 cardGuideMin shadow">
                                <img src="/public/assets/img/apex.jpg" class="card-img-top rounded-4 h-50 object-fit-cover" alt="Apex Legends">
                                <div class="card-body py-1 d-flex flex-column justify-content-center ">
                                    <p class="p-0 m-0">
                                        <span class="badge rounded-pill text-bg-danger p-2 px-4 mb-2">Apex Legends</span>
                                    </p>
                                    <a href="/controllers/guides-list//guides-ctrl.php" class="card-text mt-1 fw-bold stretched-link  aCardBig text-wrap text-decoration-none text-dark">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, iure. Quidem ex repellendus fuga aliquid sapiente facere velit repudiandae, molestiae laboriosam nihil pariatur hic nam iusto id fugiat fugit a.
                                    </a>
                                    <div class="mt-1">
                                        <small class="text-muted">il y a 47 minutes
                                            <span class="badge rounded-pill mx-1 border bg-transparent text-dark fw-semibold"><i class="bi bi-chat-right-dots mx-1 align-middle"></i>5</span>
                                            <span class="badge rounded-pill border bg-transparent text-dark fw-semibold">Apex Legends</span>
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- CALL OF DUTY WARZONE 2 -->
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-8">
                                    <h2 class="fw-bold text-uppercase pt-5 aCardMin">Call Of Duty : Warzone 2</h2>
                                </div>
                                <div class="col-md-4 d-flex align-items-center justify-content-end pt-5">
                                    <a href="/controllers/guides-list//guides-ctrl.php" class="btn btn-danger btn-sm text-light rounded-4 buttonArticleSelectionGame fw-bold text-uppercase">
                                        Les guides Call Of Duty : Warzone 2
                                        <i class="bi bi-arrow-right mx-2" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 px-2 mt-3">
                            <div class="card rounded-4 border-0 cardGuideMin shadow">
                                <img src="/public/assets/img/MWII-SEASON-01-ROADMAP-004.jpg" class="card-img-top rounded-4 h-50 object-fit-cover" alt="Call Of Duty : Warzone 2">
                                <div class="card-body py-1 d-flex flex-column justify-content-center ">
                                    <p class="p-0 m-0">
                                        <span class="badge rounded-pill text-bg-danger p-2 px-4 mb-2">Call Of Duty : Warzone 2</span>
                                    </p>
                                    <a href="/controllers/guides-list//guides-ctrl.php" class="card-text mt-1 fw-bold stretched-link  aCardBig text-wrap text-decoration-none text-dark">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, iure. Quidem ex repellendus fuga aliquid sapiente facere velit repudiandae, molestiae laboriosam nihil pariatur hic nam iusto id fugiat fugit a.
                                    </a>
                                    <div class="mt-1">
                                        <small class="text-muted">il y a 47 minutes
                                            <span class="badge rounded-pill mx-1 border bg-transparent text-dark fw-semibold"><i class="bi bi-chat-right-dots mx-1 align-middle"></i>5</span>
                                            <span class="badge rounded-pill border bg-transparent text-dark fw-semibold">Call Of Duty Warzone 2</span>
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 px-2 mt-3">
                            <div class="card rounded-4 border-0 cardGuideMin shadow">
                                <img src="/public/assets/img/MWII-SEASON-01-ROADMAP-004.jpg" class="card-img-top rounded-4 h-50 object-fit-cover" alt="Call Of Duty : Warzone 2">
                                <div class="card-body py-1 d-flex flex-column justify-content-center ">
                                    <p class="p-0 m-0">
                                        <span class="badge rounded-pill text-bg-danger p-2 px-4 mb-2">Call Of Duty : Warzone 2</span>
                                    </p>
                                    <a href="/controllers/guides-list//guides-ctrl.php" class="card-text mt-1 fw-bold stretched-link  aCardBig text-wrap text-decoration-none text-dark">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, iure. Quidem ex repellendus fuga aliquid sapiente facere velit repudiandae, molestiae laboriosam nihil pariatur hic nam iusto id fugiat fugit a.
                                    </a>
                                    <div class="mt-1">
                                        <small class="text-muted">il y a 47 minutes
                                            <span class="badge rounded-pill mx-1 border bg-transparent text-dark fw-semibold"><i class="bi bi-chat-right-dots mx-1 align-middle"></i>5</span>
                                            <span class="badge rounded-pill border bg-transparent text-dark fw-semibold">Call Of Duty Warzone 2</span>
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 px-2 mt-3">
                            <div class="card rounded-4 border-0 cardGuideMin shadow">
                                <img src="/public/assets/img/MWII-SEASON-01-ROADMAP-004.jpg" class="card-img-top rounded-4 h-50 object-fit-cover" alt="Call Of Duty : Warzone 2">
                                <div class="card-body py-1 d-flex flex-column justify-content-center ">
                                    <p class="p-0 m-0">
                                        <span class="badge rounded-pill text-bg-danger p-2 px-4 mb-2">Call Of Duty : Warzone 2</span>
                                    </p>
                                    <a href="/controllers/guides-list//guides-ctrl.php" class="card-text mt-1 fw-bold stretched-link  aCardBig text-wrap text-decoration-none text-dark">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, iure. Quidem ex repellendus fuga aliquid sapiente facere velit repudiandae, molestiae laboriosam nihil pariatur hic nam iusto id fugiat fugit a.
                                    </a>
                                    <div class="mt-1">
                                        <small class="text-muted">il y a 47 minutes
                                            <span class="badge rounded-pill mx-1 border bg-transparent text-dark fw-semibold"><i class="bi bi-chat-right-dots mx-1 align-middle"></i>5</span>
                                            <span class="badge rounded-pill border bg-transparent text-dark fw-semibold">Call Of Duty Warzone 2</span>
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 px-2 mt-3">
                            <div class="card rounded-4 border-0 cardGuideMin shadow">
                                <img src="/public/assets/img/MWII-SEASON-01-ROADMAP-004.jpg" class="card-img-top rounded-4 h-50 object-fit-cover" alt="Call Of Duty : Warzone 2">
                                <div class="card-body py-1 d-flex flex-column justify-content-center ">
                                    <p class="p-0 m-0">
                                        <span class="badge rounded-pill text-bg-danger p-2 px-4 mb-2">Call Of Duty : Warzone 2</span>
                                    </p>
                                    <a href="/controllers/guides-list//guides-ctrl.php" class="card-text mt-1 fw-bold stretched-link  aCardBig text-wrap text-decoration-none text-dark">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, iure. Quidem ex repellendus fuga aliquid sapiente facere velit repudiandae, molestiae laboriosam nihil pariatur hic nam iusto id fugiat fugit a.
                                    </a>
                                    <div class="mt-1">
                                        <small class="text-muted">il y a 47 minutes
                                            <span class="badge rounded-pill mx-1 border bg-transparent text-dark fw-semibold"><i class="bi bi-chat-right-dots mx-1 align-middle"></i>5</span>
                                            <span class="badge rounded-pill border bg-transparent text-dark fw-semibold">Call Of Duty Warzone 2</span>
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- VALORANT -->
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-8">
                                    <h2 class="fw-bold text-uppercase pt-5 aCardMin">Valorant</h2>
                                </div>
                                <div class="col-md-4 d-flex align-items-center justify-content-end pt-5">
                                    <a href="/controllers/guides-list//guides-ctrl.php" class="btn btn-danger btn-sm text-light rounded-4 buttonArticleSelectionGame fw-bold text-uppercase">
                                        Les guides Valorant
                                        <i class="bi bi-arrow-right mx-2" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 px-2 mt-3">
                            <div class="card rounded-4 border-0 cardGuideMin shadow">
                                <img src="/public/assets/img/valorant.jpg" class="card-img-top rounded-4 h-50 object-fit-cover" alt="Valorant">
                                <div class="card-body py-1 d-flex flex-column justify-content-center ">
                                    <p class="p-0 m-0">
                                        <span class="badge rounded-pill text-bg-danger p-2 px-4 mb-2">Valorant</span>
                                    </p>
                                    <a href="/controllers/guides-list//guides-ctrl.php" class="card-text mt-1 fw-bold stretched-link  aCardBig text-wrap text-decoration-none text-dark">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, iure. Quidem ex repellendus fuga aliquid sapiente facere velit repudiandae, molestiae laboriosam nihil pariatur hic nam iusto id fugiat fugit a.
                                    </a>
                                    <div class="mt-1">
                                        <small class="text-muted">il y a 47 minutes
                                            <span class="badge rounded-pill mx-1 border bg-transparent text-dark fw-semibold"><i class="bi bi-chat-right-dots mx-1 align-middle"></i>5</span>
                                            <span class="badge rounded-pill border bg-transparent text-dark fw-semibold">Valorant</span>
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 px-2 mt-3">
                            <div class="card rounded-4 border-0 cardGuideMin shadow">
                                <img src="/public/assets/img/valorant.jpg" class="card-img-top rounded-4 h-50 object-fit-cover" alt="Valorant">
                                <div class="card-body py-1 d-flex flex-column justify-content-center ">
                                    <p class="p-0 m-0">
                                        <span class="badge rounded-pill text-bg-danger p-2 px-4 mb-2">Valorant</span>
                                    </p>
                                    <a href="/controllers/guides-list//guides-ctrl.php" class="card-text mt-1 fw-bold stretched-link  aCardBig text-wrap text-decoration-none text-dark">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, iure. Quidem ex repellendus fuga aliquid sapiente facere velit repudiandae, molestiae laboriosam nihil pariatur hic nam iusto id fugiat fugit a.
                                    </a>
                                    <div class="mt-1">
                                        <small class="text-muted">il y a 47 minutes
                                            <span class="badge rounded-pill mx-1 border bg-transparent text-dark fw-semibold"><i class="bi bi-chat-right-dots mx-1 align-middle"></i>5</span>
                                            <span class="badge rounded-pill border bg-transparent text-dark fw-semibold">Valorant</span>
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 px-2 mt-3">
                            <div class="card rounded-4 border-0 cardGuideMin shadow">
                                <img src="/public/assets/img/valorant.jpg" class="card-img-top rounded-4 h-50 object-fit-cover" alt="Valorant">
                                <div class="card-body py-1 d-flex flex-column justify-content-center ">
                                    <p class="p-0 m-0">
                                        <span class="badge rounded-pill text-bg-danger p-2 px-4 mb-2">Valorant</span>
                                    </p>
                                    <a href="/controllers/guides-list//guides-ctrl.php" class="card-text mt-1 fw-bold stretched-link  aCardBig text-wrap text-decoration-none text-dark">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, iure. Quidem ex repellendus fuga aliquid sapiente facere velit repudiandae, molestiae laboriosam nihil pariatur hic nam iusto id fugiat fugit a.
                                    </a>
                                    <div class="mt-1">
                                        <small class="text-muted">il y a 47 minutes
                                            <span class="badge rounded-pill mx-1 border bg-transparent text-dark fw-semibold"><i class="bi bi-chat-right-dots mx-1 align-middle"></i>5</span>
                                            <span class="badge rounded-pill border bg-transparent text-dark fw-semibold">Valorant</span>
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 px-2 mt-3">
                            <div class="card rounded-4 border-0 cardGuideMin shadow">
                                <img src="/public/assets/img/valorant.jpg" class="card-img-top rounded-4 h-50 object-fit-cover" alt="Valorant">
                                <div class="card-body py-1 d-flex flex-column justify-content-center ">
                                    <p class="p-0 m-0">
                                        <span class="badge rounded-pill text-bg-danger p-2 px-4 mb-2">Valorant</span>
                                    </p>
                                    <a href="/controllers/guides-list//guides-ctrl.php" class="card-text mt-1 fw-bold stretched-link  aCardBig text-wrap text-decoration-none text-dark">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, iure. Quidem ex repellendus fuga aliquid sapiente facere velit repudiandae, molestiae laboriosam nihil pariatur hic nam iusto id fugiat fugit a.
                                    </a>
                                    <div class="mt-1">
                                        <small class="text-muted">il y a 47 minutes
                                            <span class="badge rounded-pill mx-1 border bg-transparent text-dark fw-semibold"><i class="bi bi-chat-right-dots mx-1 align-middle"></i>5</span>
                                            <span class="badge rounded-pill border bg-transparent text-dark fw-semibold">Valorant</span>
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- HALO INFINITE -->
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-8">
                                    <h2 class="fw-bold text-uppercase pt-5 aCardMin">Halo Infinite</h2>
                                </div>
                                <div class="col-md-4 d-flex align-items-center justify-content-end pt-5">
                                    <a href="/controllers/guides-list//guides-ctrl.php" class="btn btn-danger btn-sm text-light rounded-4 buttonArticleSelectionGame fw-bold text-uppercase">
                                        Les guides Halo Infinite
                                        <i class="bi bi-arrow-right mx-2" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 px-2 mt-3">
                            <div class="card rounded-4 border-0 cardGuideMin shadow">
                                <img src="/public/assets/img/infinite2.jpg" class="card-img-top rounded-4 h-50 object-fit-cover" alt="Halo Infinite">
                                <div class="card-body py-1 d-flex flex-column justify-content-center ">
                                    <p class="p-0 m-0">
                                        <span class="badge rounded-pill text-bg-danger p-2 px-4 mb-2">Halo Infinite</span>
                                    </p>
                                    <a href="/controllers/guides-list//guides-ctrl.php" class="card-text mt-1 fw-bold stretched-link  aCardBig text-wrap text-decoration-none text-dark">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, iure. Quidem ex repellendus fuga aliquid sapiente facere velit repudiandae, molestiae laboriosam nihil pariatur hic nam iusto id fugiat fugit a.
                                    </a>
                                    <div class="mt-1">
                                        <small class="text-muted">il y a 47 minutes
                                            <span class="badge rounded-pill mx-1 border bg-transparent text-dark fw-semibold"><i class="bi bi-chat-right-dots mx-1 align-middle"></i>5</span>
                                            <span class="badge rounded-pill border bg-transparent text-dark fw-semibold">Halo Infinite</span>
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 px-2 mt-3">
                            <div class="card rounded-4 border-0 cardGuideMin shadow">
                                <img src="/public/assets/img/infinite2.jpg" class="card-img-top rounded-4 h-50 object-fit-cover" alt="Halo Infinite">
                                <div class="card-body py-1 d-flex flex-column justify-content-center ">
                                    <p class="p-0 m-0">
                                        <span class="badge rounded-pill text-bg-danger p-2 px-4 mb-2">Halo Infinite</span>
                                    </p>
                                    <a href="/controllers/guides-list//guides-ctrl.php" class="card-text mt-1 fw-bold stretched-link  aCardBig text-wrap text-decoration-none text-dark">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, iure. Quidem ex repellendus fuga aliquid sapiente facere velit repudiandae, molestiae laboriosam nihil pariatur hic nam iusto id fugiat fugit a.
                                    </a>
                                    <div class="mt-1">
                                        <small class="text-muted">il y a 47 minutes
                                            <span class="badge rounded-pill mx-1 border bg-transparent text-dark fw-semibold"><i class="bi bi-chat-right-dots mx-1 align-middle"></i>5</span>
                                            <span class="badge rounded-pill border bg-transparent text-dark fw-semibold">Halo Infinite</span>
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 px-2 mt-3">
                            <div class="card rounded-4 border-0 cardGuideMin shadow">
                                <img src="/public/assets/img/infinite2.jpg" class="card-img-top rounded-4 h-50 object-fit-cover" alt="Halo Infinite">
                                <div class="card-body py-1 d-flex flex-column justify-content-center ">
                                    <p class="p-0 m-0">
                                        <span class="badge rounded-pill text-bg-danger p-2 px-4 mb-2">Halo Infinite</span>
                                    </p>
                                    <a href="/controllers/guides-list//guides-ctrl.php" class="card-text mt-1 fw-bold stretched-link  aCardBig text-wrap text-decoration-none text-dark">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, iure. Quidem ex repellendus fuga aliquid sapiente facere velit repudiandae, molestiae laboriosam nihil pariatur hic nam iusto id fugiat fugit a.
                                    </a>
                                    <div class="mt-1">
                                        <small class="text-muted">il y a 47 minutes
                                            <span class="badge rounded-pill mx-1 border bg-transparent text-dark fw-semibold"><i class="bi bi-chat-right-dots mx-1 align-middle"></i>5</span>
                                            <span class="badge rounded-pill border bg-transparent text-dark fw-semibold">Halo Infinite</span>
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 px-2 mt-3">
                            <div class="card rounded-4 border-0 cardGuideMin shadow">
                                <img src="/public/assets/img/infinite2.jpg" class="card-img-top rounded-4 h-50 object-fit-cover" alt="Halo Infinite">
                                <div class="card-body py-1 d-flex flex-column justify-content-center ">
                                    <p class="p-0 m-0">
                                        <span class="badge rounded-pill text-bg-danger p-2 px-4 mb-2">Halo Infinite</span>
                                    </p>
                                    <a href="/controllers/guides-list//guides-ctrl.php" class="card-text mt-1 fw-bold stretched-link  aCardBig text-wrap text-decoration-none text-dark">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, iure. Quidem ex repellendus fuga aliquid sapiente facere velit repudiandae, molestiae laboriosam nihil pariatur hic nam iusto id fugiat fugit a.
                                    </a>
                                    <div class="mt-1">
                                        <small class="text-muted">il y a 47 minutes
                                            <span class="badge rounded-pill mx-1 border bg-transparent text-dark fw-semibold"><i class="bi bi-chat-right-dots mx-1 align-middle"></i>5</span>
                                            <span class="badge rounded-pill border bg-transparent text-dark fw-semibold">Halo Infinite</span>
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- OVERWATCH 2 -->
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-8">
                                    <h2 class="fw-bold text-uppercase pt-5 aCardMin">Overwatch 2</h2>
                                </div>
                                <div class="col-md-4 d-flex align-items-center justify-content-end pt-5">
                                    <a href="/controllers/guides-list//guides-ctrl.php" class="btn btn-danger btn-sm text-light rounded-4 buttonArticleSelectionGame fw-bold text-uppercase">
                                        Les guides Overwatch 2
                                        <i class="bi bi-arrow-right mx-2" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 px-2 mt-3">
                            <div class="card rounded-4 border-0 cardGuideMin shadow">
                                <img src="/public/assets/img/overwatch2.jpg" class="card-img-top rounded-4 h-50 object-fit-cover" alt="Overwatch 2">
                                <div class="card-body py-1 d-flex flex-column justify-content-center ">
                                    <p class="p-0 m-0">
                                        <span class="badge rounded-pill text-bg-danger p-2 px-4 mb-2">Overwatch 2</span>
                                    </p>
                                    <a href="/controllers/guides-list//guides-ctrl.php" class="card-text mt-1 fw-bold stretched-link  aCardBig text-wrap text-decoration-none text-dark">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, iure. Quidem ex repellendus fuga aliquid sapiente facere velit repudiandae, molestiae laboriosam nihil pariatur hic nam iusto id fugiat fugit a.
                                    </a>
                                    <div class="mt-1">
                                        <small class="text-muted">il y a 47 minutes
                                            <span class="badge rounded-pill mx-1 border bg-transparent text-dark fw-semibold"><i class="bi bi-chat-right-dots mx-1 align-middle"></i>5</span>
                                            <span class="badge rounded-pill border bg-transparent text-dark fw-semibold">Overwatch 2</span>
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 px-2 mt-3">
                            <div class="card rounded-4 border-0 cardGuideMin shadow">
                                <img src="/public/assets/img/overwatch2.jpg" class="card-img-top rounded-4 h-50 object-fit-cover" alt="Overwatch 2">
                                <div class="card-body py-1 d-flex flex-column justify-content-center ">
                                    <p class="p-0 m-0">
                                        <span class="badge rounded-pill text-bg-danger p-2 px-4 mb-2">Overwatch 2</span>
                                    </p>
                                    <a href="/controllers/guides-list//guides-ctrl.php" class="card-text mt-1 fw-bold stretched-link  aCardBig text-wrap text-decoration-none text-dark">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, iure. Quidem ex repellendus fuga aliquid sapiente facere velit repudiandae, molestiae laboriosam nihil pariatur hic nam iusto id fugiat fugit a.
                                    </a>
                                    <div class="mt-1">
                                        <small class="text-muted">il y a 47 minutes
                                            <span class="badge rounded-pill mx-1 border bg-transparent text-dark fw-semibold"><i class="bi bi-chat-right-dots mx-1 align-middle"></i>5</span>
                                            <span class="badge rounded-pill border bg-transparent text-dark fw-semibold">Overwatch 2</span>
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 px-2 mt-3">
                            <div class="card rounded-4 border-0 cardGuideMin shadow">
                                <img src="/public/assets/img/overwatch2.jpg" class="card-img-top rounded-4 h-50 object-fit-cover" alt="Overwatch 2">
                                <div class="card-body py-1 d-flex flex-column justify-content-center ">
                                    <p class="p-0 m-0">
                                        <span class="badge rounded-pill text-bg-danger p-2 px-4 mb-2">Overwatch 2</span>
                                    </p>
                                    <a href="/controllers/guides-list//guides-ctrl.php" class="card-text mt-1 fw-bold stretched-link  aCardBig text-wrap text-decoration-none text-dark">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, iure. Quidem ex repellendus fuga aliquid sapiente facere velit repudiandae, molestiae laboriosam nihil pariatur hic nam iusto id fugiat fugit a.
                                    </a>
                                    <div class="mt-1">
                                        <small class="text-muted">il y a 47 minutes
                                            <span class="badge rounded-pill mx-1 border bg-transparent text-dark fw-semibold"><i class="bi bi-chat-right-dots mx-1 align-middle"></i>5</span>
                                            <span class="badge rounded-pill border bg-transparent text-dark fw-semibold">Overwatch 2</span>
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 px-2 mt-3">
                            <div class="card rounded-4 border-0 cardGuideMin shadow">
                                <img src="/public/assets/img/overwatch2.jpg" class="card-img-top rounded-4 h-50 object-fit-cover" alt="Overwatch 2">
                                <div class="card-body py-1 d-flex flex-column justify-content-center ">
                                    <p class="p-0 m-0">
                                        <span class="badge rounded-pill text-bg-danger p-2 px-4 mb-2">Overwatch 2</span>
                                    </p>
                                    <a href="/controllers/guides-list//guides-ctrl.php" class="card-text mt-1 fw-bold stretched-link  aCardBig text-wrap text-decoration-none text-dark">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, iure. Quidem ex repellendus fuga aliquid sapiente facere velit repudiandae, molestiae laboriosam nihil pariatur hic nam iusto id fugiat fugit a.
                                    </a>
                                    <div class="mt-1">
                                        <small class="text-muted">il y a 47 minutes
                                            <span class="badge rounded-pill mx-1 border bg-transparent text-dark fw-semibold"><i class="bi bi-chat-right-dots mx-1 align-middle"></i>5</span>
                                            <span class="badge rounded-pill border bg-transparent text-dark fw-semibold">Overwatch 2</span>
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- BATTLEFIELD 2042 -->
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-8">
                                    <h2 class="fw-bold text-uppercase pt-5 aCardMin">Battlefield 2042</h2>
                                </div>
                                <div class="col-md-4 d-flex align-items-center justify-content-end pt-5">
                                    <a href="/controllers/guides-list//guides-ctrl.php" class="btn btn-danger btn-sm text-light rounded-4 buttonArticleSelectionGame fw-bold text-uppercase">
                                        Les guides Battlefield 2042
                                        <i class="bi bi-arrow-right mx-2" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 px-2 mt-3">
                            <div class="card rounded-4 border-0 cardGuideMin shadow">
                                <img src="/public/assets/img/battlefield2042.jpg" class="card-img-top rounded-4 h-50 object-fit-cover" alt="Battlefield 2042">
                                <div class="card-body py-1 d-flex flex-column justify-content-center ">
                                    <p class="p-0 m-0">
                                        <span class="badge rounded-pill text-bg-danger p-2 px-4 mb-2">Battlefield 2042</span>
                                    </p>
                                    <a href="/controllers/guides-list//guides-ctrl.php" class="card-text mt-1 fw-bold stretched-link  aCardBig text-wrap text-decoration-none text-dark">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, iure. Quidem ex repellendus fuga aliquid sapiente facere velit repudiandae, molestiae laboriosam nihil pariatur hic nam iusto id fugiat fugit a.
                                    </a>
                                    <div class="mt-1">
                                        <small class="text-muted">il y a 47 minutes
                                            <span class="badge rounded-pill mx-1 border bg-transparent text-dark fw-semibold"><i class="bi bi-chat-right-dots mx-1 align-middle"></i>5</span>
                                            <span class="badge rounded-pill border bg-transparent text-dark fw-semibold">Battlefield 2042</span>
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 px-2 mt-3">
                            <div class="card rounded-4 border-0 cardGuideMin shadow">
                                <img src="/public/assets/img/battlefield2042.jpg" class="card-img-top rounded-4 h-50 object-fit-cover" alt="Battlefield 2042">
                                <div class="card-body py-1 d-flex flex-column justify-content-center ">
                                    <p class="p-0 m-0">
                                        <span class="badge rounded-pill text-bg-danger p-2 px-4 mb-2">Battlefield 2042</span>
                                    </p>
                                    <a href="/controllers/guides-list//guides-ctrl.php" class="card-text mt-1 fw-bold stretched-link  aCardBig text-wrap text-decoration-none text-dark">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, iure. Quidem ex repellendus fuga aliquid sapiente facere velit repudiandae, molestiae laboriosam nihil pariatur hic nam iusto id fugiat fugit a.
                                    </a>
                                    <div class="mt-1">
                                        <small class="text-muted">il y a 47 minutes
                                            <span class="badge rounded-pill mx-1 border bg-transparent text-dark fw-semibold"><i class="bi bi-chat-right-dots mx-1 align-middle"></i>5</span>
                                            <span class="badge rounded-pill border bg-transparent text-dark fw-semibold">Battlefield 2042</span>
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 px-2 mt-3">
                            <div class="card rounded-4 border-0 cardGuideMin shadow">
                                <img src="/public/assets/img/battlefield2042.jpg" class="card-img-top rounded-4 h-50 object-fit-cover" alt="Battlefield 2042">
                                <div class="card-body py-1 d-flex flex-column justify-content-center ">
                                    <p class="p-0 m-0">
                                        <span class="badge rounded-pill text-bg-danger p-2 px-4 mb-2">Battlefield 2042</span>
                                    </p>
                                    <a href="/controllers/guides-list//guides-ctrl.php" class="card-text mt-1 fw-bold stretched-link  aCardBig text-wrap text-decoration-none text-dark">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, iure. Quidem ex repellendus fuga aliquid sapiente facere velit repudiandae, molestiae laboriosam nihil pariatur hic nam iusto id fugiat fugit a.
                                    </a>
                                    <div class="mt-1">
                                        <small class="text-muted">il y a 47 minutes
                                            <span class="badge rounded-pill mx-1 border bg-transparent text-dark fw-semibold"><i class="bi bi-chat-right-dots mx-1 align-middle"></i>5</span>
                                            <span class="badge rounded-pill border bg-transparent text-dark fw-semibold">Battlefield 2042</span>
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 px-2 mt-3">
                            <div class="card rounded-4 border-0 cardGuideMin shadow">
                                <img src="/public/assets/img/battlefield2042.jpg" class="card-img-top rounded-4 h-50 object-fit-cover" alt="Battlefield 2042">
                                <div class="card-body py-1 d-flex flex-column justify-content-center ">
                                    <p class="p-0 m-0">
                                        <span class="badge rounded-pill text-bg-danger p-2 px-4 mb-2">Battlefield 2042</span>
                                    </p>
                                    <a href="/controllers/guides-list//guides-ctrl.php" class="card-text mt-1 fw-bold stretched-link  aCardBig text-wrap text-decoration-none text-dark">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, iure. Quidem ex repellendus fuga aliquid sapiente facere velit repudiandae, molestiae laboriosam nihil pariatur hic nam iusto id fugiat fugit a.
                                    </a>
                                    <div class="mt-1">
                                        <small class="text-muted">il y a 47 minutes
                                            <span class="badge rounded-pill mx-1 border bg-transparent text-dark fw-semibold"><i class="bi bi-chat-right-dots mx-1 align-middle"></i>5</span>
                                            <span class="badge rounded-pill border bg-transparent text-dark fw-semibold">Battlefield 2042</span>
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- BORDERLANDS 3 -->
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-8">
                                    <h2 class="fw-bold text-uppercase pt-5 aCardMin">Borderlands 3</h2>
                                </div>
                                <div class="col-md-4 d-flex align-items-center justify-content-end pt-5">
                                    <a href="/controllers/guides-list//guides-ctrl.php" class="btn btn-danger btn-sm text-light rounded-4 buttonArticleSelectionGame fw-bold text-uppercase">
                                        Les guides Borderlands 3
                                        <i class="bi bi-arrow-right mx-2" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 px-2 mt-3">
                            <div class="card rounded-4 border-0 cardGuideMin shadow">
                                <img src="/public/assets/img/borderlands3.jpg" class="card-img-top rounded-4 h-50 object-fit-cover" alt="Borderlands 3">
                                <div class="card-body py-1 d-flex flex-column justify-content-center ">
                                    <p class="p-0 m-0">
                                        <span class="badge rounded-pill text-bg-danger p-2 px-4 mb-2">Borderlands 3</span>
                                    </p>
                                    <a href="/controllers/guides-list//guides-ctrl.php" class="card-text mt-1 fw-bold stretched-link  aCardBig text-wrap text-decoration-none text-dark">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, iure. Quidem ex repellendus fuga aliquid sapiente facere velit repudiandae, molestiae laboriosam nihil pariatur hic nam iusto id fugiat fugit a.
                                    </a>
                                    <div class="mt-1">
                                        <small class="text-muted">il y a 47 minutes
                                            <span class="badge rounded-pill mx-1 border bg-transparent text-dark fw-semibold"><i class="bi bi-chat-right-dots mx-1 align-middle"></i>5</span>
                                            <span class="badge rounded-pill border bg-transparent text-dark fw-semibold">Borderlands 3</span>
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 px-2 mt-3">
                            <div class="card rounded-4 border-0 cardGuideMin shadow">
                                <img src="/public/assets/img/borderlands3.jpg" class="card-img-top rounded-4 h-50 object-fit-cover" alt="Borderlands 3">
                                <div class="card-body py-1 d-flex flex-column justify-content-center ">
                                    <p class="p-0 m-0">
                                        <span class="badge rounded-pill text-bg-danger p-2 px-4 mb-2">Borderlands 3</span>
                                    </p>
                                    <a href="/controllers/guides-list//guides-ctrl.php" class="card-text mt-1 fw-bold stretched-link  aCardBig text-wrap text-decoration-none text-dark">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, iure. Quidem ex repellendus fuga aliquid sapiente facere velit repudiandae, molestiae laboriosam nihil pariatur hic nam iusto id fugiat fugit a.
                                    </a>
                                    <div class="mt-1">
                                        <small class="text-muted">il y a 47 minutes
                                            <span class="badge rounded-pill mx-1 border bg-transparent text-dark fw-semibold"><i class="bi bi-chat-right-dots mx-1 align-middle"></i>5</span>
                                            <span class="badge rounded-pill border bg-transparent text-dark fw-semibold">Borderlands 3</span>
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 px-2 mt-3">
                            <div class="card rounded-4 border-0 cardGuideMin shadow">
                                <img src="/public/assets/img/borderlands3.jpg" class="card-img-top rounded-4 h-50 object-fit-cover" alt="Borderlands 3">
                                <div class="card-body py-1 d-flex flex-column justify-content-center ">
                                    <p class="p-0 m-0">
                                        <span class="badge rounded-pill text-bg-danger p-2 px-4 mb-2">Borderlands 3</span>
                                    </p>
                                    <a href="/controllers/guides-list//guides-ctrl.php" class="card-text mt-1 fw-bold stretched-link  aCardBig text-wrap text-decoration-none text-dark">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, iure. Quidem ex repellendus fuga aliquid sapiente facere velit repudiandae, molestiae laboriosam nihil pariatur hic nam iusto id fugiat fugit a.
                                    </a>
                                    <div class="mt-1">
                                        <small class="text-muted">il y a 47 minutes
                                            <span class="badge rounded-pill mx-1 border bg-transparent text-dark fw-semibold"><i class="bi bi-chat-right-dots mx-1 align-middle"></i>5</span>
                                            <span class="badge rounded-pill border bg-transparent text-dark fw-semibold">Borderlands 3</span>
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 px-2 mt-3">
                            <div class="card rounded-4 border-0 cardGuideMin shadow">
                                <img src="/public/assets/img/borderlands3.jpg" class="card-img-top rounded-4 h-50 object-fit-cover" alt="Borderlands 3">
                                <div class="card-body py-1 d-flex flex-column justify-content-center ">
                                    <p class="p-0 m-0">
                                        <span class="badge rounded-pill text-bg-danger p-2 px-4 mb-2">Borderlands 3</span>
                                    </p>
                                    <a href="/controllers/guides-list//guides-ctrl.php" class="card-text mt-1 fw-bold stretched-link  aCardBig text-wrap text-decoration-none text-dark">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, iure. Quidem ex repellendus fuga aliquid sapiente facere velit repudiandae, molestiae laboriosam nihil pariatur hic nam iusto id fugiat fugit a.
                                    </a>
                                    <div class="mt-1">
                                        <small class="text-muted">il y a 47 minutes
                                            <span class="badge rounded-pill mx-1 border bg-transparent text-dark fw-semibold"><i class="bi bi-chat-right-dots mx-1 align-middle"></i>5</span>
                                            <span class="badge rounded-pill border bg-transparent text-dark fw-semibold">Borderlands 3</span>
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