<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <div class="container">
        <div class="form-box">
            <h1>Neuen Eintrag hinzufügen</h1>
            <form action="?page=create" method="POST">
                <input type="hidden" name="action" value="create">
                <input type="hidden" name="datum" value="<?php echo date('Y-m-d'); ?>">
                <input type="hidden" name="vor" placeholder="Vorname" value="<?php echo $userDetails['firstname']; ?>" readonly>
                <input type="hidden" name="nach" placeholder="Nachname" value="<?php echo $userDetails['lastname']; ?>" readonly>
                <textarea name="besch" placeholder="Beschreibung" cols="30" rows="10"></textarea>
                <select name="menge">
                    <option value="Einzelbestellung">Einzelbestellung</option>
                    <option value="Mehrfachbestellung">Mehrfachbestellung</option>
                </select>
                <button type="submit" name="submit">Bestätigen</button>
            </form>
            <br>
            <a href="?page=logout">Ausloggen</a>
            <br>
            <br>
            <a href="/">Zurück zur Liste</a>
        </div>
    </div>
</body>