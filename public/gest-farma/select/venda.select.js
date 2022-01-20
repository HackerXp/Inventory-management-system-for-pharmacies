$(this).ready(function () {

    //fethc produto por categoria
    $('.catg_prod_venda').change(function ()
    {
       $.get(URL+'produto/get_by_id_categoria',{param:$(this).val()},function (x) {
           var html='<option value=""></option>';
           for (i in x)
           {
               html+='<option estoque='+x[i].estoque+' preco='+x[i].preco+' qtde_grosso='+x[i].qtde_grosso+' estante='+x[i].estante+' codigo='+x[i].codigo+' value='+x[i].id+'>'+x[i].nome+'</option>';
           }
           $('.produto_venda').html(html);
       },'json')
    });

    $('.produto_venda').change(function () {
        $('.qtde-retalho').text($('.produto_venda option:selected').attr('estoque')+' UN');
        $('.qtde_grosso').text($('.produto_venda option:selected').attr('qtde_grosso')+' CX');
    });
});