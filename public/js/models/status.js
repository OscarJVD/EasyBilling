// Modal config

var idstatus;

$('#add').click(function () { // ABRE MODAL DE NUEVO REGISTRO
    $('#name').val("")
    $('#type_status_id').val("")
    removeValidate("#name")
    removeValidate("#type_status_id")
    $('#send').val("save")
    $('#send').html("Guardar")
    $('#modal').modal().show()

})

function edit(id) {
    $.ajax({
        type: "GET",
        url: "status/" + id,
        success: function (response) {
            statusArray = response.status
            $("#name").val(statusArray.name)
            $("#type_status_id").val(statusArray.type_status_id)
            removeValidate("#name")
            removeValidate("#type_status_id")
            $("#id").val(id)
            $('#send').val('edit')
            $('#send').html('Editar')
            $('#modal').modal().show()
            idstatus = id
        },
    });
}

function del(id) { // DELETE
    swal({
        title: "¿Estas segur@?",
        text: "Estas apunto de eliminar un estado",
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
                url: "status/" + id,
                success: function (response) {
                    statuses = ""
                    statusesArray = response.statuses
                    updateDatatable(statusesArray)
                    swal("¡Se ha eliminado correctamente!", "Has eliminado un estado", "success")
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
            url: "status",
            data: $("#form").serialize(),
            success: function (response) {
                statuses = ""
                statusesArray = response.statuses
                updateDatatable(statusesArray)
                $('#modal').modal('toggle')
                swal("¡Se ha agregado correctamente!", "Has agregado un estado", "success")
            },
        });
    } else {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "PUT",
            url: "status/" + idstatus,
            data: $("#form").serialize(),
            success: function (response) {
                statuses = ""
                statusesArray = response.statuses
                updateDatatable(statusesArray)
                $('#modal').modal('toggle')
                swal("¡Se ha actualizado correctamente!", "Has actualizado un estado", "success")
            },
        });
    }
})

function updateDatatable(array) {
    table = "";
    for (let i = 0; i < array.length; i++) {
        table += "<tr>"
        table += "<td>" + array[i].id + "</td>"
        table += "<td>" + array[i].name + "</td>"
        table += "<td>" + array[i].type_status + "</td>"
        table += "<td>"
        table += "<div class='form-group'>"
        table += '<a href="#" class="btn btn-xs btn-info mr-1" onclick="edit(' + array[i].id + ')"><i class="fas fa-pen"></i></a>'
        table += '<a href="#" class="btn btn-xs btn-danger" onclick="del(' + array[i].id + ')"><i class="fas fa-trash"></i></a>'
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

