<?php
include_once 'model/User.php';

class UserController
{
    private $user;

    public function __construct()
    {
        $this->user = new User();
    }

    public function login()
    {
        include('view/navigation.php');
        include('view/login.php');
    }

    public function loginCheck()
    {
        $loginErfolgreich = $this->user->login();

        if (!$loginErfolgreich) {
            $_SESSION['loginError'] = "Ungültiger Benutzername oder Passwort!";
            header("Location: ?page=login");
        } else {
            header("Location: ./");
        }
    }

    public function logout()
    {
        session_unset();
        session_destroy();
        header("Location: /");
    }

    public function registern()
    {
        $fehler = [];

        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['username']) && isset($_POST['passwort']) && isset($_POST['firstname']) && isset($_POST['lastname'])) {

            if ($this->user->usernameExists($_POST['username'])) {
                $fehler[] = 'Der Benutzername ist bereits vergeben.';
            } elseif (strlen($_POST['passwort']) < 8) {
                $fehler[] = 'Passwort muss mindestens 8 Zeichen lang sein';
            } elseif ($_POST['passwort'] != $_POST['passwort_verify']) {
                $fehler[] = 'Passwörter stimmen nicht überein';
            } else {
                $this->user->registern($_POST['username'], $_POST['passwort'], $_POST['firstname'], $_POST['lastname']);
                header("Location: ./");
            }
        }

        include('view/navigation.php');
        include('view/registern.php');
    }

}
