(function () {
    'use strict';
    $(() => {
        let form ;
        $.ajax({
            url : 'json/getNote.php',
            method : 'get',
            data : $(this).serialize()
        }).done (function (data) {
            if (data.success === false) {
                $('#nonote').html(data.message).fadeIn();
            }
            for (let i in data.note) {
                let id =data.note[i]['Id'];
                form ='<div class="card-body" id="form-edit'+id+'" style="display: none">' +
                    '<input type="text" name="object" class="form-control input" placeholder="Objet de la note" maxlength="40" value='+data.note[i]['Objet']+'> ' +
                    '<input type="email" name="mail" class="form-control input" placeholder="Envoyer la note à" maxlength="30" value='+data.note[i]['emailNote']+'> ' +
                    '<textarea type="text" name="mNote" class="form-control input" placeholder="Écrivez votre note ici" rows="7" maxlength="150" >'+data.note[i]['Content']+'</textarea> ' +
                    '<input type="date"  name="dates" max="9999-12-31" min="1000-01-01" class="form-control input" value='+data.note[i]['dateEnvoi']+'> ' +
                    '<input type="time" name="hour" max="839:59" min="-839:59" class="form-control input" value='+data.note[i]['heureEnvoi']+'> ' +
                    '<div class="d-flex justify-content-center msg" id="messageError"></div> ' +
                    '<div class="d-flex justify-content-center" id="choose"> ' +
                    '<input type="submit" value="Modifier note" class="btn login_btn " id="update">' +
                    '</div> </div>';
                $('#editNote').append(form);
            }
        });
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
                info = '<div class="col-3 d-flex justify-content-around" ><div class="card">' +
                    '<div class=" remove fa fa-times btn btn-danger" id= ' + id + ' ></div>' +
                    '<div class="card-body "> Objet : '+ data.note[i]['Objet']+'</div>' +
                    '<div class="card-body "> '+ data.note[i]['Content']+'</div>' +
                    '<input type="button" class="login_btn btn edit" value="Modifier note" id='+id+'>'+
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
        $(document).on('click','.edit',function (event) {
            let id = event.target.id;
            $('.edit').parent().fadeOut(0);
            $('#editNote').append(
                '<form id="editable" method="post" action=/json/editNote.php?id='+id+'></form>')
                .fadeIn();
            $('#editable').append(
                $('#form-edit'+id).fadeIn());
        });
        $(document).on('submit','#editable',function () {
            $.ajax({
                url :$(this).attr('action'),
                method: $(this).attr('method'),
                data : $(this).serialize()
            }).done (function (data) {
                if (data.success)
                {
                    $('#editable').parent().fadeOut(0);
                    $('#success').html(data.message).fadeIn();
                    location.reload();
                } else {
                    $('#messageError').html(data.message).fadeIn();
                }
            });
            return false;
        });
    });

}) ();

