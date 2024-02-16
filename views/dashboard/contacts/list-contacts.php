<!-- Main -->
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-10 mx-auto mt-5">
            <div class="row">
                <div class="col-12">
                    <h1 class="fw-bold text-uppercase">liste des messages</h1>
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
                                        Prénom
                                    </th>
                                    <th scope="col">Nom</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Message</th>
                                    <th scope="col">Création</th>
                                    <th scope="col">Répondre</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (isset($messages)) {
                                    foreach ($messages as $message) { ?>
                                        <tr>
                                            <td class="fw-semibold"><?= htmlspecialchars($message->firstname) ?></td>
                                            <td class="fw-semibold text-break"><?= htmlspecialchars($message->lastname) ?></td>
                                            <td class="fw-semibold text-break"><?= htmlspecialchars($message->email) ?></td>
                                            <td class="fw-semibold text-break"><?= htmlspecialchars($message->description) ?></td>
                                            <td class="fw-semibold text-break"><?= htmlspecialchars($message->created_at) ?></td>
                                            <!-- <td class="fw-semibold text-break"><?= htmlspecialchars($message->label) ?></td> -->
                                            <td>
                                                <a href="/controllers/dashboard/category/update-category-ctrl.php?id_contact=<?= $message->id_contact ?>" class="text-decoration-none btn btn-sm btn-light">
                                                    <i class="bi bi-pencil-square text-dark fs-4"></i>
                                                </a>
                                                <a href="/controllers/dashboard/contacts/delete-contact-ctrl.php?id_contact=<?= $message->id_contact ?>" class="text-decoration-none btn btn-sm btn-light">
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