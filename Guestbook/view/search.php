<h1>Suchergebnisse</h1>

<?php if (count($data) > 0) { ?>
  <table id="searchResults">
      <tr>
          <th>ID</th>
          <th>Datum</th>
          <th>Vorname</th>
          <th>Nachname</th>
          <th>Menge</th>
          <th>Beschreibung</th>
      </tr>

    <?php  for ($i = 0; $i < count($data); $i++) { ?>
    <tr>
        <td><a href="?page=show&id= <?=$data[$i]->getID()?> ">Post <?=$data[$i]->getID()?> </a></td>
          <td> <?=$data[$i]->getDatum()?> </td>
          <td> <?=$data[$i]->getVorname()?>  </td>
          <td> <?=$data[$i]->getNachname()?>  </td>
          <td> <?=$data[$i]->getMenge()?>  </td>
          <td> <?=$data[$i]->getBeschreibung()?>  </td>
          </tr>
          <?php } ?>

          </table>
  <?php } else { ?>
  <p>Keine Ergebnisse gefunden</p>
  <?php } ?>

  <br>
  <a href="/">Zurück zur Liste</a>