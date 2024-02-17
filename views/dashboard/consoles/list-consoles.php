<!-- Main -->
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-10 mx-auto mt-5">
            <div class="row">
                <div class="col-12">
                    <h1 class="fw-bold text-uppercase">liste des consoles</h1>
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
                        <a href="/controllers/dashboard/consoles/add-console-ctrl.php" class="btn btn-danger rounded-4 text-uppercase fw-bold mx-2">Ajouter une console</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive shadow-lg bg-white rounded-4 text-center">
                        <table class="table table-borderless table-hover table-responsive align-middle">
                            <thead>
                                <tr>
                                    <th scope="col">Console</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (isset($consoles)) {
                                    foreach ($consoles as $console) { ?>
                                        <tr>
                                            <td class="fw-semibold text-break"><?=$console->console_name?></td>
                                            <td class="fw-semibold">
                                                <?php if (isset($console->console_picture)) { ?>
                                                    <div class="ratio ratio-1x1">
                                                        <img src="/public/uploads/consoles/<?= $console->console_picture ?>" alt="<?= $console->console_picture ?>" class="object-fit-cover rounded-circle ">
                                                    </div>
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <a href="/controllers/dashboard/consoles/update-console-ctrl.php?id_console=<?=$console->id_console?>" class="text-decoration-none btn btn-sm btn-light">
                                                    <i class="bi bi-pencil-square text-dark fs-4"></i>
                                                </a>
                                                <a href="/controllers/dashboard/consoles/delete-console-ctrl.php?id_console=<?=$console->id_console?>" class="text-decoration-none btn btn-sm btn-light">
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