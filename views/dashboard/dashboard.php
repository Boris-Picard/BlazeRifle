<!-- Main -->
<div class="container-fluid h-100">
    <div class="row">
        <div class="col-xl-7 mx-auto py-4 mt-4">
            <div class="row">
                <div class="col-md-6 col-6">
                    <?php if (isset($articles[0])) { ?>
                        <div class="card h-100 border-0 shadow-lg rounded-4">
                            <div class="card-header border-0 bg-danger rounded-top-4">
                                <div class="card-text text-center">
                                    <h5 class="text-white">Nombre d'articles</h5>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="card-text text-center">
                                    <h1 class="fw-bold"><?= count($articles) ?></h1>
                                    <p class="text-capitalize fw-bold">dernier article ajouté : </p>
                                    <p><?= $articles[0]->game_name ?></p>
                                    <p><?= $articles[0]->article_title ?></p>
                                    <p><?= $articles[0]->article_created_at ?></p>
                                </div>
                            </div>
                        <?php } ?>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>