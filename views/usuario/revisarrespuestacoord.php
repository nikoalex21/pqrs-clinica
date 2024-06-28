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


    $resultado1 = $pqrs_pqr_model->getRegistro3($id);
    $idCoordinador=$resultado1['idCoordinadores'];
    $idRespuesta = $resultado1['idRespuesta'];
   var_dump($resultado1);
   echo"---------------";
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
                <h1 class="card-title">Respuesta coordinador</h1>
                <input type="hidden" name="tarea" value="update_pqrs_respuesta">
                <div class="row">
                    <div class="col-md-12 mt-3">
                        <div class="form-group">
                            <label for="descripcionEdit">Solicitud del usuario</label>
                            <div class="custom-input-group" style="display: flex; align-items: center;">
                                <div class="input-group-prepend" style="margin-right: 10px;">
                                    <span class="input-group-text"><i class="fas fa-money-check"></i></span>
                                </div>
                                <textarea style="height: 5em; overflow-y: auto;" disabled class="form-control" name="descripcionEdit" id="descripcionEdit"><?php echo $resultado2['descripcionEdit']; ?></textarea>
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


                    <div class="col-md-12 mt-3">
                        <div class="form-group">
                            <label>Respuesta del coordinador</label>
                            <div class="custom-input-group" style="display: flex; align-items: center;">
                                <div class="input-group-prepend" style="margin-right: 10px;">
                                    <span class="input-group-text"><i class="fas fa-poll-h"></i></span>
                                </div>
                                <textarea style="height: 5em; overflow-y: auto;" disabled class="form-control" name="respuestasPqr" id="respuestasPqr"><?= $resultado1['respuestasPqr']; ?></textarea>
                            </div>
                        </div>
                    </div>

                    <input type="hidden" name="respuestasPqr" value="<?= htmlspecialchars($resultado1['respuestasPqr']); ?>">
                    

                    <div class="col-md-6 mt-3">
                        <button class="btn btn-success" type="submit"  id="estado" name="estado" value="aceptado">Aceptar</button>
                    </div>

                    <div class="col-md-6 mt-3">
                        <button class="btn btn-danger" type="submit" id="estado" name="estado" value="rechazado">Rechazar</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>







<?php include("../../template/templateFooter.php"); ?>