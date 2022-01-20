$(this).ready(function() {

    //Adicionar producto ao banco de dados
    //    $('.btn-save-prod').click(function() {
    //        var nome_prod = $('.nome_prod').val();
    //        var codigo_prod = $('.codigo_prods').val();
    //        var id_categoria_prod = $('.catg_prod').val();
    //        var data_fab_prod = $('.data_fab_prod').val();
    //        var data_exp_prod = $('.data_exp_prod').val();
    //        var id_estante_prod = $('.id_estante').val();
    //        var qtde_grosso = $('.qtde_grosso').val();
    //        var preco = $('.preco').val();
    //
    //        $.post($('.frm_add_produto').attr('action'), {
    //            nome_prod: nome_prod,
    //            codigo_prod: codigo_prod,
    //            id_categoria_prod: id_categoria_prod,
    //            data_fab_prod: data_fab_prod,
    //            data_exp_prod: data_exp_prod,
    //            id_estante_prod: id_estante_prod,
    //            qtde_grosso: qtde_grosso,
    //            preco: preco
    //        }, function(x) {
    //            $('.cls').val("");
    //            $('.sms-retorno-product').text(x[0].sms);
    //            $('.btn-add-estoque').val(x[0].src);
    //            $('#retorno-producto').modal("show");
    //        }, 'json');
    //    });

    $('.frm_add_produto').submit(function(e) {
        e.preventDefault();
        var nome_prod = $('.nome_prod').val();
        var codigo_prod = $('.codigo_prods').val();
        var id_categoria_prod = $('.catg_prod').val();
        var data_fab_prod = $('.data_fab_prod').val();
        var data_exp_prod = $('.data_exp_prod').val();
        var id_estante_prod = $('.id_estante').val();
        var qtde_grosso = $('.qtde_grosso').val();
        var preco = $('.preco').val();

        $.post($('.frm_add_produto').attr('action'), {
            nome_prod: nome_prod,
            codigo_prod: codigo_prod,
            id_categoria_prod: id_categoria_prod,
            data_fab_prod: data_fab_prod,
            data_exp_prod: data_exp_prod,
            id_estante_prod: id_estante_prod,
            qtde_grosso: qtde_grosso,
            preco: preco
        }, function(x) {
            alert(x);
            //$('.cls').val("");
            //$('.sms-retorno-product').text(x[0].sms);
            //$('.btn-add-estoque').val(x[0].src);
            //$('#retorno-producto').modal("show");
        });
    });

    //Chamar visáo de actualização do estque do producto
    $('.btn-add-estoque').click(function() {
        window.location = URL + 'produto/estoque/' + $(this).val();
    });

    //Editar producto no banco de dados
    $('.btn-update-produto').click(function() {
        var nome_prod = $('.nome_prod').val();
        var codigo_prod = $('.codigo_prod').val();
        var id_categoria_prod = $('.catg_prod').val();
        var data_fab_prod = $('.data_fab_prod').val();
        var data_exp_prod = $('.data_exp_prod').val();
        var id_produto = $('.id_produto').val();
        var qtde_grosso = $('.qtde_grosso').val();
        var preco = $('.preco').val();

        $.post($('.frm_edit_produto').attr('action'), {
            nome_prod: nome_prod,
            codigo_prod: codigo_prod,
            id_categoria_prod: id_categoria_prod,
            data_fab_prod: data_fab_prod,
            data_exp_prod: data_exp_prod,
            qtde_grosso: qtde_grosso,
            preco: preco,
            id_produto: id_produto
        }, function(x) {
            toastr[x[0].alerta](x[0].sms, x[0].titulo);
            setTimeout(function() {
                window.location = URL + 'produto/listar';
            }, 1000);
        }, 'json');
    });


    // $('.frm_edit_produto').submit(function (e) {
    //     e.preventDefault();
    //     $.post($(this).attr('action'), $(this).serialize(), function (x) {
    //         toastr[x[0].alerta](x[0].sms, x[0].titulo);
    //         setTimeout(function () {
    //             window.location=URL+'produto/listar';
    //         },1000);
    //     }, 'json');
    // }); 2018-06-05  2020-12-24

    //Cálculo do estoque em retalho
    $('.qtde_grosso_es').keyup(function() {
        $.get(URL + 'produto/getValorGrosso', { param: $('.id_producto').val() }, function(x) {
            var qtde = (+(x));
            $('.qtde_retalho_es').val((qtde * $('.qtde_grosso_es').val()));
        });
    });

    //Adicionar producto ao banco de dados
    $('.frm_add_estoque_produto').submit(function(e) {
        e.preventDefault();
        $.post($(this).attr('action'), $(this).serialize(), function(x) {
            // alert(x);
            toastr[x[0].alerta](x[0].sms, x[0].titulo);
            setTimeout(function() {
                window.location = URL + 'app/dashboard';
            }, 1000);
        }, 'json');
    });
});