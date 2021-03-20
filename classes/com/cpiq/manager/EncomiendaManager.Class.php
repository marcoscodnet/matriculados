<?php

/**
 * Manager para Encomienda
 *  
 * @author Marcos
 * @since 04-10-2013
 */
class EncomiendaManager extends EntityManager{

	public function getDAO(){
		return DAOFactory::getEncomiendaDAO();
	}

	public function add(Entity $entity) {
		if (CPIQUtils::isMatriculadoLogged()) {
           
            $oMatriculado = CPIQUtils::getMatriculadoLogged();
            
            $entity->setMatriculado($oMatriculado);
        }
        else throw new GenericException( CPIQ_MSG_ENCOMIENDA_SIN_MATRICULADO );
		$entity->setFecha(date(DB_DEFAULT_DATETIME_FORMAT));

		$entity->setPrimero(CPIQ_ENCOMIENDA_TEXTO_PRIMERO);
	
		$entity->setSegundo(CPIQ_ENCOMIENDA_TEXTO_SEGUNDO);
		
		$entity->setTercero(CPIQ_ENCOMIENDA_TEXTO_TERCERO);
		
		$entity->setCuarto(CPIQ_ENCOMIENDA_TEXTO_CUARTO);
		
		$entity->setQuinto(CPIQ_ENCOMIENDA_TEXTO_QUINTO);
		
		$entity->setPosFirmaComitente(CPIQ_ENCOMIENDA_TEXTO_POS_FIRMA_COMITENTE);
		
		$entity->setSeguridadTexto(CPIQ_ENCOMIENDA_TEXTO_SEGURIDAD);
		
		$entity->setPiePagina(CPIQ_ENCOMIENDA_TEXTO_PIE_PAGINA);
		parent::add($entity);
		$nroMatriculado = str_pad($entity->getMatriculado()->getOid(), CPIQ_NRO_DIGITOS_MATRICULADO, "0", STR_PAD_LEFT);
		$nroEncomienda = str_pad($entity->getOid(), CPIQ_NRO_DIGITOS_ENCOMIENDA, "0", STR_PAD_LEFT);
		$nroVersion = str_pad(1, CPIQ_NRO_DIGITOS_VERSION, "0", STR_PAD_LEFT);
		$nroSeguridad = str_pad($entity->getOid().$entity->getMatriculado()->getOid(), CPIQ_NRO_DIGITOS_SEGURIDAD, "0", STR_PAD_LEFT);
		$entity->setNumero($nroEncomienda.$nroMatriculado);
		$entity->setSeguridad($nroSeguridad.$nroVersion);
		parent::update($entity);
		$managerTipoEstadoEncomienda = new TipoEstadoEncomiendaManager();
		$oTipoEstadoEncomienda = $managerTipoEstadoEncomienda->getObjectByCode(CPIQ_ESTADO_ENCOMIENDA_SOLICITADA);
		$oEncomiendaEstado = new EncomiendaEstado();
		$oEncomiendaEstado->setEncomienda($entity);
		$oEncomiendaEstado->setFechaDesde(date(DB_DEFAULT_DATETIME_FORMAT));
		$oEncomiendaEstado->setTipoEstadoEncomienda($oTipoEstadoEncomienda);
		$oUser = CdtSecureUtils::getUserLogged();
		$oEncomiendaEstado->setUser($oUser);
		$oEncomiendaEstado->setFechaUltModificacion(date(DB_DEFAULT_DATETIME_FORMAT));
		$managerEncomiendaEstado = new EncomiendaEstadoManager();
		$managerEncomiendaEstado->add($oEncomiendaEstado);
		//agregamos las entidades relacionadas.
		
		//profesionales
		$profesionales = $entity->getProfesionales();
		foreach ($profesionales as $encomiendaProfesional) {
			$encomiendaProfesional->setEncomienda( $entity );
			$oUser = CdtSecureUtils::getUserLogged();
			$encomiendaProfesional->setUser($oUser);
			$encomiendaProfesional->setFechaUltModificacion(date(DB_DEFAULT_DATETIME_FORMAT));
			$managerEncomiendaProfesional = new EncomiendaProfesionalManager();
			$managerEncomiendaProfesional->add($encomiendaProfesional);
			
		}
		
		$registros = $entity->getRegistros();
		foreach ($registros as $encomiendaRegistro) {
			$encomiendaRegistro->setEncomienda( $entity );
			$oUser = CdtSecureUtils::getUserLogged();
			$encomiendaRegistro->setUser($oUser);
			$encomiendaRegistro->setFechaUltModificacion(date(DB_DEFAULT_DATETIME_FORMAT));
			$managerEncomiendaRegistro = new EncomiendaRegistroManager();
			$managerEncomiendaRegistro->add($encomiendaRegistro);
		}
		
		$especialidades = $entity->getEspecialidades();
		foreach ($especialidades as $encomiendaEspecialidad) {
			$encomiendaEspecialidad->setEncomienda( $entity );
			$oUser = CdtSecureUtils::getUserLogged();
			$encomiendaEspecialidad->setUser($oUser);
			$encomiendaEspecialidad->setFechaUltModificacion(date(DB_DEFAULT_DATETIME_FORMAT));
			$managerEncomiendaEspecialidad = new EncomiendaEspecialidadManager();
			$managerEncomiendaEspecialidad->add($encomiendaEspecialidad);
		}
		$subjectMail = CDT_MVC_APP_TITLE.' '.CPIQ_MSG_ENCOMIENDA_SOLICITADA;
		$bodyMail = CPIQ_MSG_ENCOMIENDA_SOLICITADA_SUBJECT_MAIL;
         if ($oMatriculado->getEmail() != "") {
				
         	CPIQUtils::sendMail($oMatriculado->getApellido().' '.$oMatriculado->getNombre(), $oMatriculado->getEmail(), $subjectMail, $bodyMail);
         }
         CPIQUtils::sendMail(CDT_POP_MAIL_FROM_NAME, CDT_POP_MAIL_FROM, $subjectMail, $bodyMail);
    }	
    
    
	/**
     * se modifica la entity
     * @param (Entity $entity) entity a modificar.
     */
    public function update(Entity $entity) {
    	
    	if (CPIQUtils::isMatriculadoLogged()) {
           
            $oMatriculado = CPIQUtils::getMatriculadoLogged();
            
            $entity->setMatriculado($oMatriculado);
        }
        else throw new GenericException( CPIQ_MSG_ENCOMIENDA_SIN_MATRICULADO );
		$entity->setFecha(date(DB_DEFAULT_DATETIME_FORMAT));

		/*$entity->setPrimero(CPIQ_ENCOMIENDA_TEXTO_PRIMERO);
	
		$entity->setSegundo(CPIQ_ENCOMIENDA_TEXTO_SEGUNDO);
		
		$entity->setTercero(CPIQ_ENCOMIENDA_TEXTO_TERCERO);
		
		$entity->setCuarto(CPIQ_ENCOMIENDA_TEXTO_CUARTO);
		
		$entity->setQuinto(CPIQ_ENCOMIENDA_TEXTO_QUINTO);
		
		$entity->setPosFirmaComitente(CPIQ_ENCOMIENDA_TEXTO_POS_FIRMA_COMITENTE);
		
		$entity->setSeguridadTexto(CPIQ_ENCOMIENDA_TEXTO_SEGURIDAD);
		
		$entity->setPiePagina(CPIQ_ENCOMIENDA_TEXTO_PIE_PAGINA);*/
		
		//$nroMatriculado = str_pad($entity->getMatriculado()->getOid(), CPIQ_NRO_DIGITOS_MATRICULADO, "0", STR_PAD_LEFT);
		//$nroEncomienda = str_pad($entity->getOid(), CPIQ_NRO_DIGITOS_ENCOMIENDA, "0", STR_PAD_LEFT);
		$managerEncomienda =  ManagerFactory::getEncomiendaManager();
		$oEncomienda = $managerEncomienda->getObjectByCode($entity->getOid());
		$seguridad = $oEncomienda->getSeguridad();
		$oldVersion = substr($seguridad, -4);    
		$nroVersion = str_pad(intval($oldVersion)+1, CPIQ_NRO_DIGITOS_VERSION, "0", STR_PAD_LEFT);
		$nroSeguridad = str_pad($entity->getOid().$entity->getMatriculado()->getOid(), CPIQ_NRO_DIGITOS_SEGURIDAD, "0", STR_PAD_LEFT);
		$entity->setNumero($oEncomienda->getNumero());
		$entity->setSeguridad($nroSeguridad.$nroVersion);
    	
    	parent::update($entity);
    //agregamos las entidades relacionadas.
		
    	
    	$encomiendaProfesionalDAO =  DAOFactory::getEncomiendaProfesionalDAO();
        $encomiendaProfesionalDAO->deleteEncomiendaProfesionalPorEncomienda($entity->getOid());
        
        $encomiendaRegistroDAO =  DAOFactory::getEncomiendaRegistroDAO();
        $encomiendaRegistroDAO->deleteEncomiendaRegistroPorEncomienda($entity->getOid());
        
        $encomiendaEspecialidadDAO =  DAOFactory::getEncomiendaEspecialidadDAO();
        $encomiendaEspecialidadDAO->deleteEncomiendaEspecialidadPorEncomienda($entity->getOid());
    	
		//profesionales
		$profesionales = $entity->getProfesionales();
		foreach ($profesionales as $encomiendaProfesional) {
			$encomiendaProfesional->setEncomienda( $entity );
			$oUser = CdtSecureUtils::getUserLogged();
			$encomiendaProfesional->setUser($oUser);
			$encomiendaProfesional->setFechaUltModificacion(date(DB_DEFAULT_DATETIME_FORMAT));
			$managerEncomiendaProfesional = new EncomiendaProfesionalManager();
			$managerEncomiendaProfesional->add($encomiendaProfesional);
			
		}
		
		$registros = $entity->getRegistros();
		foreach ($registros as $encomiendaRegistro) {
			$encomiendaRegistro->setEncomienda( $entity );
			$oUser = CdtSecureUtils::getUserLogged();
			$encomiendaRegistro->setUser($oUser);
			$encomiendaRegistro->setFechaUltModificacion(date(DB_DEFAULT_DATETIME_FORMAT));
			$managerEncomiendaRegistro = new EncomiendaRegistroManager();
			$managerEncomiendaRegistro->add($encomiendaRegistro);
		}
		
		$especialidades = $entity->getEspecialidades();
		foreach ($especialidades as $encomiendaEspecialidad) {
			$encomiendaEspecialidad->setEncomienda( $entity );
			$oUser = CdtSecureUtils::getUserLogged();
			$encomiendaEspecialidad->setUser($oUser);
			$encomiendaEspecialidad->setFechaUltModificacion(date(DB_DEFAULT_DATETIME_FORMAT));
			$managerEncomiendaEspecialidad = new EncomiendaEspecialidadManager();
			$managerEncomiendaEspecialidad->add($encomiendaEspecialidad);
		}
    }
    
