<?php

/**
 * Manager para Mov CtaCte
 *  
 * @author Marcos
 * @since 01-08-2013
 */
class MovCtaCteManager extends EntityManager{

	public function getDAO(){
		return DAOFactory::getMovCtaCteDAO();
	}

	public function add(Entity $entity) {
    	parent::add($entity);
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
