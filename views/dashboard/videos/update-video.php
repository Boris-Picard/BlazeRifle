    <!-- Main -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-10 mx-auto mt-5">
                <div class="row">
                    <div class="col-12">
                        <h1 class="fw-bold text-uppercase">Modifier une vidéo</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
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
                                    <div><small class="form-text text-danger"><?= $error['url'] ?? '' ?></small></div>
                                    <label for="url" class="form-label">Lien de la video <span class="text-danger">*</span></label>
                                    <input type="url" class="form-control" name="url" id="url" value="<?= $video->game_video ?? '' ?>" pattern="<?= REGEX_YOUTUBE ?>" aria-describedby="url" placeholder="https://www.youtube.com/" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 mb-3" id="id_game">
                                    <div><small class="form-text text-danger"><?= $error['id_game'] ?? '' ?></small></div>
                                    <label for="id_game" class="mb-2">Jeu de la vidéo <span class="text-danger">*</span></label>
                                    <select class="form-select" name="id_game">
                                        <option selected disabled></option>
                                        <?php foreach ($games as $game) { ?>
                                            <option value="<?= $game->id_game ?>" <?= $video->id_game == $game->id_game ? 'selected' : '' ?>><?= htmlspecialchars($game->game_name) ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="py-3">
                                <button type="submit" class="btn btn-danger rounded-4 fw-bold text-uppercase">Ajouter une Vidéo</button>
                                <a href="/controllers/dashboard/videos/list-videos-ctrl.php" class="btn btn-outline-danger rounded-4 fw-bold text-uppercase">Annuler</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>