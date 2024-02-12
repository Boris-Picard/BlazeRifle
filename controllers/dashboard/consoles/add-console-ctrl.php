<?php
session_start();
require_once __DIR__ . '/../../../config/config.php';
require_once __DIR__ . '/../../../models/Console.php';
require_once __DIR__ . '/../../../helpers/CheckPermissions.php';

$check = CheckPermissions::checkAdmin();

$listConsoles = true;

try {
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
                $to =  __DIR__ . '/../../../public/uploads/consoles/' . $fileName;
                $moveFile = move_uploaded_file($from, $to);
            }
        } catch (\Throwable $e) {
            // En cas d'erreur, enregistrement du message d'erreur dans le tableau des erreurs
            $error['picture'] = $e->getMessage();
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

            // Insertion de la console dans la base de données
            $result = $console->insert();

            // Si l'insertion a réussi, affichage d'un message de succès et redirection
            if ($result > 0) {
                $alert['success'] = 'La donnée a bien été insérée ! Vous allez être redirigé(e).';
                header('Refresh:3; url=list-consoles-ctrl.php');
            }
        }
    }
} catch (PDOException $e) {
    $error = $e->getMessage();
    die;
}




include __DIR__ . '/../../../views/templates/header-dashboard.php';
include __DIR__ . '/../../../views/templates/sidebar-dashboard.php';
include __DIR__ . '/../../../views/dashboard/consoles/add-console.php';
include __DIR__ . '/../../../views/templates/footer-dashboard.php';
