
<?php	
/*
 @author Elias Ribeiro - GSystem Info - www.gsystem.info
 @copyright Copyright (c) 2012, GSystem Info
 @version 1.0
 @13/04/2018 @13/04/2018 - Elias

 Gera token do usuário
 
 Utilização:
 echo loop_recursivo($array);
*/	
	require("base/acesso.php");

	$user = $_POST['user'];
	$password = $_POST['password'];

//echo "SELECT user, password FROM users WHERE UPPER(user) = '" . strtoupper($user) . "' AND UPPER(password) = '" . strtoupper($password) ."';";

	$consulta = $db->query("SELECT user, password FROM users WHERE UPPER(user) = '" . strtoupper($user) . "' AND UPPER(password) = '" . strtoupper($password) ."';");

	while($row = $consulta->fetch(PDO::FETCH_ASSOC))
	{
		echo md5( $row['user'] . $row['password'] . "-Zx32vb200");
		die();
	}	
	echo "não";
