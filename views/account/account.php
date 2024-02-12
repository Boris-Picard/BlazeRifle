<main>
    <section class="profilSection py-5 bg-light vh-100">
        <div class="container">
            <div class="row ">
                <div class="col-12">
                    <div class="card border-0">
                        <div class="card-body cardProfilBanner rounded-4">
                            <div class="card child-card border-0 rounded-4" style="background-image: url(/public/uploads/users/<?= $_SESSION['user']->user_picture ?>)">
                                <div class="card-body ">
                                    <p class="card-text profilName text-light w-100 fs-4 fw-bold bg-danger text-center py-3 text-uppercase rounded-5"><?= $_SESSION['user']->pseudo ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <h1 class="fw-bold text-uppercase py-3">Mon Profil</h1>
                <div class="col-md-8 shadow-lg p-4 rounded-4 ">
                    <div class="pb-2 d-flex justify-content-center">
                        <h3 class="fw-bold">Mes informations </h3>
                    </div>
                    <p>Prénom : <span class="fw-semibold text-capitalize"><?= $_SESSION['user']->firstname ?></span></p>
                    <p>Nom : <span class="fw-semibold text-capitalize"><?= $_SESSION['user']->lastname ?></span></p>
                    <p>Pseudo : <span class="fw-semibold text-capitalize"><?= $_SESSION['user']->pseudo ?></span></p>
                    <p>Adresse mail : <span class="fw-semibold"><?= $_SESSION['user']->email ?></span></p>
                    <p>Date de création du compte : <span class="fw-semibold"><?= $_SESSION['user']->created_at ?></span></p>
                    <div class="py-3">
                        <a href="/controllers/account/update-account-ctrl.php" class="btn btn-danger py-3 rounded-5 fw-bold text-uppercase">Modifier mes informations</a>
                    </div>
                </div>
                <div class="col-md-4 mx-5 shadow-lg rounded-4 rightCardProfil py-3">
                    <div class="d-flex justify-content-center py-3">
                        <a href="/controllers/account/user-article-ctrl.php" class="btn btn-warning py-3 rounded-5 fw-bold text-uppercase w-100">Rédiger un article</a>
                    </div>
                    <div class="d-flex justify-content-center ">
                        <a href="" class="btn btn-secondary py-3 rounded-5 fw-bold text-uppercase w-100">Voir mes favoris</a>
                    </div>
                </div>
            </div>
        </div>
    </section>