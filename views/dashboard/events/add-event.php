<!-- Main -->
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-10 mx-auto mt-5">
            <div class="row">
                <div class="col-12">
                    <h1 class="fw-bold text-uppercase">Ajouter un événement</h1>
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
                    <form action="" method="POST" class="shadow-lg p-5 rounded-4" novalidate enctype="multipart/form-data">
                        <div class="row">
                            <div class="mb-3 col-md-12">
                                <div><small class="form-text text-danger"><?= $error['title'] ?? '' ?></small></div>
                                <label for="title" class="form-label">Titre de l'événement <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="title" id="title" value="<?= $title ?? '' ?>" aria-describedby="title" placeholder="Call of Duty 2025, une suite de Black Ops 2 ?" minlength="10" maxlength="150" pattern="<?= REGEX_TITLE ?>" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <div><small class="form-text text-danger"><?= $error['picture'] ?? '' ?></small></div>
                                <label for="picture" class="form-label">Ajouter une photo de l'événement <span class="text-danger">*</span></label>
                                <input class="form-control" type="file" id="picture" name="picture" accept="image/png, image/jpeg, image/avif">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <div><small class="form-text text-danger"><?= $error['description'] ?? '' ?></small></div>
                                <label for="description" class="form-label">Description de l'événement <span class="text-danger">*</span></label>
                                <textarea class="form-control descriptionArea" name="description" id="description" placeholder="Créer une description d'article" aria-describedby="description" minlength="50" maxlength="500" required><?= $description ?? '' ?></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-md-12">
                                <div><small class="form-text text-danger"><?= $error['link'] ?? '' ?></small></div>
                                <label for="link" class="form-label">Lien de l'event <span class="text-danger">*</span></label>
                                <input type="url" class="form-control" name="link" id="link" value="<?= $link ?? '' ?>" aria-describedby="link" placeholder="https://www.millenium.org/" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-md-4">
                                <div><small class="form-text text-danger"><?= $error['place'] ?? '' ?></small></div>
                                <label for="place" class="form-label">Lieu de l'événement <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="place" id="place" value="<?= $place ?? '' ?>" aria-describedby="place" placeholder="Paris" pattern="<?= REGEX_TITLE ?>" required>
                            </div>
                            <div class="mb-3 col-md-4">
                                <div><small class="form-text text-danger"><?= $error['date'] ?? '' ?></small></div>
                                <label for="date" class="form-label">Date de l'événement <span class="text-danger">*</span></label>
                                <input type="date" class="form-control" name="date" id="date" value="<?= $date ?? '' ?>" aria-describedby="date" placeholder="Call of Duty 2025, une suite de Black Ops 2 ?" min="<?= date('Y-m-d')  ?>" max="<?= (date('Y') + 5) . date('-m-d') ?>" pattern="" required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <div><small class="form-text text-danger"><?= $error['id_game'] ?? '' ?></small></div>
                                <label for="id_game" class="mb-2">Jeux de l'événement <span class="text-danger">*</span></label>
                                <select class="form-select" name="id_game">
                                    <option selected disabled></option>
                                    <?php foreach ($games as $game) { ?>
                                        <option value="<?= $game->id_game ?>" <?= (isset($id_game) && $id_game == $game->id_game) ? 'selected' : '' ?>><?= $game->name ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="py-3">
                            <button type="submit" class="btn btn-danger rounded-4 fw-bold text-uppercase">Ajouter un événement</button>
                            <a href="/controllers/dashboard/events/list-events-ctrl.php" class="btn btn-outline-danger rounded-4 fw-bold text-uppercase">Voir les événements</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>