<?php
header ( 'Content-type: text/xml' ); // necessario encabeçar isso senao o extjs nao reconhece
                                     // connect to db
include ("../conectar.php");

// echo $_SERVER ['REQUEST_METHOD'];

switch ($_SERVER ['REQUEST_METHOD']) {
	case 'GET' :
		listaContatos ();
		break;
	
	case 'POST' :
		criaContato ();
		break;
	
	case 'PUT' :
		atualizaContato ();
		break;
	case 'DELETE' :
		deletaContato ();
		break;
}
function listaContatos() {
	
	// sql query
	$query = mysql_query ( "SELECT * FROM Contact" ) or die ( mysql_error () );
	// var_dump($query);
	// interates the result and creates an array with each row
	$xml = '<?xml version="1.0" encoding="iso-8859-1" ?>';
	$xml .= "<contatos>";
	$rows = array ();
	while ( $contato = mysql_fetch_assoc ( $query ) ) {
		
		$xml .= "<contato>";
		$xml .= "<id>" . $contato ['id'] . "</id>";
		$xml .= "<nome>" . $contato ['name'] . "</nome>";
		$xml .= "<email>" . $contato ['email'] . "</email>";
		$xml .= "</contato>";
	}
	
	$xml .= "</contatos>";
	// var_dump($rows);
	// envia resultado do XML
	echo $xml;
}
function criaContato() {
	$dom = new DOMDocument ();
	$dom->loadXML ( file_get_contents ( 'php://input' ) );
	
	$contatos = simplexml_import_dom ( $dom );
	
	// var_dump ( $contatos );
	$nome = $contatos->contato->name;
	$email = $contatos->contato->email;
	
	// sql query
	$query = sprintf ( "INSERT INTO Contact (name, email) VALUES ('%s', '%s')", mysql_real_escape_string ( $nome ), mysql_real_escape_string ( $email ) );
	
	$rs = mysql_query ( $query );
	
	// XML
	$xml = '<?xml version="1.0" encoding="iso-8859-1" ?>';
	$xml .= "<contatos>";
	$xml .= "<success>" . mysql_errno () == 0 . "</success>";
	
	$xml .= "<contato>";
	$xml .= "<id>" . mysql_insert_id () . "</id>";
	$xml .= "<nome>" . $nome . "</nome>";
	$xml .= "<email>" . $email . "</email>";
	$xml .= "</contato>";
	
	$xml .= "</contatos>";
	// var_dump($rows);
	// envia resultado do XML
	echo $xml;
}
function atualizaContato() {
	$dom = new DOMDocument ();
	$dom->loadXML ( file_get_contents ( 'php://input' ) );
	
	$contatos = simplexml_import_dom ( $dom );
	
	// var_dump ( $contatos );
	
	$nome = $contatos->contato->name;
	$email = $contatos->contato->email;
	$id = $contatos->contato->id;
	
	// sql query
	$query = sprintf ( "UPDATE Contact SET name = '%s', email = '%s' WHERE id = %d", mysql_real_escape_string ( $nome ), mysql_real_escape_string ( $email ), mysql_real_escape_string ( $id ) );
	
	$rs = mysql_query ( $query );
	
	// XML
	$xml = '<?xml version="1.0" encoding="iso-8859-1" ?>';
	$xml .= "<contatos>";
	
	$xml .= "<success>" . mysql_errno () == 0 . "</success>";
	
	$xml .= "</contatos>";
	// var_dump($rows);
	// envia resultado do XML
	echo $xml;
}
function deletaContato() {
	$dom = new DOMDocument ();
	$dom->loadXML ( file_get_contents ( 'php://input' ) );
	
	$contatos = simplexml_import_dom ( $dom );
	
	$id = $contatos->contato->id;
	
	// sql query
	// $query = "UPDATE Contact SET name = '".$nome."', email = '".$email."' WHERE ID = ".$id;
	
	$query = sprintf ( "DELETE FROM Contact WHERE id = %d", mysql_real_escape_string ( $id ) );
	
	$rs = mysql_query ( $query );
	
	// XML
	$xml = '<?xml version="1.0" encoding="iso-8859-1" ?>';
	$xml .= "<contatos>";
	$xml .= "<success>" . mysql_errno () == 0 . "</success>";
	
	$xml .= "</contatos>";
	// var_dump($rows);
	// envia resultado do XML
	echo $xml;
}
