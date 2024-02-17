<?php
session_start();
require_once __DIR__ . '/../../../config/config.php';
require_once __DIR__ . '/../../../models/User.php';
require_once __DIR__ . '/../../../helpers/CheckPermissions.php';

$check = CheckPermissions::checkAdmin();
$listUsers = true;

try {
    $id_user = intval(filter_input(INPUT_GET, 'id_user', FILTER_SANITIZE_NUMBER_INT));

    $user = User::get($id_user);

    // Récupération du message stocké en session
    $msg = filter_var($_SESSION['msg'] ?? '', FILTER_SANITIZE_SPECIAL_CHARS);

    // Suppression du message en session s'il existe
    if (isset($_SESSION['msg'])) {
        unset($_SESSION['msg']);
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $firstname = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_SPECIAL_CHARS);

        if (empty($firstname)) {
            $error['firstname'] = 'Veuillez entrer un prénom';
        } else {
            $isOk = filter_var($firstname, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_NAME . '/')));
            if (!$isOk) {
                $error['firstname'] = 'Veuillez entrer un prénom valide';
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


        $arrayRole = [1, 2, 3];
        $role = intval(filter_input(INPUT_POST, 'role', FILTER_SANITIZE_NUMBER_INT));

        if (empty($role)) {
            $error['role'] = 'Veuillez sélectionner un role';
        } else {
            if (!in_array($role, $arrayRole)) {
                $error['role'] = 'Veuillez selectionner un role valide';
            }
        }

        $fileName = $user->user_picture;
        if (empty($fileName)) {
            // Validation et traitement de la photo de la console
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
                $fileName = uniqid('img_') . '.' . $extension;

                // Déplacement du fichier téléchargé vers le répertoire de destination
                $from = $_FILES['picture']['tmp_name'];
                if (empty($error)) {
                    $to =  __DIR__ . '/../../../public/uploads/users/' . $fileName;
                    $moveFile = move_uploaded_file($from, $to);
                }
            } catch (\Throwable $e) {
                // En cas d'erreur, enregistrement du message d'erreur dans le tableau des erreurs
                $error['picture'] = $e->getMessage();
            }
        }

        if (User::isExist(null, $pseudo) && $pseudo != $user->pseudo) {
            $error['pseudo'] = 'Pseudo déjà existant';
            $alert['error'] = 'Les données n\'ont pas été insérées !';
        }

        if (empty($error)) {
            $user = new User();

            $user->setFirstname($firstname);
            $user->setLastname($lastname);
            $user->setPseudo($pseudo);
            $user->setUserPicture($fileName);
            $user->setRole($role);
            $user->setIdUser($id_user);

            $result = $user->update();

            if ($result > 0) {
                $alert['success'] = 'La donnée a bien été insérée ! Vous allez être redirigé(e).';
                header('Refresh:3; url=users-list-ctrl.php');
            }
        }
        $user = User::get($id_user);
    }
} catch (PDOException $e) {
    die('Erreur ' . $e->getMessage());
}

include __DIR__ . '/../../../views/templates/header-dashboard.php';
include __DIR__ . '/../../../views/templates/sidebar-dashboard.php';
include __DIR__ . '/../../../views/dashboard/users/update-user.php';
include __DIR__ . '/../../../views/templates/footer-dashboard.php';
