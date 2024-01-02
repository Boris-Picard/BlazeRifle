<header>
    <nav class="navbar navbarStyle navbar-expand-md fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand nameLogoNav" href="/../controllers/home-ctrl.php"><img src="../../public/assets/img/redlogo.png" class="img-fluid logoNav" alt="logoBrand">blaze rifle</a>
            <div class="flex-shrink-0 d-flex dropdown order-md-3">
                <a href="#" class="d-block link-body-emphasis text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle">
                </a>
                <button class="navbar-toggler border-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <ul class="dropdown-menu dropdown-menu-end shadow-lg dropdownAccount">
                    <li><a class="dropdown-item d-flex" href="/controllers/login-ctrl/sign-up-ctrl.php">Mon compte</a></li>
                    <li><a class="dropdown-item" href="/controllers/account/my-account-ctrl.php">Settings</a></li>
                    <li><a class="dropdown-item" href="#">Profile</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="#">Sign out</a></li>
                </ul>
            </div>
            <div class="collapse navbar-collapse justify-content-center gap-5 fw-bold order-md-2 offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
                <div class="offcanvas-header align-self-end">
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="navbar-nav text-center offcanvas-body">
                    <a class="nav-link navlinkHover" href="/controllers/home-ctrl.php">Accueil</a>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-uppercase text-dark" href="" role="button" data-bs-toggle="dropdown">
                            Les jeux
                        </a>
                        <ul class="dropdown-menu shadow-lg dropdownMenu py-0 rounded-4">
                            <div class="d-flex flex-column">
                                <li><a href="" class="dropdown-item navGamesHover text-decoration-none text-capitalize px-2 text-truncate p-2"><span><img src="/public/assets/img/gta-6-news-visu.jpg" class="rounded-circle object-fit-cover roundedImgNav mx-2" alt="GTA 6">Grand Theft Auto VI</span></a></li>
                                <li><a href="" class="dropdown-item navGamesHover text-decoration-none text-capitalize px-2 text-truncate p-2"><span><img src="/public/assets/img/MWIII-REVEAL-FULL-TOUT.jpg" class="rounded-circle object-fit-cover roundedImgNav mx-2" alt="GTA 6">call of duty : mw 3</span></a></li>
                                <li><a href="" class="dropdown-item navGamesHover text-decoration-none text-capitalize px-2 text-truncate p-2"><span><img src="/public/assets/img/1329760.jpeg" class="rounded-circle object-fit-cover roundedImgNav mx-2" alt="GTA 6">Counter strike 2</span></a></li>
                                <li><a href="" class="dropdown-item navGamesHover text-decoration-none text-capitalize px-2 text-truncate p-2"><span><img src="/public/assets/img/apex.jpg" class="rounded-circle object-fit-cover roundedImgNav mx-2" alt="GTA 6">apex legends</span></a></li>
                                <li><a href="" class="dropdown-item navGamesHover text-decoration-none text-capitalize px-2 text-truncate p-2"><span><img src="/public/assets/img/MWII-SEASON-01-ROADMAP-004.jpg" class="rounded-circle object-fit-cover roundedImgNav mx-2" alt="GTA 6">call of duty : warzone 2</span></a></li>
                                <li><a href="" class="dropdown-item navGamesHover text-decoration-none text-capitalize px-2 text-truncate p-2"><span><img src="/public/assets/img/valorant.jpg" class="rounded-circle object-fit-cover roundedImgNav mx-2" alt="GTA 6">Valorant</span></a></li>
                                <li><a href="" class="dropdown-item navGamesHover text-decoration-none text-capitalize px-2 text-truncate p-2"><span><img src="/public/assets/img/infinite2.jpg" class="rounded-circle object-fit-cover roundedImgNav mx-2" alt="GTA 6">Halo infinite</span></a></li>
                                <li><a href="" class="dropdown-item navGamesHover text-decoration-none text-capitalize px-2 text-truncate p-2"><span><img src="/public/assets/img/overwatch-2-key-art-4k-ah-2048x1152-1.jpg.webp" class="rounded-circle object-fit-cover roundedImgNav mx-2" alt="GTA 6">overwatch 2</span></a></li>
                                <li><a href="" class="dropdown-item navGamesHover text-decoration-none text-capitalize px-2 text-truncate p-2"><span><img src="/public/assets/img/battlefield2042.jpg" class="rounded-circle object-fit-cover roundedImgNav mx-2" alt="GTA 6">battlefield 2042</span></a></li>
                                <li><a href="" class="dropdown-item navGamesHover text-decoration-none text-capitalize px-2 text-truncate p-2"><span><img src="/public/assets/img/borderlands-4-pc-jeu-cover.jpg" class="rounded-circle object-fit-cover roundedImgNav mx-2" alt="GTA 6">borderlands 4</span></a></li>
                            </div>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link dropdown-toggle text-uppercase text-dark" href="" role="button" data-bs-toggle="dropdown">
                            Les Consoles
                        </a>
                        <ul class="dropdown-menu shadow-lg dropdownMenu py-0 rounded-4">
                            <div class="d-flex flex-column">
                                <li><a href="" class="dropdown-item navGamesHover text-decoration-none text-uppercase px-2 text-truncate p-2"><span><i class="bi bi-windows mx-2 fs-5"></i>PC</span></a></li>
                                <li><a href="" class="dropdown-item navGamesHover text-decoration-none text-uppercase px-2 text-truncate p-2"><span><i class="bi bi-playstation mx-2 fs-5"></i>Playstation</span></a></li>
                                <li><a href="" class="dropdown-item navGamesHover text-decoration-none text-uppercase px-2 text-truncate p-2"><span><i class="bi bi-xbox mx-2 fs-5"></i>Xbox</span></a></li>
                            </div>
                        </ul>
                    </li>
                    <a class="nav-link navlinkHover" href="#">Les Guides</a>
                    <a class="nav-link navlinkHover" href="/controllers/quiz/quiz-ctrl.php">Le Quiz</a>
                    <a class="nav-link navlinkHover" href="#">Les Bons Plans</a>
                    <a class="nav-link navlinkHover" href="/controllers/calendar/calendar-ctrl.php">Calendrier des Events</a>
                    <a class="nav-link navlinkHover" href="#">Les Produits</a>
                    <a class="nav-link navlinkHover" href="/controllers/contact-ctrl/contact-ctrl.php">Nous Contacter</a>
                </div>
            </div>
        </div>
    </nav>
</header>