<?php
	
	require("classes/class.php"); /* Retorna um array com a class para cada tipo de campo */
	require("base/acesso.php");

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

	$html_cadastro  = "<div class='container'>";
	$html_cadastro .= "<div class='form-row'>";

	foreach( $fields as $field ){
		// Busca a classe para o tipo de type do campo atual 
		var_dump($field);

		$find = "{$field['Type']}";
		$key = array_search($find , array_column($class, 'type'));
		$_class =  $class[$key];

		if ($field['type'] == "text" || $field['type'] == "date" || $field['type'] == "datetime-local" ){

			$options = "";
			if ($field['tag'] == "select"){
				$sql = "SELECT {$field['id_ext']}, {$field['show_ext']} FROM {$field['table_ext']} ORDER BY {$field['order_ext']}";
			    $query = $db->query($sql);
			    $result = $query->fetchall(PDO::FETCH_ASSOC);
				foreach($result as $row)
				{	
					$options = $options . "<option value='" . $row[ $field['id_ext'] ] . "'>" . $row[ $field['show_ext'] ] . "</option>";
				}
			}

			$html_cadastro .= "<div class='{$_class['class_form']} {$field['class']}' >";	
				filds_text( $_class, $field, $options, $html_cadastro );	
			$html_cadastro .= "</div>";

		}

		if ($field['type'] == "radio"){	
			if (array_key_exists("option", $field)) {
				$html_cadastro .= "<div class='{$_class['class_form']} {$field['class']}' >";	
					filds_radio( $_class, $field, $options, $html_cadastro );	
				$html_cadastro .= "</div>";				
			}else{
				echo "<label> O campo option não foi declarado em um campo radio. verifique o campo \"field\" => \"{$field['field']}\" no arquivo de estrutura. </label>";
			}
		}

		if ($field['type'] == "checkbox"){	
			if (array_key_exists("option", $field)) {
				$html_cadastro .= "<div class='{$_class['class_form']} {$field['class']}' >";	
					filds_checkbox( $_class, $field, $options, $html_cadastro );	
				$html_cadastro .= "</div>";				
			}else{
				echo "<label> O campo option não foi declarado em um campo radio. verifique o campo \"field\" => \"{$field['field']}\" no arquivo de estrutura. </label>";
			}
		}
	}
			
	$html_cadastro .= "</div>";
	$html_cadastro .= "</div>";

	
	foreach( $buttons as $button ){
		//$html_cadastro .= "<div class=\"form-group col-md-12\">";
		$html_cadastro .= "<div style='padding-left: 5px;'class=\"btn-group\">";
		$html_cadastro .= 	"<input  type=\"button\" class=\"btn btn-primary\" value=\"{$button['caption']}\" >";
		$html_cadastro .= "</div>";
		//$html_cadastro .= "</div>";
	}
	
	echo $html_cadastro;

function filds_text( $_class, $field, $options, &$html_cadastro )
{

	if (array_key_exists("class_label", $_class)) {
		$html_cadastro .= "<label class = '{$_class['class_label']}' >{$field['label']}: </label>";
	}else{
		$html_cadastro .= "<label>{$field['label']}: </label>";
	}

	$html_cadastro .= "<{$field['tag']}";

	if ($field['type'] != ""){
		$html_cadastro .= " type = '{$field['type']}'";
	}

	if ($field['size'] != ""){
		$html_cadastro .= " size = '{$field['size']}'";
		$html_cadastro .= " maxlength = '{$field['size']}'";
	}

	if (array_key_exists("class", $field)) {
		$html_cadastro .= " class = '{$_class['class']} {$field['class']}'";
	}

	if ($field['tag'] == "select"){
		$html_cadastro .= $options;
	}

	$html_cadastro .= ">";

	if ($field['tag'] == "select"){
		$html_cadastro .= "{$field['label']} </{$field['tag']}>";
	}


    return $html_cadastro;
}


function filds_radio( $_class, $field, $options, &$html_cadastro )
{
	$html_cadastro .= "<label class = '{$_class['class_label']}'> {$field['label']}:  &nbsp</label>";

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
		$html_cadastro .= "<input ";
		$html_cadastro .= " name='{$field['field']}'";
		// se passou a lista com os valores com o mesmo tamanho
		if(count($lista_options) == count($lista_values)){
			$html_cadastro .= " value='{$lista_values[$i]}'";
		}else{
			// se não pega o indice sequencial do for
			$html_cadastro .= " value='" . $i . "'";
		}
		
		$html_cadastro .= " type='radio' >";

		if (array_key_exists("class_label", $_class)) {
			$html_cadastro .= "<label style='padding: 10px;'class = '{$_class['class_label']}' >{$lista_options[$i]}</label>";
		}else{
			$html_cadastro .= "<label style='padding: 10px;'>{$lista_options[$i]}</label>";
		}
	}
}


function filds_checkbox( $_class, $field, $options, &$html_cadastro )
{
	if (array_key_exists("option", $field)) {

		$list = "{$field['option']}";
		$lista_options = explode( "|", $list);			    
		if( count($lista_options) > 0 ) {
			$list_size = count($lista_options) - 1;
		}

		$html_cadastro .= "<div class='{$_class['class_form']}' >";			
		for ($i = 0; $i <= $list_size; $i++) {	

			if($i==0){	
				$html_cadastro .= "<label class = '{$_class['class_label']}' >{$field['label']}:  &nbsp</label>";
			}
			$html_cadastro .= "<input ";
			$html_cadastro .= " name='{$field['field']}'";
			$html_cadastro .= " type='checkbox'";
			if ($field['class'] != ""){
				//$html_cadastro .= " class='{$field['class']}'";
			}
			if (array_key_exists("class_label", $field)) {
				$html_cadastro .= "<label style='padding: 10px;' class = '{$_class['class_label']}' >{$lista_options[$i]}</label>";
			}else{
				$html_cadastro .= "<label style='padding: 10px;'>{$lista_options[$i]}</label>";
			}
		}
		$html_cadastro .= "</div>";
	}else{
		echo "<label> O campo option não foi declarado em um campo checkbox. verifique o campo \"field\" => \"{$field['field']}\" no arquivo de estrutura. </label>";
	}
}