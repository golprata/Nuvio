<?php


$json = '	[
		{"id":1,"nome":"Fabiano","email":"fabiano@hotmail.com"},
		{"id":2,"nome":"Leonor","email":"Leonor@hotmail.com"},
		{"id":3,"nome":"Carlos","email":"Carlos@hotmail.com"}
	]';


	//echo $json;
	//$array = json_decode($json);
	

	if ($_SERVER['REQUEST_METHOD'] == 'GET'){
		echo 'Foi um GET';

	}
	else if ($_SERVER['REQUEST_METHOD'] == 'DELETE'){
		echo 'Foi um DELETE';
	}
	else if ($_SERVER['REQUEST_METHOD'] == 'PUT'){
		echo 'Foi um PUT';
		//var_dump($_REQUEST);
	}
	else if ($_SERVER['REQUEST_METHOD'] == 'POST'){
		echo 'Foi um POST';
		//echo $_REQUEST['nome'];
	}
	else{echo "foi nada nao!!!";}