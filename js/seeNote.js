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
                    '<i   class="edit fa fa-times" id= ' + id + '></i>' +
                    '<div class="card-body"> '+ data.note[i]['Content']+'</div>' +
                    '<input   type="button" value="Modifier note" class="login_btn btn ">' +
                    '</div></div>';
                $('#note').append(info);

            }
        });
        $(document).on('click','.edit',function (event) {
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

