<?php

Class Human{
    private $name = "João";

    public function sayHello(){
        echo "Olá " . $this->name;
        echo "<hr>";
    }

    public function sayGoodbye(){
        echo "Adeus " . $this->name;
        echo "<hr>";
}
}
$humano = new Human();
$humano->sayHello();
$humano->sayGoodbye();

echo "<br>";

//self

Class StaticHuman{
    private static $name = "Carlos";

    public static function sayHello(){
        echo "Olá " . self::$name;
        echo "<hr>";
    }

    public static function sayGoodbye(){
        echo "Adeus " .self::$name;
        echo "<hr>";
}
}
StaticHuman::sayHello();
StaticHuman::sayGoodbye();

echo "<br>";



?> 
