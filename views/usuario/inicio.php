<?php
    include("../../template/templateUsuario.php");
    include("../../conexion.php");
    include("../../Model/Pqrs_pqr_model.php");

    $pqrs_pqr_model = new Pqrs_pqr_model($miconexion);

    $resultado1 = $pqrs_pqr_model->getPriorizacion();

    //var_dump($resultado1);
?>
 <link rel="stylesheet" type="text/css" href="../../ccs/styles.css">
 <title>Registrar PQRS</title> 

<!DOCTYPE html>
<html>
<head>
    <title>Listados PQRS</title>
     
<style>   

.semaforo {
        width: 20px; 
        height: 20px; 
        border-radius: 50%;
        display: inline-block;
        vertical-align: middle;
    }

    .semaforo[style*="verde"] {
        background-color: green;
    }

    .semaforo[style*="naranja"] {
        background-color: orange;
    }

    .semaforo[style*="rojo"] {
        background-color: red;
    }
        th:nth-child(4),
        td:nth-child(4) {
        text-align: center;
        }
    </style>
</head>
<body>
    <div class="containertabla">
        <legend class="text-center">LISTADOS PQRS</legend>
        <div class="m-2">
            <div class="col-md-12">
                <div class="table-responsive">
                    <div class="form-group">
                        <div class="form-group d-flex justify-content-center mt-3">
                            <label for="filtroEstado">Estado de las solicitudes</label>
                            <select id="filtroEstado" class="form-select">
                                <option value="">Todos</option>
                                <option value="Abierto">Abierto</option>
                                <option value="Cerrado">Cerrado</option>
                            </select>
                        </div>
                    </div>

                    <table id="pqrsPersona" class="display">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Fecha radicado</th>
                                <th>Priorizacion</th>
                                <th>Semaforo</th>
                                <th>Radicado</th>
                                <th>Nombre</th>
                                <th>Direccion</th>
                                <th>Telefono</th>
                                <th>Correo</th>
                                <th>Tipo pqr</th>
                                <th>Documento</th>
                                <th>Descripcion</th>
                                <th>Respuesta</th>
                                <th>Estado</th>
                                <th>Area</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($resultado1 as $registro) { ?>
                                <tr>
                                    <td><?= $registro->idPersonas ?></td>
                                    <td><?= date("Y-m-d", strtotime($registro->fechaRadicado)) ?></td>
                                    <td><?= $registro->priorizacion ?></td>
                                    <td>
                                        <?php if (empty($registro->respuestasPqr)) { ?>
                                            <?php
                                            $semaforoColor = $pqrs_pqr_model->calcularColorSemaforo($registro->fechaRadicado, $registro->tiempo_maximo_respuesta);
                                            ?>
                                            <div class="semaforo" style="background-color: <?= $semaforoColor ?>"></div>
                                        <?php } else { ?>
                                            <!-- Lógica para mostrar algo cuando hay respuestasPqr -->
                                        <?php } ?>
                                    </td>
                                    <td><?= $registro->radicado ?></td>
                                    <td><?= $registro->tipoIdentificacion . ': ' . $registro->identificacion . '-' . $registro->nombre ?></td>
                                    <td><?= $registro->direccion ?></td>
                                    <td><?= $registro->telefono ?></td>
                                    <td><?= $registro->correo ?></td>
                                    <td><?= $registro->tipoPqr ?></td>
                                    <td><?= $registro->documento ?></td>

                                    <td>
                                        <?php
                                        $descripcion = $registro->descripcion;
                                        $maxCaracteres = 5;
                                        if (strlen($registro->descripcion) > $maxCaracteres) {
                                            $descripcionRecortada = substr($registro->descripcion, 0, $maxCaracteres) . '...';
                                            echo $descripcionRecortada;
                                        } else {
                                            echo $registro->descripcion;
                                        }
                                        ?>
                                        <?php if (strlen($registro->descripcion) > $maxCaracteres) { ?>
                                            <span class="ver-mas" onclick="mostrarDescripcionCompleta('<?= $registro->descripcion ?>')">Ver más</span>
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <?php if (
                                            !empty($registro->nombreArea) &&
                                            $registro->estado != 'aceptado' &&
                                            !empty($registro->respuestasPqr)
                                        ) { ?>
                                            <a href="revisarrespuestacoord.php?id=<?= $registro->idPersonas ?>&idCoordinador=<?= $registro->idCoordinadores ?>" class="far fa-eye" title="Ver respuesta Coordinador"></a>
                                        <?php } elseif ($registro->estado == 'aceptado') { ?>
                                            <i class="fa fa-check" style="color: #6acc19;"></i>
                                        <?php } elseif ($registro->estado == 'rechazado') { ?>
                                            <i class="fa fa-times" style="color: #cc1919;"></i>
                                        <?php } else { ?>
                                            <?= $registro->respuestasPqr ?>
                                        <?php } ?>
                                    </td>


                                    <td>
                                        <?php if (empty($registro->respuestasPqr)) {
                                            echo "Abierto";
                                        } else {
                                            echo "Cerrado";
                                        }
                                        ?>
                                    </td>

                                    <td><?= $registro->nombreArea ?></td>
                                    <td>
                                        <?php if (empty($registro->respuestasPqr || $registro->nombreArea || $registro->priorizacion )) { ?>

                                            <a href="revisar.php?id=<?= $registro->idPersonas ?>&idPqr=<?= $registro->idPqr ?>" class="fas fa-edit" title="Caracterizar Pqrs"></a>

                                        <?php }
                                         elseif(empty($registro->respuestasPqr)) { ?>

                                          <a href="respuestaPqrSiau.php?id=<?= $registro->idPersonas ?>&idPqr=<?= $registro->idPqr ?>" class="fas fa-reply-all" title="Responder Pqrs"></a>

                                        <?php } ?>


                                        <?php if (empty($registro->respuestasPqr)) { ?> 
   
                                        <?php } else { ?>
                                            <a href="generarpdf.php?id=<?= $registro->idPersonas ?>" class="fas fa-file-download" title="Descargar pdf" target="_blank"></a>
                                            
                                            <?php if (empty($registro->fechaEnvioDoc)) { 
                                                
                                                if ($registro->idCoordinador != 0) { ?>
                                                    <a href="enviarRespuesta.php?id=<?= $registro->idPersonas ?>" class="fas fa-share-square" title="enviar pdf al usuario"></a>
                                                <?php } else { ?>
                                                    <a href="enviarRespuestaSiau.php?id=<?= $registro->idPersonas ?>" class="fas fa-share-square" title="enviar pdf al usuario"></a>
                                                <?php } ?>
                                            
                                            <?php } else { ?>
                                                
                                            <?php } ?>       
                                        <?php } ?>


                                    </td>
                                </tr>
                            <?php } ?>
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

</body>
</html>
