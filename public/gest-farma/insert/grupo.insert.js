$(this).ready(function () {
    //Adicionar grupo ao banco de dados
    $('.frm_add_grupo').submit(function (e) {

        e.preventDefault();
        $.post($(this).attr('action'), $(this).serialize(), function (x) {
			toastr[x[0].alerta](x[0].sms, x[0].titulo);
        }, 'json');
    });

    $('.nome').keypress(function () {
        var capta=$(this).val().split("");
        var sigla=null;
        if ($(this).val()!=null) {
            for (var i = 0; i < capta.length; i++) {
                if (capta[capta.length / 2] != undefined && capta[i] != undefined) {
                    sigla = capta[0] + capta[1] + capta[capta.length / 2] + capta[i];
                }
            }
        }
        $('.sigla').val(sigla.toUpperCase());
    });

    $('.grupo_store').click(function () {
        var role=$('.nome_grupo').val();
        var sigla=role.substr(0,3).toUpperCase();
        $.post($('.frm_grupo').attr('action'),{role:role.toUpperCase(),sigla:sigla},function (x) {
            toastr[x[0].alerta](x[0].sms, x[0].titulo);
            $('.nome_grupo').val('');
        },'json');
    });


    //add utilizador
	$('.btn-add_utilizador').click(function () {
		var dados=$('.frm_add_utilizador').serialize();
		$.post($('.topo').attr('url')+'utilizador/store',dados,function (x) {
			toastr[x[0].alerta](x[0].sms, x[0].titulo);
			$('cls').val('');
			$('#utilizador_novo').modal('hide');
		},'json');
	});

	//update utilizador
	$('.btn-upate_utilizador').click(function () {
		var dados=$('.frm_upate_utilizador').serialize();
		$.post($('.topo').attr('url')+'utilizador/update',dados,function (x) {
			toastr[x[0].alerta](x[0].sms, x[0].titulo);
			$('cls').val('');
			setTimeout(function () {
				window.location =$('.topo').attr('url')+'utilizador/listar/';
			},710);
		},'json');
	});
});
