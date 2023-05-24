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
        <td> <?= $post->getBeschreibung() ?> </td>
    </tr>
</table>
<br>
<a class="links" href="/">Zurück zur Liste</a>