<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once __DIR__ . '/../vendor/autoload.php';

class Mail
{
    public static function sendMail(string $adress, string $nameAdress, string $subject, string $body)
    {
        try {
            $mail = new PHPMailer(true);

            $mail->SMTPDebug = SMTP::DEBUG_OFF;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'node135-eu.n0c.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'boris@noelstrasbourg.go.yo.fr';                     //SMTP username
            $mail->Password   = 'JQuh94abPMEh2fU';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 465;

            $mail->setFrom('boris@noelstrasbourg.go.yo.fr', 'Blaze Rifle');
            $mail->addAddress($adress, $nameAdress);     //Add a recipient
            $mail->addReplyTo('boris@noelstrasbourg.go.yo.fr', 'Information');

            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = $subject;
            $mail->Body = $body;

            return $mail->send();
        } catch (Exception $e) {
            throw $e;
        }
    }
}
