<html lang="pt-br" charset="utf-8">
	<head>
		
		<link rel="shortcut icon" href="favicon.ico">
		<!-- Usar este cabeçalho na order que se encontra, a mudança de ordem gera erro na pagina -->
		<meta name="viewport" content="width=device-width, initial-scale=1" charset="utf-8">
		<meta http-equiv="Cache-Control" content="no-cache" />

		<title>Sistema de Gestão Industrial</title>

	</head>
	<body>

		<!--div id="body-grid"></div-->
		<!--div id="body-form" style="display:none; margin-top: 60px;"></div -->

		<div class='class_body'>
			<div id="container-fluid" class="container-fluid" style="display: none;">
			  	<div class="row">
				    <div class="col-12">
				        <div class="card mt-3">  
				        	<div class="card-header"  style='margin-top: 1px;'>
				        	</div>

					        <div class="tab-content" id="card-content">
					        </div>
					    </div>
				    </div>
			  	</div>
			</div>
		</div>

		<div class="divtoken" style="display: none; ">
			Digite o Token para Liberar o Sistema <input type="text" style="width: 400px;" id="token">
			<input type="button" value="Liberar" id="liberar">
			<label style="width: 400px;" id="mensagem"> </label>
		</div>
	    <!-- Bootstrap CSS -->

		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" >

		<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" ></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>
			
		<script src="js/pagination.js?v=5" ></script>
		<script src="js/load.js?v=5" ></script>
		<script src="js/select.js?v=5" ></script>
		<script src="js/button.js?v=6" ></script>
		<script src="js/open.js?v=6" ></script>	
		<script src="js/submit.js?v=5" ></script>	

	</body>
<!-- style="padding: 15px 15px 15px 15px; position:absolute; bottom:0; width:100%;" 
	<footer class="footer navbar-fixed-bottom col-md-12 bg-dark">
		<div >			
			<span class="text-muted">GSystem Informática - Todos direitos reservados</span>
		</div>
	</footer>
-->
	<script type="text/javascript"> 
		id_menu_select = "";
		glimit_pagesystem = 0;
		gpagesystem = 1;
		gwheresystem = "";	
		gwheredefauldsystem	= ""

		gtablesystem = "";
		gtablescaptionsystem = "";
		gactionsystem = "";

		gtablesystem1 = "";
		gtablesystem2 = "";
		gtablesystem3 = "";
		gtablesystem4 = "";
		gtablesystem5 = "";


		if (screen.width < 640 || screen.height < 480) {
		    gdevicesystem = "mobile";
		} else if (screen.width < 1024 || screen.height < 768) {
		    gdevicesystem = "mobile";
		} else {
		    gdevicesystem = "computer";
		}

		$(document).ready(function() {

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

			/* Verifica se tem um token registrado na maquina*/
			/* window.localStorage.setItem('gestor_token', "teste"); */

			$token = window.localStorage.getItem("gestor_token");
			if( $token == "" || $token === null ){
				$(".divtoken").show();
				return false;			
			}
			
			$.post("gerar_menu.php", 
				{	
					token:$token
				}, 
				function(data)
				{
					if(data!==""){
						$(".divtoken").hide();
						$("body").prepend(data);

					    $( '.navbar a.dropdown-toggle' ).on( 'click', function ( e ) {
					        var $el = $( this );
					        var $parent = $( this ).offsetParent( ".dropdown-menu" );
					        $( this ).parent( "li" ).toggleClass( 'show' );

					        if ( !$parent.parent().hasClass( 'navbar-nav' ) ) {
					            $el.next().css( { "top": $el[0].offsetTop, "left": $parent.outerWidth() - 4 } );
					        }
					        $( '.navbar-nav li.show' ).not( $( this ).parents( "li" ) ).removeClass( "show" );
					        return false;
					    } );
					}else{
						$(".divtoken").show();						
					}
				}).fail(function(r) {
			    	alert( "error" );
			    }
			);
	    });

	</script>
</html>