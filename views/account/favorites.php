<main>
    <section class="profilSection py-5 bg-light">
        <div class="container">
            <div class="row ">
                <div class="col-12">
                    <div class="card border-0">
                        <div class="card-body cardProfilBanner rounded-4">
                            <div class="card child-card border-0 rounded-4" style="background-image: url(/public/uploads/users/<?= !empty($user->user_picture) ? $user->user_picture : 'profilpicdefault.avif' ?>)">
                                <div class="card-body ">
                                    <p class="card-text profilName text-light w-100 fs-4 fw-bold bg-danger text-center py-3 text-uppercase rounded-5"><?= $user->pseudo ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row g-2 justify-content-between">
                <div class="col-8 pt-3">
                    <div class="d-flex mb-3">
                        <h1 class="fw-bold text-uppercase">Mes favoris</h1>
                    </div>
                </div>
                <div class="col-4 py-3">
                    <div class="d-flex justify-content-end">
                        <a href="/controllers/account/account-ctrl.php?id_user=<?= $user->id_user ?>" class="btn btn-secondary py-3 rounded-5 fw-bold text-uppercase">Mon profil</a>
                    </div>
                </div>
            </div>
            <?php if (!empty($favorites)) { ?>
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive shadow-lg bg-white rounded-4 text-center">
                            <table class="table table-borderless table-hover table-responsive align-middle">
                                <thead>
                                    <tr>
                                        <th scope="col">
                                            Titre
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($favorites as $favorite) { ?>
                                        <tr>
                                            <td class="fw-semibold"><a href="/controllers/articles/article-ctrl.php?id_article=<?= $favorite->id_article ?>&id_category=<?= $favorite->id_category?>&id_game<?= $favorite->id_game ?>"><?= $favorite->article_title ?></a></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                            <!-- Modal -->
                        </div>
                    </div>
                </div>
            <?php } else {  ?>
                <div class="alert alert-primary" role="alert">
                    Vous n'avez pas encore d'articles favoris !
                </div>
            <?php } ?>
        </div>
        </div>
    </section>