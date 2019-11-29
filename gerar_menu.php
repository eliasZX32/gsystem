<?php
	
	require("classes/class.php"); /* Retorna um array com a class para cada tipo de campo */
	require("base/acesso.php");
	require("tables/usuarios.php");

	$token = $_POST['token'];
	$usuario = "";
	$users_id = "";

	$consulta = $db->query("SELECT id, user, password, alias FROM users;");
	
	if(!$consulta)
	{
	  	die("Execute query error, because: ". print_r($db->errorInfo(),true) );
	}

	$tokenUser = "";
	while($row = $consulta->fetch(PDO::FETCH_ASSOC))
	{
		$tokenUser = md5( $row['user'] . $row['password'] . "-Zx32vb200");
		if($token === $tokenUser){
			$users_id  = $row['id'];
			$tokenUser = $row['user'];
			session_start();
			$_SESSION['alias'] = $row['alias'];;
			break;
		}
	}

	if ($tokenUser===""){
		return "";		
		die();
	}

	$html_cadastro  = "<nav class='navbar navbar-toggleable-md navbar-light' >";
    $html_cadastro  .= "	<button class='navbar-toggler navbar-toggler-right' type='button' data-toggle='collapse' data-target='#navbarNavDropdown' aria-controls='navbarNavDropdown' aria-expanded='false' aria-label='Toggle navigation'>";
    $html_cadastro  .= "    	<span class='navbar-toggler-icon'></span>";
    $html_cadastro  .= "	</button>";
    $html_cadastro  .= "	<a class='navbar-brand' href='#'>";
    $html_cadastro  .= "		<img src='img/logo.jpg' height='70' width='170'  alt=''>";
    $html_cadastro  .= "	</a>";    
    $html_cadastro  .= "	<div class='collapse navbar-collapse' id='navbarNavDropdown'>";
    $html_cadastro  .= "    	<ul class='navbar-nav'>";

    

	$sql = "select * from menu";
	$sql .= " where menu = 1";
	$sql .= " and nivel2 = 0"; // 
	$sql .= " and id in ( SELECT menu_id FROM user_menu WHERE users_id = {$users_id}) "; 
	$sql .= " order by nivel1, nivel2, nivel3, nivel4";

    $query = $db->query($sql);
    $result = $query->fetchall(PDO::FETCH_ASSOC);

	foreach($result as $row)
	{	
		$str = "abcdefghijlmopqrtuvxwz";
		$radom = substr(str_shuffle($str),1,5);

    	$open_function = "";
    	$id_item = "";
    	if( $row[ 'table_'] != "" ){
			$open_function = "onclick='open__(this, {$row['id']} );'";
			$id_item = "id='{$radom}{$row['table_']}'";
    	}

	    $html_cadastro  .= "<li class='nav-item'>";
			$html_cadastro  .= "<li class='nav-item dropdown'>";

			$sql = "select * from menu";
			$sql .= "	where menu = 1";
			$sql .= "	and nivel1 = " . $row[ 'nivel1' ] . ""; 
			$sql .= "	and nivel2 NOT IN (0) ";
			$sql .= "	and nivel3 IN (0)"; 
			$sql .= "	and id in ( SELECT menu_id FROM user_menu WHERE users_id = {$users_id}) "; 
			$sql .= "	order by nivel1, nivel2, nivel3, nivel4"; 

		    $query1 = $db->query($sql);
		    $result1 = $query1->fetchall(PDO::FETCH_ASSOC);

		    $count1 = count( $result1 );
		    if($count1>0){
		    	//echo "1=>" . $id_item;
				$html_cadastro  .= "<a class='nav-link dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false' {$open_function} {$id_item}>" . $row[ 'functionality' ] . "</a>"; //id='navbarDropdownMenuLink' 
			    	$html_cadastro  .= "<ul class='dropdown-menu' aria-labelledby='navbarDropdownMenuLink'>";					    
		    }else{
		    	//echo "2=>" . $id_item;
			    $html_cadastro  .= "<li class='nav-item' >";
			    	$html_cadastro  .= "<a class='nav-link' href='#' {$open_function} {$id_item} >" . $row[ 'functionality' ] . "</a>";
		    } 

			foreach($result1 as $row1)
			{	
				
					$sql = "select * from menu";
					$sql .= "	where menu = 1";
					$sql .= "	and nivel1 = " . $row1[ 'nivel1' ]; 
					$sql .= "	and nivel2 = " . $row1[ 'nivel2' ]; 
					$sql .= "	and nivel3 NOT IN ( 0 )"; 
					$sql .= "	and id in ( SELECT menu_id FROM user_menu WHERE users_id = {$users_id}) "; 
					$sql .= "	order by nivel1, nivel2, nivel3, nivel4";

				    $query2 = $db->query($sql);
				    $result2 = $query2->fetchall(PDO::FETCH_ASSOC);
				    $count2 = count( $result2 );
								    	
			    	$open_function = "";
			    	$id_item = "";
			    	if( $row1[ 'table_'] != "" ){
						$open_function = "onclick='open__(this, " . $row1['id'] .  " );'";
						$id_item = "id='{$radom}{$row1['table_']}'";
			    	}

		    		if( $count2 > 0){
		    			$html_cadastro  .= "<li><a class='dropdown-item dropdown-toggle' href='#' {$open_function} {$id_item}>".$row1[ 'functionality' ]."</a>";
		    			$html_cadastro  .= "<ul class='dropdown-menu'>";
		    		}else{
					    $html_cadastro  .= "<li class='nav-item' >";
					    $html_cadastro  .= "<a class='nav-link' href='#' {$open_function} {$id_item}>".$row1[ 'functionality' ]."</a>";

		    		}
				    
					foreach($result2 as $row2)
					{	
				    	$open_function = "";
				    	$id_item = "";
				    	if( $row2[ 'table_'] != "" ){
							$open_function = "onclick='open__(this, " . $row2['id'] . " );'";
							$id_item = "id='{$radom}{$row2['table_']}'";
				    	}						
				    	
				    	$html_cadastro  .= "<li><a class='dropdown-item' href='#' {$open_function} {$id_item} >".$row2[ 'functionality' ]."</a>";
			            $html_cadastro  .= "</li>";       
					}

					if($count2>0){
						$html_cadastro  .= "</ul>";
						$html_cadastro  .= "</li>";
					}else{
						$html_cadastro  .= "</li>";
					}									
			}
			if($count1>0){
			    $html_cadastro  .= "</ul>";
			    $html_cadastro  .= "</li>";
		    }else{
		    	$html_cadastro  .= "</li>";
		    }
    						
	    $html_cadastro  .= "</li>";
	}
    
    $html_cadastro  .= "    	</ul>";
    $html_cadastro  .= "	</div>";
	$html_cadastro  .= "</nav>";

	echo $html_cadastro;


	$html_cadastro  = "<nav class='navbar navbar-toggleable-md navbar-light'>";
    $html_cadastro  .= "<button class='navbar-toggler navbar-toggler-right' type='button' data-toggle='collapse' data-target='#navbarNavDropdown' aria-controls='navbarNavDropdown' aria-expanded='false' aria-label='Toggle navigation'>";
    $html_cadastro  .= "    <span class='navbar-toggler-icon'></span>";
    $html_cadastro  .= "</button>";
    $html_cadastro  .= "<a class='navbar-brand' href='#'>";
    $html_cadastro  .= "	<img src='img/logo.jpg' height='70' width='170'  alt=''>";
    $html_cadastro  .= "</a>";    
    $html_cadastro  .= "<div class='collapse navbar-collapse' id='navbarNavDropdown'>";
    $html_cadastro  .= "    <ul class='navbar-nav'>";
    $html_cadastro  .= "        <li class='nav-item active'>";
    $html_cadastro  .= "            <a class='nav-link' href='#'>Tabelas <span class='sr-only'>(current)</span></a>";
    $html_cadastro  .= "        </li>";
    $html_cadastro  .= "        <li class='nav-item'>";
    $html_cadastro  .= "            <a class='nav-link' href='#'>Pedidos</a>";
    $html_cadastro  .= "        </li>";
    $html_cadastro  .= "        <li class='nav-item'>";
    $html_cadastro  .= "            <a class='nav-link' href='#'>Relatorios</a>";
    $html_cadastro  .= "        </li>";
    $html_cadastro  .= "        <li class='nav-item dropdown'>";
    $html_cadastro  .= "            <a class='nav-link dropdown-toggle' href='https://bootstrapthemes.co' id='navbarDropdownMenuLink' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>Opcoes</a>";
    $html_cadastro  .= "            <ul class='dropdown-menu' aria-labelledby='navbarDropdownMenuLink'>";
    $html_cadastro  .= "                <li><a class='dropdown-item' href='#'>Ação 3</a></li>";
    $html_cadastro  .= "                <li><a class='dropdown-item' href='#'>Ação 2</a></li>";
    $html_cadastro  .= "                <li><a class='dropdown-item dropdown-toggle' href='#'>Submenu 1</a>";
    $html_cadastro  .= "                    <ul class='dropdown-menu'>";
    $html_cadastro  .= "                        <li><a class='dropdown-item' href='#'>Submenu ação 1</a></li>";
    $html_cadastro  .= "                        <li><a class='dropdown-item' href='#'>Submenu ação 2</a></li>";
    $html_cadastro  .= "                    </ul>";
    $html_cadastro  .= "                </li>";
    $html_cadastro  .= "                <li><a class='dropdown-item dropdown-toggle' href='#'>Submenu 2</a>";
    $html_cadastro  .= "                    <ul class='dropdown-menu'>";
    $html_cadastro  .= "                        <li><a class='dropdown-item' href='#'>Submenu ação 1</a></li>";
    $html_cadastro  .= "                        <li><a class='dropdown-item' href='#'>Submenu ação 2</a></li>";
    $html_cadastro  .= "                    </ul>";
    $html_cadastro  .= "                </li>";                    
    $html_cadastro  .= "            </ul>";
    $html_cadastro  .= "        </li>";
    $html_cadastro  .= "    </ul>";
    $html_cadastro  .= "</div>";