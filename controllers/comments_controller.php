<?php

require_once 'models/comments.php';

class comments_controller {
    public function index(){
        $comments = Comment::all();
        require_once('views/comments/index.php');
    }

    public function create(){
        require_once('views/comments/create.php');
    }

    

    public function store(){
        if (!isset($_SESSION['USER_ID'])) {
            header("Location: /auth/login");
            exit();
        }
    
        if (!isset($_POST['content']) || !isset($_GET['article_id'])) {
            return call('pages', 'error');
        }
    
        $content = $_POST['content'];
        $user_id = $_SESSION['USER_ID'];
        $article_id = $_GET['article_id'];
    
        if (Comment::create($content, $user_id, $article_id)) {
            header("Location: /articles/show?id=$article_id");
            exit();
        } else {
            header("Location: /articles/show?id=$article_id&error=4");
            exit();
        }
    }
}