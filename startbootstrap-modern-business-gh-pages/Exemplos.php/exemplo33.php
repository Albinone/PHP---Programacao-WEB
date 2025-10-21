<?php

//método chaining

//✅ Vantagens:

// Código mais limpo e legível.
// Menos variáveis intermédias.
// Muito usado em frameworks e ORMs (como Laravel, Eloquent, Doctrine).

 

class Carro {
    private $marca;
    private $modelo;
    private $cor;

    public function setMarca($marca) {
        $this->marca = $marca;
        return $this; // devolve o próprio objeto
    }

    public function setModelo($modelo) {
        $this->modelo = $modelo;
        return $this;
    }

    public function setCor($cor) {
        $this->cor = $cor;
        return $this;
    }

    public function mostrarInfo() {
        echo "Carro: {$this->marca} {$this->modelo} ({$this->cor})<br>";
    }
}

// 🏎️ Criar e configurar o carro usando method chaining:
$carro = new Carro();
$carro->setMarca("Toyota")
      ->setModelo("Corolla")
      ->setCor("Preto")
      ->mostrarInfo();


?>