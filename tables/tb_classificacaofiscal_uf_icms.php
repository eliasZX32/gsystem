<?php	

	$fields = array(
		
		array(	
				"field" => "cd_classificacaofiscal", 
				"label" => "Código",
				"label_plural" => "Códigos",
				"col" => "2",
			),
			
		array(	
				"field" => "uf", 
				"label" => "UF",
				"label_plural" => "UFs",
				"grid" => "all", /* all - mostra no computador e no mobile, computer - Só no computador, mobile - só no mobiles */
				"col" => "2",
			),

		array(	
				"field" => "icms", 
				"label" => "ICMS",
				"label_plural" => "ICMSs",
				"grid" => "all", /* all - mostra no computador e no mobile, computer - Só no computador, mobile - só no mobiles */
				"col" => "2",
			),

		array(	
				"field" => "st", 
				"label" => "ST",
				"label_plural" => "STs",
				"grid" => "all", /* all - mostra no computador e no mobile, computer - Só no computador, mobile - só no mobiles */
				"col" => "2",
				"wrap" => "Yes", /* quebra Linha */
			),

		array(	
				"field" => "ds_observacao", 
				"label" => "Observação",
				"label_plural" => "Observações",
				"col" => "12",
			),			

	);