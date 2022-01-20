$(this).ready(function () {
    //Adicionar grupo ao banco de dados
    $('.frm_especialidade').submit(function (e) {

        e.preventDefault();
        $.post($(this).attr('action'), $(this).serialize(), function (x) {
            toastr[x[0].alerta](x[0].sms, x[0].titulo);
            $('.nome_especialidade').val('');
        }, 'json');
    });
});