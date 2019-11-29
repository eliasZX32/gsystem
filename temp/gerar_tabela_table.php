<?php
    
	//$device = 'mobile';
	//$device = 'computer';
	
	$device = '';
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
	$limit_length = 7;
    
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
	if( isset( $_REQUEST['where'] ) || isset( $_REQUEST['wheredefauld'] ) ){
		if( $_REQUEST['where'] != "" || $_REQUEST['wheredefauld'] != "" ){
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

	/* Cria a classula FROM do select */
    $tables = " FROM {$table} a"; /* guardar a clausula FROM do select */

    $show_fields_grid[]=''; /* Array para guardar os campos que serão mostrado no grid */
	
	/* Percorre a estrura da tabela */
	foreach( $struct as $field ){
        /* Trata cada tipo do arquivo para o retorno na pesquisa de dados */
		if( $field['Type']=='datetime' ){
			$fields .= "DATE_FORMAT(a.{$field['Field']},'%d/%m/%Y %H:%i') {$table}ççç{$field['Field']},";
		}else if( $field['Type']=='date' ){
			$fields .= "DATE_FORMAT( a.{$field['Field']},'%d/%m/%Y') {$table}ççç{$field['Field']},";
		}else if( $field['Type']=='time' ){
			$fields .= "DATE_FORMAT(a.{$field['Field']},'%H:%i') {$table}ççç{$field['Field']},";
		}else if( $field['Type']=='timestamp' ){
			$fields .= "DATE_FORMAT(a.{$field['Field']},'%H:%i') {$table}ççç{$field['Field']},";			
		}else{
			$fields .= "a.{$field['Field']} {$table}ççç{$field['Field']},";
		}

		/* Se tiver uma tabela externa */
		if( array_key_exists("table_ext", $field) ){

			/* se existir um campo a ser mostrado, coloca nos campos a ser mostrado na consulta */
			if( array_key_exists("show_ext", $field) ){
				
				/* cria um array com as colunas */
				$show_exts = split( ',', $field['show_ext']);
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

					$id_filds_relations = split( ',', $field['id_filds_relation']);
					$id_exts = split( ',', $field['id_ext']);

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
			/* verifica se mostra no grid */	
			if( strtoupper($device) == "COMPUTER"){
				if( strtoupper($field['grid']) == 'SHOW' || $field['grid'] == '' || strtoupper($field['grid']) == 'MOBILE'){
					if( array_key_exists("show_ext", $field) ){
						/* Adiciona os campos que ficaram visivel no grid */
						array_push($show_fields_grid, $tempfieldsext);
					}else{
						//
						array_push($show_fields_grid, $table.'ççç'.$field['Field']);
					}
				}
		
			}else{
				if( strtoupper($field['grid']) == 'MOBILE'){
					if( array_key_exists("show_ext", $field) ){
						/* Adiciona os campos que ficaram visivel no grid */
						array_push($show_fields_grid, $tempfieldsext);
					}else{
						//
						array_push($show_fields_grid, $table.'ççç'.$field['Field']);
					}
				}
			}				
		}
	}
	
	if( $orderby!='' ){
		$orderby = "ORDER BY " . substr( $orderby, 0, strlen($orderby)-1 );
	}


	$fields = substr($fields, 0, -1);

	$html_cadastro  = "<div class='container-fluid'>";

	$html_cadastro .= "	<table class='table table-hover table-bordered' id='table_{$table}'>\n";

	$html_cadastro .= "</br>";

	$html_cadastro .= "	<h4 class='card-title'>{$table_caption}</h4>";

	$html_cadastro .= "<a onclick=\"button_new( '{$text_son}{$table_}' );\" class='btn btn-primary btn-sm' style='cursor:pointer'>Novo Registro</a>";	

	/* Carrega o cabeçalho do grid */	
    $html_cadastro .= "	<table class='table table-hover' id='{$table}'>\n";
    $html_cadastro .= "		<thead>\n";
	$html_cadastro .= "		    <tr>\n";

	foreach( $struct as $field ){    
		if (array_key_exists("grid", $field)) {
			if( strtoupper($device) == "COMPUTER" ){
				if( strtoupper($field['grid']) == 'SHOW' || $field['grid'] == '' || strtoupper($field['grid']) == 'MOBILE'){
					$html_cadastro .= "				<th scope='col'>{$field['label']}</th>\n";
				}
			}else{
				if( strtoupper($field['grid']) == 'MOBILE' ){
					$html_cadastro .= "				<th scope='col'>{$field['label']}</th>\n";
				}
			}
		}
	}
	$html_cadastro .= "				<th scope='col'>Ação</th>\n";

	$html_cadastro .= "		    </tr>\n";
	$html_cadastro .= "		</thead>\n";

	/* Cria a consulta para preencher a lista no grid */
	$sql = "SELECT {$fields} {$tables} {$where} {$orderby} "; 
	if( $limit == TRUE){
		//echo $limit;
		$sql .= " LIMIT {$limit_start} , {$limit_length}";
	}

	//echo $sql;
	//return false;

    $query = $db->query($sql);
    $register = $query->fetchall(PDO::FETCH_ASSOC);
	

    /* 
    	ATENÇÃO
    	Campos bit teve ser trocado por tinyint, volta caracter extranho em base MySQL 		
    */

    $html_cadastro .= "	<tbody>";

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
   		$html_cadastro .= " <tr id='row_{$text_son}{$table_}_{$cont_linha}'>\n";

   		/* Pega as colunas */
   		foreach($row as $col => $val)
		{	
			/* Procura o nome do campo no array, se achou mostra */
			if( array_search( $col , $show_fields_grid) ){
				/* Se for um radio ou checkbox */
				if ( array_key_exists( $col, $arr) ) {
					$checked = "";
					if( $val !=0 ){
						$checked = "checked";	
					}
 					if ( $arr[$col] == "radio") {
					 	$html_cadastro .= "<td id={$col} name={$col} ><input '*{$val}*' type='radio' style='height:15px; width:15px;' {$checked} disabled></td>\n";
					}elseif ( $arr[$col] == "checkbox"){
					 	$html_cadastro .= "<td id={$col} name={$col} ><input '*{$val}*' type='checkbox' style='height:20px; width:20px;' {$checked} disabled></td>\n";
					} 	
				}else{
				 	$html_cadastro .= "<td id={$col} name={$col}>{$val}</td>\n";
				}

			}else{
				/* se não achou esconde o valor */ 
			  	$html_cadastro .= "<td id={$col} name={$col} hidden>{$val}</td>\n";
			}

      	}

        $html_cadastro .= "<td class='actions'>";
	    $html_cadastro .= "		<a onclick=\"button_edit({$cont_linha},'{$text_son}{$table}');\" class='btn btn-warning btn-sm' style='cursor:pointer' >Editar</a>";
	    $html_cadastro .= "		<a onclick=\"button_delete({$cont_linha},'{$text_son}{$table}');\" class='btn btn-danger btn-sm' data-toggle='modal' data-target='#delete-modal' style='cursor:pointer'>Excluir</a>";
		$html_cadastro .= "</td>";
      
      	$html_cadastro .= " </tr>";

	}

    $html_cadastro .= "  </tbody>";
    $html_cadastro .= "</table> ";	

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