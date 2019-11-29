
<html lang="pt-br" charset="utf-8">

	<head>
	
		<!-- Usar este cabeçalho na order que se encontra, a mudança de ordem gera erro na pagina -->
		<meta name="viewport" content="width=device-width, initial-scale=1" charset="utf-8">
		<meta http-equiv="Cache-Control" content="no-cache" />

		<title>Sistema de Gestão Industrial</title>
		
		<script
		  src="https://code.jquery.com/jquery-3.3.1.min.js"
		  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
		  crossorigin="anonymous"></script>		

		<link rel="stylesheet" type="text/css" href="css/index.css">
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jq-3.2.1/moment-2.18.1/jszip-2.5.0/pdfmake-0.1.32/dt-1.10.16/b-1.5.1/b-colvis-1.5.1/b-flash-1.5.1/b-html5-1.5.1/b-print-1.5.1/r-2.2.1/sc-1.4.4/sl-1.2.5/datatables.min.css">
		
		<!--link rel="stylesheet" type="text/css" href="css/generator-base.css"-->
		<!--link rel="stylesheet" type="text/css" href="css/editor.dataTables.min.css"-->
		<!--link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/select/1.2.5/css/select.dataTables.min.css"-->

		<script type="text/javascript" charset="utf-8" src="https://cdn.datatables.net/v/dt/jq-3.2.1/moment-2.18.1/jszip-2.5.0/pdfmake-0.1.32/dt-1.10.16/b-1.5.1/b-colvis-1.5.1/b-flash-1.5.1/b-html5-1.5.1/b-print-1.5.1/r-2.2.1/sc-1.4.4/sl-1.2.5/datatables.min.js"></script>
		<script type="text/javascript" charset="utf-8" src="js/dataTables.editor.min.js"></script>
		
		<script type="text/javascript" charset="utf-8" src="https://cdn.datatables.net/select/1.2.5/js/dataTables.select.min.js"></script>

		<script type="text/javascript" charset="utf-8" src="https:cdn.datatables.net/plug-ins/1.10.15/dataRender/datetime.js"></script>
				
		<script type="text/javascript" charset="utf-8" src="js/jquery.mask.js"></script>
		<script type="text/javascript" charset="utf-8" src="js/genericas.js"></script>

		<!--script type="text/javascript" charset="utf-8" src="js/table.pedido.vendas.js"></script-->

		<!--script type="text/javascript" charset="utf-8" src="js/table.ordem.servico.js"></script-->

		<!--script type="text/javascript" charset="utf-8" src="js/table.negociacao.compras.js"></script-->

	</head>

	<div class="divtoken" style="display: none; ">
		Digite o Token para Liberar o Sistema <input type="text" style="width: 400px;" id="token">
		<input type="button" value="Liberar" id="liberar">
		<label style="width: 400px;" id="mensagem"> </label>
	</div>
	
	<div id="home" style="text-align: center; margin-top: 20px;">
		<div>
			<img src="img\logo-cinza.jpg" alt="Logo da Piramide">
		</div>
		<div >
			<img src="img\home1.JPG" height="60%" width="80%" alt="Foto da Fabrica">
		</div>
	</div>

	<script type="text/javascript" id="jq" > 

		var editor;
	    
	    $(document).ready(function() {

			$(document).on('click', '#menu li a', function(e){

				strHref = $(this).attr("title");
				strHref = strHref.replace(/^\s+|\s+$/g,"");

				if(strHref !==""){

					$( ".container" ).remove();

					$.post("html/tela." + strHref + ".php", 
						{}, 
						function(data)
						{
							$("body").append(data);
							
							$("#home").hide();

							addJS(strHref);
							
						}).fail(function(r) {
						    alert( "error" );
					});
					    
				}
			});			

			function addJS(strHref) {
				$('#jqext').remove();
				
				var j = document.createElement("script")
				head = document.getElementsByTagName('head')[0]
				j.setAttribute('type', "text/javascript")
				j.setAttribute('id', "jqext")

				// ->>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>> AQUI
				j.setAttribute('src', "js/table." + strHref + ".js?versao=11")
				//j.setAttribute('src', "js/table.ufs.js")
		    	head.insertBefore(j,head.firstChild)

			}

			$(document).on('click', '#liberar', function(e){
				$token = $("#token").val();				
				$.post("verifytoken.php", 
					{	
						token:$token
					}, 
					function(data)
					{
						if( data.replace(/(?:\r\n|\r|\n)/g, '') !== ""){
							window.localStorage.setItem('gestor_token', $token);
							$("#mensagem").text("Token validado com sucesso!");

						}else{
							$("#mensagem").text("Token invalido, tente novamente!");
							window.localStorage.setItem('gestor_token', "");
						}
					}).fail(function(r) {
					    alert( "error" );
				});
			    e.preventDefault();
			});

			$(document).on('mouseover', '#menu li a', function(e){
		        var index = $("#menu li a").index(this);
        		$("#menu li").eq(index).children("ul").slideDown(400);
	            //if($(this).siblings('ul').size() > 0){
	                return false;
	            //}
			    e.preventDefault();
			});


			$(document).on('mouseleave', '#menu li', function(e){
	            var index = $("#menu li").index(this);
	            $("#menu li").eq(index).children("ul").slideUp();
			    e.preventDefault();
			});			

			$token = window.localStorage.getItem("gestor_token");
			if($token!==""){
				$menu = window.localStorage.getItem("gestor_menu");
				if($menu ==="" || $menu === null ){
					$.post("verify.php", 
						{	
							token:$token
						}, 
						function(data, user)
						{
							$("body").prepend("<div class='divmenu' id='menu'></div>");
							if( data.replace(/(?:\r\n|\r|\n)/g, '') !== ""){
								$(".divtoken").hide();
								$(".divmenu").append(data);
								window.localStorage.setItem('gestor_menu', data);
							}else{
								$(".divtoken").show();
								$(".divmenu").hide();
								window.localStorage.setItem('gestor_menu', "");
							}	
						}).fail(function(r) {
						    alert( "error" );
					});
				}else{
					$("body").prepend("<div class='divmenu' id='menu'></div>");
					$(".divtoken").hide();
					$(".divmenu").append($menu);					
				}		
			}else{
				$(".divtoken").show();
				$(".divmenu").hide();				
			}

	    });
	</script>
</html>	
