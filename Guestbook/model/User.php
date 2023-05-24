<?php

class User
{
    private $username;
    private $password;
    private $loggedIn = false;

    public function __construct()
    {
        $this->checkSession();
    }

    public function checkSession()
    {
        if ($_SESSION) {
            $this->setUsername($_SESSION['username']);
            $this->loggedIn = $_SESSION['loggedIn'];
        }
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function isLoggedIn()
    {
        return $this->loggedIn;
    }

    public function login()
    {
        $conn = $GLOBALS['db'];
        $queryBuilder = $conn->createQueryBuilder();
        $stmt = $queryBuilder
            ->select('*')
            ->from('User')
            ->where('username = :username')
            ->andWhere('passwort = :passwort')
            ->setParameter('username', $_POST['username'])
            ->setParameter('passwort', $_POST['passwort'])
            ->execute();
            
        $user = $stmt->fetchAssociative();

        if ($user) {
            $this->setUsername($user['username']);
            $_SESSION['username'] = $user['username'];
            $_SESSION['loggedIn'] = true;
            $this->loggedIn = true;
        }
    }

    public function registern($username, $passwort)
    {
        $conn = $GLOBALS['db'];
        $queryBuilder = $conn->createQueryBuilder();

        $queryBuilder
            ->insert('User')
            ->values([
                'username' => ':username',
                'passwort' => ':passwort'
            ])
            ->setParameter('username', $username)
            ->setParameter('passwort', $passwort)
            ->execute();
    }

}
