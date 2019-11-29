<?php	

	$fields = array(
		array(	
				"field" => "nr_pedido", 
				"label" => "Número",
				"label_plural" => "Números",
				"filter" => "Yes",
				"grid" => "show", /* Hide - Não mostra mais carrega - show ou '' - Mostra */
				"col" => "1",
				"increment" => "1", /* Em caso de indice, se Estiver como NO na inclução o campo fica aberto para digitação */
				"wrap" => "3", /* Yes- quebra uma linha, ou digite o numero de linha para quebrar mais de uma Linha */
				"grid" => "all", /* all - mostra no computador e no mobile, computer - Só no computador, mobile - só no mobiles*/
			),
			
		array(	
				"field" => "observacao", 
				"label" => "Observação",
				"label_plural" => "Observações",
				"grid" => "show",
				"col" => "9",
				"filter" => "Yes",
				"quantitiesrows" => "5", /* Quatidades de Linha*/
				"tag" => "textarea",	
				"grid" => "all", /* all - mostra no computador e no mobile, computer - Só no computador, mobile - só no mobiles*/
			),

	);
