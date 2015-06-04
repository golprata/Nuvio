<?php
// connect to db
include ("../conectar.php");

$info = $_POST['contatos'];

$data = json_decode(stripslashes($info));
var_dump($data);
$nome = $data->name;
$email = $data->email;

// sql query
$query = sprintf( "INSERT INTO Contact (name, email) VALUES ('%s', '%s')",
		mysql_real_escape_string($nome),
		mysql_real_escape_string($email));
		
$rs = mysql_query($query);

// JSON
echo json_encode ( array(
		"success" => mysql_errno() == 0,
		"contatos" => array(
				"id" => mysql_insert_id(),
				"name" => $nome,
				"email" => $email
		)
) );
?>