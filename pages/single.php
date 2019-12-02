<?php

$post = $db->prepare('SELECT * FROM post WHERE id = ?', [$_GET['id']], 'App\Table\Post', true);

?>

<h1><?= $post->title; ?></h1>
<h3><?= $post->chapo; ?></h3>
<p><?= $post->content;?></p>
