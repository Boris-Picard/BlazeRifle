<?php
require_once __DIR__ . '/../../models/Game.php';
require_once __DIR__ . '/../../models/Console.php';

try {
    $games = Game::getAll();
    $consoles = Console::getAll();
} catch (\Throwable $e) {
    $e->getMessage();
}
?>
<header>
    <nav class="navbar navbarStyle navbar-expand-md fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand nameLogoNav" href="/../controllers/home-ctrl.php"><img src="/../../public/assets/img/redlogo.png" class="img-fluid logoNav" alt="logoBrand">blaze rifle</a>
            <div class="flex-shrink-0 d-flex dropdown order-md-3">
                <a href="#" class="d-block link-body-emphasis text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle">
                </a>
                <button class="navbar-toggler border-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <ul class="dropdown-menu dropdown-menu-end shadow-lg">
                    <li><a class="dropdown-item d-flex" href="/controllers/login-ctrl/sign-up-ctrl.php">Mon compte</a></li>
                    <li><a class="dropdown-item" href="/controllers/dashboard/dashboard-ctrl.php">Settings</a></li>
                    <li><a class="dropdown-item" href="/controllers/account/account-ctrl.php">Profile</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="#">Sign out</a></li>
                </ul>
            </div>
            <div class="collapse navbar-collapse justify-content-center gap-5 fw-bold order-md-2 offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRight">
                <div class="offcanvas-header align-self-end">
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="navbar-nav text-center offcanvas-body">
                    <a class="nav-link navlinkHover" href="/controllers/home-ctrl.php">Accueil</a>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-uppercase text-dark" href="/controllers/games-preview/games-ctrl.php" role="button">
                            Les jeux
                        </a>
                        <ul class="dropdown-menu shadow-lg dropdownMenu py-0 rounded-4">
                            <?php foreach ($games as $game) { ?>
                                <li><a href="/controllers/games-preview/games-ctrl.php?id_game=<?= $game->id_game ?>" class="dropdown-item navGamesHover text-decoration-none text-capitalize px-2 text-truncate p-2"><span><img src="/public/uploads/games/<?= $game->game_picture ?>" class="rounded-circle object-fit-cover roundedImgNav mx-2" alt="<?= $game->game_name ?>"><?= htmlspecialchars($game->game_name) ?></span></a></li>
                            <?php } ?>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link dropdown-toggle text-uppercase text-dark" href="" role="button">
                            Les Consoles
                        </a>
                        <ul class="dropdown-menu shadow-lg dropdownMenu py-0 rounded-4">
                            <?php foreach ($consoles as $console) { ?>
                                <li><a href="/controllers/games-preview/games-ctrl.php?id_console=<?= $console->id_console ?>" class="dropdown-item navGamesHover text-decoration-none text-uppercase px-2 text-truncate p-2"><span><img src="/public/uploads/consoles/<?= $console->console_picture ?>" class="rounded-circle object-fit-cover roundedImgNav mx-2" alt="<?= $console->console_name ?>"></img><?= htmlspecialchars($console->console_name) ?></span></a></li>
                            <?php } ?>
                        </ul>
                    </li>
                    <a class="nav-link navlinkHover" href="/controllers/guides-preview/guides-ctrl.php">Les Guides</a>
                    <a class="nav-link navlinkHover" href="/controllers/quiz/quiz-ctrl.php">Le Quiz</a>
                    <a class="nav-link navlinkHover text-dark" href="/controllers/tips-list/tips-ctrl.php">Les Bons Plans</a>
                    <a class="nav-link navlinkHover text-dark" href="/controllers/calendar/calendar-ctrl.php">Calendrier des Events</a>
                    <a class="nav-link navlinkHover text-dark" href="/controllers/contact-ctrl/contact-ctrl.php">Nous Contacter</a>
                </div>
            </div>
        </div>
    </nav>
</header>