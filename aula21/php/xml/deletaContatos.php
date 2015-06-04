<?php
header ( 'Content-type: text/xml' ); // necessario encabeçar isso senao o extjs nao reconhece
                                     // connect to db
include ("../conectar.php");

$dom = new DOMDocument();
$dom->loadXML(file_get_contents('php://input')); 

$contatos = simplexml_import_dom($dom);


$id = $contatos->contato->id;

// sql query
// $query = "UPDATE Contact SET name = '".$nome."', email = '".$email."' WHERE ID = ".$id;

$query = sprintf( "DELETE FROM Contact WHERE id = %d",
		mysql_real_escape_string($id));

$rs = mysql_query($query);

// XML
$xml = '<?xml version="1.0" encoding="iso-8859-1" ?>';
$xml .= "<contatos>";
$xml .="<success>". mysql_errno() == 0 ."</success>";

$xml .= "</contatos>";
// var_dump($rows);
// envia resultado do XML
echo $xml;
?>