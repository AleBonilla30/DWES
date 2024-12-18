<?php
include_once 'Animal.php';
class Ave extends Animal{

    public function __construct($a){
        parent::__construct($a);
    }

    public function aseate(){
        return "Me estoy limpiando las plumas";
    }

    public function vuela() {
        return "Estoy volando";
    }

    public function ponHuevo(){
        if ($this->getSexo() == "macho") {
            return "Soy macho, no puedo poner huevos";
        }else {
            return "Ahi va eso... un huevo ";
        }
    }

}




?>