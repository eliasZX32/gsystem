        // Usa rotina em PHP genérica para baixar o pedido
        $('#btn_pc_ativar').on( 'click', '', function () {
            $.post('setar.php',
                {
                    tabela: 'compras_materia_primas',
                    atualizar: 'fl_baixado',
                    campofiltro: 'nr_pedido',
                    filtrar: linha.nr_pedido,
                    setar: false
                },
            function(data)
            {
                //Atualiza a celula da linha atual
                table.cell({row: indice, column:4}).data('0').draw();
                table.buttons( 2 ).text('Cancelar o Pedido de Compras');
               $('#pc_ativar').hide();
            }).fail(function(r) {
                alert( 'error' );
            });
        });

        // Usa rotina em PHP genérica para baixar
        $('#btn_pc_cancelar').on( 'click', '', function () {
            $.post('setar.php',
                {
                    tabela: 'compras_materia_primas',
                    atualizar: 'fl_cancelado',
                    campofiltro: nr_pedido,
                    filtrar: linha.nr_pedido,
                    setar: true
                },
                function(data)
                {
                    //Atualiza a celula da linha atual
                    table.cell( { row: indice, column:4}).data('1').draw();
                    table.buttons( 2 ).text('Estornar o Pedido de Compras');
                    $( '#pc_cancelar' ).hide();
                }).fail(function(r) {
                    alert( 'error' );
            });
        });
