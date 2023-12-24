<section class="myAccount">
    <main class="d-flex flex-nowrap h-100">
        <nav class="d-flex flex-column align-items-center px-0 py-3 px-3 py-lg-0 bg-light sidebar">
            <button class="navbar-toggler ms-n2" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarCollapse" aria-controls="sidebarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Brand -->
            <a class="navbar-brand nameLogoAccount" href="/../controllers/home-ctrl.php"><img src="../../public/assets/img/logo512.png" class="img-fluid brandLogoAccount" alt="logoBrand">blaze rifle</a> 
            <!-- Sidebar -->
            <ul class="navbar-nav py-5">
                <li class="nav-item py-2">
                    <a class="nav-link" href="#">
                        <i class="bi bi-house"></i> Dashboard
                    </a>
                </li>
                <li class="nav-item py-2">
                    <a class="nav-link" href="#">
                        <i class="bi bi-bar-chart"></i> Analitycs
                    </a>
                </li>
                <li class="nav-item py-2">
                    <a class="nav-link" href="#">
                        <i class="bi bi-chat"></i> Messages
                        <span class="badge bg-opacity-30 bg-primary text-primary rounded-pill d-inline-flex align-items-center ms-auto">6</span>
                    </a>
                </li>
                <li class="nav-item py-2">
                    <a class="nav-link" href="#">
                        <i class="bi bi-bookmarks"></i> Collections
                    </a>
                </li>
                <li class="nav-item py-2">
                    <a class="nav-link" href="#">
                        <i class="bi bi-people"></i> Users
                    </a>
                </li>
            </ul>
        </nav>
        <div class="h-screen flex-grow-1 overflow-y-lg-auto">
            <!-- Main -->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-7 mx-auto">
                        <!-- Profile picture -->
                        <div class="card shadow border-0 mt-4 profilCard">
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
                                        <button type="button" class="btn btn-sm btn-light p-2 rounded-5 ">Upload</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Form -->
                        <div class="mb-5">
                            <h5 class="mb-0 mt-3">Contact Information</h5>
                        </div>
                        <form class="mb-6">
                            <div class="row mb-5">
                                <div class="col-md-6 form-floating">
                                    <input type="text" class="form-control rounded-0" id="firstname" placeholder="Votre prénom">
                                    <label for="firstname">Prénom</label>
                                </div>
                                <div class="col-md-6 form-floating">
                                    <input type="text" class="form-control rounded-0" id="lastname" placeholder="Votre nom">
                                    <label for="lastname">Nom</label>
                                </div>
                            </div>
                            <div class="row gy-5">
                            <div class="col-md-12 form-floating">
                                    <input type="text" class="form-control rounded-0" id="pseudo" placeholder="Votre Pseudo">
                                    <label for="pseudo">Pseudo</label>
                                </div>
                                <div class="col-md-12 form-floating">
                                    <input type="email" class="form-control rounded-0" id="email" placeholder="Votre email">
                                    <label for="email">Email</label>
                                </div>
                                <div class="col-12 form-floating">
                                    <input type="text" class="form-control rounded-0" id="address" placeholder="Votre adresse">
                                    <label for="address">Addresse</label>
                                </div>
                                <div class="col-md-6 form-floating">
                                    <input type="text" class="form-control rounded-0" id="city" placeholder="Votre ville">
                                    <label for="city">Ville</label>
                                </div>
                                <div class="col-md-6 form-floating">
                                    <input type="number" class="form-control rounded-0" id="zip" placeholder="Votre code postal">
                                    <label for="zip">Code Postal</label>
                                </div>
                                <div class="col-12 form-floating">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="check_primary_address" id="check_primary_address">
                                        <label class="form-check-label" for="check_primary_address">
                                            Cocher pour en faire votre addresse par défaut
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="text-end">
                                <button type="button" class="btn btn-sm btn-light rounded-5 me-2 p-2 text-uppercase">Cancel</button>
                                <button type="submit" class="btn btn-sm btn-primary rounded-5 p-2 text-uppercase">Sauvegarder</button>
                            </div>
                        </form>
                        <hr class="my-10" />
                        <!-- Individual switch cards -->
                        <div class="row g-6">
                            <div class="col-md-6 py-3">
                                <div class="card shadow border-0">
                                    <div class="card-body">
                                        <h5 class="mb-2">Rendre public mon profil</h5>
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
                                <div class="card shadow border-0">
                                    <div class="card-body">
                                        <h5 class="mb-2">Afficher mon adresse mail</h5>
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
                                <div class="card shadow border-0">
                                    <div class="card-body d-flex align-items-center">
                                        <div>
                                            <h5 class="text-danger mb-2">Désactiver votre compte</h5>
                                            <p class="text-sm text-muted">
                                                Une fois votre compte supprimé, vous ne pourrez plus revenir en arrière. Soyez-en sûr, s'il vous plaît.
                                            </p>
                                        </div>
                                        <div class="ms-auto">
                                            <button type="button" class="btn btn-sm btn-danger p-2 rounded-5 text-uppercase">Désactiver</button>
                                        </div>
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