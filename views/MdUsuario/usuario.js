
var tabla;

function init(){

    $("#form_user").on("submit",function(e){
        guardaryeditar(e);
    });
 } 
 
 
 /* TODO:validando inputs del modal */
 
   
 
 
/* TODO:FUNCION EDITAR - REGISTRAR */
function guardaryeditar(e){
    e.preventDefault();
    var formData = new FormData($("#form_user")[0]);
            console.log(formData);
    
        /* TODO: Guardar Informacion */
        $.ajax({
            url:"../../controller/usuario.php?op=guardaryeditar",
            type:"POST",
            data:formData,
            contentType:false,
            processData:false,
            success:function(data){
                $('#usuario_data').DataTable().ajax.reload();
                $('#Modalusuario').modal('hide'); 
            
    
                /* TODO: Mensaje Registro de usuario Confirmado*/
                swal.fire({
                    title:'Usuario',
                    text: 'Registro Confirmado',
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 1500
                }); 
    
            } 
        });
    
}




$(document).ready(function(){

    /* Mantenemos activo la consulta a tipo de usuario */
     /* TODO:Valores para el Select Cactegoria */
     $.post("../../controller/tipouser.php?op=combo",function(data){
        $("#tipo_id").html(data);
        console.log(data);
    });

       
    tabla=$('#usuario_data').dataTable({
        "aProcessing": true,
        "aServerSide": true,
        dom: 'Bfrtip',
        "searching": true,
        lengthChange: false,
        colReorder: true,
        buttons: [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5'
                ],
        "ajax":{
            url: '../../controller/usuario.php?op=listar',
            type : "post",
            dataType : "json",
            error: function(e){
                 
            }
        },
        "ordering": false,
        "bDestroy": true,
        "responsive": true,
        "bInfo":true,
        "iDisplayLength": 10,
        "autoWidth": false,
        "language": {
            "sProcessing":     "Procesando...",
            "sLengthMenu":     "Mostrar _MENU_ registros",
            "sZeroRecords":    "No se encontraron resultados",
            "sEmptyTable":     "Ningún dato disponible en esta tabla",
            "sInfo":           "Mostrando un total de _TOTAL_ registros",
            "sInfoEmpty":      "Mostrando un total de 0 registros",
            "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix":    "",
            "sSearch":         "Buscar:",
            "sUrl":            "",
            "sInfoThousands":  ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst":    "Primero",
                "sLast":     "Último",
                "sNext":     "Siguiente",
                "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }
        }     
    }).DataTable(); 


});


/* FUNCION REGISTRO DE NUEVO USUARIO AL RECIBIR UN CLIC */
$(document).on("click","#btnNuevo",function(){
    /* TODO: Limpiar informacion */
     $('#tipo_id').val('');
     $('#usu_telefono').val('');
     $('#usu_correo').val('');
     $('#usu_nombre').val('');
     $('#usu_apellido').val('');
     $('#usu_contacto').val('');
     $('#cont_telefono').val('');
     $('#usu_pass').val('');
     $('#cont_telefono').val('');
    /*  $('#usu_img').val(''); */
    $('#lbltitulo').html('Nuevo-Registro');
    $('#pre_imagen').html('<img src="../../assets/images/users/not_photo.jpg" class="rounded-circle avatar-xl img-thumbnail user-profile-image" alt="user-profile-image"></img><input type="hidden" name="hidden_usuario_imagen" value="" />');
    $("#form_user")[0].reset();
    /* TODO: Mostrar Modal */
    $('#Modalusuario').modal('show');
 });



/* FUNCION PARA MOSTRAR DATOS DEL REGISTRO SELECIONADO EN EL FORMULARIO SEGUN ID */
function editar(usu_id){
    $.post("../../controller/usuario.php?op=mostrar",{usu_id:usu_id},function(data){
        data=JSON.parse(data);
        $('#usu_id').val(data.usu_id);
        $('#usu_nombre').val(data.usu_nombre);
        $('#usu_apellido').val(data.usu_apellido);
        $('#tipo_id').val(data.tipo_id).trigger('change');
        $('#usu_contacto').val(data.usu_contacto);
        $('#cont_telefono').val(data.cont_telefono);
        $('#usu_pass').val(data.usu_pass);
        $('#usu_correo').val(data.usu_correo);
        $('#usu_correo').val(data.usu_correo);
        $('#usu_telefono').val(data.usu_telefono);
        $('#fech_reg').val(data.fech_reg);
        $('#usu_img').val('');   /* Mostrar Vacio el valor del campo usu_img al ejecutar el metodo mostrar (editar) */
        $('#pre_imagen').html(data.usu_img);
       
 
     });
     $('#lbltitulo').html('Editar Registro');
     /* TODO: Mostrar Modal */
     $('#Modalusuario').modal('show')
 }


/* TODO:FUNCION ELIMINAR DE LISTA A USUARIO  SEGUN USU_ID */
function eliminar(usu_id){
    swal.fire({
        title:"Eliminar!",
        text:"Seguro de Eliminar el Registro?",
        icon: "warning",
        confirmButtonText : "Si",
        showCancelButton : true,
        cancelButtonText: "No",
    }).then((result)=>{
        if (result.value){
            $.post("../../controller/usuario.php?op=eliminar",{usu_id:usu_id},function(data){
               
            });
 
            $('#usuario_data').DataTable().ajax.reload();
 
            swal.fire({
                title:'Usuario',
                text: 'Registro Eliminado',
                icon: 'success',
                showConfirmButton: false,
                timer: 1500
            });
        }
    });
 }

 /* SESSION FOTO PREVIA Y DEFAULD USER */

 function filePreview(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#pre_imagen').html('<img src='+e.target.result+' class="rounded-circle avatar-xl img-thumbnail user-profile-image" alt="user-profile-image"></img>');
        }
        reader.readAsDataURL(input.files[0]);
    }
}


$(document).on('change','#usu_img',function(){
    filePreview(this);
});



/* TODO:Imagen Por defecto cuando no seleciones una imagen para el producto */
$(document).on("click","#btnremovephoto",function(){
    $('#usu_img').val('');
    $('#pre_imagen').html('<img src="../../assets/images/users/not_photo.jpg" class="rounded-circle avatar-xl img-thumbnail user-profile-image" alt="user-profile-image"></img><input type="hidden" name="hidden_usuario_imagen" value="" />');
});



init();