	/**
     * se elimina la entity
     * @param int identificador de la entity a eliminar.
     */
    public function delete($id) {
    	
    	$oCriteria = new CdtSearchCriteria();
		$oCriteria->addFilter('encomienda_oid', $id, '=');
		$oCriteria->addNull('fechaHasta');
		$managerEncomiendaEstado =  ManagerFactory::getEncomiendaEstadoManager();
		$oEncomiendaEstado = $managerEncomiendaEstado->getEntity($oCriteria);
		if (($oEncomiendaEstado->getTipoEstadoEncomienda()->getOid()!=CPIQ_ESTADO_ENCOMIENDA_SOLICITADA)) {
			
			throw new GenericException( CPIQ_MSG_ENCOMIENDA_ELIMINAR_PROHIBIDO );
		}
		else{
		
	    	$encomiendaEstadoDAO =  DAOFactory::getEncomiendaEstadoDAO();
	        $encomiendaEstadoDAO->deleteEncomiendaEstadoPorEncomienda($id);
	    	
	        $encomiendaProfesionalDAO =  DAOFactory::getEncomiendaProfesionalDAO();
	        $encomiendaProfesionalDAO->deleteEncomiendaProfesionalPorEncomienda($id);
	        
	        $encomiendaRegistroDAO =  DAOFactory::getEncomiendaRegistroDAO();
	        $encomiendaRegistroDAO->deleteEncomiendaRegistroPorEncomienda($id);
	        
	        $encomiendaEspecialidadDAO =  DAOFactory::getEncomiendaEspecialidadDAO();
	        $encomiendaEspecialidadDAO->deleteEncomiendaEspecialidadPorEncomienda($id);
	        
	        
	        
	    	parent::delete( $id );
		}
		
    }
    
