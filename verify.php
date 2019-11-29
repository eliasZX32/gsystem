
<?php	
/*
 @author Elias Ribeiro - GSystem Info - www.gsystem.info
 @copyright Copyright (c) 2012, GSystem Info
 @version 1.0
 
 Gera um menu a partir da base de dados, filtrando os dados do usuário
 
 Utilização:
 echo loop_recursivo($array);
*/	
	if (!file_exists("base/acesso.php")) {
		echo "<h1>Arquivo não encontrado base/acesso.php!<h1>"; return 0;
	}
	require("base/acesso.php");

	set_time_limit(300);

	$token = $_POST['token'];
	$usuario = "";
	$consulta = $db->query("SELECT user, password FROM users;");
	
	if(!$consulta)
	{
	  die("Execute query error, because: ". print_r($db->errorInfo(),true) );
	}

	while($row = $consulta->fetch(PDO::FETCH_ASSOC))
	{
		$tokenUser = md5( $row['user'] . $row['password'] . "-Zx32vb200");
		if($token === $tokenUser){
			$token=$row['user'];
			$usuario=$row['password'];
			break;
		}
		$tokenUser = "";
	}

	if ($tokenUser===""){
		die();
	}
	
/*
	//$token = '303541';
	$consulta = $db->query("SELECT 
			ds_funcionalidade, url,
			SUBSTRING(indice,1,2) POS1,
			SUBSTRING(indice,3,3) POS2,
			SUBSTRING(indice,6,2) POS3,
			SUBSTRING(indice,8,2) POS4 
		FROM funcionalidades 
		WHERE 
			menu = 1     
		and SUBSTRING(indice,3,3) IN ('000') 
		and cd_funcionalidade 
			IN (
				SELECT cd_funcionalidade
				FROM usuario_funcionalidade a, usuarios b
				WHERE 
					a.cd_usuario = b.cd_usuario
					AND b.senha = '" . $token . "'
			)
		ORDER BY indice"
	);

	$sHTML = "<input id='usuario' value='" . $usuario ."' hidden>";
	while($row = $consulta->fetch(PDO::FETCH_ASSOC))
	{		

		$sHTML = $sHTML . "<ul><li><a href='". $row['url'] ."'>" . $row['ds_funcionalidade'] . "</a>";					
			$consulta1 = $db->query("SELECT 
						ds_funcionalidade, url,
						SUBSTRING(indice,1,2) POS1,
						SUBSTRING(indice,3,3) POS2,
						SUBSTRING(indice,6,2) POS3,
						SUBSTRING(indice,8,2) POS4 
					FROM funcionalidades
					WHERE 
						menu = 1
						and SUBSTRING(indice,1,2) = '" . $row['POS1'] . "'
						and SUBSTRING(indice,3,3) <> '000'
						and SUBSTRING(indice,6,2) = '00'
						and SUBSTRING(indice,8,2) = '00'
						and cd_funcionalidade 
							IN (
								SELECT cd_funcionalidade
								FROM usuario_funcionalidade a, usuarios b
								WHERE 
									a.cd_usuario = b.cd_usuario
									AND b.senha = '" . $token . "'
							)													
					ORDER BY indice"
			);

			$sHTML = $sHTML . "<ul>";
			while($row1 = $consulta1->fetch(PDO::FETCH_ASSOC))
			{

				$sHTML = $sHTML . "<li><a title='". $row1['url'] ."'>" .$row1['ds_funcionalidade']. "</a>";
					$consulta2 = $db->query("SELECT ds_funcionalidade, url
						FROM funcionalidades 
						WHERE menu = 1
						and SUBSTRING(indice,1,2) =	'" . $row1['POS1'] . "'
						and SUBSTRING(indice,3,3) = '" . $row1['POS2'] . "' 
						and SUBSTRING(indice,6,2) <> '00'
						and SUBSTRING(indice,8,2) = '00'
						and cd_funcionalidade 
							IN (
								SELECT cd_funcionalidade
								FROM usuario_funcionalidade a, usuarios b
								WHERE 
									a.cd_usuario = b.cd_usuario
									AND b.senha = '" . $token . "'
							)							
						ORDER BY indice"
					);
					$sHTML = $sHTML . "<ul>";
					while($row2 = $consulta2->fetch(PDO::FETCH_ASSOC))
					{
						$sHTML = $sHTML . "<li><a  title='". $row2['url'] ."'>" .$row2['ds_funcionalidade']. "</a>";
					}	
					$sHTML = $sHTML . "</li></ul>";				
			}
			$sHTML = $sHTML . "</li></ul>";
		$sHTML = $sHTML . "</li></ul>";
	}

	echo $sHTML;
*/	
