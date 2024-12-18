<?php

include_once 'Animal.php';

class Lagarto extends Animal{
    public function tomaElSol(){
        return "Estoy tomando el sol.";
    }

    public function baniate(){
        return "Me estoy dando un chapuzón";
    }

    public function escondete(){
        return "Me he escondido, ya no me puedes ver";
    }
}

?>