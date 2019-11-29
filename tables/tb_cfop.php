<?php	

	$fields = array(
		
		array(	
				"field" => "cd_cfop", 
				"label" => "Código",
				"label_plural" => "Códigos",
				"grid" => "all", /* all - mostra no computador e no mobile, computer - Só no computador, mobile - só no mobiles*/
				"col" => "2",
				"wrap" => "Yes", /* quebra Linha */
				"filter" => "Yes",
				"wrapfilter" => "Yes", /* quebra Linha no filtro*/
				"increment" => "No", /* Em caso de indice, se Estiver como NO na inclução o campo fica aberto para digitação */
				//"defaultvalue" => 0,
			),

		array(	
				"field" => "fl_faturamento", 
				"label" => "Participa faturamento",
				"label_plural" => "Participa faturamento",
				"col" => "4",
				"grid" => "all", /* all - mostra no computador e no mobile, computer - Só no computador, mobile - só no mobiles*/
				"filter" => "Yes", 
				"radio" => "Yes",
				"option" => "Sim|Não",
				"value" => "1|0",
				"wrap" => "Yes", /* quebra Linha */	
				"defaultvalue" => 0,			
			)
	);
