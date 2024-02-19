<footer class="py-5">
    <div class="container-fluid">
        <div class="row justify-content-center rowFooter">
            <div class="col-6 col-md-2 mb-3 text-center">
                <a class="navbar-brand nameLogoFooter" href="/../controllers/home-ctrl.php"><img src="/public/assets/img/redlogo.png" class="img-fluid logoFooter" alt="logoBrand">blaze rifle</a>
            </div>
            <div class="col-6 col-md-2 mb-3 text-center">
            </div>
            <div class="col-6 col-md-2 mb-3 text-center">
                <p class="fw-bold">Navigation principale</p>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2"><a href="/controllers/home-ctrl.php" class="nav-link footerLink p-0">Accueil</a></li>
                    <li class="nav-item mb-2"><a href="/controllers/articles-preview/articles-ctrl.php" class="nav-link footerLink p-0">Les Articles</a></li>
                    <li class="nav-item mb-2"><a href="/controllers/guides-preview/guides-ctrl.php" class="nav-link footerLink p-0">Les Guides</a></li>
                    <li class="nav-item mb-2"><a href="/controllers/tips-list/tips-ctrl.php" class="nav-link footerLink p-0">Les Bons Plans</a></li>
                    <li class="nav-item mb-2"><a href="/controllers/calendar/calendar-ctrl.php" class="nav-link footerLink p-0">Calendrier des événements</a></li>
                </ul>
            </div>
            <div class="col-6 col-md-2 mb-3 text-center">
                <p class="fw-bold">Information</p>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2"><a href="/controllers/contact-ctrl/contact-ctrl.php" class="nav-link footerLink p-0">Nous contacter</a></li>
                    <li class="nav-item mb-2"><a href="/controllers/legalnotice-ctrl.php" class="nav-link footerLink p-0">Mentions Légales</a></li>
                    <li class="nav-item mb-2"><a href="/controllers/CDU-ctrl.php" class="nav-link footerLink p-0">Conditions D'utilisation</a></li>
                    <li class="nav-item mb-2"><a href="/controllers/RGPD-ctrl.php" class="nav-link footerLink p-0">Politique de confidentialité</a></li>
                </ul>
            </div>
            <div class="d-flex flex-column flex-sm-row justify-content-center py-4 my-4 text-center">
                <p>&copy; 2023 Company, Inc. All rights reserved.</p>
            </div>
        </div>
    </div>
</footer>
<?php if (isset($userArticle)) { ?>
    <script src="/vendor/tinymce/tinymce/tinymce.min.js"></script>
    <script src="/public/assets/js/tinymce.js"></script>
<?php } ?>
<?php if (isset($commentsAccount)) { ?>
    <script src="/public/assets/js/deletecomment.js"></script>
<?php } ?>
<?php if (isset($articleView)) { ?>
    <script src="/public/assets/js/comments.js"></script>
<?php } ?>
<script src="/../../public/assets/js/script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init();
</script>
</main>
</body>

</html>