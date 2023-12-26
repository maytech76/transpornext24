<div id="Modalusuario" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
<div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="lbltitulo"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
            </div>
            <!-- TODO: Formulario de Mantenimiento -->
            <form method="post" id="form_user">
                <div class="modal-body">
                    <input type="hidden" name="usu_id" id="usu_id"/>

                    <!-- TODO:Nombre de Usuario -->
                    <div class="row gy-2 mb-3">
                        <div class="col-md-6">
                            <div>
                                <label for="usu_nombre" class="form-label fw-bold">Nombre</label>
                                <input type="text" class="form-control" id="usu_nombre" name="usu_nombre" required/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div>
                                <label for="usu_apellido" class="form-label fw-bold">Apellido</label>
                                <input type="text" class="form-control" id="usu_apellido" name="usu_apellido" required/>
                            </div>
                        </div>
                    </div>


                    <!-- TODO:DNI del Usuario -->
                    <div class="row gy-2 mb-3">
                        <div class="col-md-6">
                            <div>
                                <label for="usu_correo" class="form-label fw-bold">Correo</label>
                                <input type="text" class="form-control" id="usu_correo" name="usu_correo" required/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div>
                                <label for="usu_telefono" class="form-label fw-bold">Telefono</label>
                                <input type="text" class="form-control" id="usu_telefono" name="usu_telefono" required/>
                            </div>
                        </div>
                    </div>

                    <!-- TODO:Telefono del Usuario -->
                    <div class="row gy-2 mb-3">
                        <div class="col-md-6">
                            <label for="tipo_id" class="form-label fw-bold">Tipo de Usuario</label>
                             <select type="text" class="form-control form-select" name="tipo_id" id="tipo_id" aria-label="Seleccionar">
                            </select>
                        </div>
                        <div class="col-md-6">
                            <div>
                                <label for="usu_contacto" class="form-label fw-bold">Contacto</label>
                                <input type="text" class="form-control" id="usu_contacto" name="usu_contacto" required/>
                            </div>
                        </div>
                    </div>

                    <!-- TODO:Email del Usuario -->
                    <div class="row gy-2 mb-3">
                         <div class="col-md-6">
                            <div>
                                <label for="cont_telefono" class="form-label fw-bold">Cel de Contacto</label>
                                <input type="text" class="form-control" id="cont_telefono" name="cont_telefono" required/>
                            </div>
                        </div> 
                        <div class="col-md-6">
                            <div>
                                <label for="usu_pass" class="form-label fw-bold">Contraseña</label>
                                <input type="password" class="form-control" id="usu_pass" name="usu_pass" required/>
                            </div>
                        </div>
                    </div>

                    <!-- TODO:Foto del Usuario -->
                     <div class="row gy-2">
                        <div class="col-md-12">
                            <div>
                                <label for="usu_img" class="form-label fw-bold">Foto-Imagen</label>
                                <input type="file" class="form-control" id="usu_img" name="usu_img"/>
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