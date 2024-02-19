    <!-- Main -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-10 mx-auto mt-5">
                <div class="row">
                    <div class="col-12">
                        <h1 class="fw-bold text-uppercase">Créer des questions</h1>
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
                        <form action="#" method="POST" class="shadow-lg p-5 rounded-4" novalidate enctype="multipart/form-data" id="formQuestions">
                            <div class="row">
                                <div id="questionWrapper">
                                    <div id="questionBlock">
                                        <div class="mb-3 col-md-12 mt-2">
                                            <div><small class="form-text text-danger"><?= $error['question'] ?? '' ?></small></div>
                                            <label for="questions[]" class="form-label">Votre question <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="questions[]" id="questions" value="<?= $question ?? '' ?>" pattern="<?= REGEX_QUESTIONS ?>" aria-describedby="name" placeholder="Votre question" minlength="5" maxlength="255" required>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div><small class="form-text text-danger"><?= $error['answer_1'] ?? '' ?></small></div>
                                                <label for="answer_1[]" class="form-label">Première réponse <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="answer_1[]" id="answer_1" value="<?= $answer_1 ?? '' ?>" pattern="<?= REGEX_CATEGORY ?>" aria-describedby="name" placeholder="" minlength="5" maxlength="100" required>
                                            </div>
                                            <div class="col-md-4">
                                                <div><small class="form-text text-danger"><?= $error['answer_2'] ?? '' ?></small></div>
                                                <label for="answer_2[]" class="form-label">Deuxième réponse <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="answer_2[]" id="answer_2" value="<?= $answer_2 ?? '' ?>" pattern="<?= REGEX_CATEGORY ?>" aria-describedby="name" placeholder="" minlength="5" maxlength="100" required>
                                            </div>
                                            <div class="col-md-4">
                                                <div><small class="form-text text-danger"><?= $error['answer_3'] ?? '' ?></small></div>
                                                <label for="answer_3[]" class="form-label">Troisième réponse <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="answer_3[]" id="answer_3" value="<?= $answer_3 ?? '' ?>" pattern="<?= REGEX_CATEGORY ?>" aria-describedby="name" placeholder="" minlength="5" maxlength="100" required>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 mt-2">
                                                <div><small class="form-text text-danger"><?= $error['correct_answer'] ?? '' ?></small></div>
                                                <label for="correct_answer[]" class="mb-2">Numéro de la bonne réponse <span class="text-danger">*</span></label>
                                                <select class="form-select" name="correct_answer[]" required>
                                                    <option selected disabled></option>
                                                    <?php for ($i = 1; $i < 4; $i++) { ?>
                                                        <option value="<?= $i ?>" <?=  $correct_answer == $i ? 'selected' : '' ?>><?= $i ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 pt-3">
                                    <div class="d-flex justify-content-center">
                                        <button type="button" id="addQuestion" class="btn btn-primary rounded-4 fw-bold text-uppercase">
                                            Ajouter une question
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="py-3">
                                <button type="submit" class="btn btn-danger rounded-4 fw-bold text-uppercase">Créer les questions</button>
                                <a href="/controllers/dashboard/quiz/list-quiz-ctrl.php" class="btn btn-outline-danger rounded-4 fw-bold text-uppercase">Annuler</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>