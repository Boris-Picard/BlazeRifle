<section class="myAccount bg-light">
    <main class="d-flex flex-nowrap">
        <!-- SIDEBAR -->
        <div class="container sidebar position-relative rounded-3 py-5 mt-4">
            <div class="row">
                <div class="col-12 p-0 rounded-3 shadow bg-white">
                    <div class="row m-0 p-0">
                        <a class="navbar-brand nameLogoAccount" href="/controllers/home-ctrl.php"><img src="/public/assets/img/logo512.png" class="brandLogoAccount" alt="logo"> blaze rifle</a>
                        <div class="col-12 d-flex flex-column p-0 sidebar rounded colSidebar g-5">
                            <a href="" class="py-3 nav-link active sidebarLink"><span><i class="bi bi-house px-3"></i> Dashboard</span></a>
                            <a href="" class="py-3 nav-link sidebarLink"><span><i class="bi bi-bar-chart px-3"></i> Analitycs</span></a>
                            <a href="" class="py-3 nav-link sidebarLink"><span><i class="bi bi-chat px-3"></i> Messages</span><span class="badge bg-primary rounded-pill mx-4 justify-content-end">6</span></a>
                            <a href="" class="py-3 nav-link sidebarLink"><span><i class="bi bi-bookmarks px-3"></i> Collections</span></a>
                            <a href="" class="py-3 nav-link sidebarLink"><span><i class="bi bi-people px-3"></i> Users</span></a>
                            <a href="" class="mb-3 py-3 position-absolute sidebarLink w-100 bottom-0 nav-link"><span><i class="bi bi-box-arrow-right px-3"></i>Logout</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Main -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-7 mx-auto py-4">
                    <!-- Profile picture -->
                    <div class="card shadow border-0 mt-5 profilCard rounded-3">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <div class="d-flex align-items-center">
                                        <a href="#">
                                            <img alt="Image de profil" class="rounded-circle accountProfilPicture" src="https://images.unsplash.com/photo-1579463148228-138296ac3b98?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=3&w=256&h=256&q=80">
                                        </a>
                                        <div class="ms-4">
                                            <span class="h4 d-block mb-0">Julianne Moore</span>
                                            <a href="#" class="text-sm font-semibold text-muted">Voir le profil</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="ms-auto">
                                    <button type="submit" class="btn btn-light shadow-sm rounded-5 p-3 text-uppercase fw-semibold">
                                        Upload
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Form -->
                    <div class="mb-5 mt-5">
                        <h5 class="mb-0 mt-3 h2">Mes informations</h5>
                    </div>
                    <form class="mb-6">
                        <div class="row">
                            <!-- FIRSTNAME -->
                            <div class="mb-4 col-md-6 col-12">
                                <label for="firstname" class="form-label fw-semibold">Prénom</label>
                                <input type="text" class="form-control" id="firstname" placeholder="Votre prénom">
                            </div>
                            <!-- LASTNAME -->
                            <div class="mb-4 col-md-6 col-12">
                                <label for="lastname" class="form-label fw-semibold">Nom</label>
                                <input type="text" class="form-control" id="lastname" placeholder="Votre nom">
                            </div>
                        </div>
                        <div class="row">
                            <!-- PSEUDO -->
                            <div class="mb-4 col-md-12 col-12">
                                <label for="pseudo" class="form-label fw-semibold">Pseudo</label>
                                <input type="text" class="form-control" id="pseudo" placeholder="Votre Pseudo">
                            </div>
                            <!-- EMAIL -->
                            <div class="mb-4 col-md-12 col-12">
                                <label for="email" class="form-label fw-semibold">Email</label>
                                <input type="email" class="form-control" id="email" placeholder="Votre email">
                            </div>
                            <!-- ADRESSE -->
                            <div class="mb-4 col-md-12 col-12">
                                <label for="address" class="form-label fw-semibold">Adresse</label>
                                <input type="text" class="form-control" id="address" placeholder="Votre adresse">
                            </div>
                            <!-- CITY -->
                            <div class="mb-4 col-md-6 col-12">
                                <label for="city" class="form-label fw-semibold">Ville</label>
                                <input type="text" class="form-control" id="city" placeholder="Votre ville">
                            </div>
                            <!-- ZIP -->
                            <div class="mb-4 col-md-6 col-12">
                                <label for="zip" class="form-label fw-semibold">Code Postal</label>
                                <input type="number" class="form-control" id="zip" placeholder="Votre code postal">
                            </div>
                            <!-- CHECKBOX -->
                            <div class="mb-4">
                                <div class="form-check">
                                    <input class="form-check-input" id="checkboxForm" name="checkboxForm" type="checkbox" value="checkbox" <?= (isset($checkbox)) ? 'checked' : '' ?> required>
                                    <label class="form-check-label" for="checkboxForm">
                                        Cocher pour en faire mon adresse par défaut.
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex flex-row-reverse">
                            <button type="submit" class="btn btn-primary rounded-5 p-3 text-uppercase fw-bold">
                                Accepter
                            </button>
                            <button type="submit" class="btn btn-danger rounded-5 p-3 mx-3 text-uppercase fw-bold">
                                Annuler
                            </button>
                        </div>
                    </form>
                    <hr class="my-10" />
                    <!-- Individual switch cards -->
                    <div class="row g-6">
                        <div class="col-md-6 py-3">
                            <div class="card shadow border-0 rounded-3">
                                <div class="card-body">
                                    <h5 class="mb-2 fw-semibold">Rendre public mon profil</h5>
                                    <p class="text-sm text-muted mb-6">
                                        Rendre votre profil public signifie que n'importe qui sur le réseau pourra vous trouver.
                                    </p>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" checked>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 py-3">
                            <div class="card shadow border-0 rounded-3">
                                <div class="card-body">
                                    <h5 class="mb-2 fw-semibold">Afficher mon adresse mail</h5>
                                    <p class="text-sm text-muted mb-6">
                                        Afficher vos adresses e-mail signifie que n'importe qui sur le réseau pourra vous trouver.
                                    </p>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 py-3 mb-2">
                            <div class="card shadow border-0 rounded-3">
                                <div class="card-body d-flex align-items-center">
                                    <div>
                                        <h5 class="text-danger mb-2 fw-semibold">Désactiver votre compte</h5>
                                        <p class="text-sm text-muted">
                                            Une fois votre compte supprimé, vous ne pourrez plus revenir en arrière. Soyez-en sûr, s'il vous plaît.
                                        </p>
                                    </div>
                                    <div class="ms-auto">
                                        <button type="submit" class="btn btn-danger rounded-5 p-3 text-uppercase fw-bold">
                                            Désactiver
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</section>