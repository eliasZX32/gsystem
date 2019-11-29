
jQuery(function($){







    	var table = $('#neg_negociacao_compras').DataTable( {
    		dom: 'Brtip',
            lengthMenu: [[5], [5]],
            //"processing": true,
            //"serverSide": true,
    		//ajax: 'php/table.vendas.php',
            "ajax" : {
                "type" : "POST",
                "url" : "php/table.negociacao.compras.php",
                dataSrc : ''
            },          
            select: true,              
            order: [[ 0, 'desc' ]],
    		columns: [
                {
                    "data": "nr_orcamento",
                    "className": 'dt-body-center'
                },            
                { "data": null,
                    render: function ( data, type, row ) {
                        // Combine the first and last names into a single table field
                        return data.cd_fornecedor +' - '+ data.nm_razao;
                    },
                    "className": 'dt-body-left'
                },
                {
                    "data": "dt_orcamento",
                    "render": function (val, type, row) {
                        if (val === null || val === '0000-00-00 00:00:00' ) return "";
                        return moment(val).format('DD/MM/YYYY');
                    },
                    "className": 'dt-body-center'
                },
                {
                    "data": "fl_baixado",
                    "render": function (val, type, row) {
                        return val == 0 ? "Não" : "Sim";
                    },
                    "className": 'dt-body-center'
                },
                {
                    "data": "fl_cancelado",
                    "render": function (val, type, row) {
                        return val == 0 ? "Não" : "Sim";
                    },
                    "className": 'dt-body-center'
                },
                { 
                    "data": "dt_inclusao", 
                    "render": function (val, type, row) {
                        if (val === null || val === '0000-00-00 00:00:00' ) return "";
                        return moment(val).format('DD/MM/YYYY HH:mm:ss');
                    },
                    "className": 'dt-body-center'
                },
                { 
                    "data": "dt_atualizacao", 
                    "render": function (val, type, row) {
                        if (val === null || val === '0000-00-00 00:00:00' ) return "";
                        return moment(val).format('DD/MM/YYYY HH:mm:ss');
                    },
                    "className": 'dt-body-center'
                },                
                {   "data": "usuario" }
    		],
    		buttons: [
                {
                    extend: 'collection',
                    text: 'Exportar',
                    autoClose: true,
                    buttons: [
                        'copy',
                        'excel',
                        'csv',
                        'pdf',
                        'print'
                    ]
                },
                {
                    extend: 'alert',
                    text: 'Desativar a Negociação'
                },
                {
                    extend: 'alert',
                    text: 'Cancelar a Negociação'
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

        $('#neg_negociacao_compras tfoot th').each( function () {
            var title = $(this).text();
            //var largura = $(this).width();
            var largura = [ 
                            "40px;", 
                            "300px;",
                            "120px;",
                            "80px;",
                            "80px;",
                            "120px;",
                            "120px;",
                            "120px;"
                            ];

            var estilo =  "style='width: " + largura[$(this).index()] + "'";

            if(title){
                $(this).html( '<input type="text" ' + estilo + ' placeholder="'+title+'" />' );
            }
        } );

        // Apply the search
        table.columns().every( function () {
            var that = this;
     
            $( 'input', this.footer() ).on( 'keyup change', function () {
                if ( that.search() !== this.value ) {
                    that
                        .search( this.value )
                        .draw();
                }
            } );
        } );

        table.buttons(1).disable(); // Desativar Negociação
        table.buttons(2).disable(); // Cancelar Negociação

        // Desabilta os botões se não tiver nenhum registro selecionado
        table.on( 'deselect', function ( e, dt, type, indexes ) {
            linha = "";
            indice = "";
            table.buttons(1).disable(); // Desativar Negociação
            table.buttons(2).disable(); // Cancelar Negociação

            $("#ancora_itens_negociacao").html("Manutenção <span>Itens da Negociação</span>");

            // Desabilita Manutenção dos Itens
            table_itens_negociacao.clear().draw();
            $("#nr_orcamento_item").val("");

            // Desabilita Manutenção do Anexo
            table_anexos_negociacao.clear().draw();
            $("#neg_nr_orcamento_anexo").val("");
            $("#neg_nr_orcamento_enviar").val(""); 
            $('#neg_btn_gravar_anexo').hide();
            $('#neg_btn_excluir_anexo').hide();

            // Desabilita Manutenção do Contato
            table_contatos_negociacao.clear().draw();            
            $("#neg_nr_orcamento_contato").val("");
            $('#neg_btn_gravar_contato').hide();
            $('#neg_btn_excluir_contato').hide();

        } );

        table.on( 'select', function ( e, dt, type, indexes ) {

            $('#neg_btn_nova').show();
            $('#neg_btn_gravar').show();
            $('#neg_btn_gravar').text('Atualizar Negociação de Compra');
            $('#neg_btn_excluir').show();

            linha = table.row( indexes ).data();
            indice = table.row( indexes ).index();
            
            table.buttons( 1 ).text("Desativar a Negociação");   
            table.buttons( 2 ).text("Cancelar a Negociação");   
            if (linha.fl_baixado=="1"){
                table.buttons( 1 ).text("Reativar a Negociação");    
            }
            if (linha.fl_cancelado=="1"){
                table.buttons( 2 ).text("Estornar a Negociação");    
            }        

            table.buttons(1).enable(); 
            table.buttons(2).enable(); 

            $("#neg_nr_orcamento").val( linha.nr_orcamento );
            $("#neg_cd_fornecedor").val( linha.cd_fornecedor );
            $("#neg_cd_fornecedor_lista").val( linha.cd_fornecedor );
            $("#neg_dt_orcamento").val("");
            if( linha.dt_orcamento ){
                $("#neg_dt_orcamento").val( linha.dt_orcamento.substring(0,10) );
            }
            $("#neg_fl_baixado").val("Não");
            if(linha.fl_baixado=="1"){
                $("#neg_fl_baixado").val("Sim");
            }
            $("#neg_fl_cancelado").val("Não");
            if(linha.fl_cancelado=="1"){
                $("#neg_fl_cancelado").val("Sim");
            }
            $("#neg_dt_inclusao").val(null);
            if(linha.dt_inclusao){
                $("#neg_dt_inclusao").val( moment( linha.dt_inclusao ).format('DD/MM/YYYY H:mm:ss') );
            }            
            $("#neg_dt_atualizacao").val(null);
            if(linha.dt_atualizacao){
                $("#neg_dt_atualizacao").val( moment( linha.dt_atualizacao ).format('DD/MM/YYYY H:mm:ss') );
            }
            $("#neg_usuario").val(linha.usuario);

            $("#a1").html("Manutenção - Itens do Pedido <span style='color: blue'>[ " + linha.nr_orcamento + " ]</span>");
            
            LoadItensNegociacaoCompras( linha.nr_orcamento );
            $("#neg_nr_orcamento_item").val( linha.nr_orcamento );
            
            /* Habilita manuteção de Anexos */
            LoadAnexosNegociacaoCompras( linha.nr_orcamento );
            $("#neg_nr_orcamento_enviar").val( linha.nr_orcamento );

            /* Habilita Manutenção do Contato */
            LoadContatosNegociacaoCompras( linha.nr_orcamento );
            $("#neg_nr_orcamento_contato").val( linha.nr_orcamento );

        });

        $('#neg_btn_nova').on( 'click', '', function (e) {
            $('#neg_btn_gravar').show();
            $('#neg_btn_gravar').html( "Incluir Negociação de Compra" );
            $('#neg_btn_excluir').hide();
            $('#neg_btn_nova').hide();

            $("#neg_nr_orcamento").val("");
            $("#neg_cd_fornecedor").val("");
            $("#neg_cd_fornecedor_lista").val(-99);
            
            $("#neg_dt_orcamento").val("");
            $("#neg_fl_baixado").val("Não");
            $("#neg_fl_cancelado").val("Não");
            $("#neg_dt_inclusao").val( "" );
            $("#neg_usuario").val( "");
            $("#neg_dt_atualizacao").val( "" );

            $("#neg_cd_fornecedor").focus();
        });

        $('#neg_btn_gravar').on( 'click', '', function (e) {
            $acao = "I";
            if( $("#neg_btn_gravar").text() == "Atualizar Negociação de Compra"){
                $acao = "U";
            }

            $.post("php/table.negociacao.compras.manutencao.php", 
            {   
                acao: $acao,
                nr_orcamento: $("#neg_nr_orcamento").val(),
                cd_fornecedor: $("#neg_cd_fornecedor_lista").val(),
                dt_orcamento: $("#neg_dt_orcamento").val(),
                usuario: $("#usuario").val() // Usuário logado  
            }, 
            function(data)
            {
                table.ajax.reload();
            }).fail(function(r) {
                alert( "error" );
            });

        });

        $('#neg_btn_excluir').on( 'click', '', function (e) {
            if( !$("#neg_nr_orcamento").val()){
                alert("Selecione um registro!");
                return false;
            }

            $("#neg_excluir_negociacao").show();

        });
        
        $('#btn_neg_sim_excluir_negociacao').on( 'click', '', function (e) {
            
            $('#neg_excluir_negociacao').hide();
            
            $.post("php/table.negociacao.compras.manutencao.php", 
            {   
                acao: "E",
                nr_orcamento: $("#neg_nr_orcamento").val()
            }, 
            function(data)
            {
                table.ajax.reload();
                
                $('#neg_btn_nova').click();

            }).fail(function(r) {
                alert( "error" );
            });
        });

    });

});


