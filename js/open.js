/* Criar tab para os filhos */
function createtab_( f ){

	htmltab  = "<div id='container-fluid-" + f + "' class='container-fluid visible-son' style='display: block;'>";
	htmltab += "	<div class='row'>";
	htmltab += "	    <div class='col-12'>";
	htmltab += "	        <div class='card mt-3'>"; 
	htmltab += "	        	<div class='card-header'>";
	htmltab += "	          		<ul class='nav nav-tabs' id='tab-" + f + "' role='tablist'>";
	htmltab += "	            		<li class='nav-item'>";
	htmltab += "	                		<a class='nav-link' id='one-tab-son_" + f + "' role='tab' href='#one-son_" + f + "' onclick=\"sel_tab_son( '" + f + "');\" aria-selected='true'>Tabela</a>";
	htmltab += "	            		</li>";
	htmltab += "	            		<li class='nav-item'>";
	htmltab += "	                		<a class='nav-link disabled nav-son_disabled' id='two-tab-son_" + f + "' role='tab' href='#two-son_" + f + "' onclick=\"sel_tab_son( '" + f + "');\" aria-selected='false'>Formulário</a>";
	htmltab += "	            		</li>";
	htmltab += "	          		</ul>";
	htmltab += "	        	</div>";
	htmltab += "	    	    <div class='tab-content' >";
	htmltab += "			    	<div class='tab-pane fade show active p-3' id='one-son_" + f + "' role='tabpanel'>";
	htmltab += "			    		 <div id='body-grid-" + f + "'></div>";
	htmltab += "					</div>";
	htmltab += "					<div class='tab-pane fade p-3' id='two-son_" + f + "' role='tabpanel'>";
	htmltab += "						 <div id='body-form-" + f + "' ></div>";
	htmltab += "					</div>";
	htmltab += "				</div>";
	htmltab += "			</div>";
	htmltab += "		</div>";
	htmltab += "	</div>";
	htmltab += "</div>";

	return htmltab; 
}

