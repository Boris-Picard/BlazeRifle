<?php
session_start();
require_once __DIR__ . '/../../../models/Console.php';
require_once __DIR__ . '/../../../helpers/CheckPermissions.php';

$check = CheckPermissions::checkAdmin();



try {
    $listConsoles = true;

    // Récupération et validation du nom de la console
    $id_console = intval(filter_input(INPUT_GET, 'id_console', FILTER_SANITIZE_NUMBER_INT));

    // Récupération de la console correspondant à l'identifiant
    $console = Console::get($id_console);

    // Récupération du message stocké en session
    $msg = filter_var($_SESSION['msg'] ?? '', FILTER_SANITIZE_SPECIAL_CHARS);

    // Suppression du message en session s'il existe
    if (isset($_SESSION['msg'])) {
        unset($_SESSION['msg']);
    }

    // Vérification si la requête est de type POST
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        // Récupération et validation du nom de la console
        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);

        if (empty($name)) {
            $error['name'] = 'Veuillez rentrer le nom d\'une console';
        } else {
            // Validation du format du nom de la console avec une expression régulière
            $isOk = filter_var($name, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_CONSOLE . '/')));
            if (!$isOk) {
                $error['name'] = 'Veuillez rentrer une console valide';
            }
        }

        $fileName = $console->console_picture;
        // Validation et traitement de la photo de la console
        if (empty($fileName)) {
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
                $to =  __DIR__ . '/../../../public/uploads/consoles/' . $fileName;

                if (empty($error)) {
                    $moveFile = move_uploaded_file($from, $to);
                }
            } catch (\Throwable $e) {
                $error['picture'] = $e->getMessage();
            }
        }

        //Si le tableau d'erreurs n'est pas vide alors message d'erreur
        if (!empty($error)) {
            $alert['error'] = 'Les données n\'ont pas été insérées !';
        }

        // Si aucune erreur n'est présente
        if (empty($error)) {
            // Création d'une nouvelle instance de la classe Console
            $console = new Console();

            // Attribution des valeurs aux propriétés de la console
            $console->setConsoleName($name);
            $console->setConsolePicture($fileName);
            $console->setIdConsole($id_console);

            // Insertion de la console dans la base de données
            $result = $console->update();

            // Si l'insertion a réussi, affichage d'un message de succès et redirection sinon un message d'erreur redirection et die
            if ($result) {
                $alert['success'] = 'La donnée a bien été insérée ! Vous allez être redirigé(e).';
                header('Refresh:3; url=list-consoles-ctrl.php');
            } else {
                $alert['error'] = 'Les données n\'ont pas été insérées !.';
                header('Location : /controllers/dashboard/consoles/update-console-ctrl.php');
                die;
            }
        }
        $console = Console::get($id_console);
    }
} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}

include __DIR__ . '/../../../views/templates/header-dashboard.php';
include __DIR__ . '/../../../views/templates/sidebar-dashboard.php';
include __DIR__ . '/../../../views/dashboard/consoles/update-console.php';
include __DIR__ . '/../../../views/templates/footer-dashboard.php';
