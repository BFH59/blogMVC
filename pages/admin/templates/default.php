<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Blog MVC/OOP projet 5 OC">
    <meta name="author" content="Julien Plumecocq">
    <title><?= App::getInstance()->title; ?></title>

    <!-- Custom styles for this template -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="admin.php">Admin dashboard</a>
    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="admin.php?p=home">Gérer les articles <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="admin.php?p=categories.index">Gérer les catégories</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="admin.php?p=comments.index">Gérer les commentaires</a>
            </li>
        </ul>
    </div>

</nav>

<main role="main" class="container">

    <div class="starter-template" style="padding-top: 100px;">
        <?= $content; ?>
    </div>

</main><!-- /.container -->
</body>
</html>

