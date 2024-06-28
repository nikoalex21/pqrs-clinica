<?php

include("Object_pqrs_pqr.php");

//include("../Controler/Pqrs_pqr_controler.php");


//Clase model 
class Pqrs_pqr_model
{
    private $conexion;
    //Clase constructora 
    public function __construct($conexion)
    {
        $this->setConexion($conexion);
    }

    //Clase conectora con la base de datos 
    public function setConexion(PDO $conexion)
    {
        $this->conexion = $conexion;
    }

    //Función CREATE para el CRUD de la tabla Pqrs_pqr 

 

    public function insertPqrs_pqr($pqrs_pqr) { 
        $idArea = $pqrs_pqr->getIdArea();
        if(empty($idArea)) {
            $idArea = "NULL";
        } else {
            $idArea = "'" . $idArea . "'";
        }
    
        $sql = "INSERT INTO pqrs_pqr(idDetalleCausal,documentoRespuesta, idPersona,descripcionEdit, idArea) 
                VALUES ('" . $pqrs_pqr->getIdDetalleCausal() . "',
                '" .  $pqrs_pqr->getDocumentoRespuesta() . "',
                '" . $pqrs_pqr->getIdPersona() . "',
                '" .  $pqrs_pqr->getDescripcionEdit() . "',
                " .  $idArea . ")";
        $this->conexion->exec($sql); 
    }
    
    
    //Función READ para el CRUD de la tabla Pqrs_pqr 
    public function getListaPqrs_pqr()
    {
        
         $listado = array();
        $p = 0;

        $resultado = $this->conexion->query("SELECT * FROM pqrs_pqr");
        while ($registro = $resultado->fetch(PDO::FETCH_ASSOC)) {
            $pqrs_pqr = new Object_pqrs_pqr();

            $pqrs_pqr->setIdPqr($registro["idPqr"]);
            /* $pqrs_pqr->setConsecutivo($registro["Consecutivo"]);
            $pqrs_pqr->setReceptor($registro["Receptor"]);
            $pqrs_pqr->setEstado($registro["Estado"]);
            $pqrs_pqr->setFechaRadicado($registro["FechaRadicado"]);
            $pqrs_pqr->setFechaRespuesta($registro["FechaRespuesta"]); */
            $pqrs_pqr->setIdDetalleCausal($registro["idDetalleCausal"]);
            $pqrs_pqr->setDocumentoRespuesta($registro["documentoRespuesta"]);
            $pqrs_pqr->setIdPersona($registro["idPersona"]);
            /* $pqrs_pqr->setMacroProceso($registro["macroProceso"]);
            $pqrs_pqr->setProcesoPrestacion($registro["procesoPrestacion"]);
            $pqrs_pqr->setMotivosGenerales($registro["motivosGenerales"]);
            $pqrs_pqr->setPriorización($registro["priorización"]);
            $pqrs_pqr->setTiempoRespuesta($registro["tiempoRespuesta"]);
            $pqrs_pqr->setAtributoCalidad($registro["atributoCalidad"]);
            $pqrs_pqr->setDescripciónEdit($registro["descripciónEdit"]);
            $pqrs_pqr->setRespuestaOperador($registro["respuestaOperador"]);
            $pqrs_pqr->setRadicaciónRespuesta($registro["radicaciónRespuesta"]);
            $pqrs_pqr->setConceptoSupervisión($registro["conceptoSupervisión"]);
            $pqrs_pqr->setApoyoSupervisión($registro["apoyoSupervisión"]);
            $pqrs_pqr->setFechaTrasladoCompetencia($registro["fechaTrasladoCompetencia"]);
            $pqrs_pqr->setAvalRespuesta($registro["avalRespuesta"]); */

            $listado[$p] = $pqrs_pqr;
            $p++;
        }
        return $listado; 
    }

    //Función READ con paso de parámetros, para el CRUD de la tabla Pqrs_pqr 
    public function getPqrs_pqr($idPqrs)
    {
        $resultado = $this->conexion->query("SELECT * FROM pqrs_pqr WHERE idPqrs='" . $idPqrs . "'");
        $registro = $resultado->fetch(PDO::FETCH_NUM);
        return $registro;
    }

    //Función UPDATE para el CRUD de la tabla Pqrs_pqr 

   public function updatePqrs_pqr(Object_pqrs_pqr $pqrs_pqr) {
         $sql = "UPDATE pqrs_pqr 
        SET idDetalleCausal='" . $pqrs_pqr->getIdDetalleCausal() . "', 
        documentoRespuesta='" . $pqrs_pqr->getDocumentoRespuesta() . "',
        fechaEnvioDoc='" . $pqrs_pqr->getFechaEnvioDoc() . "', 
        idPersona='" . $pqrs_pqr->getIdPersona() . "',
        descripcionEdit='" . $pqrs_pqr->getDescripcionEdit(). "',
        idArea='" . $pqrs_pqr->getIdArea() . "'
        WHERE IdPqr='" . $pqrs_pqr->getIdPqr() . "'"; 
       $this->conexion->exec($sql);
        var_dump($sql);
    } 
    