    /**
	 * (non-PHPdoc)
	 * @see classes/com/entities/manager/EntityManager::validateOnAdd()
	 */
    protected function validateOnAdd(Entity $entity){
    	
    	parent::validateOnAdd($entity);
    	$error='';
    	if (($entity->getTipoComitente()==CPIQ_PERSONA_FISICA)&&(!$entity->getTipoDocumento()||!$entity->getDocumento())) {
    		$error .=CPIQ_MSG_ENCOMIENDA_TIPO_DOCUMENTO_REQUIRED.'<br />'.CPIQ_MSG_ENCOMIENDA_DOCUMENTO_REQUIRED.'<br />';
    	}
    	if (($entity->getTipoComitente()==CPIQ_PERSONA_JURIDICA)&&(!$entity->getRepresentante())) {
    		$error .=CPIQ_MSG_ENCOMIENDA_REPRESENTANTE_REQUIRED.'<br />';
    	}
    	
		$profesionales = $entity->getProfesionales();
    	if ($profesionales->isEmpty()) {
    		$error .=CPIQ_MSG_ENCOMIENDA_PROFESIONALES_REQUIRED.'<br />';
    	}
    	
    	$registros = $entity->getRegistros();
    	if ($registros->isEmpty()) {
    		$error .=CPIQ_MSG_ENCOMIENDA_REGISTROS_REQUIRED.'<br />';
    	}
    	
    	$especialidades = $entity->getEspecialidades();
    	if ($especialidades->isEmpty()) {
    		$error .=CPIQ_MSG_ENCOMIENDA_ESPECIALIDADES_REQUIRED.'<br />';
    	}
    	
    	if ($error) {
    		throw new GenericException( $error );
    	}
    }
    
