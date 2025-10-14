<?php


//class

Class Car{
    public function Drive(){
        echo "Driving";
    }
}

Class ElectricCar extends Car{
    public function epcu(){
        echo "I am the Electric Car Power Control Unit";
    }
}

class Tesla extends ElectricCar{
    public function autoPilot(){
        echo "I am the Tesla autopilot";
    }
}

$carro = new Car();
$carro->Drive();
echo "<hr>";

$carroEletrico = new ElectricCar();
$carroEletrico->Drive();
echo "<br>";
$carroEletrico->epcu();
echo "<hr>";
$carroTesla = new Tesla();
$carroTesla->Drive();   
echo "<br>";
$carroTesla->epcu();
echo "<br>";
$carroTesla->autoPilot();
echo "<hr>";







?>