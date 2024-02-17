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
                <div class="col-5 pt-3">
                    <div class="d-flex mb-3">
                        <h1 class="fw-bold text-uppercase">Mes commentaires</h1>
                    </div>
                </div>
                <div class="col-6 py-3">
                    <div class="d-flex justify-content-end">
                        <a href="/controllers/account/account-ctrl.php?id_user=<?= $user->id_user ?>" class="btn btn-secondary py-3 rounded-5 fw-bold text-uppercase">Mon profil</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive shadow-lg bg-white rounded-4 text-center">
                        <table class="table table-borderless table-hover table-responsive align-middle">
                            <thead>
                                <tr>
                                    <th scope="col">
                                        Voir le commentaire
                                    </th>
                                    <th scope="col">
                                        Commentaire
                                    </th>
                                    <th scope="col">Nom du jeu</th>
                                    <th scope="col">Pseudo</th>
                                    <th scope="col">
                                        Date de création
                                    </th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (isset($comments)) {
                                    foreach ($comments as $comment) { ?>
                                        <tr>
                                            <td class="fw-semibold text-break"><a href="/controllers/articles/article-ctrl.php?id_article=<?= $comment->id_article ?>&id_category=<?= $comment->id_category ?>&id_game=<?= $comment->id_game ?>" class="btn btn-outline-danger p-3 rounded-5 fw-bold">Voir la page</a></td>
                                            <?php if (strlen($comment->comment) > 55) { ?>
                                                <td class="fw-semibold text-primary">Commentaire trop long à afficher</td>
                                            <?php } else { ?>
                                                <td class="fw-semibold"><?= $comment->comment ?></td>
                                            <?php } ?>
                                            <td class="fw-semibold"><?= $comment->game_name ?></td>
                                            <td class="text-dark fw-semibold">
                                                <?= $comment->pseudo ?>
                                            </td>
                                            <td class="fw-semibold">
                                                <?= $comment->comment_created_at ?>
                                            </td>
                                            <td class="fw-semibold">
                                                <?php if (!is_null($comment->comment_confirmed_at)) { ?>
                                                    <button class="btn btn-small btn-success ">Validé</button>
                                                <?php  } else { ?>
                                                    <a href="#" class="btn btn-secondary btn-sm">En attente</a>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                <?php }
                                } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>