<?php	

	$fields = array(
		
		array(	
				"field" => "id", 
				"label" => "id",
				"label_plural" => "id",
				"class" => "col-md-3",
				"grid" => "show", /* Hide - Não mostra mais carrega - show ou '' - Mostra */
				"col" => "1",
				"wrap" => "Yes", /* quebra Linha */
				"filter" => "Yes"
			),
			
		array(	
				"field" => "nm_controle", 
				"label" => "Controle",
				"label_plural" => "Controle",
				"class" => "col-md-3",
				"grid" => "show",
				"col" => "2",
				//"wrap" => "Yes", /* quebra Linha */
				"filter" => "Yes"
			),

		array(	
				"field" => "ds_funcionalidade", 
				"label" => "Descrição",
				"label_plural" => "Descrição",
				"class" => "col-md-3",
				"grid" => "show",
				"col" => "6",
				//"wrap" => "Yes", /* quebra Linha */
			),

		array(	
				"field" => "indice", 
				"label" => "Indice",
				"label_plural" => "indice",
				"class" => "col-md-3",
				"grid" => "show",
				"col" => "2",
				"wrap" => "Yes", /* quebra Linha */
			),

		array(	
				"field" => "menu", 
				"label" => "Menu",
				"label_plural" => "Menu",
				"class" => "col-md-3",
				"grid" => "show",
				"col" => "3",
				//"wrap" => "Yes", /* quebra Linha */
			),

		array(	
				"field" => "cadastro", 
				"label" => "Cadastro",
				"label_plural" => "Cadastro",
				"class" => "col-md-3",
				"grid" => "show",
				"col" => "2",
				//"wrap" => "Yes", /* quebra Linha */
			),

		array(	
				"field" => "sn_incluir", 
				"label" => "Incluir?",
				"label_plural" => "Incluir",
				"class" => "col-md-3",
				"radio" => "Yes",
				"option" => "sim|não",
				"value" => "1|0",
				"grid" => "show",
				"col" => "2",
				//"wrap" => "Yes", /* quebra Linha */
			),

		array(	
				"field" => "sn_alterar", 
				"label" => "Alterar?",
				"label_plural" => "Alterar",
				"class" => "col-md-3",
				"radio" => "Yes",
				"option" => "sim|não",
				"value" => "1|0",
				"grid" => "show",
				"col" => "2",
				//"wrap" => "Yes", /* quebra Linha */
			),

		array(	
				"field" => "sn_excluir", 
				"label" => "Excluir?",
				"label_plural" => "Excluir",
				"class" => "col-md-3",
				"radio" => "Yes",
				"option" => "sim|não",
				"value" => "1|0",
				"grid" => "show",
				"col" => "2",
				//"wrap" => "Yes", /* quebra Linha */
			),

		
		array(	
				"field" => "sn_visualizar", 
				"label" => "Visualizar?",
				"label_plural" => "Visualizar",
				"class" => "col-md-3",
				"radio" => "Yes",
				"option" => "sim|não",
				"value" => "1|0",
				"grid" => "show",
				"col" => "2",
				//"wrap" => "Yes", /* quebra Linha */
				"filter" => "Yes"
			),

		array(	
				"field" => "sn_executar", 
				"label" => "Executar?",
				"label_plural" => "Executar",
				"class" => "col-md-3",
				"checkbox" => "Yes",
				"option" => "Sim|Não|Talves",
				"value" => "1|0|-1",			
				"grid" => "show",
				"col" => "2",
				//"wrap" => "Yes", /* quebra Linha */
				"filter" => "Yes",
				"wrapfilter" => "Yes", /* quebra Linha no filtro*/								

			),

		array(	
				"table_ext" => "uf",
				"id_ext" => "id",
				"show_ext" => "sigla,descricao",
				"order_ext" => "descricao",
				"field" => "id_uf", 
				"type_field" => "int", 
				"size" => "", 
				"label" => "UF",
				"label_plural" => "UFs",
				"tag" => "select",
				"type" => "text",
				"col" => "2",
				"grid" => "show",
				"filter" => "Yes"
			),	

		array(	
				"field" => "dt_cadastro", 
				"label" => "Data Cadastro",
				"label_plural" => "Data Cadastro",
				"col" => "2",
				"grid" => "show",
				"filter" => "Yes"
			),	

	);

	$buttons = array(
		array(	
			"name" => "novo", 
			"caption" => "Novo", 
			"class_form" => "form-group col-md-2"
		),
		array(	
			"name" => "gravar", 
			"caption" => "Gravar", 
			"class_form" => "form-group col-md-2"
		),
		array(	
			"name" => "incluir", 
			"caption" => "Incluir", 
			"class_form" => "form-group col-md-2"
		),
		array(	
			"name" => "excluir", 
			"caption" => "Excluir", 
			"class_form" => "form-group col-md-2"
		)

	);