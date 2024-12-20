<!-- Crea un ejemplo(como el de abajo) de prueba para la creación de un coche y una bici y pruba varios valores:

include_once 'Bicicleta.php';
include_once 'Coche.php';
// crea una bicicleta con 24 marchas
$miBici = new Bicicleta("24");
// crea un coche con 1500cc de cilindrada
$miCoche = new Coche(1500);
$miBici->recorre(40);
$miCoche->recorre(200);
echo $miBici->hazCaballito()."<br>";
echo $miCoche->quemaRueda()."<br>";
$miBici->recorre(60);
echo "Mi bici ha recorrido ".$miBici->getKmRecorridos()." Km<br>";
echo "Mi coche ha recorrido ".$miCoche->getKmRecorridos()." Km<br>";
echo "Se han creado un total de ".Vehiculo::getVehiculosCreados()." vehículos<br>";
echo "Todos los vehículos han hecho un total de ".Vehiculo::getKmTotales()." Km<br>"; -->



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POO</title>
</head>
<body>
    <?php
    include_once 'Coche.php';
    include_once 'Bicicleta.php';

    $miCocheA = new Coche("cocheA",1500);
    $miCocheB = new Coche("cocheB",200);
    $miCocheC = new Coche("cocheC",150);
    
    $miBici1 = new Bicicleta("Bicicleta1", 24);
    $miBici2 = new Bicicleta("Bicicleta2", 96);
    $miBici3 = new Bicicleta("Bicicleta3", 45);

    $miCocheA->recorre(200);
    $miBici1->recorre(300);
    $miCocheB->recorre(100);
    $miBici2->recorre(200);

    
    echo $miCocheA->getKmRecorridos()."<br>";
    echo $miCocheB->getKmRecorridos()."<br>";
    echo $miCocheC->getKmRecorridos()."<br>";
    
    echo $miCocheA->quemaRueda()."<br><hr>";
    echo "<br>";
    echo $miBici1->getKmRecorridos()."<br>";
    echo $miBici2->getKmRecorridos()."<br>";
    echo $miBici1->hazCaballito()."<br><hr>";
    
    
    echo  Vehiculo::getVehiculosCreados()."<br>";
    echo Vehiculo::getKmTotales()."<br>";
    

    


    ?>
</body>
</html>