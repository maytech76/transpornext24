<div id="Modaltpcliente" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
<div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="lbltitulo"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
            </div>
            <!-- TODO: Formulario de Mantenimiento -->
            <form method="post" id="form_tipoc">
                <div class="modal-body">
                    <input type="hidden" name="tpc_id" id="tpc_id"/>

                    <!-- TODO:Nombre de TpCliente -->
                    <div class="row gy-2 mb-3">
                        <div class="col-md-6">
                            <div>
                                <label for="tpc_nombre" class="form-label fw-bold">Nombre</label>
                                <input type="text" class="form-control" id="tpc_nombre" name="tpc_nombre" required/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div>
                                <label for="valor" class="form-label fw-bold">Valor a pagar</label>
                                <input type="number" class="form-control" id="valor" name="valor" required/>
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