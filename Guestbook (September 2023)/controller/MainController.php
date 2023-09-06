<?php
include_once 'controller/PostController.php';
include_once 'controller/UserController.php';
include_once 'model/User.php';

class MainController
{
    private $viewHandler; 
    private $postController;
    private $userController;
    private $currentPage;
    private $currentView;
    private $search;
    private $loggedIn = false;
    private $user;

    public function __construct()
    {
        $this->userController = new UserController();
        $this->postController = new PostController();
        $this->user = new User();
        $this->loggedIn = $this->user->isLoggedIn();
    }

    public function getCurrenPage()
    {
        $this->currentPage = $_GET['page'] ?? 'list';
        $this->search = $_GET['search'] ?? [];
        switch ($this->currentPage) {
            case 'list':
                $this->postController->list($this->search);
                break;
            case 'createPost':
                $this->postController->createPost();
                break;
            case 'create':
                $this->postController->create($_POST);
                break;
            case 'login':
                $this->userController->login();
                break;
            case 'loginCheck':
                $this->userController->loginCheck();
                break;
            case 'show':
                $id = $_GET['id'];
                $this->postController->show(['id' => $id]);
                break;
            case 'logout':
                $this->userController->logout();
                break;
            case 'registern':
                $this->userController->registern();
                break;
            case 'edit':
                $id = $_GET['id'];
                $this->postController->edit(['id' => $id]);
                break;
            case 'update':
                $this->postController->update($_POST);
                break;
            case 'delete':
                $this->postController->delete($_POST);
                break;
            default:
                break;
        }
    }

    public function getView()
    {
        $this->currentView = $this->viewHandler->getPage($this->currentPage, $this->postController->getData(), $this->search);
    }

    public function render()
    {
        $this->getCurrenPage();
    }
}



/* 

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
        $this->controller = new PostController();
        $this->user = new User();
        $this->loggedIn = $this->user->isLoggedIn();
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
            case 'edit':
                $id = $_GET['id'];
                $this->controller->edit(['id' => $id]);
                break;
            case 'update':
                $this->controller->update($_POST);
                break;
            case 'delete':
                $this->controller->delete($_POST);
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


*/