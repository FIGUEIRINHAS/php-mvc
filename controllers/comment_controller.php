<?php
require_once('models/post.php');
class CommentController
{
    public function index()
    {
        $comments = Comment::all();
        require_once('views/posts/index.php');
    }
    
    public static function addComment()
    {
        if (isset($_SESSION['username']))
        {
            $author = $_SESSION['username'];
        }
        else
        {
            $author = "anonymous";
        }
        $comments = Comment::commentDb(array(
            'author' => htmlspecialchars($author),
            'id_comment' => htmlspecialchars($_GET['id']),
            'content' => htmlspecialchars($_POST['comment'])
        ));
        header('location:index.php?controller=post&action=show&id=' . $_GET['id']. '');
    }
     
}

?>