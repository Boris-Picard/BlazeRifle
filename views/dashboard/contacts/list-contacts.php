<!-- Main -->
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-10 mx-auto mt-5">
            <div class="row">
                <div class="col-12">
                    <h1 class="fw-bold text-uppercase">liste des catégories</h1>
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
                        <a href="/controllers/dashboard/category/add-category-ctrl.php" class="btn btn-danger rounded-4 text-uppercase fw-bold mx-2">Ajouter une catégorie</a>
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
                                        Category
                                    </th>
                                    <th scope="col">Articles</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (isset($categories)) {
                                    foreach ($categories as $category) { ?>
                                        <tr>
                                            <td class="fw-semibold"><?= htmlspecialchars($category->label) ?></td>
                                            <td class="fw-semibold text-break"><?= $category->article_count ?></td>
                                            <td>
                                                <a href="/controllers/dashboard/category/update-category-ctrl.php?id_category=<?= $category->id_category ?>" class="text-decoration-none btn btn-sm btn-light">
                                                    <i class="bi bi-pencil-square text-dark fs-4"></i>
                                                </a>
                                                <a href="/controllers/dashboard/category/delete-category-ctrl.php?id_category=<?= $category->id_category ?>" class="text-decoration-none btn btn-sm btn-light">
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