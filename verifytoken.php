
<?php	
/*
 @author Elias Ribeiro - GSystem Info - www.gsystem.info
 @copyright Copyright (c) 2012, GSystem Info
 @version 1.0
 
 Gera um menu a partir da base de dados, filtrando os dados do usuário
 
 Utilização:
 echo loop_recursivo($array);
*/	
	require("base\acesso.php");

	$token = $_POST['token'];	
	
	$consulta = $db->query("SELECT user, password FROM users");

	while($row = $consulta->fetch(PDO::FETCH_ASSOC))
	{
		$tokenUser = md5( $row['user'] . $row['password'] . "-Zx32vb200");
		if($token === $tokenUser){
			break;
		}
		$tokenUser = "";
	}
	echo $tokenUser;
