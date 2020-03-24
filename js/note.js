(function () {
    'use strict';
    $(() => {
        $('#form-date').submit(function () {
            $('#messageError').fadeOut();
            $.ajax({
                url: $(this).attr('action'),
                method: $(this).attr('method'),
                data : $(this).serialize()
            }).done(function (data) {
                if (data.success === true) {
                    $('#succes').html(data.message).fadeIn();
                    $('#addDate').remove();
                    $('#addNote').remove();
                } else {
                    $('#messageError').html(data.message).fadeIn();
                }
            }).fail(function () {
                $('body').html('Erreur tb');
            })
            return false;
        })


    });

}) ();