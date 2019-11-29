
	var load_dados_filter = function(table) {
		dispositivo = "computador"
		if( $(window).width() <= 600){
			dispositivo = "celular"
		}

		$.post("create_filter.php", 
			{ 	
				table: table,
				dispositivo: dispositivo
			},
			function(data)
			{
				$("#body-filter").html("");
				$("#body-filter").append(data);
			}).fail(function(r) {
		    	alert( "error" );
		    }
		); 
	}


	var load_dados_form = function( table, bodyform, text_son ) {
		dispositivo = "computador"
		if( $(window).width() <= 600){
			dispositivo = "celular"
		}
		$.post("gerar_estrutura.php", 
			{ 	
				table: table,
				dispositivo: dispositivo,
				text_son: text_son
			},
			function(data)
			{
				$("#body-form" + bodyform).html("");
				$("#body-form" + bodyform ).append(data);

			}).fail(function(r) {
		    	alert( "error" );
		    }
		);   
	}	

	/* Função genérica para carregar tabelas */
	function create_table_grid( table, table_caption ){
		$.post("gerar_tabela.php", 
			{ 	
				table: table, 
				table_caption: table_caption,
				limit_start: gpagesystem,
				where: gwheresystem.substr( 0, gwheresystem.length - 5),
				device: gdevicesystem,
				wheredefauld: gwheredefauldsystem, 

			},
			function(data)
			{
				$("#body-grid").html("");
				$("#body-grid").append(data);
				$('#nav-limit-page').val($('#limit_page').val());
				$('#nav-page-go').val(gpagesystem);
			}).fail(function(r) {
		    	alert( "error" );
		    }
		); 
	} 
