<?php

class Post
{
    public $id;
    public $id_field;
    public $author;
    public $title;
    public $content;
    public $created_date;
    public $id_favori;

    public function __construct($id, $id_field, $author, $title, $content, $created_date, $id_favori = null)
    {
        $this->id = $id;
        $this->id_field = $id_field;
        $this->author = $author;
        $this->title = $title;
        $this->content = $content;
        $this->created_date = $created_date;
        $this->id_favori = $id_favori;
    }

    public static function all($field = null, $my_posts = null)
    {   
        $list = [];
        $db = Db::getInstance();

        if($field)
        {
            $req = $db->prepare('SELECT * FROM Post WHERE id_field = :id_field');
            $req->execute(array(
                'id_field' => $field
            ));
        }
        else
        {
            $req = $db->query("SELECT * FROM Post ORDER BY created_date DESC");
        }

        foreach ($req->fetchAll() as $post) 
        {
            $list[] = new Post($post['id'], $post['id_field'], $post['author'], $post['title'], $post['content'], $post['created_date']);
        }
        return $list;
    }
    public static function find($id)
    {
        $db = Db::getInstance();
        $id = intval($id);
        $req = $db->prepare('SELECT * FROM Post INNER JOIN user ON Post.author = user.id WHERE Post.id = :id'); 
        
        $req->execute(array('id' => $id));
        $post = $req->fetch();

        return new Post($post['id'], $post['id_field'], $post['author'], $post['title'], $post['content'], $post['created_date']);
    }
    public static function add($array)
    {   
        $db = Db::getInstance();
        $req = $db->prepare('INSERT INTO Post(id_field, author, title, content, created_date) VALUES(:id_field, :author, :title, :content, NOW())');
        
        $req->execute($array);    
    }
    public static function majUpdate($arrayUpdate)
    {
        $db = Db::getInstance();
        $req = $db->prepare('UPDATE Post SET content = :contentUpdate WHERE id = :id');

        $req->execute($arrayUpdate);
    }
    public static function deleteCols($id)
    {
        $db = Db::getInstance();
        $req = $db->prepare('DELETE FROM Post WHERE id = :id');

        $req->execute($id);
    }
    public static function myPost(array $tab)
    {
        $list = [];
        $db = Db::getInstance();
        $req = $db->prepare('SELECT * FROM Post WHERE author = :author');
        
        $req->execute($tab);
        //var_dump($posts);
        
        foreach ($req->fetchAll() as $post) 
        {
            $list[] = new Post($post['id'], $post['id_field'], $post['author'], $post['title'], $post['content'], $post['created_date']);
        }
        return $list;

    }

    public static function get_all_favori($id_user = null)
    {
        $list =[];
        $db = Db::getInstance();

        if($id_user)
        {
            $req = $db->prepare('SELECT p.id, p.title, f.id as id_favori FROM Post p INNER JOIN favoris f ON p.id = f.id_post WHERE f.id_user = :id_user ');
            $req->execute(array(
                'id_user' => $id_user 
            )); 
        }
        else
        {
            $req->query('SELECT * FROM favoris');
        }
        foreach ($req->fetchAll() as $post)
        {
            $list[] = new Post($post['id'], null, null, $post['title'], null, null, $post['id_favori']);
        }
        return $list;
    }
}

?>