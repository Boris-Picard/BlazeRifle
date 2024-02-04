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
                                        <li class="breadcrumb-item"><a href="/controllers/games-preview/games-ctrl.php">Preview Des Jeux</a></li>
                                        <li class="breadcrumb-item"><a href="/controllers/articles-preview/articles-ctrl.php">Preview Des Articles</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Les Articles</li>
                                    </ol>
                                </nav>
                            </div>
                            <div class="col-12 mt-3 justify-content-center d-flex flex-column align-items-center">
                                <?php if (!empty($articles)) { ?>
                                    <h2 class="h2 text-uppercase fw-bold text-center">Les articles : <span class="text-danger"><?= isset($gameId) ? $articles[0]->game_name : $articles[0]->console_name ?></span></h2>
                                    <p class="text-center text-break mt-2">
                                        <?= $articles[0]->game_description ?>
                                    </p>
                                <?php  } ?>
                            </div>
                        </div>
                        <div class="col-12">
                            <hr class="hr">
                        </div>
                        <div class="col-12 p-0 py-3">
                            <?php foreach ($articles as $article) { ?>
                                <div class="card mb-4 border-0 bg-transparent cardsActus shadow-lg rounded-4">
                                    <div class="row g-0">
                                        <div class="col-md-4">
                                            <div class="ratio ratio-16x9">
                                                <img src="/public/uploads/article/<?= $article->article_picture ?>" class="img-fluid object-fit-cover card-img-top imgActus shadow-lg rounded-start rounded-3" alt="<?= $article->article_picture ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body px-3 d-flex flex-column justify-content-end">
                                                <div>
                                                    <span class="badge rounded-pill text-bg-danger p-2 mb-2 text-uppercase">battlefield 2042</span>
                                                </div>
                                                <a href="/controllers/articles/article-ctrl.php?id_article=<?= $article->id_article ?><?= isset($gameId) ? '&id_game=' . $article->id_game : '&id_console=' . $article->id_console ?>" class="stretched-link mt-2 h5 aCard text-decoration-none card-title fw-bold stretchLinkHover">
                                                    <?= $article->article_title ?>
                                                </a>
                                                <p class="aCard mt-2">
                                                    <?= $article->article_description ?>
                                                </p>
                                                <div>
                                                    <hr class="hr">
                                                </div>
                                                <small>
                                                    A <?= $article->formattedHour ?> le <?= $article->formattedDate ?>
                                                    <span class="badge rounded-pill mb-1 mx-1 border text-dark fw-semibold"><i class="bi bi-chat-right-dots mx-1 align-middle"></i>5</span>
                                                </small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <nav aria-label="pagination">
                                <ul class="pagination justify-content-center mt-5">
                                    <li class="page-item">
                                        <a class="page-link text-dark" href="?page=<?= $currentPage - 1 ?>&<?= !empty($id_game) ? 'id_game=' . $id_game : 'id_console=' . $id_console ?>" aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                        </a>
                                    </li>
                                    <?php
                                    for ($page = 1; $page <= $nbPages; $page++) {
                                        $isActive = ($currentPage == $page) ? 'activePagination' : '';
                                    ?>
                                        <li class="page-item"><a class="page-link text-dark <?= $isActive ?>" href="?page=<?= $page ?>&<?= !empty($id_game) ? 'id_game=' . $id_game : 'id_console=' . $id_console ?>"><?= $page ?></a></li>
                                    <?php  } ?>
                                    <li class="page-item">
                                        <a class="page-link text-dark" href="?page=<?= $currentPage + 1 ?>&<?= !empty($id_game) ? 'id_game=' . $id_game : 'id_console=' . $id_console ?>" aria-label="Next">
                                            <span aria-hidden="true">&raquo;</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <!-- LES GUIDES -->
                    <div class="col-md-4 col-12 colGuideRight mt-3">
                        <div class="row mx-4 rounded-4">
                            <div class="col-12 widthColRightActu shadow-lg rounded-4">
                                <div class="row">
                                    <div class="col-12 d-flex flex-row text-center align-items-center p-3">
                                        <i class="bi bi-book fs-1 px-2"></i>
                                        <h5 class="text-uppercase fw-bold"><span class="text-danger">les guides :</span> battlefield 2042</h5>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card mt-3 p-0 border-0 bg-transparent">
                                            <div class="card-img-top ratio ratio-16x9">
                                                <img src="/public/assets/img/battlefield2042.jpg" class="object-fit-cover rounded-3" alt="battlefield 2042">
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
                                        <div class="card cardActuGuideRight bg-transparent border-0 overflow-hidden mt-2">
                                            <div class="row g-0 cardActuGuideRight">
                                                <div class="col-auto">
                                                    <img src="/public/assets/img/battlefield2042.jpg" alt="battlefield 2042" class="imgActuGuideRight object-fit-cover rounded-3">
                                                </div>
                                                <div class="col-md-6 p-0 ">
                                                    <div class="card-body w-100 cardActuGuideRight p-0 mx-2 d-flex flex-column">
                                                        <div class="">
                                                            <a href="#" class="card-text bodycardGuideRight stretchLinkHover fw-semibold text-decoration-none text-dark stretched-link aCardBig">
                                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque quos rerum fugiat saepe nesciunt iure tenetur, molestiae, fuga similique sunt quia tempore esse non corporis numquam error ullam, inventore mollitia.
                                                            </a>
                                                        </div>
                                                        <p class="card-text">
                                                            <small class="text-muted">
                                                                Il y a 5 heures
                                                            </small>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card cardActuGuideRight bg-transparent border-0 overflow-hidden mt-2">
                                            <div class="row g-0 cardActuGuideRight">
                                                <div class="col-auto">
                                                    <img src="/public/assets/img/battlefield2042.jpg" alt="battlefield 2042" class="imgActuGuideRight object-fit-cover rounded-3">
                                                </div>
                                                <div class="col-md-6 p-0 ">
                                                    <div class="card-body w-100 cardActuGuideRight p-0 mx-2 d-flex flex-column">
                                                        <div class="">
                                                            <a href="#" class="card-text bodycardGuideRight stretchLinkHover fw-semibold text-decoration-none text-dark stretched-link aCardBig">
                                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque quos rerum fugiat saepe nesciunt iure tenetur, molestiae, fuga similique sunt quia tempore esse non corporis numquam error ullam, inventore mollitia.
                                                            </a>
                                                        </div>
                                                        <p class="card-text">
                                                            <small class="text-muted">
                                                                Il y a 5 heures
                                                            </small>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card cardActuGuideRight bg-transparent border-0 overflow-hidden mt-2">
                                            <div class="row g-0 cardActuGuideRight">
                                                <div class="col-auto">
                                                    <img src="/public/assets/img/battlefield2042.jpg" alt="battlefield 2042" class="imgActuGuideRight object-fit-cover rounded-3">
                                                </div>
                                                <div class="col-md-6 p-0 ">
                                                    <div class="card-body w-100 cardActuGuideRight p-0 mx-2 d-flex flex-column">
                                                        <div class="">
                                                            <a href="#" class="card-text bodycardGuideRight stretchLinkHover fw-semibold text-decoration-none text-dark stretched-link aCardBig">
                                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque quos rerum fugiat saepe nesciunt iure tenetur, molestiae, fuga similique sunt quia tempore esse non corporis numquam error ullam, inventore mollitia.
                                                            </a>
                                                        </div>
                                                        <p class="card-text">
                                                            <small class="text-muted">
                                                                Il y a 5 heures
                                                            </small>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card cardActuGuideRight bg-transparent border-0 overflow-hidden mt-2">
                                            <div class="row g-0 cardActuGuideRight">
                                                <div class="col-auto">
                                                    <img src="/public/assets/img/battlefield2042.jpg" alt="battlefield 2042" class="imgActuGuideRight object-fit-cover rounded-3">
                                                </div>
                                                <div class="col-md-6 p-0 ">
                                                    <div class="card-body w-100 cardActuGuideRight p-0 mx-2 d-flex flex-column">
                                                        <div class="">
                                                            <a href="#" class="card-text bodycardGuideRight stretchLinkHover fw-semibold text-decoration-none text-dark stretched-link aCardBig">
                                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque quos rerum fugiat saepe nesciunt iure tenetur, molestiae, fuga similique sunt quia tempore esse non corporis numquam error ullam, inventore mollitia.
                                                            </a>
                                                        </div>
                                                        <p class="card-text">
                                                            <small class="text-muted">
                                                                Il y a 5 heures
                                                            </small>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card cardActuGuideRight bg-transparent border-0 overflow-hidden mt-2">
                                            <div class="row g-0 cardActuGuideRight">
                                                <div class="col-auto">
                                                    <img src="/public/assets/img/battlefield2042.jpg" alt="battlefield 2042" class="imgActuGuideRight object-fit-cover rounded-3">
                                                </div>
                                                <div class="col-md-6 p-0 ">
                                                    <div class="card-body w-100 cardActuGuideRight p-0 mx-2 d-flex flex-column">
                                                        <div class="">
                                                            <a href="#" class="card-text bodycardGuideRight stretchLinkHover fw-semibold text-decoration-none text-dark stretched-link aCardBig">
                                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque quos rerum fugiat saepe nesciunt iure tenetur, molestiae, fuga similique sunt quia tempore esse non corporis numquam error ullam, inventore mollitia.
                                                            </a>
                                                        </div>
                                                        <p class="card-text">
                                                            <small class="text-muted">
                                                                Il y a 5 heures
                                                            </small>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card cardActuGuideRight bg-transparent border-0 overflow-hidden mt-2">
                                            <div class="row g-0 cardActuGuideRight">
                                                <div class="col-auto">
                                                    <img src="/public/assets/img/battlefield2042.jpg" alt="battlefield 2042" class="imgActuGuideRight object-fit-cover rounded-3">
                                                </div>
                                                <div class="col-md-6 p-0 ">
                                                    <div class="card-body w-100 cardActuGuideRight p-0 mx-2 d-flex flex-column">
                                                        <div class="">
                                                            <a href="#" class="card-text bodycardGuideRight stretchLinkHover fw-semibold text-decoration-none text-dark stretched-link aCardBig">
                                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque quos rerum fugiat saepe nesciunt iure tenetur, molestiae, fuga similique sunt quia tempore esse non corporis numquam error ullam, inventore mollitia.
                                                            </a>
                                                        </div>
                                                        <p class="card-text">
                                                            <small class="text-muted">
                                                                Il y a 5 heures
                                                            </small>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-center mt-3 mb-4">
                                            <a href="#" class="btn btn-danger w-50 rounded-4 p-1 fw-bold text-uppercase">
                                                les guides
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- LES VIDEOS -->
                            <div class="mt-4"></div>
                            <div class="col-12 widthColRightVideo shadow-lg rounded-4">
                                <div class="row">
                                    <div class="col-12 d-flex flex-row text-center align-items-center p-3">
                                        <i class="bi bi-play-circle fs-1 px-2"></i>
                                        <h5 class="text-uppercase fw-bold"><span class="text-warning">les vidéos :</span> battlefield 2042</h5>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card mt-3 p-0 border-0 bg-transparent">
                                            <div class="card-img-top ratio ratio-16x9">
                                                <iframe class="object-fit-cover rounded-3" src="https://www.youtube.com/embed/t8xJpEbAelU?si=dFdL0OE3ZJ4ZajTI" title="YouTube video player" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
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
                                        <div class="card mt-3 p-0 border-0 bg-transparent">
                                            <div class="card-img-top ratio ratio-16x9">
                                                <iframe class="object-fit-cover rounded-3" src="https://www.youtube.com/embed/0K6KrOm3MaA?si=gd5nUgQ4LwUblNM4" title="YouTube video player" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
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
                                        <div class="card mt-3 p-0 border-0 bg-transparent">
                                            <div class="card-img-top ratio ratio-16x9">
                                                <iframe class="object-fit-cover rounded-3" src="https://www.youtube.com/embed/XDPdtQD3dDw?si=8J56_M49Q6DJ7pyY" title="YouTube video player" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
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
                                        <div class="d-flex justify-content-center mt-3 mb-4">
                                            <a href="#" class="btn btn-warning w-50 rounded-4 p-1 fw-bold text-uppercase">
                                                les vidéos
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