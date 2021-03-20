<?php

/**
 * Manager para Concepto
 *  
 * @author Marcos
 * @since 25-07-2013
 */
class ConceptoManager extends EntityManager{

	public function getDAO(){
		return DAOFactory::getConceptoDAO();
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
