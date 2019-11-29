<?php
	
	require("base/acesso.php");			

	if( isset($_REQUEST['id'] ) ){
		$id = strtolower($_REQUEST['id']);
	}else{
		echo "Id do menu invalido!";
	}

	$sql  = "select * from menu where id = {$id}";

    $query = $db->query($sql);
    $result = $query->fetchall(PDO::FETCH_ASSOC);

    echo json_encode($result);	