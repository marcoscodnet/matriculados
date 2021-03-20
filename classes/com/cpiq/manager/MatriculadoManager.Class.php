<?php

/**
 * Manager para Matriculado
 *  
 * @author Bernardo
 * @since 23-05-2013
 */
class MatriculadoManager extends EntityManager{

	public function getDAO(){
		return DAOFactory::getMatriculadoDAO();
	}

	public function add(Entity $entity) {
    	
		/*$oUser = new CdtUser();
		$oUser->setDs_username ( $entity->getNroDocumento() );	
		$oUser->setDs_name ( $entity->getNombre().' '.$entity->getApellido() );	
		$oUser->setDs_email ( $entity->getEmail() );	
		$oUser->setDs_phone ( $entity->getTeParticular() );	
		$oUser->setDs_address ( $entity->getDomicilio() );	
		$oUser->setCd_usergroup ( CPIQ_MATRICULADO_MEMBER_USERGROUP );
		
		$oUserManager = new CdtUserManager();
		$newPassword = $oUserManager->addCdtUser( $oUser, true );
		$entity->setCdtUser($oUser);*/
		parent::add($entity);
		
	
	
	
	
	
	
		/*$manager =  ManagerFactory::getEstadoMatriculadoManager();
		$estadoMatriculado = $manager->getObjectByCode(CPIQ_ESTADO_MATRICULADO_ACTIVO);
		$manager =  ManagerFactory::getHistoricoEstadoManager();
		$historicoEstado = new HistoricoEstado();
		$historicoEstado->setMatriculado($entity);
		$historicoEstado->setFechaDesde(date(DB_DEFAULT_DATETIME_FORMAT));
		$historicoEstado->setEstadoMatriculado($estadoMatriculado);
		$historicoEstado->setMotivo(CPIQ_CAMBIO_ESTADO_ACTIVO);
		$oUser = CdtSecureUtils::getUserLogged();
		$historicoEstado->setUser($oUser);
		$historicoEstado->setFechaUltModificacion(date(DB_DEFAULT_DATETIME_FORMAT));
		$manager->add($historicoEstado);*/
		
        
    }	
    public function update(Entity $entity) {
    	$managerMatriculado =  ManagerFactory::getMatriculadoManager();
		$oMatriculado = $managerMatriculado->getObjectByCode($entity->getOid());
		$entity->setCdtUser($oMatriculado->getCdtUser());
		parent::update($entity);
    }
    
    public function updateUsuario(Entity $entity) {
    	parent::update($entity);
    }
    
    /**
     * se elimina la entity
     * @param int identificador de la entity a eliminar.
     */
    public function delete($id) {
    	
        $historicoEstadoDAO =  DAOFactory::getHistoricoEstadoDAO();
        $historicoEstadoDAO->deleteHistoricoEstadoPorMatriculado($id);
    	
        $cuotaGeneradaDAO =  DAOFactory::getCuotaGeneradaDAO();
        $cuotaGeneradaDAO->deleteCuotaGeneradaPorMatriculado($id);
        
        $managerMovCtaCte =  ManagerFactory::getMovCtaCteManager();
		$oCriteria = new CdtSearchCriteria();
		$oCriteria->addFilter('matriculado_oid', $id, '=');
		$movCtaCtes = $managerMovCtaCte->getEntities($oCriteria);
		
		foreach ($movCtaCtes as $oMovCtaCte) {
			$movCajaDAO =  DAOFactory::getMovCajaDAO();
	        $movCajaDAO->deleteMovCajaPorMovCtaCte($oMovCtaCte->getOid());    
		}
		$movCtaCteDAO =  DAOFactory::getMovCtaCteDAO();
	    $movCtaCteDAO->deleteMovCtaCtePorMatriculado($id);
    	parent::delete( $id );
    }
    
    /**
	 * (non-PHPdoc)
	 * @see classes/com/entities/manager/EntityManager::validateOnAdd()
	 */
    protected function validateOnAdd(Entity $entity){
    	
    	parent::validateOnAdd($entity);
    	
    	//TODO validaciones del matriculado.
    	
    }
    
    /**
     * (non-PHPdoc)
     * @see classes/com/entities/manager/EntityManager::validateOnUpdate()
     */
	protected function validateOnUpdate(Entity $entity){
	
		parent::validateOnUpdate($entity);

		//TODO validaciones para actualizar el matriculado.
		
	}

	
	/**
	 * (non-PHPdoc)
	 * @see classes/com/entities/manager/EntityManager::validateOnDelete()
	 */
	protected function validateOnDelete($id){

		parent::validateOnDelete($id);

		//TODO validaciones para elimninar el matriculado.

	}	
	
