 /* ------------------------------------------------------------------*/
        /* Tabela de Itens da Negociação de Compras */
        /* ------------------------------------------------------------------*/
        function LoadItensNegociacaoCompras( $nr_orcamento ){

            $.post("php/table.negociacao.compras.materias.primas.php", 
            {   
                cd_fornecedor: $("#neg_cd_fornecedor").val(),
                nr_orcamento: $("#neg_nr_orcamento").val()
            }, 
            function(data)
                {
                    $("#neg_cd_produto_lista").html(data)
                }).fail(function(r) {
                    alert( "error" );
            });

            /* Limpa formulário de item do pedido venda */
            $('#neg_btn_novo_item').click();

            table_itens_negociacao = $('#neg_negociacao_produto_itens').DataTable( {
                dom: 'rtip',
                "ajax" : {
                    "type" : "POST",
                    "url" : "php/table.negociacao.compras.itens.php",
                    dataSrc : '',                    
                    'data': {
                        'nr_orcamento': $nr_orcamento
                    }
                },
                order: [[ 1, 'asc' ]],
                lengthMenu: [[5], [5]],
                fixedHeader: true,
                destroy: true,
                select: true, 
                columns: [
                    {
                        "data": "nr_orcamento" 
                    },
                    {   "data": null, 
                        "width": '30%',
                        render: function ( data, type, row ) {
                        // Combine the first and last names into a single table field
                        return data.cd_produto +' - '+ data.ds_produto;
                    } },
                    {
                        "data": "ds_unidade_compra",
                        "width": '5%',
                        "className": 'dt-body-center'
                    },
                    {
                        "data": "vr_base_calculo",
                        "render": $.fn.dataTable.render.number( '.', ',', 2, '' ),
                        "className": 'dt-body-right'
                    },
                    {
                        "data": "vr_unidade",
                        "render": $.fn.dataTable.render.number( '.', ',', 2, '' ),
                        "className": 'dt-body-right'
                    },
                    {
                        "data": "vr_produto",
                        render: $.fn.dataTable.render.number( '.', ',', 2, '' ),
                        "className": 'dt-body-right'
                    },
                    {
                        "data": "pc_icms_credito",
                        render: $.fn.dataTable.render.number( '.', ',', 2, '' ),
                        "className": 'dt-body-right'
                    },
                    {
                        "data": "pc_ipi_acrecimo",
                        render: $.fn.dataTable.render.number( '.', ',', 2, '' ),
                        "className": 'dt-body-right'
                    },
                    {
                        "data": "vr_base_calculo_frete",
                        render: $.fn.dataTable.render.number( '.', ',', 2, '' ),
                        "className": 'dt-body-right'
                    },
                    {
                        "data": "ds_unidade_frete",
                        "width": '5%',
                        "className": 'dt-body-center'
                    },
                    {
                        "data": "vr_unidade_Frete",
                        render: $.fn.dataTable.render.number( '.', ',', 2, '' ),
                        "className": 'dt-body-right'
                    }
                ],
                language: {
                    "sEmptyTable": "Nenhum registro encontrado",
                    "rows": "%d linhas selecionadas",
                    "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                    "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
                    "sInfoFiltered": "(Filtrados de _MAX_ registros)",
                    "sInfoPostFix": "",
                    "sInfoThousands": ".",
                    "sLengthMenu": "_MENU_ resultados por página",
                    "sLoadingRecords": "Carregando...",
                    "sProcessing": "Processando...",
                    "sZeroRecords": "Nenhum registro encontrado",
                    "sSearch": "Pesquisar",
                    "oPaginate": {
                        "sNext": "Próximo",
                        "sPrevious": "Anterior",
                        "sFirst": "Primeiro",
                        "sLast": "Último"
                    },
                    "oAria": {
                        "sSortAscending": ": Ordenar colunas de forma ascendente",
                        "sSortDescending": ": Ordenar colunas de forma descendente"
                    },
                    select: {
                        rows: {
                            _: "Selecionado %d linhas",
                            0: "",
                            1: "Selecionado um registro"
                        }
                    }                
                }
            });

            // Seleciona o cliente na lista
            $('#neg_cd_produto').on( 'blur', '', function (e) {
                if( $('#neg_cd_produto').val() ){
                    $("#neg_cd_produto_lista").val( $('#neg_cd_produto').val() );
                }
            });

            // Atualiza o código do cliente selecionado na lista
            $('#neg_cd_produto_lista').on( 'change', '', function (e) {
                $('#neg_cd_produto').val( $("#neg_cd_produto_lista").val() );
            });

            // Seleciona a linha do item de pedido
            table_itens_negociacao.on( 'select', function ( e, dt, type, indexes ) {
                var linhaItem = table_itens_negociacao.row( indexes ).data();
                
                $('#neg_cd_produto_lista').append('<option value=' + linhaItem.cd_produto + '>' + linhaItem.ds_produto  + '</option>');

                $("#neg_nr_orcamento_item").val( linhaItem.nr_orcamento );
                $("#neg_cd_produto").val( linhaItem.cd_produto );
                $("#neg_cd_produto_lista").val( linhaItem.cd_produto );
                $("#neg_ds_unidade_compra").val( linhaItem.ds_unidade_compra );
                $("#neg_vr_base_calculo").val( linhaItem.vr_base_calculo );
                $("#neg_vr_unidade").val(linhaItem.vr_unidade);
                $("#neg_vr_produto").val( numberToReal( Number( linhaItem.vr_produto)));
                $("#neg_pc_icms_credito").val( numberToReal( Number( linhaItem.pc_icms_credito)));
                $("#neg_pc_ipi_acrecimo").val( numberToReal( Number( linhaItem.pc_ipi_acrecimo)));
                $("#neg_ds_unidade_frete").val( linhaItem.ds_unidade_frete );
                $("#neg_vr_base_calculo_frete").val( numberToReal( Number( linhaItem.vr_base_calculo_frete)));
                $("#neg_vr_unidade_Frete").val( numberToReal( Number( linhaItem.vr_unidade_Frete)));

                $("#neg_btn_novo_item").show();                
                $("#neg_btn_gravar_item").text("Atualizar Item");
                $('#neg_btn_excluir_item').show();
                
            });            
  
            $('#neg_btn_novo_item').on( 'click', '', function (e) {
                $("#neg_cd_produto").val("");
                $("#neg_cd_produto_lista").val("");
                $("#neg_ds_unidade_compra").val("");
                $("#neg_vr_base_calculo").val("");
                $("#neg_vr_unidade").val("");
                $("#neg_vr_produto").val("");
                $("#neg_pc_icms_credito").val("");
                $("#neg_pc_ipi_acrecimo").val("");
                $("#neg_ds_unidade_frete").val("");
                $("#neg_vr_base_calculo_frete").val("");
                $("#neg_vr_unidade_Frete").val("");

                $("#neg_btn_gravar_item").text("Incluir Item");
                $('#neg_btn_excluir_item').hide();
            });

            $('#neg_btn_gravar_item').on( 'click', '', function (e) {
                
                if( !$("#neg_ds_unidade_compra").val() ){
                    alert("Selecione um produto!");
                    return false;
                }

                $acao = "I";
                if( $("#neg_btn_gravar_item").text() == "Atualizar Item"){
                    $acao = "U";
                }
                $.post("php/table.negociacao.compras.item.manutencao.php", 
                {   
                    acao: $acao,
                    nr_orcamento: $("#neg_nr_orcamento_item").val(),
                    cd_produto: $("#neg_cd_produto_lista").val(),
                    ds_unidade_compra: $("#neg_ds_unidade_compra").val(),
                    vr_base_calculo: $("#neg_vr_base_calculo").val().replace(".","").replace(",","."),
                    vr_unidade: $("#neg_vr_unidade").val().replace(".","").replace("R$ ","").replace(",","."),
                    vr_produto: $("#neg_vr_produto").val().replace(".","").replace("R$ ","").replace(",","."),
                    pc_icms_credito: $("#neg_pc_icms_credito").val().replace(".","").replace(" (%)","").replace(",","."),
                    pc_ipi_acrecimo: $("#neg_pc_ipi_acrecimo").val().replace(".","").replace(" (%)","").replace(",","."),
                    ds_unidade_frete: $("#neg_ds_unidade_frete").val(),
                    vr_base_calculo_frete: $("#neg_vr_base_calculo_frete").val().replace(".","").replace(",","."),
                    vr_unidade_Frete: $("#neg_vr_unidade_Frete").val().replace(".","").replace("R$ ","").replace(",","."),
                }, 
                function(data)
                {
                    table_itens_negociacao.ajax.reload();
                    $('#neg_btn_novo_item').click();
                }).fail(function(r) {
                    alert( "error" );
                });

            });

            $('#neg_btn_excluir_item').on( 'click', '', function (e) {
                if( !$("#neg_nr_orcamento").val() || !$("#neg_cd_produto_lista").val() ){
                    alert("Selecione um registro!");
                    return false;
                }

                $("#neg_excluir_item_negociacao").show();

            });
            
            $('#btn_neg_sim_excluir_item_negociacao').on( 'click', '', function (e) {
                
                $('#neg_excluir_item_negociacao').hide();
                
                $.post("php/table.negociacao.compras.item.manutencao.php", 
                {   
                    acao: "E",
                    nr_orcamento: $("#neg_nr_orcamento").val(),
                    cd_produto: $("#neg_cd_produto_lista").val()
                }, 
                function(data)
                {
                    table_itens_negociacao.ajax.reload();
                    
                    $('#neg_btn_novo_item').click();

                }).fail(function(r) {
                    alert( "error" );
                });
            });

        }

        /* ------------------------------------------------------------------*/
        /* Tabela de Anexos da Negociação de Compras */
        /* ------------------------------------------------------------------*/

        function LoadAnexosNegociacaoCompras( $nr_orcamento ){

            /* Limpa formulário de anexos do pedido venda */
            $("#neg_nr_orcamento_anexo").val( "");
            $("#neg_nm_arquivo").val( "" );
            $("#neg_nm_arquivoOriginal").val( "" );
            $("#neg_ds_anexo").val( "" );
            $("#neg_dt_inclusao").val( "" );

            table_anexos_negociacao = $('#neg_negociacao_anexos').DataTable({
                "ajax" : {
                    "type" : "POST",
                    "url" : "php/table.negociacao.compras.anexos.php",
                    dataSrc : '',                    
                    'data': {
                        'nr_orcamento': $nr_orcamento
                    }
                },
                select: true,
                destroy: true,
                order: [[ 1, 'asc']],        
                "columns": [
                    { "data": "nr_orcamento" },
                    { "data": "nm_arquivo" },
                    { "data": "nm_arquivooriginal" },
                    { "data": "ds_anexo" },
                    { "data": "dt_inclusao", 
                        "render": function (val, type, row) {
                            if (val === null) return "";
                            return moment(val).format('DD/MM/YYYY HH:mm:ss');
                        },
                        "className": 'dt-body-center'
                    }
                ],
                "dom": '<"top"f>rt<"bottom"p><"clear">',
                "pageLength": 5,
                language: {
                    "sEmptyTable": "Nenhum registro encontrado",
                    "rows": "%d linhas selecionadas",
                    "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                    "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
                    "sInfoFiltered": "(Filtrados de _MAX_ registros)",
                    "sInfoPostFix": "",
                    "sInfoThousands": ".",
                    "sLengthMenu": "_MENU_ resultados por página",
                    "sLoadingRecords": "Carregando...",
                    "sProcessing": "Processando...",
                    "sZeroRecords": "Nenhum registro encontrado",
                    "sSearch": "Pesquisar",
                    "oPaginate": {
                        "sNext": "Próximo",
                        "sPrevious": "Anterior",
                        "sFirst": "Primeiro",
                        "sLast": "Último"
                    },
                    "oAria": {
                        "sSortAscending": ": Ordenar colunas de forma ascendente",
                        "sSortDescending": ": Ordenar colunas de forma descendente"
                    },
                    select: {
                        rows: {
                            _: "Selecionado %d linhas",
                            0: "Clique na linha para selecionar um registro",
                            1: "Selecionado um registro"
                        }
                    }                
                }

            });           

            // Seleciona a linha do anexo pedido de vendas
            table_anexos_negociacao.on( 'select', function ( e, dt, type, indexes ) {
                var linhaAnexo = table_anexos_negociacao.row( indexes ).data();

                $("#neg_nr_orcamento_anexo").val( linhaAnexo.nr_orcamento );
                $("#neg_nm_arquivo").val( linhaAnexo.nm_arquivo );
                $("#neg_nm_arquivooriginal").val( linhaAnexo.nm_arquivooriginal );
                $("#neg_ds_anexo").val( linhaAnexo.ds_anexo );
                $("#neg_dt_inclusao_anexo").val( moment(linhaAnexo.dt_inclusao).format('DD/MM/YYYY h:mm:ss') );

                $("#neg_download").attr("href", "imagens/anexosNC/" + linhaAnexo.nm_arquivo);

                $('#neg_btn_gravar_anexo').show();
                $('#neg_btn_excluir_anexo').show();
                
            });

        }

        // Enviar o arquivo para o servidor
        $("form#neg_enviar_anexo_negociacao").submit(function(event){
         
            // disable the default form submission
            event.preventDefault();
         
            if( !$("#neg_nr_orcamento_enviar").val()){
                alert("Selecione uma negociação de compras!")
                return false;
            }

            // Pega todos os dados do servidor  
            var formData = new FormData($(this)[0]);
  
            $.ajax({
                url: 'upload/envia_anexos_negociacao.compras.php',
                type: 'POST',
                data: formData,
                async: false,
                cache: false,
                contentType: false,
                processData: false,
                success: function (returndata) {
                    if(returndata.substring(0,3)=="sim"){
                        $("#neg_enviar_anexo_negociacao").get(0).reset()
                        table_anexos_negociacao.ajax.reload();
                    }
                }
            });         

            return false;

        });

        $('#neg_btn_gravar_anexo').on( 'click', '', function (e) {

            $.post("php/table.negociacao.compras.anexos.manutencao.php", 
            {   
                acao: "U",
                nr_orcamento: $("#neg_nr_orcamento").val(),
                nm_arquivo: $("#neg_nm_arquivo").val(),
                ds_anexo: $("#neg_ds_anexo").val()            }, 
            function(data)
            {
                $("#nr_orcamento_anexo").val( "");
                $("#nm_arquivo").val( "" );
                $("#nm_arquivoOriginal").val( "" );
                $("#ds_anexo").val( "" );
                $("#dt_inclusao_anexo").val( "" );                
                table_anexos_negociacao.ajax.reload();
            }).fail(function(r) {
                alert( "error" );
            });

        });

        $('#neg_btn_excluir_anexo').on( 'click', '', function (e) {
            $('#neg_excluir_anexo').show();            
        });

        $('#neg_btn_sim_excluir_anexo').on( 'click', '', function (e) {
            $.post("php/table.negociacao.compras.anexos.manutencao.php", 
            {   
                acao: "E",
                nr_orcamento: $("#neg_nr_orcamento").val(),
                nm_arquivo: $("#neg_nm_arquivo").val()        }, 
            function(data)
            {
                $('#neg_excluir_anexo').hide();  
                $("#neg_nr_orcamento_anexo").val( "");
                $("#neg_nm_arquivo").val( "" );
                $("#neg_nm_arquivooriginal").val( "" );
                $("#neg_ds_anexo").val( "" );
                $("#neg_dt_inclusao_anexo").val( "" );

                table_anexos_negociacao.ajax.reload();
            }).fail(function(r) {
                alert( "error" );
            });
        });



        /* ------------------------------------------------------------------*/
        /* Tabela de Contatos do Pedido Vendas */
        /* ------------------------------------------------------------------*/
        function LoadContatosNegociacaoCompras( $nr_orcamento ){

            /* Limpa formulário de anexos do pedido venda */
            $("#neg_btn_novo_contato").click();
            $('#neg_btn_excluir_contato').hide();

            table_contatos_negociacao = $('#neg_negociacao_contatos').DataTable({
                "ajax" : {
                    "type" : "POST",
                    "url" : "php/table.negociacao.compras.contatos.php",
                    dataSrc : '',                    
                    'data': {
                        'nr_orcamento': $nr_orcamento
                    }
                },
                select: true,
                destroy: true,
                order: [[ 1, 'asc']],        
                "columns": [
                    {   "data": "nr_orcamento",
                        "width": '5%',
                        "className": 'dt-body-center'
                    },
                    {   "data": "cd_contato",
                        "width": '5%',
                        "className": 'dt-body-center'
                    },
                    {   "data": "nm_contato",
                        "width": '38%',
                        "className": 'dt-body-left'
                    },
                    {   "data": "observacao",
                        "width": '48%',
                        "className": 'dt-body-left'
                    }
                ],
                "dom": '<"top"f>rt<"bottom"p><"clear">',
                "pageLength": 5,
                language: {
                    "sEmptyTable": "Nenhum registro encontrado",
                    "rows": "%d linhas selecionadas",
                    "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                    "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
                    "sInfoFiltered": "(Filtrados de _MAX_ registros)",
                    "sInfoPostFix": "",
                    "sInfoThousands": ".",
                    "sLengthMenu": "_MENU_ resultados por página",
                    "sLoadingRecords": "Carregando...",
                    "sProcessing": "Processando...",
                    "sZeroRecords": "Nenhum registro encontrado",
                    "sSearch": "Pesquisar",
                    "oPaginate": {
                        "sNext": "Próximo",
                        "sPrevious": "Anterior",
                        "sFirst": "Primeiro",
                        "sLast": "Último"
                    },
                    "oAria": {
                        "sSortAscending": ": Ordenar colunas de forma ascendente",
                        "sSortDescending": ": Ordenar colunas de forma descendente"
                    },
                    select: {
                        rows: {
                            _: "Selecionado %d linhas",
                            0: "Clique na linha para selecionar um registro",
                            1: "Selecionado um registro"
                        }
                    }                
                }
            });           

            // Seleciona a linha do anexo pedido de vendas
            table_contatos_negociacao.on( 'select', function ( e, dt, type, indexes ) {
                var linhaContato = table_contatos_negociacao.row( indexes ).data();

                $("#neg_nr_orcamento_contato").val( linhaContato.nr_orcamento );
                $("#neg_cd_contato").val( linhaContato.cd_contato );
                $("#neg_nm_contato").val( linhaContato.nm_contato );
                $("#neg_observacao").val( linhaContato.observacao );
                
                $('#neg_btn_gravar_contato').html("Atualizar Contato");
                $('#neg_btn_gravar_contato').show();
                $('#neg_btn_excluir_contato').show();      
                $('#neg_btn_novo_contato').show();          
            });
        }

        $('#neg_btn_gravar_contato').on( 'click', '', function (e) {
            $acao = "I";
            if( $("#neg_btn_gravar_contato").text() == "Atualizar Contato"){
                $acao = "U";
            }
            $.post("php/table.negociacao.compras.contatos.manutencao.php", 
            {   
                acao: $acao,
                nr_orcamento: $("#neg_nr_orcamento_contato").val(),
                cd_contato: $("#neg_cd_contato").val(),
                nm_contato: $("#neg_nm_contato").val(),
                observacao: $("#neg_observacao").val()            
            }, 
            function(data)
            {
                $("#neg_btn_novo_contato").click();                
                table_contatos_negociacao.ajax.reload();
            }).fail(function(r) {
                alert( "error" );
            });

        });

        $('#neg_btn_excluir_contato').on( 'click', '', function (e) {
            $('#neg_excluir_contato').show();            
        });

        $('#neg_btn_sim_excluir_contato').on( 'click', '', function (e) {
            $.post("php/table.negociacao.compras.contatos.manutencao.php", 
            {   
                acao: "E",
                nr_orcamento: $("#neg_nr_orcamento_contato").val(),
                cd_contato: $("#neg_cd_contato").val()        
            }, 
            function(data)
            {                    
                $('#neg_excluir_contato').hide();
                $("#neg_btn_novo_contato").click();

                table_contatos_negociacao.ajax.reload();
            }).fail(function(r) {
                alert( "error" );
            });
        });

        $('#neg_btn_novo_contato').on( 'click', '', function (e) {
            $('#neg_btn_gravar_contato').show();
            $('#neg_btn_gravar_contato').html( "Incluir Contato" );
            $('#neg_btn_excluir_contato').hide();
            $('#neg_cd_contato').val( "" );
            $('#neg_nm_contato').val( "" );
            $('#neg_observacao').val( "" );
            //$('#neg_nm_contato').focus();
        });
        
    