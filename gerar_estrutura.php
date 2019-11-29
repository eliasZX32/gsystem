<?php

	$dispositivo = 'computador';

	if( isset($_REQUEST['dispositivo'] ) ){
		$dispositivo = strtolower($_REQUEST['dispositivo']);
	}

	if( isset($_REQUEST['table'] ) ){
		$table = $_REQUEST['table'];
	}

	/* Quanto for uma tabela filha concatena um string son */
	$text_son = ""; 
	if( isset($_REQUEST['text_son'] ) ){
		$text_son = $_REQUEST['text_son'];
	}

	if (!file_exists("tables/{$table}.php")) {
		if (!file_exists("system/{$table}.php")) {
			echo "<h1>Arquivo não encontrado {$table}.php!<h1>"; return 0;
		}else{
			require("system/{$table}.php");
		}		
	}else{
		require("tables/{$table}.php");
	}


	if (!file_exists("base/acesso.php")) {
		echo "<h1>Arquivo não encontrado base/acesso.php!<h1>"; return 0;
	}

	if (!file_exists("mount_structures_table.php")) {
		echo "<h1>Arquivo não encontrado mount_structures_table.php!<h1>"; return 0;
	}

	require("base/acesso.php");
	require("mount_structures_table.php");

//var_dump($struct);
	/* Reordena o array para refletir o arquivo {$table}.php */
	$newstruct = array();
	for ($x = 0; $x <= count($struct); $x++) {
	    foreach( $struct as $field_struct ){
	    	$t_val_array = $field_struct['INDICE'];
	    	if($t_val_array==$x){
				array_push( $newstruct, $field_struct);
				break;
	    	}
		}
	}
	$struct = $newstruct;
	/* -----------------------------------------------------*/

	/* Filtra o indice primario da tabela */
	$sql = "SHOW INDEX FROM {$table} WHERE Key_name = 'PRIMARY' ";
	$query = $db->query($sql);
	$index = $query->fetchall(PDO::FETCH_ASSOC);

	$field_index="";
	foreach( $index as $field_struct ){
		$field_index .= $field_struct['Column_name'] . '||';    		
	}
	$field_index = explode( "||", $field_index);

	$html_cadastro   = "<div class='container-fluid'>";

	$options = "";

	$lenght_col = 0;

	$html_cadastro .= "\n<form id='form_{$text_son}{$table}' method='post' >\n";

	$html_cadastro .= "\n<div class='row'>\n";

	/* Cria uma campo para receber a linha selecionada, server para atualizar a grade após a atualização do  formulario */
	$html_cadastro .= "<input id='select_row_{$text_son}{$table}' value='' hidden>";

	foreach( $struct as $field ){

		$border = "";
		if (array_key_exists("radio", $field) || array_key_exists("checkbox", $field)) {
			$border = "border: 1px solid #ccc; margin-top: 10px; margin-left: 10px; padding-bottom: 10px; text-align: center;";			
		}

		if (array_key_exists("col", $field)) {
			if ( $dispositivo == 'computador' )
			{
				$html_cadastro .= "		<div style='{$border} font-size: 1.2rem;' class='col-xs-12 col-md-{$field['col']} thau_dates' >\n";
			}else{
				$html_cadastro .= "		<div style='{$border} font-size: 1.2rem;' class='col-12 flex-fill' >\n";
			}
		}else{
			$html_cadastro .= "		<div style='{$border} font-size: 1.2rem;' class='col-12 flex-fill' >\n";
		}

		if ( array_key_exists("radio", $field) == False && array_key_exists("checkbox", $field) == False ){
			filds_text( $field, $options, $html_cadastro, $db, $table );	
		}else{
			if ( array_key_exists("radio", $field) == True){	
			 	if (array_key_exists("option", $field)) {
		 			filds_radio( $field, $options, $html_cadastro, $table );
			 	}else{
			 		echo "<label> O campo option não foi declarado em um campo radio. verifique o campo \"field\" => \"{$field['field']}\" no arquivo de estrutura. </label>";
			 	}
			}
			if ( array_key_exists("checkbox", $field) == True){	
				if (array_key_exists("option", $field)) {
					filds_checkbox( $field, $options, $html_cadastro, $table );	
				}else{
					echo "<h1> O campo option não foi declarado em um campo checkbox. verifique o campo \"field\" => \"{$field['Field']}\" no arquivo de estrutura. </h1>";
				}
			}
		}
		
 		$html_cadastro .= "\n		</div>";		

		if (array_key_exists("wrap", $field)) {
			if(is_numeric( $field['wrap'] )){				
			    $html_cadastro .= "	<div class='w-100 p-{$field['wrap']}'></div>";
			}else{
				$html_cadastro .= "	<div class='w-100 p-1'></div>";
			}
		}

	}
	$html_cadastro .= "\n</div>\n";

	$html_cadastro .= "		<div style='font-size: 1.2rem; padding: 10px; ' class='col-12 flex-fill text-right' >\n";
	$html_cadastro .= "			<input id='btnsave_a1n4h6sg8dr9y0e1' class='btn btn-primary' style='cursor:pointer' onclick='onsubmit_( form_{$text_son}{$table} );' value='Gravar' >";
	$html_cadastro .= "\n	</div>\n";
	
	$html_cadastro .= "\n</form>\n";

	$html_cadastro .= "\n</div>";

	echo $html_cadastro;


