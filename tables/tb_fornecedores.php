<?php	

	$fields = array(

		array(	
				"field" => "cd_fornecedor", 
				"label" => "Código",
				"label_plural" => "Códigos",
				"grid" => "all", /* all - mostra no computador e no mobile, computer - Só no computador, mobile - só no mobiles */
				"col" => "2:1",
				"filter" => "Yes",
				"wrapfilter" => "Yes", 				 /* quebra Linha no filtro*/
				"increment" => "1", 				 /* Em caso de indice, se Estiver como NO na inclução o campo fica aberto para digitação */
				"incrementfield" => "cd_fornecedor", /* Coloca o nome explicito para receber o proximo codigo 
														esse campo recebera o max do propio campo + o valor "increment", 
														caso o nome do campo for id não é preciso declarar essa propiedade  */

			),

		array(	
				"field" => "juridica_fisica", 
				"label" => "Jurídica Física",
				"label_plural" => "Jurídicas Físicas",
				"col" => "2",
				"filter" => "Yes", 
				"radio" => "Yes",
				"option" => "Sim|Não",
				"value" => "1|0",
				"wrap" => "Yes", /* quebra Linha */	
				"defaultvalue" => 0,				
			),	

		array(	
				"field" => "nm_fornecedor", 
				"label" => "Fornecedor",
				"label_plural" => "Fornecedores",
				"col" => "3",				
			),	

		array(	
				"field" => "nm_razao", 
				"label" => "Razão",
				"label_plural" => "Razões",
				"grid" => "all", /* all - mostra no computador e no mobile, computer - Só no computador, mobile - só no mobiles */
				"wrap" => "3", /* Yes- quebra uma linha, ou digite o numero de linha para quebrar mais de uma Linha */
				"col" => "8:7",
				"filter" => "Yes",
				"wrapfilter" => "Yes", /* quebra Linha no filtro*/
				"orderby" => "Yes" 
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
				"col" => "12",
				"wrap" => "3", /* Yes- quebra uma linha, ou digite o numero de linha para quebrar mais de uma Linha */
			),		

		array(	
				"field" => "isuf", 
				"label" => "ISUF",
				"label_plural" => "ISUFs",
				"col" => "1",
			),

		array(	
				"field" => "instrucaovalidacao", 
				"label" => "Validação",
				"label_plural" => "Validações",
				"col" => "3",

			),

		array(	
				"field" => "ativo", 
				"label" => "Ativo",
				"label_plural" => "Ativos",
				"col" => "2",
				"radio" => "Yes",
				"option" => "Sim|Não",
				"value" => "1|0",
				"defaultvalue" => 1,
				"wrap" => "3", /* Yes- quebra uma linha, ou digite o numero de linha para quebrar mais de uma Linha */
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
				"col" => "2",
				"readonly" => "Yes",
				"user_update" => "Yes", // Atualiza com o usuário logado, tem 40 posições
				//"user_new" => "Yes",  // Atualiza com o usuário logado, tem 40 posições
			),

		array(	
				"field" => "excluido", 
				"label" => "Excluido",
				"label_plural" => "Excluido",
				"col" => "1",
				"readonly" => "Yes",
				"defaultvalue" => 0,
				"delete" => "No",                     /* No - da update no campo com 1*/
			),


	);