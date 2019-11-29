	var button_edit = function(num_row, table_form) {
		

		/* Guarda a linha seleciona para alteração */
		$('#select_row_' + table_form ).val(num_row);

        $("#btnsave_a1n4h6sg8dr9y0e1").show(); /* Deixa o botão Salvar Visivel */
        gactionsystem = "update"

		/* Filtra os campos com validação */
		var form =  $("#form_" + table_form + ' input,textarea,select').filter(':not([readonly])');
		var temp;
		for( var i = 0; i < form.length ; i++  ){
			/* Se o campo esta invalido, campo com cor vermelho */
			temp = form[i].outerHTML; /* Pega o HTML do input */
			temp = temp.split("***"); /* Cria um array para separar a mensagem */
			if(temp[1]==0){
				form[i].readOnly = true;
			};                  
		}

		$('#row_' + table_form + '_' + num_row + ' div' ).each(function(){
			id__ = this.id;
			if ( id__.indexOf("filter") == -1) {
				if( $("#" + this.id + "_").prop("type") == 'radio'){
					$("input:radio[name=" + this.id + "_]").prop('checked', false);
					if( $.isNumeric(this.innerHTML) ){
						$("input:radio[name=" + this.id + "_][value=" + this.innerHTML + "]").click();
					}else{
						$value = this.innerHTML.split("*")
						if( $value.length > 0  ){
							$("input:radio[name=" + this.id + "_][value=" + $value[1] + "]").click();
						}
					}
				}else if( $("#" + this.id + "_").prop("type") == 'checkbox'){
					$value = this.innerHTML.split("*")
					$("input:checkbox[name=" + this.id + "_][value=" + $value[1] + "]").click();
				}else if( $("#" + this.id + "_").prop("type") == 'datetime' || $("#" + this.id + "_").prop("type") == "datetime-local"){
					$("#" + this.id + "_").val( this.innerText.substr(6,4) + '-' + this.innerText.substr(3,2)  + '-' +  this.innerText.substr(0,2) + 'T' + this.innerText.substr(11,5));
				}else if( $("#" + this.id + "_").prop("type") == 'date' ){
					$("#" + this.id + "_").val( this.innerText.substr(6,4) + '-' + this.innerText.substr(3,2)  + '-' +  this.innerText.substr(0,2) );										
				}else if( $("#" + this.id + "_").prop("type") == 'time' ){
					$("#" + this.id + "_").val( this.innerText );										
				}else{
					$("#" + this.id + "_").val(this.innerText);
				}
			}
		});

		$("#myTab .nav-link").removeClass("disabled");

		$("#myTab .nav-link").removeClass("active");
		$("#card-content .tab-pane" ).hide();

		$(".nav-son-disabled").removeClass("disabled");

		$( "#one-" + table_form ).css( "display", "none");
		$( "#two-" + table_form ).css( "display", "block");
		$( "#two-" + table_form ).tab('show');

		$( "#two-tab-" + table_form ).tab('show');
		$( "#one-tab-" + table_form ).removeClass( "active" );
		$( "#two-tab-" + table_form ).addClass("active");

	}

	var button_new = function( $table ) {
        
        gactionsystem = "new";

		/* Filtra os campos com validação */
		var form =  $("#form_" + $table + ' input,textarea,select').filter('[readOnly]');
		var temp;
		for( var i = 0; i < form.length ; i++  ){
			/* Se o campo esta invalido, campo com cor vermelho */
			temp = form[i].outerHTML; 		 /* Pega o HTML do input */
			temp = temp.split("***");        /* Cria um array para separar a mensagem */
			if(temp[1]==0){
				form[i].readOnly = false;
			};                  
		}

		/* Limpa o formulário */
		clearForm( "#form_" + $table );

		/* Adiciona a classe Disabled para deixar inabilidado as tabs filhas */
		$(".son-class a").addClass("disabled");

		$("#myTab .nav-link").removeClass("active");
		$("#card-content .tab-pane" ).hide();

		/* mostra e Ativa o formulário de Cadastro */

		$( "#one-" + $table ).css( "display", "none" );
		$( "#two-" + $table ).css( "display", "block" );
		$( "#two-" + $table ).tab( "show" );

		$( "#two-tab-" + $table ).tab( "show" );
		$( "#one-tab-" + $table ).removeClass( "active" );
		$( "#two-tab-" + $table ).addClass( "active" );

	}


	var button_filter = function() {

		$("#body-grid").html("");

		/* Limpa as Variaveis */
		gwheresystem = "";
		gpagesystem = 1;

		var atemp; 
        
        /* Cria filtro a partir do diretório */
		$( "#form_padrao_filter_" + gtablesystem + " .filter" ).each(function( index ) {
			event.preventDefault();
			
			/* Separa o nome do input, para pegar o nome do campo */
			atemp = this.id.split("__");

			/* Se tiver um valor no input */
			if( this.value != '' ){
				/* Verifica o tipo */
				if( this.type == "select-one" ){
					/* se for uma lista, filtra só os iguais */
					gwheresystem += "a." + atemp[1] + " = '" + this.value + "' AND ";
				}else if( this.type == "radio" ){
					/* se for um radio, filtra o que esta selecionado */
					if( this.checked ){
						gwheresystem += "a." + atemp[1] + " = '" + this.value + "' AND ";						
					}
				}else if( this.type == "checkbox" ){
					/* 	se for um checkbox, filtra o que esta selecionado, 
						usa OR pois mais de um pode estar selecionado */
					if( this.checked ){
						gwheresystem += "a." + atemp[1] + " = '" + this.value + "' OR  ";						
					}						
				}else{
					/* se for um text, date ou qualquer outro input, filtra com like */
					gwheresystem += "a." + atemp[1] + " like '%" + this.value + "%' AND ";
				}
			}
		});

		/* Gera grid com dados da pagina atual */
		create_table_grid( gtablesystem, gtablescaptionsystem);

		/* Mostra e Ativa o formulário de Cadastro */
		$( "#zero-" + gtablesystem ).css( "display", "none" );
		$( "#one-" + gtablesystem ).css( "display", "block" );
		$( "#one-" + gtablesystem ).tab( "show" );

		$( "#one-tab-" + gtablesystem ).tab( "show" );
		$( "#zero-tab-" + gtablesystem ).removeClass( "active" );
		$( "#one-tab-" + gtablesystem ).addClass( "active" );
        /* ----------*/
        
	}

