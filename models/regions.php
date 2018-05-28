<?php

class Regions
{
    public $id;
    public $name;

    public function __construct($id, $name)
    {
        $this->id = $id;
        $this->name = $name;
    }

    public static function get_all_regions()
    {
        $list = [];
        $db = Db::getInstance();
        $req = $db->query('SELECT id, name FROM regions');

        foreach ($req->fetchAll() as $region) 
        {
            $list[] = new Regions($region['id'], $region['name']);
        }
        return $list;
        var_dump($list);
    }

    public static function get_id_regions($id_regions)
    {
        $list = [];
        $db = Db::getInstance();
        $id_regions = intval($id_regions);
        $req = $db->prepare('SELECT r.id, r.name FROM regions r INNER JOIN annonce a ON r.id = a.id_regions WHERE r.id = :id_regions');
        
        $tab = $req->execute(array('id_regions' => $id_regions));
        $region = $req->fetch();
        
        return new Regions($region['id'], $region['name']);
    }
}