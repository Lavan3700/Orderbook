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
        include('view/navigation.html');
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
        include('view/navigation.html');
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

    // public function getAction($actionName, $config = [])
    // {
    //     $config = $_GET;
    //     switch ($actionName) {
    //         case 'list':
    //             break;
    //         case 'create';
    //             if (isset($config['submit'])) {
    //                 $datum = $config['datum'];
    //                 $vorname = $config['vor'];
    //                 $nachname = $config['nach'];
    //                 $beschreibung = $config['besch'];
    //                 $menge = $config['menge'];
    //                 $this->currentModel->createPost($datum, $vorname, $nachname, $menge, $beschreibung);
    //             }
    //             header("Location: /");
    //             break;
    //         case 'show';
    //             if (isset($config['id'])) {
    //                 $this->show($config);
    //             }
    //             break;
    //         case 'search':
    //             $keyword = isset($config['keyword']) ? $config['keyword'] : '';
    //             $this->data = $this->currentModel->searchPosts($keyword);
    //             break;
    //         default:
    //             echo "Fehler";
    //             break;
    //     }
    // }
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
        include('view/navigation.html');
        if (!$this->user->isLoggedIn()) {
            header("Location: /?page=login");
            return;
        }
        include('view/createPost.php'); //gibt den Inhalt aus createPost.html zurück
    }

    public function show($config)
    {
        include('view/navigation.html');
        $post = null;
        if (isset($config['id'])) {
            $post = $this->currentModel->getPostId(intval($config['id']));
        }
        include('view/show.php');
    }

    public function login()
    {
        include('view/navigation.html');
        include('view/login.html');
    }

    public function loginCheck()
    {
        $this->user->login();
        header("Location: /?page=createPost");
    }

    public function logout()
    {
        session_unset();
        session_destroy();
        header("Location: /");
    }

    public function registern() {
        if (isset($_POST['username']) && isset($_POST['passwort'])) { // Wenn Name und Passwort eingegeben schickt es weiter ans user register

            if(strlen($_POST['passwort']) < 8){ // Überprüft ob Passwort mindistesn 8 Zeichen lang ist
                echo 'Passwort muss mindistens 8 Zeichen lang sein';
            }
            else if ($_POST['passwort'] == $_POST['passwort_verify']) { // Überprüft ob Passwort übereinstimmt
                $this->user->registern($_POST['username'], $_POST['passwort']);
                header("Location: ./");
            } else {
                echo 'Passwort stimmt nicht überein';
            }

        }
        else {
            include('view/navigation.html');
            include('view/registern.html'); // anstonsten macht es das formular auf für einen user erstellen
        }
    }
}