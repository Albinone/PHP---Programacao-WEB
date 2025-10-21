<?php

interface Eletrico {
    public function carregarBateria();
}

abstract class Veiculo {
    protected $marca;

    public function __construct($marca)
    { $this->marca = $marca; }
    
    abstract public function mover();
}

class CarroEletrico extends Veiculo implements Eletrico {
    public function mover() {
        echo "{$this->marca} está a mover-se silenciosamente ⚡<br>";
    }

    public function carregarBateria() {
        echo "{$this->marca} está a carregar a bateria 🔋<br>";
    }
}

$tesla = new CarroEletrico("Tesla");
$tesla->carregarBateria();
$tesla->mover();