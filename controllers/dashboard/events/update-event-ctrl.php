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

    // Récupération de l'identifiant de l'événement depuis la requête
    $id_event = intval(filter_input(INPUT_GET, 'id_event', FILTER_SANITIZE_NUMBER_INT));

    // Récupération de tous les jeux depuis la base de données
    $games = Game::getAll();

    // Récupération de l'événement spécifié par l'identifiant
    $event = Event::get($id_event);

    // Récupération du message stocké en session
    $msg = filter_var($_SESSION['msg'] ?? '', FILTER_SANITIZE_SPECIAL_CHARS);

    // Suppression du message en session s'il existe
    if (isset($_SESSION['msg'])) {
        unset($_SESSION['msg']);
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Titre de l'événement nettoyage et validation
        $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_SPECIAL_CHARS);

        // Validation du titre
        if (empty($title)) {
            $error['title'] = 'Veuillez rentrer un titre';
        } else {
            $isOk = filter_var($title, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_TITLE . '/u')));
            if (!$isOk) {
                $error['title'] = 'Le titre n\'est pas valide';
            }
        }

        // Description de l'événement nettoyage et validation
        $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_SPECIAL_CHARS);

        // Validation de la description
        if (empty($description)) {
            $error['description'] = 'Veuillez rentrer une description';
        } else {
            $isOk = filter_var($description, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_TEXTAREA . '/u')));
            if (!$isOk) {
                $error['description'] = 'La description n\'est pas valide';
            }
            if(strlen($description) > 500) {
                $error['description'] = 'Votre message est trop long';
            }
        }

        // Lieu de l'événement nettoyage et validation
        $place = filter_input(INPUT_POST, 'place', FILTER_SANITIZE_SPECIAL_CHARS);

        // Validation du lieu
        if (empty($place)) {
            $error['place'] = 'Veuillez renseigner un lieu';
        } else {
            $isOk = filter_var($place, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_PLACE . '/u')));
            if (!$isOk) {
                $error['place'] = 'Veuillez renseigner un lieu valide';
            }
        }

        // Date de l'événement nettoyage et validation
        $date = filter_input(INPUT_POST, 'date', FILTER_SANITIZE_NUMBER_INT);

        // Validation de la date
        if (empty($date)) {
            $error['date'] = 'Veuillez renseigner une date';
        } else {
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

        // Lien de l'événement nettoyage et validation
        $link = filter_input(INPUT_POST, 'link', FILTER_SANITIZE_URL);

        // Validation du lien
        if (empty($link)) {
            $error['link'] = 'Veuillez renseigner un lien';
        } else {
            $isOk = filter_var($link, FILTER_VALIDATE_URL);
            if (!$isOk) {
                $error['link'] = 'Veuillez renseigner un lien valide';
            }
        }

        // Récupération des identifiants des jeux
        $gamesId = array_column($games, 'id_game');

        // Nettoyage et validation du select d'un jeu
        $id_game = intval(filter_input(INPUT_POST, 'id_game', FILTER_SANITIZE_NUMBER_INT));

        // Validation de l'identifiant du jeu
        if (empty($id_game)) {
            $error['id_game'] = 'Veuillez sélectionner un jeu';
        } else {
            if (!in_array($id_game, $gamesId)) {
                $error['id_game'] = 'Ce n\'est pas un jeu valide';
            }
        }

        $fileName = $event->event_picture;

        // Vérification de la présence de la photo et gestion des erreurs éventuelles
        if (empty($fileName)) {
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

                // Génération d'un nom de fichier unique
                $extension = pathinfo($_FILES['picture']['name'], PATHINFO_EXTENSION);
                $fileName = uniqid('img_') . '.' . $extension;

                // Déplacement du fichier téléchargé vers le répertoire des images d'événements
                $from = $_FILES['picture']['tmp_name'];
                
                if (empty($error)) {
                    $to =  __DIR__ . '/../../../public/uploads/events/' . $fileName;
                    $moveFile = move_uploaded_file($from, $to);
                }
            } catch (\Throwable $th) {
                // Gestion des erreurs liées au téléchargement de la photo
                $error['picture'] = $th->getMessage();
            }
        }

        //Si le tableau d'erreurs n'est pas vide alors message d'erreur
        if (!empty($error)) {
            $alert['error'] = 'Les données n\'ont pas été insérées !';
        }

        // Vérification finale des erreurs
        if (empty($error)) {
            // Création d'une instance d'événement
            $event = new Event();

            // Configuration des propriétés de l'événement avec les valeurs fournies
            $event->setEventTitle($title);
            $event->setEventDescription($description);
            $event->setEventPicture($fileName);
            $event->setEventLink($link);
            $event->setPlace($place);
            $event->setEventDate($date);
            $event->setIdEvent($id_event);
            $event->setIdGame($id_game);
            $event->setIdUser($id_user);

            // Mise à jour de l'événement dans la base de données
            $result = $event->update();

            // Vérification du résultat de la mise à jour
            if ($result) {
                $alert['success'] = 'La donnée a bien été insérée ! Vous allez être redirigé(e).';
                header('Refresh:3; url=list-events-ctrl.php');
            }
        }

        // Récupération de l'événement après mise à jour
        $event = Event::get($id_event);
    }
} catch (PDOException $e) {
    // En cas d'erreur PDO, affichage du message d'erreur
    die('Erreur : ' . $e->getMessage());
}









include __DIR__ . '/../../../views/templates/header-dashboard.php';
include __DIR__ . '/../../../views/templates/sidebar-dashboard.php';
include __DIR__ . '/../../../views/dashboard/events/update-event.php';
include __DIR__ . '/../../../views/templates/footer-dashboard.php';
