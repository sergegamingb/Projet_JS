(function () {
    'use strict';
    $(() => {
        $('.addon').one('click', function () {
            $('#addDate').append('<div class="card"><div class="card-body">' +
                '<input type="date"  name="dates" max="9999-12-31" min="1000-01-01" class="form-control input">' +
                '<input type="time" name="hour" max="839:59" min="-839:59" class="form-control input">' +
                '<div class="d-flex justify-content-center msg" id="messageError"></div>' +
                '<div class="d-flex justify-content-center" id="accueil">' +
                '<input type="submit" value="Ajouter note" class="btn login_btn " id="addDate "></div>' +
                '</div></div>');
            $('.addon').remove();
        });
        $('#form-date').submit(function () {
            $('#messageError').fadeOut();
            $.ajax({
                url: $(this).attr('action'),
                method: $(this).attr('method'),
                data : $(this).serialize()
            }).done(function (data) {
                if (data.success === true) {
                    $('#success').html(data.message).fadeIn();
                    $('#addDate').remove();
                    $('#addNote').remove();
                    location.reload(true);
                } else {
                    $('#messageError').html(data.message).fadeIn();
                }
            }).fail(function () {
                $('body').html('Erreur tb');
            });
            return false;
        })


    });

}) ();