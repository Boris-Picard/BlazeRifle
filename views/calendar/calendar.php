<main>
    <section class="articlesSection py-5 bg-light">
        <div class="container">
            <section>
                <div class="row">
                    <div class="col-12">
                        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/controllers/home-ctrl.php">Accueil</a></li>
                                <li class="breadcrumb-item active text-capitalize" aria-current="page">Calendrier des évents à venir</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-12 imgBannerCalendar rounded-4 p-0">
                        <div class="col-12 opacityBanner d-flex align-items-center justify-content-center h-100 rounded-4">
                            <h1 class="text-center fw-bold text-light text-uppercase">Calendrier des events</h1>
                        </div>
                    </div>
                    <div class="col-md-8 col-12">
                        <div class="row">
                            <div class="col-12 d-flex justify-content-center shadow-lg mt-5 selectBgCalendar rounded-4">
                                <div class="row">
                                    <div class="col-12 d-flex flex-column justify-content-center">
                                        <form action="#" method="POST">
                                            <div><small class="form-text text-danger"><?= $error['id_game'] ?? '' ?></small></div>
                                            <select class="form-select" name="id_game" id="id_game" required>
                                                <option value="" selected disabled>Séléctionnez un jeu</option>
                                                <?php foreach ($games as $game) { ?>
                                                    <option value="<?= $game->id_game ?>" <?= (isset($id_game) && $id_game == $game->id_game) ? 'selected' : '' ?>><?= $game->name ?></option>
                                                <?php } ?>
                                            </select>
                                            <div class="mt-4">
                                                <button type="submit" class="btn btn-primary w-100 rounded-5 p-1 btn-sm text-uppercase fw-bold">
                                                    Envoyer
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 my-5 pt-2">
                                <hr>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <?php foreach ($events as $event) { ?>
                                    <div class="py-2">
                                        <!-- MONTH -->
                                        <h2 class="text-uppercase fw-bold">
                                            Janvier
                                        </h2>
                                    </div>
                                    <!-- CARDS -->
                                    <div class="card mb-4 border-0 bg-transparent cardsActus shadow-lg rounded-4">
                                        <div class="row g-0">
                                            <div class="col-md-4">
                                                <img src="/public/assets/img/cod_mobile_2023.jpg" class="img-fluid object-fit-cover cardsActus rounded-start rounded-3" alt="Call of Duty: Modern Warfare 3">
                                            </div>
                                            <div class="col-md-8">
                                                <div class="card-body px-3 d-flex flex-column justify-content-end">
                                                    <div>
                                                        <span class="badge rounded-pill text-bg-danger p-2 mb-2 text-uppercase">cod : mw 3</span>
                                                    </div>
                                                    <a href="#" class="stretched-link mt-2 h5 aCard text-decoration-none card-title fw-bold stretchLinkHover">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et, magni quisquam. Earum aperiam magni et minus quisquam fuga dicta amet quaerat quod voluptatum accusantium, unde veniam. Tenetur error est quos?</a>
                                                    <p class="aCardBig mt-2">
                                                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Id excepturi ut ratione suscipit! Alias nesciunt iure officiis quis placeat, corrupti sint necessitatibus aspernatur libero sapiente, tempore rerum error fugiat provident?
                                                    </p>
                                                    <div class="justify-content-between d-flex">
                                                        <small>
                                                            24-01-2023
                                                        </small>
                                                        <small>
                                                            Las vegas
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
                    <!-- SIDEBAR -->
                    <div class="col-md-4 col-12 mt-5">
                        <div class="row mx-4 rounded-4">
                            <div class="col-12 widthColRightActu shadow-lg rounded-4">
                                <div class="row">
                                    <div class="col-12 d-flex flex-row text-center p-3">
                                        <i class="bi bi-pen fs-3"></i>
                                        <h5 class="text-uppercase fw-bold"><span class="text-danger">articles sur :</span> Call of Duty: Modern Warfare 3</h5>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card mt-3 p-0 border-0 bg-transparent">
                                            <div class="card-img-top ratio ratio-16x9">
                                                <img src="/public/assets/img/toutes-infos-gta-vi.webp" class="object-fit-cover rounded-3" alt="Sunset Over the Sea">
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
                                                    <img src="/public/assets/img/gta-6-news-visu.jpg" alt="Trendy Pants and Shoes" class="imgActuGuideRight object-fit-cover rounded-3">
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
                                                    <img src="/public/assets/img/gta-6-news-visu.jpg" alt="Trendy Pants and Shoes" class="imgActuGuideRight object-fit-cover rounded-3">
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
                                                    <img src="/public/assets/img/gta-6-news-visu.jpg" alt="Trendy Pants and Shoes" class="imgActuGuideRight object-fit-cover rounded-3">
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
                                                    <img src="/public/assets/img/gta-6-news-visu.jpg" alt="Trendy Pants and Shoes" class="imgActuGuideRight object-fit-cover rounded-3">
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
                                                    <img src="/public/assets/img/gta-6-news-visu.jpg" alt="Trendy Pants and Shoes" class="imgActuGuideRight object-fit-cover rounded-3">
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
                                                    <img src="/public/assets/img/gta-6-news-visu.jpg" alt="Trendy Pants and Shoes" class="imgActuGuideRight object-fit-cover rounded-3">
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
                                                les articles
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