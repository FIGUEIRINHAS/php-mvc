<?php

class Image
{
    public $id;
    public $id_annonce;
    public $file_name;

    public function __construct($id, $id_annonce, $file_name)
    {
        $this->id = $id;
        $this->id_annonce = $id_annonce;
        $this->file_name = $file_name;
    }

    public static function get_all_image()
    {
        $list = [];
        $db = Db::getInstance();
        $req = $db->prepare('SELECT * FROM image ');

        foreach ($req->fetchAll() as $image)
        {
            $list[] = new Image($image['id'], $image['id_annonce'], $image['file_name']);
        }
        return $list;
    }

    public static function add_image($array)
    {
        $db = Db::getInstance();
        $req = $db->prepare('INSERT INTO image(file_name, id_annonce) VALUES(:file_name, :id_annonce)');

        $req->execute($array);
    }

    public static function get_id_annonce($id = null)
    {
        $db = Db::getInstance();
        $req = $db->prepare('SELECT * FROM image INNER JOIN annonce ON image.id_annonce = annonce.id WHERE image.id_annonce = :id');

        $req->execute(array(
            'id' => $id
        ));
        $image = $req->fetch();
        return new Image($image['id'], $image['id_annonce'], $image['file_name']);
    }

    public static function delete_image($id)
    {
        $db = Db::getInstance();
        $req = $db->prepare('DELETE FROM image WHERE id = :id');

        $req->execute($id);
    }
}