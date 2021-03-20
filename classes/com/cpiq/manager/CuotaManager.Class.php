<?php

/**
 * Manager para Cuota
 *  
 * @author Marcos
 * @since 27-06-2013
 */
class CuotaManager extends EntityManager{

	public function getDAO(){
		return DAOFactory::getCuotaDAO();
	}

	public function add(Entity $entity) {
    	
		parent::add($entity);
		
    }	
    

    public function addValoresCuota(Cuota $cuota, array $valores) {
    	 
    	//TODO validaciones, por ejemplo que las fechas no se superpongan?
    	
    	$this->validateCuotaValorOnAdd($valores);				
    	foreach ($valores as $valor) {
    		$valor->setCuota_oid( $cuota->getOid() );
    	}
    			  
    	DAOFactory::getCuotaDAO()->addValoresCuota($valores);
    
    }
    
    public function getValoresCuota($cuota_oid) {
    
    	return DAOFactory::getCuotaDAO()->getValoresCuota($cuota_oid);
    
    }
    
    
	/**
     * se elimina la entity
     * @param int identificador de la entity a eliminar.
     */
    public function delete($id) {
        $cuotaValor =  DAOFactory::getCuotaValorDAO();
        $cuotaValor->deleteCuotaValorPorCuota($id);
    	$cuotaGeneradaDAO =  DAOFactory::getCuotaGeneradaDAO();
        $cuotaGeneradaDAO->deleteCuotaGeneradaPorCuota($id);
    	parent::delete( $id );
    }
	
	/**
	 * (non-PHPdoc)
	 * @see classes/com/entities/manager/EntityManager::validateOnAdd()
	 */
    public function validateCuotaValorOnAdd($valoresCuota){
    	
    	$fechaDesdeAnterior = NULL;
    	$error = '';
    	$index = 1;
    	foreach ($valoresCuota as $valor) {
    		if(CPIQUtils::formatDateToPersist($valor->getFechaDesde())>CPIQUtils::formatDateToPersist($valor->getFechaHasta())){
    			$error .= CPIQ_LBL_CUOTA_VALOR_FECHA_DESDE.' '.$index.' '.CPIQ_MSG_CUOTA_VALOR_FECHA_MAYOR.' '.CPIQ_LBL_CUOTA_VALOR_FECHA_HASTA.' '.$index.'<br>';
    			
    		}
    		if ($fechaDesdeAnterior) {
	    		if($fechaDesdeAnterior>CPIQUtils::formatDateToPersist($valor->getFechaDesde())){
	    			$error .= CPIQ_LBL_CUOTA_VALOR_FECHA_DESDE.' '.$index.' '.CPIQ_MSG_CUOTA_VALOR_FECHA_MENOR.' '.CPIQ_LBL_CUOTA_VALOR_FECHA_HASTA.' '.($index-1).'<br>';
	    			
	    		}
    		}
    		$fechaDesdeAnterior=CPIQUtils::formatDateToPersist($valor->getFechaHasta());
    		$index++;
    	}
    	if ($error) {
    		throw new GenericException( $error );
    	}
    }
    
	
    
	public function updateValoresCuota( array $valores) {
	
		//TODO validaciones, por ejemplo que las fechas no se superpongan?
		$this->validateCuotaValorOnAdd($valores);	 
		foreach ($valores as $cuotaValor) {
			DAOFactory::getCuotaDAO()->updateCuotaValor($cuotaValor);
		}
	
	}
	
	
	
	
}
?>
