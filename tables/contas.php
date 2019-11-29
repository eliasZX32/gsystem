<?php	

	$fields = array(
		
		array(	
				"field" => "codigocontas", 
				"label" => "Código",
				"label_plural" => "Códigos",
				"col" => "2",
				"wrap" => "3", /* quebra Linha */
				"filter" => "Yes",
				"wrapfilter" => "Yes", /* quebra Linha no filtro*/
				"increment" => "1", 				/* Em caso de indice, se Estiver como NO na inclução o campo fica aberto para digitação */
				"incrementfield" => "codigocontas", /* Coloca o nome explicito para receber o proximo codigo 
														esse campo recebera o max do propio campo + o valor "increment", 
														caso o nome do campo for id não é preciso declarar essa propiedade  */
			),
		
		array(	
				"field" => "descricao", 
				"label" => "Descrição",
				"label_plural" => "Descrições",
				"grid" => "all", /* all - mostra no computador e no mobile, computer - Só no computador, mobile - só no mobiles*/
				"col" => "6",
				"wrap" => "3", /* quebra Linha */
				"filter" => "Yes",
				"wrapfilter" => "Yes", /* quebra Linha no filtro*/
			),		

		array(	
				"field" => "administrador", 
				"label" => "Administrador",
				"label_plural" => "Administradores",
				"col" => "4",
				"filter" => "Yes", 
				"radio" => "Yes",
				"option" => "Sim|Não",
				"value" => "1|0",
				"wrap" => "Yes", /* quebra Linha */	
				"defaultvalue" => 0,
			)
	);
