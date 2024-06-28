    <?php
    include("../conexion.php");
    include("../Model/Pqrs_pqr_model.php");

    try {
        $pqrs_pqr_model = new Pqrs_pqr_model($miconexion);
        $pqrs_persona = new Object_pqrs_persona();
        $pqrs_usuario = new Object_pqrs_super_usuario();
        $pqrs_pqr = new Object_pqrs_pqr();
        $pqrs_respuesta = new Object_pqrs_respuesta;
        $pqrs_respuesta_model = new Pqrs_pqr_model($miconexion);

        switch ($_REQUEST["tarea"]) {
            case "create_pqrs_persona":
                $msj = null;
                $tipo = 0;
            

                if ($msj == null) {
                    $pqrs_persona->setIdPersonas(htmlentities(addslashes($_REQUEST["idPersonas"]), ENT_QUOTES));
                    $pqrs_persona->setNombre(htmlentities(addslashes($_REQUEST["nombre"]), ENT_QUOTES));
                    $pqrs_persona->setTipoIdentificacion(htmlentities(addslashes($_REQUEST["tipoIdentificacion"]), ENT_QUOTES));
                    $pqrs_persona->setIdentificacion(htmlentities(addslashes($_REQUEST["identificacion"]), ENT_QUOTES));
                    $pqrs_persona->setDireccion(htmlentities(addslashes($_REQUEST["direccion"]), ENT_QUOTES));
                    $pqrs_persona->setPrograma(htmlentities(addslashes($_REQUEST["programa"]), ENT_QUOTES));
                    $pqrs_persona->setTelefono(htmlentities(addslashes($_REQUEST["telefono"]), ENT_QUOTES));
                    $pqrs_persona->setCorreo(htmlentities(addslashes($_REQUEST["correo"]), ENT_QUOTES));
                    $pqrs_persona->setTipoPqr(htmlentities(addslashes($_REQUEST["tipoPqr"]), ENT_QUOTES));
                    $pqrs_persona->setDescripcion(htmlentities(addslashes($_REQUEST["descripcion"]), ENT_QUOTES));
                    $pqrs_persona->setFechaRadicado(htmlentities(addslashes($_REQUEST["fechaRadicado"]), ENT_QUOTES));
                    $pqrs_persona->setRadicado(htmlentities(addslashes($_REQUEST["radicado"]), ENT_QUOTES));
                    
                    

                    if (isset($_FILES["documento"])) {
                        $nombreArchivo = $_FILES["documento"]["name"];
                        $tipoArchivo = $_FILES["documento"]["type"];
                        $nombreTemporal = $_FILES["documento"]["tmp_name"];

                        if ($tipoArchivo == "application/pdf") {
                            $directorioDestino = "C:/xampp/htdocs/pqrs/documentos/";
                            move_uploaded_file($nombreTemporal, $directorioDestino . $nombreArchivo);
                            $pqrs_persona->setDocumento($nombreArchivo);
                        } else {
                            'no es un archivo pdf';
                        }
                    }

                    //var_dump($_REQUEST);

                    $pqrs_pqr_model->insertPqrs_persona($pqrs_persona);
                    $msj = "La operación se ejecutó de forma exitosa";
                    $tipo = 1;
                    

                    
                                }
                           header("Location: ../views/persona/solicitudPqrs.php");
            break;


            case "update_pqrs_persona":
                    $msj = null;
                    $tipo = 0;

                    if ($msj == null) {
                        $pqrs_persona->setIdPersonas(htmlentities(addslashes($_REQUEST["idPersonas"]), ENT_QUOTES));
                        $pqrs_persona->setNombre(htmlentities(addslashes($_REQUEST["nombre"]), ENT_QUOTES));
                        $pqrs_persona->setTipoIdentificacion(htmlentities(addslashes($_REQUEST["tipoIdentificacion"]), ENT_QUOTES));
                        $pqrs_persona->setIdentificacion(htmlentities(addslashes($_REQUEST["identificacion"]), ENT_QUOTES));
                        $pqrs_persona->setDireccion(htmlentities(addslashes($_REQUEST["direccion"]), ENT_QUOTES));
                        $pqrs_persona->setPrograma(htmlentities(addslashes($_REQUEST["programa"]), ENT_QUOTES));
                        $pqrs_persona->setTelefono(htmlentities(addslashes($_REQUEST["telefono"]), ENT_QUOTES));
                        $pqrs_persona->setCorreo(htmlentities(addslashes($_REQUEST["correo"]), ENT_QUOTES));
                        $pqrs_persona->setTipoPqr(htmlentities(addslashes($_REQUEST["tipoPqr"]), ENT_QUOTES));
                        $pqrs_persona->setDescripcion(htmlentities(addslashes($_REQUEST["descripcion"]), ENT_QUOTES));

                        $pqrs_pqr_model->updatePqrs_persona($pqrs_persona);
                        $msj = "La operación se ejecutó de forma exitosa";
                        $tipo = 1;
                    }
                    

                        header("Location: ../views/persona/solicitudPqrs.php");

                            
            
            break;



            case "create_pqrs_detalle_causa": 
                    $msj=null;
                    $tipo=0; 
                    if($msj==null)
                    {
                        
                        $pqrs_detalle_causa->setIdDetalle(htmlentities(addslashes($_REQUEST["idDetalle"]), ENT_QUOTES)); 
                        $pqrs_detalle_causa->setNombre_detalle_causa(htmlentities(addslashes($_REQUEST["nombre_detalle_causa"]),ENT_QUOTES));
                        $pqrs_detalle_causa->setMacroproceso_ambito(htmlentities(addslashes($_REQUEST["macroproceso_ambito"]), ENT_QUOTES)); 
                        $pqrs_detalle_causa->setProceso_prestacion(htmlentities(addslashes($_REQUEST["proceso_prestacion"]), ENT_QUOTES)); 
                        $pqrs_detalle_causa->setMotivos_solicitud(htmlentities(addslashes($_REQUEST["motivos_solicitud"]), ENT_QUOTES)); 
                        $pqrs_detalle_causa->setPriorizacion(htmlentities(addslashes($_REQUEST["priorizacion"]), ENT_QUOTES)); 
                        $pqrs_detalle_causa->setTiempo_maximo_respuesta(htmlentities(addslashes($_REQUEST["tiempo_maximo_respuesta"]), ENT_QUOTES)); 
                        $pqrs_detalle_causa->setAtributo_calidad_afectado(htmlentities(addslashes($_REQUEST["atributo_calidad_afectado"]), ENT_QUOTES)); 
                        
                        $pqrs_detalle_causa_model->insertPqrs_detalle_causa($pqrs_detalle_causa); 
                        
                        $msj="La operación se ejecutó de forma éxitosa"; 
                        $tipo=1; 
                    }
                    
                    
            break; 
                    
                    
                    
            case 'obtenerDetalleCausal':
                        $datos = $pqrs_pqr_model->obtenerDetalleCausal(htmlentities(addslashes($_REQUEST['id']),ENT_QUOTES));
                        echo json_encode($datos);
                        break;

                        case"create_pqrs_super_usuario":
                        $msj = null;
                        $tipo = 0;
                                
                                if ($msj == null) {
                                    $pqrs_usuario->setIdSuper(htmlentities(addslashes($_REQUEST["idSuper"]), ENT_QUOTES));
                                    $pqrs_usuario->setNombreUsuario(htmlentities(addslashes($_REQUEST["nombre_usuario"]), ENT_QUOTES));
                                    $pqrs_usuario->setPassword(htmlentities(addslashes($_REQUEST["password"]), ENT_QUOTES));
                                    $pqrs_usuario->setIdRoles(htmlentities(addslashes($_REQUEST["idRoles"]), ENT_QUOTES));
                                    
                    
                                
                                    
                                    $pqrs_pqr_model->insertPqrs_super_usuario($pqrs_usuario);
                                    $msj = "La operación se ejecutó de forma exitosa";
                                    $tipo = 1;
                                }
                                
                                header("Location: ../views/persona/solicitudPqrs.php");                        
                                
                break;


                case "create_pqrs_respuesta": 

                                    $msj=null;
                                    $tipo=0;
                            
                                    if($msj==null)
                                    {
                                        
                                        $pqrs_respuesta->setIdRespuesta(htmlentities(addslashes($_REQUEST["idRespuesta"]), ENT_QUOTES)); 
                                        $pqrs_respuesta->setRespuesta(htmlentities(addslashes($_REQUEST["respuestasPqr"]), ENT_QUOTES));
                                        $pqrs_respuesta->setEstado(htmlentities(addslashes($_REQUEST["estado"]??null), ENT_QUOTES));
                                        $pqrs_respuesta->setFechaRespuesta(htmlentities(addslashes($_REQUEST["fechaRespuesta"]), ENT_QUOTES));
                                        $pqrs_respuesta->setIdDetalleCausal(htmlentities(addslashes($_REQUEST["idDetalleCausal"]??null), ENT_QUOTES)); 
                                        $pqrs_respuesta->setIdPersona(htmlentities(addslashes($_REQUEST["idPersona"]), ENT_QUOTES)); 
                                        $pqrs_respuesta->setIdPqr(htmlentities(addslashes($_REQUEST["idPqr"]), ENT_QUOTES)); 
                                        $pqrs_respuesta->setIdCoordinador(htmlentities(addslashes($_REQUEST["idCoordinador"]??null), ENT_QUOTES)); 
                                        $pqrs_pqr_model->insertPqrs_respuesta($pqrs_respuesta); 
                                        $msj="La operación se ejecutó de forma éxitosa"; 
                                        $tipo=1; 
                                    }
                                    var_dump($_REQUEST);
                                   header('Location: ../views/usuario/login.php');
                                /*     $idCoordinador = $_REQUEST["idCoordinador"];
                                    $registroCoordinador=$pqrs_pqr_model->obtenerCoordinador($idCoordinador);
                                    if($idCoordinador)
                                    {
                                        $idCoordinador =$registroCoordinador["idCoordinador"];
                                        //header('Location: ../views/usuario/respuestaCoordinadores.php');
                                    }
                                    else{
                                        //header('Location: ../views/usuario/inicio.php');
                                    } */
  
                break; 


                
                case "update_pqrs_respuesta":
                   
                    $msj = null;
                    $tipo = 0;
            
                 
                    if ($msj == null) {

                      $pqrs_respuesta->setIdRespuesta(htmlentities(addslashes($_REQUEST["idRespuesta"]??null), ENT_QUOTES));
                      $pqrs_respuesta->setRespuesta(htmlentities(addslashes($_REQUEST["respuestasPqr"]??null), ENT_QUOTES));
                      $pqrs_respuesta->setFechaRespuesta(htmlentities(addslashes($_REQUEST["fechaRespuesta"]??null), ENT_QUOTES));
                      $pqrs_respuesta->setEstado(htmlentities(addslashes($_REQUEST["estado"]), ENT_QUOTES));
                      $pqrs_respuesta_model->updatePqrsRespuesta($pqrs_respuesta);
            
                      $msj = "La operación se ejecutó de forma éxitosa";
                      $tipo = 1;
                      var_dump($_REQUEST);
                    }
            
                    header('Location: ../views/usuario/inicio.php');
                    break;




                case "incio_usuario":


                    session_start();
                
                    if (isset($_REQUEST['cerrar_sesion'])) {
                        session_unset();
                        session_destroy();
                    }
                
                    $nombreUsuario = $_REQUEST["nombreUsuario"];
                    $password = $_REQUEST["password"];
                
                    $registroSuper = $pqrs_pqr_model->validar_super_usuario($nombreUsuario, $password);
                    $registroCoordinador = $pqrs_pqr_model->validar_coordinador($nombreUsuario, $password);
                    
                
                    if ($registroSuper) {
                        $rol = $registroSuper["idRol"];
                        $idUsuario = $registroSuper["idSuper"];
                    } elseif ($registroCoordinador) {
                        $rol = $registroCoordinador["idRol"];
                        $idUsuario = $registroCoordinador["idCoordinadores"];
                    } else {
                        echo "El usuario no existe";
                        break;
                    }
                
                    $_SESSION['rol'] = $rol;
                    $_SESSION['idUsuario'] = $idUsuario;
                
                    switch ($rol) {
                        case 1:
                            header('Location: ../views/usuario/inicio.php');
                            break;
                
                        case 2:
                           header('Location: ../views/usuario/respuestaCoordinadores.php');
                            break;
                
                        default:
                            echo "Rol no válido";
                    }
                    break;


                case "create_pqrs_pqr": 
                    $msj=null;
                    $tipo=0;
                
                
               
                    if($msj==null)
                    {
                //Seteado y sanetización de datos de entrada
                $pqrs_pqr->setIdPqr(htmlentities(addslashes($_REQUEST["idPqr"]), ENT_QUOTES)); 
                $pqrs_pqr->setIdDetalleCausal(htmlentities(addslashes($_REQUEST["idDetalleCausal"]), ENT_QUOTES));
                $pqrs_pqr->setIdPersona(htmlentities(addslashes($_REQUEST["idPersona"]), ENT_QUOTES));
                $pqrs_pqr->setDescripcionEdit(htmlentities(addslashes($_REQUEST["descripcionEdit"]), ENT_QUOTES));
                $pqrs_pqr->setIdArea(htmlentities(addslashes($_REQUEST["idArea"] ?? null), ENT_QUOTES));
                    
            if (isset($_FILES["documentoRespuesta"])) {
                $nombreArchivo = $_FILES["documentoRespuesta"]["name"];
                $tipoArchivo = $_FILES["documentoRespuesta"]["type"];
                $nombreTemporal = $_FILES["documentoRespuesta"]["tmp_name"];
                
                if ($tipoArchivo == "application/pdf") {
                    $directorioDestino = "C:/xampp/htdocs/pqrs/documentos/";
                    move_uploaded_file($nombreTemporal, $directorioDestino . $nombreArchivo);
                    $pqrs_pqr->setDocumentoRespuesta($nombreArchivo);
                } else {

                }
                }
                    /* $pqrs_pqr->setConsecutivo(htmlentities(addslashes($_REQUEST["Consecutivo"]?? null), ENT_QUOTES));
                    $pqrs_pqr->setReceptor(htmlentities(addslashes($_REQUEST["Receptor"]?? null), ENT_QUOTES));
                    $pqrs_pqr->setEstado(htmlentities(addslashes($_REQUEST["Estado"]?? null), ENT_QUOTES));
                    */
                /*  $pqrs_pqr->setMacroProceso(htmlentities(addslashes($_REQUEST["macroProceso"]?? null), ENT_QUOTES));
                    $pqrs_pqr->setProcesoPrestacion(htmlentities(addslashes($_REQUEST["procesoPrestacion"]?? null), ENT_QUOTES));
                    $pqrs_pqr->setMotivosGenerales(htmlentities(addslashes($_REQUEST["motivosGenerales"]?? null), ENT_QUOTES));
                    $pqrs_pqr->setPriorización(htmlentities(addslashes($_REQUEST["priorización"]?? null), ENT_QUOTES));
                    $pqrs_pqr->setTiempoRespuesta(htmlentities(addslashes($_REQUEST["tiempoRespuesta"]?? null), ENT_QUOTES));
                    $pqrs_pqr->setAtributoCalidad(htmlentities(addslashes($_REQUEST["atributoCalidad"]?? null), ENT_QUOTES));
                    $pqrs_pqr->setDescripciónEdit(htmlentities(addslashes($_REQUEST["descripciónEdit"]?? null), ENT_QUOTES));
                    $pqrs_pqr->setRespuestaOperador(htmlentities(addslashes($_REQUEST["respuestaOperador"]?? null), ENT_QUOTES));
                    $pqrs_pqr->setRadicaciónRespuesta(htmlentities(addslashes($_REQUEST["radicaciónRespuesta"]?? null), ENT_QUOTES));
                    $pqrs_pqr->setConceptoSupervisión(htmlentities(addslashes($_REQUEST["conceptoSupervisión"]?? null), ENT_QUOTES));
                    $pqrs_pqr->setApoyoSupervisión(htmlentities(addslashes($_REQUEST["apoyoSupervisión"]?? null), ENT_QUOTES));
                    $pqrs_pqr->setFechaTrasladoCompetencia(htmlentities(addslashes($_REQUEST["fechaTrasladoCompetencia"]?? null), ENT_QUOTES));
                    
                    $pqrs_pqr->setAvalRespuesta(htmlentities(addslashes($_REQUEST["avalRespuesta"]?? null), ENT_QUOTES));
                    */
                    //llamado a la función CREATE del CRUD para la tabla Pqrs_pqr
             $pqrs_pqr_model->insertPqrs_pqr($pqrs_pqr); 
                    $msj="La operación se ejecutó de forma éxitosa"; 
                    $tipo=1; 
                    }
                    
                    
               header("Location: ../views/usuario/inicio.php");
                var_dump($_REQUEST);
                    break;


                   case "update_pqrs_pqr":
                        $msj = null;
                        $tipo = 0;
                
                
                        if ($msj == null) {
                        $pqrs_pqr->setIdPqr(htmlentities(addslashes($_REQUEST["idPqr"]?? null), ENT_QUOTES)); 
                        $pqrs_pqr->setIdDetalleCausal(htmlentities(addslashes($_REQUEST["idDetalleCausal"]?? null), ENT_QUOTES));
                        $pqrs_pqr->setIdPersona(htmlentities(addslashes($_REQUEST["idPersona"]?? null), ENT_QUOTES));
                        $pqrs_pqr->setFechaEnvioDoc(htmlentities(addslashes($_REQUEST["fechaEnvioDoc"]?? null), ENT_QUOTES));
                        $pqrs_pqr->setDescripcionEdit(htmlentities(addslashes($_REQUEST["descripcionEdit"]?? null), ENT_QUOTES));
                        $pqrs_pqr->setIdArea(htmlentities(addslashes($_REQUEST["idArea"]?? null), ENT_QUOTES));             
                        //$pqrs_pqr->setDocumentoRespuesta(htmlentities(addslashes($_REQUEST["documentoRespuesta"]?? null), ENT_QUOTES));
                        if (isset($_FILES["documentoRespuesta"])) {
                            $nombreArchivo = $_FILES["documentoRespuesta"]["name"];
                            $tipoArchivo = $_FILES["documentoRespuesta"]["type"];
                            $nombreTemporal = $_FILES["documentoRespuesta"]["tmp_name"];
                            
                            if ($tipoArchivo == "application/pdf") {
                                $directorioDestino = "C:/xampp/htdocs/pqrs/documentos/";
                                move_uploaded_file($nombreTemporal, $directorioDestino . $nombreArchivo);
                                $pqrs_pqr->setDocumentoRespuesta($nombreArchivo);
                            } else {
            
                            }
                            
                            
                        }
                        $msj = "La operación se ejecutó de forma éxitosa";
                        $tipo = 1;
                        $pqrs_pqr_model->updatePqrs_pqr($pqrs_pqr);
                    
    //var_dump($_REQUEST);
                    }
                    header('Location: ../views/usuario/inicio.php');
                 break;
                                    
                        
                }
    } catch (Exception $e) {
        echo $e->getMessage();
    }
