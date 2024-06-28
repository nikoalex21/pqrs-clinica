<?php
include("../../template/templateUsuario.php");
include("../../conexion.php");
include("../../Model/Pqrs_pqr_model.php");

$pqrs_pqr_model = new Pqrs_pqr_model($miconexion);


if (isset($_REQUEST['id'])) {
    $id = $_REQUEST['id'];
    $resultado2 = $pqrs_pqr_model->getRegistro($id);
    $resultado = $pqrs_pqr_model->obtenerInformacionParaCoordinador($id); 
    $idPqr = $resultado2['idPqr'];

    $resultado1=$pqrs_pqr_model->getRegistro2($id);
    $idCoordinador=$resultado1['idCoordinadores'];
    $resultado3=$pqrs_pqr_model->getRegistro3($id);
    $idRespuesta=$resultado3['idRespuesta'];
var_dump($idRespuesta);
}


$resultadoDe = $pqrs_pqr_model->getListaPqrs_detalle_causa();
$resultadoPe = $pqrs_pqr_model->getListaPqrs_persona();

?>

<style>
    .my-custom-container {
        background-color: #f2f2f2;
        color: #333; 
        padding: 20px; 
        border-radius: 10px;
    }
</style>

<div class="container mt-5 my-custom-container">
    <form class="needs-validation" action="../../Controler/Pqrs_pqr_controler.php" method="post" enctype="multipart/form-data" novalidate>
       <div class="card">
            <div class="card-body">
                <h1 class="card-title">Actualizar Respuesta</h1>
                <input type="hidden" name="tarea" value="update_pqrs_respuesta">
                    <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="nombre">Nombre</label>
                                    <div class="custom-input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        </div>
                                        <input type="text" disabled value="<?php echo $resultado2['nombre']; ?>" class="form-control" name="nombre" id="nombre">
                                    </div>
                                </div>
                            </div>
                        
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="identificacion">Identificación</label>
                                    <div class="custom-input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-money-check"></i></span>
                                        </div>
                                        <input type="text" disabled value="<?php echo $resultado2['identificacion']; ?>" class="form-control" name="identificacion" id="identificacion">
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

                        <div class="col-md-4" style="display: none;">
                            <div class="form-group">
                                <br> idRespuesta
                                <div class="custom-input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-poll-h"></i></span>
                                    </div>
                                    <textarea class="form-control" name="idRespuesta" rows="1" id="idRespuesta"><?php echo $idRespuesta; ?></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4" style="display: none;">
                            <div class="form-group">
                                <br> idPqr
                                <div class="custom-input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-poll-h"></i></span>
                                    </div>
                                    <textarea class="form-control" name="idPqr" rows="1" id="idPqr"><?php echo $idPqr; ?></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4" style="display: none;">
                            <div class="form-group">
                                <br> idCoordinador
                                <div class="custom-input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-poll-h"></i></span>
                                    </div>
                                    <textarea class="form-control" name="idCoordinador" rows="1" id="idCoordinador"><?php echo $idCoordinador ; ?></textarea>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-12 mt-3">
                            <div class="form-group">
                                <label for="descripcionEdit">Solicitud del usuario</label>
                                <div class="custom-input-group" style="display: flex; align-items: center;">
                                    <div class="input-group-prepend" style="margin-right: 10px;">
                                        <span class="input-group-text"><i class="fas fa-money-check"></i></span>
                                    </div>
                                    <textarea style="height: 5em; overflow-y: auto;"   disabled class="form-control" name="descripcionEdit" id="descripcionEdit"><?php echo $resultado1['descripcionEdit']; ?></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 mt-3">
                            <div class="form-group">
                                <label for="descripcionEdit">Respuesta Anterior</label>
                                <div class="custom-input-group" style="display: flex; align-items: center;">
                                    <div class="input-group-prepend" style="margin-right: 10px;">
                                        <span class="input-group-text"><i class="fas fa-money-check"></i></span>
                                    </div>
                                    <textarea style="height: 5em; overflow-y: auto;"   disabled class="form-control" name="descripcionEdit" id="descripcionEdit"><?php echo $resultado3['respuestasPqr']; ?></textarea>
                                </div>
                            </div>
                        </div>

                        <input type="hidden" name="fechaRespuesta" id="fechaRespuesta" value="<?php echo date("Y-m-d"); ?>">
                        
                        <div class="form-group">
                        <label for="respuestasPqr"><br>Tu respuesta:</label>
                        <textarea class="form-control" id="respuestasPqr" name="respuestasPqr" rows="4" placeholder="Escribe tu respuesta aquí" required></textarea><br>
                        </div>
                       <input class="btn btn-iniciar-sesion" type="submit" value="enviar" >
                </div>
            </div>
        </div>
    </form>       
</div>
    




<?php include("../../template/templateFooter.php"); ?>