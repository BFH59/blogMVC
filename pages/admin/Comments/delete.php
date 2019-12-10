<?php

$commentTable = App::getInstance()->getTable('Comment');
if (!empty($_POST)) {
    $result = $commentTable->delete($_POST['id']);
    header('location: admin.php?p=comments.index');
}
