<?php

include_once 'Mamifero.php';

class Perro extends Mamifero {

    private $raza;

    public function __construct($a, $r) {
        parent: __construct($a);
        if (isset($r)) {
            $this->raza = $r;
        }else {
            $this->raza = "pastor alemán";
        }
    }

    public function __toString(){
        parent::__toString()."<br>Raza: $this->raza";
    }

    public function ladra(){
        return "Guauuuu";
    }

    public function dameLaPata(){
        return "Toma mi pata";
    }

    public function caza(){
        return "Estoy cazando perdices";
    }


}




?>