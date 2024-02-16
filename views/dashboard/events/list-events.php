<!-- Main -->
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-10 mx-auto mt-5">
            <div class="row">
                <div class="col-12">
                    <h1 class="fw-bold text-uppercase">liste des événements</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <?= $msg ?>
                </div>
            </div>
            <div class="row g-2">
                <div class="col-12 pt-3">
                    <div class="d-flex mb-3 justify-content-between">
                        <a href="/controllers/dashboard/events/add-event-ctrl.php" class="btn btn-danger rounded-4 text-uppercase fw-bold mx-2">Ajouter un événement</a>
                        <form action="" class="d-flex">
                            <select class="form-select fw-bold border-dark" name="nbEvents" id="nbEvents">
                                <option selected disabled>Nb évents'</option>
                                <option value="">Voir tous les événements</option>
                                <?php for ($i = 5; $i <= 100; $i += 5) {  ?>
                                    <option value="<?= $i ?>" <?= (isset($nbEvents) && $nbEvents == $i ? 'selected' : '') ?>><?= $i ?></option>
                                <?php } ?>
                            </select>
                            <button class="btn btn-danger rounded-4 fw-bold mx-2">Valider</button>
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
                                    <th scope="col">Titre</th>
                                    <th scope="col">Lien</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">
                                        Date
                                        <a href="/controllers/dashboard/events/list-events-ctrl.php?order=ASC&nbEvents=<?= $nbEvents ?>" class="btn btn-sm btn-light"><i class="bi bi-caret-up-fill mx-1 text-dark"></i></a>
                                        <a href="/controllers/dashboard/events/list-events-ctrl.php?order=DESC&nbEvents=<?= $nbEvents ?>" class="btn btn-sm btn-light"><i class="bi bi-caret-down-fill text-dark"></i></a>
                                    </th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($events as $event) { ?>
                                    <tr>
                                        <td class="fw-semibold"><?= $event->game_name ?></td>
                                        <td class="fw-semibold text-break"><?= $event->event_title ?></td>
                                        <td class="fw-semibold text-break"><?= $event->event_link ?></td>
                                        <td class="fw-semibold">
                                            <?php if (isset($event->event_picture)) { ?>
                                                <div class="ratio ratio-1x1">
                                                    <img src="/public/uploads/events/<?= $event->event_picture ?>" alt="<?= $event->event_picture ?>" class="object-fit-cover rounded-circle imgVehicles">
                                                </div>
                                            <?php } ?>
                                        </td>
                                        <td class="fw-semibold"><?= $event->event_date ?></td>
                                        <td>
                                            <a href="/controllers/dashboard/events/update-event-ctrl.php?id_event=<?= $event->id_event ?>" class="text-decoration-none btn btn-sm btn-light">
                                                <i class="bi bi-pencil-square text-dark fs-4"></i>
                                            </a>
                                            <a href="/controllers/dashboard/events/delete-event-ctrl.php?id_event=<?= $event->id_event ?>" class="text-decoration-none btn btn-sm btn-light">
                                                <i class="bi bi-trash3-fill text-danger fs-4"></i>
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