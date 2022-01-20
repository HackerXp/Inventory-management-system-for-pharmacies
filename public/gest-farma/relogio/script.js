//funcao que serve para mostrar o relogio e fazer o backup do banco de dados
function reloj() {
    time = new Date();
    horas = time.getHours();
    minutos = time.getMinutes();
    segundos = time.getSeconds();

    if (horas == 17 && minutos == 31 && segundos == 0) {
        $.post(URL + 'backup/backup_db', function(x) {
            console.log("✔ Backup feito...", "color: #148f32");
        });
    } //backup do banco de dados

}


setInterval(reloj, 1000);