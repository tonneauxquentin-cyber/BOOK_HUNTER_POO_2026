<?php
namespace App\Models;

class Book extends \Core\Model {

    //Champs natifs
    protected $id, $title, $publicated_at, $resume, $cover, $isbn, $author_id, $category_id, $created_at, $notation;
    
    //Champs issus de liaisons
    protected $author, $category, $tags;

    protected function setAuthor(): void {
        $this->author = AuthorsManager::findOneById($this->author_id);
    }
    protected function setCategory():void {
        $this->category = CategoriesManager::findOneById($this->category_id);
    }
    protected function setTags():void {
        $this->tags = TagsManager::findAllByBookId($this->id);
    }
}