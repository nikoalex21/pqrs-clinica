<?php
session_start();
include("../../template/templateUsuario.php");
include("../../conexion.php");
include("../../Model/Pqrs_pqr_model.php");

$pqrs_pqr_model = new Pqrs_pqr_model($miconexion);

if (isset($_SESSION['idUsuario'])) {
    $idUsuario = $_SESSION['idUsuario'];
    $resultado = $pqrs_pqr_model->obtenerInformacionParaCoordinador($idUsuario); 
    //$nombreCoordinador= $pqrs_pqr_model->nombreCoordinador();
    $nombre = reset($resultado);

    
}

?>


<div class="containertabla">
    <legend class="text-center">COORDINADOR <?php echo strtoupper($nombre["nombreUsuario"]); ?> AREA <?php echo strtoupper($nombre["nombreArea"]); ?> 
</legend>
    <div class="m-2">
        <div class="col-md-12">
            <div class="table-responsive">
                <div class="form-group">
                    <div class="form-group d-flex justify-content-center mt-3">
                        <label for="filtroEstado">Estado de las solicitudes</label>
                    </div>
                </div>
                <table id="pqrsPersona" class="display">
                    <thead>
                        <tr>
                            <th>Macroproceso</th>
                            <th>Prestación de servicio</th>
                            <th>Motivos de solicitud</th>
                            <th>Tiempo maximo de respuesta</th>
                            <th>Priorización</th>
                            <th>Atributo afectado</th>
                            <th>Solicitud del usuario</th>
                            <th>Respuesta Coordinador</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                
                    <tbody>
                        <?php 
                            foreach ($resultado as $fila) { ?>
                                <tr>
                                    <td><?php echo $fila['macroproceso_ambito'];?></td>
                                    <td><?php echo $fila['proceso_prestacion']; ?></td>
                                    <td><?php echo $fila['motivos_solicitud']; ?></td>
                                    <td><?php echo $fila['priorizacion']; ?></td>
                                    <td><?php echo $fila['tiempo_maximo_respuesta']; ?></td>
                                    <td><?php echo $fila['atributo_calidad_afectado']; ?></td> 
                                    <td>
                                    <?php
                                        $descripcion = $fila['descripcionEdit'];
                                        $maxCaracteres = 20;
                                        if (strlen($fila['descripcionEdit']) > $maxCaracteres) {
                                            $descripcionRecortada = substr($fila['descripcionEdit'], 0, $maxCaracteres) . '...';
                                            echo $descripcionRecortada;
                                        } else {
                                            echo $fila['descripcionEdit'];
                                        }
                                        ?>
                                        <?php if (strlen($fila['descripcionEdit']) > $maxCaracteres) { ?>
                                            <span class="ver-mas" onclick="mostrarDescripcionCompleta('<?= $fila['descripcionEdit'] ?>')">Ver más</span>
                                        <?php } ?>
                                    </td> 
                                    <td><?php echo $fila['respuestasPqr']; ?></td>
                                    <td>
                                        <?php if (empty($fila['respuestasPqr'])) { ?>
                                            <a href="repuestaPqr.php?id=<?= $fila['idPersonas'] ?>" class="fas fa-reply-all" title="Responder Pqrs"></a>
                                        <?php } else {
                                            if ($fila['estado'] == 'rechazado') { ?>
                                                <i class="fa fa-times" style="color: #cc1919;"></i>
                                                <a href="respuestaActualizadaCoor.php?id=<?= $fila['idPersonas'] ?>" class="fas fa-reply-all" title="Nueva Respuesta Pqrs"></a>
                                            <?php } else { ?>
                                                Respondida
                                            <?php }
                                        } ?>
                                    </td>
                                </tr>
                        <?php } 
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php include("../../template/templateFooter.php"); ?>

<script type="text/javascript" language="javascript" class="init">
        function mostrarDescripcionCompleta(descripcion) {
            alert(descripcion);
        }

        $(document).ready(function () {
            var table = $('#pqrsPersona').DataTable({
                order: ([0, 'desc']),
                searching: true,
                search: {
                    smart: false
                },
                "language": {
                    "url": "../../dataResponsive/español.json",
                }
            });

            $('#filtroEstado').on('change', function () {
                var status = $(this).val();
                console.log("Estado seleccionado:", status);
                table.column(13).search(status).draw();
            });

        });
    </script>
