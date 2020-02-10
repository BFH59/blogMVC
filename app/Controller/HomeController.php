<?php

namespace App\Controller;

use Core\Config;
use Core\Controller\Controller;

class HomeController extends AppController
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->render('home.index');
    }

    public function sendmail()
    {
        $secure_mail = str_replace(array("\n", "\r", PHP_EOL), '', filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL));
        include_once ROOT . '/app/config/transport.php';
        // Create the Mailer using your created Transport
        $mailer = new \Swift_Mailer($transport);
        $user_name = nl2br(filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS));
        // Create a message
        $message = (new \Swift_Message())
            ->setSubject('Blog, nouveau message d\'un visiteur')
            ->setFrom([nl2br(htmlspecialchars($secure_mail)) => nl2br(htmlspecialchars($user_name))])
            ->setTo([nl2br(htmlspecialchars($data['email'])), nl2br(htmlspecialchars($data['email']))])
            ->setBody('Message du visiteur : ' . nl2br(filter_input(INPUT_POST, 'message', FILTER_SANITIZE_SPECIAL_CHARS)), 'text/html');
        // Send the message
        $mailer->send($message);
        header('location: ' . $_SERVER["HTTP_REFERER"]);
        return;
    }
}