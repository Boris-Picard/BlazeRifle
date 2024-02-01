<?php

require_once __DIR__ . '/../../../config/config.php';
require_once __DIR__ . '/../../../models/Console.php';

$listConsoles = true;

try {

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
        if(empty($name)) {
            $error['name'] = 'Veuillez rentrer le nom d\'une console';
        } else {
            $isOk = filter_var($name, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_CONSOLE . '/')));
            if(!$isOk) {
                $error['name'] = 'Veuillez rentrer une console valide';
            }
        }

        // Photo de l'article nettoyage et validation
        try {
            if (empty($_FILES['picture']['name'])) {
                throw new Exception("Photo obligatoire");
            }
            if ($_FILES['picture']['error'] != 0) {
                throw new Exception("Error");
            }
            if (!in_array($_FILES['picture']['type'], IMAGE_TYPES)) {
                throw new Exception("Format non autorisé");
            }
            if ($_FILES['picture']['size'] > MAX_FILESIZE) {
                throw new Exception("Image trop grande");
            }

            $extension = pathinfo($_FILES['picture']['name'], PATHINFO_EXTENSION);
            $fileName = uniqid('img_') . '.' . $extension;

            $from = $_FILES['picture']['tmp_name'];
            $to =  __DIR__ . '/../../../public/uploads/games/' . $fileName;

            $moveFile = move_uploaded_file($from, $to);
        } catch (\Throwable $e) {
            $error['picture'] = $e->getMessage();
        }

        
        if(empty($error)) {
            $console = new Console();

            $console->setConsoleName($name);
            $console->setConsolePicture($filename);
            var_dump($fileName);
        die;

            $result = $console->insert();

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