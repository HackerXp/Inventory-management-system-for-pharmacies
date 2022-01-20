$(this).ready(function () {

	toastr.options = {
		"closeButton": true,
		"debug": false,
		"newestOnTop": true,
		"progressBar": true,
		"positionClass": "toast-top-right",
		"preventDuplicates": true,
		"showDuration": 600,
		"hideDuration": 200,
		"timeOut": 5000,
		"extendedTimeOut": 1000,
		"showEasing": "swing",
		"hideEasing": "linear",
		"showMethod": "fadeIn",
		"hideMethod": "fadeOut"
	}

    //Adicionar menu no banco de dados
    $('.frm_funcionalidade').submit(function (e) {
        e.preventDefault();
        $.post($(this).attr('action'),$(this).serialize(),function (x) {
            $('.nome_menu').val('');
			toastr[x[0].alerta](x[0].sms, x[0].titulo);
            setTimeout(function () {
                var url = window.location.href.toString();
                window.location=url;
            },100);
        },'json');
    });

    //Adicionar sub-menu no banco de dados
    $('.sub_menu_store').click(function (e) {
        var dados=$('.frm_sub_menu').serialize();
        var url=$('.frm_sub_menu').attr('action');
        $.post(url,dados,function (x) {
            $('.nome_menu').val('');
            $('.icon').val('');
			toastr[x[0].alerta](x[0].sms, x[0].titulo);
            setTimeout(function () {
                var url = window.location.href.toString();
                window.location=url;
            },100);
        },'json');
    });

    //habilitando os checks de sub-menu
    $('.check-sub-menus').change(function () {

        var id=$(this).attr('id');
        var cod=$(this).attr('cod');
        var accao=$(this).attr('nome');
        var value_modal=$('.radio_'+cod+' input[type=radio]:checked').val();
        if(document.getElementById(id).checked==true)
        {
            var control=$('.aux-slave').attr('testeVal');
            codigos.push(cod);
            modals.push(value_modal);
            $('.control'+cod).attr('disabled',false);
            $('.control'+cod).val(control.toLowerCase());
            $('.accao'+cod).val(accao.toLowerCase());
            $('.accao'+cod).attr('disabled',false);
            $('.hiden_'+cod).html('<input type="hidden" name="id" class="cod'+cod+'" value='+cod+'>');
        }else {
            $('.control'+cod).val('').attr('disabled',true);
            $('.accao'+cod).val('').attr('disabled',true);
            $('.hiden_'+cod).html('');
            codigos.pop(cod);
        }
    });

    //adicionar sub-menu ao menu
    $('.frm-add-sub-menu').submit(function (e) {
        e.preventDefault();
        var ver=0;
        if('input[type=checkbox]:checked')
        {
            for (i in codigos) {
                for (var j = 0; j < sub_menu.length; j++) {
                    if (sub_menu[j].id_sub_menu==codigos[i])
                    {
                        ver=1;
                    }
                }
                if(ver!=1)
                {
                    sub_menu.push({
                        'controller': $('.control' + codigos[i]).val(),
                        'action': $('.accao' + codigos[i]).val(),
                        'id_menu': $('#id_menu').val(),
                        'id_sub_menu': codigos[i],
                        'modal':modals[i]
                    });
                }
                ver=0;
            }
            $.post($(this).attr('action'),{param:sub_menu},function (x) {
				toastr[x[0].alerta](x[0].sms, x[0].titulo);
                setTimeout(function () {
                    var url = window.location.href.toString();
                    window.location=url;
                },100);
            },'json');
        }
    });


    //Adicionar privilégios
    codigos=new Array;//array com os id's dos sub-menus
    sub_menu=new Array;//array com os id's dos sub-menus
    privilegio=new Array;//array de privilegios
    modals=new Array;
    aux=new Array;


    $('.sub-menus').change(function () {
        var id=$(this).attr('id');
        var id_msm=$(this).attr('id_msm');
        var id_role=$('.ul-sub').attr('id_role');
        if(document.getElementById(id).checked==true)
        {
            privilegio.push({
                'id_role':id_role,
                'id_msm':id_msm
            });

        }else {
            for(i in privilegio)
            {
                if (id_msm!=privilegio[i].id_msm)
                    aux.push(privilegio[i]);
            }
            for(i in aux)
            {
                privilegio.push(aux[i]);
            }
            privilegio=aux;
        }

    });
    $('.btn-add-prv').click(function () {
        $.post($('.ul-sub').attr('action'),{privilegio:privilegio},function (x) {
			toastr[x[0].alerta](x[0].sms, x[0].titulo);
            setTimeout(function () {
                var url = window.location.href.toString();
                window.location=url;
            },100);
        },'json');
    });//fim da execucao de adicionar privilégios

    //remover privilégios
    codigos_del=new Array;//array com os id's dos sub-menus
    sub_menu_del=new Array;//array com os id's dos sub-menus
    privilegio_del=new Array;//array de privilegios
    modals_del=new Array;
    aux_del=new Array;

    $('.sub-menus1').change(function () {
        var id=$(this).attr('id');
        var id_msm=$(this).attr('id_msm');
        var id_role=$('.ul-sub1').attr('id_role');
        if(document.getElementById(id).checked==true)
        {
            privilegio_del.push({
                'id_role':id_role,
                'id_msm':id_msm
            });

        }else {
            for(i in privilegio_del)
            {
                if (id_msm!=privilegio_del[i].id_msm)
                    aux_del.push(privilegio_del[i]);
            }
            for(i in aux_del)
            {

                privilegio_del.push(aux_del[i]);
            }
            privilegio_del=aux_del;
        }


    });

    $('.btn-delet-prv').click(function () {
        $.post($('.ul-sub1').attr('action'),{privilegio:privilegio_del},function (x) {
			toastr[x[0].alerta](x[0].sms, x[0].titulo);
            setTimeout(function () {
                var url = window.location.href.toString();
                window.location=url;
            },100);
        },'json');
    }); //fim da execucao de remover privilégios


    //Habilitar todos os checks
    $('.checkable').change(function () {
        if(document.getElementById('checkbox1000').checked==true)
        {
            $('input[type=checkbox]').attr('checked',true);
        }else{
            $('input[type=checkbox]').attr('checked',false);
        }
    });

});
