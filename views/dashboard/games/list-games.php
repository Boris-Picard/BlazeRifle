<!-- Main -->
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-10 mx-auto mt-5">
            <div class="row">
                <div class="col-12">
                    <h1 class="fw-bold text-uppercase">liste des jeux</h1>
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
                        <table class="table table-borderless table-hover table-responsive align-middle">
                            <thead>
                                <tr>
                                    <th scope="col">
                                        Consoles
                                    </th>
                                    <th scope="col">
                                        Jeux
                                    </th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($games as $game) { ?>
                                    <tr>
                                        <td class="fw-semibold">
                                            <?= $game->consoles ?>
                                        </td>
                                        <td class="fw-semibold"><?= $game->game_name ?></td>
                                        <td class="fw-semibold text-break w-25 "><?= $game->game_description ?></td>
                                        <td class="fw-semibold">
                                            <?php if (isset($game->game_picture)) { ?>
                                                <div class="ratio ratio-1x1">
                                                    <img src="/public/uploads/games/<?= $game->game_picture ?>" alt="<?= $game->game_picture ?>" class="object-fit-cover rounded-circle">
                                                </div>
                                            <?php } ?>
                                        </td>
                                        <td>
                                            <a href="/controllers/dashboard/games/update-game-ctrl.php?id=<?= $game->id_game ?>" class="text-decoration-none btn btn-sm btn-light">
                                                <i class="bi bi-pencil-square text-dark fs-4"></i>
                                            </a>
                                            <a href="/controllers/dashboard/games/delete-game-ctrl.php?id=<?= $game->id_game ?>" class="text-decoration-none btn btn-sm btn-light">
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