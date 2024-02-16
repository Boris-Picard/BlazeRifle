<?php
// require_once __DIR__ . '/../config/config.php';

// class Image
// {
//     public static function resize(bool $required = true, )
//     {
//         try {
//             // Vérification de l'existence de la photo
//             if (empty($_FILES['picture']['name']) && $required) {
//                 throw new Exception("Photo obligatoire");
//             }
//             // Vérification d'éventuelles erreurs lors du téléchargement du fichier
//             if ($_FILES['picture']['error'] != 0) {
//                 throw new Exception("Error");
//             }
//             // Vérification du format de la photo
//             if (!in_array($_FILES['picture']['type'], IMAGE_TYPES)) {
//                 throw new Exception("Format non autorisé");
//             }
//             // Vérification de la taille de la photo
//             if ($_FILES['picture']['size'] > MAX_FILESIZE) {
//                 throw new Exception("Image trop grande");
//             }

//             // Génération d'un nom de fichier unique
//             $extension = pathinfo($_FILES['picture']['name'], PATHINFO_EXTENSION);
//             $fileName = uniqid('img_') . '.' . $extension;

//             // Déplacement du fichier téléchargé vers le répertoire de destination
//             $from = $_FILES['picture']['tmp_name'];

//             $to =  __DIR__ . '/../../../public/uploads/article/' . $fileName;
//             $moveFile = move_uploaded_file($from, $to);

//             $image = imagecreatefromjpeg($to);

//             $width = 300;
//             $height = -1;

//             $mode = IMG_BICUBIC;

//             $resampledObject = imagescale($image, $width, $height, $mode);
//             imagejpeg($resampledObject, $to);
//         } catch (\Throwable $e) {
//             $error['picture'] = $e->getMessage();
//         }
//     }
// }
