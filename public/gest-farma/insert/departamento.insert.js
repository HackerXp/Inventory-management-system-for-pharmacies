$(this).ready(function () {

    //Adicionar departamento ao banco de dados
    $('.frm_add_departamento').submit(function (e) {
        e.preventDefault();
        $.post($(this).attr('action'),$(this).serialize(),function (x) {
            $('.nome_menu').val('');
            toastr[x[0].alerta](x[0].sms, x[0].titulo);
        },'json');
    });

    //Adicionar funcoes ao departamento no banco de dados
    $('.frm_add_funcao_depa').submit(function (e) {
        e.preventDefault();
        var id_departamento=$('.id_departamento').val();
        var id_funcao=$('.id_funcao').val();

        $.post($(this).attr('action'),{id_funcao:id_funcao,id_depa:id_departamento},function (x) {
            $('.nome_menu').val('');
            toastr[x[0].alerta](x[0].sms, x[0].titulo);
        },'json');
    });
});