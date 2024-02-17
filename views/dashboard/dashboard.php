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
                                    <h5 class="text-white">Pourcentage de nouveaux compte sur la semaine</h5>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="card-text text-center">
                                    <div class="d-flex justify-content-center py-3">
                                        <div class="progress-circle" data-percentage="<?= $growFromWeek ?>">
                                            <span class="percentage"></span>
                                        </div>
                                    </div>
                                    <p class="text-capitalize fw-bold">dernier inscrit : </p>
                                    <?php if ($users[0]->role === 1) { ?>
                                        <p class="text-danger fw-semibold">
                                            <?= $users[0]->pseudo ?>
                                        </p>
                                    <?php } elseif ($users[0]->role === 2) { ?>
                                        <p class="text-primary fw-semibold">
                                            <?= $users[0]->pseudo ?>
                                        </p>
                                    <?php  } else { ?>
                                        <p class="text-warning fw-semibold">
                                            <?= $users[0]->pseudo ?>
                                        </p>
                                    <?php } ?>
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
                                    <p>de
                                        <?php if ($comments[0]->role === 1) { ?>
                                    <span class="text-danger fw-semibold">
                                        <?= $comments[0]->pseudo ?>
                                    </p>
                                <?php } elseif ($comments[0]->role === 2) { ?>
                                    <span class="text-primary fw-semibold">
                                        <?= $comments[0]->pseudo ?>
                                    </p>
                                <?php  } else { ?>
                                    <span class="text-warning fw-semibold">
                                        <?= $comments[0]->pseudo ?>
                                    </p>
                                <?php } ?>
                                </p>
                                <p><?= $comments[0]->comment_created_at ?></p>
                                </div>
                            </div>
                        <?php } ?>
                        </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 mt-5">
                    <div class="table-responsive shadow-lg bg-white rounded-5 text-center">
                        <table class="table table-borderless table-hover table-responsive align-middle">
                            <div class="card">
                                <div class="card-header border-0 bg-success rounded-top-5">
                                    <div class="w-100 d-flex justify-content-around">
                                        <h3 class="fw-bold text-white">Les derniers utilisateurs inscrits</h3>
                                        <h3 class="fw-bold text-white">
                                            Total utilisateurs : <?= count($users) ?>
                                        </h3>
                                    </div>
                                    <thead>
                                        <tr>
                                            <th scope="col">
                                                Prénom
                                            </th>
                                            <th scope="col">Nom</th>
                                            <th scope="col">Pseudo</th>
                                            <th scope="col">Date de création</th>
                                            <th scope="col">Status</th>
                                        </tr>
                                    </thead>
                                </div>
                            </div>
                            <tbody>
                                <?php if (isset($users)) {
                                    foreach ($users as $user) { ?>
                                        <tr>
                                            <td class="fw-semibold"><?= $user->firstname ?></td>
                                            <td class="fw-semibold"><?= $user->lastname  ?></td>
                                            <?php if ($user->role === 1) { ?>
                                                <td class="text-danger fw-semibold">
                                                    <?= $user->pseudo ?>
                                                </td>
                                            <?php } elseif ($user->role === 2) { ?>
                                                <td class="text-primary fw-semibold">
                                                    <?= $user->pseudo ?>
                                                </td>
                                            <?php  } else { ?>
                                                <td class="text-warning fw-semibold">
                                                    <?= $user->pseudo ?>
                                                </td>
                                            <?php } ?>
                                            <td class="fw-semibold">
                                                <?= $user->user_created_at ?>
                                            </td>
                                            <td class="fw-semibold">
                                                <?php if (!is_null($user->user_confirmed_at)) { ?>
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