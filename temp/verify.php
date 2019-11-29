
<?php	
/*
 @author Elias Ribeiro - GSystem Info - www.gsystem.info
 @copyright Copyright (c) 2012, GSystem Info
 @version 1.0
 
 Gera um menu a partir da base de dados, filtrando os dados do usuário
 
 Utilização:
 echo loop_recursivo($array);
*/	
	require("base/acesso.php");

	set_time_limit(300);

	//$token = "5d61a654d808cf77b8fd627b6aea0d7a";//$_POST['token'];
	$token = "7e6c3f779cfc724a392e4e2d7da3b94a";
	//$usuario = "admin";
	$consulta = $db->query("SELECT id, nome, senha FROM usuarios;");
	
	if(!$consulta)
	{
	  die("Execute query error, because: ". print_r($db->errorInfo(),true) );
	}

	while($row = $consulta->fetch(PDO::FETCH_ASSOC))
	{
	 	$tokenUser = md5( $row['nome'] . $row['senha'] . "-Zx32vb200");
	 	//echo "  ".$tokenUser. " - " . $row['senha'];
	 	if($token === $tokenUser){
	 		$id=$row['id'];
	 		$usuario=$row['nome'];
	 		break;
	 	}
	 	$tokenUser = "";
	}

	if ($tokenUser===""){
	 	die();
	}

	//$token = '303541';
	echo $id;
	$consulta = $db->query("SELECT 
			ds_funcionalidade, 
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
					AND b.id = '{$id}'
			)
		ORDER BY indice"
	);


	$sHTML = "<input id='usuario_nome' value='{$usuario} hidden>";
	$sHTML = "<input id='usuario_id' value='{$id}' hidden>";

	$sHTML = $sHTML . "\n<nav class='navbar navbar-expand-md fixed-top navbar-dark bg-dark'>";
	$sHTML = $sHTML . "\n		<div class='navbar-collapse offcanvas-collapse' id='navbarsExampleDefault'>";
	$sHTML = $sHTML . "\n			<ul class='navbar-nav mr-auto'>";


	while($row = $consulta->fetch(PDO::FETCH_ASSOC))
	{		
		$sHTML = $sHTML . "\n				<li class='nav-item dropdown'>";
		$sHTML = $sHTML . "\n					<a class='nav-link dropdown-toggle' href='http://example.com' id='dropdown01' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>" . $row['ds_funcionalidade'] . "</a>";

		$consulta1 = $db->query("SELECT 
					ds_funcionalidade, 
					SUBSTRING(indice,1,2) POS1,
					SUBSTRING(indice,3,3) POS2,
					SUBSTRING(indice,6,2) POS3,
					SUBSTRING(indice,8,2) POS4 
				FROM funcionalidades
				WHERE 
					menu = 1
					and SUBSTRING(indice,1,2) = '{$row['POS1']}'
					and SUBSTRING(indice,3,3) <> '000'
					and SUBSTRING(indice,6,2) = '00'
					and SUBSTRING(indice,8,2) = '00'
					and cd_funcionalidade 
						IN (
							SELECT cd_funcionalidade
							FROM usuario_funcionalidade a, usuarios b
							WHERE 
									a.cd_usuario = b.cd_usuario
								AND b.id = '{$id}'
						)													
				ORDER BY indice"
		);

		while($row1 = $consulta1->fetch(PDO::FETCH_ASSOC))
		{
			$sHTML = $sHTML . "\n					<a class='dropdown-item' href='#'>" . $row1['ds_funcionalidade'] . "</a>";
		
			$consulta2 = $db->query("SELECT ds_funcionalidade
				FROM funcionalidades 
				WHERE menu = 1
					and SUBSTRING(indice,1,2) =	'{$row1['POS1']}'
					and SUBSTRING(indice,3,3) = '{$row1['POS2']}' 
					and SUBSTRING(indice,6,2) <> '00'
					and SUBSTRING(indice,8,2) = '00'
					and cd_funcionalidade 
						IN (
							SELECT cd_funcionalidade
							FROM usuario_funcionalidade a, usuarios b
							WHERE 
								a.cd_usuario = b.cd_usuario
							AND b.id = '{$id}'
					)							
				ORDER BY indice"
			);

			while($row2 = $consulta2->fetch(PDO::FETCH_ASSOC))
			{
				$sHTML = $sHTML . "\n						<a class='dropdown-item' href='#'>" . $row2['ds_funcionalidade'] . "</a>";
			}

		}
		$sHTML = $sHTML . "\n			</li>";


	}
	$sHTML = $sHTML . "\n			</ul>";
	$sHTML = $sHTML . "\n		</div>";
	$sHTML = $sHTML . "\n</nav>";

	echo $sHTML;
