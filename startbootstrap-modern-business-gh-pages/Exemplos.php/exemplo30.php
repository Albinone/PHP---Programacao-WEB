<?php

Class Loja{

    public $nome;
    public static $taxaIVA = 23;

    public function __construct($nomeLoja){
        $this->nome = $nomeLoja;
    }
    
    public function mostraInfo(){
        echo "Loja: " .$this->nome . "<br>";
        echo "IVA atual:" . self::$taxaIVA ."%<br>"; 
    }

    public static function atualizaIVA($novoIVA){
        self::$taxaIVA = $novoIVA;
    }

      public static function atualizaIVA1($novoIVA1){
        self::$taxaIVA = $novoIVA1;
    }
}

//criação das lojas
$loja1 = new Loja("VilaFrancaInfor");
$loja1->mostraInfo();

$loja2 = new Loja("BenaventeCityInfor");
$loja2->mostraInfo();

//atualizar o IVA para 21%
$loja1::atualizaIVA(21);
$loja2::atualizaIVA1(23);

//mostrar após atualização
echo "<hr>";
$loja1 = new Loja("VilaFrancaInfor");
$loja1->mostraInfo();

echo "<hr>";
$loja2 = new Loja("BenaventeCityInfor");
$loja2->mostraInfo();
?>

