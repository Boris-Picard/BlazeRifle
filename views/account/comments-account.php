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
                        <h1 class="fw-bold text-uppercase">Mes <span class="text-danger">10</span> derniers commentaires</h1>
                    </div>
                </div>
                <div class="col-4 py-3">
                    <div class="d-flex justify-content-end">
                        <a href="/controllers/account/account-ctrl.php?id_user=<?= $user->id_user ?>" class="btn btn-secondary py-3 rounded-5 fw-bold text-uppercase">Mon profil</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <?php if (isset($_SESSION['msg'])) { ?>
                        <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                            <i class="bi bi-check-circle-fill"></i>
                            <?= $_SESSION['msg'] ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <?php if (!empty($comments)) { ?>
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
                                        <th scope="col">Catégorie</th>
                                        <th scope="col">
                                            Date de création
                                        </th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($comments as $comment) { ?>
                                        <tr>
                                            <td class="fw-semibold text-break"><a href="/controllers/articles/article-ctrl.php?id_article=<?= $comment->id_article ?>&id_category=<?= $comment->id_category ?>&id_game=<?= $comment->id_game ?>" class="btn btn-outline-danger p-3 rounded-5 fw-bold">Voir la page</a></td>
                                            <?php if (strlen($comment->comment) > 55) { ?>
                                                <td class="fw-semibold text-primary">Commentaire trop long à afficher</td>
                                            <?php } else { ?>
                                                <td class="fw-semibold"><?= $comment->comment ?></td>
                                            <?php } ?>
                                            <td class="fw-semibold"><?= $comment->game_name ?></td>
                                            <td class="fw-semibold"><?= $comment->label ?></td>
                                            <td class="fw-semibold">
                                                le
                                                <?= $comment->formattedDate ?>
                                                a
                                                <?= $comment->formattedHour ?>
                                            </td>
                                            <td class="fw-semibold">
                                                <?php if (!is_null($comment->comment_confirmed_at)) { ?>
                                                    <button class="btn btn-small btn-success ">Validé</button>
                                                <?php  } else { ?>
                                                    <a href="#" class="btn btn-secondary btn-sm">En attente</a>
                                                <?php } ?>
                                            </td>
                                            <td class="fw-semibold">
                                                <a href="" class="btn btn-sm btn-light" data-comment-name="<?= $comment->game_name ?>" data-comment-id="<?= $comment->id_comment ?>" data-bs-toggle="modal" data-bs-target="#modalDelete">
                                                    <i class="bi bi-trash3-fill fs-4 text-danger"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                            <!-- Modal -->
                        </div>
                    </div>
                    <div class="modal fade" id="modalDelete" tabindex="-1" aria-labelledby="modal" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title modalVehicle fs-5">Supprimer le commentaire</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Êtes-vous sûr de vouloir supprimer cet élément ? Cette action est irréversible et entraînera la perte définitive des données associées.
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary p-3 rounded-5 text-uppercase fw-bold" data-bs-dismiss="modal">annuler</button>
                                    <a href="" class="btn btn-danger deleteModalBtn p-3 rounded-5 text-uppercase fw-bold">Supprimer</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } else {  ?>
                <div class="alert alert-primary" role="alert">
                    Vous n'avez pas encore écrit de commentaires !
                </div>
            <?php } ?>
        </div>
        </div>
    </section>