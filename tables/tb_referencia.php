<?php	

	$fields = array(

		array(	
				"field" => "cd_referencia", 
				"label" => "Código",
				"label_plural" => "Código",
				"col" => "1",
				"grid" => "all", /* all - mostra no computador e no mobile, computer - Só no computador, mobile - só no mobiles */				
			),

		array(	
				"field" => "ds_referencia", 
				"label" => "Descrição",
				"label_plural" => "Descrições",
				"grid" => "all", /* all - mostra no computador e no mobile, computer - Só no computador, mobile - só no mobiles */
				"col" => "8",
				"wrap" => "3",    /* quebra Linha */
			),		

		array(	
				"field" => "sn_fornecedor", 
				"label" => "Fornecedor",
				"label_plural" => "Fornecedores",
				"col" => "2",
				"filter" => "Yes", 
				"radio" => "Yes",
				"option" => "Sim|Não",
				"value" => "1|0",
				"defaultvalue" => 0,				
			),	

		array(	
				"field" => "sn_cliente", 
				"label" => "Cliente",
				"label_plural" => "Clientes",
				"col" => "2",
				"filter" => "Yes", 
				"radio" => "Yes",
				"option" => "Sim|Não",
				"value" => "1|0",
				"defaultvalue" => 0,				
			),	

	);