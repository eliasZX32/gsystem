<?php	

	$fields = array(
		
		array(	
				"field" => "cd_funcionario_grupo", 
				"label" => "Código",
				"label_plural" => "Códigos",
				"col" => "1",
				"wrap" => "3", /* quebra Linha */
				"filter" => "Yes",
				"wrapfilter" => "Yes", /* quebra Linha no filtro*/
				"increment" => "1", 				/* Em caso de indice, se Estiver como NO na inclução o campo fica aberto para digitação */
				"incrementfield" => "cd_funcionario_grupo", /* Coloca o nome explicito para receber o proximo codigo 
														esse campo recebera o max do propio campo + o valor "increment", 
														caso o nome do campo for id não é preciso declarar essa propiedade  */
				"grid" => "all", /* Hide - Não mostra mais carrega - show ou '' - Mostra */
			),
		
		array(	
				"field" => "ds_funcionario_grupo", 
				"label" => "Grupo",
				"label_plural" => "Grupos",
				"grid" => "all", /* Hide - Não mostra mais carrega - show ou '' - Mostra */
				"col" => "3",
				"wrap" => "3", /* quebra Linha */
				"filter" => "Yes",
				"wrapfilter" => "Yes", /* quebra Linha no filtro*/
			),		

		array(	
				"field" => "ativo", 
				"label" => "Ativo",
				"label_plural" => "Ativos",
				"col" => "2",
				"filter" => "Yes", 
				"radio" => "Yes",
				"option" => "Sim|Não",
				"value" => "1|0",
				"defaultvalue" => 1,
				"grid" => "all", /* Hide - Não mostra mais carrega - show ou '' - Mostra */

			)
	);