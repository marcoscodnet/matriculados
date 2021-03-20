<?php

/**
 * Manager para Titulo
 *  
 * @author Marcos
 * @since 12-06-2013
 */
class TituloManager extends EntityManager{

	public function getDAO(){
		return DAOFactory::getTituloDAO();
	}

	public function add(Entity $entity) {
    	
		$manager =  ManagerFactory::getTipoTituloManager();
		$oTipoTitulo = $manager->getObjectByCode($entity->getTipoTitulo()->getOid());
		$manager =  ManagerFactory::getSecuenciaTituloManager();
		$oSecuenciaTitulo = $manager->getObjectByCode($oTipoTitulo->getSecuenciaTitulo()->getOid());
		$matricula = $oSecuenciaTitulo->getUltMatricula()+1;
		$oSecuenciaTitulo->setUltMatricula($matricula);
		$manager->update($oSecuenciaTitulo);
		$entity->setMatricula($matricula);
		parent::add($entity);
		
		
		
		
        
    }	
    
    /**
	 * (non-PHPdoc)
	 * @see classes/com/entities/manager/EntityManager::validateOnAdd()
	 */
    protected function validateOnAdd(Entity $entity){
    	
    	//parent::validateOnAdd($entity);
    	$hoy = date(DB_DEFAULT_DATE_FORMAT).' 00:00:00';
    	$fechaExpedicion = CPIQUtils::formatDateToPersist($entity->getFechaExpedicion());
    	if($hoy<$fechaExpedicion)
    		throw new GenericException( CPIQ_MSG_TITULO_FECHA_EXPEDICION_MAYOR );
    	$fechaMatriculacion = CPIQUtils::formatDateToPersist($entity->getFechaMatriculacion());
    	if($hoy<$fechaMatriculacion)
    		throw new GenericException( CPIQ_MSG_TITULO_FECHA_MATRICULACION_MAYOR );
    	
    	if ($entity->getTituloPrincipal()) {
    		$this->ponerNoPrincipal($entity->getMatriculado()->getOid());
    	}
    	
    	
    }
    
    /**
     * (non-PHPdoc)
     * @see classes/com/entities/manager/EntityManager::validateOnUpdate()
     */
	protected function validateOnUpdate(Entity $entity){
	
		//parent::validateOnUpdate($entity);
		$hoy = date(DB_DEFAULT_DATE_FORMAT).' 00:00:00';
    	$fechaExpedicion = CPIQUtils::formatDateToPersist($entity->getFechaExpedicion());
    	if($hoy<$fechaExpedicion)
    		throw new GenericException( CPIQ_MSG_TITULO_FECHA_EXPEDICION_MAYOR );
    	$fechaMatriculacion = CPIQUtils::formatDateToPersist($entity->getFechaMatriculacion());
    	if($hoy<$fechaMatriculacion)
    		throw new GenericException( CPIQ_MSG_TITULO_FECHA_MATRICULACION_MAYOR );
		if ($entity->getTituloPrincipal()) {
    		$this->ponerNoPrincipal($entity->getMatriculado()->getOid());
    	}
	}

	
	/**
	 * (non-PHPdoc)
	 * @see classes/com/entities/manager/EntityManager::validateOnDelete()
	 */
	protected function validateOnDelete($id){

		parent::validateOnDelete($id);

		//TODO validaciones para elimninar el matriculado.

	}	
	
	 protected function ponerNoPrincipal($matriculado_oid){
	 	$this->getDAO()->ponerNoPrincipal($matriculado_oid);
	 }
    
}
?>
