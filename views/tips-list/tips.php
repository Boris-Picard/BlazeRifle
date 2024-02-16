<main>
    <section class="articlesSection py-5 bg-light">
        <div class="container">
            <section>
                <div class="row">
                    <div class="col-md-12 col-12">
                        <div class="row">
                            <?php if (!empty($articles)) { ?>
                                <div class="col-12">
                                    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="/controllers/home-ctrl.php">Accueil</a></li>
                                            <li class="breadcrumb-item active" aria-current="page"><?= $articles[0]->label ?></li>
                                        </ol>
                                    </nav>
                                </div>
                                <div class="col-12 mt-3 justify-content-center d-flex flex-column align-items-center">
                                    <h2 class="h2 text-uppercase fw-bold text-center"><?= $articles[0]->label ?></h2>
                                    <p class="text-center mt-2">
                                        <?= $articles[0]->game_description
                                        ?>
                                    </p>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="col-12">
                            <hr class="hr">
                        </div>
                        <div class="col-12 p-0 py-3">
                            <?php if (empty($articles)) { ?>
                                <div class="alert alert-danger" role="alert">
                                    Pas de bons plans pour le moment
                                </div>
                                <?php } else {
                                foreach ($articles as $article) { ?>
                                    <div class="card mb-4 border-0 bg-transparent cardsActus shadow-lg rounded-4">
                                        <div class="row g-0">
                                            <div class="col-md-4">
                                                <div class="ratio ratio-16x9">
                                                    <img src="/public/uploads/article/<?= $article->article_picture ?>" loading="lazy" class="img-fluid object-fit-cover w-100 card-img-top cardsActus shadow-lg rounded-start rounded-3" alt="<?= $article->article_picture ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="card-body px-3 d-flex flex-column justify-content-end">
                                                    <div>
                                                        <span class="badge rounded-pill text-bg-danger p-2 mb-2 text-uppercase"><?= $article->game_name ?></span>
                                                    </div>
                                                    <a href="/controllers/articles/article-ctrl.php?id_article=<?= $article->id_article ?>&id_category=<?= $article->id_category ?>&id_game=<?= $article->id_game ?>" class="stretched-link mt-2 h5 aCard text-decoration-none card-title fw-bold stretchLinkHover">
                                                        <?= $article->article_title ?>
                                                    </a>
                                                    <p class="aCard mt-2">
                                                        <?= $article->article_description ?>
                                                    </p>
                                                    <div>
                                                        <hr class="hr">
                                                    </div>
                                                    <small>
                                                        le <?= $article->formattedDate ?>
                                                        a <?= $article->formattedHour ?>
                                                        <?php if ($article->countComments > 0) { ?>
                                                            <span class="badge rounded-pill mb-1 mx-1 border text-white bg-danger fw-semibold"><i class="bi bi-chat-right-dots mx-1 align-middle"></i><?= $article->countComments ?></span>
                                                        <?php  } ?>
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                                <nav aria-label="pagination">
                                    <ul class="pagination justify-content-center mt-5">
                                        <li class="page-item">
                                            <a class="page-link text-dark" href="?page=<?= $currentPage - 1 ?>" aria-label="Previous">
                                                <span aria-hidden="true">&laquo;</span>
                                            </a>
                                        </li>
                                        <?php
                                        for ($page = 1; $page <= $nbPages; $page++) {
                                            $isActive = ($currentPage == $page) ? 'activePagination' : '';
                                        ?>
                                            <li class="page-item"><a class="page-link text-dark <?= $isActive ?>" href="?page=<?= $page ?>"><?= $page ?></a></li>
                                        <?php  } ?>
                                        <li class="page-item">
                                            <a class="page-link text-dark" href="?page=<?= $currentPage + 1 ?>" aria-label="Next">
                                                <span aria-hidden="true">&raquo;</span>
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </section>