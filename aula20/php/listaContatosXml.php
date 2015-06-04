<?php
header('Content-type: text/xml');  // necessario encabeçar isso senao o extjs nao reconhece
//connect to db
include("conectar.php");
 
//sql query
$query = mysql_query("SELECT * FROM Contact") or die(mysql_error());
//var_dump($query);
//interates the result and creates an array with each row
$xml = '<?xml version="1.0" encoding="iso-8859-1" ?>';
$xml.="<contatos>";
$rows = array();
while($contato = mysql_fetch_assoc($query)) {
	
    $xml.=   "<contato>";
    $xml.=      "<id>" . $contato['ID'] . "</id>";
    $xml.=      "<nome>" . $contato['name'] . "</nome>";
    $xml.=      "<email>" . $contato['email'] . "</email>";
    $xml.=   "</contato>";
}  

$xml.="</contatos>";
//var_dump($rows);      
//envia resultado do XML
echo $xml;
?>