function open__(e, id){
	
	/* Variavel de Acesso do menu */
	id_menu_select = id; // Contem o id do menu

	var html_header = "";

	/* Tira o codigo aleatório deixando o nome da tabela */
	var table = e.id.substring(5, e.id.length); // pega o nome da tabela
    
    // Cria a aba Filtro / Tabela / Formulário
	html_header = html_header + "<ul class='nav nav-tabs' id='myTab' role='tablist'>";
	html_header = html_header + "	<li class='nav-item'>";
	html_header = html_header + "		<a id='zero-tab-" + table + "' href='#zero-" + table + "' onclick=\"sel_tab('#zero-" + table + "', '#zero-tab-" + table + "');\" class='nav-link' >Filtro</a>";
	html_header = html_header + "		<span id='zero-span-" + table + "'></span>";
	html_header = html_header + "	</li>";
	html_header = html_header + "	<li class='nav-item'>";
	html_header = html_header + "		<a id='one-tab-" + table + "' href='#one-" + table + "' onclick=\"sel_tab('#one-" + table + "', '#one-tab-" + table + "');\" aria-selected='true' class='nav-link'>Tabela</a>";
	html_header = html_header + "	</li>";
	html_header = html_header + "	<li class='nav-item'>";
	html_header = html_header + "		<a id='two-tab-" + table + "' href='#two-" + table + "'  onclick=\"sel_tab('#two-" + table + "', '#two-tab-" + table + "');\" class='nav-link disabled nav-disabled' >Formulário</a>";
	html_header = html_header + "	</li>";
	html_header = html_header + "</ul>";

	// Adiciona na pagina
	$( ".card-header" ).html(html_header);
    
    // Cria a estrutura basica do filtro / tabela / formulario
	html_header = "";
	// Filtro
	html_header = html_header + "<div class='tab-pane fade p-3' id='zero-" + table + "' role='tabpanel' >";
    html_header = html_header + "	<div id='body-filter'></div>"; 
  	html_header = html_header + "</div>";
    
    // Tabela

  	html_header = html_header + "<div class='tab-pane fade show active p-3' id='one-" + table + "' role='tabpanel' >";
    html_header = html_header + "	<div id='body-grid'></div>";  

  	html_header = html_header + "</div>";

    // Formulário
	html_header = html_header + "<div class='tab-pane fade p-3' id='two-" + table + "' role='tabpanel' >";
    html_header = html_header + "	<div id='body-form' ></div>"; 
  	html_header = html_header + "</div>";
    
    // Adiciona a Pagina
  	$( ".tab-content" ).html(html_header);
    
    //?
	$( "li.son_class" ).remove(); 

    // Retorna o registro com os dados da tabela
    // functionality table_ table_caption indexar
	// nivel1 nivel2 nivel3 nivel4 
	// menu register date_register 
	// table_son1 table_caption_list1 table_aba_son1
	// table_fields_father1 table_fields_son1 table_son2 table_caption_list2 table_aba_son2
	// table_fields_father2 table_fields_son2 sql1 sql2
	$.post("menu.php", 
		{ 	
			id: id_menu_select
		},
		function(data)
		{
			data = JSON.parse(data)[0];
			/* Reinicializa Variavel */
			gtablesystem = "";
			gtablescaptionsystem = "";
			
			/* cria a grade só se for a tabela principal */
			if(data["table_"]){
				gtablesystem = data["table_"];
				gtablescaptionsystem = data["table_caption"];
				gwheredefauldsystem = data["where"];

				create_table_grid( gtablesystem, gtablescaptionsystem );
				if( table != "" ){
				    load_dados_form( gtablesystem, "", "" );
				    load_dados_filter( gtablesystem );

				    $( "#one-tab" ).tab( "show" );
				    $( "#container-fluid" ).css( "display", "block");	
				}				
			}

			htmlrow1 = "<ul style='cursor: pointer;' class='nav nav-tabs' id='myTab' role='tablist'>";
			htmlrow2 = "<ul style='cursor: pointer;' class='nav nav-tabs' id='myTab' role='tablist'>";
			for (var iTab = 1; iTab <= 5; iTab++) {
				if( data["table_fields_son" + iTab]){
					/* Cria tab para tabelas filhas  + table_son + "_'"*/
					/* Incluir abas extras */
					if(iTab == 1){
						gtablesystem1 = data["table_son" + iTab];
					}else if(iTab == 2){
						gtablesystem2 = data["table_son" + iTab];
					}else if(iTab == 3){
						gtablesystem3 = data["table_son" + iTab];
					}else if(iTab == 4){
						gtablesystem4 = data["table_son" + iTab];
					}else if(iTab == 5){
						gtablesystem5 = data["table_son" + iTab];
					}

	        		html = "<li class='nav-item son_class' >";
	            	html += "	<a id='" + data["table_son" + iTab] + "-tab' href='#' onclick=\"sel_tab('#" + data["table_son" + iTab] + "', '#" + data["table_son" + iTab] + "_tab');\" class='nav-link disabled nav-disabled'>" + data["table_aba_son" + iTab] + "</a>";
	        		html += "</li>";
	        		
	        		if( gdevicesystem == "computer"){
						html = "<ul style='cursor: pointer;' class='nav nav-tabs' id='myTab" + iTab +  "' role='tablist'>" + html + "</ul>" ; 
		        		$("#myTab .nav-item").filter(":last").after( html );
	        		}else{
						if(iTab == 1){
		        			htmlrow1 += html;
		        		}else if(iTab == 2 ){
		        			htmlrow1 += html;
		        		}else if(iTab == 3 ){
		        			htmlrow1 += html;
		        		}else if(iTab == 4 ){
		        			htmlrow2 += html;
		        		}else if(iTab == 5 ){
		        			htmlrow2 += html;
		        		}else if(iTab == 6 ){
		        			htmlrow2 += html;
		        		}	
	        		
	        		}

				    html  = "<div class='tab-pane fade p-3 son_class' id='" + data["table_son" + iTab] + "_' role='tabpanel' >";
				    html += "	<div id='" + data["table_son" + iTab] + "' ></div>";
				    html += "</div>";

				    $("#two-" + data["table_"] ).filter(":last").after( html );
				}
			}
			if( htmlrow2 != "<ul style='cursor: pointer;' class='nav nav-tabs' id='myTab' role='tablist'>"){
				$("#myTab").after( htmlrow2 + "</ul>");				
			}
			if( htmlrow1 != "<ul style='cursor: pointer;' class='nav nav-tabs' id='myTab' role='tablist'>"){
				$("#myTab").after( htmlrow1 + "</ul>");				
			}

		}).fail(function(r) {
	    	alert( "error" );
	    }
	); 



}

