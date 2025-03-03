<main>
    <section class="profilSection py-5 bg-light ">
        <div class="container">
            <div class="row ">
                <div class="col-12">
                    <div class="row">
                        <div class="col-12">
                            <div class="card border-0">
                                <div class="card-body cardProfilBanner rounded-4">
                                    <div class="card child-card border-0 rounded-4" style="background-image: url(/public/uploads/users/<?= !empty($user->user_picture) ? $user->user_picture : 'profilpicdefault.avif' ?>)">
                                        <div class="card-body ">
                                            <p class="card-text profilName text-light w-100 fs-4 fw-bold bg-danger text-center py-3 text-uppercase rounded-5"><?= $user->pseudo ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h1 class="fw-bold text-uppercase py-3">Mon Profil</h1>
                    <div class="row justify-content-between">
                        <div class="col-md-7 col-12 shadow-lg p-4 rounded-4 ">
                            <div class="pb-2 d-flex justify-content-center">
                                <h2 class="fw-bold fs-3">Mes informations </h2>
                            </div>
                            <p>Rôle :
                                <?php if ($user->role === 1) { ?>
                                    <span class="fw-semibold text-danger text-capitalize">Admin</span>
                                <?php  } elseif ($user->role === 2) { ?>
                                    <span class="fw-semibold text-primary text-capitalize">Membre</span>
                                <?php } else { ?>
                                    <span class="fw-semibold text-warning text-capitalize">Membre Rédacteur</span>
                                <?php } ?>
                            </p>
                            <p>Prénom : <span class="fw-semibold text-capitalize"><?= $user->firstname ?></span></p>
                            <p>Nom : <span class="fw-semibold text-capitalize"><?= $user->lastname ?></span></p>
                            <p>Pseudo : <span class="fw-semibold text-capitalize"><?= $user->pseudo ?></span></p>
                            <p>Adresse mail : <span class="fw-semibold"><?= $user->email ?></span></p>
                            <p>Date de création du compte : <span class="fw-semibold">le <?= $user->formattedDate ?> a <?= $user->formattedHour ?></span></p>
                            <div class="py-3">
                                <a href="/controllers/account/update-account-ctrl.php?id_user=<?= $id_user ?>" class="btn btn-danger py-3 rounded-5 fw-bold text-uppercase">Modifier mes informations</a>
                            </div>
                        </div>
                        <div class="col-md-4 col-12 shadow-lg rounded-4 py-3">
                            <div class="d-flex justify-content-center py-3">
                                <?php if ($user->role !== 3 && $user->role !== 1) { ?>
                                    <a href="/controllers/contact-ctrl/contact-ctrl.php" class="btn btn-warning py-3 rounded-5 fw-bold text-uppercase w-100">Devenir Rédacteur</a>
                                <?php } else { ?>
                                    <a href="/controllers/account/user-article-ctrl.php?id_user=<?= $user->id_user ?>" class="btn btn-primary py-3 rounded-5 fw-bold text-uppercase w-100">Rédiger un article</a>
                                <?php   } ?>
                            </div>
                            <div class="d-flex justify-content-center ">
                                <a href="/controllers/account/comments-account-ctrl.php?id_user=<?= $user->id_user ?>" class="btn btn-dark py-3 rounded-5 fw-bold text-uppercase w-100">Voir mes commentaires</a>
                            </div>
                            <div class="d-flex justify-content-center mt-3">
                                <a href="/controllers/account/favorites-ctrl.php?id_user=<?= $user->id_user ?>" class="btn btn-warning py-3 rounded-5 fw-bold text-uppercase w-100">Voir mes Favoris</a>
                            </div>
                            <div class="d-flex justify-content-center py-3">
                                <a href="/controllers/account/delete-account-ctrl.php?id_user=<?= $user->id_user ?>" class="btn btn-danger py-3 rounded-5 fw-bold text-uppercase w-100">Supprimer mon compte</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>