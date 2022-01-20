$(this).ready(function () {
    URL=$('.topo').attr('url');
    ctrl_senha=0;
    ctrl_user=0;
    id = $('.id_user').attr('id_user');

    $('.btn-alterar-credencias').click(function () {
        $.get(URL+'utilizador/getDados',{id:id},function (x) {
            $('#user-name').val(x[0].user);
        },'json');
    });



    $('.chk-alterar-nome').change(function () {

        if (document.getElementById("checkmeout1").checked == true)
        {
            $('#user-name').attr('disabled',false).focus();
            ctrl_user=1;
        }
        else{
            $('#user-name').attr('disabled',true);
            ctrl_user=0;
        }
    });

    $('.chk-alterar-senha').change(function () {

        if (document.getElementById("checkmeout2").checked == true)
        {
            $('#senha_nova').attr('disabled',false).focus();
            ctrl_senha=1;
        }else {
            $('#senha_nova').attr('disabled',true);
            ctrl_senha=0;
        }

    });

    $('.btn-guardar-credenciais').click(function () {
        var user,senha_nova,senha_atual;
        if (ctrl_user==1 && ctrl_senha==0)
        {
            user=$('#user-name').val();
            senha_atual=$('#senha_actual').val();
            $.post(URL+'utilizador/update_conta',{id:id,user:user,senha_atual:senha_atual,ctrl_senha:ctrl_senha,ctrl_user:ctrl_user},function (x) {
                toastr[x[0].alerta](x[0].sms, x[0].titulo);
                if (x[0].src==1)
                    $('#modal-credencias').modal('hide');
            },'json');
        }else if (ctrl_senha==1 && ctrl_user==0)
        {
            senha_nova=$('#senha_nova').val();
            senha_atual=$('#senha_actual').val();
            $.post(URL+'utilizador/update_conta',{id:id,senha_nova:senha_nova,senha_atual:senha_atual,ctrl_senha:ctrl_senha,ctrl_user:ctrl_user},function (x) {
                toastr[x[0].alerta](x[0].sms, x[0].titulo);
                if (x[0].src==1)
                    $('#modal-credencias').modal('hide');
            },'json');
        }else if (ctrl_user==1 && ctrl_senha==1)
        {
            user=$('#user-name').val();
            senha_nova=$('#senha_nova').val();
            senha_atual=$('#senha_actual').val();
            $.post(URL+'utilizador/update_conta',{id:id,user:user,senha_nova:senha_nova,senha_atual:senha_atual,ctrl_senha:ctrl_senha,ctrl_user:ctrl_user},function (x) {
                toastr[x[0].alerta](x[0].sms, x[0].titulo);
                if (x[0].src==1)
                    $('#modal-credencias').modal('hide');
            },'json');
        }
    });
});