<?php


namespace App\Models;

use \Core\DB;
use \PDO;


abstract class TagsManager
{
    public static function findAllByBookId(int $id): Array
    {
        $sql = "SELECT t.*
            FROM tags t
            JOIN books_has_tags bht ON bht.tag_id = t.id
            WHERE bht.book_id =:id;";
        //$rs = $connexion->prepare($sql); est remplacé par ->
        $rs = DB::getConnexion()->prepare($sql);
        $rs->bindValue(':id', $id, PDO::PARAM_INT);
        $rs->execute();
        return $rs->fetchAll(PDO::FETCH_CLASS, Tag::class);
    }
    public static function findAll(): Array
    {
        $sql = "SELECT *
            FROM tags
            ORDER BY name DESC";
        //$rs = $connexion->prepare($sql); est remplacé par ->
        $rs = DB::getConnexion()->prepare($sql);
        $rs->execute();
        return $rs->fetchAll(PDO::FETCH_CLASS, Tag::class);
    }
}