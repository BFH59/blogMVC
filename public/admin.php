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
    require ROOT . '/Views/admin/posts/index.php';
} elseif ($page === 'posts.edit') {
    require ROOT . '/Views/admin/posts/edit.php';
} elseif ($page === 'posts.add') {
    require ROOT . '/Views/admin/posts/add.php';
}elseif ($page === 'posts.delete') {
    require ROOT . '/Views/admin/posts/delete.php';
}elseif($page === 'categories.index'){
    require ROOT . '/Views/admin/categories/index.php';
} elseif ($page === 'categories.edit') {
    require ROOT . '/Views/admin/categories/edit.php';
} elseif ($page === 'categories.add') {
    require ROOT . '/Views/admin/categories/add.php';
}elseif ($page === 'categories.delete') {
    require ROOT . '/Views/admin/categories/delete.php';
}elseif ($page === 'comments.index') {
    require ROOT . '/Views/admin/comments/index.php';
}elseif ($page === 'comments.delete') {
    require ROOT . '/Views/admin/comments/delete.php';
}elseif ($page === 'comments.validate') {
    require ROOT . '/Views/admin/comments/validate.php';
}

$content = ob_get_clean();

require ROOT . '/Views/admin/templates/default.php';