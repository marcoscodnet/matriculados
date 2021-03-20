<?php

/**
 * Manager para IncumbenciaRegistro
 *  
 * @author Marcos
 * @since 13-12-2013
 */
class IncumbenciaRegistroManager extends EntityManager{

	public function getDAO(){
		return DAOFactory::getIncumbenciaRegistroDAO();
	}

	public function add(Entity $entity) {
    	
		parent::add($entity);
		
    }	
    

    
    
    
	/**
     * se elimina la entity
     * @param int identificador de la entity a eliminar.
     */
    public function delete($id) {
        /*$cuotaValor =  DAOFactory::getCuotaValorDAO();
        $cuotaValor->deleteCuotaValorPorCuota($id);
    	$cuotaGeneradaDAO =  DAOFactory::getCuotaGeneradaDAO();
        $cuotaGeneradaDAO->deleteCuotaGeneradaPorCuota($id);*/
    	parent::delete( $id );
    }
	
	
	
	
}
?>
