<!-- Main -->
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-10 mx-auto mt-5">
            <div class="row">
                <div class="col-12">
                    <h1 class="fw-bold text-uppercase">liste des Quiz</h1>
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
                        <a href="/controllers/dashboard/quiz/add-quiz-ctrl.php" class="btn btn-danger rounded-4 text-uppercase fw-bold mx-2">Ajouter un quiz</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive shadow-lg bg-white rounded-4 text-center">
                        <table class="table table-borderless table-hover table-responsive align-middle">
                            <thead>
                                <tr>
                                    <th scope="col">
                                        Titre
                                    </th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Nb de questions</th>
                                    <th scope="col">Ajouter des questions</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (isset($allQuiz)) {
                                    foreach ($allQuiz as $quiz) { ?>
                                        <tr>
                                            <td class="fw-semibold"><?= htmlspecialchars($quiz->quiz_title) ?></td>
                                            <?php if (isset($quiz->quiz_picture)) { ?>
                                                <td>
                                                    <div class="ratio ratio-1x1">
                                                        <img src="/public/uploads/quiz/<?= $quiz->quiz_picture ?>" alt="<?= $quiz->quiz_title ?>" class="object-fit-cover rounded-circle ">
                                                    </div>
                                                </td>
                                            <?php } ?>
                                            <td class="fw-semibold text-break"><?= $quiz->quiz_description ?></td>
                                            <td class="fw-semibold text-break">
                                                <?php if (is_null($quiz->deleted_at)) { ?>
                                                    <a href="/controllers/dashboard/quiz/list-quiz-ctrl.php?id_quiz=<?= $quiz->id_quiz ?>" class="btn btn-small btn-success">Actif</a>
                                                <?php  } else { ?>
                                                    <a href="/controllers/dashboard/quiz/list-quiz-ctrl.php?id_quiz=<?= $quiz->id_quiz ?>" class="btn btn-secondary btn-sm">Inactif</a>
                                                <?php } ?>
                                            </td>
                                            <td class="fw-semibold text-break">10</td>
                                            <td class="fw-semibold text-break">
                                                <a href="/controllers/dashboard/questions/add-questions-ctrl.php?id_quiz=<?= $quiz->id_quiz ?>" class="text-decoration-none btn btn-sm btn-light">
                                                    <i class="bi bi-plus-circle-fill fs-4"></i>
                                                </a>
                                            </td>
                                            <td>
                                                <a href="/controllers/dashboard/quiz/update-quiz-ctrl.php?id_quiz=<?= $quiz->id_quiz ?>" class="text-decoration-none btn btn-sm btn-light">
                                                    <i class="bi bi-pencil-square text-dark fs-4"></i>
                                                </a>
                                                <a href="/controllers/dashboard/quiz/delete-quiz-ctrl.php?id_quiz=<?= $quiz->id_quiz ?>" class="text-decoration-none btn btn-sm btn-light">
                                                    <i class="bi bi-trash3-fill text-danger fs-4"></i>
                                                </a>
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
</div>