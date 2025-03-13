<?php

require_once 'users.php';
require_once 'articles.php';

class Comment {
    public $id;
    public $content;
    public $user;
    public $article;
    public $date;

    public function __construct($id, $content, $user, $article, $date){
        $this->id = $id;
        $this->content = $content;
        $this->user = User::find($user);
        $this->article = Article::find($article);
        $this->date = $date;
    }

    public static function all(){
        $db = Db::getInstance();
        $query = "SELECT * FROM comments;";
        $res = $db->query($query);
        $comments = array();
        while ($comment = $res->fetch_object()) {
            array_push($comments, new Comment($comment->id, $comment->content, $comment->user_id, $comment->article_id, $comment->date));
        }
        return $comments;
    }

    public static function find($id){
        $db = Db::getInstance();
        $id = mysqli_real_escape_string($db, $id);
        $query = "SELECT * FROM comments WHERE id = '$id';";
        $res = $db->query($query);
        
        if($comment = $res->fetch_object()){
            return new Comment($comment->id, $comment->content, $comment->user_id, $comment->article_id, $comment->date);
        }
    }

    public static function findByArticleId($article_id) {
        $db = Db::getInstance();
        $article_id = mysqli_real_escape_string($db, $article_id);
        $query = "SELECT * FROM comments WHERE article_id = '$article_id' ORDER BY date DESC;";
        $res = $db->query($query);
        $comments = array();
        while ($comment = $res->fetch_object()) {
            array_push($comments, new Comment($comment->id, $comment->content, $comment->user_id, $comment->article_id, $comment->date));
        }
        return $comments;
    }

    public static function create($content, $user_id, $article_id){
        $db = Db::getInstance();
        $content = mysqli_real_escape_string($db, $content);
        $user_id = mysqli_real_escape_string($db, $user_id);
        $article_id = mysqli_real_escape_string($db, $article_id);
        $date = date('Y-m-d H:i:s');

        $query = "INSERT INTO comments (content, user_id, article_id, date) VALUES ('$content', '$user_id', '$article_id', '$date');";
        
        if($db->query($query)){
            return true;
        } else {
            return false;
        } 
    }


}