(function () {
    'use strict';
    $(() => {
        $('#sign').one('click',function () {
            $.ajax({
                url:$(this).attr('action'),
                method:$(this).attr('method')
            }).done(function () {
                $('#login').fadeOut(0);
                $('#form-reg').fadeIn();
            })
        });
        $('#form-register').submit(function () {
            $.ajax ({
                url: $(this).attr('action'),
                method: $(this).attr('method'),
                data: $(this).serialize()
            }).done(function (data) {
                if(data.success === true) {
                    window.location.href ='/';
                } else {
                    $('#msgReg').html(data.message).fadeIn();
                }
            }).fail(function () {
                $('body').html('Erreur oui mais quoi');
            });
            return false;

        })
    });

}) ();
