<?php
session_start();
require_once __DIR__ . '/../../config/config.php';
require_once __DIR__ . '/../../models/User.php';
require_once __DIR__ . '/../../helpers/CheckPermissions.php';

CheckPermissions::checkMember();

try {
    $id_user = intval(filter_input(INPUT_GET, 'id_user', FILTER_SANITIZE_NUMBER_INT));
    $user = User::get($id_user);
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        //===================== Firstname : Nettoyage et validation =======================
        $firstname = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_SPECIAL_CHARS);
        // On vérifie que ce n'est pas vide
        if (empty($firstname)) {
            $error["firstname"] = "Vous devez entrer un prénom";
        } else { // Pour les champs obligatoires, on retourne une erreur
            $isOk = filter_var($firstname, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_FIRSTNAME . '/')));
            // Avec une regex (constante déclarée plus haut), on vérifie si c'est le format attendu 
            if (!$isOk) {
                $error["firstname"] = "Le prénom n'est pas au bon format";
            } else {
                // Dans ce cas précis, on vérifie aussi la longueur de chaine (on aurait pu le faire aussi direct dans la regex)
                if (strlen($firstname) <= 2 || strlen($firstname) >= 70) {
                    $error["firstname"] = "La longueur du prénom n'est pas bon";
                }
            }
        }
        $lastname = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_SPECIAL_CHARS);
        // On vérifie que ce n'est pas vide
        if (empty($lastname)) {
            $error["lastname"] = "Vous devez entrer un nom";
        } else { // Pour les champs obligatoires, on retourne une erreur
            $isOk = filter_var($lastname, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_FIRSTNAME . '/')));
            // Avec une regex (constante déclarée plus haut), on vérifie si c'est le format attendu 
            if (!$isOk) {
                $error["lastname"] = "Le nom n'est pas au bon format";
            } else {
                // Dans ce cas précis, on vérifie aussi la longueur de chaine (on aurait pu le faire aussi direct dans la regex)
                if (strlen($lastname) <= 2 || strlen($lastname) >= 70) {
                    $error["lastname"] = "La longueur du nom n'est pas bon";
                }
            }
        }
        $pseudo = filter_input(INPUT_POST, 'pseudo', FILTER_SANITIZE_SPECIAL_CHARS);
        // On vérifie que ce n'est pas vide
        if (empty($pseudo)) {
            $error["pseudo"] = "Vous devez entrer un pseudo";
        } else { // Pour les champs obligatoires, on retourne une erreur
            $isOk = filter_var($pseudo, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_PSEUDO . '/')));
            // Avec une regex (constante déclarée plus haut), on vérifie si c'est le format attendu 
            if (!$isOk) {
                $error["pseudo"] = "Le pseudo n'est pas au bon format";
            } else {
                // Dans ce cas précis, on vérifie aussi la longueur de chaine (on aurait pu le faire aussi direct dans la regex)
                if (strlen($pseudo) < 3 || strlen($pseudo) > 20) {
                    $error["pseudo"] = "La longueur du pseudo n'est pas bon";
                }
            }
        }
        //===================== email : Nettoyage et validation =======================
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);

        if (empty($email)) {
            $error["email"] = "L'adresse mail est obligatoire";
        } else {
            $testEmail = filter_var($email, FILTER_VALIDATE_EMAIL);
            if (!$testEmail) {
                $error["email"] = "L'adresse email n'est pas au bon format";
            }
        }

        $fileName = $user->user_picture;

        if (!empty($_FILES['picture']['name']) || empty($fileName)) {
            try {
                // Vérification de l'existence de la photo
                if (empty($_FILES['picture']['name'])) {
                    throw new Exception("Photo obligatoire");
                }
                // Vérification d'éventuelles erreurs lors du téléchargement du fichier
                if ($_FILES['picture']['error'] != 0) {
                    throw new Exception("Error");
                }
                // Vérification du format de la photo
                if (!in_array($_FILES['picture']['type'], IMAGE_TYPES)) {
                    throw new Exception("Format non autorisé");
                }
                // Vérification de la taille de la photo
                if ($_FILES['picture']['size'] > MAX_FILESIZE) {
                    throw new Exception("Image trop grande");
                }

                // Génération d'un nom de fichier unique
                $extension = pathinfo($_FILES['picture']['name'], PATHINFO_EXTENSION);
                $fileName = uniqid('profil_') . '.' . $extension;

                // Déplacement du fichier téléchargé vers le répertoire de destination
                $from = $_FILES['picture']['tmp_name'];
                $to =  __DIR__ . '/../../public/uploads/users/' . $fileName;
                $moveFile = move_uploaded_file($from, $to);

                $image = imagecreatefromjpeg($to);

                $width = 500;
                $height = -1;

                $mode = IMG_BICUBIC;

                $resampledObject = imagescale($image, $width, $height, $mode);
                imagejpeg($resampledObject, $to);
            } catch (\Throwable $e) {
                // En cas d'erreur, enregistrement du message d'erreur dans le tableau des erreurs
                $error['picture'] = $e->getMessage();
            }
        }

        if (User::isExist($email, null) && $email != $user->email) {
            $error['email'] = 'Email déjà existant';
            $alert['error'] = 'Les données que vous avez fournies n\'ont pas été modifiées.';
        }

        if (User::isExist(null, $pseudo) && $pseudo != $user->pseudo) {
            $error['pseudo'] = 'Pseudo déjà existant';
            $alert['error'] = 'Les données que vous avez fournies n\'ont pas été modifiées.';
        }

        if (empty($error)) {
            $updateUser = new User();

            $updateUser->setFirstname($firstname);
            $updateUser->setLastname($lastname);
            $updateUser->setPseudo($pseudo);
            $updateUser->setEmail($email);
            $updateUser->setIdUser($id_user);
            $updateUser->setRole($user->role);

            if ($fileName !== $user->user_picture) {
                if ($user->user_picture !== 'profilpicdefault.avif') {
                    unlink('../../public/uploads/users/' . $user->user_picture);
                }
                $updateUser->setUserPicture($fileName);
            } else {
                $updateUser->setUserPicture($user->user_picture);
            }

            $updateUser->update();

            if ($updateUser) {
                header('Refresh:5;url=/controllers/account/account-ctrl.php?id_user=' . $user->id_user);
            }
        }
        $user = User::get($id_user);
    }
} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}


include __DIR__ . '/../../views/templates/header.php';
include __DIR__ . '/../../views/templates/navbar.php';
include __DIR__ . '/../../views/account/update-account.php';
include __DIR__ . '/../../views/templates/socials.php';
include __DIR__ . '/../../views/templates/footer.php';
