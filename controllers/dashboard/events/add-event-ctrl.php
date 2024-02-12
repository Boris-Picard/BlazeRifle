<?php
session_start();
require_once __DIR__ . '/../../../config/config.php';
require_once __DIR__ . '/../../../models/Event.php';
require_once __DIR__ . '/../../../models/Game.php';
require_once __DIR__ . '/../../../helpers/CheckPermissions.php';

$check = CheckPermissions::checkAdmin();

try {
    $listEvents = true;

    $id_user = $_SESSION['user']->id_user;
    // Récupération de la liste de tous les jeux
    $games = Game::getAll();

    // Vérification si la requête est de type POST
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        // Nettoyage et validation du titre de l'événement
        $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_SPECIAL_CHARS);

        if (empty($title)) {
            $error['title'] = 'Veuillez rentrer un titre';
        } else {
            // Validation du titre avec une expression régulière
            $isOk = filter_var($title, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_TITLE . '/u')));
            if (!$isOk) {
                $error['title'] = 'Le titre n\'est pas valide';
            }
        }

        // Nettoyage et validation de la description de l'événement
        $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_SPECIAL_CHARS);

        if (empty($description)) {
            $error['description'] = 'Veuillez rentrer une description';
        } else {
            // Validation de la longueur de la description
            $isOk = filter_var($description, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_TEXTAREA . '/u')));
            if (!$isOk) {
                $error['description'] = 'Veuillez renseigner une description valide';
            }
        }

        // Nettoyage et validation du lieu de l'événement
        $place = filter_input(INPUT_POST, 'place', FILTER_SANITIZE_SPECIAL_CHARS);

        if (empty($place)) {
            $error['place'] = 'Veuillez renseigner un lieu';
        } else {
            // Validation du lieu avec une expression régulière
            $isOk = filter_var($place, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_PLACE . '/u')));
            if (!$isOk) {
                $error['place'] = 'Veuillez renseigner un lieu valide';
            }
        }

        // Nettoyage et validation de la date de l'événement
        $date = filter_input(INPUT_POST, 'date', FILTER_SANITIZE_NUMBER_INT);
        if (empty($date)) {
            $error['date'] = 'Veuillez renseigner une date';
        } else {
            // Validation de la date avec une expression régulière et des vérifications supplémentaires
            $isOk = filter_var($date, FILTER_VALIDATE_REGEXP, ['options' => ['regexp' => '/' . REGEX_DATE . '/']]);
            if (!$isOk) {
                $error['date'] = 'La date entrée n\'est pas valide!';
            } else {
                $dateObj = new DateTime($date);
                $currentDate = new DateTime();
                $currentDate->setTime(0, 0, 0);
                $eventDate = $currentDate->diff($dateObj);
                if ($eventDate->y > 5 || $dateObj < $currentDate) {
                    $error['date'] = 'La date n\'est pas conforme';
                }
            }
        }

        // Nettoyage et validation du lien de l'événement
        $link = filter_input(INPUT_POST, 'link', FILTER_SANITIZE_URL);
        if (empty($link)) {
            $error['link'] = 'Veuillez renseigner un lien';
        } else {
            // Validation du lien avec FILTER_VALIDATE_URL
            $isOk = filter_var($link, FILTER_VALIDATE_URL);
            if (!$isOk) {
                $error['link'] = 'Veuillez renseigner un lien correct';
            }
        }

        // Récupération des identifiants de jeux
        $gamesId = array_column($games, 'id_game');

        // Nettoyage et validation de l'identifiant du jeu
        $id_game = intval(filter_input(INPUT_POST, 'id_game', FILTER_SANITIZE_NUMBER_INT));

        if (empty($id_game)) {
            $error['id_game'] = 'Veuillez sélectionner un jeu';
        } else {
            // Validation de l'identifiant du jeu
            if (!in_array($id_game, $gamesId)) {
                $error['id_game'] = 'Ce n\'est pas un jeu valide';
            }
        }

        // Tentative de téléchargement de la photo de l'événement
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

            // Génération d'un nom de fichier unique et récupération de l'extension
            $from = $_FILES['picture']['tmp_name'];
            $fileName = uniqid('img_');
            $extension = pathinfo($_FILES['picture']['name'], PATHINFO_EXTENSION);

            // Chemin de destination et nom final du fichier
            $namePicture = $fileName . '.' . $extension;
            
            // Déplacement du fichier téléchargé vers le répertoire de destination
            if (empty($error)) {
                $to =  __DIR__ . '/../../../public/uploads/events/' . $fileName . '.' . $extension;
                $moveFile = move_uploaded_file($from, $to);
            }
        } catch (\Throwable $th) {
            // En cas d'erreur, enregistrement du message d'erreur dans le tableau des erreurs
            $error['picture'] = $th->getMessage();
        }

        //Si le tableau d'erreurs n'est pas vide alors message d'erreur
        if (!empty($error)) {
            $alert['error'] = 'Les données n\'ont pas été insérées !';
        }

        //Condition pour vérifier si la donnée dans la colonne 'event_link' existe déjà ou non. Si c'est vrai, bloquer l'envoi de la donnée.
        if (Event::isExist($link)) {
            $error['isExist'] = 'Lien déjà existant';
            $alert['error'] = 'Lien déjà existant';
        }

        // Si aucune erreur, hydratation des attributs de la classe Event
        if (empty($error)) {
            $event = new Event();

            $event->setEventTitle($title);
            $event->setEventDescription($description);
            $event->setEventPicture($namePicture);
            $event->setEventLink($link);
            $event->setPlace($place);
            $event->setEventDate($date);
            $event->setIdGame($id_game);
            $event->setIdUser($id_user);

            // Insertion de l'événement dans la base de données
            $result = $event->insert();

            // Si l'insertion réussit, affichage d'un message de succès et redirection
            if ($result) {
                $alert['success'] = 'La donnée a bien été insérée ! Vous allez être redirigé(e).';
                header('Refresh:3; url=list-events-ctrl.php');
            }
        }
    }
} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}









include __DIR__ . '/../../../views/templates/header-dashboard.php';
include __DIR__ . '/../../../views/templates/sidebar-dashboard.php';
include __DIR__ . '/../../../views/dashboard/events/add-event.php';
include __DIR__ . '/../../../views/templates/footer-dashboard.php';
