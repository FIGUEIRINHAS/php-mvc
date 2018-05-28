<?php

class Favori
{
    public $id;
    public $id_post;
    public $id_annonce;
    public $id_user;
    public $created_date;

    public function __construct($id, $id_post, $id_annonce, $id_user, $created_date)
    {   
        $this->id = $id;
        $this->id_post = $id_post;
        $this->id_annonce = $id_annonce;
        $this->id_user = $id_user;
        $this->created_date = $created_date;
    }

    public static function add_favori($id_post)
    {
        $db = Db::getInstance();
        $req = $db->prepare('INSERT INTO favoris(id_post, id_user, created_date) VALUES(:id_post, :id_user, NOW())');

        $array = $req->execute(array(
            'id_post' => $id_post,
            'id_user' => $_SESSION['id']
        ));
    }
}

?>