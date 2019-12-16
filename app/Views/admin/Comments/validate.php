<?php

$commentTable = App::getInstance()->getTable('Comment');
if (!empty($_POST)) {
    $result = $commentTable->update($_POST['id'], [
        'validated' => 1
    ]);
    header('location: admin.php?p=comments.index');
}