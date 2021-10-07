// Modal config

var idShop;

$('#add').click(function () { // ABRE MODAL DE NUEVO REGISTRO
    $('#name').val("")
    $('#address').val("")
    $('#email').val("")
    $('#phone').val("")
    $('#nit').val("")
    removeValidate("#name")
    removeValidate("#address")
    removeValidate("#email")
    removeValidate("#phone")
    removeValidate("#nit")
    $('#send').val("save")
    $('#send').html("Guardar")
    $('#modal').modal().show()

})

function edit(id) {
    $.ajax({
        type: "GET",
        url: "shop/" + id,
        success: function (response) {
            shopArray = response.shop
            $("#name").val(shopArray.name)
            $("#address").val(shopArray.address)
            $("#email").val(shopArray.email)
            $("#phone").val(shopArray.phone)
            $("#nit").val(shopArray.nit)
            removeValidate("#name")
            removeValidate("#address")
            removeValidate("#email")
            removeValidate("#phone")
            removeValidate("#nit")
            $("#id").val(id)
            $('#send').val('edit')
            $('#send').html('Editar')
            $('#modal').modal().show()
            idShop = id
        },
    });
}

function del(id) { // DELETE
    swal({
        title: "¿Estas segur@?",
        text: "Estas apunto de eliminar una sucursal",
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
                url: "shops/" + id,
                success: function (response) {
                    shops = ""
                    shopsArray = response.shops
                    updateDatatable(shopsArray)
                    swal("¡Se ha eliminado correctamente!", "Has eliminado una sucursal", "success")

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

    if (!validateInput("#address", ['required']))
        validation = false

    if (!validateInput("#email", ['required', 'email']))
        validation = false

    if (!validateInput("#phone", ['required', 'number']))
        validation = false

    if (!validateInput("#nit", ['required', 'number']))
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
            url: "shop",
            data: $("#form").serialize(),
            success: function (response) {
                shops = ""
                shopsArray = response.shops
                updateDatatable(shopsArray)
                $('#modal').modal('toggle')
                swal("¡Se ha agregado correctamente!", "Has agregado una sucursal", "success")
            },
        });
    } else {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "PUT",
            url: "shop/" + idShop,
            data: $("#form").serialize(),
            success: function (response) {
                shops = ""
                shopsArray = response.shops
                updateDatatable(shopsArray)
                $('#modal').modal('toggle')
                swal("¡Se ha actualizado correctamente!", "Has actualizado una sucursal", "success")
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
        url: "shop/status/" + id,
        success: function (response) {
            shops = ""
            shopsArray = response.shops
            updateDatatable(shopsArray)
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
        table += "<td>" + array[i].address + "</td>"
        table += "<td>" + array[i].email + "</td>"
        table += "<td>" + array[i].phone + "</td>"
        table += "<td>" + array[i].nit + "</td>"
        if (array[i].status == "Activo") {
            table += "<td><label class='btn-xs btn-success'>" + array[i].status + "</label></td>"
        }else{
            table += "<td><label class='btn-xs btn-danger'>" + array[i].status + "</label></td>"
        }

        table += "<td>"
        table += "<div class='form-group'>"
        table += '<a href="#" class="btn btn-xs btn-info" onclick="edit(' + array[i].id + ')"><i class="fas fa-pen"></i></a>'
        if (array[i].status == "Activo") {
            table += '<label class="switch ml-3">'
            table += '<input type="checkbox" onclick="updateStatus(' + array[i].id + ')" checked>'
            table += '<span class="slider round"></span>'
            table += ' </label>'
        } else if (array[i].status == "Inactivo") {
            table += '<label class="switch ml-3">'
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

