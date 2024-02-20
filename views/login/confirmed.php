<div class="container-fluid validContainer bg-light vh-100">
    <div class="row m-0 w-100 h-100">
        <div class="col-md-12 justify-content-center d-flex align-items-center h-100">
            <?php if (isset($isConfirmed)) { ?>
                <div class="card shadow border-0 p-5">
                    <div class="card-body d-flex align-items-center flex-column">
                        <div class="dot-spinner">
                            <div class="dot-spinner__dot"></div>
                            <div class="dot-spinner__dot"></div>
                            <div class="dot-spinner__dot"></div>
                            <div class="dot-spinner__dot"></div>
                            <div class="dot-spinner__dot"></div>
                            <div class="dot-spinner__dot"></div>
                            <div class="dot-spinner__dot"></div>
                            <div class="dot-spinner__dot"></div>
                        </div>
                        <h5 class="mb-2 py-5 text-uppercase fw-bold">Vous êtes bien enregistré !</h5>
                        <p class="text-sm text-muted mb-6 p-5">
                            Vous serez redirigé dans quelques secondes
                        </p>
                        <div class="checkmark-container">
                            <div class="checkmark-background"></div>
                            <div class="checkmark-stem"></div>
                            <div class="checkmark-kick"></div>
                        </div>
                    </div>
                </div>
            <?php } else { ?>
                <div class="alert alert-danger" role="alert">
                    Erreur lors de la confirmation
                </div>
            <?php } ?>
        </div>
    </div>
</div>