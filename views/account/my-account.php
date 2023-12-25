<section class="myAccount bg-light">
    <main class="d-flex flex-nowrap h-100">
        <nav class="navbar navbar-expand-lg navbar-light bg-light align-items-start">
            <div class="container-fluid flex-lg-column align-items-stretch sidebar p-0">
                <!-- Toggler for small screens -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!-- Brand Logo -->
                <a class="navbar-brand" href="#" class="nameLogoAccount"><img src="/public/assets/img/logo512.png" class="brandLogoAccount" alt="logo"> blaze rifle</a>
                <!-- Sidebar Menu -->
                <div class="collapse navbar-collapse align-items-start py-5" id="sidebarMenu">
                    <ul class="navbar-nav flex-column w-100 h-100">
                        <li class="nav-item mb-2">
                            <a class="nav-link active" aria-current="page" href="#">
                                <span><i class="bi bi-house p-2"></i> Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-item mb-2">
                            <a class="nav-link" href="#">
                                <span><i class="bi bi-bar-chart p-2"></i> Analitycs</span>
                            </a>
                        </li>
                        <li class="nav-item mb-2">
                            <a class="nav-link" href="#">
                                <span><i class="bi bi-chat p-2"></i> Messages</span>
                                <span class="badge bg-primary rounded-pill">6</span>
                            </a>
                        </li>
                        <li class="nav-item mb-2">
                            <a class="nav-link" href="#">
                                <span><i class="bi bi-bookmarks p-2"></i> Collections</span>
                            </a>
                        </li>
                        <li class="nav-item mb-2">
                            <a class="nav-link" href="#">
                                <span><i class="bi bi-people p-2"></i> Users</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="h-screen flex-grow-1 overflow-y-lg-auto">
            <!-- Main -->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-7 mx-auto py-5">
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
                                        <button type="submit" class="btn btn-secondary rounded-3 p-2">
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
                                    <label for="address" class="form-label fw-semibold">Addresse</label>
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
                                <button type="submit" class="btn btn-primary rounded-3 p-2">
                                    Accepter
                                </button>
                                <button type="submit" class="btn btn-danger rounded-3 p-2 mx-3">
                                    Annuler
                                </button>
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
                                            <button type="submit" class="btn btn-danger rounded-3 p-2">
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
        </div>
    </main>
</section>