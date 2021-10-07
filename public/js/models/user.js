// Modal config

var idUser;

$('#add').click(function () { // ABRE MODAL DE NUEVO REGISTRO
    $('#name').val("")
    $('#surname').val("")
    $('#identification_type').val("")
    $('#identification_number').val("")
    $('#date_birth').val("")
    $('#address').val("")
    $('#email').val("")
    $('#phone').val("")
    $('#role_id').val("")
    if ($('#role_id').val("") == 5) {
        $('#shop_name').val("")
        $('#shop_email').val("")
        $('#shop_phone').val("")
        $('#shop_address').val("")
        $('#shop_nit').val("")
    }
    // $('#role_id').val("")
    removeValidate("#name")
    removeValidate("#surname")
    removeValidate("#identification_type")
    removeValidate("#identification_number")
    removeValidate("#date_birth")
    removeValidate("#name")
    removeValidate("#address")
    removeValidate("#email")
    removeValidate("#phone")
    removeValidate("#role_id")
    // removeValidate("#shop_id")
    $('#send').val("save")
    $('#send').html("Guardar")
    $('#modal').modal().show()
})

function edit(id) {
    $.ajax({
        type: "GET",
        url: "user/" + id,
        success: function (response) {
            userArray = response.user
            $("#name").val(userArray.name)
            $("#surname").val(userArray.surname)
            $("#identification_type").val(userArray.identification_type)
            $("#identification_number").val(userArray.identification_number)
            $("#date_birth").val(userArray.date_birth)
            $("#address").val(userArray.address)
            $("#email").val(userArray.email)
            $("#phone").val(userArray.phone)
            $("#role_id").val(userArray.role_id)
            // $("#shop_id").val(userArray.shop_id)
            removeValidate("#name")
            removeValidate("#surname")
            removeValidate("#identification_type")
            removeValidate("#identification_number")
            removeValidate("#date_birth")
            removeValidate("#address")
            removeValidate("#email")
            removeValidate("#phone")
            removeValidate("#role_id")
            // removeValidate("#shop_id")
            $("#id").val(id)
            $('#send').val('edit')
            $('#send').html('Editar')
            $('#modal').modal().show()
            idUser = id
        },
    });
}

function del(id) { // DELETE
    swal({
        title: "¿Estas segur@?",
        text: "Estas apunto de eliminar un usuario",
        icon: "warning",
        buttons: {
            cancel: 'Cancelar',
            confirm: { text: 'Si, estoy seguro', className: 'sweet-warning' },
        },
    }).then((will) => {
        if (will) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "DELETE",
                url: "users/" + id,
                success: function (response) {
                    users = ""
                    usersArray = response.users
                    updateDatatable(usersArray)
                    swal("¡Se ha eliminado correctamente!", "Has eliminado un usuario", "success")

                },
            });
        } else {
            $("#all_petugas").click();
        }
    })
}

$('#send').click(function (e) { // ENVIA LOS DATOS

    e.preventDefault()

    //validations
    validation = true

    if (!validateInput("#name", ['required', 'text']))
        validation = false

    if (!validateInput("#surname", ['required', 'text']))
        validation = false

    if (!validateInput("#identification_type", ['required', 'text']))
        validation = false

    if (!validateInput("#identification_number", ['required', 'number']))
        validation = false

    // if (!validateInput("#date_birth", ['required', 'text']))
    //     validation = false

    if (!validateInput("#address", ['required']))
        validation = false

    if (!validateInput("#email", ['required', 'email']))
        validation = false

    if (!validateInput("#phone", ['required', 'number']))
        validation = false

    // if (!validateInput("#role_id", ['required']))
    //     validation = false

    // if (!validateInput("#shop_id", ['required']))
    //     validation = false


    if (!validation) {
        return
    }

    if ($('#send').val() == "save") {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "POST",
            url: "register", // registerController
            data: $("#form").serialize(),
            success: function (response) {
                users = ""
                console.log(response);
                usersArray = response.users
                updateDatatable(usersArray)
                $('#modal').modal('toggle')
                swal("¡Se ha agregado correctamente!", "Has agregado un usuario", "success")
            },
        });
    } else {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "PUT",
            url: "user/" + idUser, // userController
            data: $("#form").serialize(),
            success: function (response) {
                users = ""
                usersArray = response.users
                updateDatatable(usersArray)
                $('#modal').modal('toggle')
                swal("¡Se ha actualizado correctamente!", "Has actualizado un usuario", "success")
            },
        });
    }
})

function updateStatus(id) {  // ACTUALIZA EL ESTADO DEL REGISTRO
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: "POST",
        url: "user/status/" + id,
        success: function (response) {
            users = ""
            console.log(response);
            usersArray = response.users
            updateDatatable(usersArray)
        },
    });
}

//datatable

function updateDatatable(array) {
    table = "";
    for (let i = 0; i < array.length; i++) {
        table += "<tr>"
        table += "<td>" + array[i].id + "</td>"
        table += "<td>" + array[i].name + "</td>"
        table += "<td>" + array[i].surname + "</td>"
        table += "<td>" + array[i].date_birth + "</td>"
        table += "<td>" + array[i].identification_type + "</td>"
        table += "<td>" + array[i].identification_number + "</td>"
        table += "<td>" + array[i].email + "</td>"
        table += "<td>" + array[i].phone + "</td>"
        table += "<td>" + array[i].address + "</td>"
        table += "<td>" + array[i].shop + "</td>"
        table += "<td>" + array[i].role + "</td>"
        if (array[i].status == "Activo") {
            table += "<td><label class='btn-xs btn-success'>" + array[i].status + "</label></td>"
        }else{
            table += "<td><label class='btn-xs btn-danger'>" + array[i].status + "</label></td>"
        }
        table += "<td>"
        table += "<div class='form-group'>"
        table += '<a href="#" class="btn btn-xs btn-info" onclick="edit(' + array[i].id + ')"><i class="fas fa-pen"></i></a>'
        if (array[i].status == "Activo") {
            table += '<label class="switch">'
            table += '<input type="checkbox" onclick="updateStatus(' + array[i].id + ')" checked>'
            table += '<span class="slider round"></span>'
            table += ' </label>'
        } else if (array[i].status == "Inactivo") {
            table += '<label class="switch">'
            table += '<input type="checkbox" onclick="updateStatus(' + array[i].id + ')" >'
            table += '<span class="slider round"></span>'
            table += ' </label>'
        }
        table += "</div>"
        table += "</td>"
        table += "</tr>"
    }
    $("#table").DataTable().destroy().clear();
    $('#table-body').html(table)
    datatable();
}


function datatable() {
    $('#table').DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#table_wrapper .col-md-6:eq(0)');
}

