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
        if (isset($_SESSION['username']) && isset($_SESSION['loggedIn'])) {
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

        // Überprüfen, ob der Benutzer gefunden wurde
        if ($user) {
            $this->setUsername($user['username']);
            $this->setPassword($user['passwort']);  // Es ist wichtig zu beachten, dass es generell keine gute Praxis ist, Passwörter in der Klasse zu speichern
            $_SESSION['id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['loggedIn'] = true;
            $this->loggedIn = true;

            return true;  // Login war erfolgreich
        }

        // Wenn kein Benutzer gefunden wurde
        return false;  // Login war nicht erfolgreich
    }


    public function registern($username, $passwort, $firstname, $lastname)
    {
        $conn = $GLOBALS['db'];
        $queryBuilder = $conn->createQueryBuilder();

        $queryBuilder
            ->insert('User')
            ->values([
                'username' => ':username',
                'passwort' => ':passwort',
                'firstname' => ':firstname',
                'lastname' => ':lastname'
            ])
            ->setParameter('username', $username)
            ->setParameter('passwort', $passwort)
            ->setParameter('firstname', $firstname)
            ->setParameter('lastname', $lastname)
            ->execute();
    }

    public function usernameExists($username)
    {
        $conn = $GLOBALS['db'];
        $queryBuilder = $conn->createQueryBuilder();

        $stmt = $queryBuilder
            ->select('username')
            ->from('User')
            ->where('username = :username')
            ->setParameter('username', $username)
            ->execute();

        $value = $stmt->fetchOne();
        return $value !== false;
  // gibt true zurück, wenn der Benutzername existiert, ansonsten false
    }

}

