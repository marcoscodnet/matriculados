<?php

/**
 * Helper manager para administrar en sesión los profesionales de una encomienda
 *  
 * @author Bernardo
 * @since 08-10-2013
 */
class EncomiendaProfesionalSessionManager extends EntityManager{

	public function getDAO(){
		return new EncomiendaProfesionalSessionDAO();
	}
	
	public function deleteAll() {
    	$this->getDAO()->deleteAll();
    }
    
    public function setEntities( $entities ) {
    	$this->getDAO()->setEntities($entities);
    }
    
    protected function validateOnAdd(Entity $entity){
    	
    	//TODO validaciones	
    }
    
	protected function validateOnUpdate(Entity $entity){
		//TODO validaciones
	}

	protected function validateOnDelete($id){
		//TODO validaciones
	}	
}

?>
