<?php
require_once __DIR__ . '/../../../config/config.php';
require_once __DIR__ . '/../../../models/Event.php';

try {
    $listEvents = true;
    
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
            $isOk = filter_var($description, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_DESCRIPTION . '/u')));
            if (!$isOk) {
                $error['description'] = 'La description n\'est pas valide';
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

        if (empty($error)) {
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

                $from = $_FILES['picture']['tmp_name'];

                $fileName = uniqid('img_');
                $extension = pathinfo($_FILES['picture']['name'], PATHINFO_EXTENSION);

                $to =  __DIR__ . '/../../../public/uploads/events/' . $fileName . '.' . $extension;

                $namePicture = $fileName . '.' . $extension;

                $moveFile = move_uploaded_file($from, $to);

                $event = new Event();

                $event->setTitle($title);
                $event->setDescription($description);
                $event->setPicture($namePicture);
                $event->setPlace($place);
                $event->setEventDate($date);

                $result = $event->insert();

                if ($result) {
                    $alert['success'] = 'La donnée a bien été insérée ! Vous allez être redirigé(e).';
                    header('Refresh:3; url=list-articles-ctrl.php');
                }
            } catch (\Throwable $th) {
                $error['picture'] = $th->getMessage();
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
