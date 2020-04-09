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
                    '<div class="card-body content"> '+ data.note[i]['Content']+'</div>' +
                    '<input type="button" value="Modifier note" class="login_btn btn ">' +
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
        })
    });

}) ();

