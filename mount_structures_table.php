<?php	
	$newstruct = array();

	// Pega a estrutura da tabela no banco de dados
	$struct = $db->query("SHOW TABLES LIKE '{$table}'" )->rowCount();
	if( $struct > 0){
		$sql = "SHOW COLUMNS FROM {$table}";
    	$query = $db->query($sql);
    	$struct = $query->fetchall(PDO::FETCH_ASSOC);

    	// Junta a estrutura da tabela com a classe fields
    	$i = 0;
    	foreach( $struct as $field_struct ){
    		// pega o nome do campo na estrutura da tabela 
			$t_val_struct = strtolower($field_struct['Field']);
			$struct[$i]['Field'] = strtolower($field_struct['Field']);

			$j=0;
			// Verifico se existe este campo no array com propiedades extras
			foreach( $fields as $field_array){
				// pega o chave atual no array
				$t_val_array = strtolower($field_array['field']);

				//verifico de tem um valor igual
				$j++;
				if($t_val_struct==$t_val_array){
					
					$struct[$i] += array("INDICE" => $j);

					if (array_key_exists("label", $field_array)) {	
						$struct[$i] += array("label" => $field_array['label']);	
					}	
					if (array_key_exists("label_plural", $field_array)) {	
						$struct[$i] += array("label_plural" => $field_array['label_plural']); 
					}	
					if (array_key_exists("tag", $field_array)) {	
						$struct[$i] += array("tag" => $field_array['tag']); 
					}	
					if (array_key_exists("type", $field_array)) {	
						$struct[$i] += array("type" => $field_array['type']); 
					}
					if (array_key_exists("class", $field_array)) {	
						$struct[$i] += array("class" => $field_array['class']); 
					}
					if (array_key_exists("option", $field_array)) {	
						$struct[$i] += array("option" => $field_array['option']); 
					}
					if (array_key_exists("value", $field_array)) {	
						$struct[$i] += array("value" => $field_array['value']); 
					}											
					if (array_key_exists("table_ext", $field_array)) {	
						$struct[$i] += array("table_ext" => $field_array['table_ext']); 
					}	
					if (array_key_exists("id_ext", $field_array)) {	
						$struct[$i] += array("id_ext" => $field_array['id_ext']); 
					}	
					if (array_key_exists("show_ext", $field_array)) {	
						$struct[$i] += array("show_ext" => $field_array['show_ext']); 
					}
					if (array_key_exists("order_ext", $field_array)) {	
						$struct[$i] += array("order_ext" => $field_array['order_ext']); 
					}	
					if (array_key_exists("checkbox", $field_array)) {	
						$struct[$i] += array("checkbox" => $field_array['checkbox']); 
					}
					if (array_key_exists("radio", $field_array)) {	
						$struct[$i] += array("radio" => $field_array['radio']); 
					}
					if (array_key_exists("size_list", $field_array)) {	
						$struct[$i] += array("size_list" => $field_array['size_list']); 
					}	
					if (array_key_exists("grid", $field_array)) {	
						$struct[$i] += array("grid" => $field_array['grid']); 
					}
					if (array_key_exists("col", $field_array)) {	
						$struct[$i] += array("col" => $field_array['col']); 
					}
					if (array_key_exists("wrap", $field_array)) {	
						$struct[$i] += array("wrap" => $field_array['wrap']); 
					}
					if (array_key_exists("filter", $field_array)) {	
						$struct[$i] += array("filter" => $field_array['filter']); 
					}
					if (array_key_exists("wrapfilter", $field_array)) {	
						$struct[$i] += array("wrapfilter" => $field_array['wrapfilter']); 
					}
					if (array_key_exists("orderby", $field_array)) {	
						$struct[$i] += array("orderby" => $field_array['orderby']); 
					}
					if (array_key_exists("textvalid", $field_array)) {	
						$struct[$i] += array("textvalid" => $field_array['textvalid']); 
					}		
					if (array_key_exists("pattern", $field_array)) {	
						$struct[$i] += array("pattern" => $field_array['pattern']); 
					}
					if (array_key_exists("id_filds_relation", $field_array)) {	
						$struct[$i] += array("id_filds_relation" => $field_array['id_filds_relation']); 
					}
					if (array_key_exists("increment", $field_array)) {	
						$struct[$i] += array("increment" => $field_array['increment']); 
					}
					if (array_key_exists("incrementfield", $field_array)) {	
						$struct[$i] += array("incrementfield" => $field_array['incrementfield']); 
					}						
					if (array_key_exists("defaultvalue", $field_array)) {	
						$struct[$i] += array("defaultvalue" => $field_array['defaultvalue']); 
					}	
					if (array_key_exists("readonly", $field_array)) {	
						$struct[$i] += array("readonly" => $field_array['readonly']); 
					}
					if (array_key_exists("quantitiesrows", $field_array)) {	
						$struct[$i] += array("quantitiesrows" => $field_array['quantitiesrows']); 
					}	
					if (array_key_exists("date_update", $field_array)) {	
						$struct[$i] += array("date_update" => $field_array['date_update']); 
					}		
					if (array_key_exists("date_insert", $field_array)) {	
						$struct[$i] += array("date_insert" => $field_array['date_insert']); 
					}
					if (array_key_exists("user_new", $field_array)) {	
						$struct[$i] += array("user_new" => $field_array['user_new']); 
					}
					if (array_key_exists("user_update", $field_array)) {	
						$struct[$i] += array("user_update" => $field_array['user_update']); 
					}
					if (array_key_exists("delete", $field_array)) {	
						$struct[$i] += array("delete" => $field_array['delete']); 
					}																					
					break;											
				}
				
			}
			$i++;
    	}
    }

