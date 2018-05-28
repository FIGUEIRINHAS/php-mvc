<?php

class Comment
{
    public $id;
    public $id_comment;
    public $author;
    public $content;
    public $created_date;

    public function __construct($id, $id_comment, $author, $content, $created_date)
    {
        $this->id = $id;
        $this->id_comment = $id_comment;
        $this->author = $author;
        $this->content = $content;
        $this->created_date = $created_date;
    }
    public static function all()
    {
        $list = [];
        $db = Db::getInstance();
        $req = $db->query('SELECT id, id_comment, author, content, created_date FROM comments');

        foreach ($req->fetchAll() as $comment) 
        {
            $list[] = new Comment($comment['id'], $comment['id_comment'], $comment['author'], $comment['content'], $comment['created_date']);
        }
        return $list;
    }
    public static function find($id)
    {
        $list = [];
        $db = Db::getInstance();
        $id = intval($id);
        $req = $db->prepare('SELECT * FROM Post INNER JOIN comments ON Post.id = comments.id_comment WHERE Post.id = :id'); 
        
        $req->execute(array('id' => $id));
        
        foreach ($req->fetchAll() as $comment) 
        {
            $list[] = new Comment($comment['id'], $comment['id_comment'], $comment['author'], $comment['content'], $comment['created_date']);
        }
        return $list;
    }
    public static function commentDb($array)
    {
        var_dump($array);
        $db = Db::getInstance();
        $req = $db->prepare('INSERT INTO comments(author, id_comment, content, created_date) VALUES(:author, :id_comment, :content, NOW())');
        
        $req->execute($array);
    } 
}

?>