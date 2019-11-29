<?php	

	$fields = array(
		
			
		array(	
				"field" => "menu_id", 
				"label" => "id",
				"label_plural" => "id",
				"grid" => "show", /* Hide - Não mostra mais carrega - show ou '' - Mostra */
				"col" => "1",
				"wrap" => "Yes", /* quebra Linha */
				"filter" => "Yes",
				"wrapfilter" => "Yes", /* quebra Linha no filtro*/	
			),

		array(	
				"field" => "users_id", 
				"label" => "Nome do Usuário",
				"label_plural" => "id",
				"grid" => "show", /* Hide - Não mostra mais carrega - show ou '' - Mostra */
				"col" => "4",
				"wrap" => "Yes", /* quebra Linha */
				"filter" => "Yes",
				"wrapfilter" => "Yes", /* quebra Linha no filtro*/

				"table_ext" => "users",
				"show_ext" => "name",
				"order_ext" => "name",
				"id_filds_relation" => "users_id",
				"id_ext" => "id",
				"tag" => "select",
			),

		array(	
				"field" => "sn_incluir", 
				"label" => "Incluir",
				"label_plural" => "Incluir",
				"col" => "2",
				"grid" => "show",
				"filter" => "Yes",
				"checkbox" => "Yes",
				"option" => "Sim|Não",
				"value" => "1|0",				
			),	

		array(	
				"field" => "sn_alterar", 
				"label" => "Alterar",
				"label_plural" => "Alterar",
				"col" => "2",
				"grid" => "show",
				"filter" => "Yes",
				"checkbox" => "Yes",
				"option" => "Sim|Não",
				"value" => "1|0",				
			),	

		array(	
				"field" => "sn_visualizar", 
				"label" => "Visualizar",
				"label_plural" => "Visualizar",
				"col" => "2",
				"grid" => "show",
				"filter" => "Yes",
				"checkbox" => "Yes",
				"option" => "Sim|Não",
				"value" => "1|0",				
			),	
		
		array(	
				"field" => "sn_excluir", 
				"label" => "Excluir",
				"label_plural" => "Excluir",
				"col" => "2",
				"grid" => "show",
				"filter" => "Yes",
				"checkbox" => "Yes",
				"option" => "Sim|Não",
				"value" => "1|0",				
			),	

		array(	
				"field" => "sn_executar", 
				"label" => "Executar",
				"label_plural" => "Executar",
				"col" => "2",
				"grid" => "show",
				"filter" => "Yes",
				"checkbox" => "Yes",
				"option" => "Sim|Não",
				"value" => "1|0",				
			),												
	);

