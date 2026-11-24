<?php
namespace Core;
// GETTER MAGIIIIIIQUE : getter qui se lance quand on tente d'accèder à
// - une propriété qui n'existe pas
// - une propriété private
abstract class Model {
    public function __get(string $property): mixed {
        $setterName = 'set' . ucfirst($property);
        if(method_exists($this, $setterName))$this->$setterName();
        return $this->$property;
    }
}