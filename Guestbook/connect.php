<?php
$servername = 'localhost';
$user = '';
$pw = '';
$dbname = '';

//$pdo = new PDO('mysql:host=' . $servername . ';dbname=' . $dbname, $user, $pw);

$connectionParams = [
    'dbname' => $dbname,
    'user' => $user,
    'password' => $pw,
    'host' => $servername,
    'driver' => 'pdo_mysql',
];

$GLOBALS['db'] = Doctrine\DBAL\DriverManager::getConnection($connectionParams);