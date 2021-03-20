<?php

/**
 * Manager para Registro Matriculado
 *  
 * @author Marcos
 * @since 19-09-2013
 */
class RegistroMatriculadoManager extends EntityManager{

	public function getDAO(){
		return DAOFactory::getRegistroMatriculadoDAO();
	}

	public function add(Entity $entity) {
    	
		
		parent::add($entity);
		
		$oCriteria = new CdtSearchCriteria();
		$oCriteria->addFilter("year", date('Y'), "=" );
		$oCriteria->addFilter("registro_oid", $entity->getRegistro()->getOid(), "=" );
		
		$managerRegistroCuota =  ManagerFactory::getRegistroCuotaManager();
        $oRegistroCuota = $managerRegistroCuota->getEntity($oCriteria);
		
        if (!empty($oRegistroCuota)) {
			$oCriteria = new CdtSearchCriteria();
			$oCriteria->addFilter('matriculado_oid', $entity->getMatriculado()->getOid(), '=');
			$oCriteria->addNull('fechaHasta');
			$managerHistoricoEstado =  ManagerFactory::getHistoricoEstadoManager();
			$historicoEstado = $managerHistoricoEstado->getEntity($oCriteria);
			if ($historicoEstado->getEstadoMatriculado()) {
				if (($historicoEstado->getEstadoMatriculado()->getOid()==CPIQ_ESTADO_MATRICULADO_ACTIVO)||($historicoEstado->getEstadoMatriculado()->getOid()==CPIQ_ESTADO_MATRICULADO_NOVEL1)||($historicoEstado->getEstadoMatriculado()->getOid()==CPIQ_ESTADO_MATRICULADO_NOVEL2)||($historicoEstado->getEstadoMatriculado()->getOid()==CPIQ_ESTADO_MATRICULADO_VITALICIO)) {
					
					$oRegistroCuotaMatriculado = new RegistroCuotaMatriculado();
					$oRegistroCuotaMatriculado->setFecha(date(DB_DEFAULT_DATE_FORMAT));
					$oRegistroCuotaMatriculado->setMatriculado($entity->getMatriculado());
					$oRegistroCuotaMatriculado->setRegistroCuota($oRegistroCuota);
					
				
					
					
					$oUser = CdtSecureUtils::getUserLogged();
					$oRegistroCuotaMatriculado->setUser($oUser);
					$oRegistroCuotaMatriculado->setFechaUltModificacion(date(DB_DEFAULT_DATETIME_FORMAT));
					
					$managerRegistroCuotaMatriculado =  ManagerFactory::getRegistroCuotaMatriculadoManager();
					$managerRegistroCuotaMatriculado->add($oRegistroCuotaMatriculado);
				}
			}
		}
         
		
    }	
    
     public function update(Entity $entity) {
     	
     	
		parent::update($entity);
     }

    
    
    
	/**
     * se elimina la entity
     * @param int identificador de la entity a eliminar.
     */
    public function delete($id) {
       
		
    	parent::delete( $id );
    	
    	
		
    }
	
	
	
	
}
?>
