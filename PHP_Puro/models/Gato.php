<?php

class Gato {
    
    private $name;
    private $age;
    
    function __construct(string $name, int $age) {
        $this->name = $name;
        $this->age = $age;
    }
    
    function getName(): string {
        return $this->name;
    }

    function getAge(): string
    {
        return $this->age;
    }
    
    function meow(): string {
        return "$this->name: meeeeoooowww";
    }
    
    function getData(): string {
        return "$this->name: $this->age";
    }
}

?>