    //Función DELETE para el CRUD de la tabla Pqrs_pqr 
    public function deletePqrs_pqr(Object_pqrs_pqr $pqrs_pqr)
    {
        $sql = "DELETE FROM pqrs_pqr WHERE idPqr='" . $pqrs_pqr->getIdPqr() . "' ";
       $this->conexion->exec($sql);
       
    }

    //Función CREATE para el CRUD de la tabla Pqrs_area 
    public function insertPqrs_area(Object_pqrs_area $pqrs_area)
    {
        $sql = "INSERT INTO pqrs_area(idAreas, codigo, nombre) 
            VALUES('" . $pqrs_area->getIdAreas() . "', '" . $pqrs_area->getCodigo() . "', '" . $pqrs_area->getNombre() . "')";
        $this->conexion->exec($sql);
    }

    //Función READ para el CRUD de la tabla Pqrs_area 
    public function getListaPqrs_area()
    {  
        $listado = array();
        $p = 0;
        $resultado = $this->conexion->query("SELECT * FROM pqrs_area");
      
        while ($registro = $resultado->fetch(PDO::FETCH_ASSOC)) {
            $pqrs_area = new Object_pqrs_area();

            $pqrs_area->setIdAreas($registro["idArea"]);
            $pqrs_area->setCodigo($registro["codigo"]);
            $pqrs_area->setNombre($registro["nombreArea"]);

           
            $listado[$p] = $pqrs_area;
            $p++;
        }
        return $listado;
    }

    //Función READ con paso de parámetros, para el CRUD de la tabla Pqrs_area 
    public function getPqrs_area($idAreas)
    {
        $resultado = $this->conexion->query("SELECT * FROM pqrs_area WHERE idAreas='" . $idAreas . "'");
        $registro = $resultado->fetch(PDO::FETCH_NUM);
        return $registro;
    }

    //Función UPDATE para el CRUD de la tabla Pqrs_area 
    public function updatePqrs_area(Object_pqrs_area $pqrs_area)
    {
        $sql = "UPDATE pqrs_area SET idAreas='" . $pqrs_area->getIdAreas() . "', codigo='" . $pqrs_area->getCodigo() . "', nombre='" . $pqrs_area->getNombre() . "' WHERE idAreas='" . $pqrs_area->getIdAreas() . "' ";
        $this->conexion->exec($sql);
    }

    //Función DELETE para el CRUD de la tabla Pqrs_area 
    public function deletePqrs_area(Object_pqrs_area $pqrs_area)
    {
        $sql = "DELETE FROM pqrs_area WHERE idAreas='" . $pqrs_area->getIdAreas() . "' ";
        $this->conexion->exec($sql);
    }

    //Función CREATE para el CRUD de la tabla Pqrs_detalle_causa 
    public function insertPqrs_detalle_causa(Object_pqrs_detalle_causa $pqrs_detalle_causa)
    {
        $sql = "INSERT INTO pqrs_detalle_causa(idDetalle, macroproceso_ambito, proceso_prestacion, motivos_solicitud, priorizacion, tiempo_maximo_respuesta, atributo_calidad_afectado) 
            VALUES('" . $pqrs_detalle_causa->getIdDetalle() . "', '" . $pqrs_detalle_causa->getMacroproceso_ambito() . "', '" . $pqrs_detalle_causa->getProceso_prestacion() . "', '" . $pqrs_detalle_causa->getMotivos_solicitud() . "', '" . $pqrs_detalle_causa->getPriorizacion() . "', '" . $pqrs_detalle_causa->getTiempo_maximo_respuesta() . "', '" . $pqrs_detalle_causa->getAtributo_calidad_afectado() . "')";
        $this->conexion->exec($sql);
    }

    //Función READ para el CRUD de la tabla Pqrs_detalle_causa 
    public function getListaPqrs_detalle_causa()
    {
        $listado = array();
        $p = 0;

        $resultado = $this->conexion->query("SELECT * FROM pqrs_detalle_causa");
        while ($registro = $resultado->fetch(PDO::FETCH_ASSOC)) {
            $pqrs_detalle_causa = new Object_pqrs_detalle_causa();

            $pqrs_detalle_causa->setIdDetalle($registro["idDetalle"]);
            $pqrs_detalle_causa->setNombre_detalle_causa($registro["nombre_detalle_causa"]);
            $pqrs_detalle_causa->setMacroproceso_ambito($registro["macroproceso_ambito"]);
            $pqrs_detalle_causa->setProceso_prestacion($registro["proceso_prestacion"]);
            $pqrs_detalle_causa->setMotivos_solicitud($registro["motivos_solicitud"]);
            $pqrs_detalle_causa->setPriorizacion($registro["priorizacion"]);
            $pqrs_detalle_causa->setTiempo_maximo_respuesta($registro["tiempo_maximo_respuesta"]);
            $pqrs_detalle_causa->setAtributo_calidad_afectado($registro["atributo_calidad_afectado"]);

            $listado[$p] = $pqrs_detalle_causa;
            $p++;
        }
        return $listado;
    }

