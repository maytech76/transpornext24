<div id="Modalcliente" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
<div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="lbltitulo"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
            </div>
            <!-- TODO: Formulario de Mantenimiento -->
            <form method="post" id="form_client">
                <div class="modal-body">
                    <input type="hidden" name="cli_id" id="cli_id"/>

                    <!-- TODO:Nombre de Usuario -->
                    <div class="row gy-2 mb-3">
                        <div class="col-md-6">
                            <div>
                                <label for="cli_nombre" class="form-label fw-bold">Nombre:</label>
                                <input type="text" class="form-control" id="cli_nombre" name="cli_nombre" required/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div>
                                <label for="cli_rut" class="form-label fw-bold">Rut:</label>
                                <input type="text" class="form-control" id="cli_rut" name="cli_rut" required/>
                            </div>
                        </div>
                    </div>


                    <!-- TODO:DNI del Usuario -->
                    <div class="row gy-2 mb-3">
                        <div class="col-md-6">
                            <div>
                                <label for="cli_correo" class="form-label fw-bold">Correo:</label>
                                <input type="text" class="form-control" id="cli_correo" name="cli_correo" required/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div>
                                <label for="cli_telefono" class="form-label fw-bold">Telefono:</label>
                                <input type="text" class="form-control" id="cli_telefono" name="cli_telefono" required/>
                            </div>
                        </div>
                    </div>

                    <!-- TODO:Telefono del Usuario -->
                    <div class="row gy-2 mb-3">
                        <div class="col-md-6">
                            <label for="tpc_id" class="form-label fw-bold">Perfil de Cliente:</label>
                             <select type="text" class="form-control form-select" name="tpc_id" id="tpc_id" aria-label="Seleccionar">
                            </select>
                        </div>
                        <div class="col-md-6">
                            <div>
                                <label for="precio" class="form-label fw-bold">Precio:</label>
                                <input type="text" class="form-control" id="precio" name="precio" required/>
                            </div>
                        </div>
                    </div>

                    <!-- TODO:Coordinador -->
                     <div class="row gy-2 mb-3">
                         <div class="col-md-12">
                            <div>
                                <label for="cli_coordinador" class="form-label fw-bold">Coordinador:</label>
                                <input type="text" class="form-control" id="cli_coordinador" name="cli_coordinador" required/>
                            </div>
                        </div>                        
                    </div> 

                    <!-- TODO:Direccion del Cliente -->
                     <div class="row gy-2 mb-3">
                         <div class="col-md-12">
                            <div>
                                <label for="cli_direccion" class="form-label fw-bold">Dirección:</label>
                                <input type="text" class="form-control" id="cli_direccion" name="cli_direccion" required/>
                            </div>
                        </div>                        
                    </div> 

                    <!-- TODO:Foto del Usuario -->
                     <div class="row gy-2">
                        <div class="col-md-12">
                            <div>
                                <label for="cli_img" class="form-label fw-bold">Logo-Imagen:</label>
                                <input type="file" class="form-control" id="cli_img" name="cli_img"/>
                            </div>
                        </div>
                    </div> 

                    <br>

                    <!-- TODO:Remover Foto Previa -->
                    <div class="row gy-2">
                        <div class="col-md-12">
                            <div class="text-center">
                            <a id="btnremovephoto" class="btn btn-danger btn-icon waves-effect waves-light btn-sm"><i class="ri-delete-bin-5-line"></i></a>
                                <div class="profile-user position-relative d-inline-block mx-auto  mb-4">
                                    <span id="pre_imagen" name="pre_imagen"></span>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-light" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" name="action" value="add" class="btn btn-primary ">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>