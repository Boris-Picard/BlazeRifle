<!-- Main -->
<div class="container-fluid h-100">
    <div class="row">
        <div class="col-xl-12 mx-auto p-4 mt-4">
            <div class="row mb-5">
                <div class="col-12">
                    <div class="d-flex justify-content-center">
                        <h1>Bienvenue sur votre dashboard <span class="text-danger text-uppercase fw-bold"><?= $_SESSION['user']->pseudo ?></span></h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <?php if (isset($users[0])) { ?>
                        <div class="card h-100 border-0 shadow-lg rounded-5">
                            <div class="card-header border-0 bg-success rounded-top-5">
                                <div class="card-text text-center">
                                    <h5 class="text-white">Nombre d'utilisateurs</h5>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="card-text text-center">
                                    <h1 class="fw-bold"><?= count($users) ?></h1>
                                    <p class="text-capitalize fw-bold">dernier inscrit : </p>
                                    <p class="text-danger fw-bold text-uppercase"><?= $users[0]->pseudo ?>
                                    </p>
                                    <p><?= $users[0]->user_created_at ?></p>
                                </div>
                            </div>
                        <?php } ?>
                        </div>
                </div>
                <div class="col-md-4">
                    <?php if (isset($articles[0])) { ?>
                        <div class="card h-100 border-0 shadow-lg rounded-5">
                            <div class="card-header border-0 bg-danger rounded-top-5">
                                <div class="card-text text-center">
                                    <h5 class="text-white">Nombre d'articles</h5>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="card-text text-center">
                                    <h1 class="fw-bold"><?= count($articles) ?></h1>
                                    <p class="text-capitalize fw-bold">dernier article ajouté : </p>
                                    <p><?= $articles[0]->game_name ?></p>
                                    <p><?= $articles[0]->article_title ?></p>
                                    <p><?= $articles[0]->article_created_at ?></p>
                                </div>
                            </div>
                        <?php } ?>
                        </div>
                </div>
                <div class="col-md-4">
                    <?php if (isset($comments[0])) { ?>
                        <div class="card h-100 border-0 shadow-lg rounded-5">
                            <div class="card-header border-0 bg-dark rounded-top-5">
                                <div class="card-text text-center">
                                    <h5 class="text-white">Nombre de commentaires</h5>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="card-text text-center">
                                    <h1 class="fw-bold"><?= count($comments) ?></h1>
                                    <p class="text-capitalize fw-bold">dernier commentaire : </p>
                                    <p>de <span class="text-danger fw-bold text-uppercase"><?= $comments[0]->pseudo ?></span>
                                    </p>
                                    <!-- <p><?= $comments[0]->comment ?></p> -->
                                    <p><?= $comments[0]->comment_created_at ?></p>
                                </div>
                            </div>
                        <?php } ?>
                        </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 mt-5">
                    <div class="table-responsive shadow-lg p-4 bg-white rounded-5 text-center">
                        <table class="table table-borderless table-hover table-responsive align-middle">
                            <thead>
                                <tr>
                                    <th scope="col">
                                        Id de l'article
                                    </th>
                                    <th scope="col">Nom du jeu</th>
                                    <th scope="col">Catégorie</th>
                                    <th scope="col">Pseudo</th>
                                    <th scope="col">Photo de l'utilisateur</th>
                                    <th scope="col">
                                        Date de création
                                    </th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (isset($bottomComments)) {
                                    foreach ($bottomComments as $comment) { ?>
                                        <tr>
                                            <td class="fw-semibold"><?= $comment->id_article ?></td>
                                            <td class="fw-semibold"><?= $comment->game_name ?></td>
                                            <td class="fw-semibold"><?= $comment->label ?></td>
                                            <td class="fw-semibold"><?= $comment->pseudo ?></td>
                                            <td class="fw-semibold">
                                                <?php if (isset($comment->user_picture)) { ?>
                                                    <div class="ratio ratio-1x1">
                                                        <img src="/public/uploads/article/<?= $comment->user_picture ?>" alt="<?= $comment->user_picture ?>" class="object-fit-cover rounded-circle ">
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
                                                    <a class="btn btn-secondary btn-sm">En attente</a>
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