    //Función READ con paso de parámetros, para el CRUD de la tabla Pqrs_detalle_causa 
    public function getPqrs_detalle_causa($idDetalle)
    {
        $resultado = $this->conexion->query("SELECT * FROM pqrs_detalle_causa WHERE idDetalle='" . $idDetalle . "'");
        $registro = $resultado->fetch(PDO::FETCH_NUM);
        return $registro;
    }

    //Función UPDATE para el CRUD de la tabla Pqrs_detalle_causa 
    public function updatePqrs_detalle_causa(Object_pqrs_detalle_causa $pqrs_detalle_causa)
    {
        $sql = "UPDATE pqrs_detalle_causa SET idDetalle='" . $pqrs_detalle_causa->getIdDetalle() . "', macroproceso_ambito='" . $pqrs_detalle_causa->getMacroproceso_ambito() . "', proceso_prestacion='" . $pqrs_detalle_causa->getProceso_prestacion() . "', motivos_solicitud='" . $pqrs_detalle_causa->getMotivos_solicitud() . "', priorizacion='" . $pqrs_detalle_causa->getPriorizacion() . "', tiempo_maximo_respuesta='" . $pqrs_detalle_causa->getTiempo_maximo_respuesta() . "', atributo_calidad_afectado='" . $pqrs_detalle_causa->getAtributo_calidad_afectado() . "' WHERE idDetalle='" . $pqrs_detalle_causa->getIdDetalle() . "' ";
        $this->conexion->exec($sql);
    }

    //Función DELETE para el CRUD de la tabla Pqrs_detalle_causa 
    public function deletePqrs_detalle_causa(Object_pqrs_detalle_causa $pqrs_detalle_causa)
    {
        $sql = "DELETE FROM pqrs_detalle_causa WHERE idDetalle='" . $pqrs_detalle_causa->getIdDetalle() . "' ";
        $this->conexion->exec($sql);
    }

    //Función CREATE para el CRUD de la tabla Pqrs_respuesta 
    public function insertPqrs_respuesta(Object_pqrs_respuesta $pqrs_respuesta)
    {
        $sql = "INSERT INTO pqrs_respuesta(respuestasPqr, estado, fechaRespuesta, idPersona,idPqr,idCoordinador) 
            VALUES('" .  $pqrs_respuesta->getRespuestasPqr() . "', 
            '" . $pqrs_respuesta->getEstado() . "',
            '" . $pqrs_respuesta->getFechaRespuesta() . "',
            '" . $pqrs_respuesta->getIdPersona() . "',
            '" . $pqrs_respuesta->getIdPqr() . "',
            '" . $pqrs_respuesta->getIdCoodirnador() . "' )";  
            $this->conexion->exec($sql);
            //var_dump($sql);
    }

    //Función READ para el CRUD de la tabla Pqrs_respuesta 
    public function getListaPqrs_respuesta()
    {
        $listado = array();
        $p = 0;

        $resultado = $this->conexion->query("SELECT * FROM pqrs_respuesta");
        while ($registro = $resultado->fetch(PDO::FETCH_ASSOC)) {
            $pqrs_respuesta = new Object_pqrs_respuesta();

            $pqrs_respuesta->setIdRespuesta($registro["idRespuesta"]);
            $pqrs_respuesta->setRespuesta($registro["respuesta"]);
            $pqrs_respuesta->setEstado($registro["estado"]);

            $listado[$p] = $pqrs_respuesta;
            $p++;
        }
        return $listado;
    }

    //Función READ con paso de parámetros, para el CRUD de la tabla Pqrs_respuesta 
    public function getPqrs_respuesta($idRespuesta)
    {
        $resultado = $this->conexion->query("SELECT * FROM pqrs_respuesta WHERE idRespuesta='" . $idRespuesta . "'");
        $registro = $resultado->fetch(PDO::FETCH_NUM);
        return $registro;
    }

