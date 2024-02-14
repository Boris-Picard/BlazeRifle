<main>
    <section class="articlesSection py-5 bg-light">
        <div class="container">
            <section>
                <div class="row">
                    <div class="col-md-12 col-12">
                        <div class="row">
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
                                <p class="text-center mt-2">Sur notre site, découvrez une multitude de bons plans soigneusement sélectionnés pour enrichir votre quotidien.
                                    Chaque semaine, nous explorons de nouvelles offres et tendances pour vous apporter des articles détaillés, pratiques et informatifs.
                                    Que ce soit pour des gadgets technologiques dernier cri, des escapades inoubliables, ou des astuces bien-être,
                                    nous avons ce qu'il vous faut. Nos articles ne se contentent pas de lister des produits ou des services ;
                                    ils vous plongent dans une expérience, en vous fournissant des conseils d'experts, des astuces d'utilisation,
                                    et des avis objectifs. Rejoignez notre communauté de chasseurs de bons plans et économisez tout en découvrant des pépites méconnues.
                                    Avec nous, chaque clic vous rapproche de la découverte parfaite, adaptée à vos besoins et vos envies.
                                </p>
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
                                            <img src="/public/uploads/article/<?= $article->article_picture ?>" loading="lazy" class="img-fluid object-fit-cover cardsActus rounded-start rounded-3" alt="<?= $article->game_name ?>">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body px-3 d-flex flex-column justify-content-end">
                                                <div>
                                                    <span class="badge rounded-pill text-bg-danger p-2 mb-2 text-uppercase">Les bons plans</span>
                                                </div>
                                                <a href="/controllers/tips/tips-ctrl.php" class="stretched-link mt-2 h5 aCard text-decoration-none card-title fw-bold stretchLinkHover">
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
                                                    <?php if ($countComments > 0) { ?>
                                                        <span class="badge rounded-pill mb-1 mx-1 border text-dark fw-semibold"><i class="bi bi-chat-right-dots mx-1 align-middle"></i><?= $countComments ?></span>
                                                    <?php  } ?>
                                                </small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    <?php } ?>
                    <nav aria-label="pagination">
                        <ul class="pagination justify-content-center mt-5">
                            <li class="page-item">
                                <a class="page-link text-dark" href="#" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                            <li class="page-item"><a class="page-link text-dark activePagination" href="#">1</a></li>
                            <li class="page-item"><a class="page-link text-dark" href="#">2</a></li>
                            <li class="page-item"><a class="page-link text-dark" href="#">3</a></li>
                            <li class="page-item"><a class="page-link text-dark" href="#">4</a></li>
                            <li class="page-item"><a class="page-link text-dark" href="#">5</a></li>
                            <li class="page-item"><a class="page-link text-dark" href="#">6</a></li>
                            <li class="page-item"><a class="page-link text-dark" href="#">...</a></li>
                            <li class="page-item"><a class="page-link text-dark" href="#">20</a></li>
                            <li class="page-item">
                                <a class="page-link text-dark" href="#" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                    </div>
                </div>
        </div>
    </section>
    </div>
    </section>