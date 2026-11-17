<?php


namespace App\Models;

use \Core\DB;
use \PDO;


abstract class BooksManager
{
    public static function findAll(int $limit = 9): array
    {
        $sql = "SELECT b.*, ROUND(AVG(note), 2) AS notation
            FROM books b
            LEFT JOIN users_notations un ON un.book_id = b.id
            GROUP BY b.id
            ORDER BY notation DESC
            LIMIT :limit;";
        //$rs = $connexion->prepare($sql); est remplacé par ->
        $rs = DB::getConnexion()->prepare($sql);
        $rs->bindValue(':limit', $limit, PDO::PARAM_INT);
        $rs->execute();
        return $rs->fetchAll(PDO::FETCH_CLASS, Book::class);
    }
}
