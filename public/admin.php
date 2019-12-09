<?php

use Core\Auth\DBAuth;

define('ROOT', dirname(__DIR__));
require ROOT . '/app/App.php';

App::load();

if(isset($_GET['p'])) {
    $page = $_GET['p'];
}else{
    $page = 'home';

}

//Authentification

$app = App::getInstance();

$auth = new DBAuth($app->getDb());
if (!$auth->logged()){
    $app->forbidden();
}
ob_start();
if($page === 'home'){
    require ROOT . '/pages/admin/posts/index.php';
} elseif ($page === 'posts.category'){
    require ROOT . '/pages/admin/posts/category.php';
} elseif ($page === 'posts.single'){
    require ROOT . '/pages/admin/posts/single.php';
}
$content = ob_get_clean();

require ROOT . '/pages/templates/default.php';