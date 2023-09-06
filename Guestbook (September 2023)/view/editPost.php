<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <div class="container">
        <div class="form-box">
            <h1>Post bearbeiten</h1>
            <form action="?page=update&id=<?= $post->getId() ?>" method="post">

                <textarea id="beschreibung" name="beschreibung" placeholder="Beschreibung" cols="30" rows="10"><?= $post->getBeschreibung() ?></textarea>

                <select id="menge" name="menge">
                    <option value="Einzelbestellung" <?= $post->getMenge() == 'Einzelbestellung' ? 'selected' : '' ?>>Einzelbestellung</option>
                    <option value="Mehrfachbestellung" <?= $post->getMenge() == 'Mehrfachbestellung' ? 'selected' : '' ?>>Mehrfachbestellung</option>
                </select>

                <button type="submit" name="update">Aktualisieren</button>
            </form>

            <br>
            <a href="?page=logout">Ausloggen</a>
            <br>
            <br>
            <a href="/">Zurück zur Liste</a>
        </div>
    </div>
</body>

</html>