<?php

/**
 * Manager para IncumbenciaTipoTitulo
 *  
 * @author Marcos
 * @since 26-09-2013
 */
class IncumbenciaTipoTituloManager extends EntityManager{

	public function getDAO(){
		return DAOFactory::getIncumbenciaTipoTituloDAO();
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
