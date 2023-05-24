<?php
include_once 'model/Post.php';
class Posts
{
    public $posts = [];
    public function getAllPosts($search = [])
    {
        $conn = $GLOBALS['db'];
        $queryBuilder = $conn->createQueryBuilder();

        $queryBuilder
        ->select('id', 'datum', 'vorname', 'nachname', 'menge', 'beschreibung')
        ->from('Post');

        if (!empty($search)) {
            if ($search['keyword']) {
                $queryBuilder
                    ->andWhere(
                        $queryBuilder->expr()->orX( // geht jeden durch und schaut ob es LIKE %% ist also ist für sortierte Anzeige
                            $queryBuilder->expr()->like('vorname', ':keyword'),
                            $queryBuilder->expr()->like('nachname', ':keyword'),
                            $queryBuilder->expr()->like('id', ':keyword'),
                            $queryBuilder->expr()->like('datum', ':keyword'),
                            $queryBuilder->expr()->like('menge', ':keyword'),
                            $queryBuilder->expr()->like('beschreibung', ':keyword')
                        )
                    )
                    ->setParameter('keyword', '%' . $search['keyword'] . '%');
            }

            if ($search['sortby']) {
                $queryBuilder->orderBy($search['sortby'], $search['orderby']);
            }
        }

        $stmt = $queryBuilder->execute();

        foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {

            $post = new Post(
                $row['id'],
                $row['datum'],
                $row['vorname'],
                $row['nachname'],
                $row['menge'],
                $row['beschreibung']
            );
            $this->posts[] = $post;
        }

        return $this->posts;
    }

    public function getPostId($id)
    {
        $conn = $GLOBALS['db'];
        $queryBuilder = $conn->createQueryBuilder();

        $queryBuilder
        ->select('*')
        ->from('Post')
        ->where('id = :id')
        ->setParameter('id', $id);

        $row = $queryBuilder->fetchAssociative();

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
        ]);
        $queryBuilder->execute();

        // Email schreiben
        $empfaenger = "la@internetgalerie.ch";
        $betreff = "PHP Test-Mail";
        $text = "Neuer Eintrag \n\nDatum: " . $datum . "\nVorname: " . $vorname . "\nNachname: " . $nachname . "\nBeschreibung: " . $beschreibung . "\nMenge: " . $menge;

        mail($empfaenger, $betreff, $text);
    }

    public function searchPosts($keyword)
    {
        $conn = $GLOBALS['db'];
        $queryBuilder = $conn->createQueryBuilder();

        $queryBuilder
        ->select('*')
        ->from('Post')
        ->where(
            $queryBuilder->expr()->orX(
                $queryBuilder->expr()->like('vorname', ':keyword'),
                $queryBuilder->expr()->like('nachname', ':keyword'),
                $queryBuilder->expr()->like('beschreibung', ':keyword')
            )
        )
            ->setParameter('keyword', '%' . $keyword . '%');

        $stmt = $queryBuilder->execute();

        $posts = [];
        foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {
            $post = new Post(
                $row['id'],
                $row['datum'],
                $row['vorname'],
                $row['nachname'],
                $row['menge'],
                $row['beschreibung']
            );
            $posts[] = $post;
        }

        return $posts;
    }
}