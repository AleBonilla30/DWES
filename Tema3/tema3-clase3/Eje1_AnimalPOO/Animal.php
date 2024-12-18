<?php

class animal {
    private $sexo;

    public function __construct($a) {
        if (isset($a)) {
            $this->sexo = "macho";
        }else{
            $this->sexo = $a;
        }
    }

    public function __toString() {
        echo "Sexo: $this->sexo";
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