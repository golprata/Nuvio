<?php

// connect to db
include ("../conectar.php");

$info = $_POST['contatos'];

$data = json_decode(stripslashes($info));


$id = $data->id;

// sql query
// $query = "UPDATE Contact SET name = '".$nome."', email = '".$email."' WHERE ID = ".$id;

$query = sprintf( "DELETE FROM Contact WHERE id = %d",
		mysql_real_escape_string($id));

$rs = mysql_query($query);

// JSON
echo json_encode (array(
		"success" => mysql_errno() == 0		
) );
?>