<?php


interface CoffeeMachine{
    public function Ligar();
    public function fazerCafe();
    public function Desligar();
   
}

class Nespresso implements CoffeeMachine{
    public $modelo = "Inissia";
    public $cor = "Branco";
    public $preco = 99.00;

    public function Ligar(){
        echo " A ligar a máquina de café ";
    }

    public function fazerCafe(){
        echo " A preparar o café ";
    }

    public function Desligar(){
        echo " A desligar a máquina de café ";
    }

    public function Limpar(){
        echo " A limpar a máquina de café ";
    }

      public function chamatudo(){
        $this->Ligar();
        echo "<br>";
        $this->fazerCafe();
        echo "<br>";
        $this->Desligar();
        echo "<br>";
        $this->Limpar();
    }

}


$MinhaMaquina = new Nespresso();
$MinhaMaquina->Ligar();
$MinhaMaquina->fazerCafe();
$MinhaMaquina->Desligar();
$MinhaMaquina->Limpar();
echo "<br>";
echo "<hr>";
$MinhaMaquina->chamatudo();
echo "<hr>";




























?>