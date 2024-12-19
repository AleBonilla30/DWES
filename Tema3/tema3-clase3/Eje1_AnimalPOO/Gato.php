<?php

include_once 'Animal.php';
final class Gato extends Animal {
    private $raza;
    public function __construct($a, $r= "siamés"){
        parent::__construct($a);
        /* if (isset($r)) { */
            $this->raza = $r;
        /*  }else {
            $this->raza = "siamés";
        } */
    }

    public function __toString(){
        return parent::__toString(). "<br>Raza: $this->raza";
    }

    public function maulla(){
        return "Miauuuuu";
    }

    public function ronronea() {
        return "mrrrrrr";
    }

    public function come($comida) {
        if ($comida == "pescado") {
            return "Mmmmm, gracias.";
        }else {
            return "Lo siento, yo solo como pescado";
        }
    }

    public function peleaCon($contrincante){
        if ($this->getSexo() == "hembra") {
            return "No me gusta pelear.";
        }elseif ($contrincante.getSexo() == Sexo.HEMBRA) {
            return "No peleo contra gatitas";
        }else {
            return "Ven aqui te vas a enterar";
        }
    }

    public function aseate(){
        return "Me estoy lamiendo"; 
    }
    
    public function caza(){
        return "Estoy cazando ratones";
    }
}



?>