<?php	

	$fields = array(
		array(	
				"field" => "cd_tipo_produto_calculo", 
				"label" => "id",
				"label_plural" => "id",
				//"grid" => "hide", /* Hide - Não mostra mais carrega - show ou '' - Mostra */
				"col" => "1:1",
				"wrap" => "Yes", /* quebra Linha */
				"increment" => "1", /* Em caso de indice, se Estiver como NO na inclução o campo fica aberto para digitação */
				"grid" => "all", /* all - mostra no computador e no mobile, computer - Só no computador, mobile - só no mobiles */
			),


		array(	
				"field" => "cd_produto", 
				"label" => "Produto Acabado",
				"label_plural" => "Produtos",
				"grid" => "all", /* all - mostra no computador e no mobile, computer - Só no computador, mobile - só no mobiles */
				"col" => "9:6",
				"wrap" => "2",       /* Yes- quebra uma linha, ou digite o numero de linha para quebrar mais de uma Linha */
				"table_ext" => "tb_produtos_acabados",
				"id_ext" => "cd_produto_acabados",
				"show_ext" => "ds_produto_acabados,cd_produto_acabados",
				"order_ext" => "ds_produto_acabados",
				"id_filds_relation" => "cd_produto",
				"tag" => "select",				
			),		

		array(	
				"field" => "cd_tipo_produto", 
				"label" => "Tipo Produto",
				"label_plural" => "Tipo Produto",
				//"grid" => "show",      /* Hide - Não mostra mais carrega - show ou '' - Mostra */
				"col" => "4",
				"filter" => "Yes",
				"wrapfilter" => "Yes", /* quebra Linha no filtro*/	
				"table_ext" => "tb_tipos_produtos",
				"id_ext" => "cd_tipo_produto",
				"show_ext" => "ds_tipo_produto,cd_tipo_produto",
				"order_ext" => "ds_tipo_produto",
				"id_filds_relation" => "cd_tipo_produto",
				"tag" => "select",				
			),	

		array(	
				"field" => "cd_sub_tipo_produto", 
				"label" => "Sub-Tipo Produto",
				"label_plural" => "Sub-Tipo Produto",
				//"grid" => "show",      /* Hide - Não mostra mais carrega - show ou '' - Mostra */
				"col" => "4",
				"filter" => "Yes",
				"wrapfilter" => "Yes", /* quebra Linha no filtro*/	
				"table_ext" => "tb_sub_tipo_produto",
				"id_ext" => "cd_sub_tipo_produto",
				"show_ext" => "ds_sub_tipo_produto,cd_sub_tipo_produto",
				"order_ext" => "ds_sub_tipo_produto",
				"id_filds_relation" => "cd_sub_tipo_produto",
				"tag" => "select",				
			),	

		array(	
				"field" => "cd_qualidade", 
				"label" => "Qualidade",
				"label_plural" => "Qualidades",
				//"grid" => "show",      /* Hide - Não mostra mais carrega - show ou '' - Mostra */
				"col" => "4",
				"wrap" => "2",       /* Yes- quebra uma linha, ou digite o numero de linha para quebrar mais de uma Linha */
				"filter" => "Yes",
				"wrapfilter" => "Yes", /* quebra Linha no filtro*/	
				"table_ext" => "tb_qualidades",
				"id_ext" => "cd_qualidade",
				"show_ext" => "ds_qualidade,cd_qualidade",
				"order_ext" => "ds_qualidade",
				"id_filds_relation" => "cd_qualidade",
				"tag" => "select",				
			),	



		array(	
				"field" => "nm_materia_prima_ecp", 
				"label" => "Nome Matéria Prima ECP",
				"label_plural" => "Nome Matéria Prima ECP",
				//"grid" => "show",
				"col" => "4",
				"filter" => "Yes",									
				//"wrap" => "2",       /* Yes- quebra uma linha, ou digite o numero de linha para quebrar mais de uma Linha */
			),		

		array(	
				"field" => "ds_produto", 
				"label" => "Descrição Produto",
				"label_plural" => "Descrição Produto",
				"grid" => "show",
				"col" => "6",
				"filter" => "Yes",									
				//"wrap" => "2",       /* Yes- quebra uma linha, ou digite o numero de linha para quebrar mais de uma Linha */
			),		

		array(	
				"field" => "nm_produto", 
				"label" => "Nome Produto",
				"label_plural" => "Descrições",
				"grid" => "show",
				"col" => "6",
				"filter" => "Yes",									
				"wrap" => "2",       /* Yes- quebra uma linha, ou digite o numero de linha para quebrar mais de uma Linha */
			),

		array(	
				"field" => "ds_materia_prima_abreviado", 
				"label" => "Descrição Matéria Prima Abreviado",
				"label_plural" => "Descrição Matéria Prima Abreviado",
				"grid" => "show",
				"col" => "4",
				"filter" => "Yes",									
				//"wrap" => "2",       /* Yes- quebra uma linha, ou digite o numero de linha para quebrar mais de uma Linha */
			),	

		array(	
				"field" => "ds_tipo_conceito_custo", 
				"label" => "Tipo Conceito Custo",
				"label_plural" => "Tipo Conceito Custo",
				//"grid" => "show",
				"col" => "4",
				"filter" => "Yes",									
				"wrap" => "2",       /* Yes- quebra uma linha, ou digite o numero de linha para quebrar mais de uma Linha */
			),		

		array(	
				"field" => "ds_unidade_calculo", 
				"label" => "Unidade",
				"label_plural" => "Unidades",
				//"grid" => "show",
				"col" => "4",
				"filter" => "Yes",									
				"wrap" => "2",       /* Yes- quebra uma linha, ou digite o numero de linha para quebrar mais de uma Linha */
			),		


		array(	
				"field" => "vr_unidade", 
				"label" => "Valor Unidade",
				"label_plural" => "Valores Unidade",
				//"grid" => "show",
				"col" => "2",
			),

		array(	
				"field" => "perc_icms_credito", 
				"label" => "(%) ICMS Crédito",
				"label_plural" => "(%) ICMS Crédito",
				//"grid" => "show",
				"col" => "2",
			),

		array(	
				"field" => "perc_ipi_acrescimo", 
				"label" => "(%) IPI Acréscimo ",
				"label_plural" => "(%) IPI Acréscimo",
				//"grid" => "show",
				"col" => "2",
			),
			

	);
