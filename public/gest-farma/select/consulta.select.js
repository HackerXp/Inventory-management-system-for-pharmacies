$(this).ready(function () {
    $('.btn-emitir-relatorio-dia').click(function () {
        var data_consulta=$('.data_consulta').val();
        window.location=URL+'consulta/relatorio/diario/'+data_consulta;
    });
});