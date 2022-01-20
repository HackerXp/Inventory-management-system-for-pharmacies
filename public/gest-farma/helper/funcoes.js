function seq_codigo(seq, id) {
    var ret = null;
    switch (seq) {
        case 1:
            ret = "0000" + id;
            break;
        case 2:
            ret = "000" + id;
            break;
        case 3:
            ret = "00" + id;
            break;
        case 4:
            ret = "0" + id;
            break;
    }
    return ret;
}

function categoria(seq, str) {
    var ret = null;
    switch (seq) {
        case 2:
            ret = str[0];
            break;
        case 3:
            ret = str[0] + str[1];
            break;
        case 4:
            ret = str[0] + str[1] + str[2];
            break;
        default:
            ret = str[0] + str[1] + str[2] + str[3] + str[4];
            break;
    }
    return ret.toUpperCase();
}


function user(param) {
    var ret = null;
    var aux = param.split(" ");
    for (var i = 0; i < aux.length; i++) {
        ret = aux[0] + '.' + aux[i];
    }
    return ret.toLowerCase();
}

function nome_cidadao(param) {
    var ret = null;
    var aux = param.split(" ");
    for (var i = 0; i < aux.length; i++) {
        ret = aux[0] + ' ' + aux[i];
    }
    return ret;
}

function senha(param1, param2) {
    var ret = null;
    var aux = param1.split(".");
    for (var i = 0; i < aux.length; i++) {
        ret = aux[0];
    }
    return user1(param2) + '' + ret.toLowerCase();
}

function user1(param) {
    var ret = null;
    var aux = param.split(" ");
    for (var i = 0; i < aux.length; i++) {
        ret = aux[i];
    }
    return ret.toLowerCase();
}

function ocultar(id) {
    $('#dt-basic-example thead tr th').each(function(i) {

        $(this).parents("thead")
            .siblings("tbody")
            .children("tr").each(function() {
                if ($(this).children("td:eq(0)").text() == id) {
                    $(this).remove();
                }
            });
    });
}

function limpar() {
    for (var i = 0; i < arguments.length; i++) {
        $(arguments[i]).val(" ");
    }
}


function tipo_relatorio(param) {
    var ret = null;
    switch (param) {
        case 'mensal':
            ret = "Mensal";
            break;
        case 'trim':
            ret = "Trimestral";
            break;
        case 'sem':
            ret = 'Semestral';
            break;
        case 'anual':
            ret = 'Anual';
            break;
    }

    return ret;
}


var graficoTotalExpediente = function(p1, p2) {
    new Chartist.Bar('#venda_diaria', {
        labels: p1,
        series: p2
    }, {
        distributeSeries: true
    });
}

var venda_diaria = function(p1, p2) {
    new Chartist.Bar('#venda_diaria', {
        labels: p1,
        series: p2
    }, {
        distributeSeries: true
    });
}

var venda_por_data = function(p1, p2) {
    new Chartist.Bar('#venda_por_data', {
        labels: p1,
        series: p2
    }, {
        distributeSeries: true
    });
}

var venda_por_area = function(p1, p2) {
    new Chartist.Bar('#venda_por_area', {
        labels: p1,
        series: p2
    }, {
        distributeSeries: true
    });
}

var pieChart = function(p1, p2) {
    var config = {
        type: 'pie',
        data: {
            datasets: [{
                data: p1,
                backgroundColor: [
                    myapp_get_color.primary_400,
                    myapp_get_color.danger_500,
                    myapp_get_color.warning_500,
                    myapp_get_color.info_300,
                    myapp_get_color.success_500
                ],
                label: 'My dataset' // for legend
            }],
            labels: p2
        },
        options: {
            responsive: true,
            legend: {
                display: true,
                position: 'bottom',
            }
        }
    };
    new Chart($("#pieChart > canvas").get(0).getContext("2d"), config);
}

var porData = function(p1, p2) {
    var config = {
        type: 'pie',
        data: {
            datasets: [{
                data: p1,
                backgroundColor: [
                    myapp_get_color.primary_400,
                    myapp_get_color.danger_500,
                    myapp_get_color.warning_500,
                    myapp_get_color.info_300,
                    myapp_get_color.success_500
                ],
                label: 'My dataset' // for legend
            }],
            labels: p2
        },
        options: {
            responsive: true,
            legend: {
                display: true,
                position: 'bottom',
            }
        }
    };
    new Chart($("#porData > canvas").get(0).getContext("2d"), config);
}



var porArea = function(p1, p2) {
    var config = {
        type: 'pie',
        data: {
            datasets: [{
                data: p1,
                backgroundColor: [
                    myapp_get_color.primary_400,
                    myapp_get_color.danger_500,
                    myapp_get_color.warning_500,
                    myapp_get_color.info_300,
                    myapp_get_color.fusion_300,
                    myapp_get_color.warning_900,
                    myapp_get_color.info_900,
                    myapp_get_color.success_900,
                    myapp_get_color.success_500
                ],
                label: 'My dataset' // for legend
            }],
            labels: p2
        },
        options: {
            responsive: true,
            legend: {
                display: true,
                position: 'bottom',
            }
        }
    };
    new Chart($("#porArea > canvas").get(0).getContext("2d"), config);
}

function estado(p) {

    if (p == '1')
        return "Concluído";
    else
        return "Aguardando Resposta";
}

function sigla(param) {
    var ponto = ".";
    if (param.length <= 15)
        return param;
    else {
        var split_param = param.split(" ");
        var res = '';
        if (split_param.length > 1) {
            for (var i = 0;
                (split_param.length) > i; i++) {
                if (i + 1 == split_param.length)
                    ponto = "";
                if (split_param[i].length >= 2) {
                    if (split_param[i] == "de" || split_param[i] == "do" || split_param[i] == "da") continue;
                    res += split_param[i].substr(0, 1) + ponto;
                }
            }
            return res;
        }
    }
}