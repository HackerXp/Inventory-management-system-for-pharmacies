$(this).ready(function () {
    var cod_pessoa=$('.cod-pessoa').attr('cod');

    //Alterar dados da viatura
    $('.btn-link-alterar-carro').click(function () {
       $.get($('.topo').attr('url')+'pessoa/countViatura',{param:cod_pessoa},function (x) {
           if (x>1)
           {
               $.get($('.topo').attr('url')+'pessoa/getViatura',{param: cod_pessoa},function (x) {
                   $('#modal-select-carro').modal('show');
                   var li='';
                   for (i in x)
                   {
                       li+='<a href="javascript:;" class="mb-1 btn-carro-selecionado" cod_carro="'+x[i].id+'">';
                       li+='<li class="list-group-item">';
                       li+='<span data-filter-tags="reports file" class="fw-500">'+x[i].marca+'</span>';
                       li+='</li>';
                       li+='</a>';
                   }
                   $('.list-add-carro').html(li);
               },'json');
           }else{
                $.get($('.topo').attr('url')+'pessoa/getViatura',{param: cod_pessoa},function (x) {
                    $('.marca-edit').val(x[0].marca);
                    $('.btn-edit_carro').val(x[0].id);
                    $('.modelo-edit').val(x[0].modelo);
                    $('.cor-edit').val(x[0].cor);
                    $('.matricula-edit').val(x[0].matricula);
                    $('#modal-edit-carro').modal('show');
                },'json');
           }
       });
    });

    $('.list-add-carro').on('click','.btn-carro-selecionado',function () {
        $('#modal-select-carro').modal('hide');
        $.get($('.topo').attr('url')+'pessoa/getDadosViatura',{param:$(this).attr('cod_carro')},function (x) {
            $('.btn-edit_carro').val(x[0].id);
            $('.marca-edit').val(x[0].marca);
            $('.modelo-edit').val(x[0].modelo);
            $('.cor-edit').val(x[0].cor);
            $('.matricula-edit').val(x[0].matricula);
            $('#modal-edit-carro').modal('show');
        },'json');
    });

    $('.btn-edit_carro').click(function () {
        var marca=$('.marca-edit').val();
        var modelo=$('.modelo-edit').val();
        var cor=$('.cor-edit').val();
        var matricula=$('.matricula-edit').val();
        $.post($('.topo').attr('url')+'pessoa/alterar_viatura',{
            marca:marca,modelo:modelo,cor:cor,matricula:matricula,id:$(this).val()
        },function (x) {
            $('#modal-edit-carro').modal('hide');
            toastr[x[0].alerta](x[0].sms, x[0].titulo);
        },'json');
    });

    //Alterar dados de emprego
    $('.btn-link-alterar-emprego').click(function () {
        $.get($('.topo').attr('url')+'pessoa/countEmprego',{param:cod_pessoa},function (x) {
            if (x>1)
            {
                $.get($('.topo').attr('url')+'pessoa/getEmprego',{param: cod_pessoa},function (x) {
                    $('#modal-select-emprego').modal('show');
                    var li='';
                    for (i in x)
                    {
                        li+='<a href="javascript:;" class="mb-1 btn-emprego-selecionado" cod_emprego="'+x[i].id+'">';
                        li+='<li class="list-group-item">';
                        li+='<span data-filter-tags="reports file" class="fw-500">'+x[i].instituicao+'</span>';
                        li+='</li>';
                        li+='</a>';
                    }
                    $('.list-add-emprego').html(li);
                },'json');
            }else{
                $.get($('.topo').attr('url')+'pessoa/getEmprego',{param: cod_pessoa},function (x) {
                    $('.btn-editar_emprego').val(x[0].id);
                    $('.instituicao-edit').val(x[0].instituicao);
                    $('.cargo-edit').val(x[0].cargo);
                    $('.data-edit').val(x[0].data);
                    $('#modal-edit-emprego').modal('show');
                },'json');
            }
        });
    });

    $('.list-add-emprego').on('click','.btn-emprego-selecionado',function () {
        $('#modal-select-emprego').modal('hide');
        $.get($('.topo').attr('url')+'pessoa/getDadosEmprego',{param:$(this).attr('cod_emprego')},function (x) {
            $('.btn-editar_emprego').val(x[0].id);
            $('.instituicao-edit').val(x[0].instituicao);
            $('.cargo-edit').val(x[0].cargo);
            $('.data-edit').val(x[0].data);
            $('#modal-edit-emprego').modal('show');
        },'json');
    });

    $('.btn-editar_emprego').click(function () {
        var instituicao=$('.instituicao-edit').val();
        var cargo=$('.cargo-edit').val();
        var data=$('.data-edit').val();
        $.post($('.topo').attr('url')+'pessoa/alterar_emprego',{
            instituicao:instituicao,cargo:cargo,data:data,id:$(this).val()
        },function (x) {
            $('#modal-edit-emprego').modal('hide');
            toastr[x[0].alerta](x[0].sms, x[0].titulo);
        },'json');
    });


    //Alterar dados da Escola
    $('.btn-link-alterar-escola').click(function () {
        $.get($('.topo').attr('url')+'pessoa/countEscola',{param:cod_pessoa},function (x) {
            if (x>1)
            {
                $.get($('.topo').attr('url')+'pessoa/getEscola',{param: cod_pessoa},function (x) {
                    $('#modal-select-escola').modal('show');
                    var li='';
                    for (i in x)
                    {
                        li+='<a href="javascript:;" class="mb-1 btn-escola-selecionado" cod_escola="'+x[i].id+'">';
                        li+='<li class="list-group-item">';
                        li+='<span data-filter-tags="reports file" class="fw-500">'+x[i].instituicao+'</span>';
                        li+='</li>';
                        li+='</a>';
                    }
                    $('.list-add-escola').html(li);
                },'json');
            }else{
                $.get($('.topo').attr('url')+'pessoa/getEscola',{param: cod_pessoa},function (x) {
                    $('.btn-editar_escola').val(x[0].id);
                    $('.escola-edit').val(x[0].instituicao);
                    $('.classe-edit').val(x[0].classe);
                    $('.data-edit').val(x[0].data);
                    $('#modal-editar-escola').modal('show');
                },'json');
            }
        });
    });

    $('.list-add-escola').on('click','.btn-escola-selecionado',function () {
        $('#modal-select-escola').modal('hide');
        $.get($('.topo').attr('url')+'pessoa/getDadosEscola',{param:$(this).attr('cod_escola')},function (x) {
            $('.btn-editar_escola').val(x[0].id);
            $('.escola-edit').val(x[0].instituicao);
            $('.classe-edit').val(x[0].classe);
            $('.data-edit').val(x[0].data);
            $('#modal-editar-escola').modal('show');
        },'json');
    });

    $('.btn-editar_escola').click(function () {

        var instituicao=$('.escola-edit').val();
        var classe=$('.classe-edit').val();
        var data=$('.data-edit').val();
        $.post($('.topo').attr('url')+'pessoa/alterar_escola',{
            instituicao:instituicao,classe:classe,data:data,id:$(this).val()
        },function (x) {
            $('#modal-editar-escola').modal('hide');
            toastr[x[0].alerta](x[0].sms, x[0].titulo);
        },'json');
    });

    //Alterar Contacto
    $('.btn-link-alterar-contacto').click(function () {
        $.get($('.topo').attr('url')+'pessoa/getContacto',{param:cod_pessoa},function (x) {
            $('.telefone1-edit').val(x[0].telefone1);
            $('.telefone2-edit').val(x[0].telefone2);
            $('.email-edit').val(x[0].email);
            $('#modal-edit-contacto').modal('show');
        },'json');
    });

    $('.btn-editar_contacto').click(function () {
        var telefone1=$('.telefone1-edit').val();
        var telefone2=$('.telefone2-edit').val();
        var email=$('.email-edit').val();
        $.post($('.topo').attr('url')+'pessoa/alterar_contacto',{
            telefone1:telefone1,telefone2:telefone2,email:email,id:cod_pessoa
        },function (x) {
            $('#modal-edit-contacto').modal('hide');
            toastr[x[0].alerta](x[0].sms, x[0].titulo);
        },'json');
    });

    //Alterar a morada
    $('.btn-link-alterar-morada').click(function () {
        $.get($('.topo').attr('url')+'pessoa/getMorada',{param:cod_pessoa},function (x) {
            $('.provincia-edit').val(x[0].id_provincia);
            $('.id_municipio1').val(x[0].id_municipio);
            $('.bairro-edit').val(x[0].bairro);
            $('.referencia-edit').val(x[0].referencia);
            $('#modal-edit-morada').modal('show');
        },'json');
    });

    $('.btn-editar_morada').click(function () {
        var id_provincia=$('.provincia-edit').val();
        var id_municipio=$('.id_municipio1').val();
        var bairro=$('.bairro-edit').val();
        var referencia=$('.referencia-edit').val();
        $.post($('.topo').attr('url')+'pessoa/alterar_morada',{
            id_provincia:id_provincia,id_municipio:id_municipio,bairro:bairro,referencia:referencia,id:cod_pessoa
        },function (x) {
            $('#modal-edit-morada').modal('hide');
            toastr[x[0].alerta](x[0].sms, x[0].titulo);
        },'json');
    });

    //Alterar Dados Pessoais
    $('.btn-link-alterar-dados-pessoais').click(function () {
        $.get($('.topo').attr('url')+'pessoa/getDadosPessoais',{param:cod_pessoa},function (x) {
            $('.nome-edit').val(x[0].nome);
            $('.apelido-edit').val(x[0].apelido);
            $('.data-pessoa-edit').val(x[0].data_nasc);
            $('.genero-edit').val(x[0].genero);
            $('.nacionalidade-edit').val(x[0].nacionalidade);
            $('.numero-doc-edit').val(x[0].numero_doc);
        },'json');
    });

    $('.btn-editar_dados-pessoais').click(function () {
        var nome=$('.nome-edit').val();
        var apelido=$('.apelido-edit').val();
        var data=$('.data-pessoa-edit').val();
        var genero=$('.genero-edit').val();
        var pais=$('.nacionalidade-edit').val();
        var num_doc=$('.numero-doc-edit').val();
        $.post($('.topo').attr('url')+'pessoa/update',{
            nome:nome,apelido:apelido,data:data,genero:genero,pais:pais,num_doc:num_doc,id:cod_pessoa
        },function (x) {
            $('#modal-edit-dados-pessoais').modal('hide');
            toastr[x[0].alerta](x[0].sms, x[0].titulo);
        },'json');
    });
});