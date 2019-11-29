<?php	

	$fields = array(
		
		array(	
				"field" => "cd_cliente", 
				"label" => "Código",
				"label_plural" => "Códigos",
				"grid" => "all", /* all - mostra no computador e no mobile, computer - Só no computador, mobile - só no mobiles */
				"col" => "1:1",
				"wrap" => "Yes", /* quebra Linha */
				"filter" => "Yes",
				"wrapfilter" => "Yes", /* quebra Linha no filtro*/	
			),

		array(	
				"field" => "nm_cliente", 
				"label" => "Cliente",
				"label_plural" => "Clientes",
				"grid" => "all", /* all - mostra no computador e no mobile, computer - Só no computador, mobile - só no mobiles */
				"col" => "3",
				"orderby" => "Yes" 
			),	

		array(	
				"field" => "nm_razao", 
				"label" => "Razão",
				"label_plural" => "Razões",
				"grid" => "all", /* all - mostra no computador e no mobile, computer - Só no computador, mobile - só no mobiles */
				"wrap" => "3", /* Yes- quebra uma linha, ou digite o numero de linha para quebrar mais de uma Linha */
				"col" => "7:8",
				"filter" => "Yes",
				"wrapfilter" => "Yes", /* quebra Linha no filtro*/	
				"orderby" => "Yes",
			),

		array(	
				"field" => "juridica_fisica", 
				"label" => "Jurídica Física",
				"label_plural" => "Jurídicas Físicas",
				"col" => "3",
				"filter" => "Yes", 
				"radio" => "Yes",
				"option" => "Sim|Não",
				"value" => "1|0",
				"wrap" => "Yes", /* quebra Linha */	
				"defaultvalue" => 0,				
			),

		array(	
				"field" => "nr_cnpj_cpf", 
				"label" => "CNPJ ou CPF",
				"label_plural" => "CNPJs ou CPFs",
				"col" => "3",
				"filter" => "Yes",
			),

		array(	
				"field" => "nr_ie", 
				"label" => "IE",
				"label_plural" => "IEs",
				"col" => "3",
			),

		array(	
				"field" => "nr_im", 
				"label" => "IM",
				"label_plural" => "IMs",
				"col" => "3",
			),

		array(	
				"field" => "nr_rg", 
				"label" => "RG",
				"label_plural" => "RGs",
				"col" => "3",
				"wrap" => "3", /* Yes- quebra uma linha, ou digite o numero de linha para quebrar mais de uma Linha */
			),

		array(	
				"field" => "ds_endereco", 
				"label" => "Endereço",
				"label_plural" => "Endereços",
				"col" => "6",
			),

		array(	
				"field" => "nro", 
				"label" => "Número",
				"label_plural" => "Números",
				"col" => "1",
			),

		array(	
				"field" => "xcpl", 
				"label" => "CPL",
				"label_plural" => "CPLs",
				"col" => "2",
			),

		array(	
				"field" => "ds_bairro", 
				"label" => "Bairro",
				"label_plural" => "Bairros",
				"col" => "3",
				"wrap" => "3", /* Yes- quebra uma linha, ou digite o numero de linha para quebrar mais de uma Linha */
			),

		array(	
				"field" => "nr_cep", 
				"label" => "CEP",
				"label_plural" => "CEPs",
				"col" => "1",
			),

		array(	
				"field" => "cd_ibge", 
				"label" => "IBGE",
				"label_plural" => "IBGEs",
				"col" => "1",
			),

		array(	
				"field" => "ds_cidade", 
				"label" => "Cidade",
				"label_plural" => "Cidades",
				"col" => "4",
			),

		array(	
				"field" => "ds_estado", 
				"label" => "Estado",
				"label_plural" => "Estados",
				"col" => "2",
			),

		array(	
				"field" => "cpais", 
				"label" => "País",
				"label_plural" => "Países",
				"col" => "1",
			),

		array(	
				"field" => "xpais", 
				"label" => "País",
				"label_plural" => "Países",
				"col" => "2",
				"wrap" => "3", /* Yes- quebra uma linha, ou digite o numero de linha para quebrar mais de uma Linha */

			),

		array(	
				"field" => "email", 
				"label" => "Email",
				"label_plural" => "Emails",
				"col" => "3",
			),

		array(	
				"field" => "fone", 
				"label" => "Fone",
				"label_plural" => "Fones",
				"col" => "2",
				"wrap" => "3", /* Yes- quebra uma linha, ou digite o numero de linha para quebrar mais de uma Linha */

			),

		array(	
				"field" => "ds_localcobranca", 
				"label" => "Local Cobrança",
				"label_plural" => "Locais Cobranças",
				"col" => "6",
			),

		array(	
				"field" => "isuf", 
				"label" => "ISUF",
				"label_plural" => "ISUFs",
				"col" => "1",
				"wrap" => "3", /* Yes- quebra uma linha, ou digite o numero de linha para quebrar mais de uma Linha */
			),

		array(	
				"field" => "nr_cnpj_cpf_retirada", 
				"label" => "CNPJ ou CPF Retirada",
				"label_plural" => "CNPJs ou CPFs Retiradas",
				"col" => "2",
			),

		array(	
				"field" => "xlgr_retirada", 
				"label" => "Lugar Retirada",
				"label_plural" => "Lugares Retiradas",
				"col" => "3",
			),

		array(	
				"field" => "nro_retirada", 
				"label" => "Número Retirada",
				"label_plural" => "Números Retiradas",
				"col" => "2",
			),	

		array(	
				"field" => "xcpl_retirada", 
				"label" => "CPL Retirada",
				"label_plural" => "CPLs Retiradas",
				"col" => "2",
			),	

		array(	
				"field" => "xbairro_retirada", 
				"label" => "Bairro Retirada",
				"label_plural" => "Bairros Retiradas",
				"col" => "3",
				"wrap" => "3", /* Yes- quebra uma linha, ou digite o numero de linha para quebrar mais de uma Linha */
			),		

		array(	
				"field" => "cmun_retirada", 
				"label" => "Município Retirada",
				"label_plural" => "Municípios Retiradas",
				"col" => "2",
			),	

		array(	
				"field" => "xmun_retirada", 
				"label" => "Município Retirada",
				"label_plural" => "Municípios Retiradas",
				"col" => "5",
			),

		array(	
				"field" => "uf_retirada", 
				"label" => "UF Retirada",
				"label_plural" => "UFs Retiradas",
				"col" => "4",
				"wrap" => "3", /* Yes- quebra uma linha, ou digite o numero de linha para quebrar mais de uma Linha */
			),

		array(	
				"field" => "nr_cnpj_cpf_entrega", 
				"label" => "CNPJ ou CPF Entrega",
				"label_plural" => "CNPJs ou CPFs Entregas",
				"col" => "2",
			),

		array(	
				"field" => "xlgr_entrega", 
				"label" => "Lugar Entrega",
				"label_plural" => "Lugares Entregas",
				"col" => "3",
			),

		array(	
				"field" => "nro_entrega", 
				"label" => "Número Entregas",
				"label_plural" => "Números Entregas",
				"col" => "2",
			),

		array(	
				"field" => "xcpl_entrega", 
				"label" => "CPL Entrega",
				"label_plural" => "CPLs Entregas",
				"col" => "2",
			),

		array(	
				"field" => "xbairro_entrega", 
				"label" => "Bairro Entrega",
				"label_plural" => "Bairros Entregas",
				"col" => "3",
				"wrap" => "3", /* Yes- quebra uma linha, ou digite o numero de linha para quebrar mais de uma Linha */
			),

		array(	
				"field" => "cmun_entrega", 
				"label" => "Município Entrega",
				"label_plural" => "Município Entregas",
				"col" => "2",
			),

		array(	
				"field" => "xmun_entrega", 
				"label" => "Município Entrega",
				"label_plural" => "Município Entregas",
				"col" => "2",
			),

		array(	
				"field" => "uf_entrega", 
				"label" => "UF Entrega",
				"label_plural" => "UFs Entregas",
				"col" => "2",
			),

		array(	
				"field" => "xlgr_entrega", 
				"label" => "Lugar Entrega",
				"label_plural" => "Lugares Entregas",
				"col" => "3",
			),

		array(	
				"field" => "nro_entrega", 
				"label" => "Número Entrega",
				"label_plural" => "Números Entregas",
				"col" => "2",
			),	

		array(	
				"field" => "xcpl_entrega", 
				"label" => "CPL Entrega",
				"label_plural" => "CPLs Entregas",
				"col" => "2",
			),	


		array(	
				"field" => "uf_retirada", 
				"label" => "UF Retirada",
				"label_plural" => "UFs Retiradas",
				"col" => "3",
			),

		array(	
				"field" => "nr_cnpj_cpf_entrega", 
				"label" => "CNPJ ou CPF Entrega",
				"label_plural" => "CNPJs ou CPFs Entregas",
				"col" => "3",
			),

		array(	
				"field" => "xlgr_entrega", 
				"label" => "Lugar Entrega",
				"label_plural" => "Lugares Entregas",
				"col" => "3",
			),

		array(	
				"field" => "nro_entrega", 
				"label" => "Número Entregas",
				"label_plural" => "Números Entregas",
				"col" => "3",
			),

		array(	
				"field" => "xcpl_entrega", 
				"label" => "CPL Entrega",
				"label_plural" => "CPLs Entregas",
				"col" => "2",
			),

		array(	
				"field" => "xbairro_entrega", 
				"label" => "Bairro Entrega",
				"label_plural" => "Bairros Entregas",
				"col" => "3",
			),

		array(	
				"field" => "cmun_entrega", 
				"label" => "Cód. Município Entrega",
				"label_plural" => "Município Entregas",
				"col" => "3",
			),

		array(	
				"field" => "xmun_entrega", 
				"label" => "Município Entrega",
				"label_plural" => "Município Entregas",
				"col" => "5",
			),

		array(	
				"field" => "uf_entrega", 
				"label" => "UF Entrega",
				"label_plural" => "UFs Entregas",
				"col" => "1",
				"wrap" => "3", /* Yes- quebra uma linha, ou digite o numero de linha para quebrar mais de uma Linha */
			),

		array(	
				"field" => "indicador", 
				"label" => "Indicador",
				"label_plural" => "Indicadores",
				"col" => "3",
				"wrap" => "3", /* Yes- quebra uma linha, ou digite o numero de linha para quebrar mais de uma Linha */

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
				"col" => "2",
				"readonly" => "Yes",
				"user_update" => "Yes", // Atualiza com o usuário logado, tem 40 posições
			),

		array(	
				"field" => "ativo", 
				"label" => "Ativo",
				"label_plural" => "Ativos",
				"col" => "1",
				"defaultvalue" => 1,
			),		

	);