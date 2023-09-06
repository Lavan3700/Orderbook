<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <div class="container">
        <div class="form-box">
            <h1>Login</h1>

            <?php
            if (isset($_SESSION['loginError'])) {
                echo '<p>' . $_SESSION['loginError'] . '</p>';
                unset($_SESSION['loginError']);  // löschen Sie die Fehlermeldung aus der Session nach der Anzeige
            }
            ?>

            <form action="?page=loginCheck" method="POST">
                <input type="text" name="username" placeholder="Benutzername" required>
                <br>
                <input type="password" name="passwort" placeholder="Passwort" required>
                <br>
                <br>
                <button type="submit" name="login">Einloggen</button>
            </form>

            <br>
            <a href="/">Zurück zur Liste</a>
        </div>
    </div>
</body>

</html>