    /**
     * (non-PHPdoc)
     * @see classes/com/entities/manager/EntityManager::validateOnUpdate()
     */
	protected function validateOnUpdate(Entity $entity){
	
		parent::validateOnUpdate($entity);

		$error='';
    	if (($entity->getTipoComitente()==CPIQ_PERSONA_FISICA)&&(!$entity->getTipoDocumento()||!$entity->getDocumento())) {
    		$error .=CPIQ_MSG_ENCOMIENDA_TIPO_DOCUMENTO_REQUIRED.'<br />'.CPIQ_MSG_ENCOMIENDA_DOCUMENTO_REQUIRED.'<br />';
    	}
    	if (($entity->getTipoComitente()==CPIQ_PERSONA_JURIDICA)&&(!$entity->getRepresentante())) {
    		$error .=CPIQ_MSG_ENCOMIENDA_REPRESENTANTE_REQUIRED.'<br />';
    	}
    	
		$profesionales = $entity->getProfesionales();
    	if ($profesionales->isEmpty()) {
    		$error .=CPIQ_MSG_ENCOMIENDA_PROFESIONALES_REQUIRED.'<br />';
    	}
    	
    	$registros = $entity->getRegistros();
    	if ($registros->isEmpty()) {
    		$error .=CPIQ_MSG_ENCOMIENDA_REGISTROS_REQUIRED.'<br />';
    	}
    	
    	$especialidades = $entity->getEspecialidades();
    	if ($especialidades->isEmpty()) {
    		$error .=CPIQ_MSG_ENCOMIENDA_ESPECIALIDADES_REQUIRED.'<br />';
    	}
    	
    	if ($error) {
    		throw new GenericException( $error );
    	}
		
	}

	
	/**
	 * (non-PHPdoc)
	 * @see classes/com/entities/manager/EntityManager::validateOnDelete()
	 */
	protected function validateOnDelete($id){

		parent::validateOnDelete($id);

		
	}	
	

    
   
