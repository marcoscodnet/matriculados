<?php

/**
 * Manager para Encomienda Especialidad
 *  
 * @author Marcos
 * @since 09-10-2013
 */
class EncomiendaEspecialidadManager extends EntityManager{

	public function getDAO(){
		return DAOFactory::getEncomiendaEspecialidadDAO();
	}

	public function add(Entity $entity) {
    	
		parent::add($entity);
		
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
