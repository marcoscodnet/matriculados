<?php

/**
 * Manager para Registro Cuota
 *  
 * @author Marcos
 * @since 04-07-2013
 */
class RegistroCuotaManager extends EntityManager{

	public function getDAO(){
		return DAOFactory::getRegistroCuotaDAO();
	}

	public function add(Entity $entity) {
    	
		parent::add($entity);
		
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
