
var tabla;

function init(){

    $("#form_client").on("submit",function(e){
        guardaryeditar(e);
    });
 } 
 
 
 /* TODO:validando inputs del modal */
 
   
 
 
/* TODO:FUNCION EDITAR - REGISTRAR */
function guardaryeditar(e){
    e.preventDefault();
    var formData = new FormData($("#form_client")[0]);
            console.log(formData);
    
        /* TODO: Guardar Informacion */
        $.ajax({
            url:"../../controller/cliente.php?op=guardaryeditar",
            type:"POST",
            data:formData,
            contentType:false,
            processData:false,
            success:function(data){
                $('#cliente_data').DataTable().ajax.reload();
                $('#Modalcliente').modal('hide'); 
            
    
                /* TODO: Mensaje Registro de cliente Confirmado*/
                swal.fire({
                    title:'Cliente',
                    text: 'Registro Confirmado',
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 1500
                }); 
    
            } 
        });
    
}




$(document).ready(function(){

    /* Mantenemos activo la consulta a tipo de cliente */
     /* TODO:Valores para el Select Cactegoria */
     $.post("../../controller/tpcliente.php?op=combo",function(data){
        $("#tpc_id").html(data);
        console.log(data);
    });

       
    tabla=$('#cliente_data').dataTable({
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
            url: '../../controller/cliente.php?op=listar',
            type : "post",
            dataType : "json",
            error: function(e){
                 
            }
        },
        "ordering": false,
        "bDestroy": true,
        "responsive": true,
        "bInfo":true,
        "iDisplayLength": 5,
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


/* FUNCION REGISTRO DE NUEVO CLIENTE AL RECIBIR UN CLIC */
$(document).on("click","#btnNuevo",function(){
    /* TODO: Limpiar informacion */
     $('#tpc_id').val('');
     $('#cli_telefono').val('');
     $('#cli_correo').val('');
     $('#cli_nombre').val('');
     $('#cli_rut').val('');
     $('#cli_coordinador').val('');
     $('#precio').val('');
     $('#cli_direccion').val('');
    /*  $('#cli_img').val(''); */
    $('#lbltitulo').html('Nuevo-Registro');
    $('#pre_imagen').html('<img src="../../assets/images/clients/not_photo.jpg" class="rounded-circle avatar-xl img-thumbnail user-profile-image" alt="user-profile-image"></img><input type="hidden" name="hidden_cliente_imagen" value="" />');
    $("#form_client")[0].reset();
    /* TODO: Mostrar Modal */
    $('#Modalcliente').modal('show');
 });



/* FUNCION PARA MOSTRAR DATOS DEL REGISTRO SELECIONADO EN EL FORMULARIO SEGUN ID */
function editar(cli_id){
    $.post("../../controller/cliente.php?op=mostrar",{cli_id:cli_id},function(data){
        data=JSON.parse(data);
        $('#cli_id').val(data.cli_id);
        $('#cli_rut').val(data.cli_rut);
        $('#cli_nombre').val(data.cli_nombre);
        $('#tpc_id').val(data.tpc_id).trigger('change');
        $('#cli_direccion').val(data.cli_direccion);
        $('#cli_coordinador').val(data.cli_coordinador);
        $('#precio').val(data.precio);
        $('#cli_telefono').val(data.cli_telefono);
        $('#cli_correo').val(data.cli_correo);
        $('#cli_img').val('');   /* Mostrar Vacio el valor del campo cli_img al ejecutar el metodo mostrar (editar) */
        $('#pre_imagen').html(data.cli_img);
       
 
     });
     $('#lbltitulo').html('Editar Registro');
     /* TODO: Mostrar Modal */
     $('#Modalcliente').modal('show')
 }


/* TODO:FUNCION ELIMINAR DE LISTA A CLIENTE  SEGUN CLI_ID */
function eliminar(cli_id){
    swal.fire({
        title:"Eliminar!",
        text:"Seguro de Eliminar el Registro?",
        icon: "warning",
        confirmButtonText : "Si",
        showCancelButton : true,
        cancelButtonText: "No",
    }).then((result)=>{
        if (result.value){
            $.post("../../controller/cliente.php?op=eliminar",{cli_id:cli_id},function(data){
               
            });
 
            $('#cliente_data').DataTable().ajax.reload();
 
            swal.fire({
                title:'Cliente',
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


$(document).on('change','#cli_img',function(){
    filePreview(this);
});



/* TODO:Imagen Por defecto cuando no seleciones una imagen para el producto */
$(document).on("click","#btnremovephoto",function(){
    $('#cli_img').val('');
    $('#pre_imagen').html('<img src="../../assets/images/clients/not_photo.jpg" class="rounded-circle avatar-xl img-thumbnail user-profile-image" alt="user-profile-image"></img><input type="hidden" name="hidden_cliente_imagen" value="" />');
});



init();