<?php
require_once __DIR__ . '/../../../config/config.php';
require_once __DIR__ . '/../../../models/Event.php';
require_once __DIR__ . '/../../../models/Game.php';

try {
    $listEvents = true;

    $id_event = intval(filter_input(INPUT_GET, 'id_event', FILTER_SANITIZE_NUMBER_INT));

    $games = Game::getAll();

    $event = Event::get($id_event);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Titre de l'événement nettoyage et validation
        $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_SPECIAL_CHARS);

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

        if (empty($description)) {
            $error['description'] = 'Veuillez rentrer une description';
        } else {
            // $isOk = filter_var($description, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_DESCRIPTION . '/u')));
            // if (!$isOk) {
            //     $error['description'] = 'La description n\'est pas valide';
            // }
            if (strlen($description) < 50 || strlen($description) > 500) {
                $error["description"] = 'La longueur de la description doit faire minimum 50 caractères et maximum 500 caractères';
            }
        }

        $place = filter_input(INPUT_POST, 'place', FILTER_SANITIZE_SPECIAL_CHARS);

        if (empty($place)) {
            $error['place'] = 'Veuillez renseigner un lieu';
        } else {
            $isOk = filter_var($place, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_PLACE . '/u')));
            if (!$isOk) {
                $error['place'] = 'Veuillez renseigner un lieu valide';
            }
        }


        $date = filter_input(INPUT_POST, 'date', FILTER_SANITIZE_NUMBER_INT);
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

        $link = filter_input(INPUT_POST, 'link', FILTER_SANITIZE_URL);
        if (empty($link)) {
            $error['link'] = 'Veuillez renseigner un lien';
        } else {
            $isOk = filter_var($link, FILTER_VALIDATE_URL);
            if (!$isOk) {
                $error['link'] = 'Veuillez renseigner un lien valide';
            }
        }

        $fileName = $event->event_picture;
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

                $extension = pathinfo($_FILES['image-article']['name'], PATHINFO_EXTENSION);
                $fileName = uniqid('img_') . '.' . $extension;

                $from = $_FILES['image-article']['tmp_name'];
                $to =  __DIR__ . '/../../../public/uploads/article/' . $fileName;

                $moveFile = move_uploaded_file($from, $to);
            } catch (\Throwable $th) {
                $error['picture'] = $th->getMessage();
            }
        }

        $gamesId = array_column($games, 'id_game');

        // Nettoyage et validation du select d'un jeu
        $id_game = intval(filter_input(INPUT_POST, 'id_game', FILTER_SANITIZE_NUMBER_INT));

        if (empty($id_game)) {
            $error['id_game'] = 'Veuillez sélectionner un jeu';
        } else {
            if (!in_array($id_game, $gamesId)) {
                $error['id_game'] = 'Ce n\'est pas un jeu valide';
            }
        }

        if (empty($error)) {
            $event = new Event();

            $event->setEventTitle($title);
            $event->setEventDescription($description);
            $event->setEventPicture($fileName);
            $event->setEventLink($link);
            $event->setPlace($place);
            $event->setEventDate($date);
            $event->setIdEvent($id_event);
            $event->setIdGame($id_game);

            $result = $event->update();
            
            if ($result) {
                $alert['success'] = 'La donnée a bien été insérée ! Vous allez être redirigé(e).';
                header('Refresh:3; url=list-events-ctrl.php');
                die;
            }
        }
    }
} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}








include __DIR__ . '/../../../views/templates/header-dashboard.php';
include __DIR__ . '/../../../views/templates/sidebar-dashboard.php';
include __DIR__ . '/../../../views/dashboard/events/update-event.php';
include __DIR__ . '/../../../views/templates/footer-dashboard.php';
