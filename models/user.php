<?php

class User
{
    public $id;
    public $admin_user;
    public $username;
    public $email;
    public $password;
    public $created_date;

    public function __construct($id, $admin_user, $username, $email, $password, $created_date)
    {
        $this->id = $id;
        $this->admin_user = $admin_user;
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->created_date = $created_date;
    }

    public static function get_all_users($username = null)
    {
        $list = [];
        $db = Db::getInstance();

        if ($username)
        {
            $req = $db->prepare('SELECT * FROM user WHERE username = :username');
            $req->execute(array(
                'username' => $username
            ));
            $users = $req->rowcount($req);
            return $users;
        }

        foreach ($req->fetchAll() as $user)
        {   
            $list[] = new User($user['id'], $user['admin_user'], $user['username'], $user['email'], $user['password'], $user['created_date']);
        }
        return $list;
    }

    public static function connectAdd($array)
    {
        $db = Db::getInstance();
        $req = $db->prepare('INSERT INTO user(username, email, password, created_date) VALUES(:username, :email, :password, NOW())');

        $req->execute($array);
    }
    public static function exist($array)
    {
        $db = Db::getInstance();
        $req = $db->prepare('SELECT * FROM user WHERE username = :username');

        $req->execute($array);
        $row = $req->fetch();
        return $row;
    }
}

?>