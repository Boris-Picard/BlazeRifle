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
                        <h2 class="fw-bold text-uppercase py-2 aCardMin">grand theft auto vi</h2>
                        <div class="card rounded-4 border-0 shadow ">
                            <img src="/public/assets/img/gta6.avif" class="card-img object-fit-cover cardSelection w-100 rounded-4" alt="GTA 6">
                            <div class="card-img-overlay cardSelection d-flex flex-column justify-content-end cardShadow">
                                <use href="#arrow-right"></use>
                                <p class="p-0 m-0 z-3">
                                    <a href="/controllers/articles-list/articles-ctrl.php" class="text-uppercase text-decoration-none fw-bold text-light z-3 stretched-link icon-link icon-link-hover">
                                        Grand Theft auto vi
                                        <i class="bi bi-arrow-right fs-5 d-flex" aria-hidden="true">
                                        </i>
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
                                <a href="/controllers/articles-list/articles-ctrl.php" class="btn btn-danger text-light w-100 rounded-4 buttonArticleSelectionGame p-1 fw-bold text-uppercase aCardMin mt-3 mb-1">
                                    Tous les articles sur : Grand Theft Auto VI
                                </a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>
    <!-- FIN TOP JEUX SELECTION -->