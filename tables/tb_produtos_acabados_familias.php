<?php	

	$fields = array(
		
		array(	
				"field" => "cd_produto_acabado_familia", 
				"label" => "Código",
				"label_plural" => "Códigos",
				"col" => "2",
				"grid" => "all", /* all - mostra no computador e no mobile, computer - Só no computador, mobile - só no mobiles */
				"wrap" => "3", /* quebra Linha */
				"filter" => "Yes",
				"wrapfilter" => "Yes", /* quebra Linha no filtro*/
				"increment" => "1", 				/* Em caso de indice, se Estiver como NO na inclução o campo fica aberto para digitação */
				"incrementfield" => "cd_produto_acabado_familia", /* Coloca o nome explicito para receber o proximo codigo 
														esse campo recebera o max do propio campo + o valor "increment", 
														caso o nome do campo for id não é preciso declarar essa propiedade  */
			),
		
		array(	
				"field" => "ds_produto_acabado_familia", 
				"label" => "Descrição Família",
				"label_plural" => "Descrições Famílias",
				"grid" => "all", /* all - mostra no computador e no mobile, computer - Só no computador, mobile - só no mobiles */
				"col" => "6",
				"wrap" => "3", /* quebra Linha */
				"filter" => "Yes",
				"wrapfilter" => "Yes", /* quebra Linha no filtro*/
			),		
	);