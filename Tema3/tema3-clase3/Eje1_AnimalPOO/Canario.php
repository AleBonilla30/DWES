<?php
include_once 'Ave.php';
class Canario extends Ave {
    private $color;

    public function __construct($a, $b) {
        parent::__construct($a);

        if (isset($b)) {
            $this->color = $b;
        }else {
            $this->color = "amarillo";
        }
    }

    public function __toString(){
        return parent::__toString()."<br>Color: $this->color";
    }

    public function canta(){
        return "Tralaralariiiiiiii";
    }

    public function pia() {
        return "Pio pio pio";
    }

    public function caza() {
        return "Los canarios no cazan."; 
    }
}
?>