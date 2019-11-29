<?php	

	$fields = array(
		
		array(	
				"field" => "cd_fornecedor", 
				"label" => "Código",
				"label_plural" => "Códigos",
				"col" => "1",
			),

		array(	
				"field" => "cd_contato", 
				"label" => "Código",
				"label_plural" => "Clientes",
				"col" => "1",
				"wrap" => "3",    /* quebra Linha */
			),		

		array(	
				"field" => "nm_contato", 
				"label" => "Contato",
				"label_plural" => "Contatos",
				"grid" => "all", /* all - mostra no computador e no mobile, computer - Só no computador, mobile - só no mobiles */
				"col" => "6:4",     /* primeiro parametro quantidades colunas computador, segundo parametro quantidades colunas mobile,Quantidade de colunas maximo(12)*/
			),	

		array(	
				"field" => "telefone", 
				"label" => "Telefone",
				"label_plural" => "Telefones",
				"grid" => "all", /* all - mostra no computador e no mobile, computer - Só no computador, mobile - só no mobiles */
				"col" => "2",
			),	

		array(	
				"field" => "celular", 
				"label" => "Celular",
				"label_plural" => "Celulares",
				"grid" => "all", /* all - mostra no computador e no mobile, computer - Só no computador, mobile - só no mobiles */
				"col" => "2",
			),	

		array(	
				"field" => "fax", 
				"label" => "Fax",
				"label_plural" => "Faxs",
				"col" => "2",
				"wrap" => "3", /* quebra Linha */
			),	

		array(	
				"field" => "setor", 
				"label" => "Setor",
				"label_plural" => "Setores",
				"col" => "6",
			),	

		array(	
				"field" => "cargo", 
				"label" => "Cargo",
				"label_plural" => "Cargos",
				"col" => "6",
				"wrap" => "3", /* quebra Linha */
			),	

		array(	
				"field" => "email", 
				"label" => "Email",
				"label_plural" => "Emails",
				"col" => "6",
			),

		array(	
				"field" => "observacao", 
				"label" => "Observação",
				"label_plural" => "Observações",
				"col" => "12",
				"wrap" => "3", /* quebra Linha */
			),

		array(	
				"field" => "datainclusao", 
				"label" => "Data Inclusão",
				"label_plural" => "Datas Inclusões",
				"col" => "2",
				"readonly" => "Yes",
				"date_insert" => "Yes", // Atualiza com o horario do servidor banco de dados, quando incluir um registro								
			),

		array(	
				"field" => "dataatualizacao", 
				"label" => "Data Atualização",
				"label_plural" => "Datas Atualizações",
				"col" => "2",
				"readonly" => "Yes",
				"date_update" => "Yes", // Atualiza com o horario do servidor banco de dados, quando atualizar um registro				
			),

		array(	
				"field" => "usuario", 
				"label" => "Usuário",
				"label_plural" => "Usuários",
				"col" => "2",
				"readonly" => "Yes",
				"user_update" => "Yes", // Atualiza com o usuário logado, tem 40 posições								
			),

		array(	
				"field" => "excluido", 
				"label" => "Excluido",
				"label_plural" => "Excluido",
				"col" => "2",
				"radio" => "Yes",
				"option" => "Sim|Não",
				"value" => "1|0",
				"wrap" => "Yes",     /* quebra Linha */	
				"defaultvalue" => 0,
				"delete" => "No",    /* No - da update no campo com 1*/				
			),		

	);