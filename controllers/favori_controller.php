<?php
require('models/post.php');
require('models/annonce.php');
require('models/comment.php');
class FavoriController
{

    public function allFavori()
    {
        if (!isset($_SESSION['id']))
        {
            return call('pages', 'error');
        }
        $favoris = Post::get_all_favori($_SESSION['id']);
        require_once('views/favoris/index.php');            
    }

    public function addPostFavori()
    {
        if (!isset($_GET['id_post']))
        {
            return call('pages', 'error');
        }

        $favoris = Favori::add_favori($_GET['id_post']);
        require_once('views/favoris/favori.php');
    }
}

?>