$(this).ready(function () {
	$('#data-busca,#data-busca1').daterangepicker(
		{
			opens: 'center',
			locale: {
				format: 'YYYY/MM/DD'
			}
		}, function(start, end, label)
		{
			// console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
		});

	var pag=$('.page-content').attr('pag');

	if (pag!=undefined && pag=='diaria') {
		$.get($('.topo').attr('url') + 'venda/venda_diaria', function (x) {
			var desc = [];
			var valores = [];
			for (i in x) {
				desc.push(x[i].producto);
				valores.push(x[i].count);
			}
			venda_diaria(desc, valores);
			pieChart(valores, desc);
		}, 'json');
	}

	$('.btn-buscar-por-data').click(function () {
		var data=$('.data-busca').val();
		data=data.split('-');
		var data1=data[0].replace("/",'-');
		var data2=data[1].replace("/",'-');
		data1=data1.replace("/",'-');
		data2=data2.replace("/",'-');
		$.get($('.topo').attr('url')+'venda/venda_por_data',{data1:data1,data2:data2},function (x) {
			if (x[0].erro) {
				$('.agrega-res').html(x[0].erro);
				$('#venda_por_data,.div-agrega').html('');
			}else
			{
				$('.agrega-res').html("<span class='fw-700 text-justify'>Mostrando saídas efectuadas no período de <label class='text-primary' style='text-decoration: underline'>"+data[0]+"</label> à <label class='text-primary' style='text-decoration: underline'>"+data[1]+"</label></span>.");
				$('.btn-link-por-data').attr('data1',data1);
				$('.btn-link-por-data').attr('data2',data2);
				$.get($('.topo').attr('url')+'venda/venda_por_data',{data1:data1,data2:data2},function (x) {
					var desc=[];
					var valores=[];
					for (i in x)
					{
						desc.push(sigla(x[i].producto.toLowerCase()));
						valores.push(x[i].count);
					}
					venda_por_data(desc,valores);
					porData(valores,desc);
				},'json');

			}
		},'json');
	});

	$('.btn-buscar-por-area').click(function () {
		var data=$('.data-busca').val();
		data=data.split('-');
		var data1=data[0].replace("/",'-');
		var data2=data[1].replace("/",'-');
		data1=data1.replace("/",'-');
		data2=data2.replace("/",'-');
		$.get($('.topo').attr('url')+'venda/venda_por_area',{data1:data1,data2:data2},function (x) {
			if (x[0].erro) {
				$('.agrega-res').html(x[0].erro);
				$('#venda_por_data,.div-agrega').html('');
			}else
			{
				$('.agrega-res').html("<span class='fw-700 text-justify'>Mostrando saídas efectuadas no período de <label class='text-primary' style='text-decoration: underline'>"+data[0]+"</label> à <label class='text-primary' style='text-decoration: underline'>"+data[1]+"</label></span>.");
				$('.btn-link-por-data').attr('data1',data1);
				$('.btn-link-por-data').attr('data2',data2);
				$.get($('.topo').attr('url')+'venda/venda_por_area',{data1:data1,data2:data2},function (x) {
					var desc=[];
					var valores=[];
					for (i in x)
					{
						desc.push(sigla(x[i].nome));
						valores.push(x[i].count);
					}
					venda_por_area(desc,valores);
					porArea(valores,desc);
				},'json');

			}
		},'json');
	});

	$('.btn-link-por-data').click(function () {
		if ($(this).attr('data1')!="")
			window.location=$(this).attr('href')+$(this).attr('data1').trim()+'/'+$(this).attr('data2').trim();
	});

	//alert(sigla("Guarnição Especial do Palácio Presidencial"))
});
