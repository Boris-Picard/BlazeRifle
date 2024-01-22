<!-- Main -->
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-10 mx-auto mt-5">
            <div class="row">
                <div class="col-12">
                    <h1 class="fw-bold text-uppercase">liste des Articles archivées</h1>
                </div>
            </div>
            <div class="row g-2">
                <div class="col-6 pt-3">
                    <div class="d-flex mb-3">
                        <a href="/controllers/dashboard/articles/list-articles-ctrl.php" class="btn btn-danger rounded-4 text-uppercase fw-bold mx-2">Revenir a la liste</a>
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
                                        ID
                                        <!-- <a href="/controllers/dashboard/vehicles/list-ctrl.php?order=ASC" class="btn btn-sm btn-light"><i class="bi bi-caret-up-fill mx-1 text-dark"></i></a>
                                            <a href="/controllers/dashboard/vehicles/list-ctrl.php?order=DESC" class="btn btn-sm btn-light"><i class="bi bi-caret-down-fill text-dark"></i></a> -->
                                    </th>
                                    <th scope="col">Titre</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Creation</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($articles as $article) { ?>
                                    <tr>
                                        <th scope="row" class="fw-semibold"><?= $article->id_article ?></th>
                                        <th scope="row" class="fw-semibold text-break"><?= $article->title ?></th>
                                        <td class="fw-semibold text-break w-25"><?= $article->description ?></td>
                                        <td class="fw-semibold">
                                            <?php if (isset($article->picture)) { ?>
                                                <div class="ratio ratio-1x1">
                                                    <img src="/public/uploads/article/<?= $article->picture ?>" alt="<?= $article->picture ?>" class="object-fit-cover rounded-circle imgVehicles">
                                                </div>
                                            <?php } ?>
                                        </td>
                                        <td class="fw-semibold"><?= $article->created_at ?></td>
                                        <td>
                                            <a href="/controllers/dashboard/articles/list-articles-ctrl.php?id=<?= $article->id_article ?>" class="text-decoration-none btn btn-sm btn-light">
                                                <i class="bi bi-archive text-dark fs-4"></i>
                                            </a>
                                            <a href="/controllers/dashboard/articles/delete-article-ctrl.php?id=<?= $article->id_article ?>" class="formDelete btn btn-sm btn-light">
                                                <i class="bi bi-trash3-fill fs-4 text-danger"></i>
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