<!-- 2.- Ejercicio Vehiculos con POO:
Crea una clase Vehiculo:
- con 2 variables de clase: Kms_totales y VehiculosCreados
- Una variable de instancia  km_recorridos
- El contructor
-Las funciones:
-getVehiculosCreados()
-getKmTotales()
-getKmRecorridos(): devuelve los Km_recorridos
-recorre($km): Recibe los kms y los suma los recorridos y a los totales.--->
<?php
class Vehiculo {
    private $nombre;
    private static $kms_totales = 0;
    private static $vehiculosCreados = 0;

    private $km_recorridos;

    public function __construct($nombre) {
        $this->km_recorridos = 0;
        self::$vehiculosCreados++;
        $this->nombre = $nombre;
    }

    public function recorre($kms){
        $this->km_recorridos+=$kms;
        self::$kms_totales+=$kms;

    }

    public static function getVehiculosCreados(){
        return "Hay un total de ". self::$vehiculosCreados ." vehiculos creados.";
    }

    public static function getKmTotales(){
        return "Los kilometros totales de todos los vehiculos es ". self::$kms_totales." km";
    }

    public function getKmRecorridos() {
        return "El coche con nombre ".$this->nombre." ha recorrido ". $this->km_recorridos. "km.";
    }

}


?>



