	/* Navegar nas tabs filhas */
	function sel_tab_son( f ){
		

		if( $( "#one-son_" + f ).is(':visible') ){
		   	return false;
		}

		$( "#two-son_" + f ).css( "display", "none");
		$( "#one-son_" + f ).css( "display", "block");
		$( "#two-son_" + f ).hide();
		$( "#one-son_" + f ).tab('show');
		$( ".nav-son-disabled" ).addClass("disabled");
		$( "#two-tab-son_" + f ).removeClass("active");
		$( "#one-tab-son_" + f ).addClass("active");

	}

	/* Navegar nas tabs pais */
	function sel_tab( f, t ){

		/* Não deixa navegar se estiver desabilitado a navegação da tab */
		if($( f + "-tab").hasClass('disabled')){
		   	return false;
		}

		/* Se voltar pra aba do grid ou filtro, desabilida as outras abas */
		if( f.indexOf("one") == 1 || f.indexOf("zero") == 1){
			/* usa class nav-disabled para desabilitar, esta class não faz nada serve só para habilitar e desabilitar */ 
			$( ".nav-disabled").addClass('disabled');
		}

		$("#myTab .nav-link").removeClass("active");
		$("#card-content .tab-pane" ).hide();

		$(".visible-son").hide();
		

		$( f ).show();	
		$( t ).tab('show');


		/* Se for tab com uma tabela filha */
		//if( t != "#zero-tab" && t != "#one-tab" && t != "#two-tab" ){
		if( f == "#" + gtablesystem1 || f == "#" + gtablesystem2  || f == "#" + gtablesystem3 || f == "#" + gtablesystem4 || f == "#" + gtablesystem5){	

			$.post("menu.php", 
				{ 	
					id: id_menu_select
				},
				function(data)
				{   
					var songsystem = "";
					data = JSON.parse(data)[0];

					if( f == "#" + gtablesystem1 ){
						songsystem = "1";
					}
					if( f == "#" + gtablesystem2 ){
						songsystem = "2";
					}	
					if( f == "#" + gtablesystem3 ){
						songsystem = "3";
					}
					if( f == "#" + gtablesystem4 ){
						songsystem = "4";
					}	
					if( f == "#" + gtablesystem5 ){
						songsystem = "5";
					}	

					if( data["table_son" + songsystem]){

						/* Cria o HTML só se não existir */
						if ( $("#container-fluid-" + data["table_son" + songsystem] ).length == 0){ 
			 				 $temp = createtab_( data["table_son" + songsystem] );
							 $("#" + data["table_son" + songsystem] + "_" ).after( $temp );
						}

						/* Monta o grid com os dados da tabela filha */
						create_table_grid_son( data["table_"], data["table_son" + songsystem], data["table_caption_list" + songsystem], data["table_aba_son" + songsystem], data["table_fields_father" + songsystem], data["table_fields_son" + songsystem], data["where"], data["where" + songsystem] );
				    	
				    	load_dados_form ( data["table_son" + songsystem], "-" + data["table_son" + songsystem], "son_" );

				    	/* Mostrar o grid e esconder o formulario da tabela filha*/

						$(".visible-son").css( "display", "none");
						$("#container-fluid-" + data["table_son" + songsystem] ).css( "display", "block");
						
						$( "#two-tab-son_" + data["table_son" + songsystem] ).removeClass("active");
						$( "#one-tab-son_" + data["table_son" + songsystem] ).addClass("active");
						$( "#one-son_" + data["table_son" + songsystem] ).css( "display", "block");
						$( "#two-son_" + data["table_son" + songsystem] ).css( "display", "none");
						$( "#one-son_" + data["table_son" + songsystem] ).tab('show');		    	

					}
						
				}).fail(function(r) {
			    	alert( "error" );
			    }
			); 
		}			
	}


	/* Função genérica para carregar tabelas filhas */
	function create_table_grid_son( table_father, table_son, table_caption_list, table_aba_son, table_fields_father, table_fields_son, where, where1 ){
		var page_find = -1;
		var where_find = "";

		var fields_father = table_fields_father.split(",");
		var fields_son =  table_fields_son.split(",");

		/* Cria o filtro na tebela filha */
		for( var i = 0; i < fields_father.length ; i++ ){
			/* Verifica se existe o campo no formulário Pai */
			if( $( "#" + table_father + "ççç" + fields_father[i] + "_").length == 1){
				/* Se sim, filtra o valor no campo da tabela filha */
				where_find += " and " + fields_son[i] + " = " + $("#" + table_father + "ççç" +  fields_father[i] + "_")[0].value;
			}
		}

		if(where_find.length > 0 ){
			where_find = where_find.substring( 5, where_find.length );
		}

		$.post("gerar_tabela.php", 
			{ 	
				table: table_son, 
				table_caption: table_caption_list,
				limit_start: page_find,
				limit: false,            /* Traz todos os registros */
				where: where_find,        /* Filtra os dados */
				text_son: "son_",
				device: gdevicesystem,
				wheredefauld1: where1,
			},
			function(data)
			{
				$("#body-grid-" + table_son).html("");
				$("#body-grid-" + table_son).append(data);
			}).fail(function(r) {
		    	alert( "error" );
		    }
		); 
	} 