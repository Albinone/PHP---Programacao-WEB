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
$accounts = $dom->getElementsByTagName(qualifiedName:"account");
foreach($accounts as $account){
    $name = $account->getAttribute('type');
    $id = $account->getAttribute('id');
    $url = $account->nodeValue;
    echo $name . " : " . $url . "<br>". "id " . $id;
}                                   

//write XML
//SimpleXMLElement

echo "<hr>";

$accounts2 = new SimpleXMLElement(data:'<?xml version="1.0" encoding="UTF-8"?><accounts></accounts>');
$accounts2->addChild(qualifiedName:'account', value:'https://www.x.com')->addAttribute(qualifiedName:'type', value:'X');
$accounts2->addChild(qualifiedName:'account', value:'https://www.facebook.com')->addAttribute(qualifiedName:'type', value:'facebook');
$accounts2->addChild(qualifiedName:'account', value:'https://www.instagram.com')->addAttribute(qualifiedName:'type', value:'instagram');
$accounts2->addChild(qualifiedName:'account', value:'https://www.linkedin.com')->addAttribute(qualifiedName:'type', value:'linkedin');
$accounts2->addChild(qualifiedName:'account', value:'https://www.github.com')->addAttribute(qualifiedName:'type', value:'github');//->addAttribute(qualifiedName:'id', value:'2');

$finalXML = $accounts2->asXML();
echo $finalXML;

echo "<hr>";




?>