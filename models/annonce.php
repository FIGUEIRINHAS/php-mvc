<?php

class Annonce
{
    public $id;
    public $id_regions;
    public $author;
    public $title;
    public $content;
    public $tel;

    public function __construct($id, $id_regions, $author, $title, $content, $tel)
    {
        $this->id = $id;
        $this->id_regions = $id_regions;
        $this->author = $author;
        $this->title = $title;
        $this->content = $content;
        $this->tel = $tel;
    }

    public static function all($regions = null)
    {
        $list = [];
        $db = Db::getInstance();

        if($regions)
        {
            $req = $db->prepare('SELECT * FROM annonce WHERE id_regions = :id_regions');
            $req->execute(array(
                'id_regions' => $regions
            ));
        }
        else
        {
            $req = $db->query('SELECT * FROM annonce');
        }

        foreach ($req->fetchAll() as $annonce) 
        {
            $list[] = new Annonce($annonce['id'], $annonce['id_regions'], $annonce['author'], $annonce['title'], $annonce['content'], $annonce['tel']);
        }
        return $list;
    }

    public static function find($id)
    {
        $db = Db::getInstance();
        $id = intval($id);
        $req = $db->prepare('SELECT * FROM annonce INNER JOIN user ON annonce.author = user.id WHERE annonce.id = :id'); 
        
        $req->execute(array('id' => $id));
        $annonce = $req->fetch();

        return new Annonce($annonce['id'], $annonce['id_regions'], $annonce['author'], $annonce['title'], $annonce['content'], $annonce['tel']);
    }

    public static function add_annonce($array)
    {
        $db = Db::getInstance();
        $req = $db->prepare('INSERT INTO annonce(id_regions, author, title, content, tel) VALUES(:id_regions, :author, :title, :content, :tel)');

        $req->execute($array);

        return $db->lastInsertId('id');
    }

    public static function delete_annonce($id)
    {
        $db = Db::getInstance();
        $req = $db->prepare('DELETE FROM annonce WHERE id = :id');

        $req->execute($id);
    }

    public static function get_annonce_author($array)
    {
        $list = [];
        $db = Db::getInstance();
        $req = $db->prepare('SELECT * FROM annonce WHERE author = :author');

        $req->execute($array);
        
        foreach ($req->fetchAll() as $annonce) 
        {
            $list[] = new Annonce($annonce['id'], $annonce['id_regions'], $annonce['author'], $annonce['title'], $annonce['content'], $annonce['tel']);
        }
        return $list;
    }
}

?>