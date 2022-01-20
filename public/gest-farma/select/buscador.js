$(this).ready(function () {
    $('.res-pequisa').hide();
   $('.txt-busca').keyup(function () {
       if ($(this).val().length>0)
       {
           $.get($('.topo').attr('url')+'buscador/busca',{param:$(this).val()},function (x) {

               var cidadao=x.cidadao;
               var expediente=x.expediente;
               var relatorio=x.relatorio;
               var div='';
               if (cidadao.length>0) {
                   $('.res-pequisa').show();
                   for (var i = 0; i < cidadao.length; i++) {
                       div+='<div class="card border">';
                       div+='<div class="card-header">';
                       div+='<a href="'+$('.topo').attr('url')+'pessoa/detalhe/'+cidadao[i].id+'" class="card-title collapsed">';
                       div+='<i class="fa fa-users width-2 fs-xl"></i>'+cidadao[i].nome+'</a>';
                       div+='</div></div>';
                   }
                   $('.agrega').html(div);
               }
               else if (expediente.length>0)
               {
                   $('.res-pequisa').show();
                   for (var i=0;i<expediente.length;i++)
                   {
                       div+='<div class="card border">';
                       div+='<div class="card-header">';
                       div+='<a href="'+$('.topo').attr('url')+'expediente/detalhe/'+expediente[i].id+'" class="card-title collapsed">';
                       div+='<i class="fa fa-book width-2 fs-xl"></i>'+expediente[i].numero+'-'+expediente[i].referencia+'</a>';
                       div+='</div></div>';
                   }
                   $('.agrega').html(div);
               }

              else if (relatorio.length>0)
               {
                   $('.res-pequisa').show();
                   for (var i=0;i<relatorio.length;i++)
                   {
                       div+='<div class="card border">';
                       div+='<div class="card-header">';
                       div+='<a href="'+$('.topo').attr('url')+'relatorio/detalhe/'+relatorio[i].id+'" class="card-title collapsed">';
                       div+='<i class="fa fa-book width-2 fs-xl"></i>'+relatorio[i].intervalo+'-'+relatorio[i].ano+'</a>';
                       div+='</div></div>';
                   }
                   $('.agrega').html(div);
               }else{
                  div+='';
                   div+='<div class="card border">';
                   div+='<div class="card-header">';
                   div+='<a href="javascript:;" class="card-title collapsed text-danger text-center">';
                   div+='<i class="fa fa-search width-2 fs-xl"></i> Nenhum resultado foi encontrado com este parametro...</a>';
                   div+='</div></div>';
                   $('.agrega').html(div);
               }
           },'json');
       }else
           {
               $('.agrega').html('');
               $('.res-pequisa').hide();
           }
   });

	$('#buscador').typeahead({

		source: function (param, cb) {
			$.ajax({
				url: $('.topo').attr('url')+'buscador/busca',
				data: 'param=' + param,
				dataType: "json",
				type: "get",
				success: function (data) {
					var res;
					res='Não foi encontrado nenhum resultado';
					if (data.length>0)
					{
						res=$.map(data, function (item) {
							return item;
						});
					}
					cb(res);
				}
			});
		},
		afterSelect: function (data) {
		//print the data to developer tool's console
		alert(data);
	}
	});

});
