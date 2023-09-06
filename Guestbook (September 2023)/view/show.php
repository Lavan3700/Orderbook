<h1>Eintrag Details</h1>
<table id="singlePost">
    <tr>
        <th>ID</th>
        <th>Datum</th>
        <th>Vorname</th>
        <th>Nachname</th>
        <th>Menge</th>
        <th>Beschreibung</th>
    </tr>
    <tr>
        <td> <?= $post->getId() ?> </td>
        <td> <?= $post->getDatum() ?> </td>
        <td> <?= $post->getVorname() ?> </td>
        <td> <?= $post->getNachname() ?> </td>
        <td> <?= $post->getMenge() ?> </td>
        <td> <?= nl2br($post->getBeschreibung()) ?> </td> <!--nl2br() Zeilenumbruch speichern-->
    </tr>
</table>
<br>

<?php if ($this->user->isLoggedIn() && $post->getUserId() == $_SESSION['id']) { ?>

    <a class="links" href="?page=edit&id=<?= $post->getId() ?>">Bearbeiten</a>

<?php } else if ($this->user->isLoggedIn() && $post->getUserId() != $_SESSION['id']) { ?>

    <strong>Dieser Post wurde nicht von dir erstellt.</strong>

<?php } else { ?>

    <strong>Log dich ein um ein Post zu bearbeiten</strong>

<?php }; ?>

<br>

<?php if ($this->user->isLoggedIn() && $post->getUserId() == $_SESSION['id']) { ?>

    <a class="links" href="?page=delete&id=<?= $post->getId() ?>" onclick="return confirm('Möchtest du diesen Post löschen?');">Löschen</a>

<?php } ?>



<br>

<a class="links" href="/">Zurück zur Liste</a>