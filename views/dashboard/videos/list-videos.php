<!-- Main -->
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-10 mx-auto mt-5">
            <div class="row">
                <div class="col-12">
                    <h1 class="fw-bold text-uppercase">liste des vidéos</h1>
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
                        <a href="/controllers/dashboard/videos/add-video-ctrl.php" class="btn btn-danger rounded-4 text-uppercase fw-bold mx-2">Ajouter une vidéo</a>
                    </div>
                </div>
                <div class="col-6 pt-3">
                    <div class="d-flex mb-3 justify-content-end">
                        <form action="" class="d-flex">
                            <select class="form-select fw-bold border-dark" name="nbVideos" id="nbVideos">
                                <option selected disabled>Nb de vidéos</option>
                                <option value="">Voir toutes les vidéos</option>
                                <?php for ($i = 5; $i <= 100; $i += 5) {  ?>
                                    <option value="<?= $i ?>" <?= (isset($nbVideos) && $nbVideos == $i ? 'selected' : '') ?>><?= $i ?></option>
                                <?php } ?>
                            </select>
                            <button type="submit" class="btn btn-sm rounded-4 btn-danger mx-2 fw-bold text-uppercase">Valider</button>
                        </form>
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
                                    <th scope="col">
                                        Lien
                                    </th>
                                    <th scope="col">Jeu</th>
                                    <th scope="col">Creation
                                        <a href="/controllers/dashboard/videos/list-videos-ctrl.php?order=ASC&nbVideos=<?= $nbVideos ?>" class="btn btn-sm btn-light"><i class="bi bi-caret-up-fill mx-1 text-dark"></i></a>
                                        <a href="/controllers/dashboard/videos/list-videos-ctrl.php?order=DESC&nbVideos=<?= $nbVideos ?>" class="btn btn-sm btn-light"><i class="bi bi-caret-down-fill text-dark"></i></a>
                                    </th>
                                    <th scope="col">
                                        Statut
                                    </th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (isset($videos)) {
                                    foreach ($videos as $video) { ?>
                                        <tr>
                                            <td class="fw-semibold"><?= htmlspecialchars($video->title_video) ?></td>
                                            <td class="fw-semibold"><?= htmlspecialchars($video->game_video) ?></td>
                                            <td class="fw-semibold text-break"><?= $video->game_name ?></td>
                                            <td class="fw-semibold text-break"><?= $video->created_at ?></td>
                                            <td class="fw-semibold text-break">
                                                <?php if (!is_null($video->confirmed_at)) { ?>
                                                    <button class="btn btn-small btn-success ">Validé</button>
                                                <?php  } else { ?>
                                                    <a href="/controllers/dashboard/videos/list-videos-ctrl.php?id_video=<?= $video->id_video ?>" class="btn btn-secondary btn-sm">En attente</a>
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <a href="/controllers/dashboard/videos/update-video-ctrl.php?id_video=<?= $video->id_video ?>" class="text-decoration-none btn btn-sm btn-light">
                                                    <i class="bi bi-pencil-square text-dark fs-4"></i>
                                                </a>
                                                <a href="/controllers/dashboard/videos/delete-video-ctrl.php?id_video=<?= $video->id_video ?>" class="text-decoration-none btn btn-sm btn-light">
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