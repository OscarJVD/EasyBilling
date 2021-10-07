// Modal config

var idProduct;

$('#add').click(function () { // ABRE MODAL DE NUEVO REGISTRO
    $('#name').val("")
    $('#description').val("")
    $('#purchase_price').val("")
    $('#sale_price').val("")
    $('#stock').val("")
    $('#iva').val("")
    $('#category_id').val("")
    removeValidate("#name")
    removeValidate("#description")
    removeValidate("#purchase_price")
    removeValidate("#sale_price")
    removeValidate("#stock")
    removeValidate("#iva")
    removeValidate("#category_id")
    removeValidate("#user_id")
    $('#send').val("save")
    $('#send').html("Guardar")
    $('#modal').modal().show()

})

function edit(id) {
    $.ajax({
        type: "GET",
        url: "product/" + id,
        success: function (response) {
            productArray = response.product
            $("#name").val(productArray.name)
            $("#description").val(productArray.description)
            $("#purchase_price").val(productArray.purchase_price)
            $("#sale_price").val(productArray.sale_price)
            $("#stock").val(productArray.stock)
            $("#iva").val(productArray.iva)
            $("#category_id").val(productArray.category_id)
            removeValidate("#name")
            removeValidate("#description")
            removeValidate("#purchase_price")
            removeValidate("#sale_price")
            removeValidate("#stock")
            removeValidate("#iva")
            removeValidate("#category_id")
            removeValidate("#user_id")
            $("#id").val(id)
            $('#send').val('edit')
            $('#send').html('Editar')
            $('#modal').modal().show()
            idProduct = id
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
                url: "products/" + id,
                success: function (response) {
                    products = ""
                    productsArray = response.products
                    updateDatatable(productsArray)
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

    validation = true

    if (!validateInput("#name", ['required', 'text']))
        validation = false

    if (!validateInput("#description", ['required']))
        validation = false

    if (!validateInput("#purchase_price", ['required']))
        validation = false

    if (!validateInput("#sale_price", ['required']))
        validation = false

    if (!validateInput("#stock", ['required', 'number']))
        validation = false

    if (!validateInput("#iva", ['required', 'number']))
        validation = false

    if (!validateInput("#category_id", ['required', 'number']))
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
            url: "product",
            data: $("#form").serialize(),
            success: function (response) {
                products = ""
                productsArray = response.products
                updateDatatable(productsArray)
                $('#modal').modal('toggle')
                swal("¡Se ha agregado correctamente!", "Has agregado un producto", "success")
            },
        });
    } else {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "PUT",
            url: "product/" + idProduct,
            data: $("#form").serialize(),
            success: function (response) {
                products = ""
                productsArray = response.products
                updateDatatable(productsArray)
                $('#modal').modal('toggle')
                swal("¡Se ha actualizado correctamente!", "Has actualizado un producto", "success")
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
        url: "product/status/" + id,
        success: function (response) {
            products = ""
            productsArray = response.products
            updateDatatable(productsArray)
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
        table += "<td>" + array[i].description + "</td>"
        table += "<td>" + array[i].purchase_price + "</td>"
        table += "<td>" + array[i].sale_price + "</td>"

        if (array[i].stock <= 10 ) {

        table += "<td><label class='btn-xs btn-danger'>" + array[i].stock + "</label></td>"

        }else if(array[i].stock > 10 && array[i].stock <= 20 ) {

            table += "<td><label class='btn-xs btn-warning'>" + array[i].stock + "</label></td>"

        }else {

            table += "<td><label class='btn-xs btn-success'>" + array[i].stock + "</label></td>"
        }
        table += "<td>" + array[i].iva + "</td>"
        table += "<td>" + array[i].user + "</td>"
        table += "<td>" + array[i].category + "</td>"
        if (array[i].status == "Activo") {
            table += "<td><label class='btn-xs btn-success'>" + array[i].status + "</label></td>"
        }else {
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


// function updDataTable(arr, ...fields) {
//     table = "";
//     for (let i = 0; i < arr.length; i++) {
//         table += "<tr>"
//         for(let j = 0; j < fields.length; j++){
//             table += "<td>" + arr[i].fields[j] + "</td>"
//         }
//         table += "<td>"
//         table += "<div class='form-group'>"
//         table += '<a href="#" class="btn btn-xs btn-info" onclick="edit(' + arr[i].id + ')"><i class="fas fa-pen"></i></a>'
//         if (arr[i].status == "Activo") {
//             table += '<label class="switch">'
//             table += '<input type="checkbox" onclick="updateStatus(' + arr[i].id + ')" checked>'
//             table += '<span class="slider round"></span>'
//             table += ' </label>'
//         } else if (arr[i].status == "Inactivo") {
//             table += '<label class="switch">'
//             table += '<input type="checkbox" onclick="updateStatus(' + arr[i].id + ')" >'
//             table += '<span class="slider round"></span>'
//             table += ' </label>'
//         }
//         table += "</div>"
//         table += "</td>"
//         table += "</tr>"
//     }
//     $("#table").DataTable().destroy().clear();
//     $('#table-body').html(table)
//     datatable();
// }

// updDataTable(id
//     name
//     address
//     email
//     phone
//     nit
//     status);


function datatable() {
    $('#table').DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#table_wrapper .col-md-6:eq(0)');
}

