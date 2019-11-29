<?php	


	$fields = array(
		array(	
				"field" => "id", 
				"label" => "id",
				"label_plural" => "id",
				"col" => "1",
				"grid" => "all", /* all - mostra no computador e no mobile, computer - Só no computador, mobile - só no mobiles */

			),
			
		array(	
				"field" => "codigo", 
				"label" => "Código",
				"label_plural" => "Código",
				"col" => "2",
				"grid" => "all", /* all - mostra no computador e no mobile, computer - Só no computador, mobile - só no mobiles */
			),

		array(	
				"field" => "nome", 
				"label" => "Nome",
				"label_plural" => "Nome",
				"col" => "2",
				"grid" => "all", /* all - mostra no computador e no mobile, computer - Só no computador, mobile - só no mobiles */
			),

		array(	
				"field" => "apelido", 
				"label" => "Apelido",
				"label_plural" => "Apelido",
				"col" => "2",
			),

		array(	
				"field" => "usuario", 
				"label" => "Usuário",
				"label_plural" => "Usuários",
				"col" => "2",
			),
		array(	
				"field" => "endereco", 
				"label" => "Endereco",
				"label_plural" => "Endereco",
				"col" => "2",
			),

		array(	
				"field" => "bairro", 
				"label" => "Bairro",
				"label_plural" => "Bairro",
				"col" => "2",
			),

		array(	
				"field" => "cidade", 
				"label" => "Cidade",
				"label_plural" => "Cidade",
				"col" => "2",
			),

		array(	
				"field" => "id_uf", 
				"label" => "Estado",
				"label_plural" => "Estado",
				"class" => "col-md-4",
				"table_ext" => "uf",
				"id_ext" => "id",
				"show_ext" => "sigla, descricao",
				"order_ext" => "sigla",
				"tag" => "select",
				"col" => "2",
			),
	 	
		array(	
				"field" => "telefone", 
				"label" => "Telefone",
				"label_plural" => "Telefone",
				"col" => "2",
			),

		array(	
				"field" => "celular", 
				"label" => "Celular",
				"label_plural" => "Celular",
				"col" => "2",
			),

		array(	
				"field" => "senha", 
				"label" => "Senha",
				"label_plural" => "Senha",
				"col" => "2",
			),

		array(	
				"field" => "dt_admissao", 
				"label" => "Data Admissão",
				"label_plural" => "Data Admissão",
				"col" => "2",
			),

		array(	
				"field" => "dt_demissao", 
				"label" => "Data Demissão",
				"label_plural" => "Data Demissão",
				"col" => "2",
				"grid" => "all", /* all - mostra no computador e no mobile, computer - Só no computador, mobile - só no mobiles */
			),

		array(	
				"field" => "id_cidade", 
				"label" => "Cidade",
				"label_plural" => "Cidades",
				"class" => "col-md-6",
				"table_ext" => "cidade",
				"id_ext" => "id",
				"show_ext" => "descricao",
				"order_ext" => "descricao",
				"tag" => "select",
				"col" => "2",
				//"size_list" => "20" // Se informado abre uma lista
			),	 	
		array(	
				"field" => "cadastro", 
				"label" => "Data Cadastro",
				"label_plural" => "Data Cadastro",
				"col" => "2",
				"date_insert" => "Yes", // Atualiza com o horario do servidor banco de dados, quando incluir um registro																				
			),				

		array(	
				"field" => "ativo", 
				"label" => "Ativo y",
				"label_plural" => "Ativo",
				"radio" => "Yes",
				"option" => "sim|não",
				"value" => "1|0",
				"col" => "2",
			),
	 	
		array(	
				"field" => "genero", 
				"label" => "Genero",
				"label_plural" => "Genero",
				"value" => "1|2",
				"class" => "",
				"checkbox" => "Yes",
				"option" => "Masculino|Feminino",
				"col" => "2",
			),


	);
