(function () {
    'use strict';
    $(() => {
        $.ajax({
            url : 'json/getNote.php',
            method : 'get',
            data : $(this).serialize()
        }).done (function (data) {
            let info;
            let id;
            if (data.success === false) {
                $('#nonote').html(data.message).fadeIn();
            }
            for (let i in data.note) {
                id =data.note[i]['Id'];
                info = '<div class="col-3 d-flex justify-content-around"><div class="card">' +
                    '<div class=" remove fa fa-times btn btn-danger" id= ' + id + ' ></div>' +
                    '<div class="card-body "> Objet : '+ data.note[i]['Objet']+'</div>' +
                    '<div class="card-body "> '+ data.note[i]['Content']+'</div>' +
                    '</div></div>';
                $('#note').append(info);
            }
        });
        $(document).on('click','.remove',function (event) {
            let id = event.target.id;
            $.ajax({
                url : 'json/resetNote.php?id='+id,
                method: 'get',
                data : $(this).serialize()
            }).done (function (data) {
                if (data.success)
                {
                    $('#'+id).parent().parent().remove();
                }
            })
        });
    });

}) ();

