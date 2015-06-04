<?php
	//chama o arquivo de conexão com o bd
	include("conectar.php");
	$callback = $_REQUEST['callback'];
	$records = parse_str($_REQUEST['records'], $array);
	$id = $array['id'];
	 
	//consulta sql
	$query = sprintf("DELETE FROM contact WHERE id=%d",
		mysql_real_escape_string($id));
	$rs = mysql_query($query);
	header('Content-Type: text/javascript');
	 
	echo $callback . '(' .
	 json_encode(array(
		"success" => mysql_errno() == 0
	)) . ');';
?>