/* Limpa o formulario e seta os valores default */
function clearForm( clearform ){

	$( clearform )[0].reset();

	/* Seleciona o formulário */
	var form =  $( clearform + ' input,textarea,select');
	var temp;
	for( var i = 0; i < form.length ; i++  ){
		temp = form[i].outerHTML;   /* Pega o HTML do input */
		temp = temp.split("****");  /* Cria um array para separar o valor default */
		if(temp.length>1){ /* Se o array tiver mais de 1 elemento, pega o elemento 1 */
			if( form[i].type == "select-one" ){
			}else if( form[i].type == "radio" ){
				if(form[i].value == temp[1]){
					$("#" + form[i].name).filter(function() { return $(this).val() === temp[1]; }).click();
				}
			}else if( form[i].type == "checkbox" ){ //testar
				if(form[i].value == temp[1]){
					$("#" + form[i].name).filter(function() { return $(this).val() === temp[1]; }).click();
				}				
			}else{
				form[i].value = temp[1];
			}
		};                  
	}

	/* Filtra os campos com validação */
	form =  $( clearform + ' input,textarea,select').filter('[readOnly]');
	temp = "";
	for( var i = 0; i < form.length ; i++  ){
		/* Se o campo esta invalido, campo com cor vermelho */
		temp = form[i].outerHTML; 		 /* Pega o HTML do input */
		temp = temp.split("***");  /* Cria um array para separar a mensagem */
		if(temp[1]==0){
			form[i].readOnly = false;
			form[i].focus();
		};                  
	}		
}

	var button_delete = function(num_row, table_form) {

		$("#btnsave_a1n4h6sg8dr9y0e1").hide();  /* Esconde o botão Salvar */
	    button_edit(num_row, table_form);       /* Mostra o formulario para exclusão */

		/* Cria uma caixa para confirmação*/ 
		var sHTMPQuestion="";

		/* Cria um caixa de mensagem em html */				
		sHTMPQuestion += "<div id='s1h3f4d5k6j7f8ls9dh0fk3ebv' style='position: absolute; padding: 2px 2px 2px 2px; left: 50%; top: 20%; max-width: 500px; width: auto; height: auto; margin-left: -150px; margin-top: -125px; font-weight: bold; background-color: #fff; border: 2px solid black; text-align: center; z-index: 9999;'>";
		sHTMPQuestion += "	<div style='background-color: #000; padding: 5px 5px 0px 0px; height: 30px;'>";
		sHTMPQuestion += "		<span class='text-white' >Deseja excluir o registro selecionado?</span><br><br>";
		sHTMPQuestion += " 	</div>";
		sHTMPQuestion += "	<div style='background-color: #fff; padding: 10px 2px 2px 2px; '>";		
		sHTMPQuestion += "		<input class='btn btn-primary' style='cursor:pointer' onclick='deleteregister(\"" + num_row + "\",\"" + table_form + "\" );' value='Sim' >";
		sHTMPQuestion += "		<input class='btn btn-primary' style='cursor:pointer' onclick='$( \"#s1h3f4d5k6j7f8ls9dh0fk3ebv\" ).remove();' value='Não' >";
		sHTMPQuestion += "	</div>";
		sHTMPQuestion += "</div>";

		/* Adiciona no body da pagina HTML */
		$( "body" ).prepend(sHTMPQuestion);

	}

