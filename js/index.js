(function() {
    'use strict';
    $(() => {
        $.ajax({
            url: 'json/is_connected.php',
            method: 'get'
        }).done(function (data) {
            if (data) {
                /* le user est connecté */
                $('body').append(
                    $('<div class="card-header"></div><div class="d-flex justify-content-around" ><input type="submit" value="Déconnexion" class="btn login_btn"></div>')
                        .on('click', function () {
                            $.ajax({
                                url: 'json/logout.php',
                                method: 'get'
                            }).done(function () {
                                window.location.href = 'login.html';
                            });
                        })
                );
            } else {
                /* le user n'est pas connecté */
                window.location.href = 'login.html';
            }
        }).fail(function () {
            $('body').html('Une erreur critique est arrivée.');
        });
    });

}) ();


