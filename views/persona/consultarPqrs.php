<?php
include("../../template/templatepersona.php");
include("../../conexion.php");
include('../../Model/Pqrs_pqr_model.php');

$pqrs_pqr_model = new Pqrs_pqr_model($miconexion);

if (isset($_REQUEST['radicado'])) {
    $radicado = $_REQUEST['radicado'];
    $resultado = $pqrs_pqr_model->obtenerDatosUsuario($radicado);
    $documento=$pqrs_pqr_model->documentoRespuesta($radicado);
   


    if (!empty($documento['documentoRespuesta'])) {
        echo "<script>window.location.href = 'respuesta.php?radicado=" . $radicado . "';</script>";
        exit();
    } else {
        $mensaje = "Aún no tienes respuesta.";
    }
} else {
    $mensaje = "";
}
?>

<link rel="stylesheet" type="text/css" href="../../ccs/styles.css">
<br><br>
<div class="container mt-5 custom-container text-center" style="background-color: #f0f0f0; padding: 50px; border: 1px solid #ccc; border-radius: 10px; width: max; height: 100%; margin: 10 auto;">
    <h1 style="color: #333; font-size: 24px; margin-bottom: 20px;">Consultar solicitud</h1>
    <form class="needs-validation" method="post" enctype="multipart/form-data" novalidate>
        <div class="form-row">
            <div class="col-md-5 mx-auto">
                <div class="search-container">
                    <input type="text" class="search-box" placeholder="Código solicitud" name="radicado">
                    <input type="submit" class="search-button" value="Buscar">
                </div>
            </div>
        </div>
    </form>
</div>
<br><br><br><br><br><br>
<?php include("../../template/templateFooter.php"); ?>


<script>
    $(document).ready(function () {
        <?php if (!empty($mensaje)) { ?>
        $('#noRespuestaModal').modal('show');
        <?php } ?>
    });
</script>



<div class="modal fade" id="noRespuestaModal" tabindex="-1" role="dialog" aria-labelledby="noRespuestaModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="noRespuestaModalLabel">Respuesta</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <h5 class="modal-title" id="noRespuestaModalLabel">Estimado(a),<br><br>
                    Le informamos que aún no hemos dado respuesta a su petición. Le recomendamos estar atento a su correo electrónico o visitar nuestra página web para obtener actualizaciones.
                    <br><br>Agradecemos su paciencia y comprensión.</h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
