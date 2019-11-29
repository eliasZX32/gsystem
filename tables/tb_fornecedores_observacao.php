<?php	

	$fields = array(

		array(	
				"field" => "cd_fornecedor", 
				"label" => "Código",
				"label_plural" => "Código",
				"col" => "1",
			),

		array(	
				"field" => "ds_observacao", 
				"label" => "Observação",
				"label_plural" => "Observações",
				"grid" => "all", /* all - mostra no computador e no mobile, computer - Só no computador, mobile - só no mobiles */
				"col" => "10:8",
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