<?php	

	$fields = array(
		array(	
				"field" => "cd_uf", 
				"label" => "Sigla",
				"label_plural" => "Siglas",
				"col" => "2",
				"grid" => "all", /* all - mostra no computador e no mobile, computer - Só no computador, mobile - só no mobiles */
				"filter" => "Yes",
				"wrapfilter" => "Yes", /* quebra Linha no filtro*/
				"wrap" => "3", /* quebra Linha */
			),
			
		array(	
				"field" => "ds_uf", 
				"label" => "Descrição",
				"label_plural" => "Descrições",
				"grid" => "all", /* all - mostra no computador e no mobile, computer - Só no computador, mobile - só no mobiles */
				"col" => "4",
				"filter" => "Yes",
				"wrapfilter" => "Yes", /* quebra Linha no filtro*/
				"wrap" => "3", /* quebra Linha */								
			),

		array(	
				"field" => "uf_ibge", 
				"label" => "IBGE",
				"label_plural" => "IBGE",
				"col" => "3",
			),

		array(	
				"field" => "icms", 
				"label" => "ICMS",
				"label_plural" => "ICMS",
				"col" => "3",
			),

		array(	
				"field" => "st", 
				"label" => "ST",
				"label_plural" => "ST",
				"col" => "3",
			),

		array(	
				"field" => "cfop", 
				"label" => "CFOP",
				"label_plural" => "CFOP",
				"col" => "3",
				"filter" => "Yes",
			),
	);

	