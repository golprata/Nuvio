<?php
// connect to db
include ("conectar.php");

// sql query
$query = mysql_query ( "SELECT * FROM contato" ) or die ( mysql_error () );

// interates the result and creates an array with each row
$rows = array ();
while ( $contato = mysql_fetch_assoc ( $query ) ) {
	$rows [] = $contato;
}
// JSON
echo json_encode ( $rows );
?>