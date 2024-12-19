<?php

include_once 'Ave.php';

class Pinguino extends Ave {
    
    public function __construct($a){
        parent::__construct($a);
    }

    public function aseate() {
        return parent::aseate(). ", a los pinguinos nos gusta asearnos";
    }

    public function vuela() {
        return "No puedo volar";
    }

    public function programa(){
        return "Soy un pingüino programador, estoy programando en PHP";
    }

    public function nada() {
        return "Estoy nadando";
    }

}









?>