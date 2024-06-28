<?php
include("../../template/templatepersona.php");
include("../../conexion.php");

include('../../Model/Pqrs_pqr_model.php');

$pqrs_pqr_model = new Pqrs_pqr_model($miconexion);

$resultado = $pqrs_pqr_model->getListaPqrs_area();
$resultadoMu = $pqrs_pqr_model->getListaPqrs_municipio();
$fecha =  $pqrs_pqr_model->radicado();

?>

<script src="sweetalert2.all.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<title>Registrar PQRS</title> 
</br>
<div class="container_pqr">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <form class="needs-validation" action="../../Controler/Pqrs_pqr_controler.php" method="post" enctype="multipart/form-data" novalidate>
                <fieldset>
                    <legend class="text-center">Formulario de PQRS</legend>
                  
                    <div class="form-group">
                        <input type="hidden" name="tarea" value="create_pqrs_persona">
                        <label for="tipoPqr">Selecciona el tipo de PQRS:</label>
                        <div class="btn-group" data-toggle="buttons">
                            <label class="btn btn-primary">
                                <input type="radio" name="tipoPqr" value="Felicitacion"> Felicitacion
                            </label>
                            <label class="btn btn-primary">
                                <input type="radio" name="tipoPqr" value="Peticion"> Peticion
                            </label>
                            <label class="btn btn-primary">
                                <input type="radio" name="tipoPqr" value="Queja"> Queja
                            </label>
                            <label class="btn btn-primary">
                                <input type="radio" name="tipoPqr" value="Reclamo"> Reclamo
                            </label>
                            <label class="btn btn-primary">
                                <input type="radio" name="tipoPqr" value="Sugerencia"> Sugerencia
                            </label>
                        </div>
                        <span class="error-message" style="color: red; display: none;">Elige una opción.</span>
                    </div>


                            <div class="form-group">
                        <label for="nombre">Nombre:</label>
                        <input type="text" class="form-control"  name="nombre" id="nombre" placeholder="Escribe tu nombre" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="tipoIdentificacion">Tipo de identificacion:</label>
                        <select class="form-control" name="tipoIdentificacion" id="tipoIdentificacion">
                            <option value="" selected >Selecciona tipo de identificacion</option>
                            <option value="CC">Cedula</option>
                            <option value="TI">Tarjeta identidad</option>
                            <option value="RC">Registro civil</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="identificacion">Identificación:</label>
                        <input type="text" class="form-control" name="identificacion" id="identificacion" placeholder="Escribe tu identificación" required pattern="[0-9]+">
                        <div class="invalid-feedback">
                            Ingresa solo números en el campo de identificación.
                        </div>
                    </div>


                    
                    <div class="form-group">
                        <label for="area">Area:</label>
                        <select class="form-control" name="area" id="area">
                            <option selected>Selecciona un área</option>
                            <?php foreach ($resultado as $registro) { ?>
                                <option value="<?php echo $registro->getCodigo() ?>"> <?php echo $registro->getNombre() ?></option>
                            <?php } ?>
                        </select>
                    </div> 

                    
                    
                    <div class="form-group">
                        <label for="municipio">Municipio:</label>
                        <select class="form-control" name="municipio" id="municipio">
                            <option selected>Selecciona un municipio</option>
                            <?php  foreach ($resultadoMu as $registro) { ?> 
                                <option value="<?php echo $registro->getIdMunicipio()?>"> <?php echo $registro->getNombre()?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="programa">Programa:</label>
                        <select class="form-control" name="programa" id="programa">
                            <option value="" selected >Selecciona un programa</option>
                            <option value="opcion1">Opción 1</option>
                            <option value="opcion2">Opción 2</option>
                            <option value="opcion3">Opción 3</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="telefono">Teléfono:</label>
                        <input type="tel" class="form-control" name="telefono" id="telefono" placeholder="Escribe tu teléfono" required pattern="[0-9]{10}">
                        <div class="invalid-feedback">
                            Ingresa un número de teléfono válido de 10 dígitos.
                        </div>
                    </div>

                    
                    <div class="form-group">
                        <label for="correo">Correo Electrónico:</label>
                        <input type="text" class="form-control" name="correo" id="correo" placeholder="Escribe tu correo electrónico" >
                    </div>

                    
                    <div class="form-group">
                        <label for="direccion">Dirección:</label>
                        <input type="text" class="form-control" name="direccion" id="direccion" placeholder="Escribe tu dirección" required>
                    </div>

                    <div class="form-group">
                        <label for="descripcion">Descripción:</label>
                        <textarea class="form-control" name="descripcion" id="descripcion" placeholder="Cuéntanos qué sucede" rows="5" required></textarea>
                    </div>

                 
                    <div class="form-group">
                        <label for="documento" class="form-label font-weight-bold">Adjuntar Archivo:</label>
                        <input type="file" class="form-control-file" name="documento" id="documento">
                        <small id="fileHelpId" class="form-text text-muted">Sube tu archivo CV.</small>
                    </div>

                    <div class="col-md-4"  style="display: none;">
                        <div class="form-group">
                            <br> estadoPqr
                            <div class="custom-input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-poll-h"></i></span>
                                </div>
                                <textarea class="form-control" name="estadoPqr" rows="1" id="estadoPqr"><?php echo 'Abierta'; ?></textarea>
                            </div>
                        </div>
                    </div>
                    
                    <input type="hidden" name="fechaRadicado" id="fechaRadicado" value="<?php echo date("Y-m-d"); ?>">

                    <input type="hidden" name="radicado" value="<?php echo $fecha; ?>">

                    <div class="text-center">      
                        <input class="btn btn-iniciar-sesion" type="submit" value="enviar" id="submitBtn">  
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
</div>
<br>
<?php include("../../template/templateFooter.php"); ?>



<script>
    (function() {
        'use strict';

        var form = document.querySelector('form');
        var submitBtn = document.getElementById('submitBtn');

        form.addEventListener('submit', function(event) {
            if (!form.checkValidity()) {
                event.preventDefault();
                event.stopPropagation();
            }

            else {
                event.preventDefault();
                form.classList.add('was-validated');

                Swal.fire({
                    text: "¡Recuerda tu número de solicitud para futuras consultas: <?php echo $fecha; ?>",
                    icon: "success",

                    willClose: function() {
                        form.submit();
                    }
                });
            }
            form.classList.add('was-validated');
        });

        submitBtn.addEventListener('click', function() {
            form.classList.remove('was-validated');

            

            
        });
    })();
</script>


</php>
