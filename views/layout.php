<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.0/normalize.min.css.map' />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous" />
    <link rel='stylesheet' href='views/style.css' type="text/css">
    <title>Le Mini Blog</title>
</head>
<body>
    <?php
        if (isset($_SESSION['username']))
        {
            echo 'Vous êtes connecté en tant que : ' . $_SESSION['username'];
        }
    ?>
    <header>
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="#">Mini blog</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="nav nav-tabs">
                    <li class="nav-item active">
                        <a class="nav-link active" href='?controller=pages&amp;action=home'>Home<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href='?controller=annonce&amp;action=indexAnnonce'>Lire les annonces</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="?controller=post&amp;action=index" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Lire les posts
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="nav-link" href='?controller=post&amp;action=index'>Voir tous les posts</a>
                            <a href=http://miniblogmvc.bwb/index.php?controller=post&action=index&field=1>\Sport</a></br>
                            <a href=http://miniblogmvc.bwb/index.php?controller=post&action=index&field=2>\Science</a></br>
                            <a href=http://miniblogmvc.bwb/index.php?controller=post&action=index&field=3>\Art</a></br>
                            <a href=http://miniblogmvc.bwb/index.php?controller=post&action=index&field=4>\Voyage</a>
                        </div>
                    </li>
                    <?php
                        if (!isset($_SESSION['username']))
                        { ?>
                        <li class="nav-item">
                            <a class="nav-link active" href='?controller=user&amp;action=connect'>Se connecter</a>
                        </li>
                    <?php } ?>
                    <?php 
                        if (isset($_SESSION['username']))
                        { ?>
                        <li class="nav-item">
                            <a class="nav-link dashboard" href='index.php?controller=user&amp;action=dashboard'>Dashboard</a>
                        </li>
                    <?php } ?>
                    <?php
                        if (isset($_SESSION['username']))
                        { ?>
                        <li class="nav-item">
                            <a class="nav-link disabled" href='?controller=user&amp;action=disconnect'>Log out !</a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </nav>
    </header>
    <div class="container">
        <?php require_once('route.php'); ?>
    </div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
</body>
</html>

