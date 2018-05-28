<?php
require_once('models/post.php');
require_once('models/annonce.php');
require_once('models/favori.php');
class UserController
{

    public function allUsers()
    {
        $users = User::get_all_users($_POST['usernameSign']);
    }

    public function connect()
    {
        require_once('views/users/connect.php');
    } 

    public function addUser()
    {
        if (isset($_POST['usernameSign']))
        {
            if (User::get_all_users($_POST['usernameSign']) !== 0)
            {
                require_once('views/users/signIn.php');
            }
            else
            {
                if ($_POST['verifPassword'] == $_POST['passwordSign'])
                {
                    User::connectAdd(array(
                    'username' => htmlspecialchars($_POST['usernameSign']),
                    'email' => htmlspecialchars($_POST['emailSign']),
                    'password' => htmlspecialchars(password_hash($_POST['passwordSign'], PASSWORD_DEFAULT))
                ));
                require_once('views/users/connect.php');
                }
                else
                {
                    header('location:index.php?controller=user&action=signIn');
                }
            }
        } 
    }
    public function signIn()
    {
        require_once('views/users/signIn.php');
    }
    public function login()
    {
        $exist = User::exist(array(
            'username' => htmlspecialchars($_POST['username'])
        ));
        if (password_verify($_POST['password'], $exist['password']))
        {
            $_SESSION['id'] = $exist['id'];
            $_SESSION['username'] = $exist['username'];
            $_SESSION['email'] = $exist['email'];

            $posts = Post::all();
            header('location:index.php');
        } 
        else
        {
            require_once('views/users/signIn.php');
        }
    }
    public function disconnect()
    {
        session_destroy();
        header('location:index.php?controller=user&action=connect');
    }

    public function dashboard()
    {
        if (!isset($_SESSION['id']))
        {
            return call('pages', 'error');
        }
        $user = $_SESSION['id'];
        $posts = Post::myPost(array(
            'author' => $user
        ));
        $annonces = Annonce::get_annonce_author(array(
            'author' => $user
        ));
        require_once('views/users/dashboard.php');
    }
}

?>