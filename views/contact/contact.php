    <main>
        <section class="formSection contactContainer">
            <div class="container-fluid">
                <?php if($_SERVER['REQUEST_METHOD'] != 'POST' || !empty($error)) { ?>
                <form action="" method="POST" novalidate>
                    <div class="row">
                        <div class="col-12 col-md-6 imgContact">
                            
                        </div>
                        <div class="col-12 col-md-6 colInputContact">
                            <div class="row">
                                <h1 class="fw-bold text-center h1Contact">NOUS CONTACTER</h1>
                                <!-- FIRSTNAME -->
                                <div class="mb-5 col-md-6 form-floating mtfirstnameLastname">
                                    <input 
                                    type="text" 
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
                                    <small id="firstnameHelp" class="form-text text-danger fw-bold"><?= $error['firstname'] ?? '' ?></small>
                                    <label for="firstname">Prénom *</label>
                                </div>
                                <!-- LASTNAME -->
                                <div class="mb-5 col-md-6 form-floating mtfirstnameLastname">
                                    <input 
                                    type="text" 
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
                                    <small id="lastnameHelp" class="form-text text-danger fw-bold"><?= $error['lastname'] ?? '' ?></small>
                                    <label for="lastname">Nom *</label>
                                </div>
                                <div class="mb-5 form-floating">
                                    <input 
                                    type="email" 
                                    id="email" 
                                    class="form-control rounded-0"
                                    autocomplete="email"
                                    name="email" 
                                    value="<?= htmlentities($email ?? '') ?>"  
                                    placeholder="Email *" 
                                    required>
                                    <small id="emailError" class="form-text text-danger fw-bold"><?= $error['email'] ?? '' ?></small>
                                    <label for="email">Email *</label>
                                </div>
                                <div class="form-floating">
                                    <small class="fw-bold text-danger"><?= $error['textArea'] ?? '' ?></small>
                                    <textarea class="form-control rounded-0" 
                                    placeholder="Comments" 
                                    id="floatingTextarea" 
                                    name="textArea"
                                    maxlength="2000" 
                                    style="height: 200px;"
                                    required><?= $textArea ?? '' ?></textarea>
                                    <label for="floatingTextarea">Comments *</label>
                                </div>
                                <div class= "mt-5 buttonContact justify-content-center d-flex">
                                    <button type="submit" class="btn signInButton fw-semibold text-uppercase">Envoyer</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <?php } else { ?>

                <?php } ?>
            </div>
        </section>