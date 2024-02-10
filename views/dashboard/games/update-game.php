    <!-- Main -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-10 mx-auto mt-5">
                <div class="row">
                    <div class="col-12">
                        <h1 class="fw-bold text-uppercase">Ajouter un Jeu</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <?= $msg ?>
                        <?php if (isset($alert['success'])) { ?>
                            <div class="alert alert-success">
                                <?= $alert['success'] ?>
                            </div>
                        <?php } elseif (isset($alert['error'])) { ?>
                            <div class="alert alert-danger alert-dismissible fade show">
                                <?= $alert['error'] ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <form action="#" method="POST" class="shadow-lg p-5 rounded-4" novalidate enctype="multipart/form-data">
                            <div class="row">
                                <div class="mb-3 col-md-12">
                                    <div><small class="form-text text-danger"><?= $error['name'] ?? '' ?></small></div>
                                    <label for="name" class="form-label">Nom du jeu <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="name" id="name" value="<?= $game->game_name ?>" aria-describedby="name" placeholder="" minlength="2" maxlength="150" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-3 col-md-12">
                                    <div><small class="form-text text-danger"><?= $error['description'] ?? '' ?></small></div>
                                    <label for="description" class="form-label">Description du jeu <span class="text-danger">*</span></label>
                                    <textarea class="form-control" name="description" id="description" aria-describedby="description" placeholder="" minlength="150" maxlength="500" required><?= $game->game_description ?></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-3 col-md-12">
                                    <?php if (isset($game->game_picture)) { ?>
                                        <div class="pt-3 d-flex justify-content-center">
                                            <div class="ratio ratio-21x9">
                                                <img src="/public/uploads/games/<?= $game->game_picture ?>" alt="<?= $game->game_picture ?>" class="object-fit-cover rounded-4">
                                            </div>
                                            <div class="mx-2 d-flex align-items-center">
                                                <a href="/controllers/dashboard/games/update-img-ctrl.php?id=<?= $game->id_game ?>" class="btn btn-danger fw-bold text-uppercase">
                                                    Supprimer
                                                </a>
                                            </div>
                                        </div>
                                    <?php } else { ?>
                                        <div><small class="form-text text-danger"><?= $error['picture'] ?? '' ?></small></div>
                                        <label for="picture" class="form-label">Ajouter une photo de jeu</label>
                                        <input class="form-control" type="file" id="picture" name="picture" accept="image/png, image/jpeg, image/avif" required>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <div><small class="form-text text-danger"><?= $error['consoles'] ?? '' ?></small></div>
                                    <label for="">Séléctionnez au moins une console <span class="text-danger">*</span></label>
                                    <?php foreach ($consoles as $key => $console) { ?>
                                        <div class="form-check">
                                            <input
                                            class="form-check-input" 
                                            type="checkbox" 
                                            value="<?=$console->id_console?>" 
                                            id="console<?=$key?>"
                                            name="consoles[]"
                                            <?= in_array($console->console_name, explode(',', $game->consoles ?? 0)) ? 'checked' : '' ?>>
                                            <label class="form-check-label" for="console<?=$key?>">
                                                <?= htmlspecialchars($console->console_name) ?>
                                            </label>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="py-3">
                                <button type="submit" class="btn btn-danger rounded-4 fw-bold text-uppercase">Modifier</button>
                                <?php if (!empty($game->game_picture)) { ?>
                                    <a href="/controllers/dashboard/games/list-games-ctrl.php" class="btn btn-outline-danger rounded-4 fw-bold text-uppercase">Annuler</a>
                                <?php  } ?>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>