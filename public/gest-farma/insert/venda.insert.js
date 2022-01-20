$(this).ready(function () {
    var carrinho = new Array;//vector que vai agregar todos produtos de uma compra
    total_cart=0;
    $('.btn-finish-venda').hide();
    var pg=$('.page-content').attr('pagina');
    if (pg!=undefined && pg=="venda_novo") {
        var carrinho_aux = localStorage.getItem("carrinho");//recebendo dados armazenados localmente
        if (carrinho_aux != null) {
            $('#retorno-venda').modal('show');
            carrinho_aux = JSON.parse(carrinho_aux);
            if (carrinho_aux.length > 0) {
                for (i in  carrinho_aux) {
                    carrinho.push(carrinho_aux[i]);
                }

                var tabela = null;
                var cont = 0;

                for (i in carrinho) {
                    cont++;
                    tabela += '<tr>';
                    tabela += '<td>' + carrinho[i].nome_produto.toUpperCase() + '</td>';
                    tabela += '<td>' + carrinho[i].qtde + '</td>';
                    tabela += '<td>' + carrinho[i].preco + '</td>';
                    tabela += '<td title="Remover do carrinho"><a href="javascript:;" nome_prod=' + carrinho[i].nome_produto + ' posicao=' + i + ' id_prod=' + carrinho[i].id_produto + ' class="btn ml-1 btn-danger btn-xs btn-remover-prod-cart mr-1"><i class="fa fa-trash"></i></a>' +
                        '<a title="Adicionar quantidade" href="javascript:;" nome_prod=' + carrinho[i].nome_produto + ' posicao=' + i + ' id_prod=' + carrinho[i].id_produto + ' class="btn ml-1 btn-success btn-xs btn-add-qtde mr-1"><i class="fa fa-plus"></i></a>' +
                        '<a title="Diminuir quantidade" href="javascript:;" nome_prod=' + carrinho[i].nome_produto + ' posicao=' + i + ' id_prod=' + carrinho[i].id_produto + ' class="btn ml-1 btn-info btn-xs btn-dim-qtde"><i class="fa fa-minus"></i></a></td>';
                    tabela += '</tr>';
                }
                $('.btn-finish-venda').show();
                $('.tbody-carrinho').html(tabela);
                total_cart = carrinho.length;
                $('.qtdade_produto_venda').html(carrinho.length);
            }
        }
    }

    $('.btn-sim-eliminar-venda').click(function () {
        localStorage.removeItem("carrinho");
        window.location=URL+'venda/novo';
    });

    preco=0;
    $('.btn-add-producto-cart').click(function () {
        var id_produto = $('.produto_venda').val();
        var nome_produto = $('.produto_venda option:selected').text();
        var qtde_produto = $('.qtde_prod').val();
        var estante = $('.produto_venda option:selected').attr('estante');
        var codigo = $('.produto_venda option:selected').attr('codigo');
        var estoque = $('.produto_venda option:selected').attr('estoque');
        var qtde_grosso=$('.produto_venda option:selected').attr('qtde_grosso');
        preco=$('.produto_venda option:selected').attr('preco');
        if (qtde_produto>1)
            preco=preco*qtde_produto;

        var desconto = 0;
        var ctrl=0;
        if (+(estoque > qtde_produto)) {
            desconto = estoque - qtde_produto;

            if (qtde_produto != "") {
                if(carrinho.length===0)
                {
                    carrinho.push(
                        {
                            'id_produto': id_produto,
                            'nome_produto': nome_produto,
                            'estante': estante,
                            'codigo_produto': codigo,
                            'estoque_produto': estoque,
                            'desconto': desconto,
                            'qtde': qtde_produto,
                            'qtde_grosso':qtde_grosso,
                            'preco':preco
                        }
                    );
                    ctrl=0;
                }else
                    {
                        for (i in carrinho)
                        {
                            if($('.produto_venda').val()===carrinho[i].id_produto)
                            {
                                carrinho[i].qtde=(+carrinho[i].qtde)+(+qtde_produto);
                                carrinho[i].preco=(+carrinho[i].preco)+(+preco);
                                ctrl=1;
                            }
                        }
                        if (ctrl==0)
                        {
                            carrinho.push(
                                {
                                    'id_produto': id_produto,
                                    'nome_produto': nome_produto,
                                    'estante': estante,
                                    'codigo_produto': codigo,
                                    'estoque_produto': estoque,
                                    'desconto': desconto,
                                    'qtde': qtde_produto,
                                    'qtde_grosso':qtde_grosso,
                                    'preco':preco
                                }
                            );

                        }
                    }
                localStorage.setItem("carrinho",JSON.stringify(carrinho));
                //armazenando os dados da venda no browser

            } else {
                alert("Por favor informa a quantidade");
            }
        } else {
            alert('A quantidade inserida não pode ser maior do que a existente em estoque.');
        }

        var tabela = null;
        var cont = 0;

            for (i in carrinho) {
                cont++;
                tabela += '<tr>';
                tabela += '<td>' + carrinho[i].nome_produto.toUpperCase() + '</td>';
                tabela += '<td>' + carrinho[i].qtde + '</td>';
                tabela += '<td>' + carrinho[i].preco + '</td>';
                tabela += '<td title="Remover do carrinho"><a href="javascript:;" nome_prod=' + carrinho[i].nome_produto + ' posicao=' + i + ' id_prod=' + carrinho[i].id_produto + ' class="btn ml-1 btn-danger btn-xs btn-remover-prod-cart  mr-1"><i class="fa fa-trash"></i></a>' +
                    '<a title="Adicionar quantidade" href="javascript:;" nome_prod='+carrinho[i].nome_produto+' posicao='+i+' id_prod='+carrinho[i].id_produto+' class="btn ml-1 btn-success btn-xs btn-add-qtde mr-1"><i class="fa fa-plus"></i></a>' +
                    '<a title="Diminuir quantidade" href="javascript:;" nome_prod='+carrinho[i].nome_produto+' posicao='+i+' id_prod='+carrinho[i].id_produto+' class="btn ml-1 btn-info btn-xs btn-dim-qtde"><i class="fa fa-minus"></i></a></td>';
                tabela += '</tr>';
            }
        $('.btn-finish-venda').show();
        $('.tbody-carrinho').html(tabela);
        total_cart=carrinho.length;
        $('.qtdade_produto_venda').html(carrinho.length);
    });

    $('.tbody-carrinho').on('click', '.btn-remover-prod-cart', function () {

        var tabela = null;
        var pos = $(this).attr('posicao');
        var ctrl=null;
        delete carrinho[pos];
        for (i in carrinho) {
            tabela += '<tr>';
            tabela += '<td>' + carrinho[i].nome_produto.toUpperCase() + '</td>';
            tabela += '<td>' + carrinho[i].qtde + '</td>';
            tabela += '<td>' + carrinho[i].preco + '</td>';
            tabela += '<td title="Remover do carrinho"><a href="javascript:;" nome_prod=' + carrinho[i].nome_produto + ' posicao=' + i + ' id_prod=' + carrinho[i].id_produto + ' class="btn ml-1 btn-danger btn-xs btn-remover-prod-cart mr-1"><i class="fa fa-trash"></i></a>' +
                '<a title="Adicionar quantidade" href="javascript:;" nome_prod='+carrinho[i].nome_produto+' posicao='+i+' id_prod='+carrinho[i].id_produto+' class="btn ml-1 btn-success btn-xs btn-add-qtde mr-1"><i class="fa fa-plus"></i></a>' +
                '<a title="Diminuir quantidade" href="javascript:;" nome_prod='+carrinho[i].nome_produto+' posicao='+i+' id_prod='+carrinho[i].id_produto+' class="btn ml-1 btn-info btn-xs btn-dim-qtde"><i class="fa fa-minus"></i></a></td>';
            tabela += '</tr>';
            ctrl=carrinho[i].nome_produto;

        }
        if (ctrl==""||ctrl==null)
        {
            $('.btn-finish-venda').hide();
            delete carrinho;
            carrinho=new Array;
            localStorage.removeItem("carrinho");
        }

        $('.tbody-carrinho').html(tabela);
        $('.qtdade_produto_venda').html(+(total_cart-1));
    });

    $('.tbody-carrinho').on('click', '.btn-add-qtde', function () {

        var tabela = null;
        var pos = $(this).attr('posicao');
        carrinho[pos].qtde=(+carrinho[pos].qtde)+(1);
        carrinho[pos].preco=(+carrinho[pos].preco)+(+(preco));
        for (i in carrinho) {
            tabela += '<tr>';
            tabela += '<td>' + carrinho[i].nome_produto.toUpperCase() + '</td>';
            tabela += '<td>' + carrinho[i].qtde + '</td>';
            tabela += '<td>' + carrinho[i].preco + '</td>';
            tabela += '<td title="Remover do carrinho"><a href="javascript:;" nome_prod=' + carrinho[i].nome_produto + ' posicao=' + i + ' id_prod=' + carrinho[i].id_produto + ' class="btn ml-1 btn-danger btn-xs btn-remover-prod-cart mr-1"><i class="fa fa-trash"></i></a>' +
                '<a title="Adicionar quantidade" href="javascript:;" nome_prod='+carrinho[i].nome_produto+' posicao='+i+' id_prod='+carrinho[i].id_produto+' class="btn ml-1 btn-success btn-xs btn-add-qtde mr-1"><i class="fa fa-plus"></i></a>' +
                '<a title="Diminuir quantidade" href="javascript:;" nome_prod='+carrinho[i].nome_produto+' posicao='+i+' id_prod='+carrinho[i].id_produto+' class="btn ml-1 btn-info btn-xs btn-dim-qtde"><i class="fa fa-minus"></i></a></td>';
            tabela += '</tr>';
        }
        $('.tbody-carrinho').html(tabela);
        $('.qtdade_produto_venda').html(+(total_cart-1));
    });

    $('.tbody-carrinho').on('click', '.btn-dim-qtde', function () {

        var tabela = null;
        var pos = $(this).attr('posicao');
        carrinho[pos].qtde=(+carrinho[pos].qtde)-(1);
        carrinho[pos].preco=(+carrinho[pos].preco)-(+(preco));
        for (i in carrinho) {
            tabela += '<tr>';
            tabela += '<td>' + carrinho[i].nome_produto.toUpperCase() + '</td>';
            tabela += '<td>' + carrinho[i].qtde + '</td>';
            tabela += '<td>' + carrinho[i].preco + '</td>';
            tabela += '<td title="Remover do carrinho"><a href="javascript:;" nome_prod=' + carrinho[i].nome_produto + ' posicao=' + i + ' id_prod=' + carrinho[i].id_produto + ' class="btn ml-1 btn-danger btn-xs btn-remover-prod-cart mr-1"><i class="fa fa-trash"></i></a>' +
                '<a title="Adicionar quantidade" href="javascript:;" nome_prod='+carrinho[i].nome_produto+' posicao='+i+' id_prod='+carrinho[i].id_produto+' class="btn ml-1 btn-success btn-xs btn-add-qtde mr-1"><i class="fa fa-plus"></i></a>' +
                '<a title="Diminuir quantidade" href="javascript:;" nome_prod='+carrinho[i].nome_produto+' posicao='+i+' id_prod='+carrinho[i].id_produto+' class="btn ml-1 btn-info btn-xs btn-dim-qtde"><i class="fa fa-minus"></i></a></td>';
            tabela += '</tr>';
        }
        $('.tbody-carrinho').html(tabela);
        $('.qtdade_produto_venda').html(+(total_cart-1));
    });

    //Adicionar fornecedor
    $('.fornecedor_store').click(function () {
        var dados=$('.frm_fornecedor').serialize();
        var url=$('.frm_fornecedor').attr('action');
        $.post(url,dados,function (x) {
            toastr[x[0].alerta](x[0].sms, x[0].titulo);
            $('.cls').val('');
        },'json');
    });


    //Editar fornecedor
    $('.fornecedor_update').click(function () {
        var dados=$('.frm_fornecedor_editar').serialize();
        var url=$('.frm_fornecedor_editar').attr('action');

        $.post(url,dados,function (x) {
            toastr[x[0].alerta](x[0].sms, x[0].titulo);
            setTimeout(function () {
                window.location=URL+'fornecedor/listar';
            },700);
        },'json');
    });


    //Leitor de código de barra
    $('.input-codigo-barra').keyup(function (e) {
        if (e.keyCode==13)
        {
            if ($(this).val()!="") {
                $.get(URL + 'produto/get_produto_by_codigo_barra', {param: $(this).val()}, function (x) {
                    if (x[0].erro) {
                        $('.input-codigo-barra').focus().val('').addClass('is-invalid');
                        $('.qtde-retalho,.qtde_grosso').text('0');
                    } else {
                        $('.input-codigo-barra').removeClass('is-invalid');
                        var id_produto = x[0].id;
                        var nome_produto = x[0].nome;
                        var qtde_produto = 1;
                        var estante = x[0].estante;
                        var codigo = x[0].codigo;
                        var estoque = x[0].estoque;
                        var qtde_grosso = x[0].qtde_grosso;
                        preco = x[0].preco;
                        if (qtde_produto > 1)
                            preco = preco * qtde_produto;
                        var desconto = 0;
                        var ctrl = 0;
                        desconto = estoque - qtde_produto;

                        if (carrinho.length === 0) {
                            carrinho.push(
                                {
                                    'id_produto': id_produto,
                                    'nome_produto': nome_produto,
                                    'estante': estante,
                                    'codigo_produto': codigo,
                                    'estoque_produto': estoque,
                                    'desconto': desconto,
                                    'qtde': qtde_produto,
                                    'qtde_grosso': qtde_grosso,
                                    'preco': preco
                                }
                            );
                            ctrl = 0;
                        } else {
                            for (i in carrinho) {
                                if (id_produto === carrinho[i].id_produto) {
                                    carrinho[i].qtde = (+carrinho[i].qtde) + (+qtde_produto);
                                    carrinho[i].preco = (+carrinho[i].preco) + (+preco);
                                    ctrl = 1;
                                }
                            }
                            if (ctrl == 0) {
                                carrinho.push(
                                    {
                                        'id_produto': id_produto,
                                        'nome_produto': nome_produto,
                                        'estante': estante,
                                        'codigo_produto': codigo,
                                        'estoque_produto': estoque,
                                        'desconto': desconto,
                                        'qtde': qtde_produto,
                                        'qtde_grosso': qtde_grosso,
                                        'preco': preco
                                    }
                                );

                            }
                        }
                        localStorage.setItem("carrinho", JSON.stringify(carrinho));
                        //armazenando os dados da venda no browser

                        var tabela = null;
                        var cont = 0;

                        for (i in carrinho) {
                            cont++;
                            tabela += '<tr>';
                            tabela += '<td>' + carrinho[i].nome_produto.toUpperCase() + '</td>';
                            tabela += '<td>' + carrinho[i].qtde + '</td>';
                            tabela += '<td>' + carrinho[i].preco + '</td>';
                            tabela += '<td title="Remover do carrinho"><a href="javascript:;" nome_prod=' + carrinho[i].nome_produto + ' posicao=' + i + ' id_prod=' + carrinho[i].id_produto + ' class="btn ml-1 btn-danger btn-xs btn-remover-prod-cart  mr-1"><i class="fa fa-trash"></i></a>' +
                                '<a title="Adicionar quantidade" href="javascript:;" nome_prod=' + carrinho[i].nome_produto + ' posicao=' + i + ' id_prod=' + carrinho[i].id_produto + ' class="btn ml-1 btn-success btn-xs btn-add-qtde mr-1"><i class="fa fa-plus"></i></a>' +
                                '<a title="Diminuir quantidade" href="javascript:;" nome_prod=' + carrinho[i].nome_produto + ' posicao=' + i + ' id_prod=' + carrinho[i].id_produto + ' class="btn ml-1 btn-info btn-xs btn-dim-qtde"><i class="fa fa-minus"></i></a></td>';
                            tabela += '</tr>';
                        }
                        $('.btn-finish-venda').show();
                        $('.tbody-carrinho').html(tabela);
                        total_cart = carrinho.length;
                        $('.qtdade_produto_venda').html(carrinho.length);
                        $('.input-codigo-barra').val('');
                        $('.qtde-retalho').text(estoque + ' UN');
                        $('.qtde_grosso').text(qtde_grosso + ' CX');
                    }
                }, 'json');
            }
        }
    });

    //Finalizar venda
    $('.btn-finish-venda').click(function () {
        var nome=$('.nome_comprador').val();
        var id_reparticao=$('.id_reparticao').val();
        $.post(URL + 'venda/store', {
                'carrinho': carrinho,'nome':nome,'id_reparticao':id_reparticao
            },
            function (x) {
                toastr[x[0].alerta](x[0].sms, x[0].titulo);
                $('.tbody-carrinho').html('');
                $('.btn-finish-venda').hide();
                localStorage.removeItem("carrinho");
                delete carrinho;
                carrinho=new Array;
                $('.nome_comprador').val('')
                $('.input-codigo-barra').focus();
                $('.qtde-retalho').text('');
                $('.qtde_grosso').text('');
            },'json');
    });
});