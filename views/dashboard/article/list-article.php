<section class="myAccount bg-light d-flex flex-nowrap">
    <!-- SIDEBAR -->
    <div class="container sidebar position-relative rounded-4 mt-5">
        <div class="row">
            <div class="col-12 p-0 rounded-4 shadow-lg bg-white">
                <div class="row m-0 p-0">
                    <a class="navbar-brand nameLogoAccount" href="/controllers/home-ctrl.php"><img src="/public/assets/img/redlogo.png" class="brandLogoAccount" alt="logo"> blaze rifle</a>
                    <div class="col-12 d-flex flex-column p-0 sidebar rounded colSidebar g-5">
                        <a href="" class="py-3 nav-link navLink  text-capitalize sidebarLink"><span><i class="bi bi-house px-3 fw-bold"></i>Dashboard</span></a>
                        <a href="" class="py-3 nav-link navLink text-capitalize sidebarLink"><span><i class="bi bi-house px-3 fw-bold"></i>Les Comptes</span></a>
                        <a href="" class="py-3 nav-link navLink text-capitalize sidebarLink"><span><i class="bi bi-house px-3 fw-bold"></i>Les Commentaires</span></a>
                        <a href="/controllers/dashboard/article/list-article-ctrl.php" class="active py-3 nav-link navLink text-capitalize sidebarLink"><span><i class="bi bi-house px-3 fw-bold"></i>Les Articles</span></a>
                        <a href="" class="py-3 nav-link navLink text-capitalize sidebarLink"><span><i class="bi bi-house px-3 fw-bold"></i>Les Jeux</span></a>
                        <a href="" class="py-3 nav-link navLink text-capitalize sidebarLink"><span><i class="bi bi-house px-3 fw-bold"></i>Les Consoles</span></a>
                        <a href="" class="py-3 nav-link navLink text-capitalize sidebarLink"><span><i class="bi bi-house px-3 fw-bold"></i>Les Guides</span></a>
                        <a href="" class="py-3 nav-link navLink text-capitalize sidebarLink"><span><i class="bi bi-house px-3 fw-bold"></i>Les Bons plans</span></a>
                        <a href="" class="py-3 nav-link navLink text-capitalize sidebarLink"><span><i class="bi bi-house px-3 fw-bold"></i>Calendrier des events</span></a>
                        <a href="" class="py-3 nav-link navLink text-capitalize sidebarLink"><span><i class="bi bi-house px-3 fw-bold"></i>Le Quiz</span></a>
                        <a href="" class="py-3 nav-link navLink text-capitalize sidebarLink"><span><i class="bi bi-house px-3 fw-bold"></i>Nous contacter</span></a>
                        <a href="" class="mb-3 py-3 navLink position-absolute sidebarLink w-100 bottom-0 nav-link"><span><i class="bi bi-box-arrow-right px-3"></i>Logout</span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-10 mx-auto mt-5">
                <div class="row">
                    <div class="col-12">
                        <h1 class="fw-bold text-uppercase">liste des articles</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive shadow-lg p-4 bg-white rounded-4 text-center">
                            <table class="table table-borderless table-hover table-responsive align-middle">
                                <thead>
                                    <tr>
                                        <th scope="col">
                                            ID
                                            <!-- <a href="/controllers/dashboard/vehicles/list-ctrl.php?order=ASC" class="btn btn-sm btn-light"><i class="bi bi-caret-up-fill mx-1 text-dark"></i></a>
                                            <a href="/controllers/dashboard/vehicles/list-ctrl.php?order=DESC" class="btn btn-sm btn-light"><i class="bi bi-caret-down-fill text-dark"></i></a> -->
                                        </th>
                                        <th scope="col">Titre</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Creation</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($articles as $article) { ?>
                                        <tr>
                                            <th scope="row" class="fw-semibold"><?= $article->id_article ?></th>
                                            <th scope="row" class="fw-semibold"><?= $article->title ?></th>
                                            <td class="fw-semibold text-break"><?= $article->description ?></td>
                                            <td class="fw-semibold">
                                                <?php if (isset($article->picture)) { ?>
                                                    <div class="ratio ratio-1x1">
                                                        <img src="/public/uploads/article/<?= $article->picture ?>" alt="<?= $article->picture ?>" class="object-fit-cover rounded-circle imgVehicles">
                                                    </div>
                                                <?php } ?>
                                            </td>
                                            <td class="fw-semibold"><?= $article->created_at ?></td>
                                            <!-- <td>
                                                <a href="/controllers/dashboard/vehicles/update-ctrl.php?id=<?= $article->id_vehicle ?>" class="text-decoration-none btn btn-sm btn-light">
                                                    <i class="bi bi-pencil-square text-dark fs-4"></i>
                                                </a>
                                                <a href="/controllers/dashboard/vehicles/archive-ctrl.php?id=<?= $article->id_vehicle ?>" class="text-decoration-none btn btn-sm btn-light">
                                                    <i class="bi bi-archive text-dark fs-4"></i>
                                                </a>
                                            </td> -->
                                        </tr>
                                    <?php }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>