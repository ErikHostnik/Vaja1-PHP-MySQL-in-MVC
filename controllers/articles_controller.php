<?php
/*
    Controller za novice. Vključuje naslednje standardne akcije:
        index: izpiše vse novice
        show: izpiše posamezno novico
        
    TODO:
        list: izpiše novice prijavljenega uporabnika
        edit: izpiše vmesnik za urejanje novice
        update: posodobi novico v bazi
        delete: izbriše novico iz baze
*/

class articles_controller
{
    public function index()
    {
        //s pomočjo statične metode modela, dobimo seznam vseh novic
        //$ads bo na voljo v pogledu za vse oglase index.php
        $articles = Article::all();

        //pogled bo oblikoval seznam vseh oglasov v html kodo
        require_once('views/articles/index.php');
    }

    public function show()
    {
        //preverimo, če je uporabnik podal informacijo, o oglasu, ki ga želi pogledati
        if (!isset($_GET['id'])) {
            return call('pages', 'error'); //če ne, kličemo akcijo napaka na kontrolerju stran
            //retun smo nastavil za to, da se izvajanje kode v tej akciji ne nadaljuje
        }
        //drugače najdemo oglas in ga prikažemo
        $article = Article::find($_GET['id']);
        require_once('views/articles/show.php');
    }

    public function create(){
        require_once('views/articles/create.php');
    }

    public function store()
    {
        if (!isset($_SESSION['USER_ID'])) {
            return call('auth', 'login');
        }

        if (!isset($_POST['title']) || !isset($_POST['abstract']) || !isset($_POST['text'])) {
            return call('pages', 'error');
        }

        $title = $_POST['title'];
        $abstract = $_POST['abstract'];
        $text = $_POST['text'];
        $user_id = $_SESSION['USER_ID'];

        if (Article::create($title, $abstract, $text, date('Y-m-d H:i:s'), $user_id)) {
            header("Location: /articles/index");
        } else {
            header("Location: /articles/create?error=4");
        }
    }

    public function list() {
        if(!isset($_SESSION["USER_ID"])){
            return call('auth', 'login');
        }
        $user_id = $_SESSION['USER_ID'];
        $articles = Article::findByUser($user_id);
        require_once('views/articles/list.php');
    }

    public function edit() {
        if(!isset($_SESSION['USER_ID'])){
            return call('auth', 'login');
        }

        if (!isset($_GET["id"])) {
            return call('pages', 'error');
        }
        $id = $_GET['id'];
        $article = Article::find($id);

        if($article->user->id != $_SESSION['USER_ID']){
            return call('pages', 'error');
        }

        require_once('views/articles/edit.php');
    }

    public function update() {
        if(!isset($_SESSION['USER_ID'])){
            return call('auth', 'login');
        }

        if (!isset($_POST['id']) || !isset($_POST['title']) || !isset($_POST['abstract']) || !isset($_POST['text'])) {
            return call('pages', 'error');
        }

        $id = $_POST['id'];
        $title = $_POST['title'];
        $abstract = $_POST['abstract'];
        $text = $_POST['text'];

        $article = Article::find($id);

        if ($article->user->id != $_SESSION['USER_ID']) {
            return call('pages', 'error');
        }

        if (Article::update($id, $title, $abstract, $text)) {
            header("Location: /articles/list");
            exit();
        } else {
            header("Location: /articles/edit?id=$id&error=1");
            exit();
        }

    }

    


}