<?php
include("../../template/templatepersona.php");
include("../../conexion.php");
include("../../Model/Pqrs_pqr_model.php");

$pqrs_pqr_model = new Pqrs_pqr_model($miconexion);

if (isset($_REQUEST['radicado'])) {
    $radicado = $_REQUEST['radicado'];
    $resultado = $pqrs_pqr_model->obtenerDatosUsuario($radicado);

    $documento=$pqrs_pqr_model->documentoRespuesta($radicado);


    
}
$resultado1 = $pqrs_pqr_model->getPriorizacion();

?>

<div class="containereditarpqrs">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <fieldset>
                    <br>
                    <h3 class="tituloUsuario">Datos del Usuario</h3>
            <div class="row">

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

        
                    <div class="d-flex justify-content-center" >
                        <div class="col-md-4">
                                <div class="form-group">
                                    <br>Documento
                                    <div class="custom-input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-file-pdf"></i></span>
                                        </div>
                                        <div class="form-group">
                                            <a target="_blanck" href="../../documentos/<?php echo $documento['documentoRespuesta']; ?>"><?php echo $documento['documentoRespuesta']; ?></a>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                    </div> 
            </div>
        </div>             
    </div>
</div>


<?php include("../../template/templateFooter.php"); ?>
