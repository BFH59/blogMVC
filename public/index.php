<?php

require '../App/Autoloader.php';

App\Autoloader::register();

if(isset($_GET['p'])){
    $p = $_GET['p'];
}else{
    $p = 'home';
}
// Initialisation des objets

$db = new App\Database('blogP5');

ob_start();
if($p === 'home'){
    require '../pages/home.php';
}elseif ($p === 'single'){
    require '../pages/single.php';
}

$content = ob_get_clean();

require '../pages/templates/default.php';