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
                                    <h2 class="h2 text-uppercase fw-bold">Tous les articles sur <span class="text-danger"><?= $articles[0]->name ?></span></h2>
                                </div>
                                <div class="col-md-4 col-12 btnTitle d-flex align-items-center justify-content-end">
                                    <a href="/controllers/articles-list/articles-ctrl.php?id_game=<?= $id_game ?>" class="btn btn-danger btn-sm text-light rounded-4 buttonArticleSelectionGame fw-bold text-uppercase">
                                        Tous les articles : <?= $articles[0]->name ?>
                                        <i class="bi bi-arrow-right mx-2" aria-hidden="true"></i>
                                    </a>
                                </div>
                            <?php  } ?>
                        </div>
                        <!-- CARD ACTU -->
                        <div class="row">
                            <div class="col-12 d-flex flex-wrap justify-content-between colActus">
                                <?php foreach ($articles as $article) { ?>
                                    <div class="card bg-transparent rounded-4 shadow-lg text-white p-0 cardActu border-0 cardShadow ">
                                        <img src="/public/uploads/article/<?= $article->article_picture ?>" class="card-img object-fit-cover rounded-4 h-100 w-100" alt="<?= $article->name ?>">
                                        <div class="card-img-overlay ">
                                            <span class="badge rounded-pill text-uppercase text-bg-danger p-2"><?= $article->name ?></span>
                                            <div class="card-body d-flex flex-column justify-content-end h-100 p-0">
                                                <a href="/controllers/articles/article-ctrl.php?id=<?= $article->id_article ?>&id_game=<?= $article->id_game ?>" class="lh-1 card-text fw-bold stretched-link aCard text-wrap text-wrap text-decoration-none text-light mb-1">
                                                    <?= $article->article_description ?>
                                                </a>
                                                <div class="card-text mb-3">
                                                    <small>
                                                        <?= $article->created_at ?>
                                                        <span class="badge rounded-pill text-uppercase mb-1 mx-1 border fw-semibold"><i class="bi bi-chat-right-dots mx-1 align-middle"></i>5</span>
                                                        <span class="badge rounded-pill text-uppercase mb-1 border fw-semibold"><?= $article->name ?></span>
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                            <!-- CARD UNDER ACTU -->
                            <div class="col-12 d-flex flex-wrap justify-content-between colActus">
                                <?php foreach ($articlesUnder as $article) { ?>
                                    <div class="card cardActUnder rounded-4 mt-3 p-0 border-0 bg-transparent">
                                        <div class="card-img-top ratio ratio-16x9">
                                            <img src="/public/uploads/article/<?= $article->article_picture ?>" class="card-img object-fit-cover rounded-4" alt="<?= $article->name ?>">
                                            <div class="p-3">
                                                <span class="badge rounded-pill text-uppercase text-bg-danger p-2"><?= $article->name ?></span>
                                            </div>
                                        </div>
                                        <div class="card-body p-0 mt-1">
                                            <a href="/controllers/articles/article-ctrl.php?id=<?= $article->id_article ?>&id_game=<?= $article->id_game ?>" class="card-text stretchLinkHover fw-bold text-decoration-none text-dark stretched-link aCard">
                                                <?= $article->article_description ?>
                                            </a>
                                            <div class="card-text mb-3">
                                                <small class="text-muted"><?= $article->created_at ?>
                                                    <span class="badge rounded-pill text-uppercase mb-1 mx-1 border text-dark fw-semibold"><i class="bi bi-chat-right-dots mx-1 align-middle"></i>5</span>
                                                    <span class="badge rounded-pill text-uppercase mb-1 border text-dark fw-semibold"><?= $article->name ?></span>
                                                </small>
                                            </div>
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
                <div class="row">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-md-8 col-12 py-3 mt-5">
                                <h2 class="h2 text-uppercase fw-bold">Tous les guides</h2>
                            </div>
                            <div class="col-md-4 col-12 d-flex btnTitle align-items-center justify-content-end mt-5">
                                <a href="/controllers/guides-preview/guides-ctrl.php" class="btn btn-danger btn-sm text-light rounded-4 buttonArticleSelectionGame fw-bold text-uppercase">
                                    Tous les guides
                                    <i class="bi bi-arrow-right mx-2" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <div class="card bg-dark text-white p-0 cardGuideLeft border-0 rounded-4 cardShadow">
                                    <img src="/public/assets/img/apex.jpg" class="card-img object-fit-cover rounded-4 w-100 h-100" alt="Stony Beach">
                                    <div class="card-img-overlay d-flex flex-column justify-content-end">
                                        <p class="p-0 m-0">
                                            <span class="badge rounded-pill text-uppercase text-bg-danger p-2 px-4 mb-2">apex legends</span>
                                        </p>
                                        <div class="w-50">
                                            <a href="#" class="card-text fw-bold stretched-link w-75 aCard text-wrap text-decoration-none text-light">
                                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, iure. Quidem ex repellendus fuga aliquid sapiente facere velit repudiandae, molestiae laboriosam nihil pariatur hic nam iusto id fugiat fugit a.
                                            </a>
                                        </div>
                                        <div class="card-text mt-2">
                                            <small>il y a 47 minutes
                                                <span class="badge rounded-pill text-uppercase mb-1 mx-1 border bg-transparent text-light fw-semibold"><i class="bi bi-chat-right-dots mx-1 align-middle"></i>5</span>
                                                <span class="badge rounded-pill text-uppercase mb-1 border bg-transparent text-light fw-semibold">apex legends</span>
                                            </small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-12 justify-content-between colGuideActus d-flex flex-column">
                                <div class="card cardGuideRight  bg-transparent border-0 overflow-hidden">
                                    <div class="row g-0 cardGuideRight">
                                        <div class="col-auto">
                                            <img src="/public/assets/img/gta-6-news-visu.jpg" alt="GTA 6" class="imgGuideRight object-fit-cover rounded-4">
                                        </div>
                                        <div class="col-md-8 p-0 ">
                                            <div class="card-body w-100 cardGuideRight p-0 mx-2 d-flex flex-column">
                                                <small class="card-text text-danger titlecardGuideRight text-uppercase fw-semibold m-0 p-0">Guide GTA 6</small>
                                                <div class="mt-1">
                                                    <a href="#" class="card-text bodycardGuideRight stretchLinkHover fw-semibold text-decoration-none text-dark stretched-link aCard">
                                                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Alias magnam hic molestias, consequuntur provident necessitatibus culpa laudantium asperiores, nemo similique quas saepe repudiandae voluptatem, perspiciatis earum animi. Obcaecati, voluptates itaque.
                                                    </a>
                                                </div>
                                                <p class="card-text">
                                                    <small class="text-muted">Il y a 5 heures
                                                        <span class="badge badge-sm rounded-pill text-uppercase mx-1 border bg-dark text-light fw-semibold"><i class="bi bi-chat-right-dots mx-1 align-middle"></i>5</span>
                                                        <span class="badge rounded-pill text-uppercase border bg-dark text-light fw-semibold">PC</span>
                                                    </small>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card cardGuideRight bg-transparent border-0 overflow-hidden">
                                    <div class="row g-0 cardGuideRight">
                                        <div class="col-auto">
                                            <img src="/public/assets/img/1329760.jpeg" alt="Counter Strike 2" class="imgGuideRight object-fit-cover rounded-4">
                                        </div>
                                        <div class="col-md-8 p-0 ">
                                            <div class="card-body w-100 cardGuideRight p-0 mx-2 d-flex flex-column">
                                                <small class="card-text text-danger titlecardGuideRight text-uppercase fw-semibold m-0 p-0">Guide Counter Strike 2</small>
                                                <div class="mt-1">
                                                    <a href="#" class="card-text bodycardGuideRight stretchLinkHover fw-semibold text-decoration-none text-dark stretched-link aCard">
                                                        Les leaks de GTA 5 révèlent pas mal de choses...
                                                    </a>
                                                </div>
                                                <p class="card-text">
                                                    <small class="text-muted">Il y a 5 heures
                                                        <span class="badge badge-sm rounded-pill text-uppercase mx-1 border bg-dark text-light fw-semibold"><i class="bi bi-chat-right-dots mx-1 align-middle"></i>5</span>
                                                        <span class="badge rounded-pill text-uppercase border bg-dark text-light fw-semibold">PC</span>
                                                    </small>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card cardGuideRight bg-transparent border-0 overflow-hidden">
                                    <div class="row g-0 cardGuideRight">
                                        <div class="col-auto">
                                            <img src="/public/assets/img/valorant.jpg" alt="Valorant" class="imgGuideRight object-fit-cover rounded-4">
                                        </div>
                                        <div class="col-md-8 p-0 ">
                                            <div class="card-body w-100 cardGuideRight p-0 mx-2 d-flex flex-column">
                                                <small class="card-text text-danger titlecardGuideRight text-uppercase fw-semibold m-0 p-0">Guide Valorant</small>
                                                <div class="mt-1">
                                                    <a href="#" class="card-text bodycardGuideRight stretchLinkHover fw-semibold text-decoration-none text-dark stretched-link aCard">
                                                        Les leaks de GTA 5 révèlent pas mal de choses...
                                                    </a>
                                                </div>
                                                <p class="card-text">
                                                    <small class="text-muted">Il y a 5 heures
                                                        <span class="badge badge-sm rounded-pill text-uppercase mx-1 border bg-dark text-light fw-semibold"><i class="bi bi-chat-right-dots mx-1 align-middle"></i>5</span>
                                                        <span class="badge rounded-pill text-uppercase border bg-dark text-light fw-semibold">PC</span>
                                                    </small>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card cardGuideRight bg-transparent border-0 overflow-hidden">
                                    <div class="row g-0 cardGuideRight">
                                        <div class="col-auto">
                                            <img src="/public/assets/img/MWIII-REVEAL-FULL-TOUT.jpg" alt="Call Of Duty : MW 3" class="imgGuideRight object-fit-cover rounded-4">
                                        </div>
                                        <div class="col-md-8 p-0 ">
                                            <div class="card-body w-100 cardGuideRight p-0 mx-2 d-flex flex-column">
                                                <small class="card-text text-danger titlecardGuideRight text-uppercase fw-semibold m-0 p-0">Guide Call Of Duty : MW 3</small>
                                                <div class="mt-1">
                                                    <a href="#" class="card-text bodycardGuideRight stretchLinkHover fw-semibold text-decoration-none text-dark stretched-link aCard">
                                                        Les leaks de GTA 5 révèlent pas mal de choses...
                                                    </a>
                                                </div>
                                                <p class="card-text">
                                                    <small class="text-muted">Il y a 5 heures
                                                        <span class="badge badge-sm rounded-pill text-uppercase mx-1 border bg-dark text-light fw-semibold"><i class="bi bi-chat-right-dots mx-1 align-middle"></i>5</span>
                                                        <span class="badge rounded-pill text-uppercase border bg-dark text-light fw-semibold">PC</span>
                                                    </small>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-12 d-flex justify-content-between flex-column">
                                <div class="card cardGuideRight bg-transparent border-0 overflow-hidden">
                                    <div class="row g-0 cardGuideRight">
                                        <div class="col-auto">
                                            <img src="/public/assets/img/MWII-SEASON-01-ROADMAP-004.jpg" alt="Call Of Duty : Warzone 2" class="imgGuideRight object-fit-cover rounded-4">
                                        </div>
                                        <div class="col-md-8 p-0 ">
                                            <div class="card-body w-100 cardGuideRight p-0 mx-2 d-flex flex-column">
                                                <small class="card-text text-danger titlecardGuideRight text-uppercase fw-semibold m-0 p-0">Guide Call Of Duty : Warzone 2</small>
                                                <div class="mt-1">
                                                    <a href="#" class="card-text bodycardGuideRight stretchLinkHover fw-semibold text-decoration-none text-dark stretched-link aCard">
                                                        Les leaks de GTA 5 révèlent pas mal de choses...
                                                    </a>
                                                </div>
                                                <p class="card-text">
                                                    <small class="text-muted">Il y a 5 heures
                                                        <span class="badge badge-sm rounded-pill text-uppercase mx-1 border bg-dark text-light fw-semibold"><i class="bi bi-chat-right-dots mx-1 align-middle"></i>5</span>
                                                        <span class="badge rounded-pill text-uppercase border bg-dark text-light fw-semibold">PC</span>
                                                    </small>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card cardGuideRight bg-transparent border-0 overflow-hidden">
                                    <div class="row g-0 cardGuideRight">
                                        <div class="col-auto">
                                            <img src="/public/assets/img/overwatch2.jpg" alt="Overwatch 2" class="imgGuideRight object-fit-cover rounded-4">
                                        </div>
                                        <div class="col-md-8 p-0 ">
                                            <div class="card-body w-100 cardGuideRight p-0 mx-2 d-flex flex-column">
                                                <small class="card-text text-danger titlecardGuideRight text-uppercase fw-semibold m-0 p-0">Guide Overwatch 2</small>
                                                <div class="mt-1">
                                                    <a href="#" class="card-text bodycardGuideRight stretchLinkHover fw-semibold text-decoration-none text-dark stretched-link aCard">
                                                        Les leaks de GTA 5 révèlent pas mal de choses...
                                                    </a>
                                                </div>
                                                <p class="card-text">
                                                    <small class="text-muted">Il y a 5 heures
                                                        <span class="badge badge-sm rounded-pill text-uppercase mx-1 border bg-dark text-light fw-semibold"><i class="bi bi-chat-right-dots mx-1 align-middle"></i>5</span>
                                                        <span class="badge rounded-pill text-uppercase border bg-dark text-light fw-semibold">PC</span>
                                                    </small>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card cardGuideRight bg-transparent border-0 overflow-hidden">
                                    <div class="row g-0 cardGuideRight">
                                        <div class="col-auto">
                                            <img src="/public/assets/img/borderlands3.jpg" alt="Borderlands 3" class="imgGuideRight object-fit-cover rounded-4">
                                        </div>
                                        <div class="col-md-8 p-0 ">
                                            <div class="card-body w-100 cardGuideRight p-0 mx-2 d-flex flex-column">
                                                <small class="card-text text-danger titlecardGuideRight text-uppercase fw-semibold m-0 p-0">Guide Borderlands 3</small>
                                                <div class="mt-1">
                                                    <a href="#" class="card-text bodycardGuideRight stretchLinkHover fw-semibold text-decoration-none text-dark stretched-link aCard">
                                                        Les leaks de GTA 5 révèlent pas mal de choses...
                                                    </a>
                                                </div>
                                                <p class="card-text">
                                                    <small class="text-muted">Il y a 5 heures
                                                        <span class="badge badge-sm rounded-pill text-uppercase mx-1 border bg-dark text-light fw-semibold"><i class="bi bi-chat-right-dots mx-1 align-middle"></i>5</span>
                                                        <span class="badge rounded-pill text-uppercase border bg-dark text-light fw-semibold">PC</span>
                                                    </small>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card cardGuideRight bg-transparent border-0 overflow-hidden">
                                    <div class="row g-0 cardGuideRight">
                                        <div class="col-auto">
                                            <img src="/public/assets/img/battlefield2042.jpg" alt="Battlefield 2042" class="imgGuideRight object-fit-cover rounded-4">
                                        </div>
                                        <div class="col-md-8 p-0 ">
                                            <div class="card-body w-100 cardGuideRight p-0 mx-2 d-flex flex-column">
                                                <small class="card-text text-danger titlecardGuideRight text-uppercase fw-semibold m-0 p-0">Guide Battlefield 2042</small>
                                                <div class="mt-1">
                                                    <a href="#" class="card-text bodycardGuideRight stretchLinkHover fw-semibold text-decoration-none text-dark stretched-link aCard">
                                                        Les leaks de GTA 5 révèlent pas mal de choses...
                                                    </a>
                                                </div>
                                                <p class="card-text">
                                                    <small class="text-muted">Il y a 5 heures
                                                        <span class="badge badge-sm rounded-pill text-uppercase mx-1 border bg-dark text-light fw-semibold"><i class="bi bi-chat-right-dots mx-1 align-middle"></i>5</span>
                                                        <span class="badge rounded-pill text-uppercase border bg-dark text-light fw-semibold">PC</span>
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
            </section>
            <!-- LES DERNIERES VIDEOS -->
            <section>
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-md-8 col-12 py-3 mt-5">
                                <h2 class="h2 text-uppercase fw-bold">Toutes les vidéos</h2>
                            </div>
                            <div class="col-md-4 col-12 d-flex btnTitle align-items-center justify-content-end mt-5">
                                <a href="#" class="btn btn-danger btn-sm text-light rounded-4 buttonArticleSelectionGame fw-bold text-uppercase">
                                    Toutes les vidéos
                                    <i class="bi bi-arrow-right mx-2" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="row">
                            <div class="col-12">
                                <div class="card bg-dark text-white p-0 cardVideoPlayer rounded-4 border-0">
                                    <div class="ratio ratio-16x9">
                                        <iframe class="cardVideoPlayer rounded-4" src="https://www.youtube.com/embed/QdBZY2fkU-0?si=1uhHYUak6A-F-lid" title="YouTube video player" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                                    </div>
                                    <div class="card-img-overlay d-flex flex-column justify-content-end py-0 cardShadow">
                                        <p class="m-0 p-0 z-1">
                                            <span class="badge rounded-pill text-uppercase text-bg-danger p-2 px-4 mb-2">apex legends</span>
                                        </p>
                                        <div class="z-1 1h-1">
                                            <a href="https://www.youtube.com/embed/QdBZY2fkU-0?si=1uhHYUak6A-F-lid" class="card-text fw-bold text-wrap stretched-link aCard w-50 text-decoration-none text-light">
                                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas officia similique vero eligendi, repellendus aut. Consequuntur reiciendis quos accusamus. Repellat nihil porro dolorem sed ullam totam obcaecati beatae a quam!
                                            </a>
                                        </div>
                                        <div class="card-text mt-2 z-1 mb-3">
                                            <small>il y a 47 minutes
                                                <span class="badge rounded-pill text-uppercase mb-1 mx-1 border bg-transparent text-light fw-semibold"><i class="bi bi-chat-right-dots mx-1 align-middle"></i>5</span>
                                                <span class="badge rounded-pill text-uppercase mb-1 border bg-transparent text-light fw-semibold">HALO</span>
                                            </small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 d-flex flex-wrap justify-content-between ">
                        <div class="card cardActUnder mt-3 p-0 border-0 bg-transparent">
                            <iframe class="rounded-4 opacity-75" src="https://www.youtube.com/embed/f2zcVxNtk7U?si=tHeC53lUtFvCkPKr" title="YouTube video player" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                            <div class="p-3 card-img-overlay">
                                <span class="badge rounded-pill text-uppercase text-bg-danger p-2">Battlefield 2042</span>
                            </div>
                            <div class="card-body p-0 mt-1">
                                <a href="" class="card-text stretchLinkHover fw-bold text-decoration-none text-dark stretched-link aCard">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil maxime delectus mollitia obcaecati nobis temporibus sequi error molestiae quae debitis vitae odit dolores, veniam consectetur deleniti. Praesentium iure repudiandae dolore.</a>
                                <div class="card-text mb-3">
                                    <small class="text-muted">25 déc, 18:05
                                        <span class="badge rounded-pill text-uppercase mb-1 mx-1 border text-dark fw-semibold"><i class="bi bi-chat-right-dots mx-1 align-middle"></i>5</span>
                                        <span class="badge rounded-pill text-uppercase mb-1 border text-dark fw-semibold">Battlefield 2042</span>
                                    </small>
                                </div>
                            </div>
                        </div>
                        <div class="card cardActUnder mt-3 p-0 border-0 bg-transparent">
                            <iframe class="rounded-4 opacity-75" src="https://www.youtube.com/embed/NMWkEt_KF6g?si=U7Nq1It4NCgIGQhY" title="YouTube video player" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                            <div class="p-3 card-img-overlay">
                                <span class="badge rounded-pill text-uppercase text-bg-danger p-2">Counter Strike 2</span>
                            </div>
                            <div class="card-body p-0 mt-1">
                                <a href="" class="card-text stretchLinkHover fw-bold text-decoration-none text-dark stretched-link aCard">Some quick example text to build on the card title and make up the...</a>
                                <div class="card-text mb-3">
                                    <small class="text-muted">25 déc, 18:05
                                        <span class="badge rounded-pill text-uppercase mb-1 mx-1 border text-dark fw-semibold"><i class="bi bi-chat-right-dots mx-1 align-middle"></i>5</span>
                                        <span class="badge rounded-pill text-uppercase mb-1 border text-dark fw-semibold">Counter Strike 2</span>
                                    </small>
                                </div>
                            </div>
                        </div>
                        <div class="card cardActUnder mt-3 p-0 border-0 bg-transparent">
                            <iframe class="rounded-4 opacity-75" src="https://www.youtube.com/embed/B_JsHq9f0pE?si=vrF7i7_8BGYwugwC" title="YouTube video player" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                            <div class="p-3 card-img-overlay">
                                <span class="badge rounded-pill text-uppercase text-bg-danger p-2">Overwatch 2</span>
                            </div>
                            <div class="card-body p-0 mt-1">
                                <a href="" class="card-text stretchLinkHover fw-bold text-decoration-none text-dark stretched-link aCard">Some quick example text to build on the card title and make up the...</a>
                                <div class="card-text mb-3">
                                    <small class="text-muted">25 déc, 18:05
                                        <span class="badge rounded-pill text-uppercase mb-1 mx-1 border text-dark fw-semibold"><i class="bi bi-chat-right-dots mx-1 align-middle"></i>5</span>
                                        <span class="badge rounded-pill text-uppercase mb-1 border text-dark fw-semibold">Overwatch 2</span>
                                    </small>
                                </div>
                            </div>
                        </div>
                        <div class="card cardActUnder mt-3 p-0 border-0 bg-transparent">
                            <iframe class="rounded-4 opacity-75" src="https://www.youtube.com/embed/texF0VVePl8?si=nmfXaQG8ZQIuIzcs" title="YouTube video player" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                            <div class="p-3 card-img-overlay">
                                <span class="badge rounded-pill text-uppercase text-bg-danger p-2">Borderlands 3</span>
                            </div>
                            <div class="card-body p-0 mt-1">
                                <a href="" class="card-text stretchLinkHover fw-bold text-decoration-none text-dark stretched-link aCard">Some quick example text to build on the card title and make up the...</a>
                                <div class="card-text mb-3">
                                    <small class="text-muted">25 déc, 18:05
                                        <span class="badge rounded-pill text-uppercase mb-1 mx-1 border text-dark fw-semibold"><i class="bi bi-chat-right-dots mx-1 align-middle"></i>5</span>
                                        <span class="badge rounded-pill text-uppercase mb-1 border text-dark fw-semibold">Borderlands 3</span>
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- GAMES DISCOVER -->
            <section>
                <div class="row pb-5">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-md-10 col-12 py-3 mt-5">
                                <h2 class="h2 text-uppercase fw-bold">Les jeux à découvrir</h2>
                            </div>
                            <div class="col-md-2 col-12 d-flex btnTitle align-items-center justify-content-end mt-5">
                                <a href="#" class="btn btn-danger btn-sm text-light rounded-4 buttonArticleSelectionGame fw-bold text-uppercase">
                                    Tous les jeux
                                    <i class="bi bi-arrow-right mx-2" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>
                        <div class="row g-3">
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
            </section>
        </div>
    </section>