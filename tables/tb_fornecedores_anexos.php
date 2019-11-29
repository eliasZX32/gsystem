<?php	

	$fields = array(

		array(	
				"field" => "cd_fornecedor", 
				"label" => "Código",
				"label_plural" => "Código",
				"col" => "1",
			),

		array(	
				"field" => "nr_consulta", 
				"label" => "Número",
				"label_plural" => "Números",
				"grid" => "all", /* all - mostra no computador e no mobile, computer - Só no computador, mobile - só no mobiles */
				"col" => "1",
				"wrap" => "3",    /* quebra Linha */
			),	

		array(	
				"field" => "nm_arquivo", 
				"label" => "Nome Arquivo",
				"label_plural" => "Nome Arquivos",
				"col" => "6",
			),

		array(	
				"field" => "nm_arquivoOriginal", 
				"label" => "Nome Original",
				"label_plural" => "Nome Original",
				"col" => "6",
				"wrap" => "3",    /* quebra Linha */
				"readonly" => "Yes",
			),

	
		array(	
				"field" => "ds_anexo", 
				"label" => "Descrição",
				"label_plural" => "Descrições",
				"col" => "8:7",
				"grid" => "all", /* all - mostra no computador e no mobile, computer - Só no computador, mobile - só no mobiles */
				"wrap" => "3",    /* quebra Linha */
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
	);





