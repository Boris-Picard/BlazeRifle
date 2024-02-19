    <!-- Main -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-10 mx-auto mt-5">
                <div class="row">
                    <div class="col-12">
                        <h1 class="fw-bold text-uppercase">Créer un Quiz</h1>
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
                                <div class="mb-3 col-md-6">
                                    <div><small class="form-text text-danger"><?= $error['title'] ?? '' ?></small></div>
                                    <label for="title" class="form-label">Titre du Quiz <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="title" id="title" value="<?= $title ?? '' ?>" pattern="<?= REGEX_CATEGORY ?>" aria-describedby="name" placeholder="Call of duty" minlength="5" maxlength="100" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div><small class="form-text text-danger"><?= $error['picture'] ?? '' ?></small></div>
                                    <label for="picture" class="form-label">Photo du Quiz <span class="text-danger">*</span></label>
                                    <input class="form-control" type="file" id="picture" name="picture" accept="image/png, image/jpeg, image/avif">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <div><small class="form-text text-danger"><?= $error['description'] ?? '' ?></small></div>
                                    <label for="description" class="form-label">Description du Quiz <span class="text-danger">*</span></label>
                                    <textarea class="form-control descriptionArea" name="description" id="description" placeholder="Créer une description de quiz" aria-describedby="description" minlength="20" maxlength="255" required><?= $description ?? '' ?></textarea>
                                </div>
                            </div>
                            <div class="py-3">
                                <button type="submit" class="btn btn-danger rounded-4 fw-bold text-uppercase">Ajouter un quiz</button>
                                <a href="/controllers/dashboard/quiz/list-quiz-ctrl.php" class="btn btn-outline-danger rounded-4 fw-bold text-uppercase">Annuler</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>