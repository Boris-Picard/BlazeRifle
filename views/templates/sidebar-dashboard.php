<?php
require_once __DIR__ . '/../../models/Article.php';
require_once __DIR__ . '/../../models/User.php';
require_once __DIR__ . '/../../models/Comment.php';

$articlesConfirmed = Article::getConfirmed();
$commentsConfirmed = Comment::getConfirmed();
$AccountConfirmed = User::getConfirmed();
?>
<section class="myAccount d-flex flex-nowrap">
    <!-- SIDEBAR -->
    <div class="container sidebar position-relative rounded-4 mt-5">
        <div class="row">
            <div class="col-12 p-0 rounded-4 shadow-lg bg-white">
                <div class="row m-0 p-0">
                    <a class="navbar-brand nameLogoAccount" href="/controllers/home-ctrl.php"><img src="/public/assets/img/redlogo.png" class="brandLogoAccount" alt="logo"> blaze rifle</a>
                    <div class="col-12 d-flex flex-column p-0 sidebar rounded colSidebar g-5">
                        <a href="/controllers/dashboard/dashboard-ctrl.php" class="py-3 nav-link navLink <?= $dashboard ? 'active' : '' ?> text-capitalize sidebarLink"><span><i class="bi bi-house px-3 fw-bold"></i>Dashboard</span></a>
                        <a href="/controllers/dashboard/users/users-list-ctrl.php" class="<?= $listUsers ? 'active' : '' ?> py-3 nav-link navLink text-capitalize sidebarLink"><span><i class=" bi bi-person-circle px-3 fw-bold"></i>Les Comptes</span>
                            <?php if ($AccountConfirmed > 0) { ?>
                                <span class="badge badge-light bg-danger mx-2 rounded-circle"><?= $AccountConfirmed ?></span>
                            <?php } ?></a>
                        <a href="/controllers/dashboard/comments/list-comments-ctrl.php" class=" <?= $listComments ? 'active' : '' ?> py-3 nav-link navLink text-capitalize sidebarLink"><span><i class="bi bi-chat px-3 fw-bold"></i>Les Commentaires</span>
                            <?php if ($commentsConfirmed > 0) { ?>
                                <span class="badge badge-light bg-danger mx-2 rounded-circle"><?= $commentsConfirmed ?></span>
                            <?php } ?>
                        </a>
                        <a href="/controllers/dashboard/articles/list-articles-ctrl.php" class=" <?= $listArticles ? 'active' : '' ?> py-3 nav-link navLink text-capitalize sidebarLink"><span><i class="bi bi-pen px-3 fw-bold"></i>Les articles
                                <?php if ($articlesConfirmed > 0) { ?>
                                    <span class="badge badge-light bg-danger mx-2 rounded-circle"><?= $articlesConfirmed ?></span>
                                <?php } ?>
                        </a>
                        <a href="/controllers/dashboard/games/list-games-ctrl.php" class=" <?= $listGames ? 'active' : '' ?> py-3 nav-link navLink text-capitalize sidebarLink"><span><i class="bi bi-controller px-3 fw-bold"></i>Les Jeux</span></a>
                        <a href="/controllers/dashboard/consoles/list-consoles-ctrl.php" class="<?= $listConsoles ? 'active' : '' ?> py-3 nav-link navLink text-capitalize sidebarLink"><span><i class="bi bi-xbox px-3 fw-bold"></i>Les Consoles</span></a>
                        <a href="/controllers/dashboard/category/list-categories-ctrl.php" class="<?= $listCategories ? 'active' : '' ?> py-3 nav-link navLink text-capitalize sidebarLink"><span><i class="bi bi-tag px-3 fw-bold"></i>Category</span></a>
                        <a href="/controllers/dashboard/events/list-events-ctrl.php" class="py-3 <?= $listEvents ? 'active' : '' ?> nav-link navLink text-capitalize sidebarLink"><span><i class="bi bi-calendar-date px-3 fw-bold"></i>Calendrier des events</span></a>
                        <a href="" class="py-3 nav-link navLink text-capitalize sidebarLink"><span><i class="bi bi-patch-question px-3 fw-bold"></i>Le Quiz</span></a>
                        <a href="/controllers/dashboard/contacts/list-contacts-ctrl.php" class="<?= $listContacts ? 'active' : '' ?> py-3 nav-link navLink text-capitalize sidebarLink"><span><i class=" bi bi-envelope px-3 fw-bold"></i>Nous contacter</span></a>
                        <a href="/controllers/login/logout-ctrl.php" class="mb-3 py-3 navLink position-absolute sidebarLink w-100 bottom-0 nav-link"><span><i class="bi bi-box-arrow-right px-3"></i>Logout</span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>