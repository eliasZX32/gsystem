<?php	

	$fields = array(

		array(	
				"field" => "cd_cliente", 
				"label" => "Código",
				"label_plural" => "Código",
				"col" => "1",
			),

		array(	
				"field" => "nr_consulta", 
				"label" => "Número",
				"label_plural" => "Números",
				"col" => "2",
				"wrap" => "3",    /* quebra Linha */
				"grid" => "all", /* all - mostra no computador e no mobile, computer - Só no computador, mobile - só no mobiles */
			),	
		array(	
				"field" => "cd_referencia", 
				"label" => "Referencia",
				"label_plural" => "Referencia",
				"grid" => "all", /* all - mostra no computador e no mobile, computer - Só no computador, mobile - só no mobiles */
				"col" => "4",
				"table_ext" => "tb_referencia",
				"id_ext" => "cd_referencia",
				"show_ext" => "ds_referencia",
				"order_ext" => "ds_referencia",
				"id_filds_relation" => "cd_referencia",
				"tag" => "select",					
			),					
	);