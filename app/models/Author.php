<?php
namespace App\Models;

class Author extends \Core\Model {
    //Champs natifs
    protected $id, $firstname, $lastname, $biography, $picture, $created_at;
    
    //Champs issus de liaisons
    protected $books;

    protected function setBooks():void {
        $this->books = BooksManager::findAllByAuthorId($this->id);
    }
}