function filds_checkbox( $field, $options, &$html_cadastro, $table )
{

	if (array_key_exists("option", $field)) {

		$list = "{$field['option']}";
		$lista_options = explode( "|", $list);			    
		if( count($lista_options) > 0 ) {
			$list_size = count($lista_options) - 1;
		}

		$value = "{$field['value']}";
		$value = explode( "|", $value);			    

		$html_cadastro .= "\n			<div>";
		for ($i = 0; $i <= $list_size; $i++) {	

			if($i==0){	
				$html_cadastro .= "\n			<label>{$field['label']}:  &nbsp</label><br />";
			}
			
			$value_current = $value[$i];

			$html_cadastro .= "\n			<input style='height:20px; width:20px; vertical-align: middle;' ";
			$html_cadastro .= " id='{$table}ççç{$field['Field']}_'";
			$html_cadastro .= " name='{$table}ççç{$field['Field']}_'";
			$html_cadastro .= " value='{$value_current}'";
			$html_cadastro .= " type='checkbox' >";

			$html_cadastro .= "	\n			<label style='padding-left: 5px; padding-right: 5px;' >{$lista_options[$i]}</label>";
		}
		$html_cadastro .= "\n			</div>";

	}else{
		echo "<label> O campo option não foi declarado em um campo checkbox. verifique o campo \"field\" => \"{$field['field']}\" no arquivo de estrutura. </label>";
	}
}

function filds_radio( $field, $options, &$html_cadastro, $table )
{

	if (array_key_exists("label", $field)) {
		$html_cadastro .= "\n			<label>{$field['label']}: &nbsp</label><br />";
	}else{
		$html_cadastro .= "\n			<label>" . ucfirst($field['Field']) . ": &nbsp</label><br />";
	}

	// Pega a lista com as opções
	$list = "{$field['option']}";
	$lista_options = explode( "|", $list);			    
	if( count($lista_options) > 0 ) {
		$list_size = count($lista_options) - 1;
	}

	// Pega a lista com os valores para cada opção
	$list = "{$field['value']}";
	$lista_values = explode( "|", $list);			    

	for ($i = 0; $i <= $list_size; $i++) {	
		$html_cadastro .= "\n				<input style='height:20px; width:20px; vertical-align: middle;'";
		$html_cadastro .= " id='{$table}ççç{$field['Field']}_'";
		$html_cadastro .= " name='{$table}ççç{$field['Field']}_'";
		// se passou a lista com os valores com o mesmo tamanho
		if(count($lista_options) == count($lista_values)){
			//var_dump($lista_values[$i]);
			$html_cadastro .= " value='{$lista_values[$i]}'";
		}else{
			// se não um array pega o indice sequencial do for
			$html_cadastro .= " value='" . $i . "'";
		}

		$html_cadastro .= " type='radio'";

		if (array_key_exists("readonly", $field)) {
			$html_cadastro .= " ";
		}

		$html_cadastro .= " >";


		$html_cadastro .= "\n			<label style='padding-left: 5px; padding-right: 5px;' >{$lista_options[$i]}</label>";
	}
	//var_dump($html_cadastro); 
}

