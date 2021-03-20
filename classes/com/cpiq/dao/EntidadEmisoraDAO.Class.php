<?php

/**
 * DAO para EntidadEmisora
 *  
 * @author Marcos
 * @since 06-06-2013
 */
class EntidadEmisoraDAO extends EntityDAO {

	public function getTableName(){
		return CPIQ_TABLE_ENTIDAD_EMISORA;
	}
	
	public function getEntityFactory(){
		return new EntidadEmisoraFactory();
	}
	
	public function getFieldsToAdd($entity){
		
		$fieldsValues = array();
		
		$fieldsValues["nombre"] = $this->formatString( $entity->getNombre() ); 
		
		return $fieldsValues;
	}
	
}
?>