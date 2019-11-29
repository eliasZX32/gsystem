<?php

	if( isset($_REQUEST['table'] ) ){
		$table = $_REQUEST['table'];
	}

	if (!file_exists("tables/{$table}.php")) {
		echo "<h1>Arquivo não encontrado {$table}.php!<h1>"; return 0;
	}else{
		require("tables/{$table}.php");
	}

	foreach( $buttons as $button ){
		$html_cadastro .= "<div style='padding-left: 5px;'class=\"btn-group\">";
		$html_cadastro .= 	"<input  type=\"button\" class=\"btn btn-primary\" value=\"{$button['caption']}\" >";
		$html_cadastro .= "</div>";
	}
?>
