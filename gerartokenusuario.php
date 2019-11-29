
<html lang="pt-br">

	<head>
		<!-- Usar este cabeçalho na order que se encontra, a mudança de ordem gera erro na pagina -->
		<meta name="viewport" content="width=device-width, initial-scale=1" charset="utf-8">

		<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>

		<title>Sistema de Gestão Industrial</title>

	</head>
	<style type="text/css">
		.div {
			position:absolute;
			top: 80%;
			left: 50%;
			width:400px;
			height:300px;
			margin-top: -150px; /*set to a negative number 1/2 of your height*/
			margin-left: -175px; /*set to a negative number 1/2 of your width*/
			text-align: center;
		}
	</style>

	<div class="div">
		Digite o user <input type="text" style="width: 400;" id="user" value="Administrador">
		Digite o password <input type="text" style="width: 400;" id="password" value="303541">
		<input type="button" value="Criar um token" id="newtoken">
		<label style="width: 400;" id="newtokentext"> </label>
	</div>

	<script type="text/javascript" >    
	    $(document).ready(function() {
			$(document).on('click', '#newtoken', function(e){
				$.post("newtoken.php", 
					{	
						user: $("#user").val(),
						password: $("#password").val()
					}, 
					function(data)
					{
						if(data != "não"){
							$("#newtokentext").text(data);
						}

					}).fail(function(r) {
					    alert( "error" );
				});
			    e.preventDefault();
			});
	    });
	</script>
</html>	
