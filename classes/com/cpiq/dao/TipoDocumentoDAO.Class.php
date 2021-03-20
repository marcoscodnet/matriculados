<?php

/**
 * DAO para TipoDocumento
 *  
 * @author Bernardo
 * @since 20-03-2013
 */
class TipoDocumentoDAO extends EntityDAO {

	public function getTableName(){
		return CPIQ_TABLE_TIPO_DOCUMENTO;
	}
	
	public function getEntityFactory(){
		return new TipoDocumentoFactory();
	}
	
	public function getFieldsToAdd($entity){
		
		$fieldsValues = array();
		
		$fieldsValues["nombre"] = $this->formatString( $entity->getNombre() ); 
		
		return $fieldsValues;
	}
	
}
?>