	protected function validateOnPagar(Entity $entity){
	
		$oCriteria = new CdtSearchCriteria();
		$oCriteria->addFilter('encomienda_oid', $entity->getEncomienda()->getOid(), '=');
		$oCriteria->addNull('fechaHasta');
		$managerEncomiendaEstado =  ManagerFactory::getEncomiendaEstadoManager();
		$oEncomiendaEstado = $managerEncomiendaEstado->getEntity($oCriteria);
		
		if (($oEncomiendaEstado->getTipoEstadoEncomienda()->getOid()!=CPIQ_ESTADO_ENCOMIENDA_SOLICITADA)) {
			
			throw new GenericException( CPIQ_MSG_ENCOMIENDA_PAGAR_PROHIBIDO );
		}
		
		
		$managerTipoPago = new TipoPagoManager();
		$oTipoPago = $managerTipoPago->getObjectByCode($entity->getTipoPago()->getOid());

		$error='';
    	if (($entity->getEntidad()=="")&&($oTipoPago->getEntidad())) {
    		$error .=CPIQ_MSG_PAGAR_ENCOMIENDA_ENTIDAD_REQUIRED.'<br />';
    	}
    	
		if (($entity->getNroCheque()=="")&&($oTipoPago->getCheque())) {
    		$error .=CPIQ_MSG_PAGAR_ENCOMIENDA_CHEQUE_REQUIRED.'<br />';
    	}
		
    	
    	if ($error) {
    		throw new GenericException( $error );
    	}
		
	}
	
