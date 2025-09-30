<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

    //criar a classe
    class Pessoa {
        // criar as propriedades - variaveis "agarradas" aos objetos
        public $primeironome;
        public $ultimonome;
        public $idade;

        // atribuir os valores às propridades das variaveis
        public function __construct($primeironome,$ultimonome,$idade)
        {
            $this->primeironome = $primeironome;
            $this->ultimonome = $ultimonome;
            $this->idade = $idade;   
        } 
        
        //criar método
        public function hello()
        {
            return "Eu sou " . $this->primeironome ." " . $this->ultimonome . " e tenho " . $this->idade ." idade."; 
        }

          public function adeus()
        {
            return "Olá " . $this->primeironome ." a aula terminou. Podes ir para casa."; 
        }

             public function adeus2()
        {
            return "Olá " . $this->primeironome ." a aula não terminou. Não Podes ir para casa."; 
        }

    }

//criar uma nova pessoa de nome "Amelia Silva" com 25 anos de idade.
$pessoa1 = new Pessoa('Amelia','Silva',25);
$pessoa2 = new Pessoa("João","Silva",30);

echo $pessoa1->hello();
echo "<br>";
echo $pessoa1->adeus();
echo "<br>";
echo $pessoa1->adeus2();
echo "<br>";
echo "<br>";
echo $pessoa2->hello();
echo "<br>";
echo $pessoa2->adeus();
echo "<br>";
echo $pessoa2->adeus2();
    ?>
</body>
</html>