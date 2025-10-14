<?php

if(isset($_POST['nome'])){
       echo "Olá, " . $_POST['nome'] . ".<br>";
}else {
    echo "Não preencheu o formulário!";
}



?>
