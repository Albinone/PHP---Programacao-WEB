<?php

class Veiculo {
    protected $marca;
    protected $modelo;

    public function setMarca($marca) {
        $this->marca = $marca;
        return $this; // devolve o próprio objeto
    }

    public function setModelo($modelo) {
        $this->modelo = $modelo;
        return $this;
    }

    public function mostrarInfo() {
        echo "Veículo: {$this->marca} {$this->modelo}<br>";
        return $this;
    }
}

// 🚗 Classe filha que herda de Veiculo
class Carro extends Veiculo {
    private $cor;

    public function setCor($cor) {
        $this->cor = $cor;
        return $this;
    }

    // sobrescreve o método pai (polimorfismo)
    public function mostrarInfo() {
        echo "Carro: {$this->marca} {$this->modelo} ({$this->cor})<br>";
        return $this;
    }
}

// 🏍️ Outra classe filha
class Moto extends Veiculo {
    private $cilindrada;

    public function setCilindrada($cilindrada) {
        $this->cilindrada = $cilindrada;
        return $this;
    }

    public function mostrarInfo() {
        echo "Moto: {$this->marca} {$this->modelo} - {$this->cilindrada}cc<br>";
        return $this;
    }
}

// --- USO ---
$carro = (new Carro())
    ->setMarca("Tesla")
    ->setModelo("Model 3")
    ->setCor("Vermelho")
    ->mostrarInfo();

$moto = (new Moto())
    ->setMarca("Yamaha")
    ->setModelo("MT-07")
    ->setCilindrada(689)
    ->mostrarInfo();


//     ✅ Vantagens com herança:

// O method chaining é herdado automaticamente se a classe-pai já retorna $this.
// Cada subclasse pode expandir o encadeamento com métodos próprios (setCor, setCilindrada).
// Código mais coeso e reutilizável.

?>