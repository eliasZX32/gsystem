<?php	

	$fields = array(

		array(	
				"field" => "cd_cliente", 
				"label" => "Código",
				"label_plural" => "codigo",
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
			),

		array(	
				"field" => "dataatualizacao", 
				"label" => "Data Atualização",
				"label_plural" => "Datas Atualizações",
				"col" => "2",
				"readonly" => "Yes",
			),

		array(	
				"field" => "usuario", 
				"label" => "Usuário",
				"label_plural" => "Usuários",
				"col" => "2",
				"readonly" => "Yes",
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