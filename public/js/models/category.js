// Modal config

var idCategory;

$('#add').click(function (){
    $('#name').val("")
    removeValidate("#name")
    $('#send').val("save")
    $('#send').html("Guardar")
    $('#modal').modal().show()
    
})

function edit(id) {
    $.ajax({
        type: "GET",
        url: "category/"+id,
        success: function(response) {
            categoryArray = response.category
            $("#name").val(categoryArray.name)
            removeValidate("#name")
            $("#id").val(id)
            $('#send').val('edit')
            $('#send').html('Editar')
            $('#modal').modal().show()
            idCategory = id
        },
    });
}

function del(id) {
    swal({
        title: "¿Estas segur@?",
        text: "Estas apunto de eliminar una categoria",
        icon: "warning",
        buttons: {
            cancel : 'Cancelar',
            confirm : {text:'Si, estoy seguro',className:'sweet-warning'},
        },
    }).then((will)=>{
        if(will){
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')     
            },
            type: "DELETE",
            url: "categories/"+id,
            success: function(response) {
                categories = ""
                categoriesArray = response.categories
                updateDatatable(categoriesArray)
                swal("¡Se ha eliminado correctamente!", "Has eliminado una categoria", "success")

            },
        });
        }else{
        $("#all_petugas").click();
        }
    })
}

$('#send').click(function (e){
    e.preventDefault()
    //validations
    validation = true
    if(!validateInput("#name",['required','text']))  
        validation = false 
    if (!validation) {
        return
    }
    if($('#send').val()=="save"){
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')     
            },
            type: "POST",
            url: "category",
            data: $("#form").serialize(),
            success: function(response) {
                categories = ""
                categoriesArray = response.categories
                updateDatatable(categoriesArray)
                $('#modal').modal('toggle')
                swal("¡Se ha agregado correctamente!", "Has agregado una categoria", "success")
            },
        });
    }else{
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')     
            },
            type: "PUT",
            url: "category/"+idCategory,
            data: $("#form").serialize(),
            success: function(response) {
                categories = ""
                categoriesArray = response.categories
                updateDatatable(categoriesArray)
                $('#modal').modal('toggle')
                swal("¡Se ha actualizado correctamente!", "Has actualizado una categoria", "success")
            },
        });
    }
})

function updateStatus(id){
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')     
        },
        type: "POST",
        url: "category/status/"+id,
        success: function(response) {
            categories = ""
            categoriesArray = response.categories
            updateDatatable(categoriesArray)
        },
    });
}

//datatable

function updateDatatable(array) {
    table = "";
    for (let i = 0; i < array.length; i++) {
        table += "<tr>"
        table += "<td>"+array[i].id+"</td>"
        table += "<td>"+array[i].name+"</td>"
        if(array[i].status == "Activo") {
            table += "<td><label class='btn btn-success btn-xs'>"+array[i].status+"</label></td>"
        }else if(array[i].status == "Inactivo"){
            table += "<td><label class='btn btn-danger btn-xs'>"+array[i].status+"</label></td>"
        }
        table += "<td>"
        table += "<div class='form-group'>"
        table += '<a href="#" class="btn btn-xs btn-info" onclick="edit('+array[i].id+')"><i class="fas fa-pen"></i></a>'
        if (array[i].status == "Activo") {
            table += '<label class="switch ml-3">'
            table += '<input type="checkbox" onclick="updateStatus('+array[i].id+')" checked>'
            table += '<span class="slider round"></span>'
            table += ' </label>'
        }else if (array[i].status == "Inactivo") {
            table += '<label class="switch ml-3">'
            table += '<input type="checkbox" onclick="updateStatus('+array[i].id+')" >'
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

function datatable(){
    $('#table').DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "excel", "pdf", "print", "colvis"],
      }).buttons().container().appendTo('#table_wrapper .col-md-6:eq(0)');
}

function stadistic(){
    
}