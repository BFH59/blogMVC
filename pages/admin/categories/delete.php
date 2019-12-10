<?php

$categorieTable = App::getInstance()->getTable('Category');
if(!empty($_POST)) {
    $result = $categorieTable->delete($_POST['id']);
    header('location: admin.php?p=categories.index');
}