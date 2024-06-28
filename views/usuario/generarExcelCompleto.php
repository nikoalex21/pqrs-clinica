<?php
include("../../conexion.php");
include("../../Model/Pqrs_pqr_model.php");

$pqrs_pqr_model = new Pqrs_pqr_model($miconexion);

$resultado1 = $pqrs_pqr_model->getPriorizacion();

$ext = "xls";
$nomb = date('Y-m-d-H-i-s');

header("Content-Type: application/text");
header("Content-Disposition: attachment; filename={$nomb}.{$ext}");
header("Pragma: no-cache");
header("Content-Type: application/vnd.ms-excel; charset=UTF-8");
header("Expires: 0");

?>

<!DOCTYPE html>
<html>
    <head>
        <style type="text/css">
            table {
                border-collapse: collapse;
                width: 100%;
            }
            
            th, td {
                text-align: center;
                border: 1px solid #000;
                padding: 8px;
            }
</style>
</head>
<body>
    
    <table id="pqrsPersona" class="display">
        <thead>
            <tr>
            <th>REGIONAL</th>
            <th>MUNICIPIO</th>
            <th>PRESTADOR DE SALUD</th>
            <th>CONSECUTIVO (# de Radicado)</th>
            <th>RECEPTOR</th>
            <th>FECHA RADICADO</th>
            <th>FECHA DE RESPUESTA</th>
            <th>TIPO DE IDENTIFICACION</th>
            <th># DE IDENTIFICACION</th>
            <th>NOMBRE DEL USUARIO</th>
            <th>DIRECCION</th>
            <th>TELEFONO</th>
            <th>MACROPROCESO O AMBITO</th>
            <th>PROCESO DE PRESTACION DE SERVICIO</th>
            <th>MOTIVOS GENERALES DE SOLICITUD</th>
            <th>DETALLE CAUSAL</th>
            <th>TIPO DE REQUERIMIENTO</th>
            <th>PRIORIZACION</th>
            <th>TIEMPO MAXIMO DE RESPUESTA</th>
            <th>DESCRIPCION DE LA PQRS (RESUMEN CAUSA SOLICITUD)</th>
            <th>ACCION DEL OPERADOR (RESUMEN RESPUESTA DEL OPERADOR)</th>
            <th>NUMERO DE RADICACION DE LA RESPUESTA</th>
            <th>ATRIBUTO DE LA CALIDAD AFECTADO</th>
        </tr>
    </thead>
    <tbody>
        <?php 

foreach ($resultado1 as  $registro1) { 

    ?>
    
    <tr>
        <td><?php echo "Region_3" ?></td>
        <td><?php echo "Super salud" ?></td>
        <td><?php echo "Super salud" ?></td>
        <td style="mso-number-format:\@;"><?= $registro1->radicado ?></td>
        <td><?php echo "respues" ?></td>
        <td><?= $registro1->fechaRadicado ?></td>
        <td><?= $registro1->fechaRespuesta  ?></td>
        <td><?= $registro1->tipoIdentificacion?></td>
        <td><?= $registro1->identificacion?></td>
        <td><?= $registro1->nombre?></td>
        <td><?= $registro1->direccion?></td>
        <td><?= $registro1->telefono ?></td>
        <td><?= utf8_encode($registro1->macroproceso_ambito) ?></td>
        <td><?= $registro1->proceso_prestacion ?></td>
        <td><?= $registro1->motivos_solicitud?></td>
        <td><?= $registro1->nombre_detalle_causa ?></td>
        <td><?= $registro1->tipoPqr?></td>
        <td><?= $registro1->priorizacion ?></td>
        <td><?= $registro1->tiempo_maximo_respuesta?></td>
        <td><?= $registro1->descripcionEdit ?></td>
        <td><?= $registro1->respuestasPqr ?></td>
        <td><?php echo "radicado respuesta" ?></td>
        <td><?= $registro1->atributo_calidad_afectado ?></td>
    </tr>
<?php } ?>
    </tbody>
</table>

</body>
</html>