function deleteregister( num_row , table_form ){
	$( "#s1h3f4d5k6j7f8ls9dh0fk3ebv" ).remove();

	$("*").css( "cursor", "progress" );

	/* Envia dados do formulario para gravar */
	var dados = jQuery( "#form_" + table_form ).serialize();
	jQuery.ajax({
		type: "POST",
		url: "delete.php",
		data: dados,
		success: function( data )
		{
			/* Cria uma mensagem de retorno para o usuario*/ 
			var sHTMPAlert="";
			var nTempo = 2000;

			/* Cria um caixa de mensagem em html */				
			if (data==0){
				sHTMPAlert = "<div id='s4f1h7kd9hf8kse2dfdf' style='position: absolute; padding: 2px 2px 2px 2px; left: 50%; top: 50%; max-width: 300px; width: auto; height: auto; margin-left: -150px; margin-top: -125px; font-weight: bold; background-color: #000; border: 2px solid black; text-align: center; z-index: 9999;'>";
				sHTMPAlert += "<span class='text-warning'>Não foi Excluido o Registro, por favor verifique!</span>";
			}else if (data==1){	
				sHTMPAlert = "<div id='s4f1h7kd9hf8kse2dfdf' style='position: absolute; padding: 2px 2px 2px 2px; left: 50%; top: 50%; max-width: 300px; width: auto; height: auto; margin-left: -150px; margin-top: -125px; font-weight: bold; background-color: #FFF; border: 2px solid black; text-align: center; z-index: 9999;'>";
				sHTMPAlert += "<span class='text-success' >Registro Excluido com Sucesso</span>";
				clearForm( "#form_" + table_form );				
				$( "#row_" + table_form + "_" + num_row + " td").remove();
			}else{
				sHTMPAlert = "<div id='s4f1h7kd9hf8kse2dfdf' style='position: absolute; padding: 2px 2px 2px 2px; left: 50%; top: 50%; max-width: 500px; width: auto; height: auto; margin-left: -150px; margin-top: -125px; font-weight: bold; background-color: #000; border: 2px solid black; text-align: center; z-index: 9999;'>";
				sHTMPAlert += "<span class='text-danger bg-dark' >Houve um Erro ao Tentar Excluir o Registro</span><br>";
				sHTMPAlert += "<span class='text-danger' > " + data +" </span>";
				nTempo = 5000;
			}
			sHTMPAlert += "</div>";
			/* Adiciona no body da pagina HTML */
			$( "body" ).prepend(sHTMPAlert);
            
            /* Remove após um tempo */
			setTimeout(function(){ $( "#s4f1h7kd9hf8kse2dfdf" ).remove(); }, nTempo);

			$( "*" ).css( "cursor", "initial" );

			//$( ".btn-filter", "#form_padrao_filter_" + table_form ).click();

		}
	});
}