    //Función UPDATE para el CRUD de la tabla Pqrs_respuesta 
    public function updatePqrsRespuesta(Object_pqrs_respuesta $pqrs_respuesta)
    {
        $sql = "UPDATE pqrs_respuesta 
        SET estado = '" . $pqrs_respuesta->getEstado() . "',
        respuestasPqr = '" . $pqrs_respuesta->getRespuestasPqr() . "'
        WHERE idRespuesta = '" . $pqrs_respuesta->getIdRespuesta() . "'";
        var_dump($sql);
      $this->conexion->exec($sql);
    }
    

    //Función DELETE para el CRUD de la tabla Pqrs_respuesta 
    public function deletePqrs_respuesta(Object_pqrs_respuesta $pqrs_respuesta)
    {
        $sql = "DELETE FROM pqrs_respuesta WHERE idRespuesta='" . $pqrs_respuesta->getIdRespuesta() . "' ";
        $this->conexion->exec($sql);
    }

    //Función UPDATE inactivar o activar un registro, para el CRUD de la tabla Pqrs_respuesta 
    public function d_ePqrs_respuesta(Object_pqrs_respuesta $pqrs_respuesta)
    {
        $sql = "UPDATE pqrs_respuesta SET estado='" . $pqrs_respuesta->getEstado() . "'  WHERE idRespuesta ='" . $pqrs_respuesta->getIdRespuesta() . "' ";
        $this->conexion->exec($sql);
    }

    //Función CREATE para el CRUD de la tabla Pqrs_persona 

    public function insertPqrs_persona(Object_pqrs_persona $pqrs_persona)
    {
        $sql = "INSERT INTO pqrs_persona (nombre, tipoIdentificacion, identificacion, direccion, programa, telefono, correo, tipoPqr, descripcion, documento, fechaRadicado,radicado)
        VALUES ('" . $pqrs_persona->getNombre() . "',
        '" . $pqrs_persona->getTipoIdentificacion() . "',
        '" . $pqrs_persona->getIdentificacion() . "',
        '" . $pqrs_persona->getDireccion() . "',
        '" . $pqrs_persona->getPrograma() . "',
        '" . $pqrs_persona->getTelefono() . "',
        '" . $pqrs_persona->getCorreo() . "',
        '" . $pqrs_persona->getTipoPqr() . "',
        '" . $pqrs_persona->getDescripcion() . "',
        '" . $pqrs_persona->getDocumento() . "',
        '" . $pqrs_persona->getFechaRadicado() . "',
        '" . $pqrs_persona->getRadicado() . "')";
        $this->conexion->exec($sql);
        var_dump($sql);
    }
    //Función READ para el CRUD de la tabla Pqrs_persona 
    public function getListaPqrs_persona()
    {
        $listado = array();
        $p = 0;

        $resultado = $this->conexion->query("SELECT * FROM pqrs_persona ");
        while ($registro = $resultado->fetch(PDO::FETCH_ASSOC)) {
            $pqrs_persona = new Object_pqrs_persona();
            $pqrs_persona->setIdPersonas($registro['idPersonas'] ?? null);
            $pqrs_persona->setNombre($registro['nombre'] ?? null);
            $pqrs_persona->setTipoIdentificacion($registro['tipoIdentificacion'] ?? null);
            $pqrs_persona->setIdentificacion($registro['identificacion'] ?? null);
            $pqrs_persona->setDireccion($registro['direccion'] ?? null);
            $pqrs_persona->setPrograma($registro['programa'] ?? null);
            $pqrs_persona->setTelefono($registro['telefono'] ?? null);
            $pqrs_persona->setCorreo($registro['correo'] ?? null);
            $pqrs_persona->setTipoPqr($registro['tipoPqr'] ?? null);
            $pqrs_persona->setDescripcion($registro['descripcion'] ?? null);
            $pqrs_persona->setDocumento($registro['documento'] ?? null);
            $pqrs_persona->setFechaRadicado($registro['fechaRadicado'] ?? null);

            $listado[$p] = $pqrs_persona;
            $p++;
        }
        return $listado;
    }
    public function getListaPqrs_personaId($id)
    {
        $sql = "SELECT * FROM pqrs_persona WHERE idPersonas=:idPersona";
        $resultado = $this->conexion->prepare($sql);
        $resultado->execute([':idPersona' => $id]);
        return $resultado->fetch(PDO::FETCH_ASSOC);
    }

    // Función READ con paso de parámetros, para el CRUD de la tabla Pqrs_persona
    public function getPqrs_persona($idPersona)
    {
        $resultado = $this->conexion->query("SELECT * FROM pqrs_persona WHERE idPersona=='" . $idPersona . "'");
        $registro = $resultado->fetch(PDO::FETCH_ASSOC);
        return $registro;
    }

