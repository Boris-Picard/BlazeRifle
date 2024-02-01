<!-- Main -->
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-10 mx-auto mt-5">
            <div class="row">
                <div class="col-12">
                    <h1 class="fw-bold text-uppercase">liste des articles</h1>
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
                        <a href="/controllers/dashboard/articles/add-article-ctrl.php" class="btn btn-danger rounded-4 text-uppercase fw-bold mx-2">Ajouter un article</a>
                        <a href="/controllers/dashboard/articles/archive-articles-ctrl.php" class="btn btn-outline-danger rounded-4 text-uppercase fw-bold">Voir les articles archivées</a>
                    </div>
                </div>
                <div class="col-3 pt-3">
                    <div class="d-flex mb-3 justify-content-end">
                        <form action="" class="d-flex">
                            <select class="form-select fw-bold border-dark" name="nbArticles" id="nbArticles">
                                <option selected disabled>Nombre d'articles</option>
                                <option value="">Voir tous les articles</option>
                                <?php for ($i = 5; $i <= 100; $i += 5) {  ?>
                                    <option value="<?= $i ?>" <?= (isset($nbArticles) && $nbArticles == $i ? 'selected' : '') ?>><?= $i ?></option>
                                <?php } ?>
                            </select>
                    </div>
                </div>
                <div class="col-3 pt-3">
                    <div class="d-flex mb-3 justify-content-end">
                        <!-- <form action="" class="d-flex"> -->
                        <select class="form-select fw-bold border-dark" name="id_game" id="id_game">
                            <option selected disabled>Trier la liste par jeu</option>
                            <option value="">Voir tous les jeux</option>
                            <?php foreach ($games as $game) { ?>
                                <option value="<?= $game->id_game ?>" <?= (isset($id_game) && $id_game == $game->id_game) ? 'selected' : '' ?>><?= $game->game_name ?></option>
                            <?php } ?>
                        </select>
                        <button type="submit" class="btn mx-3 btn-danger rounded-4 fw-bold text-capitalize">Valider</button>
                        </form>
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
                                        Jeux
                                    </th>
                                    <th scope="col">Console</th>
                                    <th scope="col">Auteur</th>
                                    <th scope="col">Commentaires</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">
                                        Creation
                                        <a href="/controllers/dashboard/articles/list-articles-ctrl.php?id_game=<?= $id_game ?>&order=ASC" class="btn btn-sm btn-light"><i class="bi bi-caret-up-fill mx-1 text-dark"></i></a>
                                        <a href="/controllers/dashboard/articles/list-articles-ctrl.php?id_game=<?= $id_game ?>&order=DESC" class="btn btn-sm btn-light"><i class="bi bi-caret-down-fill text-dark"></i></a>
                                    </th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (isset($articles)) {
                                    foreach ($articles as $article) { ?>
                                        <tr>
                                            <td class="fw-semibold"><?= $article->game_name ?></td>
                                            <td class="fw-semibold text-break">Xbox</td>
                                            <td class="fw-semibold text-break">Boris</td>
                                            <td class="fw-semibold text-break">5</td>
                                            <td class="fw-semibold">
                                                <?php if (isset($article->article_picture)) { ?>
                                                    <div class="ratio ratio-1x1">
                                                        <img src="/public/uploads/article/<?= $article->article_picture ?>" alt="<?= $article->article_picture ?>" class="object-fit-cover rounded-circle ">
                                                    </div>
                                                <?php } ?>
                                            </td>
                                            <td class="fw-semibold"><?= $article->created_at ?></td>
                                            <td>
                                                <a href="/controllers/dashboard/articles/update-article-ctrl.php?id=<?= $article->id_article ?>" class="text-decoration-none btn btn-sm btn-light">
                                                    <i class="bi bi-pencil-square text-dark fs-4"></i>
                                                </a>
                                                <a href="/controllers/dashboard/articles/archive-articles-ctrl.php?id=<?= $article->id_article ?>" class="text-decoration-none btn btn-sm btn-light">
                                                    <i class="bi bi-archive text-dark fs-4"></i>
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