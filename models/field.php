<?php

class Field
{
    public $id;
    public $name;

    public function __construct($id, $name)
    {
        $this->id = $id;
        $this->name = $name;
    }

    public static function all()
    {
        $list = [];
        $db = Db::getInstance();
        $req = $db->query('SELECT id, name FROM field');

        foreach ($req->fetchAll() as $field) 
        {
            $list[] = new Field($field['id'], $field['name']);
        }
        return $list;
    }
}

?>