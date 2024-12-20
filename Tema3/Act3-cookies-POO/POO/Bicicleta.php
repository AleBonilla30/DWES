<!-- Crea una clase Bicicleta que "extiende de Vehiculo":
- Con una variable numero_de_marchas
- Contructor
- una Funcion propia: "hazCaballito" que muestra el mensaje: "Caballito..."

--> 

<?php
include_once 'Vehiculo.php';

class Bicicleta extends Vehiculo {
    private $numeroMarchas;

    public function __construct($nombre,$numeroMarchas){
        parent::__construct($nombre);
        $this->numeroMarchas = $numeroMarchas;
    }

    public function hazCaballito(){
        return "Caballito...";
    }
}

?>