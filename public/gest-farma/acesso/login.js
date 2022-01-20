/**
 * Created by elviosadoc on 23/04/18.
 */
$(this).ready(function () {

    //login
    $('.alert-error-display').hide();

    $('#form_login').submit(function (e) {
        e.preventDefault();
        $.post($(this).attr('action'),
            $(this).serialize(),
            function (x)
            {
                switch (x[0].erro)
                {
                    case 1:
                        $('.alert-error-display').fadeIn(1000).addClass('alert-danger');
                        $('.sms-error').html(x[0].response);
                        break;
                    case 0:
                        window.location=x[0].response;
                        break;
                }
            }
        ,'json');
    });

    $('#form_login input').keypress(function (e) {

        if (e.which == 13) {
            $.post($('#form_login').attr('action'),
                $('#form_login').serialize(),
                function (x)
                {
                    switch (x[0].erro)
                    {
                        case 1:
                            $('.alert-error-display').fadeIn(1000).addClass('alert-danger');
                            $('.sms-error').html(x[0].response);
                            break;
                        case 0:
                            window.location=x[0].response;
                            break;
                    }
                }
                ,'json');
        }
    });

    $('.conta').keypress(function () {
        $('.alert-error-display').fadeOut(500).removeClass('alert-danger');
        $('.sms-error').text('');
    });
});