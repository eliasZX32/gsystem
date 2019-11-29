<?php
	/* Verifica de existe o arquivo de Acesso */
	if (!file_exists("base/acesso.php")) {
		echo "<h1>Arquivo não encontrado base/acesso.php!<h1>"; return 0;
	}
	/* Acessa a base de dados */
	require("base/acesso.php");

	/* Pega os dados do formulario */
	$save_table = $_POST;

    /* Percorre o primeiro dado pegando o nome da tabela */
    $table = "";    

	foreach( $_POST as $key => $value) {
	    $key = split("ççç", $key);
	    if($table == ""){
		    $table = $key[0]; /* Nome da tabela */
	    }
	    break;
	}

    /* Verifica se existe um arquivo com a estrutura json para a tabela no diretório tables*/ 
	if (!file_exists("tables/{$table}.php")) {
		/* Verifica se existe um arquivo com a estrutura json para a tabela no diretório system*/
		if (!file_exists("system/{$table}.php")) {
			echo "<h1>Arquivo não encontrado {$table}.php!<h1>"; return 0;
		}else{
			require("system/{$table}.php");
		}		
	}else{
		require("tables/{$table}.php");
	}
    
    /* Verifica se existe o arquivo mount_structures_table.php usado para montar a estrutura do grid */
	if (!file_exists("mount_structures_table.php")) {
		echo "<h1>Arquivo não encontrado mount_structures_table.php!<h1>"; return 0;
	}
 	require("mount_structures_table.php");

	session_start();

	/* pega a data atual no banco de dados */ 
    $query = $db->query("select now() hour_time;");
    $date_now = $query->fetchall(PDO::FETCH_ASSOC);

 	$delete_update = "";
 	$field_date_now_upd = array();
 	$user_update = "";

	foreach( $struct as $field ){
		if( array_key_exists( "delete" , $field) ){
			if( strtolower( $field['delete'] ) == "no"){
				$delete_update =$field['Field'];
			}
		}
		if(array_key_exists( "date_update" , $field)){
			$field_date_now_upd = "{$field['Field']} = '{$date_now[0]['hour_time']}',";
		}
		if(array_key_exists( "user_update" , $field)){
			$user_update = "{$field['Field']} = '{$_SESSION['alias']}',";
		}		
	}

	/* verifica se existe a tabela na base dados */
	$struct = $db->query("SHOW TABLES LIKE '{$table}'" )->rowCount();
	if( $struct > 0){
		
		/* Filtra o indice primario da tabela */
		$sql = "SHOW INDEX FROM {$table} WHERE Key_name = 'PRIMARY' ";
    	$query = $db->query($sql);
    	$index = $query->fetchall(PDO::FETCH_ASSOC);

    	/* carrega os campos do indice primario */
		$field_index = "";
    	foreach( $index as $field_struct ){
    		$field_index .= $field_struct['Column_name'] . '||';    		
    	}

    	/* */
    	if( $field_index =='' ){ 
	    	echo "<h1>Tabela ( {$table} ) não tem um indice primario!<h1>"; return 0;
    	}

        /* cria um array com os campos do indice primario */
		$field_index = explode( "||", $field_index);

		/* Cria um array com os tipos do banco de dados */	    	
    	$type_names=['BIT', 'TINYINT', 'BOOL', 'BOOLEAN', 'SMALLINT', 'MEDIUMINT', 'INT', 'INTEGER', 
    				'BIGINT', 'FLOAT', 'DOUBLE', 'DOUBLE PRECISION', 'DECIMAL', 'DEC'];

    	/* Inicializa as variaveis */			
    	$where = "";
    	$aspas = "'";

    	/* Percorre o indice para criar a clausula WHERE para atualização */
    	foreach( $index as $field_struct ){
    		/* cria uma variavel para comparar com os campos do formulário, a partir da estrutura da tabela */
    		$field = $table . 'ççç' . strtolower( $field_struct['Column_name'] ) . '_';

    		/* Existe no vornulario */
			if(array_key_exists( "{$field}" , $save_table)){
				/* Faz parte do indice */
				if( in_array( $field_struct['Column_name'], $field_index ) ){
					$set = explode ( '(' , $field_struct['Index_type'] );
					$set = strtoupper($set[0]);	
					/* Verifica o tipo, se for numerico, não poe aspas */				
					if( in_array( $set, $type_names) ){
						$where = $where . $field_struct['Column_name'] . " = {$save_table[$field]} AND ";
					}else{
						/* se não, poe aspas simples */
						$where = $where . $field_struct['Column_name'] . " = {$aspas}{$save_table[$field]}{$aspas} AND ";
					}
				}				
			}    		
    	}

    	/* Se consegui fazer a clausula where tira o END do final */
    	if( $where!='' ){ 
    		$where = substr($where,0,strlen($where)-4); 
    	}else{
    		/* se não, da uma mensagem de erro */
	    	echo "<h1>Tabela ( {$table} ) não possivel criar a clausula WHERE!<h1>"; return 0;
    	}

    }else{
    	echo "<h1>Tabela ( {$table} ) não encontrado base !<h1>"; return 0;
    }

 	if($delete_update!=""){
	    $sql = "UPDATE {$table} SET {$field_date_now_upd} {$user_update} {$delete_update} = 1 WHERE {$where}";
 	}else{
	    $sql = "DELETE FROM {$table} WHERE {$where}";
 	}

    $struct = $db->exec($sql);
    echo $struct;
