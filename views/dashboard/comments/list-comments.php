<!-- Main -->
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-10 mx-auto mt-5">
            <div class="row">
                <div class="col-12">
                    <h1 class="fw-bold text-uppercase">liste des commentaires</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <?= $msg ?>
                </div>
            </div>
            <div class="col-12 pt-3">
                <div class="d-flex mb-3 justify-content-end">
                    <form action="" class="d-flex">
                        <select class="form-select fw-bold border-dark" name="nbComments" id="nbComments">
                            <option selected disabled>Nb Commentaires</option>
                            <option value="">Voir tous les commentaires</option>
                            <?php for ($i = 5; $i <= 100; $i += 5) {  ?>
                                <option value="<?= $i ?>" <?= (isset($nbComments) && $nbComments == $i ? 'selected' : '') ?>><?= $i ?></option>
                            <?php } ?>
                        </select>
                        <button class="btn btn-danger rounded-4 fw-bold mx-2">Valider</button>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive shadow-lg bg-white rounded-4 text-center">
                        <table class="table table-borderless table-hover table-responsive align-middle">
                            <thead>
                                <tr>
                                    <th scope="col">
                                        Commentaire
                                    </th>
                                    <th scope="col">
                                        Id de l'article
                                    </th>
                                    <th scope="col">Nom du jeu</th>
                                    <th scope="col">Catégorie</th>
                                    <th scope="col">Pseudo</th>
                                    <th scope="col">Photo de l'utilisateur</th>
                                    <th scope="col">
                                        Date de création
                                        <a href="/controllers/dashboard/comments/list-comments-ctrl.php?order=ASC&nbComments=<?= $nbComments ?>" class="btn btn-sm btn-light"><i class="bi bi-caret-up-fill mx-1 text-dark"></i></a>
                                        <a href="/controllers/dashboard/comments/list-comments-ctrl.php?order=DESC&nbComments=<?= $nbComments ?>" class="btn btn-sm btn-light"><i class="bi bi-caret-down-fill text-dark"></i></a>
                                    </th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (isset($comments)) {
                                    foreach ($comments as $comment) { ?>
                                        <tr>
                                            <?php if (strlen($comment->comment) > 70) { ?>
                                                <td class="fw-semibold text-break"><a href="/controllers/dashboard/comments/update-comment-ctrl.php?id_comment=<?= $comment->id_comment ?>" class="btn btn-outline-danger rounded-4 fw-bold">Voir le commentaire</a></td>
                                            <?php } else { ?>
                                                <td class="fw-semibold text-break"><?= $comment->comment ?></td>
                                            <?php } ?>
                                            <td class="fw-semibold"><?= $comment->id_article ?></td>
                                            <td class="fw-semibold"><?= $comment->game_name ?></td>
                                            <td class="fw-semibold"><?= $comment->label ?></td>
                                            <td class="fw-semibold"><?= $comment->pseudo ?></td>
                                            <td class="fw-semibold">
                                                <?php if (isset($comment->user_picture)) { ?>
                                                    <div class="ratio ratio-1x1">
                                                        <img src="/public/uploads/users/<?= $comment->user_picture ?>" alt="<?= $comment->user_picture ?>" class="object-fit-cover rounded-circle ">
                                                    </div>
                                                <?php } ?>
                                            </td>
                                            <td class="fw-semibold">
                                                <?= $comment->comment_created_at ?>
                                            </td>
                                            <td class="fw-semibold">
                                                <?php if (!is_null($comment->comment_confirmed_at)) { ?>
                                                    <button class="btn btn-small btn-success ">Validé</button>
                                                <?php  } else { ?>
                                                    <a href="/controllers/dashboard/comments/list-comments-ctrl.php?id_comment=<?= $comment->id_comment ?>" class="btn btn-secondary btn-sm">En attente</a>
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <a href="/controllers/dashboard/comments/update-comment-ctrl.php?id_comment=<?= $comment->id_comment ?>" class="text-decoration-none btn btn-sm btn-light">
                                                    <i class="bi bi-pencil-square text-dark fs-4"></i>
                                                </a>
                                                <a href="/controllers/dashboard/comments/delete-comment-ctrl.php?id_comment=<?= $comment->id_comment ?>" class="text-decoration-none btn btn-sm btn-light">
                                                    <i class="bi bi-trash3-fill text-danger fs-4"></i>
                                                </a>
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
</div>