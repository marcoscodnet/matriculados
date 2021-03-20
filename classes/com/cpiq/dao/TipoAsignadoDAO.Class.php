<?php

/**
 * DAO para TipoAsignado
 *  
 * @author Marcos
 * @since 25-07-2013
 */
class TipoAsignadoDAO extends EntityDAO {

	public function getTableName(){
		return CPIQ_TABLE_TIPO_ASIGNADO;
	}
	
	public function getEntityFactory(){
		return new TipoAsignadoFactory();
	}
	
	public function getFieldsToAdd($entity){
		
		$fieldsValues = array();
		
		$fieldsValues["nombre"] = $this->formatString( $entity->getNombre() ); 
		
		return $fieldsValues;
	}
	
}
?>