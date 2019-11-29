	/* Valida o formulario e enviar, f->formulário atual */
	function onsubmit_(f){

		/* Filtra os campos com validação */
		//var form =  $('#' + f.id + ' input,textarea,select').filter('[required]:visible');
		var form =  $('#' + f.id + ' input,textarea,select');
		/* Inicializa variavel como verdadeiro para enviar o formulário */
		var valid = true;
		var temp;
		var increment = 0;     /* Não incrementar o campo */
		var incrementfield = "";

		/* Pega o nome da tabela atual */
		var tablecurrent = form[0].id.replace("select_row_","");

		for( var i = 0; i < form.length ; i++  ){
			if(form[i].id){
				/* Se o campo esta invalido, campo com cor vermelho */
				if( $("#" + form[i].id).css("border-color") == "rgb(255, 0, 0)"){
					$("#" + form[i].id )[0].focus(); /* Seleciono o controle */
					valid = false; 					 /* Tira a permissão de envio do formulário */
					temp = form[i].outerHTML; 		 /* Pega o HTML do input */
					temp = temp.split("||")   		 /* Cria um array para separar a mensagem */
					alert(temp[1]);                  /* mostra a mensagem de validacao */
					break;
				}	

				/* Se o campo esta invalido, campo com cor vermelho */
				temp = form[i].outerHTML;  /* Pega o HTML do input */
				temp = temp.split("***");  /* Cria um array para separar pegar o valor do propiedade increment */
				if(temp.length > 1 ) {
					increment = 0;     /* Não incrementar o campo */
					if($.isNumeric(temp[1])){
						increment = temp[1]; /* Coloca o valor a incrementar, se for 0 não vai incremantar */
					}
				}; 

				/* Se o campo esta invalido, campo com cor vermelho */
				temp = form[i].outerHTML;  /* Pega o HTML do input */
				temp = temp.split("*****");  /* Cria um array para separar pegar o valor do propiedade incrementfield */
				if(temp.length > 1) {
					incrementfield = "";     /* Limpa a variavel */
					if( !$.isNumeric(temp[1])){
						incrementfield = temp[1]; /* Coloca o nome do campo que vai ser incrementado o valor */
					}
				}; 

			}							
		}

		if(valid){
			
			$("*").css( "cursor", "progress" );

			/* Envia dados do formulario para gravar */
			//alert("&incrementççç" + increment + "&actionççç" + gactionsystem + "&incrementfieldççç" + incrementfield);

			var dados = jQuery( f ).serialize() + "&incrementççç" + increment + "&actionççç" + gactionsystem + "&incrementfieldççç" + incrementfield;
			jQuery.ajax({
				type: "POST",
				url: "save.php",
				data: dados,
				success: function( data )
				{
					/* Cria uma mensagem de retorno para o usuario*/ 
					var sHTMPAlert="";
					var nTempo = 2000;

					/* Cria um caixa de mensagem em html */
					var retorno = data.split("||");
					if (retorno[0]==0){
						sHTMPAlert = "<div id='x5f45a7f9ggs9fde9jji' style='position: absolute; padding: 2px 2px 2px 2px; left: 50%; top: 50%; max-width: 300px; width: auto; height: auto; margin-left: -150px; margin-top: -125px; font-weight: bold; background-color: #000; border: 2px solid black; text-align: center; z-index: 9999;'>";
						sHTMPAlert += "<span class='text-warning'>Não foi feito nenhuma atualização!</span>";
					}else if (retorno[0]==1){	
						sHTMPAlert = "<div id='x5f45a7f9ggs9fde9jji' style='position: absolute; padding: 2px 2px 2px 2px; left: 50%; top: 50%; max-width: 300px; width: auto; height: auto; margin-left: -150px; margin-top: -125px; font-weight: bold; background-color: #FFF; border: 2px solid black; text-align: center; z-index: 9999;'>";
						if(gactionsystem == "new"){
							sHTMPAlert += "<span class='text-success' >Registro Incluido com Sucesso</span>";
							clearForm( "#form_" + tablecurrent );	
						}else{
							var i = 0;
							for (i = 1; i < retorno.length -1 ; i++) {
								var updateform = retorno[i].split("--");
								var d = updateform[1].substring(0,10).split("-")
								if(d.length > 2 ){
									$(updateform[0]).val(d[2] + "/" + d[1] + "/" + d[0] + " " + updateform[1].substring(11,19));
								}else{
							  		$(updateform[0]).val(updateform[1]);
							  	}	
							}		

							sHTMPAlert += "<span class='text-success' >Registro Atualizado com Sucesso</span>";
							update_row(tablecurrent);
						}
					}else{
						sHTMPAlert = "<div id='x5f45a7f9ggs9fde9jji' style='position: absolute; padding: 2px 2px 2px 2px; left: 50%; top: 50%; max-width: 500px; width: auto; height: auto; margin-left: -150px; margin-top: -125px; font-weight: bold; background-color: #000; border: 2px solid black; text-align: center; z-index: 9999;'>";
						sHTMPAlert += "<span class='text-danger bg-dark' >Houve um erro ao atualizar</span><br>";
						sHTMPAlert += "<span class='text-danger' > " + data +" </span>";
						nTempo = 20000;
					}
					sHTMPAlert += "</div>";
					/* Adiciona no body da pagina HTML */
					$("body").prepend(sHTMPAlert);
                    
                    /* Remove após um tempo */
					setTimeout(function(){ $( "#x5f45a7f9ggs9fde9jji" ).remove(); }, nTempo);

					$("*").css( "cursor", "initial" );

				}
			});


		}


	}

function update_row( table_form ){

	/* Pega a linha seleciona para alteração */
	var num_row = $('#select_row_' + table_form ).val();
	var val_current = ""; 

	$('#row_' + table_form + '_' + num_row + ' div').each(function(){
		id__ = this.id;
		if ( id__.indexOf("filter") == -1) {
			val_current = $("#" + this.id + "_").val()
			if(typeof val_current !== "undefined"){
				if( $("#" + this.id + "_").prop("type")=='datetime' ){
					this.innerText = val_current.replace("T"," ");
				}else if( $("#" + this.id + "_").prop("type")=='date' ){
					this.innerText = val_current.substring(1,10);
				}else if( $("#" + this.id + "_").prop("type")=='time' ){
					this.innerText = val_current.substring(1,10);
				}else if( $("#" + this.id + "_").prop("type")=='timestamp' ){
					this.innerText = val_current.substring(1,10);
				}else if($("#" + this.id + "_").prop("type")=="datetime-local"){
				}else{
					this.innerText = val_current;
				}
			}
		}
	});
}


//#posiciona {
//        position: absolute; /* posição absoluta ao elemento pai, neste caso o BODY */
//        /* Posiciona no meio, tanto em relação a esquerda como ao topo */
//        left: 50%; 
//        top: 50%;
//        width: 300px; /* Largura da DIV */
//        height: 250px; /* Altura da DIV */
//        /* A margem a esquerda deve ser menos a metade da largura */
//        /* A margem ao topo deve ser menos a metade da altura */
//        /* Fazendo isso, centralizará a DIV */
//        margin-left: -150px;
//        margin-top: -125px;
//        background-color: #FFF;
//        color: #FFF;
//        background-color: #666;
//        text-align: center; /* Centraliza o texto */
//        z-index: 1000; /* Faz com que fique sobre todos os elementos da página */
//    }
