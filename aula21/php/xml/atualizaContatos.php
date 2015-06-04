<?php
header ( 'Content-type: text/xml' ); // necessario encabeçar isso senao o extjs nao reconhece
                                     // connect to db
include ("../conectar.php");

$dom = new DOMDocument();
$dom->loadXML(file_get_contents('php://input')); 

$contatos = simplexml_import_dom($dom);

//var_dump ( $contatos );

$nome = $contatos->contato->name;
$email = $contatos->contato->email;
$id = $contatos->contato->id;

// sql query
$query = sprintf( "UPDATE Contact SET name = '%s', email = '%s' WHERE id = %d",
		mysql_real_escape_string($nome),
		mysql_real_escape_string($email),
		mysql_real_escape_string($id));


$rs = mysql_query ( $query );

// XML
$xml = '<?xml version="1.0" encoding="iso-8859-1" ?>';
$xml .= "<contatos>";

$xml .="<success>". mysql_errno() == 0 ."</success>";

$xml .= "</contatos>";
// var_dump($rows);
// envia resultado do XML
echo $xml;
?>