    // Función UPDATE para el CRUD de la tabla Pqrs_persona
    public function updatePqrs_persona(Object_pqrs_persona $pqrs_persona)
    {
        $sql = "UPDATE pqrs_persona SET 
                        idPersona='" . $pqrs_persona->getIdPersona() . "',
                        nombre='" . $pqrs_persona->getNombre() . "',
                        identificacion='" . $pqrs_persona->getIdentificacion() . "',
                        direccion='" . $pqrs_persona->getDireccion() . "',
                        telefono='" . $pqrs_persona->getTelefono() . "',
                        idMunicipio=" . $pqrs_persona->getIdMunicipio() . " 
                        WHERE idPersona=" . $pqrs_persona->getIdPersonas();
        $this->conexion->exec($sql);
    }

    // Función DELETE para el CRUD de la tabla Pqrs_persona
    public function deletePqrs_persona(Object_pqrs_persona $pqrs_persona)
    {
    $sql = "DELETE FROM pqrs_persona WHERE idPersonas= ". $pqrs_persona->getIdPersonas();
        var_dump( $pqrs_persona->getIdPersonas());
     $this->conexion->exec($sql);
    
    }



    // Función CREATE para el CRUD de la tabla Pqrs_municipio
    public function insertPqrs_municipio(Object_pqrs_municipio $pqrs_municipio)
    {
        $sql = "INSERT INTO pqrs_municipio(idMunicipio, nombre) VALUES ('" . $pqrs_municipio->getIdMunicipio() . "','" .
            $pqrs_municipio->getNombre() . "')";
        $this->conexion->exec($sql);
    }

    // Función READ para el CRUD de la tabla Pqrs_municipio
    public function getListaPqrs_municipio()
    {
        $lista = array();
        $p = 0;

        $resultado = $this->conexion->query("SELECT * FROM pqrs_municipio");
        while ($registro = $resultado->fetch(PDO::FETCH_ASSOC)) {
            $pqrs_municipio = new Object_pqrs_municipio();

            $pqrs_municipio->setIdMunicipio($registro['id'] ?? null);
            $pqrs_municipio->setNombre($registro['nombre'] ?? null);

            $lista[$p] = $pqrs_municipio;
            $p++;
        }

        return $lista;
    }

    // Función READ con paso de parámetros, para el CRUD de la tabla Pqrs_municipio
    public function getPqrs_municipio($idMunicipio)
    {
        $resultado = $this->conexion->query("SELECT * FROM pqrs_municipio WHERE idMunicipio=" . $idMunicipio);
        $registro = $resultado->fetch(PDO::FETCH_ASSOC);
        return $registro;
    }

    // Función UPDATE para el CRUD de la tabla Pqrs_municipio
    public function updatePqrs_municipio(Object_pqrs_municipio $pqrs_municipio)
    {
        $sql = "UPDATE pqrs_municipio SET 
                        nombre='" . $pqrs_municipio->getNombre() . "'
                        WHERE idMunicipio=" . $pqrs_municipio->getIdMunicipio();
        $this->conexion->exec($sql);
    }

    // Función DELETE para el CRUD de la tabla Pqrs_municipio
    public function deletePqrs_municipio($idMunicipio)
    {
        $sql = "DELETE FROM pqrs_municipio WHERE idMunicipio=" . $idMunicipio;
        $this->conexion->exec($sql);
    }


