<?php

/**
 * Manager para Historico estado
 *  
 * @author Marcos
 * @since 14-06-2013
 */
class HistoricoEstadoManager extends EntityManager{

	public function getDAO(){
		return DAOFactory::getHistoricoEstadoDAO();
	}

	public function add(Entity $entity) {
    	
		
		parent::add($entity);
		
		
		
        
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
		
		
	}

	
	/**
	 * (non-PHPdoc)
	 * @see classes/com/entities/manager/EntityManager::validateOnDelete()
	 */
	protected function validateOnDelete($id){

		parent::validateOnDelete($id);

		//TODO validaciones para elimninar el matriculado.

	}	
    
}
?>
