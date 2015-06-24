<?php

// connect to db
include ("../conectar.php");

//echo $_SERVER ['REQUEST_METHOD'];

switch ($_SERVER ['REQUEST_METHOD']) {
	case 'GET' :
		listaContatos ();
		break;
	
	case 'POST' :
		criaContato();
		break;
	
	case 'PUT' :
		atualizaContato();
		break;
	case 'DELETE' :
		deletaContato();
		break;
}


function listaContatos() {
	
	// sql query
	$query = mysql_query ( "SELECT * FROM Contact" ) or die ( mysql_error () );
	
	// interates the result and creates an array with each row
	$rows = array ();
	while ( $contact = mysql_fetch_assoc ( $query ) ) {
		$rows [] = $contact;
	}
	// JSON
	echo json_encode ( $rows );
}
function criaContato() {
	$info = $_POST ['contatos'];
	
	$data = json_decode ( stripslashes ( $info ) );
	var_dump ( $data );
	$nome = $data->name;
	$email = $data->email;
	
// 	// sql query
// 	$query = sprintf ( "INSERT INTO Contact (name, email) VALUES ('%s', '%s')", mysql_real_escape_string ( $nome ), mysql_real_escape_string ( $email ) );
	
// 	$rs = mysql_query ( $query );
	
// 	// JSON
// 	echo json_encode ( array (
// 			"success" => mysql_errno () == 0,
// 			"contatos" => array (
// 					"id" => mysql_insert_id (),
// 					"name" => $nome,
// 					"email" => $email 
// 			) 
// 	) );
$_SESSION['user'] = $nome;
}
function atualizaContato() {
	parse_str ( file_get_contents ( "php://input" ), $post_vars );
	
	$info = $post_vars ['contatos'];
	
	$data = json_decode ( stripslashes ( $info ) );
	
	// var_dump($data);
	
	$nome = $data->name;
	$email = $data->email;
	$id = $data->id;
	
	// sql query
	// $query = "UPDATE Contact SET name = '".$nome."', email = '".$email."' WHERE ID = ".$id;
	
	$query = sprintf ( "UPDATE Contact SET name = '%s', email = '%s' WHERE id = %d", mysql_real_escape_string ( $nome ), mysql_real_escape_string ( $email ), mysql_real_escape_string ( $id ) );
	
	$rs = mysql_query ( $query );
	
	// JSON
	echo json_encode ( array (
			"success" => mysql_errno () == 0 
	) );
}
function deletaContato() {
	parse_str ( file_get_contents ( "php://input" ), $post_vars );
	
	$info = $post_vars ['contatos'];
	
	$data = json_decode ( stripslashes ( $info ) );
	
	$id = $data->id;
	
	// sql query
	// $query = "UPDATE Contact SET name = '".$nome."', email = '".$email."' WHERE ID = ".$id;
	
	$query = sprintf ( "DELETE FROM Contact WHERE id = %d", mysql_real_escape_string ( $id ) );
	
	$rs = mysql_query ( $query );
	
	// JSON
	echo json_encode ( array (
			"success" => mysql_errno () == 0 
	) );
}

?>