<h1>Home page du blog</h1>


<?php

foreach ($db->query('SELECT * FROM post', 'App\Table\Post') as $post): ?>


       <h2> <a href="<?= $post->url; ?>"><?= $post->title;?></a></h2>

        <p><?= $post->chapo; ?></p>


<?php endforeach;?>
