<?php

function call($controller, $action)
{
    require_once('controllers/' . $controller . '_controller.php');

    switch ($controller)
    {
        case 'pages':
            $controller = new PagesController();
            break;
        case 'post':
            require_once('models/comment.php');
            require_once('models/post.php');
            $controller = new PostController();
            break;
        case 'user':
            require_once('models/user.php');
            $controller = new UserController();
            break;
        case 'comment':
            require_once('models/comment.php');
            $controller = new CommentController();
            break;
        case 'annonce':
            require_once('models/annonce.php');
            $controller = new AnnonceController();
            break;
        case 'favori':
            require_once('models/post.php');
            require_once('models/favori.php');
            $controller = new FavoriController();
            break;
    }

    $controller->{ $action }();
}

$routes = array(
    'pages' => ['home', 'error',],
    'post' => ['index', 'show', 'form', 'create', 'update', 'maj', 'verifDelete', 'delete', 'deleteDb'],
    'user' => ['connect', 'signIn', 'addUser', 'exist', 'login', 'disconnect', 'dashboard'],
    'comment' => ['addComment', 'index'],
    'annonce' => ['indexAnnonce', 'createdAnnonce', 'addAnnonce', 'showAnnonce', 'addImage', 'indexImage', 'createImage', 'deleteAnnonce', 'showDelete', 'verifDelete'],
    'favori' => ['allFavori', 'addPostFavori']
);

if (array_key_exists($controller, $routes))
{
    if (in_array($action, $routes[$controller]))
    {
        call($controller, $action);
    }
    else
    {
        call('pages', 'error');
    }
}
else{
    call('pages', 'error');
}

?>