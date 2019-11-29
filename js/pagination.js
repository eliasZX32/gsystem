
	$(document).on('click', '#nav-page-next', function(){
		glimit_pagesystem = $('#limit_page').val(); /* Pega o limite da pagina, como pode ter alteração na tabela, sempre pega a ultima contagem */
		if( gpagesystem == glimit_pagesystem ){ return false;} /* Se chegou na ultima pagina, fica na pagina */
		gpagesystem++; /* Adiciona a pagina atual */
		create_table_grid( gtablesystem, gtablescaptionsystem); /* Gera grid com dados da pagina atual */
	});	

	$(document).on('click', '#nav-page-previous', function(){
		if( gpagesystem == 1){ 	return false; } /* Se chegou na primeira pagina, fica na pagina */
		gpagesystem--; /* Diminuiu a pagina atual */
		create_table_grid( gtablesystem, gtablescaptionsystem); /* Gera grid com dados da pagina atual */
	});	

	$(document).on('click', '#nav-page-first', function(){
		if( gpagesystem == 1){ return false; }  /* Se já esta na primeira pagina, fica na pagina */
		gpagesystem = 1; /* Coloca a primeira pagina como atual */
		create_table_grid( gtablesystem, gtablescaptionsystem); /* Gera grid com dados da pagina atual */
	});	

	$(document).on('click', '#nav-page-last', function(){
		glimit_pagesystem = $('#limit_page').val();  /* Pega o limite da pagina, como pode ter alteração na tabela, sempre pega a ultima contagem */
		if( gpagesystem == glimit_pagesystem ){	return false; }
		gpagesystem = glimit_pagesystem;  /* Se já esta na ultima pagina, fica na pagina */
		create_table_grid( gtablesystem, gtablescaptionsystem); /* Gera grid com dados da pagina atual */
	});	

	$(document).on('click', '#nav-page-button', function(){
		glimit_pagesystem = $('#limit_page').val();  /* Pega o limite da pagina, como pode ter alteração na tabela, sempre pega a ultima contagem */
		gpagesystem = $('#nav-page-go').val(); /* Seta a pagina digitada */
		if( parseInt(gpagesystem) > parseInt(glimit_pagesystem) ){ gpagesystem = glimit_pagesystem } /* Se for a maior que a ultima pagina, coloca a pagina limite como atual */
		$('#nav-page-current').val(gpagesystem);
		$('#nav-page-go').val(gpagesystem);
		create_table_grid( gtablesystem, gtablescaptionsystem); /* Gera grid com dados da pagina atual */
	});