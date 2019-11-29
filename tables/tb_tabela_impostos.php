<?php	

	$fields = array(
		array(	
				"field" => "cd_tabela_impostos", 
				"label" => "id",
				"label_plural" => "id",
				"grid" => "hide", /* Hide - Não mostra mais carrega - show ou '' - Mostra */
				"col" => "2",
				"wrap" => "Yes", /* quebra Linha */
				"increment" => "1", /* Em caso de indice, se Estiver como NO na inclução o campo fica aberto para digitação */
			),
			
		array(	
				"field" => "ds_tabela_impostos", 
				"label" => "Descrição",
				"label_plural" => "Descrições",
				"grid" => "all", /* all - mostra no computador e no mobile, computer - Só no computador, mobile - só no mobiles */
				"col" => "4",
				"filter" => "Yes",									
				"wrap" => "2",       /* Yes- quebra uma linha, ou digite o numero de linha para quebrar mais de uma Linha */
			),

		array(	
				"field" => "perc_icms", 
				"label" => "(%) ICMS ",
				"label_plural" => "(%) ICMS",
				"grid" => "show",
				"col" => "2",
			),

		array(	
				"field" => "perc_irpj", 
				"label" => "(%) IRPJ ",
				"label_plural" => "(%) IRPJ",
				"grid" => "show",
				"col" => "2",
			),

		array(	
				"field" => "perc_cofins", 
				"label" => "(%) COFINS ",
				"label_plural" => "(%) COFINS",
				"grid" => "show",
				"col" => "2",
			),		

		array(	
				"field" => "perc_contrib_social", 
				"label" => "(%) Contrib. Social ",
				"label_plural" => "(%) Contrib. Social",
				"col" => "2",
				"grid" => "show",
				"wrap" => "2",       /* Yes- quebra uma linha, ou digite o numero de linha para quebrar mais de uma Linha */
			),		

		array(	
				"field" => "perc_pis", 
				"label" => "(%) PIS ",
				"label_plural" => "(%) PIS",
				"grid" => "show",
				"col" => "2",
			),		

		array(	
				"field" => "perc_ipi", 
				"label" => "(%) IPI",
				"label_plural" => "(%) COFINS",
				"grid" => "show",
				"col" => "2",
			),		

		array(	
				"field" => "perc_impostos_unico", 
				"label" => "(%) Imposto Unico",
				"label_plural" => "(%) Imposto Unico",
				"grid" => "show",
				"col" => "2",
			),		

		array(	
				"field" => "cst_pis", 
				"label" => "CST PIS",
				"label_plural" => "CST PIS",
				"col" => "2",
			),	

		array(	
				"field" => "cst_cofins", 
				"label" => "CST COFINS",
				"label_plural" => "CST COFINS",
				"col" => "2",
			),

		array(	
				"field" => "tabelapadrao", 
				"label" => "Tabela Padrão",
				"label_plural" => "Tabela Padrão",
				"col" => "2",
				"wrap" => "2",       /* Yes- quebra uma linha, ou digite o numero de linha para quebrar mais de uma Linha */
			),	

		array(	
				"field" => "dataatualizacao", 
				"label" => "Data Atualização",
				"label_plural" => "Datas Atualizações",
				"col" => "2",
				"readonly" => "Yes",
				"date_update" => "Yes", // Atualiza com o horario do servidor banco de dados, quando atualizar um registro												
			),

		array(	
				"field" => "usuario", 
				"label" => "Usuário",
				"label_plural" => "Usuários",
				"col" => "4",
				"readonly" => "Yes",
				"user_update" => "Yes", // Atualiza com o usuário logado, tem 40 posições								
			),

		array(	
				"field" => "excluido", 
				"label" => "Excluído",
				"label_plural" => "Excluídos",
				"col" => "2",
				"radio" => "Yes",
				"option" => "Sim|Não",
				"value" => "1|0",
				"defaultvalue" => 0,
				"readonly" => "Yes",	
				"delete" => "No",    /* No - da update no campo com 1*/									
			),										
	);
