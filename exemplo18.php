<?php

//XML

//read XML
    //DOMDocument (big files)    //SimpleXMLElement (small files )

$xml = '<?xml version="1.0" encoding="UTF-8"?>
<accounts>
    <account type="X">https://www.x.com</account>
    <account type="facebook">https://www.facebook.com</account>
    <account type="instagram">https://www.instagram.com</account>
    <account type="linkedin">https://www.linkedin.com</account>
    <account type="github" id="2">https://www.github.com</account>
</accounts>';

//DOMDocument
$dom = new DOMDocument();
$dom->loadXML($xml);
$accounts = $dom->getElementsByTagName(qualifiedName:'account');

foreach($accounts as $account){
    $name = $account->getAttribute('type');
    $id = $account->getAttribute('id');
    $url = $account->nodeValue;
    echo $name . " : " . $url . "<br>". "id " . $id;
}                                   



?>