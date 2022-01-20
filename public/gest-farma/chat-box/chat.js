$(this).ready(function () {
// var s="wwww.google.com";
// alert(s.indexOf("."));
    receptor = 0;
    id = $('.id_user').attr('id_user');
    $('.sms-content').hide();
    var nome=[];
    var socket = io.connect('http://' + window.location.hostname + ':3000');
    $('#btn-carrega-chat-box').click(function () {
        $.get(URL + 'chat/getUsers', {id: id}, function (x) {
            var li = '';
            var status='';
            var texto='';
            var texto_status='';
            for (i in x) {
                if (x[i].estado=='1')
                {
                    status='status-success';
                    texto='Online';
                    texto_status='text-success';
                }else
                    {
                        status='status-danger';
                        texto='Offline';
                        texto_status='text-danger';
                    }
                nome.push(x[i].nome);
                li += '<li>';
                li += '<a href="javascript:;" class="d-table w-100 px-2 py-2 text-dark hover-white btn-chamar-user" nome="' + x[i].nome + '" id="' + x[i].id + '" role="' + x[i].role + '" foto="' + x[i].foto + '" data-filter-tags="' +nome+ '">';
                li += '<div class="d-table-cell align-middle status '+status+' status-sm ">';
                li += '<span class="profile-image-md rounded-circle d-block" style="background-image:url(' + URL + 'foto_utilizador/' + x[i].foto + '); background-size: cover;"></span>';
                li += '</div>';
                li += '<div class="d-table-cell w-100 align-middle pl-2 pr-2">';
                li += '<div class="text-truncate text-truncate-md">' + x[i].nome + '';
                li += '<small class="d-block font-italic '+texto_status+' fs-xs">'+texto+'</small></div></div></a></li>';
            }
            $('.list-users').html(li);
        }, 'json')
    });

    $('.list-users').on('click', '.btn-chamar-user', function (x) {
        $('.user-select').text($(this).attr('nome'));
        $('.role').text($(this).attr('role'));
        $('.btn-send-sms').attr('disabled',false);
        $('.sms-content').show();
        receptor = $(this).attr('id');
        $.get(URL+'chat/getSMS',{id:receptor},function (x) {

            var chat='';
            for (i in x)
               {
                   var tempo=x[i].tempo;
                   tempo=tempo.split(' ');
                   if(x[i].emissor==id)
                   {
                       chat+='<div class="chat-segment chat-segment-sent">';
                       chat+='<div class="chat-message">';
                       if (verifica_link(x[i].sms))
                           chat+='<p><a class="text-info" target="_blank" style="text-decoration: none" href="'+x[i].sms+'"><i class="fa fa-globe"></i> '+x[i].sms+'</a></p>';
                       else
                           chat+='<p>'+x[i].sms+'</p>';
                       chat+='</div>';
                       chat+='<div class="text-right fw-300 text-muted mt-1 fs-xs"><i class="fa fa-clock fs-xs"></i> '+tempo[0].split('-').reverse().join('-')+' às '+tempo[1]+'</div>';
                       chat+='</div>';
                   }else{
                       chat+='<div class="chat-segment chat-segment-get">';
                       chat+='<div class="chat-message">';
                       if (verifica_link(x[i].sms))
                           chat+='<p><a class="text-info" target="_blank" style="text-decoration: none" href="'+x[i].sms+'"><i class="fa fa-globe"></i> '+x[i].sms+'</a></p>';
                       else
                           chat+='<p>'+x[i].sms+'</p>';
                       chat+='</div><div class="fw-300 text-muted mt-1 fs-xs"><i class="fa fa-clock fs-xs"></i> '+tempo[0].split('-').reverse().join('-')+' às '+tempo[1]+'</div></div>';
                   }
               }
            $('.chat_container1').html(chat);
        },'json');

        $('.foto-user-select').attr('src', URL + 'foto_utilizador/' + $(this).attr('foto'));

        $.post(URL+'chat/update_estado',{id:id},function (x) {
            if (x!=0)
            {
                $.get(URL+'chat/getCount',{id:id},function (x) {
                    $('.ctrl-sms-recebida').text(x);
                });
            }
        });
    });

    $('.sms-content').keyup(function (e) {
        var sms = new String($('.sms-content').val().trim());
        if (e.keyCode == 13) {
            if ((sms.length > 0) && (receptor != 0)) {
                $.post(URL + 'chat/store', {receptor: receptor, sms: sms.trim()}, function (x) {
                    $('.sms-content').val('');
                    socket.emit('chat', {
                        emissor: x
                    });
                });
            }
        }
    });

    $('.btn-send-sms').click(function () {
        var sms = new String($('.sms-content').val().trim());
        if ((sms.length > 0) && (receptor != 0)) {
            $.post(URL + 'chat/store', {receptor: receptor, sms: sms.trim()}, function (x) {
                $('.sms-content').val('');
                socket.emit('chat', {
                    emissor: x
                });
            });
        }
    });
    socket.on('chat', function (x) {
        if (x!=0)
        {
            $.get(URL+'chat/getSMS',{id:receptor},function (x) {
                var chat='';
                for (i in x)
                {
                    var tempo=x[i].tempo;
                    tempo=tempo.split(' ');
                    if(x[i].emissor==id)
                    {
                        chat+='<div class="chat-segment chat-segment-sent">';
                        chat+='<div class="chat-message">';
                        if (verifica_link(x[i].sms))
                            chat+='<p><a class="text-info" target="_blank" style="text-decoration: none" href="'+x[i].sms+'"><i class="fa fa-globe"></i> '+x[i].sms+'</a></p>';
                        else
                            chat+='<p>'+x[i].sms+'</p>';
                        chat+='</div>';
                        chat+='<div class="text-right fw-300 text-muted mt-1 fs-xs">'+tempo[0].split('-').reverse().join('-')+' às '+tempo[1]+'</div>';
                        chat+='</div>';
                    }else{
                        chat+='<div class="chat-segment chat-segment-get">';
                        chat+='<div class="chat-message">';
                        if (verifica_link(x[i].sms))
                            chat+='<p><a class="text-info" target="_blank" style="text-decoration: none" href="'+x[i].sms+'"><i class="fa fa-globe"></i> '+x[i].sms+'</a></p>';
                        else
                            chat+='<p>'+x[i].sms+'</p>';
                        chat+='</div><div class="fw-300 text-muted mt-1 fs-xs">'+tempo[0].split('-').reverse().join('-')+' às '+tempo[1]+'</div></div>';
                    }
                }
                $('.chat_container1').html(chat);
            },'json');
        }
    });


    //buscar numero de sms nao visualida
    $.get(URL+'chat/getCount',{id:id},function (x) {
        $('.ctrl-sms-recebida').text(x);
    });

    //Inserir imagem no chat
    $('.btn-insert-image').click(function () {
        alert(2);
    });
});

function verifica_link(para) {
    if (para.charAt(0)==para.charAt(1) && para.charAt(1)==para.charAt(2) && para.charAt(2)=='w' && para.charAt(3)=='.')
        return true;
    if (para.charAt(0)=='h' && para.charAt(1)==para.charAt(2) && para.charAt(2)=='t' && para.charAt(3)=='p')
        return true;
    else
        return false;
}