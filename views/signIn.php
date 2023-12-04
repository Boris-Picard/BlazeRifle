<?php require_once __DIR__ . '/../controllers/signIn-ctrl.php' ?>
</header>
    <main>
        <section class="formSection d-flex align-items-center justify-content-center signInPage">
            <div class="container">
                <div class="row formRow">
                    <div class="col-12 formFirstCol">
                        <form action="" method="POST" novalidate>
                            <div class="row">
                                <div class="col-12 col-md-6 imgForm justify-content-center align-items-center d-flex">
                                    <h1 class="fw-bold text-light text-center">S'INSCRIRE</h1>
                                </div>
                                <div class="col-12 col-md-6 formSignIn p-5">
                                    <p class="fw-semibold text-center">Vous avez déja un compte ?</p>
                                    <h1 class="fw-bold text-center"><a href="logIn-ctrl.php" class="text-decoration-none connectLink">Se Connecter</a></h1>
                                    <div class="text-center">
                                        <p class="mt-3 fw-semibold">Ou</p>
                                        <p class="fw-semibold">S'inscrire avec :</p>
                                        <a href="" class="text-light mx-1"><i class="bi bi-twitter-x fs-1"></i></a>
                                        <a href="" class="text-light mx-1"><i class="bi bi-facebook fs-1"></i></a>
                                        <a href="" class="text-light mx-1"><i class="bi bi-google fs-1"></i></a>
                                    </div>
                                    <div class="row">
                                        <!-- FIRSTNAME -->
                                        <div class="mb-5 mt-3 col-md-6 form-floating">
                                            <input type="text" 
                                            id="firstname" 
                                            class="form-control rounded-0" 
                                            placeholder="Prénom *" 
                                            name="firstname"
                                            autocomplete="given-name"
                                            value="<?= htmlentities($firstname ?? '') ?>"
                                            minlength="2" 
                                            maxlength="70"
                                            pattern="<?= REGEX_FIRSTNAME ?>"
                                            required>
                                            <small id="firstnameHelp" class="form-text error text-danger fw-bold"><?= $error['firstname'] ?? '' ?></small>
                                            <label for="firstname">Prénom *</label>
                                        </div>
                                        <!-- LASTNAME -->
                                        <div class="mb-5 mt-md-3 col-md-6 form-floating">
                                            <input type="text" 
                                            id="lastname" 
                                            class="form-control rounded-0" 
                                            placeholder="Nom *"
                                            name="lastname"
                                            autocomplete="family-name"
                                            value="<?= htmlentities($lastname ?? '') ?>"
                                            minlength="2" 
                                            maxlength="70"
                                            pattern="<?= REGEX_FIRSTNAME ?>"
                                            required>
                                            <small id="lastnameHelp" class="form-text error text-danger fw-bold"><?= $error['lastname'] ?? '' ?></small>
                                            <label for="lastname">Nom *</label>
                                        </div>
                                    </div>
                                    <!-- PSEUDO -->
                                    <div class="mb-5 form-floating">
                                        <input type="text" 
                                        id="pseudo" 
                                        class="form-control rounded-0" 
                                        placeholder="Pseudo *" 
                                        name="pseudo"
                                        value="<?= htmlentities($pseudo ?? '') ?>"
                                        minlength="3" 
                                        maxlength="20"
                                        pattern="<?= REGEX_PSEUDO ?>"
                                        required>
                                        <small id="pseudoHelp" class="form-text error text-danger fw-bold text-center"><?= $error['pseudo'] ?? '' ?></small>
                                        <label for="pseudo">Pseudo *</label>
                                    </div>
                                    <!-- EMAIL -->
                                    <div class="mb-5 form-floating">
                                        <input type="email" id="email" class="form-control rounded-0" placeholder="Email *" required>
                                        <label for="email">Email *</label>
                                    </div>
                                    <!-- PASSWORD -->
                                    <div class="mb-5 form-floating">
                                        <input type="password" id="password" class="form-control rounded-0" placeholder="Mot de passe *" required>
                                        <label for="password">Mot de passe *</label>
                                    </div>
                                    <!-- PASSWORD CONFIRM -->
                                    <div class="mb-3 form-floating">
                                        <input type="password" id="confirmPassword" class="form-control rounded-0" placeholder="Confimer le Mot de passe *" required>
                                        <label for="confirmPassword">Confimer le Mot de passe *</label>
                                    </div>
                                    <div class="d-flex justify-content-start align-items-start">
                                        <!-- CHECKBOX -->
                                        <div class="form-check">
                                            <input class="form-check-input" id="checkboxForm" type="checkbox" required>
                                            <label class="form-check-label" for="checkboxForm">
                                            J'accepte que mes données soient utilisées conformément à la <a href="">politique de confidentialité.</a>
                                            </label>
                                        </div>
                                    </div>
                                    <!-- BUTTON -->
                                    <div class=" justify-content-center d-flex mt-3">
                                        <button type="submit" class="btn signInButton fw-semibold text-uppercase">Sign in</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        