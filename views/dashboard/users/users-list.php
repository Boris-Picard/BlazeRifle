<!-- Main -->
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-10 mx-auto mt-5">
            <div class="row">
                <div class="col-12">
                    <h1 class="fw-bold text-uppercase">liste des utilisateurs</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <?= $msg ?>
                </div>
            </div>
            <div class="row g-2">
                <div class="col-6 pt-3">
                    <div class="d-flex mb-3">
                        <a href="/controllers/dashboard/games/add-game-ctrl.php" class="btn btn-danger rounded-4 text-uppercase fw-bold mx-2">Ajouter un Jeu</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive shadow-lg p-4 bg-white rounded-4 text-center">
                        <table class="table table-borderless table-hover table-responsive align-middle ">
                            <thead>
                                <tr>
                                    <th scope="col">
                                        Prénom
                                    </th>
                                    <th scope="col">
                                        Nom
                                    </th>
                                    <th scope="col">Pseudo</th>
                                    <th scope="col">Picture</th>
                                    <th scope="col">Date de création</th>
                                    <th scope="col">Role</th>
                                    <th scope="col">Confirmation</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($users as $user) { ?>
                                    <tr>
                                        <td class="fw-semibold">
                                            <?= $user->firstname ?>
                                        </td>
                                        <td class="fw-semibold"><?= $user->lastname ?></td>
                                        <td class="fw-semibold text-break"><?= $user->pseudo ?></td>
                                        <td class="fw-semibold">
                                            <?php if (isset($user->user_picture)) { ?>
                                                <div class="ratio ratio-1x1">
                                                    <img src="/public/uploads/games/<?= $game->game_picture ?>" alt="<?= $game->game_picture ?>" class="object-fit-cover rounded-circle">
                                                </div>
                                            <?php } ?>
                                        </td>
                                        <td class="fw-semibold text-break"><?= $user->user_created_at ?></td>
                                        <td class="fw-semibold text-break"><?= $user->role ?></td>
                                        <td class="fw-semibold text-break">
                                            <?php if (!is_null($user->user_confirmed_at)) { ?>
                                                <button class="btn btn-small btn-success ">Validé</button>
                                            <?php } else { ?>
                                                <a href="/controllers/dashboard/users/list-users-ctrl.php?id_user=<?= $user->id_user ?>" class="btn btn-secondary btn-sm">En attente</a>
                                            <?php } ?>
                                        </td>
                                        <td>
                                            <a href="/controllers/dashboard/users/update-user-ctrl.php?id_user=<?= $user->id_user ?>" class="text-decoration-none btn btn-sm btn-light">
                                                <i class="bi bi-pencil-square text-dark fs-4"></i>
                                            </a>
                                            <a href="/controllers/dashboard/users/delete-user-ctrl.php?id=<?= $user->id_user ?>" class="text-decoration-none btn btn-sm btn-light">
                                                <i class="bi bi-trash3-fill text-danger fs-4"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>