<?php
include_once 'Animal.php';

class Mamifero extends Animal {

    public function __construct($a) {
        parent::__construct($a);
    }

    public function amamanta(){
        if ($this->getSexo() == "macho") {
            return "Soy macho, no puedo amamantar 😥";
        }else{
            return "Toma pecho, hazte grande";
        }
    }

    public function cuidaCrias(){
        return "Estoy cuidando mis crias";
    }

    public function anda() {
        return "Estoy andando";
    }
}
?>