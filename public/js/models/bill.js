var products = []

function addProduct(id) {
    $.ajax({
        type: "GET",
        url: "bill/addProduct/"+id,
        success: function(response) {
            productArray = response.product
            productsArray = response.products
            exist = false
            for (let i = 0; i < products.length; i++) {
                if (products[i].id == productArray.id) {
                    exist = true
                }
            }
            !exist ? products.push(productArray) : null
            updateProducts()
            updateTableProducts(productsArray)
        },
    });
}

function updateProducts() {
    productsInput = ''
    products.forEach(product => {
        total = product.sale_price*product.stock
     
        productsInput += '<td>'
        productsInput += '<div class="form-group">'
        productsInput += '<div class="input-group">'
        productsInput += '<div class="input-group-prepend">'
        productsInput += '<button type="button" onclick="deleteProduct()" class="btn btn-danger"><i class="fas fa-times"></i></button>'
        productsInput += '</div>'
        productsInput += '<input type="text" class="form-control" value="'+product.name+'" disabled>'
        productsInput += '</div>'
        productsInput += '</div>'
        productsInput += '</td>'
        productsInput += '<td>'
        productsInput += '<div class="form-group">'
        productsInput += '<input type="text" class="form-control" value="'+product.stock+'" disabled> '
        productsInput += '</div>'
        productsInput += '</td>'
        productsInput += '<td>'
        productsInput += '<div class="form-group">'
        productsInput += '<input type="text" class="form-control" value="'+total+'"  disabled>'
        productsInput += '</div>'
        productsInput += '</td>'
        productsInput += '<td>'
        productsInput += ' <div class="form-group">'
        productsInput += '<input type="text" class="form-control" value="'+product.iva+'"  disabled>'
        productsInput += '</div>'
        productsInput += '</td>'
        productsInput += '</tr>'
    });
    $('#products').html(productsInput)
  
}

function updateTableProducts(array){
    table = "";
    for (let i = 0; i < array.length; i++) {
        if (array[i].status == "Pendiente") {
            table += '<tr class="bg-secondary">'
        }else{
            table += '<tr>'
        }
        table += "<td>"+array[i].id+"</td>"
        table += "<td>"+array[i].name+"</td>"
        table += "<td>"+array[i].description+"</td>"
        table += "<td>"+array[i].sale_price+"</td>"
        table += "<td>"+array[i].stock+"</td>"
        table += "<td>"+array[i].iva+"</td>"
        table += '<th><button class="btn btn-primary" onclick="addProduct('+array[i].id+')">Agregar <i class="fas fa-plus"></i></button></th>'
        table += "</tr>"
    }
    $("#table").DataTable().destroy().clear();
    $('#table-body').html(table)
    datatable();
}

function deleteProduct(){

}

function datatable() {
    $('#table').DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#table_wrapper .col-md-6:eq(0)');
}
