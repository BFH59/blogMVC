<?php

$postTable = App::getInstance()->getTable('Post');
if (!empty($_POST)) {
    $result = $postTable->delete($_POST['id']);
    header('location: admin.php');
}
