$(this).ready(function () {

    //Adicionar funcao ao banco de dados
    $('.frm_add_funcao').submit(function (e) {
        e.preventDefault();
        $.post($(this).attr('action'),$(this).serialize(),function (x) {
            $('.nome_menu').val('');
            toastr[x[0].alerta](x[0].sms, x[0].titulo);
        },'json');
    });


    //Adicionar destinatário ao banco de dados
    $('.frm_destinatario').submit(function (e) {
        e.preventDefault();
        $.post($(this).attr('action'),$(this).serialize(),function (x) {
            if (x[0].alerta=='error'){
                toastr[x[0].alerta](x[0].sms, x[0].titulo);
                if (x[0].sms=="Informe o nome"){
                    $('.nome_dest').addClass('is-invalid');
                }
            }else {
                $('.nome_dest').val('');
                $('.nome_dest').removeClass('is-invalid');
                toastr[x[0].alerta](x[0].sms, x[0].titulo);
                setTimeout(function () {
                    window.location = document.documentURI;
                }, 1000);
            }
        },'json');
    });

    $('.nome_dest,.nome').focus(function () {
        $(this).removeClass('is-invalid');
    });

    //Alterar destinatário no banco de dados
    $('.frm_destinatario_edit').submit(function (e) {
        e.preventDefault();
        $.post($(this).attr('action'),$(this).serialize(),function (x) {
            $('.nome_dest').val('');
            toastr[x[0].alerta](x[0].sms, x[0].titulo);
            $('#destinatario_editar').modal('hide');
            setTimeout(function () {
                window.location=document.documentURI;
            },1000);
        },'json');
    });

    //Alterar número da factura no banco de dados
    $('.frm_movimento_estoque_edit').submit(function (e) {
        e.preventDefault();
        $.post($(this).attr('action'),$(this).serialize(),function (x) {
            toastr[x[0].alerta](x[0].sms, x[0].titulo);
            $('#estoque_editar').modal('hide');
            setTimeout(function () {
                window.location=document.documentURI;
            },1000);
        },'json');
    });

    //Adicionar categoria ao banco de dados
    $('.frm_categoria').submit(function (e) {
        e.preventDefault();
        $.post($(this).attr('action'),$(this).serialize(),function (x) {
            if (x[0].alerta=='error'){
                toastr[x[0].alerta](x[0].sms, x[0].titulo);
                if (x[0].sms=="Informe o nome"){
                    $('.nome').addClass('is-invalid');
                }
            }else {
                $('.nome').val('');
                $('.nome').removeClass('is-invalid');
                toastr[x[0].alerta](x[0].sms, x[0].titulo);
                setTimeout(function () {
                    window.location = document.documentURI;
                }, 1000);
            }
        },'json');
    });

    //Actualizar categoria ao banco de dados
    $('.frm_categoria_update').submit(function (e) {
        e.preventDefault();
        $.post($(this).attr('action'),$(this).serialize(),function (x) {
            if (x[0].alerta=='error'){
                toastr[x[0].alerta](x[0].sms, x[0].titulo);
                if (x[0].sms=="Informe o nome"){
                    $('.nome').addClass('is-invalid');
                }
            }else {
                $('.nome').val('');
                $('.nome').removeClass('is-invalid');
                toastr[x[0].alerta](x[0].sms, x[0].titulo);
                setTimeout(function () {
                    window.location = document.documentURI;
                }, 1000);
            }
        },'json');
    });
});