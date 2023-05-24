<head>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<form class="formularMain" action="" method="GET">
    <input type="hidden" name="page" value="list">

    <input class="inputKeyword" type="text" name="search[keyword]" placeholder="Suchen" value="<?= $search['keyword'] ?? '' ?>">

    <div class="sortingContainer">
        <div class="sort-orderByBox">
            <select class="sort-orderBy" name="search[sortby]">
                <?php foreach ($sortOption as $key => $value) { ?>
                    <?php $selectet = ($key === ($search['sortby'] ?? '')) ? 'selected' : ''; ?>
                    <option value="<?= $key ?>" <?= $selectet ?>><?= $value ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="sort-orderByBox">
            <select class="sort-orderBy" name="search[orderby]">
                <?php foreach ($orderOption as $key => $value) { ?>
                    <?php $selectet = ($key === ($search['orderby'] ?? '')) ? 'selected' : ''; ?>
                    <option value="<?= $key ?>" <?= $selectet ?>><?= $value ?></option>
                <?php } ?>
            </select>
        </div>
    </div>

    <button type="submit" name="submit" class="submit">Suchen</button>
</form>


<br>

<table id="posts">
    <tr>
        <th>ID</th>
        <th>Datum</th>
        <th>Vorname</th>
        <th>Nachname</th>
        <th>Menge</th>
        <th>Beschreibung</th>
    </tr>

    <?php for ($i = 0; $i < count($data); $i++) { ?>
        <tr>
            <td><a href="?page=show&id=<?= $data[$i]->getID() ?>"> Post <?= $data[$i]->getID() ?></a></td>
            <td><?= $data[$i]->getDatum() ?></td>
            <td><?= $data[$i]->getVorname() ?></td>
            <td><?= $data[$i]->getNachname() ?></td>
            <td><?= $data[$i]->getMenge() ?></td>
            <td><?= $data[$i]->getBeschreibung() ?></td>
        </tr>
    <?php } ?>


</table>

<br>

<a class="links" href="?page=createPost">Neue Einträge</a>

<br>

<a class="links" href="?page=registern">Benutzer Registrieren</a>