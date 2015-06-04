<?php
header ('Content-type: text/xml' ); // necessario encabeçar isso senao o extjs nao reconhece
                                     // connect to db
include ("../conectar.php");

$dom = new DOMDocument();
$dom->loadXML(file_get_contents('php://input')); 

$contatos = simplexml_import_dom($dom);

//var_dump ( $contatos );
$nome = $contatos->contato->name;
$email = $contatos->contato->email;


// sql query
$query = sprintf ( "INSERT INTO Contact (name, email) VALUES ('%s', '%s')", 
		mysql_real_escape_string ( $nome ), 
		mysql_real_escape_string ( $email ) );

$rs = mysql_query ( $query );

// XML
$xml = '<?xml version="1.0" encoding="iso-8859-1" ?>';
$xml .= "<contatos>";
$xml .="<success>". mysql_errno() == 0 ."</success>";

	
	$xml .= "<contato>";
	$xml .= "<id>" . mysql_insert_id() . "</id>";
	$xml .= "<nome>" . $nome . "</nome>";
	$xml .= "<email>" . $email . "</email>";
	$xml .= "</contato>";


$xml .= "</contatos>";
// var_dump($rows);
// envia resultado do XML
echo $xml;
?>