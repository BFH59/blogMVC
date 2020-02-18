# blogMVC

[![Codacy Badge](https://api.codacy.com/project/badge/Grade/f0e5aac7ad0941f380411c264a5febd1)](https://app.codacy.com/manual/BFH59/blogMVC?utm_source=github.com&utm_medium=referral&utm_content=BFH59/blogMVC&utm_campaign=Badge_Grade_Dashboard)

Contexte : Création d'un blog en orienté objet et avec le pattern MVC (Model, View, Controller) dans le cadre du projet 5 de ma formation Developpeur PHP/Symfony OpenClassRooms.

Informations annexes : 

- La base du framework du blog ainsi que l'implémentation du pattern MVC sont inspirées du cours de Grafikart (https://www.grafikart.fr/formations/programmation-objet-php);
- Le thème (front) utilisé est le thème CleanBlog; 
- La library SwiftMailer est utilisée pour gérer l'envoi de l'email depuis le formulaire de contact

Installation du projet :

Etape 1 : Transférer tous les fichiers dans le dossier de votre serveur web (www/).
Etape 2 : Créer une base données sur votre SGDB (MySQL) et importer le fichier DB/db.sql
Etape 3 : Saisissez les identifiants de connexion à la BDD dans le fichier blogMVC/App/Config/config.php
====================================
return array(
    "db_user" => "user",
    "db_pass" => "MDP",
    "db_host" => "127.0.0.1:8889",
    "db_name" => "blogP5"
);
====================================

Etape 4 : Paramétrez le fichier pour l'envoi des e-mails du formulaire de contact (blogMVC/App/Config/mailer.php

===================================
return [
    'smpt'    => 'smtp.gmail.com',
    'port'  => '587',
    'mode'=> 'tls',
    'username'=> 'Username@username.com',
    'password'=> 'MotDePasse',
    'email'=> 'Username@username.com',
    'name'=> 'Julien',
    'address'=> 'http://votredomaine.com/blogMVC/'
];

===================================
/!\ Veillez à bien remplir tout les champs avec vos informations de la même façon que celle fournit dans l'exemple 

Un jeu de données est présent en base ainsi que des comptes Admin et utilisateur.
Si vous souhaitez créer un nouveau compte admin, il vous suffit de vous enregistrer sur le site puis d'accèder à votre base de donnée et modifier le statut "userType" par 'admin' au lieu de 'utilisateur'

Pensez à mettre en place un fichier .htaccess pour empecher l'accès au dossier "sensible" comme le dossier 'config' qui reprend vos identifiants de connexion BDD, mail..

