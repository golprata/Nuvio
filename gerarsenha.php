<?php

if (isset($_GET['pass'])) {
	$senha = @md5($_GET['pass']);
	echo $senha;
}else
	echo 'Informe a senha! ex: gerasenha.php?pass=senha';
	unset($_GET);
