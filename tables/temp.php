  
  $html_cadastro .= "  </tbody>";

    $html_cadastro .= "</table> ";

    // $html_cadastro .= "  <tbody>";
    // $html_cadastro .= "    <tr>";
    // $html_cadastro .= "      <th scope=\"row\">1</th>";
    // $html_cadastro .= "      <td>Mark</td>";
    // $html_cadastro .= "      <td>Otto</td>";
    // $html_cadastro .= "      <td>@mdo</td>";
    // $html_cadastro .= "    </tr>";
    // $html_cadastro .= "    <tr>";
    // $html_cadastro .= "      <th scope=\"row\">2</th>";
    // $html_cadastro .= "      <td>Jacob</td>";
    // $html_cadastro .= "      <td>Thornton</td>";
    // $html_cadastro .= "      <td>@fat</td>";
    // $html_cadastro .= "    </tr>";
    // $html_cadastro .= "    <tr>";
    // $html_cadastro .= "      <th scope=\"row\">3</th>";
    // $html_cadastro .= "      <td colspan=\"2\">Larry the Bird</td>";
    // $html_cadastro .= "      <td>@twitter</td>";
    // $html_cadastro .= "    </tr>";
    // $html_cadastro .= "  </tbody>";
    // $html_cadastro .= "</table> ";

  
//  $struct = $db->query("SHOW TABLES LIKE '{$table['table']}'")->rowCount();
//  if( $struct > 0){
//    echo "aqui";
//    $sql = "SHOW COLUMNS FROM {$table['table']}";
//      $query = $db->query($sql);
//      $struct = $query->fetchall(PDO::FETCH_ASSOC);
//      var_dump($struct);
      
//      foreach( $struct as $campo ){
//      $variavel[] = $campo
//      }

//      array_push($struct, 
//          array(
//          "tag" => "input",
//          "type" => "text",
//          "class" => "col-md-6"
//        )
//      );

//      var_dump($variavel);
//      //foreach( $struct as $campo ){
//  //    echo " {$campo['Field']}";
//     // }

//    //$tabela_renomeada = "{$table['table']}" . rand(1000, 10000);
//    //$query = "RENAME TABLE {$table['table']} TO " . $tabela_renomeada;
//    //$query = $db->exec($query);
    

//  }

//  $query = "CREATE TABLE {$table['table']}( \n"; 
//  foreach( $campos as $campo ){
//    $query .= "";
//    $query .= " {$campo['field']}";
//    $query .= " {$campo['type_field']}";
//    if(array_key_exists( "size", $campo) != 0 ){
//      $query .= " ({$campo['size']})";
//    }
//    if ($campo['field'] == 'id'){
//      $query .= " NOT NULL";
//    }   
//    $query .= ", \n";
//  }
//  $query = substr($query, 0, -3);
//  $query .= ");";

//  //$struct = $db->exec($query);

//  //echo nl2br($query);
//  //codigo int(4) AUTO_INCREMENT,
//  //nome varchar(30) NOT NULL,
//  //email varchar(50),
//  //PRIMARY KEY (codigo)


