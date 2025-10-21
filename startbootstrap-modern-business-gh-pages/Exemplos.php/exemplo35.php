<?php

/* 🧩 O que é uma classe abstrata?

Em PHP, uma classe abstrata é uma classe que não pode ser instanciada diretamente — ou seja, não podes criar objetos dela com new.
É usada como modelo base para outras classes (filhas), definindo:
atributos e métodos comuns (já implementados);
e/ou métodos abstratos — que devem obrigatoriamente ser implementados pelas subclasse */


/* 🧠 Regras importantes:

Uma classe abstrata serve para fornecer uma estrutura (um “molde”) para outras classes.

Pode conter:

métodos normais (com código);
métodos abstratos (sem corpo, apenas a assinatura);
Não pode ser instanciada:  $obj = new Animal(); // ❌ Erro
É usada através de herança: class Cachorro extends Animal { ... } */

// Classe abstrata
abstract class Animal {
    protected $nome;

    public function __construct($nome) {
        $this->nome = $nome;
    }

    // Método comum (com implementação)
    public function dormir() {
        echo "{$this->nome} está a dormir... 💤<br>";
    }

    // Método abstrato (sem corpo — deve ser implementado pelas subclasses)
    abstract public function emitirSom();
}

// Classe filha que implementa o método abstrato
class Cachorro extends Animal {
    public function emitirSom() {
        echo "{$this->nome} diz: Au au! 🐶<br>";
    }
}

// Outra classe filha
class Gato extends Animal {
    public function emitirSom() {
        echo "{$this->nome} diz: Miau! 🐱<br>";
    }
}

// --- USO ---
$dog = new Cachorro("Rex");
$dog->emitirSom();
$dog->dormir();

$cat = new Gato("Mimi");
$cat->emitirSom();
$cat->dormir();


/* ✅ Vantagens das classes abstratas:
Vantagem	Explicação
🔧 Reutilização	Partilha métodos e atributos comuns entre subclasses.
🚦 Organização	Força uma estrutura consistente entre classes relacionadas.
🧱 Abstração	Esconde detalhes de implementação, expondo apenas o essencial.
🧩 Polimorfismo	Permite tratar diferentes subclasses como se fossem do mesmo tipo base. */

/* ⚙️ Exemplo de uso em projetos reais:

No Laravel, por exemplo, várias classes base como Controller ou Model são abstratas, 
   para obrigar os programadores a implementar métodos específicos em cada controlador ou modelo. */
?>