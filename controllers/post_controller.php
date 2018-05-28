<?php
require('models/comment.php');
require('models/field.php');
class PostController 
{
    public function index()
    {
        if(isset($_GET['field']))
        {
            $posts = Post::all($_GET['field']);
        }
        else 
        {
            $posts = Post::all();
        }
        $fields = Field::all();
        require_once('views/posts/index.php');
    }
    public function show()
    {
        if (!isset($_GET['id']))
        {
            return call('pages', 'error');
        }
        $posts = Post::find($_GET['id']);
        $comments = Comment::find($_GET['id']);
        require_once('views/posts/show.php'); 
    }
    public function form()
    {
        $fields = Field::all();
        require_once('views/posts/form.php');
    }
    public function create()
    {
        $test = Post::add(array(
            'id_field' => htmlspecialchars($_POST['field']),
            'author' => $_SESSION['id'],
            'title' => htmlspecialchars($_POST['title']),
            'content' => htmlspecialchars($_POST['content'])

        )); 
        $fields = Field::all();
        $posts = Post::all();
        require_once('views/posts/index.php');
    }
    public function update()
    {
        if (isset($_SESSION['username']))
        {
            if (!isset($_GET['id']))
            {
                return call('pages', 'error');
            }
            $posts = Post::find($_GET['id']);
            require_once('views/posts/update.php');
        }
    }
    public function maj()
    {
        if(isset($_SESSION['username']))
        {
            Post::majUpdate(array(
                'id' => htmlspecialchars($_GET['id']),
                'contentUpdate' => htmlspecialchars($_POST['contentUpdate'])
            ));
            
            header('location: ?controller=post&action=index');
        }
    }
    public function verifDelete()
    {
        if(isset($_SESSION['username']))
        {
            if (!isset($_GET['id']))
            {
                return call('pages', 'error');
            }
            $posts = Post::find($_GET['id']);
            require_once('views/posts/verifDelete.php');
        }
    }
    public function delete()
    {
        require_once('views/posts/delete.php');
    }
    public function deleteDb()
    {
        Post::deleteCols(array(
            'id' => htmlspecialchars($_GET['id'])
        ));

        header('location:index.php?controller=post&action=delete');
    }
}


?>