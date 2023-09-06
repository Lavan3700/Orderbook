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
    <?php for ($i = 0; $i < count($data); $i++) { ?>
        <tr>
            <td class="postsTD" onclick="window.location.href='?page=show&id=<?= $data[$i]->getID() ?>'">
                <div class="postsDiv">
                    <a class="link-container" style="color: inherit; text-decoration: none;" href="?page=show&id=<?= $data[$i]->getID() ?>">
                        <strong><?= $data[$i]->getVorname() ?> <?= $data[$i]->getNachname() ?></strong> - <?= $data[$i]->getDatum() ?> (<?= $data[$i]->getMenge() ?>)
                        <br>
                        <?= nl2br($data[$i]->getBeschreibung()) ?> <!--nl2br() Zeilenumbruch speichern-->
                    </a>
                </div>
            </td>
        </tr>

    <?php } ?>
</table>