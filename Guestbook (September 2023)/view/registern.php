<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <div class="container">
        <div class="form-box">
            <h1>Registrieren</h1>

            <?php
            if (!empty($fehler)) {
                foreach ($fehler as $error) {
                    echo "<p>$error</p>";
                }
            }
            ?>

            <form action="?page=registern" method="POST">
                <input type="text" name="firstname" placeholder="Vorname">
                <input type="text" name="lastname" placeholder="Nachname">
                <input type="text" name="username" placeholder="Benutzername" required>
                <input type="password" name="passwort" placeholder="Passwort" required>
                <input type="password" name="passwort_verify" placeholder="Passwort Wiederholen" required>
                <button type="submit" name="registern">Registrieren</button>
            </form>

            <br>
            <a href="/">Zurück zur Liste</a>
        </div>
    </div>
</body>

</html>