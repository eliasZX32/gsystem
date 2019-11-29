<?php	

	$fields = array(
		
		array(	
				"field" => "cd_cliente", 
				"label" => "Código",
				"label_plural" => "Clientes",
				"col" => "1",
			),

		array(	
				"field" => "nr_consulta", 
				"label" => "Número",
				"label_plural" => "Números",
				"col" => "1",
				"wrap" => "3",    /* quebra Linha */
			),		

		array(	
				"field" => "dt_validade", 
				"label" => "Data Validade",
				"label_plural" => "Datas Validades",
				"col" => "2",
				"grid" => "all", /* all - mostra no computador e no mobile, computer - Só no computador, mobile - só no mobiles */
			),

		array(	
				"field" => "vr_credito", 
				"label" => "Data Crédito",
				"label_plural" => "Datas Crédito",
				"col" => "2",
				"grid" => "all", /* all - mostra no computador e no mobile, computer - Só no computador, mobile - só no mobiles */
			),

		array(	
				"field" => "sn_sem_credito", 
				"label" => "Sem crédito",
				"label_plural" => "Sem créditos",
				"col" => "2",
				"filter" => "Yes", 
				"radio" => "Yes",
				"option" => "Sim|Não",
				"value" => "1|0",
				"defaultvalue" => 0,				
			),	

		array(	
				"field" => "sn_nao_analisar", 
				"label" => "Não Analisar",
				"label_plural" => "Não Analisar",
				"col" => "2",
				"filter" => "Yes", 
				"radio" => "Yes",
				"option" => "Sim|Não",
				"value" => "1|0",
				"wrap" => "3",    /* quebra Linha */
				"defaultvalue" => 0,				
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
				"wrap" => "Yes", /* quebra Linha */	
				"defaultvalue" => 0,					
			),		

	);