function create_header_grid( $struct, $table, $table_caption, &$html_cadastro){
  if($table_caption != ""){
      $html_cadastro .= " <h1 class='card-title'>{$table_caption}</h1>";
  }else{
    $html_cadastro .= " <h1 class='card-title'>Lista da tabela -> " . ucfirst($table) . "</h1>";
  }

    $html_cadastro .= " <table class='table table-hover' id='table_{$table}'>";
    $html_cadastro .= "   <thead>";
  $html_cadastro .= "       <tr>";
  foreach( $struct as $field ){    
    if (array_key_exists("grid", $field)) {
      $html_cadastro .= "       <th>";
      if( strtoupper($field['grid']) == 'SHOW' || $field['grid'] == '' ){
        $html_cadastro .= "       <th scope='col'>{$field['label']}</th>";
      }else{
        $html_cadastro .= "       <th scope='col' hidden>{$field['label']}</th>";
      }
      $html_cadastro .= "       </th>";
    }
  }
  $html_cadastro .= "       </tr>";
  $html_cadastro .= "   </thead>";
    $html_cadastro .= "  </tbody>";
    $html_cadastro .= "</table> ";  
}



          <tr>
                        <td>John Doe</td>
                        <td>Administration</td>
                        <td>(171) 555-2222</td>
                        <td>
              <a class="add" title="" data-toggle="tooltip" data-original-title="Add" style="display: none;"><i class="material-icons"></i></a>
                            <a class="edit" title="" data-toggle="tooltip" data-original-title="Edit" style="display: inline-block;"><i class="material-icons"></i></a>
                            <a class="delete" title="" data-toggle="tooltip" data-original-title="Delete"><i class="material-icons"xxx</i></a>
                        </td>
                    </tr>





                        /* Preenche os campos do formulário para editar */
    function button_edit( r ) {
      $("#body-grid").hide();
      $("#body-nav-page").hide();
      $("#body-form").show();
      oGrid = $("#row_" + r + " >td");
      $.each( oGrid, function( key ) {
        var field_value = oGrid.eq(key).text();

        /* se for um datetime acerta o valor */
        if($( "#"+oGrid.eq(key).attr("id") + "_").attr("type") == 'datetime-local'){
          var field_value = oGrid.eq(key).text().replace(" ","T");

        }else if($( "#"+oGrid.eq(key).attr("id") + "_").attr("type") == 'checkbox'){
        /* se for um checkbox limpa seleção e seleciona o item */ 
          $( "#" + oGrid.eq(key).attr("id") + "_[type=checkbox]").prop("checked", false )
          $( "#" + oGrid.eq(key).attr("id") + "_[value='" + field_value + "']").prop("checked", true );
        }else if($( "#"+oGrid.eq(key).attr("id") + "_").attr("type") == 'radio'){
        /* se for um radio limpa seleção e seleciona o item */  
          $( "#" + oGrid.eq(key).attr("id") + "_[type=radio]").prop("checked", false )
          $( "#" + oGrid.eq(key).attr("id") + "_[value='" + field_value + "']").prop("checked", true );         
        }else{
        /* qualquer outro seta o valor direto */  
          $( "#"+oGrid.eq(key).attr("id") + "_").val(field_value);
        }


      });

      //oRow.eq(0).text() 

      return false; 
    }


              <nav aria-label=''>
            <ul class='pagination justify-content-left'>
              <li class='page-item'>
                  <a id='nav-page-first' class='page-link' href='#'>Primeiro</a>
              </li>
              <li class='page-item' >
                <a id='nav-page-previous'  class='page-link' href='#'>Anterior</a>
              </li>
              <input type='text' id='nav-page-go' class='page-link' value='1' size='5'>
              <input type='text' id='nav-limit-page' class='page-link' value='{$limit_page}' size='5' disabled>
              <a class='page-link' id='nav-page-button' href='#'>Vá</a>
              <li class='page-item' >
                <a id='nav-page-next' class='page-link' href='#'>Próximo</a>
            </li>
              <li class='page-item' >
                  <a id='nav-page-last' class='page-link' href='#'>Ultimo</a>
            </li>
            </ul>
        </nav>


        //$paginacao =        "<div class='container-fluid'>\n";
        //$paginacao = $paginacao + "   <ul class='nav nav-tabs'>\n";
        //$paginacao = $paginacao + "       <li class='nav-item' >\n";
        //$paginacao = $paginacao + "         <a class='nav-link active' data-toggle='tab' href='#table_tav'>Tabela</a>\n";
        //$paginacao = $paginacao + "       </li>\n";
        //$paginacao = $paginacao + "       <li class='nav-item'>\n";
        //$paginacao = $paginacao + "         <a class='nav-link' data-toggle='tab' href='#form_tav'>Formulário</a>\n";
        //$paginacao = $paginacao + "       </li>\n";
        //$paginacao = $paginacao + "   </ul>\n";
        //$paginacao = $paginacao + "</div>\n";

        //$paginacao = $paginacao + " <div class='tab-content'>\n";
        //$paginacao = $paginacao + "   <div id='table_tav' class='tab-pane fade'>\n";

        //        $paginacao = $paginacao + data;

                //$paginacao = $paginacao + "     <nav aria-label=''>\n";
        //$paginacao = $paginacao + "       <ul class='pagination justify-content-left'>\n";
        //$paginacao = $paginacao + "           <li class='page-item'>\n";
        //$paginacao = $paginacao + "               <a id='nav-page-first' class='page-link' href='#'>Primeiro</a>\n";
        //$paginacao = $paginacao + "           </li>\n";
        //$paginacao = $paginacao + "           <li class='page-item' >\n";
        //$paginacao = $paginacao + "               <a id='nav-page-previous'  class='page-link' href='#'>Anterior</a>\n";
        //$paginacao = $paginacao + "           </li>\n";
        //$paginacao = $paginacao + "           <input type='text' id='nav-page-go' class='page-link' value='" + page + "' size='5'>\n";
        //$paginacao = $paginacao + "           <input type='text' id='nav-limit-page' class='page-link' value='{$limit_page}' size='5' disabled>\n";
        //$paginacao = $paginacao + "           <a class='page-link' id='nav-page-button' href='#'>Vá</a>\n";
        //$paginacao = $paginacao + "           <li class='page-item' >\n";
        //$paginacao = $paginacao + "               <a id='nav-page-next' class='page-link' href='#'>Próximo</a>\n";
        //$paginacao = $paginacao + "         </li>\n";
        //$paginacao = $paginacao + "           <li class='page-item' >\n";
        //$paginacao = $paginacao + "               <a id='nav-page-last' class='page-link' href='#'>Ultimo</a>\n";
        //$paginacao = $paginacao + "         </li>\n";
        //$paginacao = $paginacao + "       </ul>\n";
        //$paginacao = $paginacao + "     </nav>\n";
        //$paginacao = $paginacao + "   </div>";  
        //$paginacao = $paginacao + "   <div id='form_tav' class='tab-pane fade'> \n";
        //$paginacao = $paginacao + "     <h3>menu2</h3>\n";  
        //$paginacao = $paginacao + "   </div>\n"       
        //$paginacao = $paginacao + "</div>\n"; 







    data-toggle="tab" href="#two"



    
    var button_save = function() {

/*
      $('#form_padrao').submit(function(event){
          event.preventDefault();
        });

      aDados=[];

      $( ".form-control" ).each(function( index ) {
        aDados[index] = this.id + ';' + this.value;
      });

      $.post("save.php", 
        {   
          save_table: JSON.stringify(aDados)
        },
        function(data)
        {
          $('#two-tab').tab('show');
        }).fail(function(r) {
            alert( "error" );

          }

      );
      */ 
    }



















                $html_cadastro  .= "<span>";
                  $html_cadastro  .= "  table_: {$row1['table_']},";
                  $html_cadastro  .= "  table_caption: {$row1['table_caption']},";
                  $html_cadastro  .= "  table_son1: {$row1['table_son1']},";
                  $html_cadastro  .= "  table_caption_list1: {$row1['table_caption_list1']},";
                  $html_cadastro  .= "  table_aba_son1: {$row1['table_aba_son1']},";
                  $html_cadastro  .= "  table_fields_father1: {$row1['table_fields_father1']},";
                  $html_cadastro  .= "  table_fields_son1: {$row1['table_fields_son1']},";
                  $html_cadastro  .= "  table_son2: {$row1['table_son2']},";
                  $html_cadastro  .= "  table_caption_list2: {$row1['table_caption_list2']},";
                  $html_cadastro  .= "  table_aba_son2: {$row1['table_aba_son2']},";
                  $html_cadastro  .= "  table_fields_father2: {$row1['table_fields_father2']},";
                  $html_cadastro  .= "  table_fields_son2: {$row1['table_fields_son2']},";
                  $html_cadastro  .= "  sql1: {$row1['sql1']},";
                  $html_cadastro  .= "  sql2: {$row1['sql2']}";
                  $html_cadastro  .= "</span>";

                  $html_cadastro  .= "<span>";
                  $html_cadastro  .= "table_: {$row2['table_']},";
                  $html_cadastro  .= "table_caption: {$row2['table_caption']},";
                  $html_cadastro  .= "table_son1: {$row2['table_son1']},";
                  $html_cadastro  .= "table_caption_list1: {$row2['table_caption_list1']},";
                  $html_cadastro  .= "table_aba_son1: {$row2['table_aba_son1']},";
                  $html_cadastro  .= "table_fields_father1: {$row2['table_fields_father1']},";
                  $html_cadastro  .= "table_fields_son1: {$row2['table_fields_son1']},";
                  $html_cadastro  .= "table_son2: {$row2['table_son2']},";
                  $html_cadastro  .= "table_caption_list2: {$row2['table_caption_list2']},";
                  $html_cadastro  .= "table_aba_son2: {$row2['table_aba_son2']},";
                  $html_cadastro  .= "table_fields_father2: {$row2['table_fields_father2']},";
                  $html_cadastro  .= "table_fields_son2: {$row2['table_fields_son2']},";
                  $html_cadastro  .= "sql1: {$row2['sql1']},";
                  $html_cadastro  .= "sql2: {$row2['sql2']}";
                  $html_cadastro  .= "</span>";


      for( var i = 0; i < temp1.length ; i++ ){
        temp2 = temp1[i].split(":");
        if( temp2[0]                                 == "table_")              { table_ = temp2[1]; table = temp2[1]; }
        if( temp2[0]                 == "table_caption")       { table_caption     = temp2[1]; }
        if( temp2[0].substring(0,temp2[0].length -1) == "table_son")           { table_son           = temp2[1]; }
        if( temp2[0].substring(0,temp2[0].length -1) == "table_caption_list" ) { table_caption_list  = temp2[1]; }
        if( temp2[0].substring(0,temp2[0].length -1) == "table_aba_son" )      { table_aba_son       = temp2[1]; }
        if( temp2[0].substring(0,temp2[0].length -1) == "table_fields_father" ){ table_fields_father = temp2[1]; }
        if( temp2[0].substring(0,temp2[0].length -1) == "table_fields_son" )   { table_fields_son    = temp2[1]; }

        /* Se for uma tabela ou
           Se todos campos da tabela filha estiver carregados ( verifico o ultimo parametro table_fields_son)
           Gera um grid da tabela 
        */
      
        if( table_caption != "" || table_fields_son != ""){

          /* Cria tab para tabelas filhas  + table_son + "_'"*/
          if(table_fields_son != ""){
            
            /* Incluir abas extras */
                html  = "<li class='nav-item son-class' >";
                  html += " <a id='" + table_son + "-tab' href='#' onclick=\"sel_tab('#" + table_son + "', '#" + table_son + "-tab');\" class='nav-link disabled nav-disabled'>" + table_aba_son + "</a>";
                html += " <span id='" + table_son + "-span'>table:" + table + ",table_son:" + table_son + ",table_caption_list:" + table_caption_list + ",table_aba_son:" + table_aba_son + ",table_fields_father:" + table_fields_father + ",table_fields_son:" + table_fields_son + "</span>";
                html += "</li>";
                $("#myTab .nav-item").filter(":last").after( html );

              html  = "<div class='tab-pane fade p-3 son-class' id='" + table_son + "_' role='tabpanel' >";
              html += " <div id='" + table_son + "' ></div>";
              html += "</div>";
              $("#two-" + table ).filter(":last").after( html );

          }else{

            $("#zero-span-" + table ).html( table_ + "," +  table_caption);

            /*cria a grade só se for a tabela principal */
            create_table_grid( table_, table_caption);
          }
          
          table_ = ""; 
          table_caption = ""; 
          table_son = ""; 
          table_caption_list = ""; 
          table_aba_son = ""; 
          table_fields_father = ""; 
          table_fields_son = "";
        }
      }



            /* Pega as informações da tag span para montar a grade das tabelas filhas */
      var temp1 = $( f + "-span").text();
      temp1 = temp1.replace(/\s/g, "")
      temp1 = temp1.split(",");

      var temp2;
      var table = ""; table_son = ""; var table_caption_list = ""; var table_aba_son = ""; var table_fields_father = "";  var table_fields_son = "";

      /* pega os parametros para função create_table_grid_son */
      for( var i = 0; i < temp1.length ; i++ ){
        temp2 = temp1[i].split(":");
        if( temp2[0]                                 == "table")               { table               = temp2[1]; }
        if( temp2[0].substring( 0, temp2[0].length ) == "table_son")           { table_son           = temp2[1]; }
        if( temp2[0].substring( 0, temp2[0].length ) == "table_caption_list" ) { table_caption_list  = temp2[1]; }
        if( temp2[0].substring( 0, temp2[0].length ) == "table_aba_son" )      { table_aba_son       = temp2[1]; }
        if( temp2[0].substring( 0, temp2[0].length ) == "table_fields_father" ){ table_fields_father = temp2[1]; }
        if( temp2[0].substring( 0, temp2[0].length ) == "table_fields_son" )   { table_fields_son    = temp2[1]; }
      } 

      /* 
        Se todos campos da tabela filha estiver carregados ( verifico o ultimo parametro table_fields_son)
          Gera um grid da tabela 
      */
      if( table_son != ""){

        /* Cria o HTML só se não existir */
        if ( $("#container-fluid-" + table_son ).length == 0){ 
           $temp = createtab_( table_son );
           $("#" + table_son + "_" ).after( $temp );
        }

        /* Monta o grid com os dados da tabela filha */
        create_table_grid_son( f, table, table_son, table_caption_list, table_aba_son, table_fields_father, table_fields_son );
          
          load_dados_form ( table_son, "-" + table_son, "son-" );

          /* Mostrar o grid e esconder o formulario da tabela filha*/
        $(".visible-son").css( "display", "block");
        $( "#two-tab-son-" + table_son ).removeClass("active");
        $( "#one-tab-son-" + table_son ).addClass("active");
        $( "#one-son-" + table_son ).css( "display", "block");
        $( "#two-son-" + table_son ).css( "display", "none");
        $( "#one-son-" + table_son ).tab('show');         
      }               
