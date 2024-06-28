<?php
include("../../template/templateUsuario.php");
include("../../conexion.php");
include("../../Model/Pqrs_pqr_model.php");

$pqrs_pqr_model = new Pqrs_pqr_model($miconexion);

if (isset($_REQUEST['id'])) {
    $id = $_REQUEST['id'];
    $datos = $pqrs_pqr_model->retornaDatos($id);

    $resultado = $pqrs_pqr_model->getListaPqrs_personaId($id);
    $resultado2 = $pqrs_pqr_model->getRegistro($id);
    $idPqr=$resultado2['idPqr'];
    $idPersona=$resultado2['idPersona'];
    
    //var_dump( $resultado2);

}

$resultado1 = $pqrs_pqr_model->getPriorizacion();
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
                <input type="hidden" name="tarea" value="update_pqrs_pqr">
                <div class="row">

              
                <div class="col-md-4"  style="display: none;">
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

                <div class="col-md-4"  style="display: none;">
                    <div class="form-group">
                        <br> idPersona
                        <div class="custom-input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-poll-h"></i></span>
                            </div>
                            <textarea class="form-control" name="idPersona" rows="1" id="idPersona"><?php echo $idPersona; ?></textarea>
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
              

                        <div class="col-md-12 mt-3">
                            <div class="form-group">
                                <label>Cargar Documentos</label>
                                <div class="custom-input-group" style="display: flex; align-items: center;">
                                    <div class="input-group-prepend" style="margin-right: 10px;">
                                        <span class="input-group-text"><i class="fas fa-upload"></i></span>
                                    </div>
                                    <input type="file" class="form-control-file" name="documentoRespuesta" id="documentoRespuesta">
                                    <small id="fileHelpId" class="form-text text-muted">Sube tu archivo CV.</small>
                                </div>
                            </div>
                        </div>

                        <input type="hidden" name="fechaEnvioDoc" id="fechaEnvioDoc" value="<?php echo date("Y-m-d"); ?>">


               

                    <div class="col-md-6 mt-3">
                        <button class="btn btn-success" type="submit" >Aceptar</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<?php include("../../template/templateFooter.php"); ?>
