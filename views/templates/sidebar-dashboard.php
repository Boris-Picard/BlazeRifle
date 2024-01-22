<section class="myAccount d-flex flex-nowrap">
    <!-- SIDEBAR -->
    <div class="container sidebar position-relative rounded-4 mt-5">
        <div class="row">
            <div class="col-12 p-0 rounded-4 shadow-lg bg-white">
                <div class="row m-0 p-0">
                    <a class="navbar-brand nameLogoAccount" href="/controllers/home-ctrl.php"><img src="/public/assets/img/redlogo.png" class="brandLogoAccount" alt="logo"> blaze rifle</a>
                    <div class="col-12 d-flex flex-column p-0 sidebar rounded colSidebar g-5">
                        <a href="/controllers/dashboard/dashboard-ctrl.php" class="py-3 nav-link navLink <?= isset($dashboard) ? 'active' : '' ?> text-capitalize sidebarLink"><span><i class="bi bi-house px-3 fw-bold"></i>Dashboard</span></a>
                        <a href="" class="py-3 nav-link navLink text-capitalize sidebarLink"><span><i class="bi bi-house px-3 fw-bold"></i>Les Comptes</span></a>
                        <a href="" class="py-3 nav-link navLink text-capitalize sidebarLink"><span><i class="bi bi-house px-3 fw-bold"></i>Les Commentaires</span></a>
                        <a href="/controllers/dashboard/articles/list-articles-ctrl.php" class="<?= isset($listArticles) ? 'active' : '' ?> py-3 nav-link navLink text-capitalize sidebarLink"><span><i class="bi bi-house px-3 fw-bold"></i>Les Articles</span></a>
                        <a href="" class="py-3 nav-link navLink text-capitalize sidebarLink"><span><i class="bi bi-house px-3 fw-bold"></i>Les Jeux</span></a>
                        <a href="" class="py-3 nav-link navLink text-capitalize sidebarLink"><span><i class="bi bi-house px-3 fw-bold"></i>Les Consoles</span></a>
                        <a href="" class="py-3 nav-link navLink text-capitalize sidebarLink"><span><i class="bi bi-house px-3 fw-bold"></i>Les Guides</span></a>
                        <a href="" class="py-3 nav-link navLink text-capitalize sidebarLink"><span><i class="bi bi-house px-3 fw-bold"></i>Les Bons plans</span></a>
                        <a href="/controllers/dashboard/events/list-events-ctrl.php" class="py-3 <?= isset($listEvents) ? 'active' : '' ?> nav-link navLink text-capitalize sidebarLink"><span><i class="bi bi-house px-3 fw-bold"></i>Calendrier des events</span></a>
                        <a href="" class="py-3 nav-link navLink text-capitalize sidebarLink"><span><i class="bi bi-house px-3 fw-bold"></i>Le Quiz</span></a>
                        <a href="" class="py-3 nav-link navLink text-capitalize sidebarLink"><span><i class="bi bi-house px-3 fw-bold"></i>Nous contacter</span></a>
                        <a href="" class="mb-3 py-3 navLink position-absolute sidebarLink w-100 bottom-0 nav-link"><span><i class="bi bi-box-arrow-right px-3"></i>Logout</span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>