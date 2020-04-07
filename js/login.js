(function () {
    'use strict';
    $(() => {
        $('#form-login').submit(function () {
            //let $self = $(this);
            $('#messages').fadeOut();
            $.ajax ({
                url: $(this).attr('action'),
                method: $(this).attr('method'),
                data: $(this).serialize()
            }).done(function (data) {
                if(data.success === true) {
                    window.location.href ='/';
                } else {
                    $('#messages').html(data.message).fadeIn();
                }
            }).fail(function () {
                $('body').html('Erreur nul');
            });
            return false;
        });
        $('#reg').one('click',function () {
            $.ajax({
                url:$(this).attr('action'),
                method:$(this).attr('method')
            }).done(function () {
                $('#form-reg').fadeOut(0);
                $('#login').fadeIn();
            })
        });

    });

}) ();