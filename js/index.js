(function () {
    'use strict';
    $(() => {
        $.ajax({
            url: 'json/is_connected.php',
            method: 'get'
        }).done(function (data) {
            if (data) {
                /* le user est connecté */
                $('#accueil').append(
                    $('<div><input type="submit" value="Déconnexion" class="btn login_btn "></div>')
                        .on('click', function () {
                            $.ajax({
                                url: 'json/logout.php',
                                method: 'get'
                            }).done(function () {
                                window.location.href = 'login.html';
                            });
                        })
                );
                $('#button')
                    .append('<div class="material-button-anim">' +
                        '<div role="button" class="material-button">' +
                        '<span class="fa fa-plus" aria-hidden="true">' +
                        '</span>' +
                        '</div>' +
                        '</div>')
                    .one("click", function () {
                        $.ajax({
                            url: 'json/log.php',
                            method: 'get'
                        }).done(function () {
                            $('#hello').remove();
                            $('.material-button-anim').remove();
                            $('#addNote').append('<div class="card">' +
                                '<div class="card-body">' +
                                '<input type="text" name="object" class="form-control input" placeholder="Objet de la note" maxlength="30">' +
                                '<textarea type="text" name="mNote" class="form-control input" placeholder="Écrivez votre note ici" rows="7">' +
                                '</textarea>' +
                                '<div class="d-flex justify-content-center" id="accueil">' +
                                '<div role="button" class="btn login_btn addon">Choisir une date</div>' +
                                '</div>' +
                                '</div>' +
                                '</div>');
                            $('.addon').one('click', function () {
                                $('#addDate').append('<div class="card"><div class="card-body">' +
                                    '<input type="date"  name="dates" max="9999-12-31" min="1000-01-01" class="form-control input">' +
                                    '<input type="time" name="hour" max="839:59" min="-839:59" class="form-control input">' +
                                    '<div class="d-flex justify-content-center msg" id="messageError"></div>' +
                                    '<div class="d-flex justify-content-center" id="accueil">' +
                                    '<input type="submit" value="Ajouter note" class="btn login_btn" id="addDate"></div>' +
                                    '</div></div>');
                                $('.addon').remove();
                            });
                        });
                    });
                $.ajax({
                    url: 'json/log.php',
                    method: 'post',
                    data: $(this).serialize()
                }).done(function (data) {
                    if (
                        data.success === true)
                        $('.name').append('Connecté(e) en tant que : ' + data.user)
                })
            } else {
                /* le user n'est pas connecté */
                window.location.href = 'login.html';
            }
        }).fail(function () {
            $('body').html('Une erreur critique est arrivée.');
        });
    });

})();


