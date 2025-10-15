<?php

class Loja
{

    public $nome;
    public $taxaIVA = 23; // agora é uma propriedade normal (não static)

    public function __construct($nomeLoja)
    {
        $this->nome = $nomeLoja;
    }

    public function mostraInfo()
    {
        echo "Loja: " . $this->nome . "<br>";
        echo "IVA atual: " . $this->taxaIVA . "%<br>";
    }

    public function atualizaIVA($novoIVA)
    {
        $this->taxaIVA = $novoIVA; // afeta apenas este objeto
    }
}

// Criação das lojas
$loja1 = new Loja("VilaFrancaInfor");
$loja2 = new Loja("BenaventeCityInfor");

$loja1->mostraInfo();
$loja2->mostraInfo();

// Atualizar o IVA apenas da loja1
$loja1->atualizaIVA(21);

echo "<hr>";
$loja1->mostraInfo();

echo "<hr>";
$loja2->mostraInfo();
