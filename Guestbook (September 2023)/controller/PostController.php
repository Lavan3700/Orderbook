<?php
include_once 'model/Posts.php';
class PostController
{
    private $currentModel;
    public $data;
    private $loggedIn = false;
    private $user;

    public function __construct()
    {
        $this->currentModel = new Posts();
        $this->user = new User();
    }

    public function list(array $search = [])
    {
        include('view/navigation.php');
        $data = $this->currentModel->getAllPosts($search);
        $sortOption = [
            'id' => 'Post Nummer',
            'datum' => 'Datum',
            'vorname' => 'Vorname',
            'nachname' => 'Nachname',
            'menge' => 'Menge',
            'beschreibung' => 'Beschreibung'
        ];

        $orderOption = [
            'ASC' => 'Aufsteigend',
            'DESC' => 'Absteigend'
        ];
        

        include 'view/list.php';
    }


    public function create(array $config = [])
    {
        include('view/navigation.php');
        if(!$this->user->isLoggedIn()) {
            header("Location: /");
            return;
        }
        if (isset($config['submit'])) {
            $datum = $config['datum'];
            $vorname = $config['vor'];
            $nachname = $config['nach'];
            $beschreibung = $config['besch'];
            $menge = $config['menge'];
            $this->currentModel->createPost($datum, $vorname, $nachname, $menge, $beschreibung);
        }
        header("Location: ./");
    }

    public function getData()
    {
        return $this->data;
    }

    // Updates
    public function setLoggedIn($loggedIn)
    {
        $this->loggedIn = $loggedIn;
    }

    public function createPost()
    {
        include('view/navigation.php');
        if (!$this->user->isLoggedIn()) {
            header("Location: /?page=login");
            return;
        }
        $userDetails = $this->currentModel->getLoggedInUserDetails();

        include('view/createPost.php'); //gibt den Inhalt aus createPost.php zurück
    }

    public function show($config)
    {
        include('view/navigation.php');
        $post = null;
        if (isset($config['id'])) {
            $post = $this->currentModel->getPostId(intval($config['id']));
        }
        include('view/show.php');
    }

    public function edit($config)
    {
        include('view/navigation.php');

        $post = $this->currentModel->getPostId(intval($config['id']));

        // Überprüft ob der eingeloggte Benutzer der Ersteller des Posts ist
        if ($post->getUserId() != $_SESSION['id']) {
            die("Dieser Post wurde nicht von Ihnen erstellt.");
        }
        include('view/editPost.php');
    }

    public function update($config)
    {
        if (isset($config['update'])) {
            $id = $_GET['id'];
            $menge = $config['menge'];
            $beschreibung = $config['beschreibung'];

            $this->currentModel->updatePost($id, $menge, $beschreibung);
        }
        header("Location: ?page=show&id=$id");
    }

    public function delete()
    {
        if (!$this->user->isLoggedIn()) {
            header("Location: /");
            return;
        }

        if (isset($_GET['id'])) {
            $this->currentModel->deletePost(intval($_GET['id']));
            header("Location: /");  // Nach Löschen zurück zur Liste
        } else {
            die("Eintrag nicht gefunden!");
        }
    }


}