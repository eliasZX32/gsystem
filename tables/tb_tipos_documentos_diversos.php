<?php	

	$fields = array(
		array(	
				"field" => "cd_tipo_documento", 
				"label" => "id",
				"label_plural" => "id",
				"col" => "2",
				"wrap" => "Yes", /* quebra Linha */
				"increment" => "1", /* Em caso de indice, se Estiver como NO na inclução o campo fica aberto para digitação */
				"grid" => "all", /* all - mostra no computador e no mobile, computer - Só no computador, mobile - só no mobiles */
			),
			
		array(	
				"field" => "ds_tipo_documento", 
				"label" => "Descrição",
				"label_plural" => "Descrição",
				"col" => "10",
				"grid" => "all", /* all - mostra no computador e no mobile, computer - Só no computador, mobile - só no mobiles */
				"filter" => "Yes",
			)
	);