	public function pagar(PagarEncomienda $oPagarEncomienda){
		$this->validateOnPagar($oPagarEncomienda);
		
		$managerEncomienda = new EncomiendaManager();
		$oEncomienda = $managerEncomienda->getObjectByCode($oPagarEncomienda->getEncomienda()->getOid());
		
		$oUser = CdtSecureUtils::getUserLogged();
		
		$managerMovCtaCte =  ManagerFactory::getMovCtaCteManager();
		
		$oMovCtaCteDeuda = new MovCtaCte();
		$oMovCtaCteDeuda->setFechaCarga(date(DB_DEFAULT_DATETIME_FORMAT));
		$oMovCtaCteDeuda->setMatriculado($oEncomienda->getMatriculado());
		
		$oConcepto = new Concepto();
		$oConcepto->setOid(CPIQ_CONCEPTO_DEUDA_ENCOMIENDA);
		$oMovCtaCteDeuda->setConcepto($oConcepto);
		$oMovCtaCteDeuda->setImporte($oPagarEncomienda->getImporte());
		$oMovCtaCteDeuda->setUser($oUser);
		$oMovCtaCteDeuda->setFechaUltModificacion(date(DB_DEFAULT_DATETIME_FORMAT));
		$managerMovCtaCte->add($oMovCtaCteDeuda);
		
		$oMovCtaCte = new MovCtaCte();
		$oMovCtaCte->setFechaCarga(date(DB_DEFAULT_DATETIME_FORMAT));
		$oMovCtaCte->setMatriculado($oEncomienda->getMatriculado());
		$oConcepto = new Concepto();
		$oConcepto->setOid(CPIQ_CONCEPTO_PAGO_ENCOMIENDA);
		$oMovCtaCte->setConcepto($oConcepto);
		$oMovCtaCte->setImporte($oPagarEncomienda->getImporte());
		$oMovCtaCte->setUser($oUser);
		$oMovCtaCte->setFechaUltModificacion(date(DB_DEFAULT_DATETIME_FORMAT));
		$managerMovCtaCte->add($oMovCtaCte);
		
		$managerMovCaja =  ManagerFactory::getMovCajaManager();
		$oMovCaja = new MovCaja();
		$oMovCaja->setFechaCarga(date(DB_DEFAULT_DATETIME_FORMAT));
		$oMovCaja->setMovCtaCte($oMovCtaCte);
		
		$oConcepto = new Concepto();
		$oConcepto->setOid(CPIQ_CONCEPTO_COBRO_ENCOMIENDA);
		$oMovCaja->setConcepto($oConcepto);
		
		$oMovCaja->setImporte($oPagarEncomienda->getImporte());
		$oMovCaja->setUser($oUser);
		$oMovCaja->setFechaUltModificacion(date(DB_DEFAULT_DATETIME_FORMAT));
		$managerMovCaja->add($oMovCaja);
		
		$oPagarEncomienda->setMovCtaCte($oMovCtaCte);
		$oPagarEncomienda->setMovCtaCte($oMovCtaCteDeuda);
		$oPagarEncomienda->setUser($oUser);
		$oPagarEncomienda->setFechaUltModificacion(date(DB_DEFAULT_DATETIME_FORMAT));
		
		$managerPagarEncomienda =  ManagerFactory::getPagarEncomiendaManager();
		$managerPagarEncomienda->add($oPagarEncomienda);
		$oTipoEstadoEncomienda = new TipoEstadoEncomienda();
		$oTipoEstadoEncomienda->setOid(CPIQ_ESTADO_ENCOMIENDA_GENERADA);
		$this->cambiarEstado($oEncomienda, $oTipoEstadoEncomienda);
		
		
	}
	public function cambiarEstado(Encomienda $oEncomienda, TipoEstadoEncomienda $oTipoEstadoEncomienda){
		
	 	$oEncomiendaEstado = new EncomiendaEstado();
		$oEncomiendaEstado->setEncomienda($oEncomienda);
		$oEncomiendaEstado->setFechaDesde(date(DB_DEFAULT_DATETIME_FORMAT));
		$oEncomiendaEstado->setTipoEstadoEncomienda($oTipoEstadoEncomienda);
		$oUser = CdtSecureUtils::getUserLogged();
		$oEncomiendaEstado->setUser($oUser);
		$oEncomiendaEstado->setFechaUltModificacion(date(DB_DEFAULT_DATETIME_FORMAT));
	 	
	 	$oCriteria = new CdtSearchCriteria();
		$oCriteria->addFilter('encomienda_oid', $oEncomienda->getOid(), '=');
		$oCriteria->addNull('fechaHasta');
		$managerEncomiendaEstado =  ManagerFactory::getEncomiendaEstadoManager();
		$encomiendaEstado = $managerEncomiendaEstado->getEntity($oCriteria);
		if (!empty($encomiendaEstado)) {
			if ($encomiendaEstado->getTipoEstadoEncomienda()->getOid()!=$oTipoEstadoEncomienda->getOid()) {// si el estado anterior es el mismo que el nuevo no hago nada
				$encomiendaEstado->setFechaHasta(date(DB_DEFAULT_DATETIME_FORMAT));
				$encomiendaEstado->setUser($oUser);
				$encomiendaEstado->setFechaUltModificacion(date(DB_DEFAULT_DATETIME_FORMAT));
				$encomiendaEstado->setEncomienda($oEncomienda);
				$managerEncomiendaEstado->update($encomiendaEstado);
				$managerEncomiendaEstado->add($oEncomiendaEstado);
			}
		}
		else
			$managerEncomiendaEstado->add($oEncomiendaEstado);
	 }
    
}
?>
