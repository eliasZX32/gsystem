<?php	

	$fields = array(
		array(	
				"field" => "nr_pedido", 
				"label" => "Número",
				"label_plural" => "Números",
				"filter" => "Yes",
				"grid" => "all", /* all - mostra no computador e no mobile, computer - Só no computador, mobile - só no mobiles*/
				"col" => "1:1",
				"increment" => "1", /* Em caso de indice, se Estiver como NO na inclução o campo fica aberto para digitação */
			),

		array(	
				"field" => "nr_item", 
				"label" => "Item",
				"label_plural" => "Itens",
				"grid" => "all", /* all - mostra no computador e no mobile, computer - Só no computador, mobile - só no mobiles*/
				"col" => "1",
			),

		array(	
				"field" => "fl_Baixado", 
				"label" => "Baixado",
				"label_plural" => "Baixados",
				"col" => "2",
				"radio" => "Yes",
				"option" => "Sim|Não",
				"value" => "1|0",
				"defaultvalue" => 0,					
				"wrap" => "3", /* Yes- quebra uma linha, ou digite o numero de linha para quebrar mais de uma Linha */

			),	

		array(	
				"field" => "cd_produto", 
				"label" => "Produto",
				"label_plural" => "Produtos",
				"grid" => "all", /* all - mostra no computador e no mobile, computer - Só no computador, mobile - só no mobiles*/
				"col" => "9:6",
				"filter" => "Yes",	
				"table_ext" => "tb_materias_primas",
				"id_ext" => "cd_produto",
				"show_ext" => "ds_produto,cd_produto",
				"order_ext" => "ds_produto",
				"id_filds_relation" => "cd_produto",
				"tag" => "select",
				"wrap" => "3", /* Yes- quebra uma linha, ou digite o numero de linha para quebrar mais de uma Linha */
			),

		array(	
				"field" => "ds_unidade", 
				"label" => "Unidade",
				"label_plural" => "Unidades",
				"col" => "2",
			),

		array(	
				"field" => "qt_produto", 
				"label" => "Quantidade",
				"label_plural" => "Quantidades",
				"col" => "2",
			),

		array(	
				"field" => "qt_cubado", 
				"label" => "Cubado",
				"label_plural" => "Cubados",
				"col" => "2",
			),	

		array(	
				"field" => "vr_unitario", 
				"label" => "Vlr. Unitario",
				"label_plural" => "Vlr. Unitarios",
				"col" => "2",
			),	

		array(	
				"field" => "vr_total", 
				"label" => "Vlr. Total",
				"label_plural" => "Vlr. Unitarios",
				"col" => "2",
				"wrap" => "3", /* Yes- quebra uma linha, ou digite o numero de linha para quebrar mais de uma Linha */

			),		

		array(	
				"field" => "pc_icms_credito", 
				"label" => "(%) ICMS Crédito",
				"label_plural" => "(%) ICMS Créditos",
				"col" => "2",
			),	

		array(	
				"field" => "vr_icms_credito", 
				"label" => "Vlr. ICMS Crédito",
				"label_plural" => "Vlr. ICMS Créditos",
				"col" => "2",
			),										

		array(	
				"field" => "pc_ipi_acrecimo", 
				"label" => "(%) IPI Crédito",
				"label_plural" => "(%) IPI Créditos",
				"col" => "2",
			),	

		array(	
				"field" => "vr_ipi_acrecimo", 
				"label" => "Vlr. IPI Crédito",
				"label_plural" => "Vlr. IPI Créditos",
				"col" => "2",
				"wrap" => "3", /* Yes- quebra uma linha, ou digite o numero de linha para quebrar mais de uma Linha */

			),		
	
		array(	
				"field" => "vr_base_calculo_frete", 
				"label" => "Vlr. Base Calculo Frete",
				"label_plural" => "Vlr. Base Calculo Fretes",
				"col" => "2",
			),	

	
		array(	
				"field" => "ds_unidade_frete", 
				"label" => "Unidade Frete",
				"label_plural" => "Unidade Fretes",
				"col" => "2",
			),	

		array(	
				"field" => "vr_unidade_Frete", 
				"label" => "Vlr. Unidade Frete",
				"label_plural" => "Vlr. Unidade Fretes",
				"col" => "2",
			),	

		array(	
				"field" => "vr_frete_total", 
				"label" => "Vlr. Frete Total",
				"label_plural" => "Vlr. Frete Totais",
				"col" => "2",
			),

		array(	
				"field" => "vr_desconto", 
				"label" => "Vlr. Desconto",
				"label_plural" => "Vlr. Desconto",
				"col" => "2",
			),	

		array(	
				"field" => "vr_juros", 
				"label" => "Vlr. Juro",
				"label_plural" => "Vlr. Juros",
				"col" => "2",
				"wrap" => "3", /* Yes- quebra uma linha, ou digite o numero de linha para quebrar mais de uma Linha */

			),	

		array(	
				"field" => "nr_orcamento", 
				"label" => "Nro. Orçamento",
				"label_plural" => "Nro. Orçamentos",
				"col" => "2",
			),

		array(	
				"field" => "dt_prev_entrega", 
				"label" => "Prev. Entrega",
				"label_plural" => "Prev. Entregas",
				"col" => "2",
			),	

		array(	
				"field" => "dt_entrega", 
				"label" => "Entrega",
				"label_plural" => "Entregas",
				"col" => "2",
				"wrap" => "3", /* Yes- quebra uma linha, ou digite o numero de linha para quebrar mais de uma Linha */
			),	

		array(	
				"field" => "dt_atualizacao", 
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
	);

