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
                <input type="date" name="datum" required placeholder="Datum (YYYY-MM-DD)">
                <input type="text" name="vor" placeholder="Vorname">
                <input type="text" name="nach" placeholder="Nachname">
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