<?php
const ROOT = __DIR__;

require ROOT . "/functions/require.php";


logs();

$phone = $_REQUEST["data"]["phone"];
$email = $_REQUEST["data"]["email"];


$to = 'order@salesgenerator.pro';

$subject = 'Новое сообщение с формы';

$body = "Телефон: $phone\n";
$body .= "Email: $email";

$headers = "From: Form";
$headers .= "Reply-To: Form\r\n";
// проверить спам
$mail_sent = mail($to, $subject, $body, $headers);


addNerasbor($phone, $email);







