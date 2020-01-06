<?php
session_start();

define('ROOT', dirname(__DIR__));
require ROOT . '/app/App.php';
require ROOT . '/vendor/autoload.php';


if(isset($_GET['p'])) {
    $page = $_GET['p'];
}else{
    $page = 'posts.index';

}
//Gestion dynamique des routes
$page = explode('.', $page);
if($page[0] == 'admin'){
    $controller = '\App\Controller\admin\\' . ucfirst($page[1]) . 'Controller';
    $action = $page[2];
} else{
    $controller = '\App\Controller\\' . ucfirst($page[0]) . 'Controller';
    $action = $page[1];
}
$controller = new $controller();
$controller->$action();

