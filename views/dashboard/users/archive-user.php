<!-- Main -->
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-10 mx-auto mt-5">
            <div class="row">
                <div class="col-12">
                    <h1 class="fw-bold text-uppercase">liste des utilisateurs archivées</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                </div>
            </div>
            <div class="col-5 pt-3">
                <div class="d-flex mb-3">
                    <a href="/controllers/dashboard/users/users-list-ctrl.php" class="btn btn-outline-danger rounded-4 text-uppercase fw-bold mx-2">Revenir a la liste des comptes</a>
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
                                                    <img src="/public/uploads/users/<?= $user->user_picture ?>" alt="<?= $user->user_picture ?>" class="object-fit-cover rounded-circle">
                                                </div>
                                            <?php } ?>
                                        </td>
                                        <td class="fw-semibold text-break"><?= $user->user_created_at ?></td>
                                        <td class="fw-semibold text-break"><?= $user->role ?></td>
                                        <td>
                                            <a href="/controllers/dashboard/users/users-list-ctrl.php?id_user=<?= $user->id_user ?>" class="text-decoration-none btn btn-sm btn-light">
                                                <i class="bi bi-archive text-dark fs-4"></i>
                                            </a>
                                            <a href="/controllers/dashboard/users/delete-user-ctrl.php?id_user=<?= $user->id_user ?>" class="text-decoration-none btn btn-sm btn-light">
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