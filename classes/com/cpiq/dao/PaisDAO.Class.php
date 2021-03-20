<?php

/**
 * DAO para Pais
 *  
 * @author Marcs
 * @since 28-05-2013
 */
class PaisDAO extends EntityDAO {

	public function getTableName(){
		return CPIQ_TABLE_PAIS;
	}
	
	public function getEntityFactory(){
		return new PaisFactory();
	}
	
	public function getFieldsToAdd($entity){
		
		$fieldsValues = array();
		
		$fieldsValues["nombre"] = $this->formatString( $entity->getNombre() ); 
		
		return $fieldsValues;
	}
	
}
?>