<?php

require 'vendor/autoload.php';

// Create the Transport
$transport = (new Swift_SmtpTransport('smtp.mail.ru', 465, 'ssl'))
    ->setUsername('loftschoolphp2021@mail.ru')
    ->setPassword('vgreqrg64_94gJJ')
;

// Create the Mailer using your created Transport
$mailer = new Swift_Mailer($transport);

// Create a message
$message = (new Swift_Message('Wonderful Star'))
    ->setFrom(['loftschoolphp2021@mail.ru' => 'EliSha'])
    ->setTo(['elinshark@gmail.com'])
    ->setBody('To the stars and beyond!')
;

// Send the message
$result = $mailer->send($message);
var_dump($result);