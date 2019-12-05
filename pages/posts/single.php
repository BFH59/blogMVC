<?php
use App\App;
use App\Table\Post;

$post = Post::find($_GET['id']);
if($post === false){
    \App\App::notFound();
}
App::setTitle($post->title);
?>

<h1><?= $post->title; ?></h1>
<h3><?= $post->chapo; ?></h3>
<p><?= $post->content;?></p>
