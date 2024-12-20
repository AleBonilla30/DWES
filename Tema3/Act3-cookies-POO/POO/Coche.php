<!-- Crea una clase Coche que "extiende de Vehiculo":
- Con una variable cilindrada
- Contructor
- una Funcion propia: "quemaRueda" que muestra el mensaje: "Ruedasssss..." -->

<?php
include_once 'Vehiculo.php';

class Coche extends Vehiculo{

    private $cilindrada;

    public function __construct($nombre,$cilindrada){
        parent::__construct($nombre);
        
        $this->cilindrada = $cilindrada;

        
    }

    public function quemaRueda(){
        return "Estoy quemando ruedas con mi coche de " . $this->cilindrada . "cc. ¡Qué emoción!";
    }

}

?>