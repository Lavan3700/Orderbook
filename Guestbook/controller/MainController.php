<?php
include_once 'controller/PostController.php';
include_once 'model/User.php';

class MainController
{
    private $viewHandler; 
    private $controller;
    private $currentPage;
    private $currentView;
    private $search;
    private $loggedIn = false;
    private $user;

    public function __construct()
    {
        //$this->viewHandler = new ViewHandler();
        $this->controller = new PostController();
        $this->user = new User();
        $this->loggedIn = $this->user->isLoggedIn();
        //$this->viewHandler->setLoggedIn($this->loggedIn);
        //$this->getView();
    }

    public function getCurrenPage()
    {
        $this->currentPage = $_GET['page'] ?? 'list';
        $this->search = $_GET['search'] ?? [];
        switch ($this->currentPage) {
            case 'list':
                $this->controller->list($this->search);
                break;
            case 'createPost':
                $this->controller->createPost();
                break;
            case 'create':
                $this->controller->create($_POST);
                break;
            case 'login':
                $this->controller->login();
                break;
            case 'loginCheck':
                $this->controller->loginCheck();
                break;
            case 'show':
                $id = $_GET['id'];
                $this->controller->show(['id' => $id]);
                break;
            case 'logout':
                $this->controller->logout();
                break;
            case 'registern':
                $this->controller->registern();
                break;
            default:
                break;
        }
    }

    public function getView()
    {
        $this->currentView = $this->viewHandler->getPage($this->currentPage, $this->controller->getData(), $this->search);
    }

    public function render()
    {
        $this->getCurrenPage();
    }
}
