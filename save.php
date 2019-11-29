<?php
	/* Verifica de existe o arquivo de Acesso */
	if (!file_exists("base/acesso.php")) {
		echo "<h1>Arquivo não encontrado base/acesso.php!<h1>"; return 0;
	}

    /* Verifica se existe o arquivo mount_structures_table.php usado para montar a estrutura do grid */
	if (!file_exists("mount_structures_table.php")) {
		echo "<h1>Arquivo não encontrado mount_structures_table.php!<h1>"; return 0;
	}

	/* Pega os dados do formulario */
	$save_table = $_POST;

    /* Percorre o primeiro dado pegando o nome da tabela */
    $table = "";    
    $increment = 0; /* inicializa variavel para não incrementar no indice sequencial */
    $incrementfield = "";
	foreach( $_POST as $key => $value) {
	    $key = split("ççç", $key);

	    if($table==""){
		    $table = $key[0]; /* Nome da tabela */
	    }

	    if($key[0]=="action"){
		    $action = $key[1]; /* seta o valor para qual ação tem que ser feita (update ou new ) */
	    } 		    
	}

	/* Acessa a base de dados */
	require("base/acesso.php");
	if (!file_exists("tables/{$table}.php")) {
		if (!file_exists("system/{$table}.php")) {
			echo "<h1>Arquivo não encontrado {$table}.php!<h1>"; return 0;
		}else{
			require("system/{$table}.php");
		}		
	}else{
		require("tables/{$table}.php");
	}
    /* Faz junção da tabela com o arquivo php da tabela */
	require("mount_structures_table.php");

	session_start();

	/* Cria um array com os campos que atualiza com a data atual */
	$field_date_now_upd = array();
	$field_date_now_ins = array();
	$defaultvalue = array();
	$user_new = "";
	$user_update = "";

	foreach( $struct as $field ){
		if(array_key_exists( "date_update" , $field)){
    		array_push($field_date_now_upd, $field['Field']);		
		}
		if(array_key_exists( "date_insert" , $field)){
    		array_push($field_date_now_ins, $field['Field']);   		
		}		
		if(array_key_exists( "increment" , $field)){
			$increment = $field['increment']; /* seta o valor a incrementar no indice sequencial */
		}
		if(array_key_exists( "incrementfield" , $field)){
			$incrementfield = $field['incrementfield']; /* seta o valor a incrementar no indice sequencial */
		}
		if(array_key_exists( "defaultvalue" , $field)){
			$defaultvalue[$field['Field']] = $field['defaultvalue'];   
		}
		if(array_key_exists( "user_new" , $field)){
			$user_new = $field['Field'];
		}
		if(array_key_exists( "user_update" , $field)){
			$user_update = $field['Field'];
		}		
	}

	/* pega a data atual no banco de dados */ 
    $query = $db->query("select now() hour_time;");
    $date_now = $query->fetchall(PDO::FETCH_ASSOC);

	/*----------------------------------------------------------*/

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
        
        /* cria um array com os campos do indice primario */
		$field_index = explode( "||", $field_index);

    	/* Filtra os campos da tabela */
		$sql = "SHOW COLUMNS FROM {$table}";
    	$query = $db->query($sql);
    	$struct = $query->fetchall(PDO::FETCH_ASSOC);
		
		/* Cria um array com os tipos do banco de dados */	    	
    	$type_names=['BIT', 'TINYINT', 'BOOL', 'BOOLEAN', 'SMALLINT', 'MEDIUMINT', 'INT', 'INTEGER', 
    				'BIGINT', 'FLOAT', 'DOUBLE', 'DOUBLE PRECISION', 'DECIMAL', 'DEC'];

    	/* Inicializa as variaveis */			
    	$fields = "";
    	$values = "";
    	$update = "";
    	$where  = "";
    	$aspas = "'";
    	$max_id = "";
    	$return_ajax = "";
    	/* percorre os campos da tabela */
    	foreach( $struct as $field_struct ){
    		// cria uma variavel para comparar com os campos do formulário a partir da estrutura da tabela
    		$field = $table . 'ççç' . strtolower($field_struct['Field']) . '_'; /* Este campo tem que existir no formulario */
			if(array_key_exists( "{$field}" , $save_table)){

				/* Só coloca colunas que não são auto auto_increment */
				if( $field_struct['Extra'] <> 'auto_increment'){
					//echo $field_struct['Field'];
					/* Cria a string dos campos da estrutura para inclusão */
					$fields = $fields . $field_struct['Field'] . ', ';

					/* Pega o tipo do campo */
					$set = explode ( '(' , $field_struct['Type'] );
					$set = strtoupper($set[0]);					
					
					/* INSERT */
					if( $action == 'new' ){
						/* Se for o id da tabela */
						if( $field_struct['Field'] == 'id' || $field_struct['Field'] == $incrementfield ){

							if ( $save_table[$field] == ''){

								/* Pega o maior ID e soma 1 */
								$sql = "SELECT MAX({$field_struct['Field']}) + {$increment} AS max_value FROM {$table}";
						    	$query = $db->query($sql);
						    	$query_max = $query->fetchall(PDO::FETCH_ASSOC);
						    	
						    	$max_id = $query_max[0]['max_value'];
						    	

						    	/* Se for null, seta o valor em 1 */
						    	if($max_id == ''){ $max_id = 1;}

			                    /* verifica se é numérico, se poe ou não aspas */
								if( in_array( $set, $type_names) ){	
									$values .= "{$max_id}, ";                 /* Cria a string com o valor do ID para inclusão */
								}else{							
									$values .= "{$aspas}{$max_id}{$aspas}, "; /* Cria a string com o valor do ID para inclusão */
								}				    	
							}
					
						}else{
							/* verifica se é uma campo data que recebe data e hora atual */
							if( in_array( $field_struct['Field'], $field_date_now_ins) ){	
					    		$values = $values . "{$aspas}" . $date_now[0]['hour_time'] . "{$aspas}, ";
					    		$return_ajax .= "#". $field . "--" . $date_now[0]['hour_time'] ."||";

							}elseif(  $field_struct['Field'] == $user_new ){	
									$values .= "'" . $_SESSION['alias']  . "', ";
									$return_ajax .= "#". $field . "--" . $_SESSION['alias'] . "||";
					    	/* se tiver um valor defauld */	
							}elseif( array_key_exists( $field_struct['Field'], $defaultvalue) ){	
								/* verifica se é numérico, se poe ou não aspas */
								if( in_array( $set, $type_names) ){							
									$values .= $defaultvalue[$field_struct['Field']] . ", ";
								}else{							
									$values .= "{$aspas}" . $defaultvalue[$field_struct['Field']] . "{$aspas}, ";
								}	

							/* se não, poe o valor vindo do formulário */				    		
							}else{							
								/* verifica se é do tipo numérico, se poe ou não aspas */
								if($save_table[$field] == ''){
									$values .= "NULL, ";
								}elseif( in_array( $set, $type_names) ){							
									$values .= $save_table[$field] . ", ";
								}else{							
									$values .= "{$aspas}" . $save_table[$field] . "{$aspas}, ";
								}
							}						
						}

					/* UPDATE */	
					}else{
						/* Cria estrutura de atualização com campos e valores */
						if($save_table[$field] == ''){
							/* verifica se é uma campo data que recebe data e hora atual */
							if( in_array( $field_struct['Field'], $field_date_now_upd) ){
								$update .= $field_struct['Field'] . " = {$aspas}" . $date_now[0]['hour_time'] . "{$aspas}, ";
								$return_ajax .= "#". $field . "--" . $date_now[0]['hour_time'] ."||";

							/* se for um campo do usuario, atualiza com o login atual */
							}else if( $field_struct['Field'] == $user_update  ){
								$update .= $field_struct['Field'] . " = '" . $_SESSION['alias'] . "', ";
								$return_ajax .= "#". $field . "--" . $_SESSION['alias'] . "||";

							/* coloca o valor null, para campos do formulário com valor vazio */	
							}else{
								$update .= $field_struct['Field'] . " = NULL, ";
							}
						}else{

							$set = explode ( '(' , $field_struct['Type'] );
							$set = strtoupper($set[0]);						
							/* verifica se o campo é vazio */
							if( !in_array( $field_struct['Field'], $field_index) ){
								/* verifica se é uma campo data, que recebe data e hora atual */
								if( in_array( $field_struct['Field'], $field_date_now_upd ) ){
									$update .= $field_struct['Field'] . " = '" . $date_now[0]['hour_time'] . "', ";
									$return_ajax .= "#". $field . "--" . $date_now[0]['hour_time'] ."||";
								/* se for um campo do usuário, atualiza com o login atual */
								}else if( $field_struct['Field'] == $user_update  ){
									$update .= $field_struct['Field'] . " = '" . $_SESSION['alias'] . "', ";
									$return_ajax .= "#". $field . "--" . $_SESSION['alias'] . "||";
								}else{								
									/* verifica se é do tipo numérico, se poe ou não aspas */
									if( in_array( $set, $type_names) ){
										$update .= $field_struct['Field'] . " = " . $save_table[$field] . ", ";
									}else{
										$update .= $field_struct['Field'] . " = {$aspas}" . $save_table[$field] . "{$aspas}, ";
									}
								}	
							}
						}
					}
				}	
			}
    	}

    	/* Percorre o indice para criar a clausula WHERE para atualização*/
    	foreach( $index as $field_struct ){
    		// cria uma variavel para comparar com os campos do formulário a partir da estrutura da tabela
    		$field = $table . 'ççç' . strtolower( $field_struct['Column_name'] ) . '_';    		
			if(array_key_exists( "{$field}" , $save_table)){
				$set = $save_table[$field];
				/* Cria o filtro */
				$where = $where . $field_struct['Column_name'] . " = {$aspas}{$set}{$aspas} AND ";
			}    		
    	}

    	if( $where!='' ){ $where = substr($where,0,strlen($where)-4); }


    }else{
    	echo "<h1>Tabela ( {$table} ) não encontrado base !<h1>"; return 0;
    }

    $values = substr( $values, 0 , strlen($values) - 2);
    $fields = substr( $fields, 0 , strlen($fields) - 2);
    $update = substr( $update, 0 , strlen($update) - 2);

    if( $action == 'new' ){
	    $sql = "INSERT INTO {$table} ( {$fields} ) VALUES ( {$values} ) ";
    }else{
	    $sql = "UPDATE {$table} SET {$update}  WHERE {$where}";
    }

//echo  "INSERT INTO {$table} ( {$fields} ) VALUES ( {$values} ) ";
//echo  "UPDATE {$table} SET {$update}  WHERE {$where}";
    $struct = $db->exec($sql);
    echo $struct . "||{$return_ajax}";