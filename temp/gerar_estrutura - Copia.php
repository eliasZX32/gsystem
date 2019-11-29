<?php

	$table = "uf";

	//$table = "uf";
	if( isset($_REQUEST['TABLE'] ) ){
		$table = $_REQUEST['TABLE'];
	}

	$table_caption = "";
	if( isset( $_REQUEST['TABLE_CAPTION'] ) ){
		$table_caption = $_REQUEST['TABLE_CAPTION'];	
	}	

	$class_form = "form-group col-md-12";
	if( isset( $_REQUEST['CLASS_FORM'] ) ) {		
		$class_form = $_REQUEST['CLASS_FORM'];	
	}	

	//if (!file_exists("tables/{$table}.php")) {
	//	echo "<h1>Arquivo não encontrado {$table}.php!<h1>"; return 0;
	//}

	if( isset($_REQUEST['table'] ) ){
		$table = $_REQUEST['table'];
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

	//require("tables/{$table}.php");
	require("base/acesso.php");
	require("mount_structures_table.php");


	// Se for um check_bok, usa essas classe para o form, input e o label
	$class_check = "form-check-input";
	$class_check_label = "form-check-label";
	$class_check_form = "form-check-inline";

	// Se for um radio, usa essas classe para o form, input e o label
	$class_radio = "form-check-input";
	$class_radio_label = "form-check-label";
	$class_radio_form = "form-check-inline";

	// Se for um text, usa essas classe para o form, input e o label
	$class_text = "form-control";
	$class_text_label = "";
	$class_text_form = "form-group";

	$class_extra = "col-md-12";

	$class_extra = "col-auto flex-fill";

	$html_cadastro   = "<div class='container-fluid'>";

	$options = "";

	$lenght_col = 0;

	///$html_cadastro .= "\n<div class='form-row'>\n";

	$html_cadastro .= "\n<div class='row'>\n";

	//var_dump($struct);

	foreach( $struct as $field ){

		$is_radio = False;
		if (array_key_exists("radio", $field)) {
			$is_radio = True;			
		}

		$is_checkbox = False;
		if (array_key_exists("checkbox", $field)) {
			$is_checkbox = True;
		}

		$html_cadastro .= "		<div class='col-auto flex-fill' >\n";

		if ( $is_radio == False && $is_checkbox == False){

			if (array_key_exists("class", $field)) {
				///$html_cadastro .= "		<div class='{$class_text_form} {$field['class']}' >\n";	
			}else{
				///$html_cadastro .= "		<div class='{$class_text_form} {$class_extra}' >\n";	
			}	

			
			filds_text( $class_extra, $class_text, $class_text_label, $field, $options, $html_cadastro, $db, $table );	
			
			$html_cadastro .= "\n		</div>\n";

		}else{
			if ($is_radio == True){	
			 	if (array_key_exists("option", $field)) {
			 		//$html_cadastro .= "\n		<div class='{$class_radio_form} {$field['class']}' >";	
			 			filds_radio( $class_extra, $class_radio, $class_radio_label, $field, $options, $html_cadastro, $table );
			 		$html_cadastro .= "\n		</div>";				
			 	}else{
			 		echo "<label> O campo option não foi declarado em um campo radio. verifique o campo \"field\" => \"{$field['field']}\" no arquivo de estrutura. </label>";
			 	}
			}

			if ($is_checkbox==True){	
				if (array_key_exists("option", $field)) {
					//$html_cadastro .= "\n		<div class='{$class_check_form} {$field['class']}' >";	
						filds_checkbox( $class_extra, $class_check, $class_check_label, $class_check_form, $field, $options, $html_cadastro, $table );	
					$html_cadastro .= "\n		</div>";				
				}else{
					echo "<h1> O campo option não foi declarado em um campo radio. verifique o campo \"field\" => \"{$field['Field']}\" no arquivo de estrutura. </h1>";
				}
			}
		}
	}
	$html_cadastro .= "\n</div>\n";
			
	//$html_cadastro .= "\n		</div>";
	//$html_cadastro .= "\n	</form>";
	$html_cadastro .= "\n</div>";

	echo $html_cadastro;


    //var_dump($struct);
function filds_checkbox( $class_extra, $class_check, $class_check_label, $class_check_form, $field, $options, &$html_cadastro, $table )
{

	if (array_key_exists("option", $field)) {

		$list = "{$field['option']}";
		$lista_options = explode( "|", $list);			    
		if( count($lista_options) > 0 ) {
			$list_size = count($lista_options) - 1;
		}

		$value = "{$field['value']}";
		$value = explode( "|", $value);			    

		$html_cadastro .= "\n		<fieldset style='padding: 0.5rem;' class='border rounded {$field['class']}'>";		

		$html_cadastro .= "\n			<div class='{$class_check_form}' >";	
		for ($i = 0; $i <= $list_size; $i++) {	

			if($i==0){	
				$html_cadastro .= "\n			<label class = '{$class_check_label}' >{$field['label']}:  &nbsp</label>";
			}
			
			$value_current = $value[$i];

			$html_cadastro .= "\n			<input ";
			$html_cadastro .= " id='{$table}_{$field['Field']}_'";
			$html_cadastro .= " name='{$table}_{$field['Field']}_'";
			$html_cadastro .= " value='{$value_current}'";
			$html_cadastro .= " type='checkbox' style='margin-left: 15px;'>";
			if ($field['class'] != ""){
				//$html_cadastro .= " class=''";
			}
			$html_cadastro .= "	\n			<label  style='margin-left: 15px;' class='{$class_check_label}' >{$lista_options[$i]}</label>";
		}
		$html_cadastro .= "\n			</div>";
		$html_cadastro .= "\n		</fieldset>";		


	}else{
		echo "<label> O campo option não foi declarado em um campo checkbox. verifique o campo \"field\" => \"{$field['field']}\" no arquivo de estrutura. </label>";
	}
}

function filds_radio( $class_extra, $class_text, $class_text_label, $field, $options, &$html_cadastro, $table )
{

	$html_cadastro .= "\n		<fieldset style='padding: 0.5rem;' class='border rounded {$field['class']}'>";

	if (array_key_exists("label", $field)) {
		if ($class_text_label != '') {
			$html_cadastro .= "\n			<label class='{$class_text_label}' >{$field['label']}: &nbsp</label>";
		}else{
			$html_cadastro .= "\n			<label>{$field['label']}: &nbsp</label>";
		}
	}else{
		if ($class_text_label != '') {
			$html_cadastro .= "\n			<label class='{$class_text_label}' >" . ucfirst($field['Field']) . ": &nbsp</label>";
		}else{
			$html_cadastro .= "\n			<label>" . ucfirst($field['Field']) . ": &nbsp</label>";
		}			
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
		$html_cadastro .= "\n				<input ";
		$html_cadastro .= " id='{$table}_{$field['Field']}_'";
		$html_cadastro .= " name='{$table}_{$field['Field']}_'";
		// se passou a lista com os valores com o mesmo tamanho
		if(count($lista_options) == count($lista_values)){
			$html_cadastro .= " value='{$lista_values[$i]}'";
		}else{
			// se não um array pega o indice sequencial do for
			$html_cadastro .= " value='" . $i . "'";
		}
		
		$html_cadastro .= " type='radio' size='100'>";

		$html_cadastro .= "\n			<label style='padding: 10px;' class='{$class_text_label}' >{$lista_options[$i]}</label>";
	}
	$html_cadastro .= "\n		</fieldset>";
}


function filds_text( $class_extra, $class_text, $class_text_label, $field, $options, &$html_cadastro, $db, $table )
{
	// Criar um label para o input
	// Se não for passado a chave field, pega a chave Field da tabela
	if (array_key_exists("tag", $field)) {
		if (array_key_exists("label", $field)) {
			if ($field['tag'] == "select"){
				$html_cadastro .= "			<label class='{$class_text_label}' >{$field['label']}: </label>";
				//$html_cadastro .= "			<p class='{$class_text_label}' >{$field['label']}: </p>";
			}
		}else
		{
			if ($field['tag'] == "select"){
				$html_cadastro .= "			<label>{$field['label']}: </label>";
				//$html_cadastro .= "			<p class='{$class_text_label}' >" . ucfirst($field['Field']) . ": </p>";
			}
		}
	}else{
		if (array_key_exists("label", $field)) {
			if ($class_text_label != '') {
				$html_cadastro .= "			<label class='{$class_text_label}' >{$field['label']}: </label>";
			}else{
				$html_cadastro .= "			<label>{$field['label']}: </label>";
			}
		}else{
			if ($class_text_label != '') {
				$html_cadastro .= "			<label class='{$class_text_label}' >" . ucfirst($field['Field']) . ": </label>";
			}else{
				$html_cadastro .= "			<label>" . ucfirst($field['Field']) . ": </label>";
			}			
		}	
	}		

	// Poe a tag do html, se o usuario passou a tag usa se não usa sempre input na tag HTML
	if (array_key_exists("tag", $field)) {
		$html_cadastro .= "	<{$field['tag']} style='width: 100%;'";
	}else{
		$html_cadastro .= "	<input style='width: 100%;' ";
	}

	$html_cadastro .= " id='{$table}_{$field['Field']}_'";
	$html_cadastro .= " name='{$table}_{$field['Field']}_'";

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
		$html_cadastro .= " type='datetime-local'";

		if($field['Default'] != ''){
			$date = date('Y-m-d');
			$date .= "T" . date('H:i',time());
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

	if ( $class_text != "") {
		if (array_key_exists("class", $field)) {
			$html_cadastro .= " class = '{$class_text} '";
		}else{
			$html_cadastro .= " class = '{$class_text} '";
		}	
	}

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
			    	$struct_secundario = $query->fetchall(PDO::FETCH_ASSOC);
			    	/* percorre a estrutura */
			    	$field_secundario = "";
					foreach( $struct_secundario as $field_array ){
						/* se não for o id */
						if($field_array['Field'] != 'id'){
							/* pega o campo que será mostrado */
							//$fields .= chr($chr).".{$field_array['Field']} {$table_exist}_{$field_array['Field']},";
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
					break;
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

	if (array_key_exists("Null", $field)) {
		if (strtoupper($field['Null']) == "NO"){
			if (array_key_exists("tag", $field)) {
				if ($field['tag'] != "select"){
					$html_cadastro .= " required";
				}
			}else{
				$html_cadastro .= " required";
			}
		}
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

