<?php

class animal {
    private $sexo;

    public function __construct($a) {
        if (isset($a)) {
            $this->sexo = $a;
        }else{
            $this->sexo = "macho";
        }
    }

    public function __toString() {
        return "Sexo: $this->sexo";
    }

    public function getSexo() {
        return $this->sexo;
    }

    public function come($comida){
        return "Estoy comiendo $comida";
    }

    public function duerme() {
        return "Zzzzzzzz";
    }
}


?>