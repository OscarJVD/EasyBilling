// Modal config

var idRole;

$('#add').click(function () { // ABRE MODAL DE NUEVO REGISTRO
    $('#name').val("")
    removeValidate("#name")
    $('#send').val("save")
    $('#send').html("Guardar")
    $('#modal').modal().show()

})

function edit(id) {
    $.ajax({
        type: "GET",
        url: "role/" + id,
        success: function (response) {
            roleArray = response.role
            $("#name").val(roleArray.name)
            removeValidate("#name")
            $("#id").val(id)
            $('#send').val('edit')
            $('#send').html('Editar')
            $('#modal').modal().show()
            idRole = id
        },
    });
}

function del(id) { // DELETE
    swal({
        title: "¿Estas segur@?",
        text: "Estas apunto de eliminar un rol",
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
                url: "roles/" + id,
                success: function (response) {
                    roles = ""
                    rolesArray = response.roles
                    updateDatatable(rolesArray)
                    swal("¡Se ha eliminado correctamente!", "Has eliminado un rol", "success")
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

    if (!validation) {
        return
    }

    if ($('#send').val() == "save") {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "POST",
            url: "role",
            data: $("#form").serialize(),
            success: function (response) {
                roles = ""
                rolesArray = response.roles
                updateDatatable(rolesArray)
                $('#modal').modal('toggle')
                swal("¡Se ha agregado correctamente!", "Has agregado un rol", "success")
            },
        });
    } else {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "PUT",
            url: "role/" + idRole,
            data: $("#form").serialize(),
            success: function (response) {
                roles = ""
                rolesArray = response.roles
                updateDatatable(rolesArray)
                $('#modal').modal('toggle')
                swal("¡Se ha actualizado correctamente!", "Has actualizado un rol", "success")
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
        url: "role/status/" + id,
        success: function (response) {
            roles = ""
            rolesArray = response.roles
            updateDatatable(rolesArray)
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
        table += "<td>" + array[i].status + "</td>"
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

