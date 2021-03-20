<?php

/**
 * Helper manager para administrar en sesión las especialidades de una encomienda
 *  
 * @author Bernardo
 * @since 08-10-2013
 */
class EncomiendaEspecialidadSessionManager extends EntityManager{

	public function getDAO(){
		return new EncomiendaEspecialidadSessionDAO();
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
