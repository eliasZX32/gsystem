<?php	

	$fields = array(
		
		array(	
				"field" => "cd_produto_acabados", 
				"label" => "Código",
				"label_plural" => "Códigos",
				"grid" => "all", /* all - mostra no computador e no mobile, computer - Só no computador, mobile - só no mobiles */
				"col" => "2",
				"wrap" => "3", /* Yes- quebra uma linha, ou digite o numero de linha para quebrar mais de uma Linha */
				"filter" => "Yes",
				"wrapfilter" => "Yes", /* quebra Linha no filtro*/	
			),
			
		array(	
				"field" => "ds_produto_acabados", 
				"label" => "Produto Acabado",
				"label_plural" => "Produtos Acabados",
				"grid" => "all", /* all - mostra no computador e no mobile, computer - Só no computador, mobile - só no mobiles */
				"col" => "12",
				"wrap" => "2",       /* Yes- quebra uma linha, ou digite o numero de linha para quebrar mais de uma Linha */
				"filter" => "Yes",
			),

		array(	
				"field" => "cd_produto_acabado_familia", 
				"label" => "Produto Acabado Família",
				"label_plural" => "Produtos Acabados Famílias",
				"grid" => "all", /* all - mostra no computador e no mobile, computer - Só no computador, mobile - só no mobiles */
				"col" => "10",
				"wrap" => "2",       /* Yes- quebra uma linha, ou digite o numero de linha para quebrar mais de uma Linha */
				"filter" => "Yes",
				"wrapfilter" => "Yes", /* quebra Linha no filtro*/	
				"table_ext" => "tb_produtos_acabados_familias",
				"id_ext" => "cd_produto_acabado_familia",
				"show_ext" => "ds_produto_acabado_familia,cd_produto_acabado_familia",
				"order_ext" => "ds_produto_acabado_familia",
				"id_filds_relation" => "cd_produto_acabado_familia",
				"tag" => "select",				
			),

		array(	
				"field" => "ds_observacao", 
				"label" => "Observação",
				"label_plural" => "Observações",
				"col" => "12",
				"wrap" => "2",       /* Yes- quebra uma linha, ou digite o numero de linha para quebrar mais de uma Linha */
				"filter" => "Yes",
				"wrapfilter" => "Yes", /* quebra Linha no filtro*/	
			),

		array(	
				"field" => "comprado", 
				"label" => "Comprado",
				"label_plural" => "Comprados",
				"col" => "3",
				"filter" => "Yes",
				"radio" => "Yes",
				"option" => "Sim|Não",
				"value" => "1|0",
				"defaultvalue" => 0,					
			),

		array(	
				"field" => "produtosemespecificacao", 
				"label" => "Produtos sem Especificação",
				"label_plural" => "Produtos sem Especificações",
				"col" => "3",
				"filter" => "Yes",
				"radio" => "Yes",
				"option" => "Sim|Não",
				"value" => "1|0",
				"defaultvalue" => 0,	
				"wrap" => "2",       /* Yes- quebra uma linha, ou digite o numero de linha para quebrar mais de uma Linha */

			),

		array(	
				"field" => "ativo", 
				"label" => "Ativo",
				"label_plural" => "Ativos",
				"col" => "3",
				"wrap" => "2",       /* Yes- quebra uma linha, ou digite o numero de linha para quebrar mais de uma Linha */
				"filter" => "Yes",
				"wrapfilter" => "Yes", /* quebra Linha no filtro*/	
				"radio" => "Yes",
				"option" => "Sim|Não",
				"value" => "1|0",
				"defaultvalue" => 1,					
			),

		array(	
				"field" => "ds_observacao_lista", 
				"label" => "Observação Lista",
				"label_plural" => "Observações Listas",
				"col" => "6",
				"wrap" => "Yes", /* quebra Linha */
			),

		array(	
				"field" => "dt_criacao_lista", 
				"label" => "Criação Lista",
				"label_plural" => "Criações Listas",
				"col" => "3",
			),

		array(	
				"field" => "dt_atualizacao_lista", 
				"label" => "Atualização Lista",
				"label_plural" => "Atualizacões Listas",
				"col" => "3",
				"wrap" => "2",       /* Yes- quebra uma linha, ou digite o numero de linha para quebrar mais de uma Linha */
			),

		array(	
				"field" => "vr_mp_nao_locavel", 
				"label" => "Matéria Prima não Locável",
				"label_plural" => "Matérias Primas não Locáveis",
				"col" => "3",
			),

		array(	
				"field" => "cd_pnf_pu", 
				"label" => "PNF PU",
				"label_plural" => "PNF PU",
				"col" => "2",
				"filter" => "Yes",
			),


		array(	
				"field" => "cean", 
				"label" => "CEAN",
				"label_plural" => "CEANs",
				"col" => "2",
			),

		array(	
				"field" => "ceantrib", 
				"label" => "CEANTRIB", //nao sei oq é//
				"label_plural" => "CEANTRIBs",
				"col" => "2",
				"wrap" => "2",       /* Yes- quebra uma linha, ou digite o numero de linha para quebrar mais de uma Linha */
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
			),

		array(	
				"field" => "dt_inclusao", 
				"label" => "Data Inclusão",
				"label_plural" => "Datas Inclusões",
				"col" => "2",
				"readonly" => "Yes",
				"date_insert" => "Yes", // Atualiza com o horario do servidor banco de dados, quando incluir um registro												
			),
		
		array(	
				"field" => "dataatualizacao", 
				"label" => "Data Atualização",
				"label_plural" => "Datas Atualizações",
				"col" => "2",
				"readonly" => "Yes",
				"date_update" => "Yes", // Atualiza com o horario do servidor banco de dados, quando atualizar um registro														
			),
	);