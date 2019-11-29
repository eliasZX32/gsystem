<?php	

	$fields = array(
		
		array(	
				"field" => "id", 
				"label" => "Id Menu",
				"label_plural" => "id",
				"grid" => "show", /* Hide - Não mostra mais carrega - show ou '' - Mostra */
				"col" => "1",
				//"wrap" => "Yes", /* quebra Linha */
				"filter" => "Yes",
				"wrapfilter" => "Yes", /* quebra Linha no filtro*/	
			),
			
		array(	
				"field" => "functionality", 
				"label" => "Descrição",
				"label_plural" => "Descrição",
				"grid" => "show",
				"col" => "6",
				"wrap" => "Yes", /* quebra Linha */
				"filter" => "Yes",
				"wrapfilter" => "Yes", /* quebra Linha no filtro*/					
			),

		array(	
				"field" => "table_", 
				"label" => "Tabela",
				"label_plural" => "tabelas",
				//"grid" => "show",
				"col" => "4",
				//"wrap" => "Yes", /* quebra Linha */
				"filter" => "Yes",
				//"wrapfilter" => "Yes", /* quebra Linha no filtro*/					
			),

		array(	
				"field" => "table_caption", 
				"label" => "Rótulo da Tabela",
				"label_plural" => "Rótulo da Tabelas",
				//"grid" => "show",
				"col" => "4",
				"wrap" => "Yes", /* quebra Linha */
				"filter" => "Yes",
				//"wrapfilter" => "Yes", /* quebra Linha no filtro*/					
			),

		array(	
				"field" => "indexar", 
				"label" => "Indice",
				"label_plural" => "Indice",
				"grid" => "show",
				"col" => "2",
				//"wrap" => "Yes", /* quebra Linha */
				//"orderby" => "Yes",
				"filter" => "Yes",
				"textvalid" => "Digite o código para ordernar o menu!",
				"pattern" => ".{6,}", /* cria uma regra de validação para o campo */
			),

		array(	
				"field" => "nivel1", 
				"label" => "Nivel 1",
				"label_plural" => "Nivel 1",
				"grid" => "show",
				"col" => "1",
				//"wrap" => "Yes", /* quebra Linha */
				"orderby" => "Yes",
				"filter" => "Yes",
				//"textvalid" => "Digite o código para ordernar o menu!",
				//"pattern" => ".{6,}", /* cria uma regra de validação para o campo */
			),
		array(	
				"field" => "nivel2", 
				"label" => "Nivel 2",
				"label_plural" => "Nivel 2",
				"grid" => "show",
				"col" => "1",
				//"wrap" => "Yes", /* quebra Linha */
				"orderby" => "Yes",
				"filter" => "Yes",
				//"textvalid" => "Digite o código para ordernar o menu!",
				//"pattern" => ".{6,}", /* cria uma regra de validação para o campo */
			),
		array(	
				"field" => "nivel3", 
				"label" => "Nivel 3",
				"label_plural" => "Nivel 3",
				"grid" => "show",
				"col" => "1",
				//"wrap" => "Yes", /* quebra Linha */
				"orderby" => "Yes",
				"filter" => "Yes",
				//"textvalid" => "Digite o código para ordernar o menu!",
				//"pattern" => ".{6,}", /* cria uma regra de validação para o campo */
			),
		array(	
				"field" => "nivel4", 
				"label" => "Nivel 4",
				"label_plural" => "Nivel 4",
				"grid" => "show",
				"col" => "1",
				//"wrap" => "Yes", /* quebra Linha */
				"orderby" => "Yes",
				"filter" => "Yes",
				//"textvalid" => "Digite o código para ordernar o menu!",
				//"pattern" => ".{6,}", /* cria uma regra de validação para o campo */
			),		
		array(	
				"field" => "menu", 
				"label" => "Menu?",
				"label_plural" => "Menu",
				"radio" => "Yes",
				"option" => "sim|não",
				"value" => "1|0",
				"grid" => "show",
				"col" => "2"
			),

		array(	
				"field" => "register", 
				"label" => "Cadastro?",
				"label_plural" => "Cadastro",
				"radio" => "Yes",
				"option" => "sim|não",
				"value" => "1|0",
				"grid" => "show",
				"col" => "2",
				"wrap" => "Yes", /* quebra Linha */
			),
		
		array(	
				"field" => "date_register", 
				"label" => "Data Cadastro",
				"label_plural" => "Data Cadastro",
				"col" => "2",
				"grid" => "show",
				"filter" => "Yes",
				"wrap" => "Yes", /* quebra Linha */
			),

		array(	
				"field" => "table_son1", 
				"label" => "Tabela Auxiliar 1",
				"label_plural" => "Tabela Auxiliar 1",
				"col" => "2",
				"filter" => "Yes",
			),

		array(	
				"field" => "table_aba_son1", 
				"label" => "Rótulo para aba 1",
				"label_plural" => "Rótulo para aba 1",
				"col" => "2",
			),

		array(	
				"field" => "table_caption_list1", 
				"label" => "Rótulo lista 1",
				"label_plural" => "Tabela Auxiliar 1",
				"col" => "2",
			),

		array(	
				"field" => "table_fields_father1", 
				"label" => "Campos tabela pai 1",
				"label_plural" => "Campos tabela pai 1",
				"col" => "3",
			),

		array(	
				"field" => "table_fields_son1", 
				"label" => "Campos tabela filha 1",
				"label_plural" => "Campos tabela filha 1",
				"col" => "3",
				"wrap" => "Yes", /* quebra Linha */

			),
		array(	
				"field" => "table_son2", 
				"label" => "Tabela Auxiliar 2",
				"label_plural" => "Tabela Auxiliar 2",
				"col" => "2",
			),

		array(	
				"field" => "table_aba_son2", 
				"label" => "Rótulo para aba 2",
				"label_plural" => "Rótulo para aba 2",
				"col" => "2",
			),

		array(	
				"field" => "table_caption_list2", 
				"label" => "Rótulo lista 2",
				"label_plural" => "Tabela Auxiliar 2",
				"col" => "2",
			),

		array(	
				"field" => "table_fields_father2", 
				"label" => "Campos tabela pai 2",
				"label_plural" => "Campos tabela pai 2",
				"col" => "3",
			),

		array(	
				"field" => "table_fields_son2", 
				"label" => "Campos tabela filha 2",
				"label_plural" => "Campos tabela filha 2",
				"col" => "3",
				"wrap" => "Yes", /* quebra Linha */

			),
		array(	
				"field" => "sql2", 
				"label" => "Campos sql2",
				"label_plural" => "Campos sql2",
				"col" => "3",
				//"wrap" => "Yes", /* quebra Linha */

			),		
		array(	
				"field" => "marcos", 
				"label" => "Campo Marcos ",
				"label_plural" => "Campo Marcos",
				"col" => "3",
				"wrap" => "Yes", /* quebra Linha */
				"filter" => "Yes",
			),		
	);
