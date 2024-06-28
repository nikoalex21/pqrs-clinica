<?php
include("../../template/templateUsuario.php");
include("../../conexion.php");
include("../../Model/Pqrs_pqr_model.php");

$pqrs_pqr_model = new Pqrs_pqr_model($miconexion);

if (isset($_REQUEST['id'])) {
    $id = $_REQUEST['id'];
    $resultado = $pqrs_pqr_model->getListaPqrs_personaId($id); 
}

$pqrs_pqr_model = new Pqrs_pqr_model($miconexion);
$resultadoDe = $pqrs_pqr_model->getListaPqrs_detalle_causa();
$resultadoPe = $pqrs_pqr_model->getListaPqrs_persona();
$resultadoAr = $pqrs_pqr_model->getListaPqrs_area();
 

?>


<div class="containereditarpqrs">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="../../Controler/Pqrs_pqr_controler.php" method="post" enctype="multipart/form-data" id="formulariopqrs">
                <fieldset>
                    <br>
                    <h2>Datos del Usuario</h2>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                            <input type="hidden" name="tarea" value="create_pqrs_pqr">
                                <br> Tipo pqrs
                                <div class="custom-input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                                    </div>
                                    <input type="text" disabled value="<?php echo $resultado['tipoPqr']; ?>" class="form-control" name="tipoPqr" id="tipoPqr">
                                </div>
                            </div>
                        </div>


                        <div class="col-md-4">
                            <div class="form-group">
                                <br>Nombre
                                <div class="custom-input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    </div>
                                    <input type="text" disabled value="<?php echo $resultado['nombre']; ?>" class="form-control" name="nombre" id="nombre">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <br>Tipo identificacion
                                <div class="custom-input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-pager"></i></span>
                                    </div>
                                    <input type="text" disabled value="<?php echo $resultado['tipoIdentificacion']; ?>" class="form-control" name="tipoIdentificacion" id="tipoIdentificacion">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <br>identificacion
                                <div class="custom-input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-money-check"></i></span>
                                    </div>
                                    <input type="text" disabled value="<?php echo $resultado['identificacion']; ?>" class="form-control" name="identificacion" id="identificacion">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <br>direccion
                                <div class="custom-input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                                    </div>
                                    <input type="text" disabled value="<?php echo $resultado['direccion']; ?>" class="form-control" name="direccion" id="direccion" placeholder="Escribe tu dirección" required>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <br>Programa
                                <div class="custom-input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-gopuram"></i></span>
                                    </div>
                                    <input type="text" disabled value="<?php echo $resultado['programa']; ?>" class="form-control" name="programa" id="programa">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <br>Telefono
                                <div class="custom-input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-phone-alt"></i></span>
                                    </div>
                                    <input type="tel" disabled value="<?php echo $resultado['telefono']; ?>" class="form-control" name="telefono" id="telefono">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <br>Correo electronico
                                <div class="custom-input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                    </div>
                                    <input type="email" disabled value="<?php echo $resultado['correo']; ?>" class="form-control" name="correo" id="correo">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <br>descripcion
                                <div class="custom-input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-poll-h"></i></span>
                                    </div>
                                    <textarea disabled class="form-control" name="descripcion" rows="1" id="descripcion"><?php echo $resultado['descripcion']; ?></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <br>Documento
                                <div class="custom-input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-file-pdf"></i></span>
                                    </div>
                                    <div class="form-group">
                                        <a target="_blanck" href="../../documentos/<?php echo $resultado['documento']; ?>"> <?php echo $resultado['documento']; ?> </a>
                                    </div>
                                </div>
                            </div>
                        </div>                     

                        <hr>

                        <h2>Datos complementarios</h2>

                        <br>

                        <div class="col-md-4">
                            <div class="form-group">
                                <br> Detalle causal
                                <div class="custom-input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                                    </div>
                                    <label for="detalleCausal"></label>
                                    <select class="form-control" name="idDetalleCausal" id="detalleCausal">
                                        <option selected>Selecciona detalle causal</option>
                                        <?php   foreach ($resultadoDe as $key => $registro) { ?>
                                            <option value="<?php echo $registro->getIdDetalle() ?>" id='<?php echo $registro->getIdDetalle() ?>'> <?php echo $registro->getNombre_detalle_causa() ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <br>Macro proceso o ámbito
                                <div class="custom-input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
                                    </div>
                                    <label for="macroProceso"></label>
                                    <select type="text"  class="form-control" name="macroProceso" id="macroProceso">
                                        <option selected>...</option>
                                        <?php   foreach ($resultadoDe as $registro) { ?>
                                            <option value="<?php echo $registro->getMacroproceso_ambito() ?>"><?php echo $registro->getMacroproceso_ambito() ?></option>
                                        <?php }  ?>
                                    </select>   
                                    
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <br> Prestacion de servicio
                                <div class="custom-input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
                                    </div>
                                    <label for="procesoPrestacion"></label>
                                    <select type="text"  class="form-control" name="procesoPrestacion" id="procesoPrestacion">
                                        <option selected>...</option>
                                        <?php   foreach ($resultadoDe as $registro) { ?>
                                            <option value="<?php echo $registro->getProceso_prestacion() ?>"><?php echo $registro->getProceso_prestacion() ?></option>
                                        <?php }  ?>
                                    </select>   
                                    
                                </div>
                            </div>
                        </div>


                        <div class="col-md-4">
                            <div class="form-group">
                                <br> Motivos de solicitud
                                <div class="custom-input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
                                    </div>
                                    <label for="movitosSolicitud"></label>
                                    <select type="text"  class="form-control" name="movitosSolicitud" id="movitosSolicitud">
                                        <option selected>...</option>
                                        <?php   foreach ($resultadoDe as $registro) { ?>
                                            <option value="<?php echo $registro->getMotivos_solicitud() ?>"><?php echo $registro->getMotivos_solicitud() ?></option>
                                        <?php }  ?>
                                    </select>   
                                    
                                </div>
                            </div>
                        </div>


                        <div class="col-md-4">
                            <div class="form-group">
                                <br> Priorización
                                <div class="custom-input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
                                    </div>
                                    <label for="priorizacion"></label>
                                    <select type="text"  class="form-control" name="priorizacion" id="priorizacion">
                                        <option selected>...</option>
                                        <?php   foreach ($resultadoDe as $registro) { ?>
                                            <option value="<?php echo $registro->getPriorizacion() ?>"><?php echo $registro->getPriorizacion() ?></option>
                                        <?php }  ?>
                                    </select>   
                                    
                                </div>
                            </div>
                        </div>


                        <div class="col-md-4">
                            <div class="form-group">
                                <br> Tiempo maximo respuesta
                                <div class="custom-input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
                                    </div>
                                    <label for="tiempoRespuesta"></label>
                                    <select type="text"  class="form-control" name="tiempoRespuesta" id="tiempoRespuesta">
                                        <option selected>...</option>
                                        <?php   foreach ($resultadoDe as $registro) { ?>
                                            <option value="<?php echo $registro->getTiempo_maximo_respuesta() ?>"><?php echo $registro->getTiempo_maximo_respuesta() ?></option>
                                        <?php }  ?>
                                    </select>   
                                    
                                </div>
                            </div>
                        </div>


                        <div class="col-md-4">
                            <div class="form-group">
                                <br> Atributo de calidad afectado
                                <div class="custom-input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
                                    </div>
                                    <label for="atributoCalidad"></label>
                                    <select type="text"  class="form-control" name="atributoCalidad" id="atributoCalidad">
                                        <option selected>...</option>
                                        <?php   foreach ($resultadoDe as $registro) { ?>
                                            <option value="<?php echo $registro->getAtributo_calidad_afectado() ?>"><?php echo $registro->getAtributo_calidad_afectado() ?></option>
                                        <?php }  ?>
                                    </select>   
                                    
                                </div>
                            </div>
                        </div>




                        <div class="col-md-4">
                            <div class="form-group">
                                <br>Editar descripcion
                                <div class="custom-input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-poll-h"></i></span>
                                    </div>
                                    <textarea  class="form-control" name="descripcionEdit" rows="1" id="descripcionEdit"><?php echo $resultado['descripcion']; ?></textarea>
                                    <button type="button" class="fas fa-edit" data-bs-toggle="modal" data-bs-target="#editarDescripcion"></button>
                                </div>
                            </div>
                        </div>



                        <div class="col-md-4"  style="display: none;">
                            <div class="form-group">
                                <br> idPersona
                                <div class="custom-input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-poll-h"></i></span>
                                    </div>
                                    <textarea class="form-control" name="idPersona" rows="1" id="idPersona"><?php echo $id; ?></textarea>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-4">
                            <div class="form-group">
                                <br>Documento
                                <div class="custom-input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-file-pdf"></i></span>
                                    </div>
                                    <label for="documentoRespuesta" class="form-label font-weight-bold"></label>
                                    <input type="file" class="form-control-file" name="documentoRespuesta" id="documentoRespuesta">
                                </div>
                            </div>
                        </div>  
                        
                        <div class="col-md-4">
                            <div class="form-group">
                                <br>Seleccione area a enviar
                                <div class="custom-input-group">
                                <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-arrow-alt-circle-down"></i></span>
                                    </div>
                                    <select class="form-control" name="idArea" id="idArea">
                                    <option selected></option>
                                        <?php foreach ($resultadoAr as $registro) { ?>
                                            <option value="<?php echo $registro->getIdAreas() ?>">  <?php echo $registro->getNombre() ?></option>
                                        <?php } ?>
                                    </select>
                                 </div> 
                            </div>
                        </div> 

                        

                    </div>
                    <br>
                    <input class="btn btn-success" type="submit" value="guardar">
                </fieldset>
            </form>
        </div>
    </div>


<div class="modal fade" id="editarDescripcion" tabindex="-1" role="dialog" aria-labelledby="editarDescripcion" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editarDescripcionTitle">Editar descripción</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <textarea class="form-control" rows="4" id="rdescripcionEdit"></textarea>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="guardarDescripcion">Guardar</button>
            </div>
        </div>
    </div>
</div>


</div><br>

<?php include("../../template/templateFooter.php"); ?>
<script>
    const select = document.getElementById('detalleCausal');
    const obtenerDato = () => {
        const opcionSeleccionada = select.value;
        fetch(`../../Controler/Pqrs_pqr_controler.php?tarea=obtenerDetalleCausal&id=${opcionSeleccionada}`)
            .then(response => response.json())
            .then(data => { 
                console.log(data.macroproceso_ambito);
                document.getElementById('macroProceso').value = data.macroproceso_ambito;
                document.getElementById('procesoPrestacion').value = data.proceso_prestacion;
                document.getElementById('movitosSolicitud').value = data.motivos_solicitud;
                document.getElementById('priorizacion').value = data.priorizacion;
                document.getElementById('tiempoRespuesta').value = data.tiempo_maximo_respuesta;
                document.getElementById('atributoCalidad').value = data.atributo_calidad_afectado;
                

            });
    }
    select.addEventListener('change', obtenerDato);
</script>

<script>


    $('#editarDescripcion').on('show.bs.modal', function (event) {
        var respuestaOriginall = $('#descripcionEdit').val();
        $('#rdescripcionEdit').val(respuestaOriginall);
    });
    
    $('#guardarDescripcion').click(function () {
        var respuestaEditada = $('#rdescripcionEdit').val();
        $('#descripcionEdit').val(respuestaEditada);
        $('#editarDescripcion').modal('hide');
    });
   
   
    




</script>



