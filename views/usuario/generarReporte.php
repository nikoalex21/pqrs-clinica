<?php
include("../../template/templateUsuario.php");
include("../../conexion.php");
include("../../Model/Pqrs_pqr_model.php");

$pqrs_pqr_model = new Pqrs_pqr_model($miconexion);

$resultado1 = $pqrs_pqr_model->getPriorizacion();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $startDate = $_REQUEST['startDate'];
    $endDate = $_REQUEST['endDate'];
    $resultado1 = $pqrs_pqr_model->obtenerDatosParaInforme($startDate, $endDate);
}
?>

<style>
    .btn-iniciar-sesion:hover {
        color: #ff4500;
    }
</style>

<div class="container mt-1 custom-container text-center" style="background-color: #f0f0f0; padding: 15px; border: 1px solid #ccc; border-radius: 5px; width: 50%; margin: 0 auto;">
    <h1 style="color: #333; font-size: 24px; margin-bottom: 20px;">Reportes - Descargar reporte</h1>
    <form class="needs-validation" action="generarexcel.php" method="post" enctype="multipart/form-data" novalidate>
        <div class="form-row">
            <div class="col-md-5 mx-auto">
                <label for="startDate">Fecha de Inicio:</label>
                <input type="date" class="form-control mt-2" id="startDate" name="startDate">
            </div>
            <div class="col-md-5 mx-auto">
                <label for="endDate">Fecha de Fin:</label>
                <input type="date" class="form-control mt-2" id="endDate" name="endDate">
            </div>
        </div>
        <button type="submit" class="btn btn-iniciar-sesion mt-3">Excel</button>
    </form>
</div>



<?php include("../../template/templateFooter.php"); ?>
