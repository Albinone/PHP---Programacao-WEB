<?php
//um trait em PHP — um conceito muito útil quando queres reutilizar código entre várias classes sem usar herança múltipla
// (que o PHP não permite).

/* 🧩 O que é um trait?

Um trait é um mecanismo de reutilização de código em PHP.
Permite definir métodos e propriedades que podem ser incluídos (“injetados”) em várias classes.

👉 Podes pensar num trait como um “bloco de funcionalidades reutilizáveis” que pode ser adicionado a qualquer classe.
 */
/* 
🧠 Porquê usar traits?

O PHP não suporta herança múltipla (class A extends B, C → ❌).

Com traits, consegues partilhar código comum entre classes diferentes sem precisar de herança- */


// Definição de um trait
trait Loggable {
    public function log($mensagem) {
        echo "[LOG]: " . $mensagem . "<br>";
    }
}

// Outra funcionalidade comum
trait Timestampable {
    public function agora() {
        return date('Y-m-d H:i:s');
    }
}

// Classe que usa os traits
class Usuario {
    use Loggable, Timestampable;

    private $nome;

    public function __construct($nome) {
        $this->nome = $nome;
        $this->log("Novo utilizador criado: {$this->nome} em " . $this->agora());
    }
}

// Outra classe que também reutiliza os mesmos traits
class Pedido {
    use Loggable, Timestampable;

    public function criar($id) {
        $this->log("Pedido #{$id} criado em " . $this->agora());
    }
}

// --- USO ---
$user = new Usuario("Paula");
$pedido = new Pedido();
$pedido->criar(101);

?>