    //Función CREATE para el CRUD de la tabla Pqrs_super_usuario
    public function insertPqrs_super_usuario(Object_pqrs_super_usuario $pqrs_super_usuario)
    {
        $sql = "INSERT INTO pqrs_super_usuario(idSuper,nombre,password) VALUES('" . $pqrs_super_usuario->getIdSuper() . "',
             '" . $pqrs_super_usuario->getNombreUsuario() . "','" . $pqrs_super_usuario->getPassword() . "')";
        $this->conexion->exec($sql);
    }
    //Función READ para el CRUD de la tabla Pqrs_area
    public function getListaPqrs_super_usuario()
    {
        $listado = array();
        $p = 0;

        $resultado = $this->conexion->query("SELECT * FROM pqrs_super_usuario ");

        while ($registro = $resultado->fetchAll(PDO::FETCH_ASSOC)) {
            $pqrs_super_usuario = new Object_pqrs_super_usuario();
            $pqrs_super_usuario->setIdSuper($registro["idSuper"]);
            $pqrs_super_usuario->setNombreUsuario($registro["nombreUsuario"]);
            $pqrs_super_usuario->setPassword($registro["password"]);

            $listado[$p] = $pqrs_super_usuario;
            $p++;
        }
        return $listado;
    }

    // Función READ con paso de parámetros, para el CRUD de la tabla Pqrs_super_usuario
    public function getPqrs_super_usuario($idSuper)
    {
        $resultado = $this->conexion->query("SELECT * FROM pqrs_super_usuario WHERE idSuper=" . $idSuper);
        $registro = $resultado->fetch(PDO::FETCH_ASSOC);
        return $registro;
    }

    // Función UPDATE para el CRUD de la tabla Pqrs_super_usuario
    public function updatePqrs_super_usuario(Object_pqrs_super_usuario $pqrs_super_usuario)
    {
        $sql = "UPDATE pqrs_super_usuario SET 
                        nombre_usuario='" . $pqrs_super_usuario->getNombreUsuario() . "',
                        password='" . $pqrs_super_usuario->getPassword() . "'
                        WHERE idSuper=" . $pqrs_super_usuario->getIdSuper();
        $this->conexion->exec($sql);
    }

    // Función DELETE para el CRUD de la tabla Pqrs_super_usuario
    public function deletePqrs_super_usuario($idSuper)
    {
        $sql = "DELETE FROM pqrs_super_usuario WHERE idSuper=" . $idSuper;
        $this->conexion->exec($sql);
    }

    public function validar_super_usuario($nombreUsuario, $password)
    {
        $sql = "SELECT nombreUsuario, password, idRol, idSuper FROM pqrs_super_usuario 
                WHERE nombreUsuario = :nombreUsuario AND password = :password;";
    
        $Resultado = $this->conexion->prepare($sql);
        $Resultado->execute([
            ':nombreUsuario' => $nombreUsuario,
            ':password' => $password
        ]);
    
        return $Resultado->fetch(PDO::FETCH_ASSOC);
    }
    
    public function validar_coordinador($nombreUsuario, $password)
    {
        $sql = "SELECT nombreUsuario, password, idRol, idCoordinadores FROM pqrs_coordinadores
                WHERE nombreUsuario = :nombreUsuario AND password = :password;";
    
        $Resultado = $this->conexion->prepare($sql);
        $Resultado->execute([
            ':nombreUsuario' => $nombreUsuario,
            ':password' => $password
        ]);
    
        return $Resultado->fetch(PDO::FETCH_ASSOC);
    }
    
    
    

    public function obtenerDetalleCausal($id)
    {
        try {
            $sql = "SELECT * FROM pqrs_detalle_causa WHERE idDetalle=:id";
            $consulta = $this->conexion->prepare($sql);
            $consulta->bindParam(':id', $id, PDO::PARAM_INT);
            $consulta->execute();
            return $consulta->fetch(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }       


    //Función CREATE para el CRUD de la tabla Pqrs_reporte
    public function insertPqrs_reporte(Object_pqrs_reporte $pqrs_reporte)
    {
        $sql = "INSERT INTO pqrs_reporte (idReporte,codigo,nombre,idsuper)
                VALUE ('" . $pqrs_reporte->getIdReporte() . "',
                '" . $pqrs_reporte->getCodigo() . "','" . $pqrs_reporte->getNombre() . "','" . $pqrs_reporte->getIdSuper() . "')";
        $this->conexion->exec($sql);
    }


    public function getListaPqrs_reporte()
    {
        $listado = array();
        $p = 0;

        $resultado = $this->conexion->query("SELECT * FROM pqrs_reporte");
        while ($registro = $resultado->fetchAll(PDO::FETCH_ASSOC)) {
            $pqrs_reporte = new Object_pqrs_reporte();
            $pqrs_reporte->setIdReporte($registro['idReporte']);
            $pqrs_reporte->setCodigo($registro['codigo']);
            $pqrs_reporte->setNombre($registro['nombre']);
            $pqrs_reporte->setIdSuper($registro['idSuper']);

            $listado[$p] = $pqrs_reporte;
            $p++;
        }
        return $listado;
    }

    // Función READ con paso de parámetros, para el CRUD de la tabla Pqrs_reporte
    public function getPqrs_reporte($idReporte)
    {
        $resultado = $this->conexion->query("SELECT * FROM pqrs_reporte WHERE idReporte=" . $idReporte);
        $registro = $resultado->fetch(PDO::FETCH_ASSOC);
        return $registro;
    }

    // Función UPDATE para el CRUD de la tabla Pqrs_reporte
    public function updatePqrs_reporte(Object_pqrs_reporte $pqrs_reporte)
    {
        $sql = "UPDATE pqrs_reporte SET 
                        codigo='" . $pqrs_reporte->getCodigo() . "',
                        nombre='" . $pqrs_reporte->getNombre() . "',
                        idSuper=" . $pqrs_reporte->getIdSuper() . " 
                        WHERE idReporte=" . $pqrs_reporte->getIdReporte();
        $this->conexion->exec($sql);
    }

    // Función DELETE para el CRUD de la tabla Pqrs_reporte
    public function deletePqrs_reporte($idReporte)
    {
        $sql = "DELETE FROM pqrs_reporte WHERE idReporte=" . $idReporte;
        $this->conexion->exec($sql);
    }

    public function getPriorizacion()
    {
        $sql = "SELECT pp.*, pdc.*, pqr.*, pr.* ,pa.nombreArea, pc.*
                FROM pqrs_persona pp
                LEFT JOIN pqrs_pqr pqr ON pqr.idPersona = pp.idPersonas LEFT JOIN pqrs_detalle_causa pdc ON pdc.idDetalle =pqr.idDetalleCausal
                LEFT JOIN pqrs_area pa ON pqr.idArea = pa.idArea
                LEFT JOIN pqrs_coordinadores pc ON pc.idArea=pa.idArea
                LEFT JOIN pqrs_respuesta pr ON pr.idPqr = pqr.idPqr";
                
        $resultado = $this->conexion->query($sql);    
        return $resultado->fetchAll(PDO::FETCH_OBJ);
    }
    

    public function getRepuestaPqr($id)
    {
        $sql = "SELECT p.nombre, pr.respuestasPqr
                FROM pqrs_persona p
                JOIN pqrs_respuesta pr ON p.idPersonas = pr.idPersona
                WHERE p.idPersonas = :idPersona"; 
        $resultado = $this->conexion->prepare($sql);
        $resultado->execute([':idPersona' => $id]);
        return $resultado->fetch(PDO::FETCH_ASSOC);
    }
    


    public function getRegistro($id)
    {
        $sql = "SELECT p.*, q.*
        FROM pqrs_persona p
        JOIN pqrs_pqr q ON p.idPersonas = q.idPersona
        WHERE p.idPersonas = :idPersona";
        $resultado = $this->conexion->prepare($sql);
        $resultado->execute([':idPersona' => $id]);
        return $resultado->fetch(PDO::FETCH_ASSOC);
    }

    public function getRegistro2($id)
    {
        $sql = "SELECT p.*, q.*,q.*, pc.*
        FROM pqrs_persona p
        JOIN pqrs_pqr q ON p.idPersonas = q.idPersona
        JOIN pqrs_area pa ON q.idArea = pa.idArea
        JOIN pqrs_coordinadores pc ON pa.idArea = pc.idArea
        WHERE p.idPersonas = :idPersona";
        $resultado = $this->conexion->prepare($sql);
        $resultado->execute([':idPersona' => $id]);
        return $resultado->fetch(PDO::FETCH_ASSOC);
    }

    public function getRegistro3($id)
    {
        $sql = "SELECT p.*, q.*,q.*, pc.*,pr.*
        FROM pqrs_persona p
        JOIN pqrs_pqr q ON p.idPersonas = q.idPersona
        JOIN pqrs_area pa ON q.idArea = pa.idArea
        JOIN pqrs_coordinadores pc ON pa.idArea = pc.idArea
        JOIN pqrs_respuesta pr ON p.idPersonas = pr.idPersona
        WHERE p.idPersonas=:idPersona";
        $resultado = $this->conexion->prepare($sql);
        $resultado->execute([':idPersona' => $id]);
        return $resultado->fetch(PDO::FETCH_ASSOC);
    }


    

    public function estadoPqr($idPqr){
       
        $sql = "UPDATE pqrs_pqr SET estado = 'cerrado' WHERE id = $idPqr";
        $this->conexion->exec($sql);

    }

    public function radicado()
    {
        $fechaActual = date('Ymd');
        $numerosAleatorios = '';
        for ($i = 0; $i < 4; $i++) {
            $numerosAleatorios .= rand(0, 9);
        }
        $numeroAleatorio = $fechaActual . $numerosAleatorios;
        return $numeroAleatorio;
    }

/* 
    function obtenerDatosParaInforme($startDate, $endDate)
    {
        $startDate = $_REQUEST['startDate'];
        $endDate = $_REQUEST['endDate'];
        $sql = "SELECT * FROM pqrs_persona WHERE fecha_radicado between '$startDate' AND '$endDate'";
        $resultado = $this->conexion->prepare($sql);
        return $resultado->fetch(PDO::FETCH_ASSOC);
    } */


    function obtenerDatosParaInforme($startDate, $endDate)
    {
        $sql = "SELECT pp.*, pqr.*, pdc.* , pr.*
                FROM pqrs_persona pp
                LEFT JOIN pqrs_pqr pqr ON pqr.idPersona = pp.idPersonas
                LEFT JOIN pqrs_detalle_causa pdc ON pdc.idDetalle = pqr.idDetalleCausal
                LEFT JOIN pqrs_respuesta pr ON pr.idPqr = pqr.idPqr
                WHERE pp.fechaRadicado BETWEEN ? AND ?";
        
        $resultado = $this->conexion->prepare($sql);
        $resultado->execute([$startDate, $endDate]);
        
        return $resultado->fetchAll(PDO::FETCH_ASSOC);
    }
    
    function obtenerDatosUsuario($radicado)
    {
        $sql = "SELECT p.*, pr.*
                FROM pqrs_persona p
                JOIN pqrs_respuesta pr ON p.idPersonas = pr.idPersona
                WHERE p.radicado = :radicadoa;"; 
    
        $resultado = $this->conexion->prepare($sql);
        $resultado->execute([':radicadoa' => $radicado]); 
        return $resultado->fetch(PDO::FETCH_ASSOC);
    }

public function obtenerInformacionParaCoordinador($idCoordinador)
{
    $sql = "SELECT pqr.*, pa.nombreArea, dc.*, pc.*, pp.*,pr.*
            FROM pqrs_pqr pqr   
            JOIN pqrs_area pa ON pqr.idArea = pa.idArea
            JOIN pqrs_coordinadores pc ON pc.idArea = pa.idArea
            JOIN pqrs_detalle_causa dc ON pqr.idDetalleCausal = dc.idDetalle
            LEFT JOIN pqrs_persona pp ON pqr.idPersona = pp.idPersonas
            LEFT JOIN pqrs_respuesta pr ON pr.idPqr = pqr.idPqr
            WHERE pc.idCoordinadores = :idCoordinador;";

    $resultado = $this->conexion->prepare($sql);
    $resultado->execute([':idCoordinador' => $idCoordinador]);
    return $resultado->fetchAll(PDO::FETCH_ASSOC);
}


    public function obtenerTodosLosCoordinadores()
{
    $sql = "SELECT idCoordinador FROM pqrs_coordinadores";
    $resultado = $this->conexion->query($sql);
    return $resultado->fetchAll(PDO::FETCH_ASSOC);
}


    function obtenerIdAdministradores($id)
    {
        $sql = "SELECT co.*
        FROM pqrs_coordinadores co
        WHERE co.idCoordinadores = :id";
        $resultado=$this->conexion->prepare($sql);
        $resultado->execute([':id'=>$id]);
        return $resultado->fetchAll(PDO::FETCH_ASSOC);
    }

    function obtenerCoordinador($idCoordinador)
    {
        $sql ="SELECT pc.*, pr.*
        FROM pqrs_coordinadores pc
        JOIN pqrs_rol pr ON pc.idRol = pr.idRoles
        WHERE pc.idCoordinadores = :idCoordinador;";
        $resultado=$this->conexion->prepare($sql);
        $resultado->execute([':idCoordinador'=>$idCoordinador]);
        return $resultado->fetchAll(PDO::FETCH_ASSOC);
    }

    function retornaDatos($id)
    {
        $sql = "SELECT pr.*,pp.*,pdc.*,pa.*
        FROM pqrs_pqr pr
        JOIN pqrs_persona pp ON pr.idPersona = pp.idPersonas
        JOIN pqrs_detalle_causa pdc ON pr.idDetalleCausal = pdc.idDetalle
        JOIN pqrs_area pa ON pr.idArea = pa.idArea
        WHERE pp.idPersonas = :idPersona;";
        $resultado =$this->conexion->prepare($sql);
        $resultado ->execute([':idPersona'=>$id]);
        return $resultado->fetchAll(PDO::FETCH_ASSOC);

    }

    function calcularColorSemaforo($fechaRadicado, $tiempoMaximoRespuesta) {
        $fechaActual = date("Y-m-d");
    
        $datetime1 = new DateTime($fechaRadicado);
        $datetime2 = new DateTime($fechaActual);
        $diferenciaDias = $datetime1->diff($datetime2)->days;
    
        
        $limiteNaranja = $tiempoMaximoRespuesta * 1; 
        $limiteRojo = $tiempoMaximoRespuesta * 2;    
    
        if ($diferenciaDias <= $tiempoMaximoRespuesta) {
            return 'green';  
        } elseif ($diferenciaDias <= $limiteNaranja) {
            return 'orange'; // Dentro del límite naranja
        } else {
            return 'red';    // Fuera de los límites (rojo)
        }
    }
    

    function documentoRespuesta($radicado)
    {
        $sql= "SELECT pr.documentoRespuesta
        FROM pqrs_pqr pr
        JOIN pqrs_persona pp ON pr.idPersona = pp.idPersonas
        WHERE pp.radicado = :radicado";
        $resultado = $this->conexion->prepare($sql);
        $resultado->execute([':radicado' => $radicado]); 
        return $resultado->fetch(PDO::FETCH_ASSOC);

    }

    function ColorSemaforo()
    {
        $sql = "SELECT pdc.*
        FROM pqrs_detalle_causa pdc";

        $resultado = $this->conexion->query($sql);
        return $resultado->fetchAll(PDO::FETCH_ASSOC);

    }
    



}    



