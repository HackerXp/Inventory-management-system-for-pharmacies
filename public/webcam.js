$(this).ready(function() {

    $('#pre_take_buttons,#carregar-foto-perfil').hide();
	$('.btn-ligar-camera').click(function (e) {
        e.preventDefault();
        $('#carregar-foto-perfil').hide();
        $('#pre_take_buttons').show();
        Webcam.set({
            // live preview size
            width: 320,
            height: 240,

            // device capture size
            dest_width: 640,
            dest_height: 480,

            // final cropped size
            crop_width: 480,
            crop_height: 480,

            // format and quality
            image_format: 'jpeg',
            jpeg_quality: 90,

            // flip horizontal (mirror mode)
            flip_horiz: true
        });
        Webcam.attach('#camera_utente');
    });

    $('.btn-desligar-camera').click(function () {
        Webcam.reset();
        $('#pre_take_buttons').hide();
        $('#carregar-foto-perfil').show();
    });

    $('.btn_salvar_imagen').click(function () {
        Webcam.snap(function (data_uri) {
            // shut down camera, stop capturing
            Webcam.reset();

            var form_data = new FormData();
            form_data.append('foto_capturada', data_uri);
            $.ajax({
                url: URL+"utilizador/upload_foto",
                method: "POST",
                data: form_data,
                contentType: false,
                cache: false,
                dataType:'json',
                processData: false,
                success: function (x) {
                    toastr[x[0].alerta](x[0].sms, x[0].titulo);
                    Webcam.reset();
                    $('.foto-utilizador').attr('src',x[0].src);
                }
            });
        });
    });

    formData = null;
    if (window.FormData) {
        formData = new FormData();
    }

    $('#image_file').change(function () {
        var tam = this.files.length, file, i = 0, reader;
        for (; i < tam; i++) {
            file = this.files[i];
            // alert(file);
            if (window.FileReader) {
                reader = new FileReader();
                reader.onloadend = function (e) {
                };
                reader.readAsDataURL(file);
            }
            if (formData) {
                formData.append('image_file', file);
            }
        }
    });

    $('#carregar-foto-perfil').click(function () {

        $.ajax({
            url:$('#upload_form').attr('action'),
            method:"POST",
            data:formData,
            dataType:'json',
            contentType: false,
            cache: false,
            processData:false,
            success:function(x)
            {
                $('#modal-camera').modal('hide');
                toastr[x[0].alerta](x[0].sms, x[0].titulo);
                $('.foto-utilizador').attr('src',x[0].src);
            }
        });
    });
});
