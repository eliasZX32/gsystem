<?php	

	$fields = array(
		
		array(	
				"field" => "cd_qualidade", 
				"label" => "Código",
				"label_plural" => "Códigos",
				"grid" => "all", /* all - mostra no computador e no mobile, computer - Só no computador, mobile - só no mobiles */
				"col" => "2",
				"wrap" => "Yes", /* quebra Linha */
				"filter" => "Yes",
				"wrapfilter" => "Yes", 				/* quebra Linha no filtro*/	
				"increment" => "1", 				/* Em caso de indice, se Estiver como NO na inclução o campo fica aberto para digitação */
				"incrementfield" => "cd_qualidade", /* Coloca o nome explicito para receber o proximo codigo 
														esse campo recebera o max do propio campo + o valor "increment", 
														caso o nome do campo for id não é preciso declarar essa propiedade  */
			),
			
		array(	
				"field" => "ds_qualidade", 
				"label" => "Descrição",
				"label_plural" => "Descrições",
				"grid" => "all", /* all - mostra no computador e no mobile, computer - Só no computador, mobile - só no mobiles */
				"col" => "10",
				"wrap" => "Yes", /* quebra Linha */
				"filter" => "Yes",
				"wrapfilter" => "Yes", /* quebra Linha no filtro*/	
			),		

	);