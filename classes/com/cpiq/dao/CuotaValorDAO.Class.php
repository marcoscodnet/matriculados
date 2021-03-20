<?php

/**
 * DAO para Cuota Valor
 *
 * @author Marcos
 * @since 01-07-2013
 */
class CuotaValorDAO extends EntityDAO {

	public function getTableName(){
		return CPIQ_TABLE_CUOTA_VALOR;
	}

	public function getEntityFactory(){
		
	}
	
	public function getFieldsToAdd($entity){

		
	}
	
	public function getFromToSelect(){
		
		
	}
	
	public function getFieldsToSelect(){
		
		
	}	
	
	public function deleteCuotaValorPorCuota($cuota_oid, $idConn=0) {
    	
        $db = CdtDbManager::getConnection( $idConn );

        
        
        $tableName = $this->getTableName();

        $sql = "DELETE FROM $tableName WHERE cuota_oid = $cuota_oid ";

        CdtUtils::log($sql, __CLASS__,LoggerLevel::getLevelDebug());
        
        $result = $db->sql_query($sql);
        if (!$result)//hubo un error en la bbdd.
            throw new DBException($db->sql_error());
    }

}
?>