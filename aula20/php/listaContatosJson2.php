<?php
//chama o arquivo de conexão com o bd
include("conectar.php");
 
//consulta sql
$query = mysql_query("SELECT * FROM Contact") or die(mysql_error());
 
//faz um looping e cria um array com os campos da consulta
$rows = array('contatos' => array());
while($contato = mysql_fetch_assoc($query)) {
    $rows['contatos'][] = $contato;
}
//encoda para formato JSON
echo json_encode($rows);
?>