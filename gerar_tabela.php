<?php
	
	$device = 'computer';
	if( isset($_REQUEST['device'] ) ){
		$device = strtoupper( $_REQUEST['device'] );
	}

    /* Verifica se foi passada a tabela */
	if( isset($_REQUEST['table'] ) ){
		$table = $_REQUEST['table'];
		$table_ = $_REQUEST['table'];
	}

	/* Verifica se foi passada o rótulo para tabela */
	//$table_caption = "Lista da tabela -> ";
	$table_caption = "Lista";
	if( isset( $_REQUEST['table_caption'] ) ){
		$table_caption = $_REQUEST['table_caption'];	
	}	

    /* Seta se vai ter limite para a quantidade de linhas de retorno */
	$limit = true; /* Volta todas linhas */
	/* se for passado pelo usuario, seta conforme passado */
	if( isset( $_REQUEST['limit'] ) ){
		$limit = strtoupper($_REQUEST['limit']) === 'TRUE'? true: false;	
	}	
    
    /* Seta um a pagina inicial e o limite linhas default */
	$limit_start = 0;
	if( strtoupper($device) == "COMPUTER" ){
		$limit_length = 16;
    }else{
		$limit_length = 10;
    }

    /* se for passado a pagina, seta o registro inicial que deve ser iniciado a busca na base de dados */
	if( isset( $_REQUEST['limit_start'] ) ){
		$limit_start = ($_REQUEST['limit_start']-1) * $limit_length;
	}
    
    /* Se for passado um valor menor que 0 seta como 0 */ 
	if( $limit_start < 0 ){
		$limit_start = 0;
	}
    
    /* Se for passada um valor para filtrar, seta clausula WHERE */
	$where = "";
	if( isset( $_REQUEST['where'] ) ){
		if( $_REQUEST['where'] != "" ){
			$where = " WHERE ";
		}
	}

	if( isset( $_REQUEST['wheredefauld'] ) ){
		if( $_REQUEST['wheredefauld'] != "" ){
			$where = " WHERE ";
		}
	}

	if( isset( $_REQUEST['wheredefauld1'] ) ){
		if( $_REQUEST['wheredefauld1'] != "" ){
			$where = " WHERE ";
		}
	}

	if( isset( $_REQUEST['where'] )  ){
		if($_REQUEST['where'] != ""){
			$where .= $_REQUEST['where'] . " AND " ;
		}
	}
	if( isset( $_REQUEST['wheredefauld'] )  ){
		if($_REQUEST['wheredefauld'] != ""){
			$where .= $_REQUEST['wheredefauld'] . " AND " ;
		}
	}
	if( isset( $_REQUEST['wheredefauld1'] )  ){
		if($_REQUEST['wheredefauld1'] != ""){
			$where .= $_REQUEST['wheredefauld1'] . " AND " ;
		}
	}

	if($where != " WHERE "){
		$where = substr( $where, 0, strlen($where)-4 );
	}

	//echo $where;
	//return false; 


	/* ?Verifica se foi passado o filho */	
	$text_son = "";
	if( isset( $_REQUEST['text_son'] )  ){
		$text_son = $_REQUEST['text_son'];
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
    
    /* Verifica se existe o arquivo acesso.php que faz o acesso a base de dados */
	if (!file_exists("base/acesso.php")) {
		echo "<h1>Arquivo não encontrado base/acesso.php!<h1>"; return 0;
	}
    
    /* Verifica se existe o arquivo mount_structures_table.php usado para montar a estrutura do grid */
	if (!file_exists("mount_structures_table.php")) {
		echo "<h1>Arquivo não encontrado mount_structures_table.php!<h1>"; return 0;
	}
    
    /* Abre os arquivos */
	require("base/acesso.php");
	require("mount_structures_table.php");

	/* Inicializa as variveis */
    $fields = "";  /* guardar os campos a serem pesquisados */
    $orderby = ""; /* guardar os campos a serem ordenados */
    $chr = 98;     /* caracter b da tabela ascii */  
	$html_header = "";
	$radio_checkbox = array();

	/* Cria a classula FROM do select */
    $tables = " FROM {$table} a"; /* guardar a clausula FROM do select */

    $show_fields_grid[]=''; /* Array para guardar os campos que serão mostrado no grid */
	
	/* Percorre a estrura da tabela */
	foreach( $struct as $field ){
        /* Trata cada tipo do arquivo para o retorno na pesquisa de dados */
		if( $field['Type']=='datetime' ){
			$fields .= "DATE_FORMAT(a.{$field['Field']},'%d/%m/%Y %H:%i:%s') {$table}ççç{$field['Field']},";
		}else if( $field['Type']=='date' ){
			$fields .= "DATE_FORMAT( a.{$field['Field']},'%d/%m/%Y') {$table}ççç{$field['Field']},";
		}else if( $field['Type']=='time' ){
			$fields .= "DATE_FORMAT(a.{$field['Field']},'%H:%i:%s') {$table}ççç{$field['Field']},";
		}else if( $field['Type']=='timestamp' ){
			$fields .= "DATE_FORMAT(a.{$field['Field']},'%H:%i:%s') {$table}ççç{$field['Field']},";			
		}else{
			$fields .= "a.{$field['Field']} {$table}ççç{$field['Field']},";
		}

		/* Se tiver uma tabela externa */
		if( array_key_exists("table_ext", $field) ){

			/* se existir um campo a ser mostrado, coloca nos campos a ser mostrado na consulta */
			if( array_key_exists("show_ext", $field) ){
				
				/* cria um array com as colunas */
				$show_exts = explode( ',', $field['show_ext']);
				if(count($show_exts) > 0){
					$fields .= " CONCAT("; 	
				}
				
				foreach($show_exts as $show_ext){
					/* junta os campos em um, para mostrar em uma coluna do grid */
					$show_ext_temp = trim($show_ext);
					$fields .= chr($chr).".{$show_ext_temp},";
					$fields .= "' - ',";
				}

				/* tira o mais do final da string */
				$fields = substr($fields, 0, -7);	

				if(count($show_exts) > 0){
					$fields .= ")"; 	
				}

				$show_ext_temp = trim($show_exts[0]);

				$fields .= " {$field['table_ext']}ççç{$show_ext_temp},";	

				$tempfieldsext = "{$field['table_ext']}ççç{$show_ext_temp}";

				/* Adiciona os campos que ficaram visivel no grid */
				//array_push( $show_fields_grid, "{$field['table_ext']}_{$show_ext_temp}");	

				if( array_key_exists("table_ext", $field) ){

					$tables .= " LEFT JOIN ";

					/* pega o nome da tabela para fazer o relacionamento com a tabela pai */
					$tables .= $field['table_ext'].' '.chr($chr). ' ';
					$tables .= " ON ";

					if( !array_key_exists("id_filds_relation", $field) ){
						echo "Falta declarar o campo <b>id_filds_relation</b> na tabela <b>{$table}.php</b>.";
						return false;
					}

					if( !array_key_exists("id_ext", $field) ){
						echo "Falta declarar o campo <b>id_ext</b> na tabela <b>{$table}.php</b>.";
						return false;
					}

					$id_filds_relations = explode( ',', $field['id_filds_relation']);
					$id_exts = explode( ',', $field['id_ext']);

					//var_dump($id_filds_relations);
					//var_dump($id_exts);

					if( count($id_filds_relations) == count($id_exts) ){
						for( $i = 0; $i < count($id_filds_relations); $i++ ){							
							/* junta os campos em um, para mostrar em uma coluna do grid */
							$tables .= " a." . trim($id_filds_relations[$i]) . " = " . chr($chr) . "." . trim($id_exts[$i]);
							if( $i < count($id_filds_relations)  - 1 ){
								$tables .= " AND ";
							}
						}
					}else{
						echo "Verifique os parametros id_filds_relation e id_ext, eles devem ter o mesma quantidades de campos separados por vírcula.<br>";
						echo "Verifique o campo <b>{$field['Field']}</b> do arquivo <b>{$table}.php</b>.";

						return false;
					}

					$chr += 1;			
				}
			}
		}

		/* Se tiver uma ordenação, adiciona o campo */ 
		if (array_key_exists("orderby", $field)) {
			if( strtoupper( $field['orderby'] ) =='YES' || strtoupper( $field['orderby'] ) =='ASC'  ){
				$orderby .= "a.{$field['Field']},";
			}else{
				$orderby .= "a.{$field['Field']} DESC,";
			}
		}

		if (array_key_exists("grid", $field)) {
			$coltemp = explode (":",$field['col']);
			$length_col = $field['col'];

			/* verifica se mostra no grid */	
			if( strtoupper($device) == "COMPUTER"){
				if( strtoupper($field['grid']) == 'ALL' || strtoupper($field['grid']) == 'COMPUTER' || $field['grid'] == ''){
					if( array_key_exists("show_ext", $field) ){
						/* Adiciona os campos que ficaram visivel no grid */
						array_push($show_fields_grid, $tempfieldsext . ":". strtoupper($field['grid']) . ":". $field['col'] );
					}else{
						array_push($show_fields_grid, $table.'ççç'.$field['Field'] . ":". strtoupper($field['grid']) . ":". $field['col']);
					}

					if( count($coltemp) > 1){ $length_col = $coltemp[0]; }
					$html_header .= "	<div class='col-{$length_col}' style='border-top: 1px solid #ddd;'><strong>{$field['label']}</strong></div>\n";
				}
			}else{
				if( strtoupper($field['grid']) == 'ALL' || strtoupper($field['grid']) == 'MOBILE'){
					if( array_key_exists("show_ext", $field) ){
						/* Adiciona os campos que ficaram visivel no grid */
						array_push($show_fields_grid, $tempfieldsext . ":". strtoupper($field['grid']) . ":". $field['col']);
					}else{
						array_push($show_fields_grid, $table.'ççç'.$field['Field'] . ":". strtoupper($field['grid']) . ":". $field['col']);
					}
					if( count($coltemp) > 1){ $length_col = $coltemp[1]; }
					$html_header .= "	<div class='col-{$length_col}' style='border-top: 1px solid #ddd;'><strong>{$field['label']}</strong></div>\n";
				}
			}

			if ( array_key_exists("radio", $field ) ) {
				$radio_checkbox += ["{$table_}ççç{$field["Field"]}" => "radio" ];
			}

			if ( array_key_exists("checkbox", $field ) ) {
				$radio_checkbox += ["{$table_}ççç{$field["Field"]}" => "checkbox" ];
			}

		}
	}

	if( $orderby!='' ){
		$orderby = "ORDER BY " . substr( $orderby, 0, strlen($orderby)-1 );
	}

	$fields = substr($fields, 0, -1);

	$html_cadastro  = "<div class='container-fluid'>";

		$html_cadastro .= "<div class='row' id='table_{$table}'>";
		if( strtoupper($device) == "COMPUTER" ){
			$html_cadastro .= "<div class='col-8'><h4 class='card-title'>{$table_caption}</h4></div>";
			$html_cadastro .= "<div class='col-4'><a onclick=\"button_new( '{$text_son}{$table_}' );\" class='btn btn-primary btn-sm' style='cursor:pointer; font-size: 1.0rem;'>Novo Registro</a></div>";	
		}else{
			$html_cadastro .= "<div class='col-8'><h6 class='card-title'>{$table_caption}</h6></div>";
			$html_cadastro .= "<div class='col-4'><a onclick=\"button_new( '{$text_son}{$table_}' );\" class='btn btn-primary btn-sm' style='cursor:pointer; font-size: 0.5rem;'>Novo Registro</a></div>";	
		}	

		$html_cadastro .= "</div>\n";

		if( strtoupper($device) == "COMPUTER" ){
			$html_cadastro .= "<div class='row' id='row_{$text_son}{$table_}_0' >\n";
		}else{
			$html_cadastro .= "<div class='row' id='row_{$text_son}{$table_}_0' style='font-size: 0.5rem;'>\n";
		}

		$html_cadastro .= $html_header;  

		$html_cadastro .= "	<div class='col-2' style='border-top: 1px solid #ddd;'><strong>Ação</strong></div>\n";
		
		$html_cadastro .= "</div>\n";

		/* Cria a consulta para preencher a lista no grid */
		$sql = "SELECT {$fields} {$tables} {$where} {$orderby} "; 
		if( $limit == TRUE){
			//echo $limit;
			$sql .= " LIMIT {$limit_start} , {$limit_length}";
		}
	    $query = $db->query($sql);
	    $register = $query->fetchall(PDO::FETCH_ASSOC);
		

	    /* 
	    	ATENÇÃO
	    	Campos bit teve ser trocado por tinyint, volta caracter extranho em base MySQL 		
	    */

		$arr = array();	
		foreach( $struct as $field){
			if ( array_key_exists("radio", $field ) ) {
				$arr += ["{$table_}ççç{$field["Field"]}" => "radio" ];
			}   
			if ( array_key_exists("checkbox", $field ) ) {
				$arr += ["{$table_}ççç{$field["Field"]}" => "checkbox" ];
			}
		}

	    /* Percorre as linhas */
	    $cont_linha = 0;
		foreach($register as $row)
		{	
			$cont_linha++;
			if( strtoupper($device) == "COMPUTER" ){			
				$html_cadastro .= "<div class='row' id='row_{$text_son}{$table_}_{$cont_linha}' style=''>\n";
			}else{
				$html_cadastro .= "<div class='row' id='row_{$text_son}{$table_}_{$cont_linha}' style='font-size: 0.5rem;'>\n";
			}

//var_dump($show_fields_grid);
//return false;
	   		/* Pega as colunas */
	   		foreach($row as $col => $val)
			{	
				$tmpshow = false;
				for ( $x = 1; $x < sizeof($show_fields_grid); $x++) {
					$tmp = explode (":", $show_fields_grid[ $x ]);
					if( $col == $tmp[0] ){
						$tmpshow = true;
						break;
					}
				}

				/* Procura o nome do campo no array, se achou mostra */
				if( $tmpshow ){
					if( strtoupper($device) == "COMPUTER" ){
						if( $tmp[1] == 'ALL' || $tmp[1] == 'COMPUTER' ){
							if ( !array_key_exists( $col, $radio_checkbox) ) {
								$html_cadastro .= "	<div id={$col} name={$col} class='col-{$tmp[2]}' style='border-top: 1px solid #ddd;'>{$val}</div>";
							}else{
								$checked = "";
								if( $val !=0 ){
									$checked = "checked";	
								}								
								$html_cadastro .= "<div id={$col} name={$col} class='col-{$tmp[2]}' style='border-top: 1px solid #ddd;'>";
								$html_cadastro .= "<input '*{$val}*' type='{$radio_checkbox[$col]}' style='height:15px; width:15px; margin-top:5px;' {$checked} disabled>";	
								$html_cadastro .= "</div>";	
							}
						}else{
							$html_cadastro .= "	<div id={$col} name={$col} hidden>{$val}</div>\n";
						}
					}else{
						if( $tmp[1] == 'ALL' || $tmp[1] == 'MOBILE' ){
							$length_col = $tmp[2];
							if( count($tmp) > 3){ $length_col = $tmp[3]; }
							$html_cadastro .= "	<div id={$col} name={$col} class='col-{$length_col}' style='border-top: 1px solid #ddd;'>{$val}</div>\n";
						}else{
							$html_cadastro .= "	<div id={$col} name={$col} hidden>{$val}</div>\n";
						}
					}			
				}else{
					/* se não achou esconde o valor */ 
					$html_cadastro .= "	<div id={$col} name={$col} hidden>{$val}</div>\n";
				}
	      	}

	      	if( strtoupper($device) == "COMPUTER" ){		
				$html_cadastro .= "	<div class='col-1 text-warning' style='border-top: 1px solid #ddd; cursor:pointer; font-size: 1.0rem;' onclick=\"button_edit({$cont_linha},'{$text_son}{$table}');\" >Editar</div>";
				$html_cadastro .= "	<div class='col-1 text-danger'  style='border-top: 1px solid #ddd; cursor:pointer; font-size: 1.0rem;' onclick=\"button_delete({$cont_linha},'{$text_son}{$table}');\">Excluir</div>";
			}else{
				$html_cadastro .= "	<div class='col-1 text-warning' style='border-top: 1px solid #ddd; cursor:pointer; font-size: 0.5rem;' onclick=\"button_edit({$cont_linha},'{$text_son}{$table}');\" >Editar</div>";
				$html_cadastro .= "	<div class='col-1 text-danger'  style='border-top: 1px solid #ddd; cursor:pointer; font-size: 0.5rem;' onclick=\"button_delete({$cont_linha},'{$text_son}{$table}');\">Excluir</div>";
			}
			$html_cadastro .= "</div>\n";

		}

		
	if( $text_son == "" ){
		if( strtoupper($device) == "COMPUTER" ){

			$font_size = 'font-size: 1.0rem;';
			$html_cadastro .= "<div class='row'>"; 
			$html_cadastro .= "		<div id='nav-page-first' class='col-1 btn btn-primary' style='{$font_size} cursor: pointer; padding: 6px 5px; border: 1px solid #ddd; '><<</div>";
			$html_cadastro .= "		<div id='nav-page-previous' class='col-1 btn btn-primary' style='{$font_size} cursor: pointer; padding: 6px 5px; border: 1px solid #ddd; '><</div>";
			$html_cadastro .= "		<div class='col-2' style='padding: 5px 6px; border: 1px solid #ddd; overflow: hidden;'>";
		    $html_cadastro .= "      	<input type='number' id='nav-page-go' style='{$font_size} text-align: center; width: 90px; outline: 0; box-shadow: 0 0 0 0; border: 0 none;' value='1' >";
			$html_cadastro .= "   	</div>";
			$html_cadastro .= "		<div class='col-2' style='padding: 5px 6px; border: 1px solid #ddd;'>";
		    $html_cadastro .= "      	<input type='number' id='nav-limit-page' style='{$font_size} text-align: center; width: 90px; outline: 0; box-shadow: 0 0 0 0; border: 0 none; background-color: #fff;' disabled>";
			$html_cadastro .= "   	</div>";
//			$html_cadastro .= "		<div class='col-1' style='padding: 5px 6px; border: 1px solid #ddd; cursor: pointer; ' >";
//		    $html_cadastro .= "      		<a id='nav-page-button' href='#'>Ir</a>";
//			$html_cadastro .= "   	</div>";
			$html_cadastro .= "		<div id='nav-page-button' class='col-1 btn btn-primary' style='{$font_size} cursor: pointer; padding: 6px 5px; border: 1px solid #ddd;' href='#'>Ir </div>";
			$html_cadastro .= "		<div id='nav-page-next' class='col-1 btn btn-primary' style='{$font_size} cursor: pointer; padding: 6px 5px; border: 1px solid #ddd;' href='#'>> </div>";
			$html_cadastro .= "		<div id='nav-page-last'  class='col-1 btn btn-primary' style='{$font_size} cursor: pointer; padding: 6px 5px; border: 1px solid #ddd;' href='#'>>></div>";

			$html_cadastro .= "</div>";

		}else{
			$font_size = 'font-size: 0.6rem;';
			$html_cadastro .= "<div class='w-100 p-1'></div>";
			$html_cadastro .= "<div class='row'>"; 
			$html_cadastro .= "		<div id='nav-page-first'    class='col-1' style='{$font_size} cursor: pointer; padding: 6px 5px; border: 1px solid #ddd; '><<</div>";
			$html_cadastro .= "		<div id='nav-page-previous' class='col-1' style='{$font_size} cursor: pointer; padding: 6px 5px; border: 1px solid #ddd; '><</div>";
			$html_cadastro .= "		<div class='col-2' style='padding: 5px 6px; border: 1px solid #ddd; overflow: hidden;'>";
		    $html_cadastro .= "      	<input type='number' id='nav-page-go' style='{$font_size} text-align: center; width: 30px; outline: 0; box-shadow: 0 0 0 0; border: 0 none;' value='1' >";
			$html_cadastro .= "   	</div>";
			$html_cadastro .= "		<div class='col-2' style='padding: 5px 6px; border: 1px solid #ddd;'>";
		    $html_cadastro .= "      	<input type='number' id='nav-limit-page' style='{$font_size} text-align: center; width: 30px; outline: 0; box-shadow: 0 0 0 0; border: 0 none; background-color: #fff;' disabled>";
			$html_cadastro .= "   	</div>";
			$html_cadastro .= "		<div id='nav-page-button' class='col-1' style='{$font_size} cursor: pointer; padding: 6px 5px; border: 1px solid #ddd;' href='#'>Ir</div>";
			$html_cadastro .= "		<div id='nav-page-next'   class='col-1' style='{$font_size} cursor: pointer; padding: 6px 5px; border: 1px solid #ddd;' href='#'>> </div>";
			$html_cadastro .= "		<div id='nav-page-last'   class='col-1' style='{$font_size} cursor: pointer; padding: 6px 5px; border: 1px solid #ddd;' href='#'>>></div>";

			$html_cadastro .= "</div>";

		}	
	}

	$sql = "SELECT COUNT(*) totpage FROM {$table} a {$where}"; 

    $query = $db->query($sql);
    $register = $query->fetchall(PDO::FETCH_ASSOC);

    $totpage = (integer) ( $register[0]['totpage'] / $limit_length );

	if($register[0]['totpage'] % $limit_length>0){
		$totpage++;
	} 
	if($totpage <= 0){ 
		$totpage = 1;
	}  
    $html_cadastro .= "<input id='limit_page' value='{$totpage}' hidden>";	

	$html_cadastro .= "</div>";

    echo $html_cadastro;