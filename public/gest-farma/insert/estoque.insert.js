$(this).ready(function () {
    //permite só letras so campo
    $('.so-letra').keypress(function (e) {

        var tecla = (window.event) ? event.keyCode : e.which;
        if ((tecla > 47 && tecla < 58)) return false;
        else {
            if (tecla == 8 || tecla == 0) return true;
            else return true;
        }
    });


    //gerando código da estante
    $('.categoria').change(function () {

        var catg = $('.categoria option:selected').text();
        catg = catg.split("");
        var id = "" + $(this).val();
        id = id.length;
        var categoria = catg[0] + '' + catg[1] + '' + catg[2];
        categoria = categoria.toUpperCase();
        $('.codigo').val(categoria + '-' + seq_codigo(id, $(this).val()));
    });

    //gerando código do produto
    $('.catg_prod').change(function () {

        if ($('.nome_prod').val() != null) {

            var catg = $('.nome_prod').val();
            var catg1 = catg.split("");
            var date = new Date();
            var y = date.getFullYear();//capta o ano actual
            var k = Math.random() * (+y);//gera um valor aleatório multiplicado pelo ano actual
            var cx = Math.trunc(k) % y;//pega o resultado do resto da divisao pela parte inteira do número gerado aleatóriamente.
            //$('.codigo_prod').val(categoria(catg1.length,catg1) + '-' + cx);
        }

        $.get(URL+'estante/get_codigo',
            {param:$(this).val()}
        ,function (x)
            {
                $('.id_estante').val(x[0].id);
                $('.codigo_estante').val(x[0].codigo);
            },'json');
    });

    //Adicionar estante ao banco de dados
    $('.frm_estante').submit(function (e) {

        e.preventDefault();
        $.post($(this).attr('action'), $(this).serialize(), function (x) {
            $('.nome_categoria').val('');
            toastr[x[0].alerta](x[0].sms, x[0].titulo);
        }, 'json');
    });

    var qtde_grosso=$('.qtde_grosso').val();
    // $('')
});
