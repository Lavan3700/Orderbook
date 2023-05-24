<?php

class Post
{
    private $id;
    private $datum;
    private $vorname;
    private $nachname;
    private $menge;
    private $beschreibung;
    private $search = [];

    public function getId()
    {
        return $this->id;
    }
    public function setId(int $id)
    {
        $this->id = $id;
    }

    public function getDatum()
    {
        return $this->datum;
    }

    public function setDatum($datum)
    {
        $this->datum = $datum;
    }

    public function getVorname()
    {
        return $this->vorname;
    }

    public function setVorname($vorname)
    {
        $this->vorname = $vorname;
    }

    public function getNachname()
    {
        return $this->nachname;
    }

    public function setNachname($nachname)
    {
        $this->nachname = $nachname;
    }

    public function getMenge()
    {
        return $this->menge;
    }

    public function setMenge($menge)
    {
        $this->menge = $menge;
    }

    public function getBeschreibung()
    {
        return $this->beschreibung;
    }

    public function setBeschreibung($beschreibung)
    {
        $this->beschreibung = $beschreibung;
    }

    public function __construct($id, $datum, $vorname, $nachname, $menge, $beschreibung)
    {
        // $this->id = $id;
        $this->setId($id);
        $this->setDatum($datum);
        // $this->datum = $datum;
        $this->vorname = $vorname;
        $this->nachname = $nachname;
        $this->menge = $menge;
        $this->beschreibung = $beschreibung;
    }

    public function getNewDatum()
    {
        $datumTime = new dateTime($this->datum);
        return $datumTime->format('d.m.Y');
    }

    public function getPostId($id)
    {
        $conn = $GLOBALS['db'];
        $queryBuilder = $conn->createQueryBuilder();
        
        $queryBuilder
        ->select('*')
        ->from('Post')
        ->where('id = :id')
        ->setParameter('id', $id)
        ->execute();
        
        $row = $queryBuilder->fetchAssociative(); // Assiozativ, nötig bei SELECT

        if ($row) {
            return new Post(
                $row['id'],
                $row['datum'],
                $row['vorname'],
                $row['nachname'],
                $row['menge'],
                $row['beschreibung']
            );
        }
    }

    public function createPost($datum, $vorname, $nachname, $menge, $beschreibung)
    {
        $conn = $GLOBALS['db'];
        $queryBuilder = $conn->createQueryBuilder();

        $queryBuilder
        ->insert('Post')
        ->values([
            'datum' => ':datum',
            'vorname' => ':vorname',
            'nachname' => ':nachname',
            'beschreibung' => ':beschreibung',
            'menge' => ':menge'
        ])
        ->setParameters([
            'datum' => $datum,
            'vorname' => $vorname,
            'nachname' => $nachname,
            'beschreibung' => $beschreibung,
            'menge' => $menge
        ])
        ->execute();

        // Email schreiben
        $empfaenger = "la@internetgalerie.ch";
        $betreff = "PHP Test-Mail";
        $text = "Neuer Eintrag \n\nDatum: " . $datum . "\nVorname: " . $vorname . "\nNachname: " . $nachname . "\nBeschreibung: " . $beschreibung . "\nMenge: " . $menge;

        mail($empfaenger, $betreff, $text);
    }
}