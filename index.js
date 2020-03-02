(function() {
    'use strict';
    $(() => {
        $.ajax({
            url: '/Login_logout/json/is_connected.php',
            method: 'get'
        }).done(function (data) {
            if (data) {
                /* le user est connecté */
                $('body').append(
                    $('<button />')
                        .html('Déconnexion')
                        .on('click', function () {
                            $.ajax({
                                url: '/Login_logout/json/logout.php',
                                method: 'get'
                            }).done(function () {
                                window.location.href = '/Login_logout/login.html';
                            });
                        })
                );
            } else {
                /* le user n'est pas connecté */
                window.location.href = '/Login_logout/login.html';
            }
        }).fail(function () {
            $('body').html('Une erreur critique est arrivée.');
        });
    });

}) ();


