<?php	

	$fields = array(
		array(	
				"field" => "nr_pedido", 
				"label" => "Número",
				"label_plural" => "Números",
				"filter" => "Yes",
				"grid" => "all", /* all - mostra no computador e no mobile, computer - Só no computador, mobile - só no mobiles */
				"col" => "1:1",
				"increment" => "1", /* Em caso de indice, se Estiver como NO na inclução o campo fica aberto para digitação */
				"orderby" => "DESC",			
			),

		array(	
				"field" => "fl_baixado", 
				"label" => "Baixado",
				"label_plural" => "Baixados",
				"col" => "2",
				"filter" => "Yes",
				"radio" => "Yes",
				"option" => "Sim|Não",
				"value" => "1|0",
				"defaultvalue" => 1,					
			),

		array(	
				"field" => "fl_cancelado", 
				"label" => "Cancelado",
				"label_plural" => "Cancelados",
				"col" => "2",
				"filter" => "Yes",
				"wrapfilter" => "Yes", /* quebra Linha no filtro*/	
				"radio" => "Yes",
				"option" => "Sim|Não",
				"value" => "1|0",
				"defaultvalue" => 1,					
				"wrap" => "3", /* Yes- quebra uma linha, ou digite o numero de linha para quebrar mais de uma Linha */
			),			

		array(	
				"field" => "dt_pedido", 
				"label" => "Data Pedido",
				"label_plural" => "Data Pedidos",
				"col" => "2:1",
				"grid" => "all", /* all - mostra no computador e no mobile, computer - Só no computador, mobile - só no mobiles*/
				"filter" => "Yes",
			),

		array(	
				"field" => "dt_prev_entrega", 
				"label" => "Data Previsão Entrega",
				"label_plural" => "Data Previsões Entregas",
				"col" => "2",
				"filter" => "Yes",
			),

		array(	
				"field" => "dt_entrega", 
				"label" => "Data Entrega",
				"label_plural" => "Data Entregas",
				"col" => "2",
				"filter" => "Yes",
			),

		array(	
				"field" => "dt_fechamento", 
				"label" => "Data Fechamento",
				"label_plural" => "Data Fechamento",
				"col" => "2",
				"filter" => "Yes",
				"wrap" => "2",       /* Yes- quebra uma linha, ou digite o numero de linha para quebrar mais de uma Linha */
			),
		array(	
				"field" => "cd_fornecedor", 
				"label" => "Fornecedor",
				"label_plural" => "Fornecedores",
				"grid" => "all", /* all - mostra no computador e no mobile, computer - Só no computador, mobile - só no mobiles*/
				"col" => "4:6",
				"filter" => "Yes",	
				"table_ext" => "tb_fornecedores",
				"id_ext" => "cd_fornecedor",
				"show_ext" => "nm_razao,cd_fornecedor",
				"order_ext" => "nm_razao",
				"id_filds_relation" => "cd_fornecedor",
				"tag" => "select",	

			),

		array(	
				"field" => "nr_documento", 
				"label" => "Documento",
				"label_plural" => "Documentos",
				"col" => "1:2",
				"grid" => "all", /* all - mostra no computador e no mobile, computer - Só no computador, mobile - só no mobiles*/
				"filter" => "Yes",
			),

		array(	
				"field" => "nm_contato", 
				"label" => "Contato",
				"label_plural" => "Contatos",
				"col" => "4",
				"filter" => "Yes",
				"wrap" => "2", /* Yes- quebra uma linha, ou digite o numero de linha para quebrar mais de uma Linha */
			),

		array(	
				"field" => "vr_diferenca", 
				"label" => "Valor Diferença",
				"label_plural" => "Valores Diferenças",
				"col" => "2",
			),

		array(	
				"field" => "vr_financeiro", 
				"label" => "Valor Financeiro",
				"label_plural" => "Valores Financeiros",
				"col" => "2",
			),

		array(	
				"field" => "vr_juros", 
				"label" => "Valor Juro",
				"label_plural" => "Valores Juros",
				"col" => "2",
			),

		array(	
				"field" => "vr_desconto", 
				"label" => "Valor Desconto",
				"label_plural" => "Valores Descontos",
				"col" => "2",
				"wrap" => "2",       /* Yes- quebra uma linha, ou digite o numero de linha para quebrar mais de uma Linha */
			),

		array(	
				"field" => "ds_finalidade", 
				"label" => "Finalidade",
				"label_plural" => "Finalidades",
				"col" => "2",
				"filter" => "Yes",
			),

		array(	
				"field" => "autorizadopor", 
				"label" => "Autorizado Por",
				"label_plural" => "Autorizado Por",
				"col" => "2",
			),

		array(	
				"field" => "aprovadopor", 
				"label" => "Aprovado Por",
				"label_plural" => "Aprovado Por",
				"col" => "2",
				"wrap" => "2", /* Yes- quebra uma linha, ou digite o numero de linha para quebrar mais de uma Linha */
			),

		array(	
				"field" => "condicaopagamento", 
				"label" => "Condição Pagamento",
				"label_plural" => "Condições Pagamentos",
				"col" => "2",
			),

		array(	
				"field" => "prazodeentrega", 
				"label" => "Prazo de Entrega",
				"label_plural" => "Prazos de Entregas",
				"col" => "2",
			),

		array(	
				"field" => "observacaocomplementar", 
				"label" => "Observação Complementar",
				"label_plural" => "Observações Complementares",
				"col" => "2",
				"wrap" => "2", /* Yes- quebra uma linha, ou digite o numero de linha para quebrar mais de uma Linha */
				"grid" => "all", /* all - mostra no computador e no mobile, computer - Só no computador, mobile - só no mobiles*/

			),

		array(	
				"field" => "datainclusao", 
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

		array(	
				"field" => "usuario", 
				"label" => "Usuário",
				"label_plural" => "Usuários",
				"col" => "4",
				"readonly" => "Yes",
				"user_update" => "Yes", // Atualiza com o usuário logado, tem 40 posições				
			),
	);