<?php

/**
 * Manager para Cuota Generada
 *  
 * @author Marcos
 * @since 02-07-2013
 */
class CuotaGeneradaManager extends EntityManager{

	public function getDAO(){
		return DAOFactory::getCuotaGeneradaDAO();
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
