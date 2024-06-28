<?php
    
    class Object_pqrs_pqr{
        private $IdPqr;
        private $idDetalleCausal;
        private $documentoRespuesta;
        private $fechaEnvioDoc;
        private $idPersona;
        private $descripcionEdit;
        private $idArea;
    
        // Métodos GET
        public function getIdPqr() {
            return $this->IdPqr;
        }

        public function getFechaEnvioDoc()
        {
            return $this->fechaEnvioDoc;
        }

        public function getDescripcionEdit() {
            return $this->descripcionEdit;
        }

        public function getIdDetalleCausal() {
            return $this->idDetalleCausal;
        }
        
    
        public function getIdPersona() {
            return $this->idPersona;
        }
        
        public function getDocumentoRespuesta() {
            return $this->documentoRespuesta;
        }
        public function getIdArea() {
            return $this->idArea;
        }
        // Métodos SET
        public function setIdPqr($IdPqr) {
            $this->IdPqr = $IdPqr;
        }

        public function setFechaEnvioDoc($fechaEnvioDoc)
        {
            $this->fechaEnvioDoc=$fechaEnvioDoc;
        }

        public function setDescripcionEdit($descripcionEdit) {
            $this->descripcionEdit = $descripcionEdit;
        }
        public function setIdDetalleCausal($idDetalleCausal) {
            $this->idDetalleCausal = $idDetalleCausal;
        }
  
        
        public function setIdPersona($idPersona) {
            $this->idPersona = $idPersona;
        }
        public function setDocumentoRespuesta($documentoRespuesta){
            $this->documentoRespuesta = $documentoRespuesta;
        }

        public function setIdArea($idArea)
        {
            $this->idArea=$idArea;
        }
        /* public function getConsecutivo() {
            return $this->Consecutivo;
        }
        
        public function getReceptor() {
            return $this->Receptor;
        }
        
        
        public function getFechaRadicado() {
            return $this->FechaRadicado;
        }
        
        public function getFechaRespuesta() {
            return $this->FechaRespuesta;
        } */
        
       /*  public function getMacroProceso() {
            return $this->macroProceso;
        }
        
        public function getProcesoPrestacion() {
            return $this->procesoPrestacion;
        }
        
        public function getMotivosGenerales() {
            return $this->motivosGenerales;
        }
        
        
        public function getTiempoRespuesta() {
            return $this->tiempoRespuesta;
        }
        
        public function getAtributoCalidad() {
            return $this->atributoCalidad;
        }
        
        public function getDescripciónEdit() {
            return $this->descripciónEdit;
        }
        
        public function getRespuestaOperador() {
            return $this->respuestaOperador;
        }
        
        public function getRadicaciónRespuesta() {
            return $this->radicaciónRespuesta;
        }
        
        public function getConceptoSupervisión() {
            return $this->conceptoSupervisión;
        }
        
        public function getApoyoSupervisión() {
            return $this->apoyoSupervisión;
        }
        
        public function getFechaTrasladoCompetencia() {
            return $this->fechaTrasladoCompetencia;
        }
        
        public function getAvalRespuesta() {
            return $this->avalRespuesta;
        } */
        

        
       /*  public function setConsecutivo($Consecutivo) {
            $this->Consecutivo = $Consecutivo;
        }
        
        public function setReceptor($Receptor) {
            $this->Receptor = $Receptor;
        }
        
        
        public function setFechaRadicado($FechaRadicado) {
            $this->FechaRadicado = $FechaRadicado;
        }
        
        public function setFechaRespuesta($FechaRespuesta) {
            $this->FechaRespuesta = $FechaRespuesta;
        }
     */
        /* public function setMacroProceso($macroProceso) {
            $this->macroProceso = $macroProceso;
        }
        
        public function setProcesoPrestacion($procesoPrestacion) {
            $this->procesoPrestacion = $procesoPrestacion;
        }
        
        public function setMotivosGenerales($motivosGenerales) {
            $this->motivosGenerales = $motivosGenerales;
        }
        
        
        public function setTiempoRespuesta($tiempoRespuesta) {
            $this->tiempoRespuesta = $tiempoRespuesta;
        }
        
        public function setAtributoCalidad($atributoCalidad) {
            $this->atributoCalidad = $atributoCalidad;
        }
        
        public function setDescripciónEdit($descripciónEdit) {
            $this->descripciónEdit = $descripciónEdit;
        }
        
        public function setRespuestaOperador($respuestaOperador) {
            $this->respuestaOperador = $respuestaOperador;
        }
        
        public function setRadicaciónRespuesta($radicaciónRespuesta) {
            $this->radicaciónRespuesta = $radicaciónRespuesta;
        }
        
        public function setConceptoSupervisión($conceptoSupervisión) {
            $this->conceptoSupervisión = $conceptoSupervisión;
        }
        
        public function setApoyoSupervisión($apoyoSupervisión) {
            $this->apoyoSupervisión = $apoyoSupervisión;
        }
        
        public function setFechaTrasladoCompetencia($fechaTrasladoCompetencia) {
            $this->fechaTrasladoCompetencia = $fechaTrasladoCompetencia;
        } 
        
        public function setAvalRespuesta($avalRespuesta) {
            $this->avalRespuesta = $avalRespuesta;
        }
        */
        
    }
    
    
    
    
    class Object_pqrs_area Extends Object_pqrs_pqr
    {
        //Atributos de la tabla pqrs_area
        private $idAreas;
        private $codigo;
        private $nombre;

        //Metodos de acceso geters y seters de la tabla pqrs_area
        public function getIdAreas()
        {
            return $this->idAreas;
        }
        public function setIdAreas($idAreas)
        {
            $this->idAreas=$idAreas;
        }
        
        public function getCodigo()
        {
            return $this->codigo;
        }
        public function setCodigo($codigo)
        {
            $this->codigo=$codigo;
        }
        
        public function getNombre()
        {
            return $this->nombre;
        }
        public function setNombre($nombre)
        {
            $this->nombre=$nombre;
        }
        
    }

 
    
    class Object_pqrs_detalle_causa Extends Object_pqrs_pqr
    {
        //Atributos de la tabla pqrs_detalle_causa
        private $idDetalle;
        private $nombre_detalle_causa;
        private $macroproceso_ambito;
        private $proceso_prestacion;
        private $motivos_solicitud;
        private $priorizacion;
        private $tiempo_maximo_respuesta;
        private $atributo_calidad_afectado;

        //Metodos de acceso geters y seters de la tabla pqrs_detalle_causa
        public function getIdDetalle()
        {
            return $this->idDetalle;
        }

        public function setIdDetalle($idDetalle)
        {
            $this->idDetalle=$idDetalle;
        }

        public function getNombre_detalle_causa()
        {
           return $this->nombre_detalle_causa;
        }

        public function setNombre_detalle_causa($nombre_detalle_causa)
        {
            $this->nombre_detalle_causa=$nombre_detalle_causa;
        }
        
        public function getMacroproceso_ambito()
        {
            return $this->macroproceso_ambito;
        }
        public function setMacroproceso_ambito($macroproceso_ambito)
        {
            $this->macroproceso_ambito=$macroproceso_ambito;
        }
        
        public function getProceso_prestacion()
        {
            return $this->proceso_prestacion;
        }
        public function setProceso_prestacion($proceso_prestacion)
        {
            $this->proceso_prestacion=$proceso_prestacion;
        }
        
        public function getMotivos_solicitud()
        {
            return $this->motivos_solicitud;
        }
        public function setMotivos_solicitud($motivos_solicitud)
        {
            $this->motivos_solicitud=$motivos_solicitud;
        }
        
        public function getPriorizacion()
        {
            return $this->priorizacion;
        }
        public function setPriorizacion($priorizacion)
        {
            $this->priorizacion=$priorizacion;
        }
        
        public function getTiempo_maximo_respuesta()
        {
            return $this->tiempo_maximo_respuesta;
        }
        public function setTiempo_maximo_respuesta($tiempo_maximo_respuesta)
        {
            $this->tiempo_maximo_respuesta=$tiempo_maximo_respuesta;
        }
        
        public function getAtributo_calidad_afectado()
        {
            return $this->atributo_calidad_afectado;
        }
        public function setAtributo_calidad_afectado($atributo_calidad_afectado)
        {
            $this->atributo_calidad_afectado=$atributo_calidad_afectado;
        }
        
    }
    
    class Object_pqrs_respuesta Extends Object_pqrs_pqr
    {
        //Atributos de la tabla pqrs_respuesta
        private $idRespuesta;
        private $respuestasPqr;
        private $estado;
        private $idDetalleCausal;
        private $idPersona;
        private $fechaRespuesta;
        private $idPqr;
        private $idCoordinador;

        //Metodos de acceso geters y seters de la tabla pqrs_respuesta
        public function getIdPqr()
        {
            return $this->idPqr;
        }
        public function setIdPqr($idPqr)
        {
            $this->idPqr=$idPqr;
        }

        public function getFechaRespuesta()
        {
            return $this->fechaRespuesta;
        }
        public function setFechaRespuesta($fechaRespuesta)
        {
            $this->fechaRespuesta=$fechaRespuesta;
        }

        public function getIdCoodirnador()
        {
           return $this->idCoordinador;
        }
        public function setIdCoordinador($idCoordinador)
        {
            $this->idCoordinador=$idCoordinador;
        }

        public function getIdRespuesta()
        {
            return $this->idRespuesta;
        }
        public function setIdRespuesta($idRespuesta)
        {
            $this->idRespuesta=$idRespuesta;
        }
        
        public function getRespuestasPqr()
        {
            return $this->respuestasPqr;
        }
        public function setRespuesta($respuestasPqr)
        {
            $this->respuestasPqr=$respuestasPqr;
        }

        public function getIdDetalleCausal() {
            return $this->idDetalleCausal;
        }

        public function setIdDetalleCausal($idDetalleCausal) {
            $this->idDetalleCausal = $idDetalleCausal;
        }

        public function getIdPersona() {
            return $this->idPersona;
        }

        public function setIdPersona($idPersona) {
            $this->idPersona = $idPersona;
        }
        
        public function getEstado()
        {
            return $this->estado;
        }
        public function setEstado($estado)
        {
            $this->estado=$estado;
        }
        
    }

    class Object_pqrs_persona Extends Object_pqrs_pqr {
        // Propiedades de la clase
        private $idPersonas;
        private $nombre;
        private $tipoIdentificacion;
        private $identificacion;
        private $programa;  
        private $direccion;
        private $telefono;
        private $correo;
        private $tipoPqr;
        private $descripcion;
        private $documento;
        private $fechaRadicado;
        private $estadoPqr;
        private $radicado;
        private $idMunicipio;
        private $idArea;

    
        // Métodos getters
        public function getIdPersonas() {
            return $this->idPersonas;
        }

        public function getEstadoPqr() {
            return $this->estadoPqr;
        }

        public function getRadicado() {
            return $this->radicado;
        }

        public function getFechaRadicado(){
            return $this->fechaRadicado;
        }
    
        public function getNombre() {
            return $this->nombre;
        }

        public function getTipoIdentificacion() {
            return $this->tipoIdentificacion;
        }
    
        public function getIdentificacion() {
            return $this->identificacion;
        }
        public function getPrograma() {
            return $this->programa;
        }
    
        public function getDireccion() {
            return $this->direccion;
        }
    
        public function getTelefono() {
            return $this->telefono;
  }

        public function getCorreo() {
            return $this->correo;
        }

        public function getTipoPqr() {
            return $this->tipoPqr;
        }

        public function getDescripcion(){
            return $this->descripcion;
        }
        public function getDocumento(){
            return $this->documento;
        }
    
        public function getIdMunicipio() {
            return $this->idMunicipio;
        }
        public function getIdArea() {
            return $this->idArea;
        }
    
        // Métodos setters
        public function setIdPersonas($idPersonas) {
            $this->idPersonas = $idPersonas;
        }

        public function setEstadoPqr($estadoPqr) {
            $this->estadoPqr = $estadoPqr;
        }

        public function setFechaRadicado($fechaRadicado)
        {
            $this->fechaRadicado = $fechaRadicado;
        }


        public function setRadicado($radicado)
        {
            $this->radicado = $radicado;
        }
    
        public function setNombre($nombre) {
            $this->nombre = $nombre;
        }
    
        public function setIdentificacion($identificacion) {
            $this->identificacion = $identificacion;
        }
    
        public function setDireccion($direccion) {
            $this->direccion = $direccion;
        }
    
        public function setTelefono($telefono) {
            $this->telefono = $telefono;
        }

        public function setCorreo($correo) {
            $this->correo = $correo;
        }
    
        public function setIdMunicipio($idMunicipio) {
            $this->idMunicipio = $idMunicipio;
        }
        public function setTipoIdentificacion($tipoIdentificacion) {
            $this->tipoIdentificacion = $tipoIdentificacion;
        }
        public function setPrograma($programa) {
            $this->programa = $programa;
        }
        public function setTipoPqr($tipoPqr) {
            $this->tipoPqr = $tipoPqr;
        }
        public function setDescripcion($descripcion){
            $this->descripcion = $descripcion;
        }
        public function setDocumento($documento) {
            $this->documento = $documento;
        }

        public function setIdArea($idArea) {
            $this->idArea = $idArea;
        }

    }

    class Object_pqrs_municipio Extends Object_pqrs_pqr {
        private $idMunicipio;
        private $nombre;
    
        public function getIdMunicipio() {
            return $this->idMunicipio;
        }
    

        public function setIdMunicipio($idMunicipio) {
            $this->idMunicipio = $idMunicipio;
        }
    
  
        public function getNombre() {
            return $this->nombre;
        }
    
        public function setNombre($nombre) {
            $this->nombre = $nombre;
        }
    }

    class Object_pqrs_super_usuario Extends Object_pqrs_pqr {
        
        private $idSuper;
        private $nombre_usuario;
        private $password;
        private $idRoles;
    
       
        public function getIdSuper() {
            return $this->idSuper;
        }
    
       
        public function setIdSuper($idSuper) {
            $this->idSuper = $idSuper;
        }
    
        
        public function getNombreUsuario() {
            return $this->nombre_usuario;
        }
    
       
        public function setNombreUsuario($nombre_usuario) {
            $this->nombre_usuario = $nombre_usuario;
        }
    
        
        public function getPassword() {
            return $this->password;
        }
    
        
        public function setPassword($password) {
            $this->password = $password;
        }

        public function getIdRoles() {
            return $this->idRoles;
        }
    
        
        public function setIdRoles($idRoles) {
            $this->idRoles = $idRoles;
        }
    }

    class Object_pqrs_reporte Extends Object_pqrs_pqr {
        
        private $idReporte;
        private $codigo;
        private $nombre;
        private $idSuper;
    
        
        public function getIdReporte() {
            return $this->idReporte;
        }
    
        
        public function setIdReporte($idReporte) {
            $this->idReporte = $idReporte;
        }
    
        
        public function getCodigo() {
            return $this->codigo;
        }
    
      
        public function setCodigo($codigo) {
            $this->codigo = $codigo;
        }
    
     
        public function getNombre() {
            return $this->nombre;
        }
    

        public function setNombre($nombre) {
            $this->nombre = $nombre;
        }
    
       
        public function getIdSuper() {
            return $this->idSuper;
        }
    
       
        public function setIdSuper($idSuper) {
            $this->idSuper = $idSuper;
        }
    }
    
    


    


    




