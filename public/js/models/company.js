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
        url: "categories/"+id,
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
    if(!validateInput("#name",['required','text','min:3','max:10']))  
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
            url: "categories",
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
            url: "categories/"+idCategory,
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
        url: "categories/status/"+id,
        success: function(response) {
            categories = ""
            categoriesArray = response.categories
            updateDatatable(categoriesArray)
        },
    });
}

//datatable

function updateDatatable(array) {
    for (let i = 0; i < array.length; i++) {
        companies += "<tr>"
        companies += "<td class='text-center'>"+array[i].id+"</td>"
        companies += "<td class='text-center'>"+array[i].name+"</td>"
        if (array[i].status == "Activo") {
            companies += "<td><label class='btn-xs btn-success'>" + array[i].status + "</label></td>"
        }else{
            companies += "<td><label class='btn-xs btn-danger'>" + array[i].status + "</label></td>"
        }
        companies += "<td class='text-center'>"
        companies += "<div class='form-group'>"
        companies += '<a href="#" class="btn btn-xs btn-info" onclick="edit('+array[i].id+')"><i class="fas fa-pen"></i></a>'
        companies += '<a href="#" class="btn btn-xs btn btn-danger" onclick="del('+array[i].id+')"><i class="fas fa-trash-alt"></i></a>'
        if (array[i].status_id == 1) {
            companies += '<label class="switch">'
            companies += '<input type="checkbox" onclick="updateStatus('+array[i].id+')" checked>'
            companies += '<span class="slider round"></span>'
            companies += ' </label>'
        }else if (array[i].status_id == 2) {
            companies += '<label class="switch">'
            companies += '<input type="checkbox" onclick="updateStatus('+array[i].id+')" >'
            companies += '<span class="slider round"></span>'
            companies += ' </label>'
        } 
        companies += "</div>"
        companies += "</td>"
        companies += "</tr>"
    }
    $("#categories").DataTable().destroy().clear();
    $('#categories-body').html(categories)
    datatable();
}

function datatable(){
    $('#categories').DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#categories_wrapper .col-md-6:eq(0)');
}