	 public function cambiarEstado(Matriculado $oMatriculado, EstadoMatriculado $oEstadoMatriculado, $motivo){
	 	if (($oEstadoMatriculado->getOid()==CPIQ_ESTADO_MATRICULADO_NOVEL1)){
	 		$oCriteria = new CdtSearchCriteria();
			$oCriteria->addFilter('matriculado_oid', $oMatriculado->getOid(), '=');
			$managerTitulo =  ManagerFactory::getTituloManager();
			$titulo = $managerTitulo->getEntity($oCriteria);
			$years = CPIQUtils::edad(Date('Y-m-d'),CPIQUtils::formatDateToPersist($titulo->getFechaMatriculacion()));
			if ($years<1) {
			 	$oCriteria = new CdtSearchCriteria();
				$oCriteria->addFilter("matriculado_oid", $oMatriculado->getOid(), "=" );
				$managerCuotaGenerada =  ManagerFactory::getCuotaGeneradaManager();
		        $cuotasGeneradas = $managerCuotaGenerada->getEntities($oCriteria);
		        if (!empty($cuotasGeneradas)) {
		        	foreach ($cuotasGeneradas as $oCuotaGenerada) {
		        		if (!$oCuotaGenerada->getMovCtaCte()->getOid()) {
		        			$managerCuotaGenerada->delete($oCuotaGenerada->getOid());
        					
		        		}
			        	 else {
							$managerMovCtaCte =  ManagerFactory::getMovCtaCteManager();
							$oMovCtaCte = $managerMovCtaCte->getObjectByCode($oCuotaGenerada->getMovCtaCte()->getOid());
							if ($oMovCtaCte->getAnulacion()->getOid()) {
								$managerCuotaGenerada->delete($oCuotaGenerada->getOid());
							}
		                 	
		                 }
		        	}
		        }
			}
	 	}
	 	if (($oEstadoMatriculado->getOid()==CPIQ_ESTADO_MATRICULADO_NOVEL2)){
	 		$oCriteria = new CdtSearchCriteria();
			$oCriteria->addFilter('matriculado_oid', $oMatriculado->getOid(), '=');
			$managerTitulo =  ManagerFactory::getTituloManager();
			$titulo = $managerTitulo->getEntity($oCriteria);
			$years = CPIQUtils::edad(Date('Y-m-d'),CPIQUtils::formatDateToPersist($titulo->getFechaMatriculacion()));
			if ($years<2) {
			 	$oCriteria = new CdtSearchCriteria();
				$oCriteria->addFilter("matriculado_oid", $oMatriculado->getOid(), "=" );
				$managerCuotaGenerada =  ManagerFactory::getCuotaGeneradaManager();
		        $cuotasGeneradas = $managerCuotaGenerada->getEntities($oCriteria);
		        if (!empty($cuotasGeneradas)) {
		        	foreach ($cuotasGeneradas as $oCuotaGenerada) {
		        		if (!$oCuotaGenerada->getMovCtaCte()->getOid()) {
		        			$managerCuotaGenerada->delete($oCuotaGenerada->getOid());
        					
		        		}
			        	 else {
							$managerMovCtaCte =  ManagerFactory::getMovCtaCteManager();
							$oMovCtaCte = $managerMovCtaCte->getObjectByCode($oCuotaGenerada->getMovCtaCte()->getOid());
							if ($oMovCtaCte->getAnulacion()->getOid()) {
								$managerCuotaGenerada->delete($oCuotaGenerada->getOid());
							}
		                 	
		                 }
	                 	
	                 
		        	}
		        }
			}
	 	}
	 	if (($oEstadoMatriculado->getOid()==CPIQ_ESTADO_MATRICULADO_VITALICIO)||($oEstadoMatriculado->getOid()==CPIQ_ESTADO_MATRICULADO_SUSPENDIDO)){
	 		
			 	$oCriteria = new CdtSearchCriteria();
				$oCriteria->addFilter("matriculado_oid", $oMatriculado->getOid(), "=" );
				$managerCuotaGenerada =  ManagerFactory::getCuotaGeneradaManager();
		        $cuotasGeneradas = $managerCuotaGenerada->getEntities($oCriteria);
		        if (!empty($cuotasGeneradas)) {
		        	foreach ($cuotasGeneradas as $oCuotaGenerada) {
		        		if (!$oCuotaGenerada->getMovCtaCte()->getOid()) {
		        			$managerCuotaGenerada->delete($oCuotaGenerada->getOid());
        					
		        		}
			        	 else {
							$managerMovCtaCte =  ManagerFactory::getMovCtaCteManager();
							$oMovCtaCte = $managerMovCtaCte->getObjectByCode($oCuotaGenerada->getMovCtaCte()->getOid());
							if ($oMovCtaCte->getAnulacion()->getOid()) {
								$managerCuotaGenerada->delete($oCuotaGenerada->getOid());
							}
		                 	
		                 }
	                 	
	                 
		        	}
		        }
			
	 	}
		
	 	$oHistoricoEstado = new HistoricoEstado();
		$oHistoricoEstado->setMatriculado($oMatriculado);
		$oHistoricoEstado->setFechaDesde(date(DB_DEFAULT_DATETIME_FORMAT));
		$oHistoricoEstado->setEstadoMatriculado($oEstadoMatriculado);
		$oHistoricoEstado->setMotivo($motivo);
		$oUser = CdtSecureUtils::getUserLogged();
		$oHistoricoEstado->setUser($oUser);
		$oHistoricoEstado->setFechaUltModificacion(date(DB_DEFAULT_DATETIME_FORMAT));
	 	
	 	$oCriteria = new CdtSearchCriteria();
		$oCriteria->addFilter('matriculado_oid', $oMatriculado->getOid(), '=');
		$oCriteria->addNull('fechaHasta');
		$managerHistoricoEstado =  ManagerFactory::getHistoricoEstadoManager();
		$historicoEstado = $managerHistoricoEstado->getEntity($oCriteria);
		if (!empty($historicoEstado)) {
			if ($historicoEstado->getEstadoMatriculado()->getOid()!=$oEstadoMatriculado->getOid()) {// si el estado anterior es el mismo que el nuevo no hago nada
				$historicoEstado->setFechaHasta(date(DB_DEFAULT_DATETIME_FORMAT));
				$historicoEstado->setUser($oUser);
				$historicoEstado->setFechaUltModificacion(date(DB_DEFAULT_DATETIME_FORMAT));
				$historicoEstado->setMatriculado($oMatriculado);
				$managerHistoricoEstado->update($historicoEstado);
				$managerHistoricoEstado->add($oHistoricoEstado);
			}
		}
		else
			$managerHistoricoEstado->add($oHistoricoEstado);
	 }
    
}
?>