function filds_text( $field, $options, &$html_cadastro, $db, $table )
{
	// Criar um label para o input
	// Se não for passado a chave field, pega a chave Field da tabela
	if (array_key_exists("tag", $field)) {
		if (array_key_exists("label", $field)) {
			if ($field['tag'] == "select"){
				$html_cadastro .= "			<label>{$field['label']}: </label>";
			}
		}else
		{
			if ($field['tag'] == "select"){
				$html_cadastro .= "			<label>{$field['label']}: </label>";
			}
		}
	}else{
		if (array_key_exists("label", $field)) {
			$html_cadastro .= "			<label>{$field['label']}: </label>";
		}else{
			$html_cadastro .= "			<label>" . ucfirst($field['Field']) . ": </label>";
		}	
	}		

	// Poe a tag do html, se o usuario passou a tag usa se não usa sempre input na tag HTML
	if (array_key_exists("tag", $field)) {
		$html_cadastro .= "	<{$field['tag']} "; //style='width: 100%;'
	}else{
		$html_cadastro .= "	<input  "; //style='width: 100%;'
	}

	$html_cadastro .= " id='{$table}ççç{$field['Field']}_'";
	$html_cadastro .= " name='{$table}ççç{$field['Field']}_'";

	// seta a tag Type 
	if ( strpos($field['Type'] ,'int') !== FALSE){ 
		$html_cadastro .= " type='number'";
	}else if ( strpos($field['Type'] ,'tinyint') !== FALSE){ 
		$html_cadastro .= " type='number'";			
	}else if ( strpos($field['Type'] ,'smallint') !== FALSE){ 
		$html_cadastro .= " type='number'";			
	}else if ( strpos($field['Type'] ,'bigint') !== FALSE){ 
		$html_cadastro .= " type='number'";
	}else if ( strpos($field['Type'] ,'mediumint') !== FALSE){ 
		$html_cadastro .= " type='number'";			
	}else if ( strpos($field['Type'] ,'float') !== FALSE){ 
		$html_cadastro .= " type='number'";
	}else if ( strpos($field['Type'] ,'decimal') !== FALSE){ 
		$html_cadastro .= " type='number'";
	}else if ( strpos($field['Type'] ,'real') !== FALSE){ 
		$html_cadastro .= " type='number'";
	}else if ( strpos($field['Type'] ,'double') !== FALSE){ 
		$html_cadastro .= " type='number'";
	}else if ( strpos($field['Type'] ,'bit') !== FALSE){
		$html_cadastro .= " type='number'";
	}else if ( strpos($field['Type'] ,'boolean') !== FALSE){
		$html_cadastro .= " type='number'";

	}else if ( strpos($field['Type'] ,'datetime') !== FALSE){ 
		//$html_cadastro .= " type='datetime-local'";
		$html_cadastro .= " type='text'";

		if($field['Default'] != ''){
			$date = date('Y-m-d');
			$date .= "T" . date('H:i:s',time());
			$html_cadastro .= " value='{$date}'";
		}

		//$html_cadastro .= " value='2018-01-30T15:00'"; 

	}else if ( strpos($field['Type'] ,'date') !== FALSE){

		$html_cadastro .= " type='date'";

		if($field['Default'] != ''){
			$date = date('Y-m-d');
			$html_cadastro .= " value='{$date}'";
		}		

	}else if ( strpos($field['Type'] ,'time') !== FALSE){
		$html_cadastro .= " type='time'";

	}else{
	 	$html_cadastro .= " type='text'";
	}

	// Coloca o tamanho do campo
	if ( !array_key_exists("tag", $field) ) {
		$size_start = strpos( $field['Type'] ,'(' );
		if ( $size_start !== FALSE){
			$size_end = strpos($field['Type'] ,')' );
			if ( $size_end !== FALSE){

				$size = substr( trim($field['Type']) , $size_start + 1, $size_end - $size_start - 1 );
				$html_cadastro .= " size='{$size}'";
				$html_cadastro .= " maxlength='{$size}'";
			}
		}
	}

	if ( array_key_exists("size_list", $field) ) {
		$html_cadastro .= " size='{$field['size_list']}'";
	}

	if ( array_key_exists("quantitiesrows", $field) ) {
		$html_cadastro .= " rows='{$field['quantitiesrows']}'";
	}

	$html_cadastro .= " class = 'form-control'";

	if (array_key_exists("tag", $field)) {

		// Criar lista a partir de uma tabela
		// tem que ter as chaves 
		// table_ext = Tabela para a consulta
		// id_ext = campo para a ser colocado na propiedade value
		// show_ext = campo(s) para a ser mostrado, se for mostrar mais de um campo, mandar separado por ,
		// order_ext = campo(s) para ordernar a lista,
		if ($field['tag'] == "select"){

			$options = "";
			if (array_key_exists("Null", $field)) {
				if (strtoupper($field['Null']) == "YES"){
					$options = $options . "	\n	<option value=''>--</option>";
				}		 	
			}

			if( !array_key_exists("table_ext", $field) ){

				$table_exist = substr($field['Field'],3);
				
				/* Pega a strutura da tabela viculada ao id_ */					
				$struct_exist = $db->query("SHOW TABLES LIKE '{$table_exist}'" )->rowCount();
				if( $struct_exist > 0){
					/* Se acho a tabela no banco de dados, pega as colunas */
					$sql = "SHOW COLUMNS FROM {$table_exist}";
			    	$query = $db->query($sql);
			    	$query = array_map('strtolower', $query);
			    	$struct_secundario = $query->fetchall(PDO::FETCH_ASSOC);
			    	/* percorre a estrutura */
			    	$field_secundario = "";
					foreach( $struct_secundario as $field_array ){
						/* se não for o id */
						if($field_array['Field'] != 'id'){
							/* pega o campo que será mostrado */
							$field_secundario = "{$field_array['Field']}";
							break;	
						}else{
							$field_primario = "{$field_array['Field']}";
						}
					}				
					// Cria a consulta para preencher a lista
					$sql = "SELECT {$field_primario},{$field_secundario}";
					$sql .= " FROM {$table_exist}"; 
					$sql .= " ORDER BY {$field_secundario}";
//echo $sql;
				    $query = $db->query($sql);
				    $struct = $query->fetchall(PDO::FETCH_ASSOC);

				    // Cria a lista de opções
					foreach($struct as $row)
					{	
						$options .= "	\n	<option value='" . $row[ $field_primario ] . "'>";
						$options .= $row[ trim($field_secundario) ]; 
						$options = $options . "</option>";
					}

				}else{
					echo "A tabela {$table_exist} não existe na base de dados.";
					return false;
				}
			}else{
				// Cria a consulta para preencher a lista
				$sql = "SELECT {$field['id_ext']}, {$field['show_ext']}"; 
				$sql .= " FROM {$field['table_ext']}"; 
				$sql .= " ORDER BY {$field['order_ext']}";

			    $query = $db->query($sql);
			    $struct = $query->fetchall(PDO::FETCH_ASSOC);

			    // Cria a lista de opções
				foreach($struct as $row)
				{	
					// se tiver mais de uma campo para preencher a lista
					$show_exts = split(',',$field['show_ext']);

					$options .= "	\n	<option value='" . $row[ $field['id_ext'] ] . "'>";
					foreach($show_exts as $show_ext){
						$options .= $row[ trim($show_ext) ]; 
						$options .= ' - '; 
					}
					// tira o ' - ' 
					$options = substr($options, 0, -3);

					$options = $options . "</option>";
				}

			}
				
		 	$html_cadastro .= ">" . $options;

		}
	}

	/* Existe o campo pattern para validação */
	if (array_key_exists("pattern", $field)) {
		$html_cadastro .= " pattern={$field['pattern']}";
	}

	/* Existe o campo Null */
	if (array_key_exists("Null", $field)) {
		/* igual a Null = NO, não permite nulo */
		if (strtoupper($field['Null']) == "NO"){
			/* Se não for o campo ID coloca requerid */
			if( strtolower( $field['Field'] ) != 'id' ){
				if (array_key_exists("textvalid", $field)) {
					//var_dump($field['textvalid']);
					$html_cadastro .= " msgvalid='||" . $field['textvalid'] . "||' required ";
				}else{
					//var_dump($field['textvalid']);
					$html_cadastro .= " msgvalid='||Por favor, preencha este campo||' required ";
				}
			}else{
				/* Se for o campo ID não coloca requerid, coloca readonly */
				$html_cadastro .= " readonly";
			}
		}
	}

	if (array_key_exists("readonly", $field)) {
		$html_cadastro .= " readonly";
	}
		
	if( in_array( $field['Field'], $GLOBALS['field_index'] ) ){
		$html_cadastro .= " readonly";
	}
    
	if (array_key_exists("tag", $field)) {
		if ($field['tag'] == "select"){
			$html_cadastro .= "></{$field['tag']}>";
		}else{
			$html_cadastro .= ">{$field['label']} </{$field['tag']}>";
		}
	}else{
		$html_cadastro .= ">";
	}


    return $html_cadastro;
}

