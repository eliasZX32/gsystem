<?php	

	$fields = array(
		
		array(	
				"field" => "cd_classificacaofiscal", 
				"label" => "Código",
				"label_plural" => "Códigos",
				"col" => "2",
				"wrap" => "Yes",    /* quebra Linha */
				"increment" => "1", /* Em caso de indice, se Estiver como NO na inclução o campo fica aberto para digitação */
				"incrementfield" => "cd_classificacaofiscal", /* Coloca o nome explicito para receber o proximo codigo 
																 esse campo recebera o max do propio campo + o valor "increment", 
																 caso o nome do campo for id não é preciso declarar essa propiedade  */
			),
			
		array(	
				"field" => "ds_classificacaofiscal", 
				"label" => "Class. Fiscal",
				"label_plural" => "Classificações Fiscais",
				"grid" => "all", /* all - mostra no computador e no mobile, computer - Só no computador, mobile - só no mobiles */
				"col" => "4",
				"filter" => "Yes",
				"wrapfilter" => "Yes", /* quebra Linha no filtro*/	
			),

		array(	
				"field" => "ipi", 
				"label" => "IPI",
				"label_plural" => "IPIs",
				"col" => "2",
				"wrap" => "3", /* quebra Linha */
				"filter" => "Yes",
				"wrapfilter" => "Yes", /* quebra Linha no filtro*/	
			),	

		array(	
				"field" => "ds_observacao", 
				"label" => "Observação",
				"label_plural" => "Observações",
				"col" => "12",
			),	

	);