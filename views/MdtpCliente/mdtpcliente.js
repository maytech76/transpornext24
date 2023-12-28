
var tabla;

function init(){

    $("#form_tipoc").on("submit",function(e){
        guardaryeditar(e);
    });
 } 
 
 
 /* TODO:validando inputs del modal */
 
   
 
 
/* TODO:FUNCION EDITAR - REGISTRAR */
function guardaryeditar(e){
    e.preventDefault();
    var formData = new FormData($("#form_tipoc")[0]);
            console.log(formData);
    
        /* TODO: Guardar Informacion */
        $.ajax({
            url:"../../controller/tpcliente.php?op=guardaryeditar",
            type:"POST",
            data:formData,
            contentType:false,
            processData:false,
            success:function(data){
                $('#tpcliente_data').DataTable().ajax.reload();
                $('#Modaltpcliente').modal('hide'); 
            
    
                /* TODO: Mensaje Registro de tpcliente Confirmado*/
                swal.fire({
                    title:'Tipo de Cliente',
                    text: 'Registro Confirmado',
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 1500
                }); 
    
            } 
        });
    
}




$(document).ready(function(){

    /* Mantenemos activo la consulta a tipo de tpcliente */
     /* TODO:Valores para el Select Cactegoria */
     $.post("../../controller/tpcliente.php?op=combo",function(data){
        $("#tpc_id").html(data);
        console.log(data);
    });

       
    tabla=$('#tpcliente_data').dataTable({
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
            url: '../../controller/tpcliente.php?op=listar',
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


/* FUNCION REGISTRO DE NUEVO TPCLIENTE AL RECIBIR UN CLIC */
$(document).on("click","#btnNuevo",function(){
    /* TODO: Limpiar informacion */
     $('#tpc_nombre').val('');
     $('#valor').val('');
     $('#tpc_id').val('');
     $('#lbltitulo').html('Nuevo-Registro');
    $('#Modaltpcliente').modal('show');
 });



/* FUNCION PARA MOSTRAR DATOS DEL REGISTRO SELECIONADO EN EL FORMULARIO SEGUN ID */
function editar(tpc_id){
    $.post("../../controller/tpcliente.php?op=mostrar",{tpc_id:tpc_id},function(data){
        data=JSON.parse(data);
        $('#tpc_id').val(data.tpc_id);
        $('#tpc_nombre').val(data.tpc_nombre);
        $('#valor').val(data.valor);
       
       
 
     });
     $('#lbltitulo').html('Editar Registro');
     /* TODO: Mostrar Modal */
     $('#Modaltpcliente').modal('show')
 }



/* TODO:FUNCION ELIMINAR DE LISTA A TPCLIENTE  SEGUN TPC_ID */
function eliminar(tpc_id){
    swal.fire({
        title:"Eliminar!",
        text:"Seguro de Eliminar el Registro?",
        icon: "warning",
        confirmButtonText : "Si",
        showCancelButton : true,
        cancelButtonText: "No",
    }).then((result)=>{
        if (result.value){
            $.post("../../controller/tpcliente.php?op=eliminar",{tpc_id:tpc_id},function(data){
               
            });
 
            $('#tpcliente_data').DataTable().ajax.reload();
 
            swal.fire({
                title:'Tpcliente',
                text: 'Registro Eliminado',
                icon: 'success',
                showConfirmButton: false,
                timer: 1500
            });
        }
    });
 }



init();