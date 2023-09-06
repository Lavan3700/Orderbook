<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

include_once 'vendor/autoload.php';
include_once 'connect.php';
include_once 'controller/MainController.php';
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php
    $main = new MainController(); // macht in $main die MainController Funktion rein
    $main->render(); // Seite rendern und Inhalt anzeigen soll
    ?>
</body>

</html>