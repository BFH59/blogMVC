<?php

//Mise en place parametrage swiftMailer.

$data = require __DIR__ . '/../config/mailer.php';

// Créé le transport
$transport = (new \Swift_SmtpTransport($data['smpt'], $data['port'], $data['mode']))
    ->setUsername($data['username'])
    ->setPassword($data['password'])
    ->setStreamOptions(array('ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true)));